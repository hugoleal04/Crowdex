<?php

namespace App\Controllers;

use App\Services\MailService;
use App\Models\Notification;
use App\Models\Review;
use PDO;
use App\Models\User;
use App\Models\Concert;

class ConcertController
{
    private User $userModel;
    private Concert $concertModel;
    private Review $reviewModel;
    private Notification $notificationModel;
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);
        $this->concertModel = new Concert($pdo);
        $this->reviewModel = new Review($pdo);
        $this->notificationModel = new Notification($pdo);
        $this->pdo = $pdo;
    }

    public function deleteNotification()
    {
        $id = (int)($_POST["idNotification"] ?? 0);
        $success = $this->notificationModel->deleteNotification($id);

        header("Content-Type: application/json");
        echo json_encode(["success" => $success]);
        exit;
    }

    public function getConcertById()
    {
        $concert = $this->concertModel->getUpcomingConcertsByUserCountry(
            (int)$_POST["id"]
        );

        if ($concert === false) {
            http_response_code(404);
            require __DIR__ . "/../Views/Errors/404.php";
            exit;
        }

        return $concert;
    }

    private function loadNotifications(): array
    {
        return $this->notificationModel->getNotifications($_SESSION["user_id"]);
    }

    public function profile()
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: ?controller=user&action=login");
            exit;
        }

        $idConcert = (int)($_GET["id"] ?? 0);
        $concert = $this->concertModel->getConcertById($idConcert);

        if ($concert === false) {
            http_response_code(404);
            require __DIR__ . "/../Views/Errors/404.php";
            exit;
        }

        $gallery = $this->concertModel->getConcertGallery($idConcert);
        $reviews = $this->reviewModel->getReviewsByConcert($idConcert);
        $notifications = $this->loadNotifications();
        $otherConcerts = $this->concertModel->getOtherConcertsFromEvent(
            $concert["idEvent"],
            $concert["idConcert"]
        );

        require __DIR__ . "/../Views/Concert/profile.php";
    }
}