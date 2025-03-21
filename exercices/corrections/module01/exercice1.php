<?php

//Exercice 0 

$pays_population = array(
    'France' => 67595000,
    'Suede' => 9998000,
    'Suisse' => 8417000,
    'Kosovo' => 1820631,
    'Malte' => 434403,
    'Mexique' => 122273500,
    'Allemagne' => 82800000,
    'Espagne' => 1
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

die;


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
// JS : console.log(`Il y a ${pays_population.length} dans la liste`)

//Nombre d'habitants en Suisse
echo "Nombre d'habitants en ". strtolower('Suisse') . " : " . $pays_population['Suisse'] . "\n";

//Population totale de tous les pays
//Boucle + accumulateur ($total_pop)
$total_pop = 0;
foreach($pays_population as $pop){
    $total_pop += $pop;
}

echo "La population totale est de $total_pop\n";

//Valeurs min et max
//On suppose que le 1er element est le plus petit et le plus grand
//On commence par le plus petit

//On suppose que la france est le pays avec la plus petite population (initialisation)
$country_min = 'France';
//Population de la france
$min = $pays_population[$country_min];

foreach($pays_population as $pays => $pop){
    if($pop < $min){
        //Si la population de ce pays est plus petite que la pop minimale connue (france)
        //Alors on se sert de ce nouveau pays comme référence, et on passe au suivant.
        $country_min = $pays;
        $min = $pays_population[$country_min];
    }
}

echo "Le pays avec la population la plus faible est $country_min\n";