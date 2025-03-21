<?php
date_default_timezone_set('Europe/Paris');

/**
 * Catalogue de produits
 */
$products = [
    'mouse' => [
        'label' => "Souris sans fil",
        'price_euros' => "20"
    ],
    'mat' => [
        'label' => 'Tapis de souris',
        'price_euros' => "10"
    ],
    'keyboard' => [
        'label' => 'Clavier',
        'price_euros' => 50
    ],
    'desktop' => [
        'label' => 'Bureau',
        'price_euros' => 200
    ],
    'chair' => [
        'label' => 'Chaise de bureau',
        'price_euros' => 100
    ]
];


/**
 * Prix de la livraison express
 */
define('SHIPPING_EXPRESS_COST_EUROS', 5);

/**
 * Traitement du formulaire (dans le même fichier)
 */

//Variables superglobales
//$_POST : Tableau fourni au script contenant toutes les informations sur la reqûete POST.

$clean = [];

//Est ce que le formulaire a été soumis ?
//On teste la présence de la clef 'submit' (input submit) = formulaire soumis
if (isset($_POST['submit'])) {

    //Gestion des erreurs
    $errors = [];

    //Récupérer toutes les données dont on a besoin
    $quantity = $_POST['quantity'];
    $product = $_POST['product'];
    $shipping = $_POST['shipping'];

    //ALL INPUT IS EVIL !
    //Valider les données qui ont été soumises par le client (sécurité)

    //Validation de la quantité
    //Test pour rejeter une mauvaise valeur : 
    //- non renseignée : !$isset($quantity) 
    //- inférieure ou égale à 0 : $quantity <= 0
    //- supérieure ou égale à 20 :  $quantity > 20
    if (!isset($quantity) || $quantity <= 0 || $quantity > 20) {
        //Mauvaise valeur => rejette le formulaire (ne prend pas en compte la commande) 
        $errors['quantity'] = "Vous ne pouvez pas commander un produit en plus de 20 exemplaires.";
    }

    //Validation du produit:
    // - Non renseigné
    // - Pas dans le catalogue
    if (!isset($product) || !array_key_exists($product, $products)) {
        $errors['product'] = "Merci de choisir un produit présent dans notre catalogue.";
    }

    //Valider le shipping express
    if (isset($shipping) && $shipping !== 'express') {
        $errors['shipping'] = "Merci de choisir une option valide pour la livraison (express)";
    }

    //Valider la commande
    if (empty($errors)) {

        //Ces données sont cleans, on peut les manipuler en toute sécurité.
        $clean['quantity'] = $quantity;
        $clean['product'] = $product;
        $clean['shipping'] = $shipping;

        //Toute la logique pour traiter la commande...


        $total_ammount = intval($products[$clean['product']]['price_euros']) * intval($quantity);
        $message = "Merci, votre commande d'un montant de $total_ammount EUROS a été validée !";

        if($clean['shipping'] === 'express'){
            $total_ammount += SHIPPING_EXPRESS_COST_EUROS;
            $message .= " Merci d'avoir choisi la livraison express !";
        }
        
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<!-- 
Règles métiers :
- On n'accepte pas de commandes de plus de 20 unités pour un produit.
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Lier la feuille de style -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Commander des fournitures de bureau</h1>

    <a href="/">Revenir à l'accueil</a>

    <p class="message-validation"><?php echo isset($message) ? $message : ""; ?></p>

    <!-- action: URL où on soumet le formulaire. Si on laisse vide, soumettre la requête HTTP à la même URL
     que celle fournissant le formulaire, cad, on va utiliser le même script php. -->
    <form action="" method="POST">

        <div>
            <p class="error">
                <?php
                //S'il y a une erreur sur le champ produit (si la clef 'product' existe dans le tableau $errors)
                if (isset($errors['product'])) {
                    echo $errors['product'];
                }
                ?>
            </p>
            <label for="product">Choisir un produit: </label>
            <!-- Doit être généré à partir de mon catalogue de produits ! -->
            <!-- EXERCICE : Générer le HTML (select) à partir du catalogue ($products) -->
            <select name="product" id="product">
                <?php foreach ($products as $name => $product) : ?>
                    <!-- Dans la boucle -->
                    <option data-price="<?php echo $product['price_euros']; ?>" value="<?php echo $name; ?>"><?php echo $product['label']; ?></option>
                <?php endforeach; ?>


            </select>
        </div>

        <div>
            <p class="error">
                <?php
                if (isset($errors['quantity'])) {
                    echo $errors['quantity'];
                }
                ?>
            </p>

            <div class="<?php echo isset($errors['quantity']) ? "error" : ""; ?>">
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" id="quantity" value="1">
            </div>
        </div>


        <div>
            <label for="shipping" title="Bénéficier de la livraison en moins de 48h">Livraison Express</label>
            <input type="checkbox" name="shipping" id="shipping" value="express">
        </div>

        <p>
            Total (EUROS) : <span id="total"></span>
        </p>

        <div>
            <p>
                <?php
                if (isset($errors['shipping'])) {
                    echo $errors['shipping'];
                }
                ?>
            </p>
            <input type="submit" name="submit" value="Valider la commande">
        </div>

    </form>

    <footer>
        <small>Cette page a été générée le <?php echo date('d/m/Y'); ?> à <?php echo date('H:i:s'); ?></small>

        <div>
            <small>
                <?php echo "bureau-depôt &copy;" . date('Y'); ?>
            </small>
        </div>
    </footer>

    <!-- Lier les éventuels scripts JS (cf cours Developpement Front) -->
    <script src="script.js"></script>
</body>

</html>