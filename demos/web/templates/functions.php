<?php

/**
 * Imprime le footer HTML sur la sortie
 */
function theFooter(): void
{
    require_once './footer.php';
}


/**
 * Imprime le header HTML sur la sortie. Utilise le header par défaut si aucun
 * headerId n'est fourni.
 * @param $headerId Un identifiant de header personnalisé
 * @return void
 */
function theHeader(string $headerId = ''): void
{

    if (empty($headerId)) {
        require_once './header.php';
        return;
    }

    $header = 'header-' . $headerId . '.php';

    if(file_exists($header)){
        require_once $header;
        return;
    }
}
