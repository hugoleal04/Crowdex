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

    /*     public function getUpcomingConcertsByUserCountryAndFollow(int $id): array|false
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
            INNER JOIN Band ON Band.idBand = Concert.Band_idBand 
            INNER JOIN Event ON Event.idEvent = Concert.Event_idEvent 
            INNER JOIN Venue ON Venue.idVenue = Event.Venue_idVenue 
            INNER JOIN City ON City.idCity = Venue.City_idCity 
        WHERE Concert.StartDateTime > NOW() AND City.Country_idCountry = (SELECT Country_idCountry FROM User WHERE idUser = ?) 
        ORDER BY Concert.StartDateTime ASC LIMIT ?; ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } */
    public function getUpcomingConcertsByUserCountry(int $userId, int $limit = 3): array
    {
        $stmt = $this->pdo->prepare("
        SELECT
            Concert.idConcert,
            Concert.Stage,
            Concert.StartDateTime,

            Band.idBand,
            Band.Name AS BandName,
            Band.ProfileImage AS BandProfileImage,
            Band.CoverImage AS BandCoverImage,

            Event.Title AS EventTitle,

            Venue.Name AS VenueName,
            City.Name AS CityName,

            EXISTS(
                SELECT 1
                FROM Follow_Band fb
                WHERE fb.idUser = :userId
                AND fb.idBand = Band.idBand
            ) AS Following

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

            AND
            (
                City.Country_idCountry = (
                    SELECT Country_idCountry
                    FROM User
                    WHERE idUser = :userId
                )

                OR EXISTS(
                    SELECT 1
                    FROM Follow_Band fb
                    WHERE fb.idUser = :userId
                    AND fb.idBand = Band.idBand
                )
            )

        ORDER BY Concert.StartDateTime ASC

        LIMIT :limit
    ");

        $stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getConcertsByBand(int $idBand, bool $upcoming = true): array
    {
        $operator = $upcoming ? ">" : "<";

        $stmt = $this->pdo->prepare("
        SELECT
            Concert.idConcert,
            Concert.Stage,
            Concert.StartDateTime,

            Event.Title AS EventTitle,
            Event.BannerImage,

            Venue.Name AS VenueName,
            City.Name AS CityName

        FROM Concert

        INNER JOIN Event
            ON Event.idEvent = Concert.Event_idEvent

        INNER JOIN Venue
            ON Venue.idVenue = Event.Venue_idVenue

        INNER JOIN City
            ON City.idCity = Venue.City_idCity

        WHERE Concert.Band_idBand = ?
          AND Concert.StartDateTime {$operator} NOW()

        ORDER BY Concert.StartDateTime
    ");

        $stmt->execute([$idBand]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getConcertById(int $id): array|false
    {
        $stmt = $this->pdo->prepare("
        SELECT
            Concert.idConcert,
            Concert.Stage,
            Concert.StartDateTime,
            Concert.EndDateTime,

            Event.idEvent,
            Event.Title AS EventTitle,
            Event.BannerImage,

            Band.idBand,
            Band.Name AS BandName,
            Band.ProfileImage AS BandProfileImage,
            Band.CoverImage AS BandCoverImage,

            Venue.idVenue,
            Venue.Name AS VenueName,

            City.idCity,
            City.Name AS CityName,

            Country.idCountry,
            Country.Name AS CountryName

        FROM Concert

        INNER JOIN Event
            ON Event.idEvent = Concert.Event_idEvent

        INNER JOIN Band
            ON Band.idBand = Concert.Band_idBand

        INNER JOIN Venue
            ON Venue.idVenue = Event.Venue_idVenue

        INNER JOIN City
            ON City.idCity = Venue.City_idCity

        INNER JOIN Country
            ON Country.idCountry = City.Country_idCountry

        WHERE Concert.idConcert = ?
    ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
