<?php
require 'conf/conf.php';
define('PAGE','CONTACT');

require 'conf/conf_page.php';

$sentMail = 'sentmail';


if (!empty($_POST)) {
    if(isset($_POST['submit'])){
        $controle = new Errors();
        
        if (empty($_POST['email']))
            $controle->add('Veuillez saisir votre e-mail', 'email');
        if (empty($_POST['name']))
            $controle->add('Veuillez saisir votre nom', 'name');
        if (empty($_POST['message']))
            $controle->add('Veuillez saisir votre message', 'message');


        if($controle->isEmpty()){
            $sentMessage = new Mail;
            $customer = UtilisateursManager::getUtilisateursById($_SESSION['customer']['idClient']);
            $sentMail = $sentMessage->Contact($customer);
            if($sentMail)
                $sentMail = 'send';
            
            
            
        };    

    };
};


echo $twig->render('contact.twig',array(
   'PAGE' => $_PAGE,
   'controle' => (isset($controle) && !empty($controle)) ?  $controle : null , 
   'POST' => (isset($_POST) &&  !empty($_POST)) ? $_POST :  '', 
   'send' => $sentMail 

       ));
