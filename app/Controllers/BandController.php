<?php

namespace App\Controllers;

use App\Services\MailService;
use App\Models\Notification;
use App\Models\Review;
use App\Models\Band;


use PDO;
use App\Models\User;
use App\Models\Concert;

class BandController
{
    private User $userModel;
    private Concert $concertModel;
    private Band $bandModel;
    private Review $reviewModel;
    private Notification $notificationModel;
    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);
        $this->concertModel = new Concert($pdo);
        $this->reviewModel = new Review($pdo);
        $this->notificationModel = new Notification($pdo);
        $this->bandModel = new Band($pdo);
    }
    public function profile()
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: ?controller=user&action=login");
            exit;
        }

        $id = (int)($_GET["id"] ?? 0);

        $band = $this->bandModel->getBandById($id);

        if (!$band) {
            die("Band not found.");
        }

        $band["Genres"] = $this->bandModel->getGenres($id);

        $concerts = $this->concertModel->getConcertsByBand($id);

        $notifications = $this->notificationModel->getNotifications($_SESSION["user_id"]);

        require __DIR__ . "/../Views/Band/profile.php";
    }
}
