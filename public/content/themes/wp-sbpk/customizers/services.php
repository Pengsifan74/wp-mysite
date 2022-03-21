<?php

// Events to register customizers
add_action(
    'customize_register',
    'register_service_title_one'
);

add_action(
    'customize_register',
    'register_service_text_one'
);

add_action(
    'customize_register',
    'register_service_title_two'
);

add_action(
    'customize_register',
    'register_service_text_two'
);

add_action(
    'customize_register',
    'register_service_title_three'
);

add_action(
    'customize_register',
    'register_service_text_three'
);

// Customizers informations
function register_service_title_one(WP_Customize_Manager $themeCustomizerObject)
{
    $customSectionName = 'custom-section-texts';

    $customizableVariableName = 'serviceTitleOne';

    $defaultValue = 'Title';

    $customizerButtonCssSelector = '.serviceTitle1';

    $themeCustomizerObject->add_section(
        $customSectionName,
        [
            'title' => __("Homepage texts"),
            'priority' => 1
        ]
    );

    $themeCustomizerObject->add_setting(
        $customizableVariableName,
        [
            'default' => $defaultValue,
            'transport' => 'postMessage'
        ]
    );

    $themeCustomizerObject->add_control(
        new WP_Customize_Control(
            $themeCustomizerObject,
            'title-one-text-selector',
            [
                'label' => __('Service Title One'),
                'section' => $customSectionName,
                'settings' => $customizableVariableName,
            ]
        )
    );

    $themeCustomizerObject->selective_refresh->add_partial(
        $customizableVariableName,
        [
            'selector' => $customizerButtonCssSelector,
            'fallback_refresh' => false
        ]
    );
}

function register_service_text_one(WP_Customize_Manager $themeCustomizerObject)
{
    $customSectionName = 'custom-section-texts';

    $customizableVariableName = 'serviceTextOne';

    $defaultValue = 'Text';

    $customizerButtonCssSelector = '.serviceText1';

    $themeCustomizerObject->add_section(
        $customSectionName,
        [
            'title' => __("Homepage texts"),
            'priority' => 1
        ]
    );

    $themeCustomizerObject->add_setting(
        $customizableVariableName,
        [
            'default' => $defaultValue,
            'transport' => 'postMessage'
        ]
    );

    $themeCustomizerObject->add_control(
        new WP_Customize_Control(
            $themeCustomizerObject,
            'text-one-text-selector',
            [
                'label' => __('Service Text One'),
                'section' => $customSectionName,
                'settings' => $customizableVariableName,
            ]
        )
    );

    $themeCustomizerObject->selective_refresh->add_partial(
        $customizableVariableName,
        [
            'selector' => $customizerButtonCssSelector,
            'fallback_refresh' => false
        ]
    );
}

function register_service_title_two(WP_Customize_Manager $themeCustomizerObject)
{
    $customSectionName = 'custom-section-texts';

    $customizableVariableName = 'serviceTitleTwo';

    $defaultValue = 'Title';

    $customizerButtonCssSelector = '.serviceTitle2';

    $themeCustomizerObject->add_section(
        $customSectionName,
        [
            'title' => __("Homepage texts"),
            'priority' => 1
        ]
    );

    $themeCustomizerObject->add_setting(
        $customizableVariableName,
        [
            'default' => $defaultValue,
            'transport' => 'postMessage'
        ]
    );

    $themeCustomizerObject->add_control(
        new WP_Customize_Control(
            $themeCustomizerObject,
            'title-two-text-selector',
            [
                'label' => __('Service Title Two'),
                'section' => $customSectionName,
                'settings' => $customizableVariableName,
            ]
        )
    );

    $themeCustomizerObject->selective_refresh->add_partial(
        $customizableVariableName,
        [
            'selector' => $customizerButtonCssSelector,
            'fallback_refresh' => false
        ]
    );
}

function register_service_text_two(WP_Customize_Manager $themeCustomizerObject)
{
    $customSectionName = 'custom-section-texts';

    $customizableVariableName = 'serviceTextTwo';

    $defaultValue = 'Text';

    $customizerButtonCssSelector = '.serviceText2';

    $themeCustomizerObject->add_section(
        $customSectionName,
        [
            'title' => __("Homepage texts"),
            'priority' => 1
        ]
    );

    $themeCustomizerObject->add_setting(
        $customizableVariableName,
        [
            'default' => $defaultValue,
            'transport' => 'postMessage'
        ]
    );

    $themeCustomizerObject->add_control(
        new WP_Customize_Control(
            $themeCustomizerObject,
            'text-two-text-selector',
            [
                'label' => __('Service Text Two'),
                'section' => $customSectionName,
                'settings' => $customizableVariableName,
            ]
        )
    );

    $themeCustomizerObject->selective_refresh->add_partial(
        $customizableVariableName,
        [
            'selector' => $customizerButtonCssSelector,
            'fallback_refresh' => false
        ]
    );
}

function register_service_title_three(WP_Customize_Manager $themeCustomizerObject)
{
    $customSectionName = 'custom-section-texts';

    $customizableVariableName = 'serviceTitleThree';

    $defaultValue = 'Title';

    $customizerButtonCssSelector = '.serviceTitle3';

    $themeCustomizerObject->add_section(
        $customSectionName,
        [
            'title' => __("Homepage texts"),
            'priority' => 1
        ]
    );

    $themeCustomizerObject->add_setting(
        $customizableVariableName,
        [
            'default' => $defaultValue,
            'transport' => 'postMessage'
        ]
    );

    $themeCustomizerObject->add_control(
        new WP_Customize_Control(
            $themeCustomizerObject,
            'title-three-text-selector',
            [
                'label' => __('Service Title Three'),
                'section' => $customSectionName,
                'settings' => $customizableVariableName,
            ]
        )
    );

    $themeCustomizerObject->selective_refresh->add_partial(
        $customizableVariableName,
        [
            'selector' => $customizerButtonCssSelector,
            'fallback_refresh' => false
        ]
    );
}

function register_service_text_three(WP_Customize_Manager $themeCustomizerObject)
{
    $customSectionName = 'custom-section-texts';

    $customizableVariableName = 'serviceTextThree';

    $defaultValue = 'Text';

    $customizerButtonCssSelector = '.serviceText3';

    $themeCustomizerObject->add_section(
        $customSectionName,
        [
            'title' => __("Homepage texts"),
            'priority' => 1
        ]
    );

    $themeCustomizerObject->add_setting(
        $customizableVariableName,
        [
            'default' => $defaultValue,
            'transport' => 'postMessage'
        ]
    );

    $themeCustomizerObject->add_control(
        new WP_Customize_Control(
            $themeCustomizerObject,
            'title-one-text-selector',
            [
                'label' => __('Service Text Three'),
                'section' => $customSectionName,
                'settings' => $customizableVariableName,
            ]
        )
    );

    $themeCustomizerObject->selective_refresh->add_partial(
        $customizableVariableName,
        [
            'selector' => $customizerButtonCssSelector,
            'fallback_refresh' => false
        ]
    );
}

add_action(
    'customize_preview_init',
    'wp_mysite_load_services_customizer_assets'
);

function wp_mysite_load_services_customizer_assets()
{
    wp_enqueue_style(
        'customizer-style',
        get_theme_file_uri('assets/customizers/style.css'),
    );

    wp_enqueue_script(
        'services-customizer-js',
        get_theme_file_uri('assets/customizers/services.js'),
        [],
        false,
        true
    );
}