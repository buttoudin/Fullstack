<?php
include 'connexion.php';

include 'disc_script.php';

$SQL = "INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id)
VALUES (:titre, :year, :picture, :label, :genre, :price, :artist)";
$stmt = $conn->prepare($SQL);
$stmt->bindParam(':titre', $titre);
$stmt->bindParam(':year', $year);
$stmt->bindParam(':picture', $picture);
$stmt->bindParam(':label', $label);
$stmt->bindParam(':genre', $genre);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':artist', $artist);
if ($stmt->execute()) {
    echo "Nouveau vinyle enregistré";
    header('Location: index.php');
} else {
    echo "Erreur : " . implode(", ", $stmt->errorInfo());
}


?>