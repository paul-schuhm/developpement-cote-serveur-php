<?php

/**
 * Script en charge du traitement du formulaire de commande.
 */

echo "Traitement de votre commande en cours...";

if (empty($_POST['quantity'])) {
    echo '<p style="color:red"> La quantité que vous souhaitez commander est invalide. Merci de repasser votre commande</p>';
} else {
    echo '<p style="color:green">Votre commande de ' . htmlentities($_POST['quantity']) . 'kg de riz basmati a bien été passée. Elle sera traitée dans les meilleurs délais.</p>';
}

?>
<!-- Proposer un lien pour retourner à la racine du site, traitée par défaut par le script index.php -->
<a href="/">Retourner à l'accueil</a>