<?php

class Page extends Object {

    private $name;
    private $css;
    private $js;
    private $title;
    private $description;

    public function __construct($name, $title){
        $this->setName($name);
        $this->setTitle($title);
    }

    public function getName(){ return $this->name; }
    public function getCss(){ return $this->css; }
    public function getJs(){ return $this->js; }
    public function getTitle(){ return $this->title; }
    public function getDescription(){ return $this->description; }

    public function setName($name){ $this->name = $name; }
    public function setCss($css){ $this->css = $css; }
    public function setJs($js){ $this->js = $js; }
    public function setTitle($title){ $this->title = $title; }
    public function setDescription($description){ $this->description = $description; }
    
    function addBreadCrumb($array_fil) {
        $fil = '<a href="index.html">Accueil</a>';
        foreach($array_fil as $url => $lien) {
            $fil .= ' / ';
            if($url == 'final') {
                $fil .= $lien;
                break;
            }
            $fil .= '<a href="' . $url . '">' . $lien . '</a>';
        }
        echo $fil;
    }

}