<?php

namespace WDL\Controllers;

use WP_Query;

// STEP E9 MVC CoreController , cette classe va nous permettre de mutualiser les traitements dont nous aurons besoin dans tous nos controllers

class CoreController
{

    public function isConnected()
    {
        return is_user_logged_in();
    }


    public function show($template, $variablesForTemplate = []) {
        // dans les templates nous aurons potentiellement besoin du router
        // nous devons charger le router qui a été déclaré comme étant une variable globale
        global $router;

        get_template_part(
            $template,
            null, // il est possible de donner un identifiant au template
            $variablesForTemplate
        );
    }
}
