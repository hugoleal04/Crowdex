<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Controllers\UserController;
use App\Controllers\ReviewController;
use App\Controllers\ConcertController;
use App\Controllers\BandController;
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
        $_SESSION["name"] = $user["Name"];
        $_SESSION["email"] = $user["Email"];
        $_SESSION["pfp"] = $user["PFP"];
    }
}

$controllerName = $_GET["controller"] ?? "user";
$action = $_GET["action"] ?? "login";

switch ($controllerName) {

    case "user":
        $controller = new UserController($pdo);
        break;

    case "review":
        $controller = new ReviewController($pdo);
        break;

    case "concert":
        $controller = new ConcertController($pdo);
        break;
    case "band":
        $controller = new BandController($pdo);
        break;

    default:
        http_response_code(404);
        require __DIR__ . "/../app/Views/Errors/404.php";
        exit;
}

if (!method_exists($controller, $action)) {

    http_response_code(404);
    require __DIR__ . "/../app/Views/Errors/404.php";
    exit;
}

try {

    $controller->$action();
} catch (\Throwable $e) {

    echo "<pre>";
    echo "Message: " . $e->getMessage() . PHP_EOL;
    echo "File: " . $e->getFile() . PHP_EOL;
    echo "Line: " . $e->getLine() . PHP_EOL;
    echo PHP_EOL;
    echo $e->getTraceAsString();
    exit;
}
