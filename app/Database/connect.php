<?php

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=Crowdex;charset=utf8mb4",
        "phpuser",
        "123456"
    );

    //echo "Ligação estabelecida!";
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
