<?php

/**
 * Fonctions et données utiles à la logique de l'application web.
 */

/**
 * Fichier contenant la liste des étudiants.
 */
define('FILE_STUDENTS', 'students.csv');

/**
 * Retourne un·e étudiant·e correspondant à l'id s'il existe, NULL sinon
 * @return array|null
 */
function findStudentById(int $id): array|null
{

    //Check que le rendez-vous n'est pas déjà pris
    if (file_exists(FILE_STUDENTS)) {
        $file = fopen(FILE_STUDENTS, 'r');
        //Ignorer la premiere ligne qui contient les métadonnées (noms des colonnes)
        fgetcsv($file);
        while (($line = fgetcsv($file)) !== false) {
            //Si un enregistrement correspond, on retourne la ligne et on arrête la lecture
            if (intval($line[0]) === $id) {
                return $line;
            }
        }
        fclose($file);
    }

    //Aucun·e étudiant·e trouvé·e, retourne NULL (absence de valeur)
    return NULL;
}




/**
 * Retourne la liste des étudiant·es enregistrés dans le système
    @return array
 */
function findAllStudents(): array
{
    $students = [];

    //Check que le rendez-vous n'est pas déjà pris
    if (file_exists(FILE_STUDENTS)) {
        $file = fopen(FILE_STUDENTS, 'r');
        //Ignorer la premiere ligne qui contient les métadonnées (noms des colonnes)
        fgetcsv($file);
        while (($line = fgetcsv($file)) !== false) {
            $students[] = $line;
        }
        fclose($file);
    }

    return $students;
}
