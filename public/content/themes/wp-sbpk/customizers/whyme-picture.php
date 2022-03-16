<?php


add_action(
    'customize_register',   // event pour enregistrer nos customizer
    'register_whyme_picture_customizer'
);

// DOC CUSTOMIZER Manager : https://developer.wordpress.org/reference/classes/wp_customize_manager/
function register_whyme_picture_customizer(WP_Customize_Manager $themeCustomizerObject)
{
    // identifiant de la section qui s'affichera dans le backoffice de wordpress (appearance->customize)
    $customSectionName = 'custom-section-pictures';

    // création d'une variable configurable grace à un customizer
    $customizableVariableName = 'whyme-picture';

    // une valeur par défaut pour la variable définie au dessus
    $defaultValue = get_theme_file_uri('assets/images/details-background.jpg');

    // selecteur css pour cibler la "bannière" dans notre thème
    $customizerButtonCssSelector = '.split .area-2';


    $themeCustomizerObject->add_section(
        $customSectionName,    // identifiant de la section (custom-section-pictures)
        [
            // la fonction __(...) permet de gérer l'I18N  (InternationalizatioN)
            'title' => __("Homepage pictures"), // libellé de la section
            'priority' => 2   // dans quel ordre la section va s'afficher dans le menu , 0 correspond à "tout en haut" de la liste
        ]
    );

    // Declare a customizable variable
    $themeCustomizerObject->add_setting(
        $customizableVariableName,   // nom de la variable ('header-picture')
        [
            'default' => $defaultValue, // valeur par défaut
            'transport' => 'postMessage'    // preview en js , par défaut wp rafraichit la page
        ]
    );

    // Component to use to configure the customizable variable 
    $themeCustomizerObject->add_control(
        // WP_Customize_Image_Control est un composant wordpress qui permet de choisir une image
        new WP_Customize_Image_Control(
            $themeCustomizerObject, // l'objet "customizer" $themeCustomizerObject
            'whyme-picture-selector',  // identifiant du composant (nous choisissons le nom de façon arbitraire)
            [
                'label' => __('Why me picture'),    // le libellé du composant
                'section' => $customSectionName,   // la section dans laquelle afficher le composant
                'settings' => $customizableVariableName, // la variable configurable ('header-picture')
            ]
        )
    );

    // STEP E5 CUSTOMIZER Configuration du "petit crayon" qui permet de déclencher le customizer

    $themeCustomizerObject->selective_refresh->add_partial(
        // pour quelle variable "le petit crayon" va s'appliquer
        $customizableVariableName, // (header-picture)
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
    'wp_mysite_load_whyme_picture_customizer_assets'
);

function wp_mysite_load_whyme_picture_customizer_assets()
{

    // Nous chargeons notre css pour la preview du customizer afin de pouvoir surcharger les styles
    wp_enqueue_style(
        'customizer-style',
        get_theme_file_uri('assets/customizers/style.css'),
    );

    wp_enqueue_script(
        'header-picture-customizer-js',
        get_theme_file_uri('assets/customizers/whyme-picture.js'),
        [], // gestion des dépendances,
        false,
        true // nous demandons à wp de mettre le javascript dans le footer
    );
}
