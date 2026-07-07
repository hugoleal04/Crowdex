<?php

namespace App\Controllers;

use App\Services\MailService;
use PDO;
use App\Models\User;
use App\Models\Country;
use App\Models\Band;
use App\Models\Event;



class UserController
{
    private User $userModel;
    private Country $countryModel;
    private Band $bandModel;
    private Event $eventModel;


    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);
        $this->countryModel = new Country($pdo);
        $this->bandModel = new Band($pdo);
        $this->eventModel = new Event($pdo);
    }
    public function logout()
    {
        if (isset($_SESSION["user_id"])) {
            $this->userModel->saveRememberToken($_SESSION["user_id"], null);
        }

        $_SESSION = [];
        session_destroy();

        setcookie(
            "remember_token",
            "",
            time() - 3600,
            "/"
        );

        header("Location: ?controller=user&action=login");
        exit;
    }
    public function getUserBySimilarName()
    {
        $name = trim($_GET["name"] ?? "");
        $users = $this->userModel->getUserBySimilarName($name);
    }

    public function loginConf()
    {
        $remember = isset($_POST["remember"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $user = $this->userModel->findByEmail($email);
        if ($user) {
            $passwordHash = $user["Password"];
            if (password_verify($password, $passwordHash)) {
                $_SESSION["user_id"] = $user["idUser"];
                $_SESSION["username"] = $user["Username"];
                $_SESSION["name"] = $user["Name"];
                $_SESSION["email"] = $user["Email"];
                $_SESSION["pfp"] = $user["PFP"];

                if ($remember) {
                    $token = bin2hex(random_bytes(32));

                    $this->userModel->saveRememberToken(
                        $user["idUser"],
                        $token
                    );

                    setcookie(
                        "remember_token",
                        $token,
                        time() + (60 * 60 * 24 * 30),
                        "/",
                        "",
                        false,
                        true
                    );
                }

                header("Location: ?controller=user&action=menu");
                exit;
            } else {
                header("Location: ?controller=user&action=login&error=1");
                exit;
            }
        } else {
            header("Location: ?controller=user&action=login&error=1");
            exit;
        }
    }

    public function createUser()
    {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $username = trim($_POST["username"]);
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $birthday = $_POST["birthday"];
        $countryId = (int)$_POST["country"];

        if ($password !== $confirmPassword) {
            die("As passwords não coincidem.");
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $this->userModel->createUser(
            $name,
            $email,
            $password,
            $birthday,
            $username,
            $countryId
        );

        header("Location: ?controller=user&action=login&register=succesful");
        exit;
    }

    public function register()
    {
        $countries = $this->countryModel->getCountries();
        require __DIR__ . "/../Views/User/register.php";
    }
    public function login()
    {

        require __DIR__ . "/../Views/User/login.php";
    }
    public function menu()
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: ?controller=user&action=login");
            exit;
        }

        require __DIR__ . "/../Views/User/mainmenu.php";
    }
    public function search()
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: ?controller=user&action=login");
            exit;
        }

        $query = trim($_GET["query"] ?? "");

        $users = $this->userModel->getUserBySimilarName($query);
        $bands = $this->bandModel->getBandsBySimilarName($query);
        $events = $this->eventModel->getEventsBySimilarName($query);

        foreach ($bands as &$band) {
            $band["Genres"] = $this->bandModel->getGenres($band["idBand"]);
        }

        require __DIR__ . "/../Views/User/search.php";
    }
    public function settings()
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: ?controller=user&action=login");
            exit;
        }
        require __DIR__ . "/../Views/User/settings.php";
    }
}
