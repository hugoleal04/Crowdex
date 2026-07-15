<?php

namespace App\Models;

use PDO;

class Event
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getEventsBySimilarName(string $similarName): array
    {
        $stmt = $this->pdo->prepare("
            SELECT
                e.idEvent,
                e.Title,
                e.StartDateTime,
                e.EndDateTime,
                c.Name AS City
            FROM Event e
            INNER JOIN Venue v ON e.Venue_idVenue = v.idVenue
            INNER JOIN City c ON v.City_idCity = c.idCity
            WHERE e.Title LIKE :name
        ");

        $stmt->execute(['name' => "%{$similarName}%"]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDays(int $eventId): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT
                StartDateTime,
                EndDateTime
            FROM Event
            WHERE idEvent = :eventId
        ");

        $stmt->execute(['eventId' => $eventId]);

        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        return $event ?: null;
    }
    public function getEventById(int $idEvent): array|false
    {
        $stmt = $this->pdo->prepare("
        SELECT
            e.idEvent,
            e.Title,
            e.Description,
            e.BannerImage,
            e.StartDateTime,
            e.EndDateTime,
            e.MinimumAge,
            e.Capacity,
            e.TicketUrl,
            v.idVenue,
            v.Name AS VenueName,
            v.Address,
            v.ZipCode,
            v.Latitude,
            v.Longitude,
            ci.Name AS CityName,
            co.Name AS CountryName,
            COUNT(DISTINCT c.idConcert) AS ConcertCount,
            COUNT(DISTINCT r.idReview) AS ReviewCount,
            COUNT(DISTINCT g.idGroup) AS GroupCount,
            COALESCE(ROUND(AVG(r.Rating), 1), 0) AS AverageRating
        FROM Event e
        INNER JOIN Venue v ON e.Venue_idVenue = v.idVenue
        INNER JOIN City ci ON v.City_idCity = ci.idCity
        INNER JOIN Country co ON ci.Country_idCountry = co.idCountry
        LEFT JOIN Concert c ON c.Event_idEvent = e.idEvent
        LEFT JOIN Review r ON r.Concert_idConcert = c.idConcert
        LEFT JOIN `Group` g ON g.Event_idEvent = e.idEvent
        WHERE e.idEvent = ?
        GROUP BY
            e.idEvent,
            e.Title,
            e.Description,
            e.BannerImage,
            e.StartDateTime,
            e.EndDateTime,
            e.MinimumAge,
            e.Capacity,
            e.TicketUrl,
            v.idVenue,
            v.Name,
            v.Address,
            v.ZipCode,
            v.Latitude,
            v.Longitude,
            ci.Name,
            co.Name
    ");

        $stmt->execute([$idEvent]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getConcertsFromEvent(int $idEvent): array
    {
        $stmt = $this->pdo->prepare("
        SELECT
            c.idConcert,
            c.Stage,
            c.StartDateTime,
            c.EndDateTime,
            b.Name AS BandName,
            b.ProfileImage AS BandProfileImage,
            b.CoverImage AS BandCoverImage,
            COALESCE(ROUND(AVG(r.Rating), 1), 0) AS AverageRating,
            COUNT(DISTINCT r.idReview) AS ReviewCount
        FROM Concert c
        INNER JOIN Band b ON c.Band_idBand = b.idBand
        LEFT JOIN Review r ON r.Concert_idConcert = c.idConcert
        WHERE c.Event_idEvent = ?
        GROUP BY
            c.idConcert,
            c.Stage,
            c.StartDateTime,
            c.EndDateTime,
            b.Name,
            b.ProfileImage,
            b.CoverImage
        ORDER BY c.StartDateTime ASC
        ");

        $stmt->execute([$idEvent]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGroupsFromEvent(int $idEvent, int $idUser): array
    {
        $stmt = $this->pdo->prepare("
        SELECT
            g.idGroup,
            g.Name,
            g.User_idUser_Owner,
            g.Description,
            g.MaxMembers,
            g.CreatedAt,
            u.Username AS OwnerUsername,
            u.PFP AS OwnerPFP,
            COUNT(DISTINCT gu.User_idUser) AS CurrentMembers,
            CASE
                WHEN myGroup.User_idUser IS NOT NULL THEN 1
                ELSE 0
            END AS Joined
        FROM `Group` g
        INNER JOIN User u ON g.User_idUser_Owner = u.idUser
        LEFT JOIN Group_has_User gu ON g.idGroup = gu.Group_idGroup
        LEFT JOIN Group_has_User myGroup ON myGroup.Group_idGroup = g.idGroup AND myGroup.User_idUser = ?
        WHERE g.Event_idEvent = ?
        GROUP BY
            g.idGroup,
            g.Name,
            g.Description,
            g.MaxMembers,
            g.CreatedAt,
            g.User_idUser_Owner,
            u.Username,
            u.PFP
        ORDER BY g.CreatedAt DESC
    ");

        $stmt->execute([$idUser, $idEvent]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
