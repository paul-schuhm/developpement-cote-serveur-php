<?php

/**
 * Démo manipulation de fichiers, s'en servir comme base de données.
 */


//Récupérer les données d'un utilisateur (login, mdp)
//Extrait de $_POST
$input_login = "ed";
$input_password = "password";

//Une personne veut s'inscrire, on vérifie si le login est déjà pris ou pas. S'il est déjà pris on refuse, sinon on l'enregistre dans la base.


//Vérifier si la base existe déjà, sinon on la crée
if(!file_exists('users.txt')){
    $file = fopen('users.txt', 'w');
    fclose($file);
}

/**
 * Retourne vrai si l'utilisateur existe, faux sinon
 */
function user_exists(string $login): bool
{

    //1. Charger toute la base dans mon script
    $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    //2. Chercher s'il existe
    foreach ($users as $user) {
        //Découper la chaine en plusieurs éléments. Cela produit un tableau
        $data = explode(",", $user);
        $user_login = $data[0];
        if ($user_login === $login) {
            return true;
        }
    }

    return false;
}

/**
 * Enregistre l'utilisateur dans la base de données
 */
function save_user($login, $password)
{
    $file = fopen('users.txt', 'a');
    fwrite($file, "\n$login,$password\n");
    fclose($file);
}


if (user_exists($input_login)) {
    //Rejette
    echo "Demande rejeté, $input_login existe déjà";
} else {
    //Enregistre dans le fichier
    save_user($input_login, $input_password);
    echo "Votre compte a été crée avec succès !";
}
