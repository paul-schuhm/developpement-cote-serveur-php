<?php

/**
 * Traitement du formulaire
 */

//Variables superglobales

//Affiche toutes les informations sur la reqûete POST fournie au script.
// var_dump($_POST);

//Est ce que le formulaire a été soumis ?
//On teste la présence de la clef 'submit' (input submit) = formulaire soumis
if (isset($_POST['submit'])) {
    echo "Traitement de la commande en cours...\n";
    //Ecrire "Vous avez commandé [quantity] [product]."
    echo "Vous avez commandé " . $_POST['quantity'] . " " . $_POST['product'];
    die;
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
            <label for="product">Choisir un produit: </label>
            <select name="product" id="product">
                <option value="mouse">Souris sans fil</option>
                <option value="mat">Tapis de souris</option>
                <option value="chair">Chaise de bureau</option>
                <option value="keyboard">Clavier</option>
            </select>
        </div>

        <div>
            <label for="quantity">Quantité</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1" max="20">
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