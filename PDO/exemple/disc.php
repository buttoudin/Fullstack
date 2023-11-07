<?php
$servername = "localhost";
$username = "admin";
$password = "afpa1234";
$dbname = "district";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // configurer le mode d'erreur PDO pour générer des exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connecté avec succès à la base de données <br>";
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données: <br>" . $e->getMessage();
}

    ?>