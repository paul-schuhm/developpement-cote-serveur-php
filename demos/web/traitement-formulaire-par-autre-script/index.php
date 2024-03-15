<?php

/**
 * Script en charge de présenter le formulaire au client pour qu'il puisse passer sa commande
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
</head>

<body>
    <h1>Passer votre commande</h1>

    <form action="/confirm-order.php" method="POST">
        <label for="quantity">Quelle quantité de riz basmati (kg) souhaitez-vous ? </label>
        <input type="number" name="quantity" id="quantity">
        <input type="submit" value="Valider la commande" name="order">
    </form>

</body>

</html>