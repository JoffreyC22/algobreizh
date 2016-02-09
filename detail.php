<?php

require 'conf/conf.php';

if (empty($_GET['id']) && !isset($_GET['id'])) {
    Utils::redirect('index.php');
}



echo $twig->render('detail.twig', array(
    'commandes' => CommandesManager::getCommandesById($_GET['id']),
    'utilisateurs' => UtilisateursManager::getUtilisateursById($_SESSION['customer']['id']),
    'articles' => ArticlesManager::getArticlesById($_GET['id']),
    'details' => DetailsManager::getDetailsByIdCommande($_GET['id']),
));

var_dump($_SESSION);