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
    public function canAccessGroup(
        int $idGroup,
        int $idUser
    ): bool {
        return $this->isUserInGroup(
            $idGroup,
            $idUser
        );
    }
    public function getGroupById(int $idGroup): array|false
    {
        $stmt = $this->pdo->prepare("
            SELECT
                g.idGroup,
                g.Name,
                g.Event_idEvent,
                g.Description,
                COUNT(DISTINCT gu.User_idUser) AS CurrentMembers,
                g.MaxMembers,
                u.Username AS OwnerUsername,
                u.PFP AS OwnerPFP,
                e.Title AS EventTitle,
                e.BannerImage
            FROM `Group` g
            INNER JOIN User u ON g.User_idUser_Owner = u.idUser
            INNER JOIN Event e ON g.Event_idEvent = e.idEvent
            LEFT JOIN Group_has_User gu ON g.idGroup = gu.Group_idGroup
            WHERE g.idGroup = ?
            GROUP BY
                g.idGroup,
                g.Name,
                g.Event_idEvent,
                g.Description,
                g.MaxMembers,
                u.Username,
                u.PFP,
                e.Title,
                e.BannerImage
        ");

        $stmt->execute([$idGroup]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserGroups(int $idUser): array
    {
        $stmt = $this->pdo->prepare("
        SELECT
            g.idGroup,
            g.Name AS GroupName,
            e.Title AS EventTitle,
            u.Username AS OwnerUsername,
            COUNT(DISTINCT gu2.User_idUser) AS CurrentMembers,
            g.MaxMembers,
            g.CreatedAt
        FROM Group_has_User gu
        INNER JOIN `Group` g ON gu.Group_idGroup = g.idGroup
        INNER JOIN Event e ON g.Event_idEvent = e.idEvent
        INNER JOIN User u ON g.User_idUser_Owner = u.idUser
        LEFT JOIN Group_has_User gu2 ON g.idGroup = gu2.Group_idGroup
        WHERE gu.User_idUser = ?
        GROUP BY
            g.idGroup,
            g.Name,
            e.Title,
            u.Username,
            g.MaxMembers,
            g.CreatedAt
        ORDER BY g.CreatedAt DESC
    ");

        $stmt->execute([$idUser]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMessages(int $idGroup, int $lastMessage): array
    {
        $stmt = $this->pdo->prepare("
        SELECT
            m.idMessage,
            m.Content,
            m.SentAt,
            m.EditedAt,
            u.idUser,
            u.Name,
            u.Username,
            u.PFP
        FROM Message m
            INNER JOIN User u ON m.User_idUser = u.idUser
        WHERE m.Group_idGroup = ?
          AND m.idMessage > ?
          AND m.DeletedAt IS NULL
        ORDER BY m.SentAt ASC
    ");

        $stmt->execute([$idGroup, $lastMessage]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sendMessage(int $idGroup, int $idUser, string $content): bool
    {
        $content = trim($content);

        if ($content === '') {
            return false;
        }
        if (!$this->isUserInGroup($idGroup, $idUser)) {
            return false;
        }
        $stmt = $this->pdo->prepare("
            INSERT INTO Message (Group_idGroup, User_idUser, Content, SentAt)
            VALUES (?, ?, ?, NOW())
        ");

        return $stmt->execute([$idGroup, $idUser, $content]);
    }

    public function editMessage(int $idMessage, int $idUser,string $content): bool
    {
        $stmt = $this->pdo->prepare("
        UPDATE Message
        SET Content = ?, EditedAt = NOW()
        WHERE idMessage = ? AND User_idUser=?
    ");

        return $stmt->execute([$content, $idMessage, $idUser]);
    }

    public function deleteMessage(int $idMessage,int $idUser): bool
    {
        $stmt = $this->pdo->prepare("
        UPDATE Message
        SET DeletedAt = NOW()
        WHERE idMessage = ? AND User_idUser = ?
    ");

        return $stmt->execute([$idMessage, $idUser]);
    }

    public function getGroupMembers(int $idGroup): array
    {
        $stmt = $this->pdo->prepare("
        SELECT
            u.idUser,
            u.Username,
            u.Name,
            u.PFP
        FROM Group_has_User gu
            INNER JOIN User u ON gu.User_idUser = u.idUser
        WHERE gu.Group_idGroup = ?
        ORDER BY u.Username ASC
    ");

        $stmt->execute([$idGroup]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
