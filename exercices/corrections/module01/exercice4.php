<?php

/**
 * Exercice 15 (https://aymeric-auberton.fr/academie/php/exercices)
 */

//Générer 10 nombres aléatoires

//Tableau vide
$t1 = [];

for($i = 0 ; $i < 10 ; $i++){
    //Ajouter un élément
    $t1[] = rand(0, 100);
}

//Valeurs inférieures à 50
$t2 = [];
//Valeurs supérieures ou égales à 50
$t3 = [];

foreach($t1 as $number){
    if($number < 50){
        $t2[] = $number;
    }else{
        $t3[] = $number;
    }
}

//Afficher les tableaux
// echo "Nombres < 50:\n";
//Transformer un tableau en chaine de caractère
$str = implode("|", $t1);
echo $str . PHP_EOL;
//Transformer une chaine de caractères en tableau
$arr = explode('|', $str);
var_dump($arr);
// echo "\nNombres >= 50\n:";
// print_r($t2);


