<?php
include 'connexion.php';

include 'disc_script.php';

if (isset($_GET['disc_id'])) {
    $id = $_GET['disc_id'];
}
;

try {
    $SQL2 = "UPDATE disc 
            SET disc_picture = :picture
            WHERE disc_id = :id";
    $stmt2 = $conn->prepare($SQL2);

    if ($picture['name'] != "" || $picture['name'] != null) {
        $stmt2->bindParam(':picture', $picture['name']);//nouvelle image
        // echo 'nouvelle image';
    } else {
        $stmt2->bindParam(':picture', $original);//ancienne image
        // echo "l'image n'a pas changé";
    }
    $stmt2->bindParam(':id', $id, PDO::PARAM_INT);

   
    if ($stmt2->execute()) {
        // echo "nouvelle image.";

    } else {
        // echo "Erreur lors de la mise à jour de l'image.";
    }
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}


try {
    $SQL = "UPDATE disc 
        SET disc_title = :titre,
        disc_year = :year,
        disc_label = :label,
        disc_genre = :genre,
        disc_price = :price,
        artist_id = :artist
        WHERE disc_id = :id";
    $stmt = $conn->prepare($SQL);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':label', $label);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':artist', $artist);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Exécutez la première requête SQL
    if ($stmt->execute()) {
        // echo "Mise à jour réussie.";
        header("Location: index.php");

    } else {
        // echo "Erreur lors de la mise à jour.";
    }
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
;


?>