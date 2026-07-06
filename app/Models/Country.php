<?php 
namespace App\Models;
use PDO;

class Country
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getCountries(): array
    {
        $stmt = $this->pdo->query("
            SELECT *
            FROM Country
            ORDER BY Name
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?> 