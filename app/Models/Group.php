<?php

namespace App\Models;

use PDO;

class Group
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function isUserInGroup(
        int $idGroup,
        int $idUser
    ): bool {
        $stmt = $this->pdo->prepare("
        SELECT 1
        FROM Group_has_User
        WHERE Group_idGroup = ?
          AND User_idUser = ?
        LIMIT 1
    ");

        $stmt->execute([$idGroup, $idUser]);

        return (bool) $stmt->fetchColumn();
    }
    public function joinGroup(int $idGroup, int $idUser): bool
    {
        $stmt = $this->pdo->prepare("
            SELECT User_idUser_Owner
            FROM `Group`
            WHERE idGroup = ?
        ");

        $stmt->execute([$idGroup]);

        $owner = (int)$stmt->fetchColumn();

        if ($owner === $idUser) {

            return false;
        }

        // Check if user is already in the group
        if ($this->isUserInGroup($idGroup, $idUser)) {
            return false;
        }

        // Check if group is full
        $stmt = $this->pdo->prepare("
        SELECT
            g.MaxMembers,
            COUNT(gu.User_idUser) AS MemberCount
        FROM `Group` g
        LEFT JOIN Group_has_User gu ON g.idGroup = gu.Group_idGroup
        WHERE g.idGroup = ?
        GROUP BY g.idGroup, g.MaxMembers
    ");

        $stmt->execute([$idGroup]);
        $group = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$group || $group['MemberCount'] >= $group['MaxMembers']) {
            return false;
        }

        // Add user to group
        $stmt = $this->pdo->prepare("
        INSERT INTO Group_has_User (Group_idGroup, User_idUser)
        VALUES (?, ?)
    ");

        return $stmt->execute([$idGroup, $idUser]);
    }

    public function leaveGroup(int $idGroup, int $idUser): bool
    {
        $stmt = $this->pdo->prepare("
            SELECT User_idUser_Owner
            FROM `Group`
            WHERE idGroup = ?
        ");

        $stmt->execute([$idGroup]);

        if ((int)$stmt->fetchColumn() === $idUser) {
            return false;
        }
        $stmt = $this->pdo->prepare("
        DELETE FROM Group_has_User
        WHERE Group_idGroup = ?
          AND User_idUser = ?
    ");

        return $stmt->execute([$idGroup, $idUser]);
    }
    public function createGroup(
        int $eventId,
        int $ownerId,
        string $name,
        string $description,
        int $maxMembers
    ): bool {
        try {
            $this->pdo->beginTransaction();

            // Create the group
            $stmt = $this->pdo->prepare("
            INSERT INTO `Group` (Event_idEvent, User_idUser_Owner, Name, Description, MaxMembers, CreatedAt)
            VALUES (?, ?, ?, ?, ?, NOW())
        ");

            $stmt->execute([$eventId, $ownerId, $name, $description, $maxMembers]);

            $groupId = (int) $this->pdo->lastInsertId();

            // Add the owner as a member
            $stmt = $this->pdo->prepare("
            INSERT INTO Group_has_User (Group_idGroup, User_idUser)
            VALUES (?, ?)
        ");

            $stmt->execute([$groupId, $ownerId]);

            $this->pdo->commit();

            return true;
        } catch (\Throwable $e) {
            $this->pdo->rollBack();
            return false;
        }
    }

         public function getGroupMemberCount(int $idGroup): int
    {
        $stmt = $this->pdo->prepare("
        SELECT COUNT(*) AS MemberCount
        FROM Group_has_User
        WHERE Group_idGroup = ?
    ");

        $stmt->execute([$idGroup]);

        return (int) $stmt->fetchColumn();
    } 
}
