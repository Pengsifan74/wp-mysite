<?php

// Debug:
// echo __FILE__ . ':' . __LINE__;
// exit();

require __DIR__ . '/customizers/header-picture.php';
require __DIR__ . '/customizers/myObjective.php';

if (!defined('THEME_SBPKWPDEV_VERSION')) {
    define('THEME_SBPKWPDEV_VERSION', '1.0.0');
}

// Configure theme :
add_action(
    'after_setup_theme',
    'sbpkwpdev_initializeTheme'
);


if (!function_exists('sbpkwpdev_initializeTheme')) {
    function sbpkwpdev_initializeTheme()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
       
    }
}

if (!function_exists('sbpkwpdev_loadAssets')) {
    function sbpkwpdev_loadAssets()
    {
        // Styles
        wp_enqueue_style(
            'theme-styles',
            get_theme_file_uri('assets/css/styles.css')
        );

        wp_enqueue_style(
            'bootstrap-css-styles',
            get_theme_file_uri('assets/css/bootstrap.css')
        );

        wp_enqueue_style(
            'font-awesome-styles',
            get_theme_file_uri('assets/css/fontawesome-all.css')
        );

        wp_enqueue_style(
            'wp-mysite-styles',
            get_theme_file_uri('assets/css/wp_mysite.css')
        );

        wp_enqueue_style(
            'preconnection-google-font',
            'https://fonts.gstatic.com'
        );

        wp_enqueue_style(
            'google-font',
            'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap'
        );

        // Scripts
        wp_enqueue_script(
            'jquery-scripts',
            get_theme_file_uri('assets/js/jquery.min..js'),
            [],
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'bootstrap-js-scripts',
            get_theme_file_uri('assets/js/bootstrap.min.js'),
            [],
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'jquery-easing-scripts',
            get_theme_file_uri('assets/js/jquery.easing.min..js'),
            [],
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'theme-scripts',
            get_theme_file_uri('assets/js/scripts.js'),
            [],
            '1.0.0',
            true
        );
    }
}

add_action(
    'wp_enqueue_scripts',
    'sbpkwpdev_loadAssets'
);