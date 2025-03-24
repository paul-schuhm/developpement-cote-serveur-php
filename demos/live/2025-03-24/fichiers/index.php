<?php

//Créer un fichier et écrire dans un fichier



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
while(!feof($file)){
    //Lire une ligne du fichier avec fgets
    $line = fgets($file);
    //Ajoute la ligne lue dans mon tableau
    $lines[] = $line;
}

//On a le contenu du fichier accessible dans le script dans la variable $lines
var_dump($lines);

//Fermer le fichier
fclose($file);