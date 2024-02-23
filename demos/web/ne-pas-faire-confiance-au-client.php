<?php

/**
 * Dans cette démo, on montre ce qu'il se passe si on fait confiance à ce que nous soumet le client.
 * Pour le tester, amusez-vous à modifier le contenu de la page web (attributs, inputs)
 */

if (isset($_POST['rice-quantity-kg'])) {
    $qtity = $_POST['rice-quantity-kg'];
    //Valide les données côté serveur. ON NE FAIT JAMAIS CONFIANCE AUX DONNEES VENANT D UN CLIENT !
    if ($qtity >= 20 && $qtity <= 1000) {
        echo "Votre commande de $qtity kg a bien été enregistrée !";
    } else {
        echo "Votre commande n'est pas valide. Merci de renseigner le formulaire à nouveau.";
    }
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Don't trust clients</title>
    <style>
        html {
            background: lightgrey;
        }
    </style>
</head>

<body>
    <h1>Don't trust clients !</h1>

    <h2>Passez votre commande</h2>

    <form action="" method="POST">
        <label for="rice-quantity-kg">Combien de kilo(s) de riz désirez-vous commander ?</label>
        <!-- Entre 20kg et 1000kg !-->
        <input type="number" id="rice-quantity-kg" name="rice-quantity-kg" min="20" max="1000" required>
        <input type="submit" value="Commander" title="Valider votre commande">
    </form>

</body>

</html>