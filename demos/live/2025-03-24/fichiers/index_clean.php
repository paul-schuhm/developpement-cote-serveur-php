<?php

/**
 * Démo : Manipulation de fichiers textes : création, ouverture, lecture et écriture
 * Dans cette démo on manipule des fichiers où chaque enregistrement réside sur sa propre ligne.
 */

//Ouvrir un fichier en mode écriture (pour écrire dedans)
//Ecraser le contenu existant
$file = fopen('messages.txt', 'w');

//Ouvrir un fichier en mode 'append' (ajout a la fin)
//Ecrire le contenu à la fin
// $file = fopen('messages.txt', 'a');

//Ecrire dans le fichier
for ($i = 0; $i < 10; $i++) {
    //Donnée à enregistrer
    $message = "$i, Lorem ipsum\n";
    fwrite($file, $message);
}

//Fermer le fichier
fclose($file);


//Lire le fichier
$file = fopen('messages.txt', 'r');
//Vérifier que le fichier est bien ouvert
if (!$file) {
    echo "Il y a un problème avec l'ouverture du fichier";
}

//Tableau pour stocker les lignes
$lines = [];

//Tant que ce n'est pas la fin du fichier
while (!feof($file)) {
    //Lire une ligne du fichier avec fgets
    $line = fgets($file);
    //Ajoute la ligne lue dans mon tableau
    if ($line !== false)
        $lines[] = rtrim($line);
}

//On a le contenu du fichier accessible dans le script dans la variable $lines
var_dump($lines);

//Fermer le fichier
fclose($file);


//Avec la fonction file()
//@link https://www.php.net/manual/en/function.file.php
$lines = file('messages.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
var_dump($lines);

//Récupérer chaque champ en utilisant le séparateur (ici ',')
foreach ($lines as $line) {
    var_dump(explode(',', $line));
}
