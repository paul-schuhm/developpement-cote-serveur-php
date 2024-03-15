<?php
//Permet de construire le chemin complet du fichier et de ne pas avoir de soucis avec des inclusions
//a partir de chemins relatifs (notion plus avancée)
//Sinon, sans utiliser __DIR__, depuis la page index.php, le chemin vers bar.php n'est pas correct
require __DIR__ . '/bar/bar.php';
?>

<p>foo</p>