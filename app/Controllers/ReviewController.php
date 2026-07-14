<?php

namespace App\Controllers;

use App\Models\Concert;
use App\Models\Notification;
use App\Models\Review;
use App\Models\User;
use App\Services\MailService;
use PDO;

class ReviewController
{
    private User $userModel;
    private Concert $concertModel;
    private Review $reviewModel;
    private Notification $notificationModel;

    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);
        $this->concertModel = new Concert($pdo);
        $this->reviewModel = new Review($pdo);
        $this->notificationModel = new Notification($pdo);
    }

    public function deleteNotification(): void
    {
        $id = (int)($_POST['idNotification'] ?? 0);
        $success = $this->notificationModel->deleteNotification($id);

        header('Content-Type: application/json');
        echo json_encode(['success' => $success]);
        exit;
    }

    public function createReview(): void
    {
        $rating = (float)$_POST['rating'];
        $idConcert = (int)$_POST['concert_id'];
        $text = trim($_POST['text']);

        $review = $this->reviewModel->getReviewByUserAndConcert(
            $_SESSION['user_id'],
            $idConcert
        );

        if ($review === false) {
            $this->reviewModel->createReview(
                $_SESSION['user_id'],
                $idConcert,
                $rating,
                $text,
                $_FILES['photos']
            );
        } else {
            $this->reviewModel->updateReview(
                $_SESSION['user_id'],
                $idConcert,
                $rating,
                $text,
                $_FILES['photos'],
                $_POST['deleteMedia'] ?? []
            );

            $this->reviewModel->deleteMedia(
                $_POST['deleteMedia'] ?? []
            );
        }

        header('Location: ?controller=review&action=create&concert_id=' . $idConcert);
        exit;
    }

    public function create(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?controller=user&action=login');
            exit;
        }

        $idConcert = (int)($_GET['concert_id'] ?? 0);
        $concert = $this->concertModel->getConcertById($idConcert);

        if ($concert === false) {
            http_response_code(404);
            require __DIR__ . '/../Views/Errors/404.php';
            exit;
        }

        $review = $this->reviewModel->getReviewByUserAndConcert(
            $_SESSION['user_id'],
            $idConcert
        );

        $reviewMedia = [];
        if ($review !== false) {
            $reviewMedia = $this->reviewModel->getMedia($review['idReview']);
        }

        $notifications = $this->loadNotifications();

        require __DIR__ . '/../Views/User/review.php';
    }

    public function view(): void
    {
        $idReview = (int)($_GET['id'] ?? 0);

        if ($idReview <= 0) {
            http_response_code(404);
            require __DIR__ . '/../Views/Errors/404.php';
            exit;
        }

        $review = $this->reviewModel->getReviewById($idReview);

        if ($review === false) {
            http_response_code(404);
            require __DIR__ . '/../Views/Errors/404.php';
            exit;
        }

        $media = $this->reviewModel->getMedia($idReview);
        $notifications = $this->loadNotifications();

        require __DIR__ . '/../Views/Review/view.php';
    }

    private function loadNotifications(): array
    {
        return $this->notificationModel->getNotifications($_SESSION['user_id']);
    }
}
