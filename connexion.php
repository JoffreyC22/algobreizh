<?php
define('NO_LOGIN_REQUIRE', TRUE);
require 'conf/conf.php';
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

            if(UtilisateursManager::getUtilisateurByCodeClientAndPassword($utilisateur, $motDePasse)) {
                $_SESSION['utilisateur'] = $utilisateur;
                $_SESSION['motDePasse'] = $motDePasse;

                header('Location: /algobreizh/algobreizh');
            }
        }
    };
};

echo $twig->render('connexion.twig',array(

   ));