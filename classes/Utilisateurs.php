<?php
class Utilisateurs extends Object {

    private $idUtilisateur;
    private $codeClient;
    private $email;
    private $nom;
    private $prenom;
    private $ville;
    private $codePostal;
    private $adresse;
    private $telephone;
    private $motDePasse;
    private $teleprospecteur;

    public function __construct($utilisateurs =array()) {
        parent::__construct($utilisateurs);
    }

    function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    function getCodeClient() {
        return $this->codeClient;
    }

    function getEmail() {
        return $this->email;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getVille() {
        return $this->ville;
    }

    function getCodePostal() {
        return $this->codePostal;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getMotDePasse() {
        return $this->motDePasse;
    }

    function getTeleprospecteur() {
        return $this->teleprospecteur;
    }


    function setIdUtilisateur($idUtilisateur) {
        return $this->idUtilisateur = $idUtilisateur ;
    }

    function setCodeClient($codeClient) {
        return $this->codeClient = $codeClient ;
    }

    function setEmail($email) {
        return $this->email = $email ;
    }

    function setNom($nom) {
        return $this->nom = $nom ;
    }

    function setPrenom($prenom) {
        return $this->prenom = $prenom ;
    }

    function setVille($ville) {
        return $this->ville = $ville ;
    }

    function setCodePostal($codePostal) {
        return $this->codePostal = $codePostal ;
    }

    function setAdresse($adresse) {
        return $this->adresse = $adresse ;
    }

    function setTelephone($telephone) {
        return $this->telephone = $telephone ;
    }

    function setMotDePasse($motDePasse) {
        return $this->motDePasse = $motDePasse ;
    }

    function setTeleprospecteur($teleprospecteur) {
        return $this->teleprospecteur = $teleprospecteur ;
    }

}
