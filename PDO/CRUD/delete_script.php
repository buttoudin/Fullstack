<?php

include 'connexion.php';

include 'disc_script.php';

if (isset($_GET['disc_id'])) {
    $id = $_GET['disc_id'];
}

try {
    $SQL="DELETE FROM disc
    WHERE disc_id = :id";
    $stmt = $conn->prepare($SQL);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();
    $stmt->closeCursor();
    if ($stmt->execute()) {
        // echo "Suppression réussie.";
        header("Location: index.php");

    } else {
        // echo "Erreur lors de la suppression.";
    }
} catch (\PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}


?>