<?php

define('PAGE','HOME');
require 'conf/conf.php';
require 'conf/conf_page.php';


$nbArticles = (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : '0';

echo $twig->render('index.twig', array(
    'nbCommandes' => commandesManager::countCommandesValideesByIdClient($_SESSION['customer']['idClient']),
    'nbEncours' => commandesManager::countCommandesEncoursByIdClient($_SESSION['customer']['idClient']),
    'commandes' => commandesManager::getAllCommandes(),
    'nbArticles' => $nbArticles,
    'PAGE' => $_PAGE
));
