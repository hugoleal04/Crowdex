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
}
