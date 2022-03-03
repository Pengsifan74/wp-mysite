<?php
// ===============================================================
// Code inutile à modifier
// ===============================================================
global $router;

// STEP E9 ROUTER, lancement d'altorouter. Le code ci dessous est "copiable/collable" directement
$match = $router->match();

// Si le router à validé une route
if($match) {

    $callbackFunction = $match['target'];

    // Nous executons la fonction de callback en lui passant en argument la liste des parties "variable" de l'URL
    // DOC PHP  call_user_func_array https://www.php.net/call_user_func_array
    call_user_func_array(
        $callbackFunction,
        $match['params']
    );
}
else {
    // TODO Gérer la page 404
    // BONUS exception : déclencher une erreur "custom"
    throw(
        new Exception('CUSTOM ROUTER : PAGE NON TROUVEE ; Y-A-T-IL UNE ROUTE DE CONFIGUREE DANS router.initialize.php')
    );

}
