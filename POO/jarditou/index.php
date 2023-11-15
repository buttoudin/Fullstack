<?php
include 'employe.classe.php';

$employe1 = new employe("Tar", "Salba ", "2023-10-26 12:30:00", "Accueil", 50000, "Ressource humaine");
$employe2 = new employe("Nom2", "Prenom2", "2021-10-25 10:45:00", "Fonction2", 60000, "Service2");
$employe3 = new employe("Nom3", "Prenom3", "2015-10-24 08:15:00", "Fonction3", 70000, "Service3");

echo $employe1;
echo "<br><br>";
echo $employe2;
echo "<br><br>";
echo $employe3;
?>