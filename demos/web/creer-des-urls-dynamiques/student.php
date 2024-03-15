<?php

/**
 * Template pour la page web d'un·e étudiant·e
 */
?>

<?php

require_once './functions.php';

/**
 * Les données de l'étudiant·e sont fournies au script (données externes)
 */
//On récupère l'id de l'étudiant dans l'URL (paramètre d'URL)
$student = findStudentById($_GET['id']);

//S'il n'y a pas d'id valide dans l'URL, alors on affiche une erreur 404 (ressource introuvable)
if ($student === NULL) {
    echo '404, la ressource que vous recherchez n\'existe pas.';
    echo '<a href="/">Retourner à l\'accueil</a>';
    exit;
}

$firstName = ucfirst($student[1]);
$lastName  = ucfirst($student[2]);
$specialty = strtoupper($student[3]);
$fullName = sprintf("%s %s", $firstName, $lastName);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlentities($firstName); ?></title>
</head>

<body>

    <h1><?php echo htmlentities($fullName); ?></h1>

    <p>Spécialité : <?php echo htmlentities($specialty); ?></p>

    <p>Lorem ipsum...</p>

</body>

</html>