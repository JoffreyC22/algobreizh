<?php
include 'conf/conf.php';
$action = !empty($_REQUEST['ajax']) ? $_REQUEST['ajax'] : exit();

switch($action){
    case "addPanier" : 
            
        if(isset($_POST)){
            $panier = new Panier() ;
            $panier->addItem($_POST['code-produit'], $_POST['nb-produit']);
            Utils::json(array('result' => 'success'));
        }
            
        break;
}
