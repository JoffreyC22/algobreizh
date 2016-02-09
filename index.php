<?php
require 'conf/conf.php';
define('PAGE','HOME');

require 'conf/conf_page.php';

echo $twig->render('index.twig',array(
    'PAGE' => $_PAGE,
    'nbCommandes' => commandesManager::countCommandesValidees(), 
    'nbEncours' => commandesManager::countCommandesEncours() 
   ));