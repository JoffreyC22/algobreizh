<?php
require_once('../classes/WdImage.php');

#
# on récupère les diverses valeurs qui seront utilisées pour
# créer notre miniature.
#

$file = $_GET['src']; 
$w = $_GET['w'];
$h = $_GET['h'];
$method = $_GET['method'];

list($wuseless, $huseless, $type,) = getimagesize($file);
$mime_source = image_type_to_mime_type($type);

#
# on crée une ressource _image_ depuis la source.
#
# note: pour la démo, seule les images au format JPEG sont
# prises en charge.
#

if($mime_source == 'image/jpeg')
    $img_in = imagecreatefromjpeg($file);
elseif($mime_source == 'image/png')
    $img_in = imagecreatefrompng($file);
elseif($mime_source == 'image/gif')
    $img_in = imagecreatefromgif($file);

#
# on redimensionne l'image selon les dimensions demandées
# et la méthode.
#
# note: les dimensions *doivent* être passées sous forme de
# variables. Elles sont utilisées comme _référence_. La méthode
# RESIZE_SURFACE y écrira les dimensions finales de l'image.
# Ici ce sera 181x91 (16384 => 16471)
#

$resized = WDIMAGE::resize($img_in, $w, $h, $method);


#
# on renvoie le résultat sous forme d'image jpeg
#

switch($mime_source){
    case 'image/png':
        header('Content-type: image/png;');
        imagepng($resized, null, 0);
        break;
    case 'image/jpeg':
        header('Content-type: image/png;');
        imagejpeg($resized, null, 100);
        break;

    default:
    case 'image/jpg':
        header('Content-type: image/jpeg');
        imagejpeg($resized, null, 100);
        break;
}