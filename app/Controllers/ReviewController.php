<?php

namespace App\Controllers;

use App\Services\MailService;
use App\Models\Notification;

use App\Models\Review;

use PDO;
use App\Models\User;
use App\Models\Concert;

class ReviewController
{
    private User $userModel;
    private Concert $ConcertModel;
    private Review $reviewModel;
    private Notification $notificationModel;
    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);

        $this->ConcertModel = new Concert($pdo);

        $this->reviewModel = new Review($pdo);

        $this->notificationModel = new Notification($pdo);
    }
    public function deleteNotification()
    {
        $id = (int)($_POST["idNotification"] ?? 0);

        $success = $this->notificationModel->deleteNotification($id);

        header("Content-Type: application/json");

        echo json_encode([
            "success" => $success
        ]);

        exit;
    }
    public function createReview()
    {
        $rating = (float)$_POST["rating"];
        $idConcert = $_POST["concert_id"];
        $text = $_POST["text"];

        $this->reviewModel->createReview($_SESSION["user_id"], $idConcert, $rating, $text);
    }
    private function loadNotifications(): array
    {
        return $this->notificationModel
            ->getNotifications($_SESSION["user_id"]);
    }
    public function create()
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: ?controller=user&action=login");
            exit;
        }

        $concert = $this->ConcertModel->getConcertById((int)$_GET["concert_id"]);

        if ($concert === false) {
            http_response_code(404);
            require __DIR__ . "/../Views/Errors/404.php";
            exit;
        }

        $notifications = $this->loadNotifications();

        require __DIR__ . "/../Views/User/review.php";
    }
}
