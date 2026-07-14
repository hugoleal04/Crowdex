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

    public function createReview(int $idUser, int $idConcert, float $rating, string $text, array $media): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO Review (User_idUser, Concert_idConcert, Rating, Text)
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([$idUser, $idConcert, $rating, $text]);

        $idReview = (int)$this->pdo->lastInsertId();

        if (empty($media['name'][0])) {
            return true;
        }

        $stmt = $this->pdo->prepare("
            INSERT INTO Album (Review_idReview)
            VALUES (?)
        ");

        $stmt->execute([$idReview]);

        $idAlbum = (int)$this->pdo->lastInsertId();

        $stmt = $this->pdo->prepare("
            SELECT COUNT(*)
            FROM Media
            WHERE Album_idAlbum = ?
        ");

        $stmt->execute([$idAlbum]);

        $mediaExistente = (int)$stmt->fetchColumn();
        $total = $mediaExistente + count(array_filter($media['name']));

        if ($total > 5) {
            return false;
        }

        foreach ($media['tmp_name'] as $i => $tmpName) {
            if ($media['error'][$i] !== UPLOAD_ERR_OK) {
                continue;
            }

            $mime = mime_content_type($tmpName);

            if (!str_starts_with($mime, 'image/') && !str_starts_with($mime, 'video/')) {
                continue;
            }

            $extension = strtolower(pathinfo($media['name'][$i], PATHINFO_EXTENSION));
            $fileName = bin2hex(random_bytes(16)) . '.' . $extension;
            $destination = __DIR__ . '/../../public/uploads/media/' . $fileName;

            if (!move_uploaded_file($tmpName, $destination)) {
                continue;
            }

            $relativePath = 'uploads/media/' . $fileName;

            $stmt = $this->pdo->prepare("
                INSERT INTO Media (Album_idAlbum, FileLocation)
                VALUES (?, ?)
            ");

            $stmt->execute([$idAlbum, $relativePath]);
        }

        return true;
    }

    public function getMedia(int $idReview): array
    {
        $stmt = $this->pdo->prepare("
            SELECT
                Media.idMedia,
                Media.FileLocation
            FROM Media
            INNER JOIN Album ON Album.idAlbum = Media.Album_idAlbum
            WHERE Album.Review_idReview = ?
        ");

        $stmt->execute([$idReview]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteMedia(array $mediaIds): void
    {
        foreach ($mediaIds as $id) {
            $stmt = $this->pdo->prepare("
                SELECT FileLocation
                FROM Media
                WHERE idMedia = ?
            ");

            $stmt->execute([$id]);

            $media = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$media) {
                continue;
            }

            $path = __DIR__ . '/../../public/' . $media['FileLocation'];

            if (file_exists($path)) {
                unlink($path);
            }

            $stmt = $this->pdo->prepare("
                DELETE FROM Media
                WHERE idMedia = ?
            ");

            $stmt->execute([$id]);
        }
    }

    public function updateReview(int $idUser, int $idConcert, float $rating, string $text, array $media, array $deleteMedia): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE Review
            SET Rating = ?, Text = ?
            WHERE User_idUser = ? AND Concert_idConcert = ?
        ");

        $stmt->execute([$rating, $text, $idUser, $idConcert]);

        $stmt = $this->pdo->prepare("
            SELECT idReview
            FROM Review
            WHERE User_idUser = ? AND Concert_idConcert = ?
        ");

        $stmt->execute([$idUser, $idConcert]);

        $idReview = (int)$stmt->fetchColumn();

        $stmt = $this->pdo->prepare("
            SELECT idAlbum
            FROM Album
            WHERE Review_idReview = ?
        ");

        $stmt->execute([$idReview]);

        $idAlbum = (int)$stmt->fetchColumn();

        if (!$idAlbum) {
            $stmt = $this->pdo->prepare("
                INSERT INTO Album (Review_idReview)
                VALUES (?)
            ");

            $stmt->execute([$idReview]);

            $idAlbum = (int)$this->pdo->lastInsertId();
        }

        $stmt = $this->pdo->prepare("
            SELECT COUNT(*)
            FROM Media
            WHERE Album_idAlbum = ?
        ");

        $stmt->execute([$idAlbum]);

        $mediaExistente = (int)$stmt->fetchColumn();
        $mediaNova = count(array_filter($media['name']));
        $total = $mediaExistente - count($deleteMedia) + $mediaNova;

        if ($total > 5) {
            return false;
        }

        $this->deleteMedia($deleteMedia);

        if (!empty($media['name'][0])) {
            foreach ($media['tmp_name'] as $i => $tmpName) {
                if ($media['error'][$i] !== UPLOAD_ERR_OK) {
                    continue;
                }

                $mime = mime_content_type($tmpName);

                if (!str_starts_with($mime, 'image/') && !str_starts_with($mime, 'video/')) {
                    continue;
                }

                $extension = strtolower(pathinfo($media['name'][$i], PATHINFO_EXTENSION));
                $fileName = bin2hex(random_bytes(16)) . '.' . $extension;
                $destination = __DIR__ . '/../../public/uploads/media/' . $fileName;

                if (!move_uploaded_file($tmpName, $destination)) {
                    continue;
                }

                $relativePath = 'uploads/media/' . $fileName;

                $stmt = $this->pdo->prepare("
                    INSERT INTO Media (Album_idAlbum, FileLocation)
                    VALUES (?, ?)
                ");

                $stmt->execute([$idAlbum, $relativePath]);
            }
        }

        return true;
    }

    public function getReviewsByConcert(int $idConcert): array
    {
        $stmt = $this->pdo->prepare("
            SELECT
                r.idReview,
                r.Rating,
                r.Text,
                r.CreatedAt,
                u.idUser,
                u.Username,
                u.Name,
                u.PFP
            FROM Review r
            INNER JOIN User u ON r.User_idUser = u.idUser
            WHERE r.Concert_idConcert = ?
            ORDER BY r.CreatedAt DESC
        ");

        $stmt->execute([$idConcert]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReviewById(int $idReview): array|false
    {
        $sql = "
            SELECT
                r.idReview,
                r.Rating,
                r.Text,
                r.CreatedAt,
                r.Likes,
                u.idUser,
                u.Username,
                u.Name,
                u.PFP,
                c.idConcert,
                c.Stage,
                c.StartDateTime,
                c.EndDateTime,
                b.idBand,
                b.Name AS BandName,
                b.ProfileImage AS BandProfileImage,
                b.CoverImage AS BandCoverImage,
                e.idEvent,
                e.Title AS EventTitle,
                e.BannerImage,
                e.Description AS EventDescription,
                v.Name AS VenueName,
                ci.Name AS CityName,
                co.Name AS CountryName,
                COALESCE(ROUND(AVG(r2.Rating), 1), 0) AS AverageRating,
                COUNT(DISTINCT r2.idReview) AS ReviewCount
            FROM Review r
            INNER JOIN User u ON r.User_idUser = u.idUser
            INNER JOIN Concert c ON r.Concert_idConcert = c.idConcert
            INNER JOIN Band b ON c.Band_idBand = b.idBand
            INNER JOIN Event e ON c.Event_idEvent = e.idEvent
            INNER JOIN Venue v ON e.Venue_idVenue = v.idVenue
            INNER JOIN City ci ON v.City_idCity = ci.idCity
            INNER JOIN Country co ON ci.Country_idCountry = co.idCountry
            LEFT JOIN Review r2 ON r2.Concert_idConcert = c.idConcert
            WHERE r.idReview = ?
            GROUP BY
                r.idReview,
                r.Rating,
                r.Text,
                r.CreatedAt,
                r.Likes,
                u.idUser,
                u.Username,
                u.Name,
                u.PFP,
                c.idConcert,
                c.Stage,
                c.StartDateTime,
                c.EndDateTime,
                b.idBand,
                b.Name,
                b.ProfileImage,
                b.CoverImage,
                e.idEvent,
                e.Title,
                e.BannerImage,
                e.Description,
                v.Name,
                ci.Name,
                co.Name
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$idReview]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getReviewByUserAndConcert(int $idUser, int $idConcert): array|false
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM Review
            WHERE User_idUser = ? AND Concert_idConcert = ?
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
            INNER JOIN Review ON Follow.idFollowing = Review.User_idUser
            INNER JOIN User ON User.idUser = Review.User_idUser
            INNER JOIN Concert ON Concert.idConcert = Review.Concert_idConcert
            INNER JOIN Band ON Band.idBand = Concert.Band_idBand
            INNER JOIN Event ON Event.idEvent = Concert.Event_idEvent
            WHERE Follow.idFollower = ?
            ORDER BY Review.CreatedAt DESC
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
