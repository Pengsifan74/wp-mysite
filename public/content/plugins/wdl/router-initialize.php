<?php
// STEP E9 Router Initialisation du router

// déclaration du router. Nous allons avoir besoin de ce router dans de nombreux fichier. Ce n'est pas propre mais pour des raisons de simplicité de code ; nous déclarons ce router comme étant une variable globale

use WDL\Controllers\ParticipationController;
use WDL\Controllers\UserController;

global $router;


// instanciation du router
$router = new AltoRouter();
// dirname permet de supprimer le nom de fichier dans une chaine de caractère contenant un "chemin fichier"
$baseURI = dirname($_SERVER['SCRIPT_NAME']);

// configuration de l'url racine de notre site aurpès d'altorouter
$router->setBasePath($baseURI);

// configuration des routes
/* DEMO
$router->map(
    'GET', // surveille les appels HTTP de type GET
    '/wdl/participate/[i:eventId]/', // url a surveiller
    function($eventId) {
        $participationController = new ParticipationController();
        $participationController->participate($eventId);
    },
    'participate'
);



$router->map(
    'GET', // surveille les appels HTTP de type GET
    '/wdl/user/home/', // url a surveiller
    function() {
        $userController = new UserController();
        $userController->home();
    },
    'user-home'
);

*/