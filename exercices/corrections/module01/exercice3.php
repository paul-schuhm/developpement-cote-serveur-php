<?php

/*
Créer une variable $heure qui contient la valeur de type integer de votre choix comprise entre 0
et 24. Créer une condition qui affiche un message si l’heure est le matin, l’après-midi ou la nuit.
 */

$heure = 9;

$heure_fin_matin = 12;
$heure_fin_apres_midi = 19;

// Vérifie que l'heure a une valeur correcte, sinon on arrête le programme (die)
if ($heure < 0 || $heure > 24) {
    echo "L'heure doit être comprise entre 0 et 24 !" . PHP_EOL;
    die;
}

// Interpolation d'une variable dans une chaîne de caractères.
echo "Il est {$heure}h !" . PHP_EOL;

if ($heure <= $heure_fin_matin) {
    echo "C'est le matin" . PHP_EOL;
} else if ($heure <= $heure_fin_apres_midi) {
    echo "C'est l'après-midi";
} else {
    echo "C'est la nuit";
}
