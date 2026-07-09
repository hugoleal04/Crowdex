<?php

namespace App\Models;

use PDO;

class Concert
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}