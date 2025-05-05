<?php

/**
 * Modèle : toutes les données et la logique métier de votre système (entreprise). Vos règles
 */

//Déclarer des constantes (equivalant au #define en C)

//Quantité max de produits par commande
define('MAX_QUANTITY', 5);

//Catalogue
$products = [
    //Chaque tableau => modèle de produit (cle/valeur)
    [
        'code' => 'keyboard',
        'label' => 'Clavier mécanique'
    ],
    [
        'code' => 'mouse',
        'label' => 'Souris sans fil'
    ],
    [
        'code' => 'chair',
        'label' => 'Chaise ergonomique'
    ],
    [
        'code' => 'screen',
        'label' => 'Écran'
    ],
];
