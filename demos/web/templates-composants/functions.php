<?php 

/*
Fonctions pour fabriquer nos pages, créer des composants réutilisables
*/


/**
 * Affiche le header de la page web
 */
function theHeader(string $h1, string $title): void{
    require_once './parts/header.php';
}

/**
 * Affiche le footer de la page web
 */
function theFooter(): void{
    require_once './parts/footer.php';
}