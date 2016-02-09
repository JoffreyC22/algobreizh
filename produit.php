<?php
require 'conf/conf.php';
define('PAGE','PRODUIT');

require 'conf/conf_page.php';

echo $twig->render('produit.twig',array(
        'PAGE' => $_PAGE,
        'articles' => ArticlesManager::getAllArticles() ,
   ));