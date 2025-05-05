<?php
require_once './functions.php'; 

//J'ai besoin d'avoir accès au catalogue
require_once './model.php';

// echo "traitement de la commande en cours...";

//Toutes les données provenant du monde exterieur (serveur, client, requete get, post, file, cookie, etc.) SONT FOURNIES AU SCRIPT à l'execution via des tableaux (variables superglobales)

//Requete est en POST, inspecter le tableau $_POST

//Securiser les données entrantes côté serveur : validation des données

//Déclare données validées
$clean = [];

//1. product : appartient à mon catalogue ?
//2. quantity : doit être un entier, appartenir à l'intervalle [1, MAX_QUANTITY]

//Récuperer la valeur soumise via le formulaire
$input_product = $_POST['product'];

//Validation produit
foreach ($products as $product) {
    if ($product['code'] === $input_product) {
        //Banco, c'est dans mon catalogue !
        $clean['product'] = $input_product;
    }
}

//Valider la quantité (Toujours préferer le style déclaratif au procédural)
$input_quantity = filter_input(
    INPUT_POST,
    'quantity',
    FILTER_VALIDATE_INT,
    [
        'options' => [
            'min_range' => 1,
            'max_range' => MAX_QUANTITY
        ]
    ]
);

if ($input_quantity) {
    $clean['quantity'] = $input_quantity;
}


//Verifier est ce que clean contient un code produit et une quantité ? Si non, rejette la commande. Si oui, je lance la procédure de prise de commande.
$isValidOrder = in_array('product', array_keys($clean)) && in_array('quantity', array_keys($clean));


if (!$isValidOrder) {
    //Indique erreur côté client avec un code status 400
    header('HTTP/1.1 400 Bad Request');
    echo "<p>Votre commande n'est pas valide. <a href='/'> Merci de rééssayer</a></p>";
    die; //exit;
}

//Echappement avec htmlentities
$msg = sprintf(
    "<p>Merci %s, votre commande de %d %s(s) a été validée ! <a href='/'>Retour</a></p>",
    htmlentities($_POST['full_name']),
    $clean['quantity'],
    $clean['product'],
);

echo $msg;