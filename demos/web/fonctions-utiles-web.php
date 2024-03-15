<?php

/**
 * Démos de quelques fonctions utiles pour le web avec PHp
 */

$data = array(
    'foo' => 'bar',
    'baz' => 'boom',
    'cow' => 'milk',
    'null' => null,
    'php' => 'PHP Hypertext Processor'
);

//Générer une chaine de caractère dans un format accepté en URL
echo "<p>";
echo http_build_query($data);
echo "</p>";

//Valider et filtrer les données provenant d'un formulaire.

/**
 * Les valeurs viennent normalement d'une requete POST et sont stockées dans $_POST
 */
$DATA = [
    'product_id' => 'libgd<script>',
    'component'  => [-100, 1, 2, 8, 10, 250],
    'version'    => '2.0.33',
    'testscalar' => '2',
    'testarray'  => ['2', '23', '10', '12', 'abcd']
];


/**
 * On définit pour chaque champ, grâce à des flags (constantes) fournis par PHP,
 * des règles de filtre. Voir tous les filtres, tester-les et observez le résultat.
 * @link https://www.php.net/manual/fr/filter.constants.php
 */
$args = array(
    //product_id doit pouvoir être inclus dans une URL sans danger
    'product_id'   => FILTER_SANITIZE_ENCODED,
    //component doit être un tableau d'entiers compris entre 1 et 10 inclus
    'component'    => array(
        'flags'     => FILTER_REQUIRE_ARRAY,
        'filter'    => FILTER_VALIDATE_INT,
        'options'   => array('min_range' => 1, 'max_range' => 10)
    ),
    'version'      => FILTER_SANITIZE_ENCODED,
    //testscalar doit être une valeur scalaire simple et un entier
    'testscalar'   => array(
        'flags'  => FILTER_REQUIRE_SCALAR,
        'filter' => FILTER_VALIDATE_INT,
    ),
    //testarray doit être un tableau ne contenant que des entiers
    'testarray'    => array(
        'flags'  => FILTER_REQUIRE_ARRAY,
        'filter' => FILTER_VALIDATE_INT,
    )
);

//On récupère uniquement les valeurs des inputs filtrées et validées avec succès pour chaque champ dans le tableau $args/
//NOTE : Pour filtrer les données soumises via une requête POST, utiliser la fonction filter_input_array(INPUT_POST, $args).
$filteredInputs = filter_var_array($DATA, $args);

echo "<pre>";
print_r($filteredInputs);
echo "</pre>";
