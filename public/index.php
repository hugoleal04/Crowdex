<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Controllers\UserController;

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

require_once __DIR__ . '/../app/Database/connect.php';

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