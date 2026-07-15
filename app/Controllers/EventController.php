<?php

namespace App\Controllers;

use App\Models\Event;
use App\Models\Group;
use App\Models\User;
use App\Models\Notification;

use PDO;

class EventController
{
    private Event $eventModel;
    private Group $groupModel;
    private User $userModel;
    private Notification $notificationModel;


    public function __construct(PDO $pdo)
    {
        $this->eventModel = new Event($pdo);
        $this->groupModel = new Group($pdo);
        $this->userModel = new User($pdo);
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
    private function loadNotifications(): array
    {
        return $this->notificationModel->getNotifications($_SESSION['user_id']);
    }
    
    public function profile(): void
    {
        if (!isset($_GET["id"])) {
            header("Location: ?controller=user&action=menu");
            exit;
        }
        $idEvent = (int)$_GET["id"];
        $idUser = $_SESSION["user_id"];
        $event = $this->eventModel->getEventById($idEvent);
        if (!$event) {
            http_response_code(404);
            require __DIR__ . "/../Views/Error/404.php";
            exit;
        }
        $concerts = $this->eventModel->getConcertsFromEvent($idEvent);
        $groups = $this->eventModel->getGroupsFromEvent($idEvent, $idUser);
        $userOwnedGroup = $this->userModel->getUserOwnedGroup(
            $idUser,
            $idEvent
        );
        $notifications = $this->loadNotifications();

        require __DIR__ . "/../Views/Event/profile.php";
    }
}
