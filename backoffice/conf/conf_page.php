<?php

switch(PAGE){
    case 'HOME':
        $_PAGE = new Page('HOME', ' - Accueil');
        break;
    case 'CONTACT':
        $_PAGE = new Page('CONTACT', ' - Contact');
        break;
    case 'FACTURE':
        $_PAGE = new Page('FACTURE', ' - Facture');
        break;
    case 'PRODUIT':
        $_PAGE = new Page('PRODUIT', ' - Produit');
        break;
    case 'PANIER':
        $_PAGE = new Page('PANIER', ' - Panier');
        break;
    case 'COMMANDE':
        $_PAGE = new Page('COMMANDE', ' - Commande');
        break;
    case 'INFORMATIONS':
        $_PAGE = new Page('INFORMATIONS', ' - Informations');
        break;
}
