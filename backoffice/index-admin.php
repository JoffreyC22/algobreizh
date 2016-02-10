<?php
define('PAGE','HOME');
require 'conf/conf-admin.php';
require 'conf/conf_page.php';


	echo $twig->render('index-admin.twig',array(
    'nbCommandes' => commandesManager::countCommandesValidees(), 
    'nbEncours' => commandesManager::countCommandesEncours() 
   ));