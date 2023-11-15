<?php
class employe
{
    private $Nom;
    private $Prenom;
    private $Date;
    private $Fonction;
    private $Salaire;
    private $Service;
    private $temps;


    public function __construct($Nom, $Prenom, $Date, $Fonction, $Salaire, $Service)
    {

        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Date = $Date;
        $this->Fonction = $Fonction;
        $this->Salaire = $Salaire;
        $this->Service = $Service;
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
    public function getVirement(){
        return $this->Virement;
    }
    public function getPrime()
    {
        return $this->Prime;
    }
    public function __toString()
    {
        return "Nom : " . $this->Nom . "<br>Prenom : " . $this->Prenom . "<br>Date : " . $this->getFormatDate() .
            "<br>Fonction : " . $this->Fonction . "<br>Salaire : " . $this->Salaire . "<br>Service : " .
            $this->Service . "<br>Année(s) dans l'entreprise : " . $this->getAnneeDansLentreprise() . "<br>Prime : " . $this->getPrime() . " " . $this->getVirement() . "<br> <br>";
    }
 

}

?>