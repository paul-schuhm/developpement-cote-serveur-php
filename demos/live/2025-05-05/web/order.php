<?php

require_once './model.php';
require_once './functions.php';

theHeader();
?>

<h1>Formulaire</h1>

<h2>Passer une commande</h2>

<form action="process.php" method="POST">

    <div>
        <label for="full_name">Nom complet : </label>
        <input type="text" name="full_name" id="full_name">
    </div>

    <div>

        <label for="product">Choisir un produit : </label>
        <select name="product" id="product">
            <?php foreach ($products as $product) : ?>
                <option value="<?php echo $product['code']; ?>">
                    <?php echo $product['label']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="quantity">Quantité : </label>
        <input type="number" name="quantity" id="quantity" value="1">
    </div>

    <div>
        <input type="submit" value="Valider">
    </div>
</form>

<?php theFooter(); ?>