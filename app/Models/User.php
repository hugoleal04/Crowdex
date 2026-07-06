<?php 
namespace App\Models;
use PDO;

class User{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function findByEmail(string $email){
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
    int $countryId
    ): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO User
            (
                Name,
                Email,
                Password,
                Birthday,
                Country_idCountry
            )
            VALUES
            (
                :name,
                :email,
                :password,
                :birthday,
                :country
            )
        ");

        return $stmt->execute([
            ":name" => $name,
            ":email" => $email,
            ":password" => $password,
            ":birthday" => $birthday,
            ":country" => $countryId
        ]);
    }
}
?> 