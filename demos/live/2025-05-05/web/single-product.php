<?php

/**
 * Template d'une fiche produit
 * Sur les url /single-product.php?code=keyboard
 */

require_once './functions.php';
require_once './model.php';

theHeader();

//Récupéré depuis l'URL
$code = $_GET['code'];

//Retrouve le produit dans le catalogue pour obtenir ses données
$product = array_find($products, function ($product) use ($code) {
    return $product['code'] === $code;
});
?>

<h1><?php echo $product['label']; ?></h1>

<p>Lorem ipsum</p>

<?php
theFooter();
