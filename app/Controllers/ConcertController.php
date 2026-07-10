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
    function createConcert() {}
    function getConcertById()
    {
        return $this->ConcertModel->getConcertById($_POST["id"]);
    }
    private function loadNotifications(): array
    {
        return $this->notificationModel
            ->getNotifications($_SESSION["user_id"]);
    }
}
