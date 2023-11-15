<?php

class personnage {
    private $_nom;
    private $_prenom;
    private $_age;
    private $_sexe;

public function __construct($nom, $prenom, $age, $sexe) {

    $this->_nom = $nom;
    $this->_prenom = $prenom;
    $this->_age = $age;
    $this->_sexe = $sexe;

}
public function getNom() {
    return $this->_nom;
}

public function getPrenom() {
    return $this->_prenom;
}

public function getAge() {
    return $this->_age;
}

public function getSexe() {
    return $this->_sexe;
}
public function __toString() {
    return "Nom : " . $this->_nom . "<br>Prenom : " . $this->_prenom . "<br>Age : " . $this->_age . "<br>Sexe : " . $this->_sexe;
}
}

?>