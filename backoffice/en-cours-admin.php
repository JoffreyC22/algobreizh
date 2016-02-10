<?php
require 'conf/conf-admin.php';
	
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$commande = commandesManager::getCommandesById($_GET['id']);
		$commande->setValide('1');
		commandesManager::updateCommandes($commande);
		Utils::redirect('en-cours-admin.php');
	} elseif (isset($_GET['detail']) && !empty($_GET['detail'])) {
		Utils::redirect('detail-admin.php?id='.$_GET['detail']);
	}


	echo $twig->render('en-cours-admin.twig',array(
    	'commandeEnCours' => commandesManager::getAllCommandesEnCours(),
   ));