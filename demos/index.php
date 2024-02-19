<?php

// Un commentaire sur une ligne

/**
 * Un commentaire
 * sur
 * plusieurs
 * lignes
 */

//Expressions primitives : les types de base

//Afficher un résultat

//Ce qui est imprimé avec echo va finir dans la page web qui sera retournée
//au client (affiché dans le navigateur)
// echo "Ceci sera affiché sur la sortie standard avec echo" . PHP_EOL;

// var_dump("Ceci sera affiché sur la sortie standard avec var_dump");
// var_dump(12 + 100);
// var_dump(12.45 + 12);
// var_dump('ceci ' . ' est ' . ' une ' . ' concaténation !');


//Moyens de composition : les tableaux
//Déclaration d'un tableau : soit avec les crochets, soit avec la fonction array()
// var_dump([1,2,3], array(1,2,3), [1, 'foo', 'bar', [1,2,3]]);
// var_dump([1,2,3]);
//Accéder à un élément : array[0] donne accès au 1ere élément, array[2] donne accès au 3ème élément

//Abstractions: variables

//Déclaration d'une variable et affectation à la valeur 'foobar'
//Une variable se déclare en faisant précéder le nom par le signe $
$maVariable = 'foo bar';

//Inspecter la variable 'maVariable'
// echo $maVariable;

$monTableau = [1, 2, 3];

//Ne fonctionne pas ! Vous ne pouvez echo que quelque chose qui a une représentation
//sous forme de chaines de caractères
// echo $monTableau;

//Affiche tout (éléments et types)
// var_dump($monTableau);

//Affiche le contenu d'un tableau sans les infos sur les types
// print_r($monTableau);

//                0  1  2                
// $monTableau = [1, 2, 3];
//Accéder à l'élément de position 1 (2 ici)
// echo "\$monTableau[1]=" . $montTableau[1];

//echo on va s'en servir pour imprimer du contenu sur une page web.

//Variable
$list = ['Pomme', 'Mouchoir', 'Champignon', 'Carotte'];

//Boucle/Parcourir un tableau
echo "<h1>Ceci est un titre de niveau 1 !</h1>";

echo "<ul>";
//Equivalent en JS de for(let item of items)
foreach($list as $item){
    //$item est ici un alias pour chaque élément
    // echo "<li>" . $item . "</li>";
    echo "<li>{$item}s</li>";
}
echo "</ul>";

$list=123;

//Définir une constante
define('notre_constante', 42);
//Accéder à la constante
echo notre_constante;

echo "<h2>Ceci est un titre de niveau 2</h2>";
echo "<p>Ceci est une balise texte !</p>";
echo "<hr>";


//Abstractions: fonctions
