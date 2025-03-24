<?php

//Traitement du formulaire (enregistrer le message)

//1. Est-ce qu'il y a un formulaire à traiter ?
if (isset($_POST['publish'])) {
    //2. Vérification (donnée présente, nettoyage, etc.) Passée ici.
    //3. On récupère le message à enregistrer
    $message = $_POST['message'];
    //4. On enregistre le message dans un fichier (à la suite des autres !)
    $file = fopen('database.txt', 'a');
    fwrite($file, "$message\n");
    fclose($file);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proto CMS</title>
</head>

<body>

    <h1>Blog</h1>

    <form action="" method="POST">
        <label for="message">Laisser un message</label>
        <input type="text" name="message" id="message">
        <input type="submit" name="publish" value="Publier">
    </form>
</body>

</html>