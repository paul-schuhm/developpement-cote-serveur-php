<?php

/**
 * Démo : Ecriture et lecture de fichier au format CSV
 * Ajouter un média à votre catalogue.
 */


//Imaginons qu'on récupère ces données depuis le formulaire d'ajout (depuis $_POST)
$title = "Le petit prince";
$author = "Antointe de Saint-Exupery";
$category = "book";

//Préparer les données pour les écrire dans le fichier.

$book = [$category, $title, $author];

//Format csv : fputscv et fgetcsv

//Ecriture dans la base

//Ouvrir le ficher en mode append (ajout à la fin)
$file = fopen("mediatheque.csv", "a");
fputcsv($file, $book);
fclose($file);

//Lecture de la base

//Lire la base
$mediatheque = file('mediatheque.csv', FILE_IGNORE_NEW_LINES);

var_dump($mediatheque);

//On lit avec fgetcsv qui va se charger de découper chaque ligne en se basant le format CSV.
if (($file = fopen("mediatheque.csv", "r")) !== FALSE) {
    while (($line = fgetcsv($file, 1000, ",")) !== FALSE) {
        //$line est un tableau : chaque élément du tableau, correspond à une colonne
        var_dump($line[0], $line[1], $line[2]);
    }
    fclose($file);
}
