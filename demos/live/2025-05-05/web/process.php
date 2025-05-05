<?php

//J'ai besoin d'avoir accès au catalogue
require_once './model.php';

// echo "traitement de la commande en cours...";

//Toutes les données provenant du monde exterieur (serveur, client, requete get, post, file, cookie, etc.) SONT FOURNIES AU SCRIPT à l'execution via des tableaux (variables superglobales)

//Requete est en POST, inspecter le tableau $_POST

//Securiser les données entrantes côté serveur : validation des données


//Déclare données validées
$clean = [];

//1. product : appartient à mon catalogue ?
//2. quantity : doit appartenir à l'intervalle [1, MAX_QUANTITY]

//Récuperer la valeur soumise via le formulaire
$input_product = $_POST['product'];

//Validation produit
foreach($products as $product){
    if($product['code'] === $input_product){
        //Banco, c'est dans mon catalogue !
        $clean['product'] = $input_product;
    }
}

var_dump($clean);


//Verifier est ce que clean contient un code produit et une quantité ? Si non, rejette la commande. Si oui, je lance la procédure de prise de commande.




