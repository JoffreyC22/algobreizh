<?php
require 'conf/conf.php';
define('PAGE','FACTURE');

require 'conf/conf_page.php';

echo $twig->render('facture.twig',array(
        'PAGE' => $_PAGE,
        'commandes' => CommandesManager::getAllCommandes() ,
       
        
   ));