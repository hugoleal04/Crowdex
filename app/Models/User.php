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
    public function follow(int $id, int $idFollow, bool $request){
        if($request){
            $stmt = $this->pdo->prepare("
            insert into Follow
            (
                idFollower,
                idFollowing
            )
            Values
            (:id,:idFollow)");
        } else{
            $stmt =$this->pdo->prepare("
            DELETE FROM Follow WHERE idFollower=:id && idFollowing=:idFollow;");
        }
            return $stmt->execute([
            ":id" => $id,
            ":idFollow" => $idFollow
        ]);
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
    public function getUserBySimilarName(
        string $similarName,
        int $loggedUserId
    ): array {

        $stmt = $this->pdo->prepare("
        SELECT
            u.idUser,
            u.Username,
            u.Name,
            u.PFP,

            EXISTS (
                SELECT 1
                FROM Follow f
                WHERE f.idFollower = :loggedUser
                  AND f.idFollowing = u.idUser
            ) AS Following

        FROM User u

        WHERE
            u.Username LIKE :name
            OR u.Name LIKE :name

        LIMIT 10
    ");

        $stmt->execute([
            "name" => "%{$similarName}%",
            "loggedUser" => $loggedUserId
        ]);

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
