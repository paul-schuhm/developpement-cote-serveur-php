<?php

// Spécification : Répondre "Bonjour $firstname" affiché dans la couleur choisie.

//Si un formulaire est soumis, on fait le traitement du formulaire
if (isset($_POST['form_submitted'])) {

    //1. Vérifier que les données sont présentes : first_name et color

    //Est-ce que la clé 'first_name' existe et une valeur est fournie ?
    $firstNameSubmitted = isset($_POST['first_name']) &&
        !empty($_POST['first_name']);

    //Est-ce que la clé 'color' existe et une valeur est fournie ?
    $colorSubmitted = isset($_POST['color']) &&
        !empty($_POST['color']);

    //Si non, on rejette le formulaire
    if (!($firstNameSubmitted && $colorSubmitted)) {
        echo "<p>Merci de fournir des données valides.</p>";
        //die: arrêter l'execution.
        die;
    }

    // On placera les données validées dans ce tableau pour bien distinguer dans le reste du code
    // les données validées des données incertaines, venant de l'exterieur.
    $clean = [];

    // 2. Validation de la couleur
    $colors = ['red', 'blue', 'purple', 'orange'];
    //Est ce que la valeur soumise pour la couleur est dans ma liste de valeurs autorisées ?
    if (in_array($_POST['color'], $colors)) {
        //Validée
        //On l'ajoute a notre tableau de valeurs validées
        $clean['color'] = $_POST['color'];
    }

    // On ne peut pas "valider" le first_name, car l'input est ouvert (je n'ai pas une liste de prénoms valides !) On pourrait eventuellement appliquer la stratégie de sanitization/filtrage pour nettoyer
    //la valeur de caractères indésirables (termes à bannir, caractères interdits, etc.)
    $clean['first_name'] = $_POST['first_name'];

    // Ce qui compte, c'est d'échapper la valeur first_name pour désarmer les caractères pottentiellement
    // dangereux, comme les chevrons ici qui permettent de créer des balises, notamment des balises
    // scripts pour injecter du JavaScript. En PHP, utiliser la fonction htmlentities() :
    
    echo htmlentities("<p>Bonjour " . $clean['first_name'] . "</p>");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Vos informations</h1>

    <!-- 
    La balise form a 2 attributs :
        - action: url vers laquelle on soumet le formulaire
        - method: méthode HTTP (GET ou POST), utilisez POST !
    -->
    <form action="" method="POST">

        <!-- Input pour le prénom : Input ouvert -->
        <div>
            <!-- Essayer de saisir "<script>document.body.textContent = 'Got you'</script>" -->
            <label for="first_name">Votre prénom :</label>
            <!-- Pas de sécurité côté client ! required sert juste à l'experience utilisateur -->
            <input type="text" name="first_name" id="first_name" required>
        </div>
        <div>
            <!-- Le label est lié à l'input ayant l'id 'select_color' -->
            <label for="select_color">Choisissez votre couleur préférée :</label>
            <!-- Input fermé : une liste de choix (à préférer quand possible) -->
            <select name="color" id="select_color">
                <option value="">Choisir une couleur...</option>
                <option value="blue">Bleu</option>
                <option value="orange">Orange</option>
                <option value="purple">Violet</option>
                <option value="red">Rouge</option>
            </select>
        </div>

        <div>
            <!-- Input pour soumettre le formulaire. -->
            <input type="submit" value="Envoyer" name="form_submitted">
        </div>
    </form>
</body>

</html>