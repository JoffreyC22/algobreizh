<?php
define('PAGE','FACTURE');
require 'conf/conf.php';
require 'conf/conf_page.php';

	echo $twig->render('facture.twig',array(
        'commandes' => CommandesManager::getCommandesByIdUtilisateurValidee($_SESSION['customer']['idClient']) ,
        'PAGE' => $_PAGE,      
   ));
