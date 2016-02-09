<?php
require 'conf/conf.php';
define('PAGE','COMMANDE');

require 'conf/conf_page.php';

echo $twig->render('commande.twig',array(
        'PAGE' => $_PAGE,
        'commandes' => CommandesManager::getAllCommandes() ,
       
        
   ));