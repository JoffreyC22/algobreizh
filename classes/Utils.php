<?php

class Utils {

    // tutes le function en statique 
    public static function upload($file, $chemin) {
        $uploaddir = $chemin;
        $uploadfile = $uploaddir . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $uploadfile);
        return $file['name'];
    }

    public static function redirect($url) {
        header('Location: ' . PATH . $url);
        exit();
    }

    public static function json($data) {

        echo json_encode($data);
        exit();
    }

    public static function random($length = 8) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $random = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $random[] = $alphabet[$n];
        }
        return implode($random);
    }

   

}
