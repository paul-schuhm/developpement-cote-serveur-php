<?php

/**
 * Une démo qui illustre les variables super globales
 * 1. Lancer le script sur le serveur local
 *    php -S localhost:5001 super-globales.php
 * 2. Cliquer sur le lien (notez l'URL), soumettez le formulaire
 * 3. Inspecter le contenu des variables globales
 * 
 */


?>

<?php
echo "<pre>";
echo "<h2>Données fournies au script PHP que vous pouvez utiliser</h2>";
echo "<h2>Contenu de \$_GET</h2>";
print_r($_GET);
echo "<h2>Contenu de \$_POST</h2>";
print_r($_POST);
echo "<h2>Contenu de \$_SERVER</h2>";
print_r($_SERVER);
echo "<h2>Contenu de \$_FILES</h2>";
print_r($_FILES);
echo "</pre>";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        pre {
            background-color: greenyellow;
            padding: 5px;
        }

        input[type='submit'] {
            font-size: large;
            font-weight: bold;
        }
    </style>


</head>

<body>

    <h1>Les variables super-globales </h1>

    <h2>Naviguer avec la méthode HTTP <code>GET</code></h2>

    <a href="?foo=bar">Cliquez ici</a>

    <h2>Soumettre un formulaire avec la méthode <code>POST</code></h2>
    <!-- Pour envoyer un fichier via un formulaire, il faut modifier l'encodage des données en "multipart/form-data"
via l'attribut enctype -->
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="city">Dans quelle ville vivez-vous ?</label>
            <input type="text" name="city" id="city" value="<?php echo $_POST['city']; ?>">
        </div>

        <div>
            <label for="upload">Téléverser un fichier :</label>
            <input type="file" name="upload" id="upload">
        </div>
        <input type="submit" value="Envoyer" name="submit">
    </form>

    <?php if (!empty($_POST['city'])) : ?>
        <p>Vous habitez à <?php echo htmlentities($_POST['city']) ?>, quelle ville charmante !</p>
    <?php endif; ?>


    <h2>En savoir plus</h2>

    <p>
        Pour en savoir plus sur les données présentes, <a href="https://www.php.net/manual/fr/language.variables.superglobals.php">consulter la documentation officielle</a> :
    </p>
    <ul>
        <li>
            <a href="https://www.php.net/manual/fr/reserved.variables.get.php">En savoir plus sur $_GET</a>;
        </li>
        <li>
            <a href="https://www.php.net/manual/fr/reserved.variables.post.php">En savoir plus sur $_POST</a>;

        </li>
        <li>
            <a href="https://www.php.net/manual/fr/reserved.variables.server.php">En savoir plus sur $_SERVER</a>.

        </li>
    </ul>
</body>

</html>