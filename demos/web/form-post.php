<?php 
/**
 * Ici on va traiter le formulaire. Comme le path du form est vide, on soumet le formulaire
 * au même script PHP (celui ci). Le script fait donc à la fois l'envoi du formulaire au client et
 * le traitement du formulaire (tout au même endroit).
 */

//var_dump($_POST);

//Check si formulaire soumis avec la valeur (sous la clef 'answer')
if(isset($_POST['answer'])){

    //Traitement du formulaire
    //On ne fait jamais confiance à ce qui provient du client
    $answer = strtolower($_POST['answer']);

    //On déclare la bonne réponse
    $correctAnswer = 'blanc';

    //Vérifier si la réponse fournie est bonne ?
    if($answer === $correctAnswer){
        //C'est la bonne réponse
        //Afficher un paragraphe avec un message
        echo "<p>Bravo, c'est la bonne réponse !</p>";
        exit; //ou die;
    }else{
        //C'est pas la bonne réponse. On affiche un message et on repropose le formulaire
        //Remarque : le paragraphe p est ici en dehors de la balise html, le markup est invalide (mais c'est ok pour la démo ici)
        echo "<p>Essaie encore !</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>

    <h1>Démo : Soumettre un formulaire avec POST</h1>

    <h2>Quelle est la couleur du cheval blanc d'Henri IV ?</h2>


    <!-- Afficher le message ici -->

    <form action="" method="POST">
        <input type="text" name="answer" id="">
        <input type="submit" name="submit" value="Proposer">
    </form>

</body>

</html>