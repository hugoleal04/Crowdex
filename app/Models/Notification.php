<?php

namespace App\Models;

use PDO;

class Notification

{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getNotifications(int $userId): array
    {
        $stmt = $this->pdo->prepare("
            SELECT
                idNotification,
                Text,
                CreatedAt
            FROM Notification
            WHERE idUser = ?
            ORDER BY CreatedAt DESC
            LIMIT 10
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteNotification(int $id): bool
    {
        $stmt = $this->pdo->prepare("
        DELETE
        FROM Notification
        WHERE idNotification = ?
    ");

        return $stmt->execute([$id]);
    }
}
