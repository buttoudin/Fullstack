<?php

include 'DAO.php';
$libelle = $_POST['libelle'];
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
envoie($conn);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

$mail = new PHPMailer(true);

// On va utiliser le SMTP
$mail->isSMTP();

// On configure l'adresse du serveur SMTP
$mail->Host       = 'localhost';    

// On désactive l'authentification SMTP
$mail->SMTPAuth   = false;    

// On configure le port SMTP (MailHog)
$mail->Port       = 1025;                                   

// Expéditeur du mail - adresse mail + nom (facultatif)
$mail->setFrom('from@thedistrict.com', 'The District Company');

// Destinataire(s) - adresse et nom (facultatif)
$mail->addAddress("$courriel", "$nomPrenom");

//Adresse de reply (facultatif)
$mail->addReplyTo("reply@thedistrict.com", "Reply");

//CC & BCC
$mail->addCC("cc@example.com");
$mail->addBCC("bcc@example.com");

// On précise si l'on veut envoyer un email sous format HTML 
$mail->isHTML(false);


// Sujet du mail
$mail->Subject = 'Récapitulatif commande';

// Corps du message
$mail->Body = "$nomPrenom, vous avez commandez : $quantite $libelle , à l'adresse :  $adresse, au numéro : $numero , pour un total de : $total €";

// On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
if ($mail){
    try {
        $mail->send();
        header('Location: index.php');
        } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo . "<br>Vous allez être rediriger vers la page d'acceuil.";
        header("refresh:5;url=index.php");
    }
    }

?>