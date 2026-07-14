<?php

namespace App\Controllers;

use App\Models\Band;
use App\Models\Concert;
use App\Models\Country;
use App\Models\Event;
use App\Models\Notification;
use App\Models\Review;
use App\Models\User;
use App\Services\LastFmService;
use App\Services\MailService;
use PDO;

class UserController
{
    private User $userModel;
    private Country $countryModel;
    private Band $bandModel;
    private Event $eventModel;
    private Review $reviewModel;
    private Concert $concertModel;
    private Notification $notificationModel;
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);
        $this->countryModel = new Country($pdo);
        $this->bandModel = new Band($pdo);
        $this->eventModel = new Event($pdo);
        $this->reviewModel = new Review($pdo);
        $this->concertModel = new Concert($pdo);
        $this->notificationModel = new Notification($pdo);
        $this->pdo = $pdo;
    }

    public function logout(): void
    {
        if (isset($_SESSION['user_id'])) {
            $this->userModel->saveRememberToken($_SESSION['user_id'], null);
        }

        $_SESSION = [];
        session_destroy();

        setcookie(
            'remember_token',
            '',
            time() - 3600,
            '/'
        );

        header('Location: ?controller=user&action=login');
        exit;
    }

    public function getUserBySimilarName(): void
    {
        $name = trim($_GET['name'] ?? '');
        $users = $this->userModel->getUserBySimilarName($name, $_SESSION['user_id']);
    }

    public function loginConf(): void
    {
        $remember = isset($_POST['remember']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $user = $this->userModel->findByEmail($email);

        if ($user) {
            $passwordHash = $user['Password'];
            if (password_verify($password, $passwordHash)) {
                $_SESSION['user_id'] = $user['idUser'];
                $_SESSION['username'] = $user['Username'];
                $_SESSION['name'] = $user['Name'];
                $_SESSION['email'] = $user['Email'];
                $_SESSION['pfp'] = $user['PFP'];

                if ($remember) {
                    $token = bin2hex(random_bytes(32));
                    $this->userModel->saveRememberToken($user['idUser'], $token);

                    setcookie(
                        'remember_token',
                        $token,
                        time() + (60 * 60 * 24 * 30),
                        '/',
                        '',
                        false,
                        true
                    );
                }

                header('Location: ?controller=user&action=menu');
                exit;
            } else {
                header('Location: ?controller=user&action=login&error=1');
                exit;
            }
        } else {
            header('Location: ?controller=user&action=login&error=1');
            exit;
        }
    }

    public function createUser(): void
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $birthday = $_POST['birthday'];
        $countryId = (int)$_POST['country'];

        if ($password !== $confirmPassword) {
            die('As passwords não coincidem.');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $this->userModel->createUser(
            $name,
            $email,
            $password,
            $birthday,
            $username,
            $countryId
        );

        header('Location: ?controller=user&action=login&register=succesful');
        exit;
    }

    public function followUnfollow(): void
    {
        $id = $_SESSION['user_id'];

        $this->userModel->follow(
            $id,
            (int)$_POST['idFollow'],
            (int)$_POST['Request']
        );

        if ($_POST['redirect'] === 'search') {
            header('Location: ?controller=user&action=search&query=' . urlencode($_POST['query']));
        } else {
            header('Location: ?controller=user&action=profile&id=' . (int)$_POST['idFollow']);
        }

        exit;
    }

    public function update(): void
    {
        $id = $_SESSION['user_id'];
        $name = trim($_POST['name']);
        $username = trim($_POST['username']);
        $pfp = null;

        if (!empty($_FILES['pfp']['name'])) {
            $pfp = $this->uploadProfilePicture($_FILES['pfp']);
        }

        if ($_POST['newPassword'] === $_POST['newPasswordConfirm']) {
            $this->userModel->updateUser($id, $name, $username, $pfp);

            if ($pfp !== null) {
                $_SESSION['pfp'] = $pfp;
            }

            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['success'] = 'Profile updated successfully.';
        } else {
            $_SESSION['danger'] = 'Passwords do not match.';
        }

        header('Location: ?controller=user&action=settings');
        exit;
    }

    public function register(): void
    {
        $countries = $this->countryModel->getCountries();
        require __DIR__ . '/../Views/User/register.php';
    }

    public function profile(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?controller=user&action=login');
            exit;
        }

        $id = (int)($_GET['id'] ?? 0);
        $user = $this->userModel->getUserById($id, $_SESSION['user_id']);

        if (!$user) {
            http_response_code(404);
            require __DIR__ . '/../Views/Errors/404.php';
            exit;
        }

        $notifications = $this->loadNotifications();

        require __DIR__ . '/../Views/User/profile.php';
    }

    public function deleteNotification(): void
    {
        $id = (int)($_POST['idNotification'] ?? 0);
        $success = $this->notificationModel->deleteNotification($id);

        header('Content-Type: application/json');
        echo json_encode(['success' => $success]);
        exit;
    }

    public function login(): void
    {
        require __DIR__ . '/../Views/User/login.php';
    }

    public function menu(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?controller=user&action=login');
            exit;
        }

        $notifications = $this->loadNotifications();
        $upcomingConcerts = $this->concertModel->getUpcomingConcertsByUserCountry($_SESSION['user_id']);
        $reviews = $this->reviewModel->getReviewsFromFollowing($_SESSION['user_id']);

        require __DIR__ . '/../Views/User/mainmenu.php';
    }

    public function search(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?controller=user&action=login');
            exit;
        }

        $notifications = $this->loadNotifications();
        $query = trim($_GET['query'] ?? '');
        $users = $this->userModel->getUserBySimilarName($query, $_SESSION['user_id']);
        $bands = $this->bandModel->getBandsBySimilarName($query);
        $lastFmBands = [];

        if (count($bands) === 0) {
            $lastFm = new LastFmService();
            $lastFmBands = $lastFm->searchArtists($query);
        }

        $events = $this->eventModel->getEventsBySimilarName($query);

        foreach ($bands as &$band) {
            $band['Genres'] = $this->bandModel->getGenres($band['idBand']);
        }

        require __DIR__ . '/../Views/User/search.php';
    }

    public function settings(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?controller=user&action=login');
            exit;
        }

        $notifications = $this->loadNotifications();

        require __DIR__ . '/../Views/User/settings.php';
    }

    private function loadNotifications(): array
    {
        return $this->notificationModel->getNotifications($_SESSION['user_id']);
    }

    private function uploadProfilePicture(array $file): ?string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $mime = mime_content_type($file['tmp_name']);

        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($file['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
                break;
            case 'image/webp':
                $image = imagecreatefromwebp($file['tmp_name']);
                break;
            default:
                return null;
        }

        if (!$image) {
            return null;
        }

        $size = 512;
        $output = imagecreatetruecolor($size, $size);

        imagealphablending($output, false);
        imagesavealpha($output, true);

        $originalWidth = imagesx($image);
        $originalHeight = imagesy($image);
        $cropSize = min($originalWidth, $originalHeight);

        $srcX = ($originalWidth - $cropSize) / 2;
        $srcY = ($originalHeight - $cropSize) / 2;

        imagecopyresampled(
            $output,
            $image,
            0,
            0,
            $srcX,
            $srcY,
            $size,
            $size,
            $cropSize,
            $cropSize
        );

        $fileName = bin2hex(random_bytes(16)) . '.webp';
        $relativePath = 'uploads/profile_pictures/' . $fileName;
        $absolutePath = __DIR__ . '/../../public/' . $relativePath;

        imagewebp($output, $absolutePath, 85);

        imagedestroy($image);
        imagedestroy($output);

        return $relativePath;
    }
}
