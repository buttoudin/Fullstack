<?php

class magasin{

    private $nom_mag;
    private $adresse_mag;
    private $postal_mag;
    private $ville_mag;
    private $restaurant;
    
    
    public function __construct($nom_mag, $adresse_mag, $postal_mag, $ville_mag, $restaurant){
        $this->nom_mag = $nom_mag;
        $this->adresse_mag = $adresse_mag;
        $this->postal_mag = $postal_mag;
        $this->ville_mag = $ville_mag;
        $this->restaurant = $restaurant;
    }
    public function getNom_mag(){
        return $this->nom_mag;
    }
    public function getAdresse_mag(){
        return $this->adresse_mag;
    }
    public function getPostal_mag(){
        return $this->postal_mag;
    }
    public function getVille_mag(){
        return $this->ville_mag;
    }
    public function getRestaurant(){
        return $this->restaurant;
    }

    public function VerifRestaurant(){
        if ($this->restaurant){
            $restau = "Il y a un restaurant d'entreprise, vous n'avez donc pas droit au ticket restaurant.";
            return $restau;
        }
        else{
            $restau = "Non il n'y a pas de restaurant d'entreprise, vous avez donc droit au ticket restaurant.";
            return $restau;
        }
        
    }
    
    }
    class employe extends magasin
    {
        private $Nom;
        private $Prenom;
        private $Date;
        private $Fonction;
        private $Salaire;
        private $Service;
        private $temps;
        private $Magasin;
        private $enfant0_10;
        private $enfant11_15;
        private $enfant16_18;
    
        public function __construct($Nom, $Prenom, $Date, $Fonction, $Salaire, $Service, $magasin, $enfant0_10, $enfant11_15, $enfant16_18)
        {
            parent::__construct($magasin->getNom_mag(), $magasin->getAdresse_mag(), $magasin->getPostal_mag(), $magasin->getVille_mag(), $magasin->getRestaurant());
    
            $this->Nom = $Nom;
            $this->Prenom = $Prenom;
            $this->Date = $Date;
            $this->Fonction = $Fonction;
            $this->Salaire = $Salaire;
            $this->Service = $Service;
            $this->Magasin = $magasin;
            $this->enfant0_10 = $enfant0_10;
            $this->enfant11_15 = $enfant11_15;
            $this->enfant16_18 = $enfant16_18;
            $this->noel();
            $this->Vacance();
            $this->restaurant = $magasin->getRestaurant();
            $this->calculerTempsEmploi();
            $this->CalculPrime();
        }

    public function getNom()
    {
        return $this->Nom;
    }

    public function getPrenom()
    {
        return $this->Prenom;
    }

    public function getDate()
    {
        return $this->Date;
    }

    public function getFonction()
    {
        return $this->Fonction;
    }

    public function getSalaire()
    {
        return $this->Salaire;
    }

    public function getService()
    {
        return $this->Service;
    }
    public function getMagasin()
    {
        return $this->Magasin;
    }
   

    private function calculerTempsEmploi()
    {
        $DateActuelle = time();
        $DateEmbauche = strtotime($this->Date);
        $differenceEnSecondes = $DateActuelle - $DateEmbauche;
        $annee = floor($differenceEnSecondes / (60 * 60 * 24 * 365)); // Convertir les secondes en jours
        $this->AnneeDansLentreprise = $annee;
    }

    public function getAnneeDansLentreprise()
    {
        return $this->AnneeDansLentreprise;
    }

    public function getFormatDate()
    {
        return date('Y-m-d', strtotime($this->Date));
    }
    public function CalculPrime()
    {
        if ($this->AnneeDansLentreprise != 0) {
            $prime = ((5 + (2 * $this->AnneeDansLentreprise)) * $this->Salaire ) / 100;
            $this->Prime = $prime;
        } else {
            $prime = (5 * $this->Salaire) / 100;
            $this->Prime = $prime;
        }
        if (date('m-d') == '11-30') {
           $this->Virement = 'Virement effectué';
        } else {
            $this ->Virement = 'Le virement sera effectué le 30/11';
        }
        
    }
    public function Vacance(){
        if ($this->AnneeDansLentreprise > 0 ){
            $cheque = "Vous avez le droit au chéques vacance.";
            return $cheque;
        }else{
            $cheque = "Vous n'avez pas le droit au bonheur pour l'instant.";
            return $cheque;
        }

        
    }
    public function getVirement(){
        return $this->Virement;
    }
    public function getPrime()
    {
        return $this->Prime;
    }
    
    public function noel(){
        $chequeNoel = 0;
        if ($this->enfant0_10 !=0 || $this->enfant11_15 !=0 || $this->enfant16_18 !=0){
            for ($i=0; $i < $this->enfant0_10; $i++) { 
                $chequeNoel = $chequeNoel + 20;
            }
            for ($i=0; $i < $this->enfant11_15; $i++) { 
                $chequeNoel = $chequeNoel + 30;
            }
            for ($i=0; $i < $this->enfant16_18; $i++) { 
                $chequeNoel = $chequeNoel + 50;
            }
            return "Vous avez le droit à " . $chequeNoel . "€, joyeux noël !";
        }else{
            return "Vous n'avez pas le droit au chéque de Noël.";
        }
    }
    public function __toString()
    {
        return "Nom : " . $this->Nom . "<br>Prenom : " . $this->Prenom . "<br>Date : " . $this->getFormatDate() .
            "<br>Fonction : " . $this->Fonction . "<br>Salaire : " . $this->Salaire . "<br>Service : " .
            $this->Service . "<br>Année(s) dans l'entreprise : " . $this->getAnneeDansLentreprise() . "<br>Prime : " . $this->getPrime() . " " 
            . $this->getVirement() . "<br>Magasin :" . $this->getNom_mag() . "<br>Adresse : ". $this->getAdresse_mag() . " " .$this->getVille_mag() . " "  .
            $this->getPostal_mag() . "<br>Restauration : ". $this->VerifRestaurant() . "<br>Chéque vacance : ". 
            $this->vacance() . "<br>Chéques noël : ". $this->noel() . "<br> <br>";
    }
 

}



?>