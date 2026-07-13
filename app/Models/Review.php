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
        return $stmt->execute([$rating, $text, $idUser, $idConcert]);
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
    public function getReviewsFromFollowing(int $userId): array
    {
        $stmt = $this->pdo->prepare("
        SELECT
            Review.idReview,
            Review.Rating,
            Review.Text,
            Review.CreatedAt,

            User.idUser,
            User.Name,
            User.Username,
            User.PFP,

            Concert.idConcert,
            Concert.Stage,
            Concert.StartDateTime,

            Band.idBand,
            Band.Name AS BandName,
            Band.ProfileImage AS BandProfileImage,

            Event.idEvent,
            Event.Title AS EventTitle

        FROM Follow

        INNER JOIN Review
            ON Follow.idFollowing = Review.User_idUser

        INNER JOIN User
            ON User.idUser = Review.User_idUser

        INNER JOIN Concert
            ON Concert.idConcert = Review.Concert_idConcert

        INNER JOIN Band
            ON Band.idBand = Concert.Band_idBand

        INNER JOIN Event
            ON Event.idEvent = Concert.Event_idEvent

        WHERE Follow.idFollower = ?

        ORDER BY Review.CreatedAt DESC;
    ");

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
