<?php

/**
 * Démos sur lea syntaxe de structures de contrôle alternatives pour les templates
 */

//Une collection de valeurs que l'on aimerait rendre sous forme de liste dans une page HTML
$array = ['red', 'blue', 'green'];
?>

<h1>Démo sur la syntaxe alternative pour les structures de contrôle</h1>

<p>
    PHP propose une autre manière de rassembler des instructions à l'intérieur d'un bloc, pour les fonctions de contrôle if, while, for, foreach et switch. Dans chaque cas, le principe est de remplacer l'accolade d'ouverture par deux points (:) et l'accolade de fermeture par, respectivement, endif;, endwhile;, endfor;, endforeach;, ou endswitch;.
</p>

<p>
    Cette syntaxe améliore énormément la lisibilité des templates de page web écrit et générés en PHP.
</p>

<p>
    <a href="https://www.php.net/manual/fr/control-structures.alternative-syntax.php">En savoir plus</a>
</p>

<h2>Syntaxe de base</h2>

<!-- Créer une liste non ordonnée HTML de manière dynamique avec PHP.-->
<ul>
    <!-- Syntaxe de base -->
    <?php foreach ($array as $item) { ?>
        <li><?php echo $item ?></li>
    <?php } ?>
</ul>

<!-- ou encore -->
<ul>
    <?php foreach ($array as $item) {
        echo "<li>$item</li>" . PHP_EOL;
    } ?>
</ul>

<!-- Syntaxe alternative -->
<ul>
    <?php foreach ($array as $item) : ?>
        <li><?php echo $item; ?></li>
    <?php endforeach; ?>
</ul>

<!-- Syntaxe alternative pour les conditions -->
<h2>Syntaxe alternative pour les conditions</h2>

<?php $number = rand(0, 100); ?>

<?php if ($number % 2 === 0) : ?>
    <p class="even"><?php echo $number ?> est un nombre pair !</p>
<?php else : ?>
    <p class="odd"><?php echo $number ?> est un nombre impair !</p>
<?php endif; ?>

<!-- Combiner les structures -->

<h2>Combiner les structures</h2>

<?php if (!empty($array)) : ?>
    <ul>
        <?php foreach ($array as $item) : ?>
            <li><?php echo $item; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>La liste d'items est vide !</p>
<?php endif; ?>