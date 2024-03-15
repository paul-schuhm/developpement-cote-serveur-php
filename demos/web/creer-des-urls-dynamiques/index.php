<?php

/**
 * Démo sur la création d'url uniques pour chaque enregistrement d'un fichier CSV
 * à l'aide de paramètre d'URL et d'un identifiant unique (ou slug)
 */

require_once './functions.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Étudiant·es</title>
</head>

<body>

    <h1>Liste des étudiant·es</h1>

    <ul>
        <!-- Construire la liste des étudiant·es à partir du contenu du fichier CSV (base de données) -->
        <?php foreach (findAllStudents() as $student) : ?>
            <li>
                <!-- On construit une URL pour chaque éditant·e avec un paramètre d'URL 'id' et une valeur unique -->
                <a href="student.php?id=<?php echo htmlentities($student[0]); ?>">
                    Accéder à la fiche de <?php echo htmlentities($student[1]) . ' ' . htmlentities($student[2]); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>