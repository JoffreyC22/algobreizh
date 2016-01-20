<?php
require 'conf/conf.php';


echo $twig->render('produit.twig',array(
        'articles' => ArticlesManager::getAllArticles() ,
   ));