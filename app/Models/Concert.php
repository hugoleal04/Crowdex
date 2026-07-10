<?php

namespace App\Models;

use PDO;

class Concert
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getConcertById(int $id): array|false
    {
        $stmt = $this->pdo->prepare("
        SELECT
            Concert.*,

            Band.Name AS BandName,
            Band.ProfileImage AS BandProfileImage,

            Event.Title AS EventTitle,
            Event.BannerImage AS EventBannerImage,
            Event.StartDateTime AS EventStartDateTime,
            Event.EndDateTime AS EventEndDateTime

        FROM Concert

        INNER JOIN Band
            ON Concert.Band_idBand = Band.idBand

        INNER JOIN Event
            ON Concert.Event_idEvent = Event.idEvent

        WHERE Concert.idConcert = ?;
    ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
