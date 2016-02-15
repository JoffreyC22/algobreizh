<?php
define('NO_LOGIN_REQUIRE', TRUE);
require 'conf/conf.php';

if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'logOut')
    $_SESSION = array();

if (!empty($_SESSION['customer']['utilisateur']) && !empty($_SESSION['customer']['motDePasse']))
    Utils::redirect('home');

if (!empty($_POST)) {
    if(isset($_POST['submit'])){
        $controle = new Errors();
        
        if (empty($_POST['codeClient']))
            $controle->add('Veuillez saisir votre code client', 'codeClient');
        if (empty($_POST['motDePasse']))
            $controle->add('Veuillez saisir votre mot de passe', 'motDePasse');

        if($controle->isEmpty()){
            $utilisateur = $_POST['codeClient'];
            $motDePasse = $_POST['motDePasse'];
            $customer = UtilisateursManager::getUtilisateurByCodeClientAndPassword($utilisateur, $motDePasse);
            
            if($customer){
                $_SESSION['customer']['idClient'] = $customer->getIdUtilisateur();
                $_SESSION['customer']['codeClient'] = $customer->getCodeClient();
                $_SESSION['customer']['codeClient'] = $customer->getCodeClient();
                $_SESSION['customer']['motDePasse'] = $customer->getMotDePasse();
                $_SESSION['customer']['nom'] = $customer->getNom();
                $_SESSION['customer']['prenom'] = $customer->getPrenom();
                $_SESSION['customer']['email'] = $customer->getEmail();
                $_SESSION['customer']['telephone'] = $customer->getTelephone();
                $_SESSION['customer']['adresse'] = $customer->getAdresse();
                $_SESSION['customer']['codePostal'] = $customer->getCodePostal();
                $_SESSION['customer']['ville'] = $customer->getVille();
                $_SESSION['customer']['teleprospecteur'] = $customer->getTeleprospecteur();

                ($_SESSION['customer']['teleprospecteur'] == '1') ? Utils::redirect('backoffice/index-admin.php') && define('ADMIN_REQUIRE', TRUE) : Utils::redirect('home');
                
            } else {
                $controle->add('Mot de passe ou code client invalide', 'invalideUser');
            };
        };
    };
};
echo $twig->render('connexion.twig',array(
    'controle' => (isset($controle) && !empty($controle)) ?  $controle : null , 
    'POST' => (isset($_POST) &&  !empty($_POST)) ? $_POST :  '' 
   ));