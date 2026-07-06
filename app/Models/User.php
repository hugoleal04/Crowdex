<?php 
namespace App\Models;
use PDO;

class User{
    public function findByEmail(string $email){
        $stmt = $this->pdo->prepare("
        SELECT *
        FROM User
        WHERE Email =?
        ");

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?> 