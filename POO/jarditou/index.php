<?php
include 'employe.classe.php';

$magasin1 = new magasin("champi", "3 rue de la mort", "80190", "Hell",true);
$magasin2 = new magasin("hallucinogène", "3 rue de la vie", "80200", "heaven", true);
$magasin3 = new magasin("jaihachebé", "15 rue de l'oublie", "45120", "clubnight",false);
$magasin4 = new magasin("quoquahine", "3 rue de la sniff", "92100", "tarin", true);
$magasin5 = new magasin("Olivander", "chemin de travers", "25100", "Poudlard", false);

$employe1 = new employe("Deur", "Ro", "2023-10-26", "Accueil", 50000, "Ressource humaine", $magasin1,1,2,0);
$employe2 = new employe("Ceps", "Cordie", "2021-10-25", "Fonction2", 60000, "Service2", $magasin2,0,0,0);
$employe3 = new employe("Gus", "Fun", "2015-10-24", "Fonction3", 70000, "Service3", $magasin3,3,5,1);
$employe4 = new employe("Queur", "Cla", "2013-10-12", "Fonction4", 26500, "Service4", $magasin4,2,0,0);
$employe5 = new employe("Osse", "Col", "2018-03-03", "Fonction5", 23600, "Service5", $magasin5,0,0,10);

echo $employe1;
echo "<br><br>";
echo $employe2;
echo "<br><br>";
echo $employe3;
echo "<br><br>";
echo $employe4;
echo "<br><br>";
echo $employe5;
?>


