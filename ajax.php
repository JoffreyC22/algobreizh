<?php

define('NO_LOGIN_REQUIRE', TRUE);
include 'conf/conf.php';
$action = !empty($_REQUEST['ajax']) ? $_REQUEST['ajax'] : exit();

switch ($action) {
    case "addPanier" :

        if (isset($_POST)) {
            $panier = new Panier();
            $panier->addItem($_POST['code-produit'], $_POST['nb-produit']);
            Utils::json(array('result' => 'success'));
        }

        break;

    case "inscription" :
        $controle = new Errors();

        if (empty($_POST['codeClientSignIn']))
            $controle->add('Veuillez saisir votre code client', 'codeClientSignIn');
        if (empty($_POST['emailSignIn']))
            $controle->add('Veuillez saisir votre adresse email', 'emailSignIn');
        if (empty($_POST['emailSignIn2']))
            $controle->add('Veuillez confirmez votre adresse email', 'emailSignIn2');
        if ($_POST['emailSignIn'] != $_POST['emailSignIn2'])
            $controle->add('Les adresses email ne sont pas identiques', 'emailNotSame');

        if ($controle->isEmpty()) {
            $codeClientSignIn = $_POST['codeClientSignIn'];
            $emailSignIn = $_POST['emailSignIn'];
            $customer = UtilisateursManager::getUtilisateurByCodeClientAndEmail($codeClientSignIn, $emailSignIn);

            if ($customer) {
                # fonction d'envoie de mot de passe par mail.
                $password = Utils::random();
                $customer->setMotDePasse(sha1($password));

                UtilisateursManager::updateUtilisateurs($customer);
                $mail = Mail::inscription($customer, $password);
                if ($mail) {
                    Utils::json(array('result' => 'success', 'email' => $emailSignIn));
                } else {
                    tils::json(array('result' => 'errorSendMail'));
                };
            } else {
                $controle->add('Code client ou adresse email invalide', 'invalideSignIn');
                Utils::json(array('result' => 'error', 'data' => $controle->getAll()));
            };
        } else {
            Utils::json(array('result' => 'error', 'data' => $controle->getAll()));
        }

        break;
}
