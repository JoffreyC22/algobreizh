<?php
session_start();

include_once 'autoload.php';
include_once 'assets/libs/Twig/Autoloader.php';

Twig_Autoloader::register();

$twig = new Twig_Environment(new Twig_Loader_Filesystem('templates'), array(
    'cache' => false, // '/path/to/compilation_cache',
    'debug' => true
));

$twig->addExtension(new Twig_Extension_Debug());
$ip = $_SERVER['SERVER_ADDR'];

if( $ip == '127.0.0.1' or 'localhost'){

    define('DB_HOST', 'localhost');
    define('DB_USER', 'florentp');
    define('DB_PASSWORD', 's8f7k11f4');
    define('DB_NAME', 'algobreizh');
    define('PATH', 'http://127.0.0.1/Algobreizh/algobreizh/');

}
else {

    define('DB_HOST', 'ftp.infos');
    define('DB_USER', 'ftp.infos');
    define('DB_PASSWORD', 'ftp.infos');
    define('DB_NAME', 'ftp.infos');
    define('DB_PATH', 'ftp.infos');

}

if(isset($_SESSION['customer']['nom']) && !empty($_SESSION['customer']['nom']))
    $twig->addGlobal('USER_NAME', $_SESSION['customer']['nom']);

if (empty($_SESSION['customer']) && !defined('NO_LOGIN_REQUIRE')){
  header('Location: connexion.php');  
  exit();
}
