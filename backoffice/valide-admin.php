<?php
require 'conf/conf-admin.php';

	echo $twig->render('valide-admin.twig',array(
    	'commandeValide' => commandesManager::getAllCommandesValide(),
   ));