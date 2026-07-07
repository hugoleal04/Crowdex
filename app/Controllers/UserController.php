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
    public function loginConf(){
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $user = $this->userModel->findByEmail($email);
        if($user){
            $passwordHash = $user["Password"];
            if(password_verify($password, $passwordHash)){
                header("Location: ?controller=user&action=menu");
                exit;
                //die("Login successful");
            } else {
                die("Email or password dont exist");
            }
        }else {
            die("Email or password dont exist");
        }
    }

    public function createUser()
    {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
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
        
        require __DIR__ . "/../Views/User/mainmenu.php";
    }
}
?>