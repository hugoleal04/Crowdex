<?php

namespace App\Models;

use PDO;

class Review
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function createReview(int $idUser, int $idConcert, float $rating, string $text)
    {
        $stmt = $this->pdo->prepare("insert into Review (User_idUser,Concert_idConcert, Rating, Text) values (?,?,?,?);");
        return $stmt->execute([$idUser, $idConcert, $rating, $text]);
    }
}
