# Démo d'utilisation de templates pour créer un site web dynamique

- [Démo d'utilisation de templates pour créer un site web dynamique](#démo-dutilisation-de-templates-pour-créer-un-site-web-dynamique)
  - [Utiliser le site](#utiliser-le-site)
  - [Commentaires sur la démarche et le résultat final](#commentaires-sur-la-démarche-et-le-résultat-final)


Par définition, PHP est *un moteur de templates* (imparfait) : à partir d'un unique script PHP, il est possible de générer un nombre indéterminé de pages web différentes en **fournissant au script les données à présenter**.

Pour créer des templates modulaires (avec des parties *réutilisables*), il est essentiel de diviser nos scripts PHP en plusieurs fichiers. Ainsi, un même script peut être réutilisé dans différents contextes.

C'est ce que l'on montre dans cette démo.

## Utiliser le site

Se placer à la racine du projet et utiliser le serveur local intégré de PHP :

~~~bash
php -S localhost:8080
~~~

Se rendre à l'url http://localhost:8080.

## Commentaires sur la démarche et le résultat final

- Dans cette démo, on développe un site qui possède initialement deux pages :
  - Une page d'accueil (*home*) ;
  - Une page de contact (*contact*).
- On commence donc par écrire deux scripts PHP `index.php` et `contact.php`, chacun ayant la responsabilité de produire les pages web *"Accueil"* et *"Contact" *respectivement ;
- Une fois que l'on a développé une page on se rend compte que l'autre page va avoir des parties communes avec la première, typiquement :
  - Le header ;
  - Le footer.
- Si on se contente de dupliquer le code HTML pour chaque page on finit par rencontrer un problème : une modification du site va certainement devoir nous forcer à modifier toutes les pages ! Par exemple, si on ajoute une page, il faut ajouter un lien dans la barre de navigation. Or *le code pour la produire est dupliqué* sur chaque page. Il faut donc penser à modifier toutes les pages pour créer notre nouvelle barre de navigation ! On peut faire mieux en développant des templates de page et des composants !
- Le *template* (structure, modèle) de chaque page est le suivant :
  - *header* : métadonnées, navbar, h1
  - *content* : contenu propre à la page
  - *footer* : infos légales, sitempa, etc.
- **Le header et le footer sont réutilisés** sur chaque page : on les déplace donc dans des *template parts* (bouts de templates) ou *composants*. **Pour chaque composant on crée un fichier PHP** en charge de produire son HTML.
- A présent, dans le script d'une page, comme `index.php`, on peut importer les composants *header* et *footer* avec `require_once`. Si je crée une autre page, je n'ai plus qu'à importer ces composants.
- Qu'est ce qu'on a gagné ? **Le header et le footer sont définis en un seul endroit !** On peut les réutiliser pour toutes les pages. S'il faut apporter une modification (ajout d'un lien dans la navbar), **il suffit de modifier un seul fichier !**, et le changement sera automatiquement repercuté sur toutes les pages.
- Enfin, **on encapsule ces imports dans des fonctions pour définir une interface propre d'utilisation** et masquer les détails d'implémentation. Cela permet également de **passer des arguments à nos composants** pour en produire des *variations*. Par exemple, le composant *header* doit afficher le `title` et le `h1` de chaque page. On transmet ces valeurs au moment de l'import du *header*.
- On pourrait continuer cette démarche d'identification de composants réutilisables, laissé en exercice.