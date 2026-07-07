<?php

namespace App\Controllers;

use App\Services\MailService;
use PDO;
use App\Models\User;
use App\Models\Country;

class UserController
{
    private User $userModel;
    private Country $countryModel;

    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);
        $this->countryModel = new Country($pdo);
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
                die("Email or password dont exist");
            }
        } else {
            die("Email or password dont exist");
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

        header("Location: ?controller=user&action=login");
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
}
