<?php

/**
 * Premier contact avec les primitives de PHP
 * Ne pas hésiter à consulter la documentation en ligne pour
 * en apprendre plus : https://www.php.net/manual/fr/tutorial.php
 */

//Interdire la conversion automatique de types scalaires (par ex float vers int)
declare(strict_types=1);

// Ceci est un commentaire sur une ligne.

/**
 * Ceci est un commentaire
 * sur plusieurs lignes.
 */

//Primitives : types de données, structures de controle, variables

//Types de données: string, integer pour des nombres entiers, double/float pour des nombres à virgule, arrays pour les tableaux, etc.
//Consulter la liste des types : https://www.php.net/manual/en/language.types.php

//Variables en PHP

//En JS, on doit déclarer une variable avant de l'utiliser (let/const/var a = 1).

//Nom de variable précédé par un sine $
//Pas de déclaration de variable en PHP, on lui assigne tout de suite une valeur !
$a = 2;

//Toute instruction se termine par un point-virgule.

//Entier
$a = 2;
//Afficher ("imprimer" sur la sortie)
//\n => code qui veut dire "newline", nouvelle ligne
echo "$a\n";
//Concaténation avec l'opérateur .
//PHP_EOL : constante fournie par PHP pour le caractère nouvelle ligne
echo $a . PHP_EOL;
//Nombre décimal (float)
$b = 1.523;
echo $b . PHP_EOL;
//Chaîne de caractères (simple quote ou double quotes)
$c = "Ceci est une chaîne de caractères";
echo $c . PHP_EOL;

//Tableau
$d = [1, 2, 3];

//echo $d => Warning ! echo attend quelquechose qui peut être converti en chaîne de caractères, ce qui n'est pas le cas d'un tableau !

//Afficher le contenu d'un tableau
print_r($d);

//Afficher un élément du tableau à la position 0 (1er élément)
echo $d[0] . PHP_EOL;

$e = [$a, $b, $c, $d];

//Afficher le contenu d'une variable et son type (inspecter). Très utile pour débuger son programme !
var_dump($e);

//Tableau associatif (équivalent des 'objets' JavaScript)
$f = [
    'a' => 100,
    'b' => 52,
    100 => 'a'
];
var_dump($f);

//Opérateurs : les mêmes qu'en JavaScript ! Même précédence, même associativité.
$g = (1 > 0) && (1 < (2 * 2));

//Afficher le type d'une variable
echo gettype($g) . PHP_EOL;

//Structures de contrôle

//Parcourir un tableau
$students = ['amarjargal', 'eléazar', 'make', 'alizé'];
//Le nombre d'éléments dans un tableau (taille) : count($tableau)

echo "*Boucle for 'classique' " . PHP_EOL;


//Boucle for avec index
for ($i = 0; $i < count($students); $i++) {
    //Acceder au prénom ?? $students[$i];
    echo "Prénom : $students[$i]" . PHP_EOL;
}

echo "*Boucle 'foreach' " . PHP_EOL;

//Boucle foreach
foreach ($students as $student) {
    // echo "Prénom: $student" . PHP_EOL;
    echo "Prénom: " . ucfirst($student) . PHP_EOL;
}

//Tests : if/else

if (true) {
    echo "Si c'est vrai" . PHP_EOL;
} else {
    echo "Si c'est faux" . PHP_EOL;
}

//Exercice : Afficher uniquement les chiffres pairs
//Modulo : %
$numbers = [0, 1, 2, 3, 4];
foreach ($numbers as $number) {
    //Si c'est pair, modulo 2 est égal à 0 (c'est même la définition d'un nombre pair !). Ex: 2 % 2 = 2 * 2 + 0, 
    //Si c'est impair, modulo 2  est égal à 1. Ex: 3 % 2 = 1 * 2 + 1
    if ($number % 2 == 0) {
        echo "$number ";
    }
}

//Ajouter un élément à un tableau
$numbers = [0, 1, 2, 3, 4];

//Ajouter 5 au tableau (à la fin)
$numbers[] = 5;
//Ajouter 6 au tableau (à la fin)
$numbers[] = 6;
//Remplacer l'élément par 10
$numbers[1] = 10;
//Supprimer l'élément
unset($numbers[1]);

var_dump($numbers);

//Exemple de fonction dans la doc : array_splice pour supprimer une partie du tableau
//@Link : https://www.php.net/manual/fr/function.array-splice.php

$input = array("red", "green", "blue", "yellow");
array_splice($input, 2);
var_dump($input);

//Création de fonction (comme en JavaScript)
function add($a, $b)
{
    return $a + $b;
}

//Création de fonction avec le type hinting (indication de type) (Différence avec JavaScript !)
function multiply(int $a, int $b): int
{
    return $a * $b;
}

//Appel de fonction
echo add(1, 2) . "\n";
//Ok
echo multiply(1, 2) . PHP_EOL;
//Pas ok car j'attends des données de type int en argument !
// echo multiply("a", "b");
// echo multiply(1.5, "b");
//Conversion automatique de float vers int (comportement par défaut du script PHP).
//Interdiction avec l'instruction declare(strict_types=1) (voir début de script)
echo multiply(1.5, 2) . PHP_EOL;
