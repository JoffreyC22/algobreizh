<?php

require 'conf/conf.php';

if (empty($_GET['id']) && !isset($_GET['id'])) {
    Utils::redirect('index.php');
} else {
	$detail = DetailsManager::getDetailsByIdCommande($_GET['id']);
	
	$totalHT = 0;
	foreach ($detail as $details) {
		$totalHT += round($details->getMontant(), 2);
	}
}

echo $twig->render('detail.twig', array(
    'commandes' => CommandesManager::getCommandesById($_GET['id']),
    'utilisateurs' => UtilisateursManager::getUtilisateursById($_SESSION['customer']['idClient']),
    'articles' => ArticlesManager::getArticlesById($_GET['id']),
    'details' => DetailsManager::getDetailsByIdCommande($_GET['id']),
    'totalHT' => $totalHT,
));