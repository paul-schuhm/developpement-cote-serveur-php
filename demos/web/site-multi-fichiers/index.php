<?php
//require permet d'inclure un autre script php dans le script courant
require 'header.php';
echo "Hello world, depuis index.php (accueil)";
?>

<a href='page.php'>Aller sur l'autre page du site</a>
<a href='foo/foo.php'>Aller sur le contenu foo.php</a>

<?php require './foo/foo.php'; ?>

<?php
//require_once s'assure que le fichier n'est inclus qu'une seule fois (à privilégier)
require_once 'footer.php';
require_once 'footer.php';
//include a le meme role que require sauf que si le script n'existe pas ne leve pas d'erreur fatale, juste un warning (voir dans le terminal). A éviter.
include 'page-qui-nexiste-pas.php';
