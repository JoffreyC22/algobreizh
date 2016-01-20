<?php
class Articles extends Object {

    private $idArticle;
    private $codeArticle;
    private $libelleArticle;
    private $image;
    private $prix;
    private $unite;
    private $TVA;
    private $idFamille;

    public function __construct($articles =array()) {
        parent::__construct($articles);
    }

    function getIdArticle() {
        return $this->idArticle;
    }

    function getCodeArticle() {
        return $this->codeArticle;
    }

    function getLibelleArticle() {
        return $this->libelleArticle;
    }
    
    function getImage(){
        return $this->image;
    }
    
    function getPrix() {
        return $this->prix;
    }

    function getUnite() {
        return $this->unite;
    }

    function getTVA() {
        return $this->TVA;
    }

    function getIdFamille() {
        return $this->idFamille;
    }


    function setIdArticle($idArticle) {
        return $this->idArticle = $idArticle ;
    }

    function setCodeArticle($codeArticle) {
        return $this->codeArticle = $codeArticle ;
    }

    function setLibelleArticle($libelleArticle) {
        return $this->libelleArticle = $libelleArticle ;
    }
    
    function setImage($image){
        return $this->image = $image;
    }
    
    function setPrix($prix) {
        return $this->prix = $prix ;
    }

    function setUnite($unite) {
        return $this->unite = $unite ;
    }

    function setTVA($tVA) {
        return $this->TVA = $tVA ;
    }

    function setIdFamille($idFamille) {
        return $this->idFamille = $idFamille ;
    }

}
