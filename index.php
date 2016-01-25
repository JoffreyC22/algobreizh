<?php
require 'conf/conf.php';

echo $twig->render('index.twig',array(
    'nbCommandes' => commandesManager::countCommandesValidees(), 
    'nbEncours' => commandesManager::countCommandesEncours() 
   ));