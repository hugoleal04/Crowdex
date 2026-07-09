<?php

namespace App\Controllers;

use App\Services\MailService;
use App\Models\Notification;
use App\Models\Review;

use PDO;
use App\Models\User;
use App\Models\Concert;

class ReviewController
{
    private User $userModel;
    private Concert $ConcertModel;
    private Review $reviewModel;


    function createReview(){
        $rating = (float)$_POST["rating"];
        $idConcert = $_POST["concert_id"];
        $text = $_POST["text"];

        $reviews = $this->reviewModel->createReview($_SESSION["user_id"], $idConcert,$rating, $text);
    }
}