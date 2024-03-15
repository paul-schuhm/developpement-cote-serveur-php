<?php
/**
 * Traitement du formulaire d'upload de fichiers
 */

//La variable super globale $_FILES va contenir toutes les informations sur le fichier téléchargé : nom, emplacement temporaire, taille (en octets), type de fichier indiqué par le navigateur (MIME type)
print_r($_FILES);

//La taille maximale (en octets) d'un fichier uploadé. Ici 1Mo
define('MAX_FILE_SIZE', 1000000);
//Le dossier où placer les fichiers uploadés
define('UPLOAD_DIR', 'uploads');

//Récupérer le nom temporaire donné au fichier
$tmpFilename = $_FILES['upload']['tmp_name'];

//Nom définitif du fichier uploadé (renommé et déplacé)
$newFilename = UPLOAD_DIR . "/image00.png";


//Si la taille dépasse la taille max, rejeter le fichier
if(filesize($tmpFilename) > MAX_FILE_SIZE){
    //On informe le client que le fichier est trop volumineux
    //Le fichier sera automatiquement supprimé du dossier temporaire
    //a la fin de l'execution du script
    echo "<p>Le fichier est trop volumineux (max 1Mo). Merci de réessayer avec un fichier plus petit.</p>";
    //On arrête le script ici.
    exit;
}

//Si le fichier a été uploadé via une requête HTTP POST, on le conserve et le déplace dans notre dossier d'uploads
if(is_uploaded_file($tmpFilename)){
    //Renommer et déplacer le fichier là où on le souhaite
    move_uploaded_file($tmpFilename, $newFilename);
    echo "<p>Le fichier a été uploadé avec succès</a>";
    echo "<a href='{$newFilename}'>Télécharger l\'image</a>";
}else{
    echo "<p>Une erreur s'est produite. Merci de réessayer plus tard.</p>";
}