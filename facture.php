<?php

require 'conf/conf.php';
define('PAGE','FACTURE');

require 'conf/conf_page.php';

<<<<<<< Updated upstream
echo $twig->render('facture.twig',array(
        'PAGE' => $_PAGE,
        'commandes' => CommandesManager::getAllCommandes() ,
       
        
   ));
=======

echo $twig->render('facture.twig', array(
    'commandes' => CommandesManager::getCommandesByIdUtilisateurValidee($_SESSION['customer']['id']),
));
>>>>>>> Stashed changes
