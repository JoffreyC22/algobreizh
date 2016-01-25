<?php
require 'conf/conf.php';


echo $twig->render('commande.twig',array(
        'commandes' => CommandesManager::getAllCommandes() ,
       
        
   ));