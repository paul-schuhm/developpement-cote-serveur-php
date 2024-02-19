<?php

/**
 * Exemple de l'importance des fonctions. Bénéfices :
 * - Réutiliser et partager du code
 * - Masquer la complexité
 * - Fabriquer des abstractions [+ important !!]
 * - Améliorer la lisibilité (et donc la maintenabilité du code c'est à dire
 * le comprendre et le modifier)
 */

/**
 * Retourne vrai si la personne est adulte, faux sinon.
 */
function isAdult(int $age): bool{
    //Les détails d'implémentation de la fonction sont masqués. Je peux modifier
    //comment on considère une personne majeure sans impacter le reste du code ! Tant que je
    //respecte la signature de la fonction (nom, argument, type de retour)
    //On définit l'age legal de la majorité ici.
    $adultAge = 18;
    //Vrai si majeur, faux sinon
    return $age >= $adultAge;    
}

/**
 * Retourne vrai si l'âge indiqué par l'utilisateur est valide, faux sinon
 */
function isValid(string $age): bool{
    //Les détails d'implémentation de la fonction sont masqués. Je peux modifier
    //comment un input user est valide sans impacter le reste du code ! Tant que je
    //respecte la signature de la fonction (nom, argument, type de retour)
    return intval($age) !== 0;
}

//Exemple de l'utilité des fonctions

$answer = readline('Quel âge as-tu ?');

//Validation des données fournies par l'utilisateur
if (!isValid($answer)) {
    echo "Merci de fournir un âge valide." . PHP_EOL;
    exit;
}

//Age valide
$age = intval($answer);

//Maintenant 'isAdult' est une abstraction autour du processus de déterminer si une 
//personne est majeure. Je n'ai plus à me soucier de savoir comment le déterminer.
//Je peux m'en servir, comme d'un "sortilège" à volonté.

if (isAdult($age)) {
    //Et si on fabriquait une abstraction autour de la génération d'un message ?
    echo "Vous êtes mineur·e, vous ne pouvez pas encore voter, désolé." . PHP_EOL;
} else {
    echo "Vous êtes majeur·e, voici votre carte d'électeur·ice !" . PHP_EOL;
}


//.....

// J'ai besoin d'un autre test sur la majorité pour une autre raison...
if (isAdult($age)) {
    echo "Vous êtes mineur·e, vous ne pouvez pas encore voter, désolé." . PHP_EOL;
} else {
    echo "Vous êtes majeur·e, voici votre carte d'électeur·ice !" . PHP_EOL;
}
