# Démo upload de fichiers

Une démo qui illustre comment créer un formulaire permettant de téléverser une image sur le serveur

## Comment ça marche ?

Pour *uploader* un fichier, il faut modifier l'encodage par défaut des données avec l'attribut `enctype="multipart/form-data"`. L'`enctype` `multipart/form-data` est utilisée pour envoyer des fichiers via des formulaires HTML. Elle permet de transférer des données binaires (fichiers) ainsi que des données texte en tant que parties distinctes d'une seule requête HTTP.

Le fichier téléversé est stocké temporairement dans le dossier temporaire du système (ce dossier est configurable via la configuration de PHP, non abordée dans ce cours).

Pour traiter correctement le fichier, il faut vérifier que le fichier est bien *uploadé* avec la fonction `is_uploaded_file()`. Puis le déplacer dans l'endroit désiré (un dossier d'uploads ou d'images par exemple) avec la fonction `move_uploaded_file`.

Si vous désirez rejeter l'upload de fichier, vous n'avez rien à faire. Le fichier temporaire sera automatiquement supprimé à la fin de l'execution du script PHP.

## Lancer la démo

Servir le dossier de la démo avec le serveur intégré de PHP :

~~~bash
php -S localhost:5001 -t upload-fichiers
~~~

## Sécuriser l'upload de fichiers (basics)

- Vérifier que le fichier a bien été envoyé avec `is_uploaded_file()` et déplacer le/renommer le avec `move_uploaded_file()`;
- Vérifier la taille du fichier uploadé avec `filesize()`;
- **Attribuer vous-même un nom unique** a chaque fichier uploadé ;

## Liens utiles

- [Chargements de fichiers par méthode POST](https://www.php.net/manual/fr/features.file-upload.post-method.php), tout ce que vous avez besoin de savoir sur le téléversement de fichiers via un formulaire avec la méthode POST, documentation officielle de PHP
- [is_uploaded_file](https://www.php.net/manual/fr/function.is-uploaded-file.php), doc officielle
- [move_uploaded_file](https://www.php.net/manual/fr/function.move-uploaded-file.php), doc officielle