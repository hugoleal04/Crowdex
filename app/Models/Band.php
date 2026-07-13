<?php

namespace App\Models;

use PDO;

class Band
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function getBandsBySimilarName(string $similarName): array
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM Band
            WHERE Name LIKE :name
            LIMIT 10
        ");
        $stmt->execute(["name" => "%{$similarName}%"]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBandById(int $idBand, int $idUser): array|false
    {
        $stmt = $this->pdo->prepare("
        SELECT
            Band.*,

            EXISTS(
                SELECT 1
                FROM Follow_Band
                WHERE idBand = Band.idBand
                  AND idUser = :user
            ) AS Following

        FROM Band

        WHERE idBand = :band
    ");

        $stmt->execute([
            "band" => $idBand,
            "user" => $idUser
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getGenres(int $bandId): array
    {
        $stmt = $this->pdo->prepare("
        SELECT Genre.Name
        FROM Band_has_Genre
        INNER JOIN Genre
            ON Genre.idGenre = Band_has_Genre.Genre_idGenre
        WHERE Band_has_Genre.Band_idBand = :id
    ");

        $stmt->execute([
            "id" => $bandId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function follow(int $id, int $idFollow, bool $request)
    {
        if ($request) {
            $stmt = $this->pdo->prepare("
            insert into Follow_Band
            (
                idUser,
                idBand
            )
            Values
            (:id,:idFollow)");
        } else {
            $stmt = $this->pdo->prepare("
            DELETE FROM Follow_Band WHERE idUser=:id AND idBand=:idFollow;");
        }
        return $stmt->execute([
            ":id" => $id,
            ":idFollow" => $idFollow
        ]);
    }
    public function getFollowersCount(int $idBand): int
    {
        $stmt = $this->pdo->prepare("
        SELECT COUNT(*)
        FROM Follow_Band
        WHERE idBand = ?
    ");

        $stmt->execute([$idBand]);

        return (int)$stmt->fetchColumn();
    }
}
