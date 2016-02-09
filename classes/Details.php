<?php
class Details extends Object {

    private $idDetail;
    private $codeArticle;
    private $qteArticle;
    private $montant;
    private $idCommande;

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

}
