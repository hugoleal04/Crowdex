<?php

namespace App\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\Notification;
use PDO;

class GroupController
{
    private Group $groupModel;
    private User $userModel;
    private Notification $notificationModel;
    public function __construct(PDO $pdo)
    {
        $this->groupModel = new Group($pdo);
        $this->userModel = new User($pdo);
        $this->notificationModel = new Notification($pdo);
    }
    private function loadNotifications(): array
    {
        return $this->notificationModel
            ->getNotifications($_SESSION["user_id"]);
    }

    public function deleteNotification(): void
    {
        $id = (int)($_POST["idNotification"] ?? 0);

        $success = $this->notificationModel
            ->deleteNotification($id);

        header("Content-Type: application/json");

        echo json_encode([
            "success" => $success
        ]);

        exit;
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?controller=user&action=menu');
            exit;
        }

        $idUser = $_SESSION['user_id'];
        $idEvent = (int)$_POST['idEvent'];

        if ($this->userModel->hasUserCreatedGroup($idUser, $idEvent)) {
            header('Location: ?controller=event&action=profile&id=' . $idEvent);
            exit;
        }

        $this->groupModel->createGroup(
            $idEvent,
            $idUser,
            trim($_POST['name']),
            trim($_POST['description']),
            (int)$_POST['maxMembers']
        );

        header('Location: ?controller=event&action=profile&id=' . $idEvent);
        exit;
    }

    public function join(): void
    {
        $idGroup = (int)$_POST['idGroup'];
        $idUser = $_SESSION['user_id'];

        $success = $this->groupModel->joinGroup($idGroup, $idUser);
        $members = $this->groupModel->getGroupMemberCount($idGroup);

        header('Content-Type: application/json');
        echo json_encode([
            'success' => $success,
            'members' => $members
        ]);

        exit;
    }

    public function leave(): void
    {
        $idGroup = (int)$_POST['idGroup'];
        $idUser = $_SESSION['user_id'];

        $success = $this->groupModel->leaveGroup($idGroup, $idUser);
        $members = $this->groupModel->getGroupMemberCount($idGroup);

        header('Content-Type: application/json');
        echo json_encode([
            'success' => $success,
            'members' => $members
        ]);

        exit;
    }
    public function myGroups()
    {
        $groups =
            $this->groupModel
            ->getUserGroups($_SESSION["user_id"]);

        header("Content-Type: application/json");

        echo json_encode($groups);

        exit;
    }
    public function chat(): void
    {
        if (!isset($_GET['id'])) {
            header('Location: ?controller=user&action=menu');
            exit;
        }

        $idGroup = (int)$_GET['id'];
        $idUser = $_SESSION['user_id'];

        // Check if user can access this group
        if (!$this->groupModel->canAccessGroup($idGroup, $idUser)) {
            http_response_code(403);
            require __DIR__ . "/../Views/Errors/403.php";
            exit;
        }

        // Get group details
        $group = $this->groupModel->getGroupById($idGroup);

        if (!$group) {
            http_response_code(404);
            require __DIR__ . '/../Views/Error/404.php';
            exit;
        }

        // Get messages and members
        $messages = $this->groupModel->getMessages($idGroup, 0);
        $members = $this->groupModel->getGroupMembers($idGroup);
        $notifications = $this->loadNotifications();

        require __DIR__ . '/../Views/GroupChat/chat.php';
    }
    public function sendMessage(): void
    {
        $idGroup = (int)($_POST['idGroup'] ?? 0);
        $content = $_POST['content'] ?? '';
        $success = $this->groupModel->sendMessage($idGroup, $_SESSION['user_id'], $content);

        header('Content-Type: application/json');
        echo json_encode(['success' => $success]);
        exit;
    }

    public function getMessages(): void
    {
        $idGroup = (int)($_GET['idGroup'] ?? 0);
        $lastMessage = (int)($_GET['after'] ?? 0);

        if (!$this->groupModel->canAccessGroup($idGroup, $_SESSION['user_id'])) {
            http_response_code(403);
            require __DIR__ . "/../Views/Errors/403.php";
            exit;
        }

        $messages = $this->groupModel->getMessages($idGroup, $lastMessage);

        header('Content-Type: application/json');
        echo json_encode($messages);
        exit;
    }

    /*     public function delete(): void
    {
        $idGroup = (int)$_POST["idGroup"];

        $this->groupModel->deleteGroup($idGroup);

        header(

            "Location: ?controller=user&action=menu"

        );

        exit;
    } */
}
