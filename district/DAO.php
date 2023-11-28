<?php

$servername = "localhost";
$username = "admin";
$password = "afpa1234";
$dbname = "district";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}

function categorie_index($conn)
{
    $stmt = $conn->query("SELECT DISTINCT categorie.* from categorie
    JOIN plat ON categorie.id=plat.id_categorie
    JOIN commande ON plat.id=commande.id_plat
    WHERE categorie.active = 'YES'
    ORDER BY commande.quantite DESC
    LIMIT 6");
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
function plat_index($conn)
{
    $stmt = $conn->query("SELECT * FROM plat limit 5");
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
function categorie_categorie($conn)
{
    $stmt = $conn->query("SELECT * FROM categorie WHERE active = 'YES'");
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
function plat_plat($conn)
{
    $stmt = $conn->query("SELECT * FROM plat limit 6");
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
function commande_commande($conn)
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM plat WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result;
    }
}
function envoie($conn)
{

    
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $total = floatval($prix) * floatval($quantite);
    $date = date('Y-m-d H:i:s');
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $nomPrenom = $_POST['NomPrenom'];
    $numero = $_POST['numero'];
    $courriel = $_POST['courriel'];
    $adresse = $_POST['adresse'];

    $SQL = "INSERT INTO commande (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client)
                VALUES (:id_plat, :quantite, :total, :dates, 'En préparation', :nom, :numero, :courriel, :adresse)";

    $stmt = $conn->prepare($SQL);
    $stmt->bindParam(':id_plat', $_POST['id_plat']);
    $stmt->bindParam(':quantite', $quantite);
    $stmt->bindParam(':total', $total);
    $stmt->bindParam(':dates', $date);
    $stmt->bindParam(':nom', $nomPrenom);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':courriel', $courriel);
    $stmt->bindParam(':adresse', $adresse);

    if ($stmt->execute()) {
    } else {
        echo "Erreur : " . implode(", ", $stmt->errorInfo());
    }
    
}

?>