<?php

require 'conf/conf.php';
define('PAGE','COMMANDE');

<<<<<<< Updated upstream
require 'conf/conf_page.php';

echo $twig->render('commande.twig',array(
        'PAGE' => $_PAGE,
        'commandes' => CommandesManager::getAllCommandes() ,
       
        
   ));
=======
if (empty($_SESSION['customer']['id']) && !isset($_SESSION['customer']['id'])) {
    Utils::redirect('index.php');
}

echo $twig->render('commande.twig', array(
    'commandes' => CommandesManager::getCommandesByIdUtilisateur($_SESSION['customer']['id']),
));







>>>>>>> Stashed changes
