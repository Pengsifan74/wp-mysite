<?php

add_action(
    'customize_register',   // event pour enregistrer nos customizer
    'register_my_objective_text'
);

// DOC CUSTOMIZER Manager : https://developer.wordpress.org/reference/classes/wp_customize_manager/
function register_my_objective_text(WP_Customize_Manager $themeCustomizerObject)
{

    // identifiant de la section qui s'affichera dans le backoffice de wordpress (appearance->customize)
    // $customSectionName = 'custom-section-colors';
    $customSectionName = 'custom-section-texts';

    // création d'une variable configurable grace à un customizer
    $customizableVariableName = 'myObjective';

    // une valeur par défaut pour la variable définie au dessus
    $defaultValue = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur tenetur libero reiciendis nulla pariatur nemo veniam quae, distinctio, fugiat perferendis possimus eius deleniti ab placeat. Error laudantium voluptas debitis recusandae, inventore, vitae tenetur esse totam quibusdam nesciunt deleniti reprehenderit quae praesentium. Beatae facere rerum deleniti consequatur quasi itaque dolor vel';

    // selecteur css pour cibler la "bannière" dans notre thème
    $customizerButtonCssSelector = '.myObjective';


    $themeCustomizerObject->add_section(
        $customSectionName,    // identifiant de la section (custom-section-colors)
        [
            // la fonction __(...) permet de gérer l'I18N  (InternationalizatioN)
            'title' => __("Homepage Texts"), // libellé de la section
            'priority' => 1   // dans quel ordre la section va s'afficher dans le menu , 0 correspond à "tout en haut" de la liste
        ]
    );

    $themeCustomizerObject->add_setting(
        $customizableVariableName,
        [
            'default' => $defaultValue, // valeur par défaut
            'transport' => 'postMessage'    // preview en js , par défaut wp rafraichit la page
        ]
    );

    $themeCustomizerObject->add_control(

        new WP_Customize_Control(
            $themeCustomizerObject, // l'objet "customizer" $themeCustomizerObject
            'my-objective-text-selector',  // identifiant du composant (nous choisissons le nom de façon arbitraire)
            [
                'label' => __('My Objective'),    // le libellé du composant
                'section' => $customSectionName,   // la section dans laquelle afficher le composant
                'settings' => $customizableVariableName,
            ]
        )
    );


    // STEP E5 CUSTOMIZER Configuration du "petit crayon" qui permet de déclencher le customizer

    $themeCustomizerObject->selective_refresh->add_partial(
        // pour quelle variable "le petit crayon" va s'appliquer
        $customizableVariableName, // (My Objective)
        [
            // selecteur css pour indiquer dans quel élément de la page le petit crayon du customizer doit s'afficher
            'selector' => $customizerButtonCssSelector,
            'fallback_refresh' => false
        ]
    );
}

//==================================================================

add_action(
    'customize_preview_init',   // Event pour charger les assets dédié à la préview du customizer
    'wp_mysite_load_my_objective_customizer_assets'
);

function wp_mysite_load_my_objective_customizer_assets()
{

    // Nous chargeons notre css pour la preview du customizer afin de pouvoir surcharger les styles
    wp_enqueue_style(
        'customizer-style',
        get_theme_file_uri('assets/customizers/style.css'),
    );

    wp_enqueue_script(
        'my-objective-customizer-js',
        get_theme_file_uri('assets/customizers/myObjective.js'),
        [], // gestion des dépendances,
        false,
        true // nous demandons à wp de mettre le javascript dans le footer
    );
}

