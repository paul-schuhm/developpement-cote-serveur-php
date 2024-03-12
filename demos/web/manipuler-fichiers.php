<?php


/**
 * Démo qui montre comment ouvrir un fichier, écrire et lire son contenu, supprimer le fichier
 * @see https://www.php.net/manual/fr/function.fopen.php
 * @see https://www.php.net/manual/en/function.fwrite.php
 * @see https://www.php.net/manual/en/function.feof.php
 * @see https://www.php.net/manual/fr/function.fgetcsv.php
 */

//Ouverture d'un fichier en écriture
$file = fopen('data.txt', 'w');
//Ecriture dans le fichier
fwrite($file, 'Cette ligne sera écrite dans le fichier.');
fwrite($file, "Des données dans le fichier\nDes données sur une nouvelle ligne");
//Fermeture du fichier
fclose($file);


//Ouvrir le fichier en lecture
$file = fopen('data.txt', 'r');
if(!$file){
    echo "Une erreur s'est produite à l'ouverture du fichier";
    exit;
}

//Lire un fichier ligne par ligne
$lines=[];
//Tant que ce n'est pas la fin du fichier
while(!feof($file)){
    //Lire ligne par ligne avec fgets
    $line = fgets($file);
    $lines[] = $line;
}
var_dump($lines);

//Replacer le pointeur du fichier au début (rembobiner)
rewind($file);

$chars=[];
//Tant que ce n'est pas la fin du fichier
while(!feof($file)){
    //Lire caractère par caractère avec getc. 
    //PS : en fait, lit byte par byte (caractères encodés sur plusieurs bytes comme les caractères accentués ne vont pas être compris ici, donc attention !)
    $char = fgetc($file);
    $chars[] = $char;
}
var_dump($chars);

fclose($file);

//Supprimer un fichier
unlink('data.txt');

//Exercice : découvrir comment utiliser les fonctions pour manipuler des fichiers CSV, avec fgetcsv https://www.php.net/manual/fr/function.fgetcsv.php

