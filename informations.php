<?php

require 'conf/conf.php';
define('PAGE', 'INFORMATIONS');

require 'conf/conf_page.php';
$error = "";
if (isset($_POST['submit'])) {

    $customer = UtilisateursManager::getUtilisateursById($_SESSION['customer']['idClient']);

    $customer->setIdUtilisateur($_SESSION['customer']['idClient']);
    $customer->setAdresse($_POST['adresse']);
    $customer->setNom($_POST['company']);
    $customer->setPrenom($_POST['prenom']);
    $customer->setCodePostal($_POST['cp']);
    $customer->setTelephone($_POST['telephone']);
    $customer->setEmail($_POST['email']);

    if (isset($_POST['mdp']) && $_POST['mdp'] != '')
        $customer->setMotDePasse(sha1($_POST['mdp']));

    $customer->setVille($_POST['ville']);

    if ($_POST['mdp'] == $_POST['mdp2']) {
        UtilisateursManager::updateUtilisateurs($customer);
    } else {
        $error = 'les mots de passe ne sont pas indetiques ';
    }
}
echo $twig->render('informations.twig', array(
    'PAGE' => $_PAGE,
    'articles' => ArticlesManager::getAllArticles(),
    'customer' => UtilisateursManager::getUtilisateursById($_SESSION['customer']['idClient']),
    'error' => ($error && $error != "" ) ? $error : false
));
