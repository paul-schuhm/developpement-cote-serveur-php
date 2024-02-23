<?php

/** Les tableaux
 * @link : https://www.php.net/manual/fr/language.types.array.php
 */

$array = [1, 2, 3, ['a','b','c', [1,2,3]]];

//Retour à la ligne + nouvelle ligne (pour le terminal)
echo "Taille du tableau : " . count($array) . "\n";
echo "Taille du tableau : " . count($array) . PHP_EOL;

// foreach ($array as $item) {
//     //Retourne vrai si $item est un tableau, faux sinon
//     //is_array est une fonction fournie par PHP
//     //on parle de fonction built-in (intégrée au langage)
//     if (is_array($item)) {
//         //Si c'est un tableau, on affiche chacun de ses
//         //éléments avec echo
//         foreach ($item as $subitem) {
//             echo $subitem . PHP_EOL;
//         }
//     } else {
//         echo $item . PHP_EOL;
//     }
// }

//Dictionnaire/Clé-valeurs
$a = ['a','b','c'];

//Tableau : on déclare les clefs et les valeurs
$magasin = [
    'citron' => 5,
    'banane' => 12,
    'poireau' => 20
];

//Parcourir un tableau en parcourant ses clefs ET ses valeurs
//Syntaxe: foreach(tableau as clef => valeur)
foreach($magasin as $product => $quantity){
    //Equivalent "string literals" avec les back tick en JS
    //Ici $product et $quantity vont être remplacées par
    //leurs valeurs dans la chaîne.
    echo "Produit: {$product} - Quantité: {$quantity} \n";
}

foreach($magasin as $key => $value){
    echo $key . $value . PHP_EOL;
}

//Ajouter un élément à un tableau

$letters = ['a', 'b', 'c', 'd'];

//Ajoute la clé 'carotte' associée à la valeur 20
$magasin['carotte'] = 20;

var_dump($magasin);

//Supprimer la clef 'carotte'
unset($magasin['carotte']);

var_dump($magasin);

//Ajouter la lettre 'e' à la fin du tableau
$letters[] = 'e';

var_dump($letters);

$letters[] = 'g';

//Retirer le dernier élément avec une fonction
array_pop($letters);

var_dump($letters);

//Tableaux à plusieurs dimensions

//Chaque élément est un tableau (ligne) de la grille d'échec
$chessGrid = [
    [
        'Tour Blanc 1',
        'Cavalier Blanc 1',
        'Fou Blanc 1',
        'Dame Blanc',
        'Roi Blanc',
        'Fou Blanc 2',
        'Cavalier Blanc 2',
        'Tour Blanc 2'
    ]
    //Ajouter les autres lignes ici...
];

var_dump($chessGrid);

//Accéder à la case A1 de la grille

$premiereLigne = $chessGrid[0];
$premierCase = $premiereLigne[0]; // = à la case A1

//Ou plus simplement :
echo $chessGrid[0][0];




