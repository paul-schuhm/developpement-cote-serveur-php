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
    if ($line !== false) {
        $lines[] = rtrim($line);
    }
}

//On a le contenu du fichier accessible dans le script dans la variable $lines
var_dump($lines);

//Parcourir les données
foreach ($lines as $line) {
    //Découper chaque ligne pour récupérer chaque 'champ', séparés par une virgule
    $inputs = explode(',', $line);
    $id = $inputs[0];
    $content = $inputs[1];
    //Utiliser les données récupérées...
    echo "<h2>$content</h2>";
}

//Fermer le fichier
fclose($file);

//Alternative : Lire tout le contenu d'un fichier dans un tableau avec la fonction file()
//@link : https://www.php.net/manual/en/function.file.php
$lines = file('messages.txt', FILE_IGNORE_NEW_LINES);
var_dump($lines);
