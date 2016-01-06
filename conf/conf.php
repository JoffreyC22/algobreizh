<?php
session_start();

include_once 'autoload.php';
include_once 'assets/libs/Twig/Autoloader.php';

Twig_Autoloader::register();

$twig = new Twig_Environment(new Twig_Loader_Filesystem('templates'), array(
    'cache' => false, // '/path/to/compilation_cache',
    'debug' => false
));

$twig->addExtension(new Twig_Extension_Debug());
$ip = $_SERVER['SERVER_ADDR'];

if( $ip == '127.0.0.1' ){

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'algobreizh');
    define('DB_PATH', 'C:\Users\Joffrey\Desktop\UwAmp\www\tetete');

}
else {

    define('DB_HOST', 'ftp.infos');
    define('DB_USER', 'ftp.infos');
    define('DB_PASSWORD', 'ftp.infos');
    define('DB_NAME', 'ftp.infos');
    define('DB_PATH', 'ftp.infos');

}

