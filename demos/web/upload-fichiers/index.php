<?php

/**
 * Démo sur un formulaire permettant d'uploader (téléverser) des fichiers sur le serveur
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démo upload</title>
</head>
<body>

<h1>Téléverser un fichier</h1>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="upload">Uploader une image (max 1Mo)</label>
    <!-- Champ caché (non affiché à l'utilisateur pou indiquer la taille maximale du fichier que l'on peut uploader, ici 1Mo) -->
    <input type="hidden" name="FILE_MAX_SIZE" value="1000">
    <input type="file" name="upload" id="upload" accept="image/png">
    <input type="submit" value="Téléverser">
</form>
    
</body>
</html>