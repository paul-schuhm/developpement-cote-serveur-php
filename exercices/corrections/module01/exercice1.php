<?php

//Module 1 Exercice 1

$pays_population = array(
    'France' => 67595000,
    'Suede' => 9998000,
    'Suisse' => 8417000,
    'Kosovo' => 1820631,
    'Malte' => 434403,
    'Mexique' => 122273500,
    'Allemagne' => 82800000,
    'Espagne' => 48000000
);

//Tester la présence d'une clef
//Si j'essaie d'accéder à une clef quoi n'existe pas, cela retourne NULL
// var_dump($pays_population['Espagne']);

//Si je veux tester une clef, utiliser isset(). Retourne vrai si la clef existe, faux sinon
if(isset($pays_population['Espagne'])){
    echo "La clef Espagne existe\n";
}else{
    echo "La clef Espagne n'existe PAS !\n";
}

//20 millions
$treshold_pop = 20E6;

//Récupérer que les clefs
//$keys = array_keys($pays_population);
//var_dump($keys);

//Arrêter l'execution du script (pratique pour debug)
//die('message avant arret');


echo "Les pays dont la population est supérieure ou égale à $treshold_pop d'habitants :\n";
foreach($pays_population as $pays => $pop){

    if($pop >= $treshold_pop){
        echo "$pays ($pop)\n";
    }
}


//Nombre de pays total
echo "Il y a " . count($pays_population) . " pays dans la liste\n";

//Nombre d'habitants en Suisse
echo "Nombre d'habitants en ". strtolower('Suisse') . " : " . $pays_population['Suisse'] . "\n";

//Population totale de tous les pays
//Boucle + accumulateur ($total_pop)
$total_pop = 0;
foreach($pays_population as $pop){
    $total_pop += $pop;
}

echo "La population totale est de $total_pop habitants.\n";

//Valeurs min et max
//On suppose que le 1er element est le plus petit et le plus grand
//On commence par le plus petit

//On suppose que la france est le pays avec la plus petite population (initialisation)
$country_min = 'France';
//On suppose que la france est le pays avec la plus grande population (initialisation)
$country_max = 'France';
//Population de la france
$min = $pays_population[$country_min];
$max = $pays_population[$country_max];

foreach($pays_population as $pays => $pop){
    if($pop < $min){
        //Si la population de ce pays est plus petite que la pop minimale connue (france)
        //Alors on se sert de ce nouveau pays comme référence, et on passe au suivant.
        $country_min = $pays;
        $min = $pays_population[$country_min];
    }

    if($pop > $max){
        $country_max = $pays;
        $max = $pays_population[$country_max];
    }
}

echo "Le pays avec la population la plus faible ($min) est $country_min\n";
echo "Le pays avec la population la plus forte ($max) est $country_max\n";

//Tri du tableau
//La fonction sort ne préserve pas les clefs. Pour cela, il faut utiliser asort
//@see: https://www.php.net/manual/fr/array.sorting.php
asort($pays_population);
foreach($pays_population as $pays => $pop){
    echo $pays . " - " . $pop . PHP_EOL;
}