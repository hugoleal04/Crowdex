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
