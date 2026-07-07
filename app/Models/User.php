<?php

namespace App\Models;

use PDO;

class User
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function findByEmail(string $email)
    {
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM User
        WHERE Email =?
        ");

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserById(int $id): array|false
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM user
            WHERE idUser = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function createUser(
        string $name,
        string $email,
        string $password,
        string $birthday,
        string $username,
        int $countryId
    ): bool {
        $stmt = $this->pdo->prepare("
            INSERT INTO User
            (
                Name,
                Email,
                Password,
                Birthday,
                Country_idCountry,
                Username
            )
            VALUES
            (
                :name,
                :email,
                :password,
                :birthday,
                :country,
                :username
            )
        ");

        return $stmt->execute([
            ":name" => $name,
            ":email" => $email,
            ":password" => $password,
            ":birthday" => $birthday,
            ":country" => $countryId,
            ":username" => $username
        ]);
    }
    public function saveRememberToken(int $idUser, ?string $token)
    {
        $stmt = $this->pdo->prepare("
            UPDATE User
            SET RememberToken = ?
            WHERE idUser = ?
        ");

        return $stmt->execute([$token, $idUser]);
    }
    public function updateUser(
        int $id,
        string $name,
        string $username,
        ?string $pfp
    ): bool {
        if ($pfp !== null) {

            $stmt = $this->pdo->prepare("
            UPDATE User
            SET
                Name = ?,
                Username = ?,
                PFP = ?
            WHERE idUser = ?
        ");

            return $stmt->execute([
                $name,
                $username,
                $pfp,
                $id
            ]);
        }

        $stmt = $this->pdo->prepare("
        UPDATE User
        SET
            Name = ?,
            Username = ?
        WHERE idUser = ?
    ");

        return $stmt->execute([
            $name,
            $username,
            $id
        ]);
    }
    public function getUserBySimilarName(string $similarName): array
    {
        $stmt = $this->pdo->prepare("
            SELECT 
                idUser,
                Username,
                Name,
                PFP
            FROM User
            WHERE Username LIKE :name
                or Name LIKE :name
            LIMIT 10
        ");
        $stmt->execute(["name" => "%{$similarName}%"]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findByRememberToken(string $token)
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM User
            WHERE RememberToken = ?
        ");

        $stmt->execute([$token]);

        return $stmt->fetch();
    }
}
