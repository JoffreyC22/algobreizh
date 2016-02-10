<?php
define('PAGE','COMMANDE');
require 'conf/conf.php';
require 'conf/conf_page.php';

if (empty($_SESSION['customer']['idClient']) && !isset($_SESSION['customer']['idClient'])) {
    Utils::redirect('index.php');
}

echo $twig->render('commande.twig', array(
    'commandes' => CommandesManager::getCommandesByIdUtilisateur($_SESSION['customer']['idClient']),
    'PAGE' => $_PAGE
));

