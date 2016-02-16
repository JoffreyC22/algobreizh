<?php
require 'conf/conf.php';
define('PAGE','PRODUIT');

require 'conf/conf_page.php';
echo $twig->render('produit.twig',array(
        'PAGE' => $_PAGE,
        'articles' => (isset($_POST['filter']) && $_POST['filter'] != 'all' ) ? ArticlesManager::getArticlesByIdFamille($_POST['filter'] ) : ArticlesManager::getAllArticles() ,
        'familles' => FamillesManager::getAllFamilles(),
        'POST' => $_POST
   ));