<?php
require 'conf/conf-admin.php';

if (empty($_GET['id']) && !isset($_GET['id'])) {
    Utils::redirect('index-admin.php');
} else {
    $detail = DetailsManager::getDetailsByIdCommande($_GET['id']);
    
    $totalHT = 0;
    foreach ($detail as $details) {
        $totalHT += round($details->getMontant(), 2);
    }

    $commande = CommandesManager::getCommandesById($_GET['id']);

}

echo $twig->render('detail-admin.twig', array(
    'commandes' => CommandesManager::getCommandesById($_GET['id']),
    'utilisateurs' => UtilisateursManager::getUtilisateursById($commande->getIdUtilisateur()),
    'articles' => ArticlesManager::getArticlesById($_GET['id']),
    'details' => DetailsManager::getDetailsByIdCommande($_GET['id']),
    'totalHT' => $totalHT,
));