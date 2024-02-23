<?php
//On dit à PHP de ne pas convertir une donnée d'un type à l'autre
//s'il peut le faire.
// declare(strict_types=1);
/**
 * Les fonctions définies par l'utilisateur·ice (cad vous !)
 * @link : https://www.php.net/manual/fr/language.functions.php
 */

//Écrire des fonctions en PHP

//Une fonction (ou procédure) est un ensemble d'instructions réalisant une tâche particulière à laquelle on donne un nom.

//Déclaration de la fonction
function sayHi(string $firstName, string $lastName) : string{
    //Le corps de la fonction (les instructions à faire)
    //Pour interpolation, il faut utiliser les guillemets doubles
    //Les guillemets simples n'interprètent pas le contenu de la chaine
    $msg = "Hello $firstName $lastName !";
    //La fonction retourne son résultat (une chaîne de caractère)
    return $msg;
}

//echo "Hello Jane Doe !";
echo sayHi('Jane', 'Doe');
//Le type hinting de PHP va lever une Erreur ici car le premier 
//argument est un tableau, pas une chaîne de caractère comme attendu
//par la définition de notre fonction
// echo sayHi([1,2,3], 'Doe');

function foo(){
    echo "Je ne fais rien à part écrire sur la sortie standard";
    //Ici je n'ai pas mis de return mais il y a un return 'implicite'
    //return null; return 'implicite'
}

//Une fonction qui ne retourne pas (explicitement avec l'instruction return),
//retourne NULL
$a = foo();

var_dump($a);

//En PHP, les noms de fonction ne sont pas sensibles à la casse
//sayHi('Jane','Doe') et SAYHI('John', 'Doe') sont les mêmes fonctions pr PHP

//Nous on va se fixer un formatage (une convention de nommage), on va écrire nos noms de fonction en camelCase. Par ex : saveFile et non save_file.

//Noms de fonction ? Recommandé d'utiliser un verbe à l'infinitif (anglais). search, remove, createNewGame, student

//Pourquoi écrire des fonctions ?


