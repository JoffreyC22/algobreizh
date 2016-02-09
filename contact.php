<?php
require 'conf/conf.php';
define('PAGE','CONTACT');

require 'conf/conf_page.php';
echo $twig->render('contact.twig',array(
   'PAGE' => $_PAGE,
   ));