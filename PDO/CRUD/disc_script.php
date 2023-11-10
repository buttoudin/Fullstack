<?php
 include 'connexion.php';

 try {
    $stmt = $conn->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des artistes: " . $e->getMessage();
}
$stmt->closeCursor();


$form['form'] = array(
    array(
        "titre" => "NA",
        "artist" => "NA",
        "year" => "NA",
        "genre" => "NA",
        "label" => "NA",
        "price" => "NA",
        "picture" => "NA",
        "original_picture" => "NA",
        
    
    )
);


array_push($form['form'], array(
    "titre" => $_POST['titre'],
    "artist" => $_POST['artist'],
    "year" => $_POST['year'],
    "genre" => $_POST['genre'],
    "label" => $_POST['label'],
    "price" => $_POST['price'],
    "picture" => $_FILES['picture'],
    "original_picture" => $_POST['original_picture'],
    

)
);


$titre = $form['form'][1]['titre'];
$artist = $form['form'][1]['artist'];
$year = $form['form'][1]['year'];
$genre = $form['form'][1]['genre'];
$label = $form['form'][1]['label'];
$price = $form['form'][1]['price'];
$picture = $form['form'][1]['picture'];
$original = $form['form'][1]['original_picture'];




?>
