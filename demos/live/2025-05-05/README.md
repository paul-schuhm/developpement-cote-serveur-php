# Démo pages web dynamique avec PHP


Une simple démo de prise de commande de fournitures de bureau

Notions abordées : 

- Serveur web local intégré de PHP;
- Variables superglobales;
- Formulaires : attributs name, value, action et method;
- Validation des données (*ALL INPUT IS EVIL !*);
- Diviser son application PHP en plusieurs fichiers et utiliser `require`/`require_once`;
- Déclarer des constantes;
- Créer des templates;
- Créer des URL dynamiques;

## Lancer la démo


~~~php
php -S localhost:8080 -t web
~~~

Accéder à une fiche produit à l'URL `/single-product.php?code=keyboard`
