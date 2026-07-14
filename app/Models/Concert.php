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
                c.idConcert,
                c.Stage,
                c.StartDateTime,
                c.EndDateTime,
                e.idEvent,
                e.Title AS EventTitle,
                e.Description AS EventDescription,
                e.BannerImage,
                b.idBand,
                b.Name AS BandName,
                b.ProfileImage AS BandProfileImage,
                b.CoverImage AS BandCoverImage,
                v.idVenue,
                v.Name AS VenueName,
                ci.idCity,
                ci.Name AS CityName,
                co.idCountry,
                co.Name AS CountryName,
                COALESCE(ROUND(AVG(r.Rating), 1), 0) AS AverageRating,
                COUNT(r.idReview) AS ReviewCount
            FROM Concert c
            INNER JOIN Event e ON e.idEvent = c.Event_idEvent
            INNER JOIN Band b ON b.idBand = c.Band_idBand
            INNER JOIN Venue v ON v.idVenue = e.Venue_idVenue
            INNER JOIN City ci ON ci.idCity = v.City_idCity
            INNER JOIN Country co ON co.idCountry = ci.Country_idCountry
            LEFT JOIN Review r ON r.Concert_idConcert = c.idConcert
            WHERE c.idConcert = ?
            GROUP BY
                c.idConcert,
                c.Stage,
                c.StartDateTime,
                c.EndDateTime,
                e.idEvent,
                e.Title,
                e.Description,
                e.BannerImage,
                b.idBand,
                b.Name,
                b.ProfileImage,
                b.CoverImage,
                v.idVenue,
                v.Name,
                ci.idCity,
                ci.Name,
                co.idCountry,
                co.Name
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOtherConcertsFromEvent(int $idEvent, int $currentConcert): array
    {
        $stmt = $this->pdo->prepare("
            SELECT
                c.idConcert,
                c.Stage,
                c.StartDateTime,
                b.idBand,
                b.Name AS BandName,
                b.ProfileImage AS BandProfileImage,
                COALESCE(ROUND(AVG(r.Rating), 1), 0) AS AverageRating,
                COUNT(r.idReview) AS ReviewCount
            FROM Concert c
            INNER JOIN Band b ON c.Band_idBand = b.idBand
            LEFT JOIN Review r ON c.idConcert = r.Concert_idConcert
            WHERE c.Event_idEvent = ?
              AND c.idConcert <> ?
            GROUP BY
                c.idConcert,
                c.Stage,
                c.StartDateTime,
                b.idBand,
                b.Name,
                b.ProfileImage
            ORDER BY c.StartDateTime ASC
        ");

        $stmt->execute([$idEvent, $currentConcert]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConcertGallery(int $idConcert): array
    {
        $stmt = $this->pdo->prepare("
            SELECT
                m.idMedia,
                m.FileLocation,
                a.Review_idReview
            FROM Media m
            INNER JOIN Album a ON m.Album_idAlbum = a.idAlbum
            INNER JOIN Review r ON a.Review_idReview = r.idReview
            WHERE r.Concert_idConcert = ?
            ORDER BY m.idMedia DESC
        ");

        $stmt->execute([$idConcert]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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
            INNER JOIN Band ON Band.idBand = Concert.Band_idBand
            INNER JOIN Event ON Event.idEvent = Concert.Event_idEvent
            INNER JOIN Venue ON Venue.idVenue = Event.Venue_idVenue
            INNER JOIN City ON City.idCity = Venue.City_idCity
            WHERE Concert.StartDateTime > NOW()
              AND (
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

        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConcertsByBand(int $idBand, bool $upcoming = true): array
    {
        $operator = $upcoming ? '>' : '<';

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
            INNER JOIN Event ON Event.idEvent = Concert.Event_idEvent
            INNER JOIN Venue ON Venue.idVenue = Event.Venue_idVenue
            INNER JOIN City ON City.idCity = Venue.City_idCity
            WHERE Concert.Band_idBand = ?
              AND Concert.StartDateTime {$operator} NOW()
            ORDER BY Concert.StartDateTime
        ");

        $stmt->execute([$idBand]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
