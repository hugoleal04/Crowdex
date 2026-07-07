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
}
