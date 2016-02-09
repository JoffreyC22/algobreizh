<?php
require 'conf/conf.php';
define('PAGE','PANIER');

require 'conf/conf_page.php';
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
$montatPanier = 0 ;
foreach($itemsPanier as $itemPanier)
   $montatPanier += $itemPanier['prix'] * $itemPanier['qte'];
             
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
        case 'confirmCart' : 
            $dateCommande = date('Y-m-d H:i:s'); 
            
            $commande = new Commandes();
            $commande->setCodeClient($_SESSION['customer']['codeClient']);
            $commande->setDateCommande($dateCommande);
            $commande->setValide("0");
            $commande->setMontant($montatPanier);
            $commande->setIdUtilisateur($_SESSION['customer']['idClient']);
            
            CommandesManager::addCommandes($commande);
            
            foreach($itemsPanier as $itemPanier){
                $detail = new Details();
                $detail->setCodeArticle($itemPanier['code']);
                $detail->setQteArticle($itemPanier['qte']);
                $detail->setMontant($itemPanier['prix'] * $itemPanier['qte'] );
                $detail->setIdCommande($commande->getIdCommande());
                
                DetailsManager::addDetails($detail);
              
                
            }
            $_SESSION['cart'] = array();
            Utils::redirect('panier.php');
            break;
    };
};
echo $twig->render('panier.twig',array(
    'PAGE' => $_PAGE,
    'itemsPanier' => $itemsPanier,
    'montatPanier' => $montatPanier
   ));