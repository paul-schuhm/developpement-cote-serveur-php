<?php
/**
 * Démo sur l'échappement pour protéger ses pages web (XSS attack: d'injecter du contenu dans une page potentiellement malveillant: lien, script JS, form)
 * @link : https://fr.wikipedia.org/wiki/Cross-site_scripting
 */

echo "<h1>Ceci est un h1 non échappé, les balises seront interprétées par le navigateur</h1>";

echo htmlentities("<h1>Ceci est un h1 échappé, les balises ne seront  pas interprétées par le navigateur</h1>");

echo "Morale de l'histoire : échapper toujours des données provenant d'une source externe (formulaire, base de données, etc.)" . PHP_EOL;