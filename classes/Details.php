<?php
class Details extends Object {

    private $idDetail;
    private $codeArticle;
    private $qteArticle;
    private $montant;
    private $idCommande;
    private $idCommande_commandes;
    private $idArticle;

    public function __construct($details =array()) {
        parent::__construct($details);
    }

    function getIdDetail() {
        return $this->idDetail;
    }

    function getCodeArticle() {
        return $this->codeArticle;
    }

    function getQteArticle() {
        return $this->qteArticle;
    }

    function getMontant() {
        return $this->montant;
    }

    function getIdCommande() {
        return $this->idCommande;
    }

    function getIdCommande_commandes() {
        return $this->idCommande_commandes;
    }

    function getIdArticle() {
        return $this->idArticle;
    }


    function setIdDetail($idDetail) {
        return $this->idDetail = $idDetail ;
    }

    function setCodeArticle($codeArticle) {
        return $this->codeArticle = $codeArticle ;
    }

    function setQteArticle($qteArticle) {
        return $this->qteArticle = $qteArticle ;
    }

    function setMontant($montant) {
        return $this->montant = $montant ;
    }

    function setIdCommande($idCommande) {
        return $this->idCommande = $idCommande ;
    }

    function setIdCommande_commandes($idCommande_commandes) {
        return $this->idCommande_commandes = $idCommande_commandes ;
    }

    function setIdArticle($idArticle) {
        return $this->idArticle = $idArticle ;
    }

}
