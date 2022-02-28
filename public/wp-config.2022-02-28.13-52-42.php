<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// JWT AUTH CONFIGURATION
define("JWT_AUTH_SECRET_KEY", "d61fa3ced083db08b0ef32aaa850bdeda66fcc7913b0fe50726f328b4823e9254ecf1648");
define("JWT_AUTH_CORS_ENABLE", true);

// =================================
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-mysite' );

/** Database username */
define( 'DB_USER', 'Brewalan' );

/** Database password */
define( 'DB_PASSWORD', '7412Sk' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$2y$10$EjHOXb.V5T6BnIFlgexdXeRzDGsy9BJKHz5Jv8g2ooe58u5ZMSYRW' );
define( 'SECURE_AUTH_KEY',  '$2y$10$34xpI2zpAsUOeeGbOiT/rOsoo9OWsfEWgRVhqWfQRM0xciVpItmFe' );
define( 'LOGGED_IN_KEY',    '$2y$10$E8LqIX9U/iXFEv.UWx0Kbenn7pYgpU2U5in3RPJTJzG6bH7kiUEpm' );
define( 'NONCE_KEY',        '$2y$10$ohVjtwsKCdL4/cnTDXiMh.pwrvU2Ma7VSKPIOxv6L7nXd2Q8TH5lO' );
define( 'AUTH_SALT',        '$2y$10$XYZUxMGtAs.qhFU1Mo.jSOf83l8c06mv8BHFiWlEWx2GSwi8fnRRm' );
define( 'SECURE_AUTH_SALT', '$2y$10$xr8fXM8jaodGmBCoAC04rO8yvI2VEEHrXWShaoUeWXeeklpmHqD12' );
define( 'LOGGED_IN_SALT',   '$2y$10$7D8rs27nIZ8EwxEvHFCkFOmA3R09GJFX4PJBd2AAfNAredyC83UEm' );
define( 'NONCE_SALT',       '$2y$10$8w258cHw0ZXk60GpA/MGguSCZZs2cbBV9N3jIMGl1GKAToualYx3K' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wdl_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */





define('WP_HOME', rtrim ( 'http://localhost/Perso/wp-mysite/public', '/' ));
define('WP_SITEURL', WP_HOME . '/wp');
define('WP_CONTENT_URL', WP_HOME . '/content');
define('WP_CONTENT_DIR', __DIR__ . '/content');
define('FS_METHOD','direct');
/* That\'s all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
