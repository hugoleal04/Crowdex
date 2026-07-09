<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Controllers\UserController;
use App\Models\User;

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

require_once __DIR__ . '/../app/Database/connect.php';

if (!isset($_SESSION["user_id"]) && isset($_COOKIE["remember_token"])) {

    $userModel = new User($pdo);
    $user = $userModel->findByRememberToken($_COOKIE["remember_token"]);
    if ($user) {

        $_SESSION["user_id"] = $user["idUser"];
        $_SESSION["username"] = $user["Username"];
    }
}

$controllerName = $_GET["controller"] ?? "auth";
$action = $_GET["action"] ?? "login";

switch ($controllerName) {

    case "user":
        $controller = new UserController($pdo);
        break;

    default:
        die("Controller não encontrado.");
}

if (!method_exists($controller, $action)) {
    die("Action não encontrada.");
}

$controller->$action();
