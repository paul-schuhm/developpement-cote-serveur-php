<?php

/**
 * Démo sur la manipulation de fichiers au format JSON
 * @see https://www.php.net/manual/en/function.file-get-contents.php
 * @see https://www.php.net/manual/en/function.json-validate.php
 */

//On utilise une autre fonction très puissante de PHP pour lire tout le contenu d'un fichier et le placer
//dans une chaine de caractère. Vous pouvez aussi utiliser file_get_contents sur une URL directement !

//Lire le contenu de la page web de google.com
// echo file_get_contents('https://google.com');

//Lire le contenu du fichier JSON
$jsonContent = file_get_contents('somejson.json');

//Tout nouveau, depuis PHP 8.3 !
if(!json_validate($jsonContent)){
    echo "Ce fichier JSON n'est valide";
}

//Décoder un fichier JSON et le transformer en array associatif PHP
$jsonParsed = json_decode($jsonContent);
var_dump($jsonParsed);

//Encoder un tableau php en chaine de caractères JSON qui sera facilement manipulable par du code Javascript
$array =  array("Peter"=>35, "Ben"=>37, "Joe"=>43, "Foobar" => ['a', 'b', 'c']);
$arrayEncodedInJSONFormat = json_encode($array);
echo $arrayEncodedInJSONFormat;

//Ecrire un tableau au format JSON dans un fichier
$file = fopen('tojson.json', 'w');
fwrite($file, $arrayEncodedInJSONFormat);
fclose($file);