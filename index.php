<?php

define('PAGE','HOME');
require 'conf/conf.php';
require 'conf/conf_page.php';



echo $twig->render('index.twig', array(
    'nbCommandes' => commandesManager::countCommandesValideesByIdClient($_SESSION['customer']['idClient']),
    'nbEncours' => commandesManager::countCommandesEncoursByIdClient($_SESSION['customer']['idClient']),
    'commandes' => commandesManager::getAllCommandes(),
    'PAGE' => $_PAGE
));
