<?php


/**
 * Catalogue de produits
 */

// $products = ['mouse', 'mat', 'chair', 'keyboard', 'desktop'];

$products = [
    'mouse' => "Souris sans fil",
    'mat' => "Tapis de souris",
    'keyboard' => 'Clavier',
    'chair' => 'Chaise de bureau',
    'desktop' => 'Bureau',
    'pen' => 'Stylo noir'
];


/**
 * Traitement du formulaire (dans le même fichier)
 */

//Variables superglobales
//$_POST : Tableau fourni au script contenant toutes les informations sur la reqûete POST.

//Est ce que le formulaire a été soumis ?
//On teste la présence de la clef 'submit' (input submit) = formulaire soumis
if (isset($_POST['submit'])) {

    //Gestion des erreurs
    $errors = [];

    //Valider les données qui ont été soumises par le client (sécurité)
    //Récupérer toutes les données dont on a besoin
    $quantity = $_POST['quantity'];
    $product = $_POST['product'];

    //1ere chose : vérifier que la quantité est bien définie selon les règles de notre métier.

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
    if (!isset($product) || !in_array($product, $products)) {
        $errors['product'] = "Merci de choisir un produit présent dans notre catalogue.";
    } //Validation du produit:
    // - Non renseigné
    // - Pas dans le catalogue
    if (!isset($product) || !in_array($product, $products)) {
        $errors['product'] = "Merci de choisir un produit présent dans notre catalogue.";
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
                <?php foreach ($products as $name => $label) : ?>
                    <!-- Dans la boucle -->
                    <option value="<?php echo $name; ?>"><?php echo $label; ?></option>
                <?php endforeach; ?>

                <?php
                //Alternative
                // foreach($product as $name => $label){
                //     echo "<option name='$name'>$label</option>";
                // }
                ?>
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