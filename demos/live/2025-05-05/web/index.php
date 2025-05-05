<?php
//Importer le contenu du fichier
require_once './model.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP pour le web</title>
</head>

<body>

    <h1>Formulaire</h1>

    <h2>Passer une commande</h2>

    <form action="process.php" method="POST">

        <label for="product">Choisir un produit : </label>
        <select name="product" id="product">
            <!-- <option value="keyboard">Clavier</option>
            <option value="mouse">Souris sans fil</option>
            <option value="chair">Chaise ergonomique</option> -->

            <?php foreach ($products as $product) : ?>
                <option value="<?php echo $product['code']; ?>">
                    <?php echo $product['label']; ?>
                </option>
            <?php endforeach; ?>

        </select>

        <label for="quantity">Quantité : </label>
        <input type="number" name="quantity" id="quantity" value="1">
        <input type="submit" value="Valider">
    </form>

</body>

</html>