<?php

/**
 * Démo sur la manipulation des fichiers (directement en ligne de commande ici)
 */

//Ouvrir un fichier avec la fonction fopen en mode écriture 'w' (écrase le contenu précédent)
$file = fopen('data.txt', 'w');

$message = "Portez ce vieux whisky au juge blond qui fume\nCeci est une deuxième ligne.\nCeci est une troisième ligne.";

//Écrire le contenu de $message dans le fichier
fwrite($file, $message);

//Fermer le fichier
fclose($file);

//Lecture d'un fichier en mode lecture 'r'
$file = fopen('data.txt', 'r');

//Lecture du fichier caractère par caractère

//Tant que ce n'est pas la fin du fichier, on continue de lire
$chars = [];
while (!feof($file)) {
    //Lire le prochain caractère
    //Ajoute un élément au tableau (ou utiliser array_push)
    $chars[] = fgetc($file);
    // array_push($chars, fgetc($file));
    // $char = fgetc($file);
    // echo $char;
}

// var_dump($chars);
rewind($file);

//Lecture du fichier ligne par ligne

//Compteur de nombre de lignes dans le fichier
$nbOfLines = 0;
while(!feof($file)){
    $line = fgets($file);
    echo $line;
    $nbOfLines = $nbOfLines + 1;
}

fclose($file);
echo "Nombre de lignes = $nbOfLines" . PHP_EOL;


//Lire tout le contenu d'un fichier et le placer dans une chaîne de caractère.

$content = file_get_contents('breizhdata.txt');
echo $content;

//Supprimer un fichier
unlink('index.php');


