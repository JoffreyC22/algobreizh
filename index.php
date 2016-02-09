<?php
require 'conf/conf.php';
<<<<<<< Updated upstream
define('PAGE','HOME');

require 'conf/conf_page.php';

echo $twig->render('index.twig',array(
    'PAGE' => $_PAGE,
    'nbCommandes' => commandesManager::countCommandesValidees(), 
    'nbEncours' => commandesManager::countCommandesEncours() 
   ));
=======


echo $twig->render('index.twig', array(
    'nbCommandes' => commandesManager::countCommandesValidees($_SESSION['customer']['id']),
    'nbEncours' => commandesManager::countCommandesEncours($_SESSION['customer']['id']),
    'commandes' => commandesManager::getAllCommandes(),
));

var_dump($_SESSION);


>>>>>>> Stashed changes
