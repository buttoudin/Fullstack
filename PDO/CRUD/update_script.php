<?php
include 'connexion.php';

include 'disc_script.php';

if (isset($_GET['disc_id'])) {
    $id = $_GET['disc_id'];
}
// if (!$picture) {
//   $picture = $original_picture;
// } else {
    
//     $picture = $_POST['original_picture'];
// }


try {
$SQL = "UPDATE disc 
SET disc_title = :titre,
    disc_year = :year,
    disc_picture = :picture,
    disc_label = :label,
    disc_genre = :genre,
    disc_price = :price,
    artist_id = :artist
    WHERE disc_id = :id";
$stmt = $conn->prepare($SQL);
$stmt->bindParam(':titre', $titre);
$stmt->bindParam(':year', $year);
$stmt->bindParam(':picture', $picture);
$stmt->bindParam(':label', $label);
$stmt->bindParam(':genre', $genre);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':artist', $artist);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute()) {
    header('Location: index.php');
}
}
catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

?>