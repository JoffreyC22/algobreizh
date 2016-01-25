<?php
require 'conf/conf.php';
var_dump($_SESSION);
echo $twig->render('index.twig',array(
    'nbCommandes' => commandesManager::countCommandesValidees(), 
    'nbEncours' => commandesManager::countCommandesEncours() 
   ));