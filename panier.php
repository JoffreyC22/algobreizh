<?php
require 'conf/conf.php';
$panier = new Panier();
$panier->showCart();
$items = $panier->showCart();

$itemsPanier = array();

if(!empty($items)){

foreach($items['ref'] as $key => $item){
    $article = ArticlesManager::getAllArticlesByCodeArticle($items['ref'][$key]);
    $array = array(
        "code" => $items['ref'][$key],
        "libelle" => $article->getLibelleArticle(),
        "prix" => $article->getPrix(),
        "tva" => $article->getTVA(),
        "image" => $article->getImage(),
        "qte" => $items['qte'][$key]
            );
            array_push($itemsPanier, $array);
};
}
/// TRAITEMENT PANIER  

$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : null;
if($action){
    switch($action){
        case 'deleteArticle' :
            
            if(isset($_GET['ref']) && !empty($_GET['ref']))
                $panier->removeItem($_GET['ref']);
            
            Utils::redirect('panier.php');
        break;
        case 'deleteCart' :
            
            $panier->removeCart();
            
            Utils::redirect('panier.php');
        break;
    };
};
echo $twig->render('panier.twig',array(
    'itemsPanier' => $itemsPanier
   ));