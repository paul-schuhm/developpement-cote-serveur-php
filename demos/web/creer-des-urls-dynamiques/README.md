# Démo : Créer des URLs dynamiques

Dans cette démo, on montre une manière de créer des URLs dynamiques. 

Le service web dispose d'une base de données d'étudiant·es dans un fichier CSV. Pour chaque étudiant·e, une URL est crée à partir d'un identifiant unique et d'un paramètre d'URL. 

~~~
/student.php?id=1
/student.php?id=2
etc..
~~~

Le fichier student.php sert de template pour afficher la page web d'un·e étudiant·e.

## Lancer la démo

Servir tout le dossier avec le serveur intégré de PHP :

~~~bash
php -S localhost:5001 -t creer-des-urls-dynamiques
~~~