<?php

//Affichage et traitement du formulaire dans le même script.

//Tester si le formulaire est soumis ?

//L'heure de vous introduire ce qu'on appelle en PHP les variables Super Globales.
//$_POST : qu'est ce que c'est ? C'est un tableau qui contient toutes les informations sur les requêtes POST.

//Pour tester si le formulaire a été soumis, comme $_POST est un tableau,
//on peut tester si la clef 'submit' est présente. Si c'est le cas, ça veut dire que le 
//formulaire a été soumis. Sinon, non. La clef submit correspond au champ 'submit' du formulaire (voir son attribut name)

//Est-ce-qu'il y a une valeur à la clef 'submit' du tableau $_POST ? 
//$_POST['submit'] ? isset($_POST['submit])) renvoie vrai si oui, faux sinon.

//Si le formulaire a été soumis
if (isset($_POST['submit'])) {
    //Le formulaire a été soumis, on peut le traiter et envoyer une réponse
    echo "Traitement du formulaire...";
    var_dump($_POST);
}
//Sinon on fait aucun traitement, on affiche le formulaire au client
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <h1>Formulaire d'inscription 2e année</h1>

<!-- 
La balise form a deux attributs : action et method
action: indique sur quelle path (chemin) on envoie la requête
method: indique quelle méthode on utilise pour envoyer la requête. On a deux choix: GET(par défaut) ou POST (préféra le POST pour soumettre un formulaire)
Balise form : quelque chose qui vous permet de fabriquer une requete que le navigateur va envoyer
-->
    <form action="" method="POST">

        <!-- attribut name donne un nom aux champs du formulaire qui servira à les identifier cote serveur (quand le formulaire est soumis) 
        On les retrouve sous forme de clef/valeur dans le tableau  $_POST!-->
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="John">

        <label for="date-de-naissance">Date de naissance</label>
        <input type="date" name="date-de-naissance" id="date-de-naissance" max="2007-01-01" min="1980-01-01">

        <select name="specialite" id="specialite">
            <option value="dev">Développement</option>
            <option value="design">Design</option>
            <option value="market">Marketing</option>
        </select>

        <input type='submit' name="submit" value='Envoyer'>
    </form>
</body>

</html>
