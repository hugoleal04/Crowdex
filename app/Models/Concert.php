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
            Concert.idConcert,
            Concert.Stage,
            Concert.StartDateTime,

            Band.Name AS BandName,
            Band.ProfileImage AS BandProfileImage,
	    Band.CoverImage AS BandCoverImage,


            Event.Title AS EventTitle,

            Venue.Name AS VenueName,
            City.Name AS CityName

        FROM Concert

        INNER JOIN Band
            ON Band.idBand = Concert.Band_idBand

        INNER JOIN Event
            ON Event.idEvent = Concert.Event_idEvent

        INNER JOIN Venue
            ON Venue.idVenue = Event.Venue_idVenue

        INNER JOIN City
            ON City.idCity = Venue.City_idCity

        WHERE
            Concert.StartDateTime > NOW()

            AND City.Country_idCountry = (
                SELECT Country_idCountry
                FROM User
                WHERE idUser = ?
            )

        ORDER BY Concert.StartDateTime ASC

        LIMIT ?;
    ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUpcomingConcertsByUserCountry(int $userId, int $limit = 3): array
    {
        $stmt = $this->pdo->prepare("
        SELECT
            Concert.idConcert,
            Concert.Stage,
            Concert.StartDateTime,

            Band.Name AS BandName,
            Band.ProfileImage AS BandProfileImage,

            Event.Title AS EventTitle,

            Venue.Name AS VenueName,
            City.Name AS CityName

        FROM Concert

        INNER JOIN Band
            ON Band.idBand = Concert.Band_idBand

        INNER JOIN Event
            ON Event.idEvent = Concert.Event_idEvent

        INNER JOIN Venue
            ON Venue.idVenue = Event.Venue_idVenue

        INNER JOIN City
            ON City.idCity = Venue.City_idCity

        WHERE
            Concert.StartDateTime > NOW()

            AND City.Country_idCountry = (
                SELECT Country_idCountry
                FROM User
                WHERE idUser = ?
            )

        ORDER BY Concert.StartDateTime ASC

        LIMIT ?
    ");

        $stmt->bindValue(1, $userId, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
