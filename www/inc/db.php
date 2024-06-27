<?php

$dsn="mysql:dbname=php-devoir_final;host=localhost;charset=utf8";
$username="root";
$password="";

// on essaie de se connecter Ă  MySQL et on retourne un message d'erreur en cas d'Ă©chec

try {
    $pdo = new PDO($dsn, $username, $password);
} catch(Exception $erreur) {
    echo "<h1>Erreur de connexion</h1>";
    var_dump($erreur->getMessage());
    exit();
}