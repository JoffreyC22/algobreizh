<?php
require 'conf/conf.php';

echo $twig->render('facture.twig',array(
        'commandes' => CommandesManager::getAllCommandes() ,
       
        
   ));