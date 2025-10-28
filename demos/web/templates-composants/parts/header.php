<?php  
/**
 * Variables du template :
 * - $h1 : Titre H1
 * - $title : métadonnée title (onglet)
 */
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="/">Accueil</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </nav>
        <h1>
            <?php echo $h1; ?>
        </h1>
    </header>
    <main>