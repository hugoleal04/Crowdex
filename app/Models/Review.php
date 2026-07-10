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
    public function updateReview(int $idUser, int $idConcert, float $rating, string $text)
    {
        $stmt = $this->pdo->prepare("update Review set Rating= ?, Text=? where User_idUser=? && Concert_idConcert=?);");
        return $stmt->execute([ $rating, $text,$idUser, $idConcert]);
    }
    public function getReviewByUserAndConcert(int $idUser, int $idConcert): array|false
    {
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM Review
        WHERE User_idUser = ?
          AND Concert_idConcert = ?;
    ");

        $stmt->execute([$idUser, $idConcert]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
