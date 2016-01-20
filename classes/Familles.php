<?php
class Familles extends Object {

    private $idFamille;
    private $libelleFamille;
    private $codeFamille;

    public function __construct($familles =array()) {
        parent::__construct($familles);
    }

    function getIdFamille() {
        return $this->idFamille;
    }

    function getLibelleFamille() {
        return $this->libelleFamille;
    }

    function getCodeFamille() {
        return $this->codeFamille;
    }


    function setIdFamille($idFamille) {
        return $this->idFamille = $idFamille ;
    }

    function setLibelleFamille($libelleFamille) {
        return $this->libelleFamille = $libelleFamille ;
    }

    function setCodeFamille($codeFamille) {
        return $this->codeFamille = $codeFamille ;
    }

}
