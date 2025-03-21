<?php

/**
 * Exercice 1 Module 4
 */
$pays = ['France', 'Belgique', 'Allemagne', 'Angleterre', 'Espagne'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exercice 1 Module 4</h1>
    <ul>
        <!-- Avec les blocks foreach / endforeach -->
        <?php foreach ($pays as $p) : ?>
            <li><?php echo $p; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>