<?php
class Commandes extends Object {

    private $idCommande;
    private $montant;
    private $dateCommande;
    private $codeClient;
    private $valide;
    private $idUtilisateur;
<<<<<<< Updated upstream
=======
    private $tva;
>>>>>>> Stashed changes

    public function __construct($commandes =array()) {
        parent::__construct($commandes);
    }

    function getIdCommande() {
        return $this->idCommande;
    }

    function getMontant() {
        return $this->montant;
    }
    
    function getTva() {
        return $this->tva;
    }
    
    function getMontantHT() {
        $montantHT = $this->montant/1.2;
        return $montantHT;
    }
    
    function getDateCommande() {
        return $this->dateCommande;
    }

    function getCodeClient() {
        return $this->codeClient;
    }

    function getValide() {
        return $this->valide;
    }

    function getIdUtilisateur() {
        return $this->idUtilisateur;
    }
    
    

  
    


    function setIdCommande($idCommande) {
        return $this->idCommande = $idCommande ;
    }

    function setMontant($montant) {
        return $this->montant = $montant ;
    }

    function setDateCommande($dateCommande) {
        return $this->dateCommande = $dateCommande ;
    }
    
    function setTva($tva){
        return $this->tva = $tva;
    }

    function setCodeClient($codeClient) {
        return $this->codeClient = $codeClient ;
    }

    function setValide($valide) {
        return $this->valide = $valide ;
    }

    function setIdUtilisateur($idUtilisateur) {
        return $this->idUtilisateur = $idUtilisateur ;
    }
}
