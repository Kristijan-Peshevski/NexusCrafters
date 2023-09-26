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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'NexusCrafters' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'v,L$#M~r+-YQ;ZD 4DSVl!i/ .e_5)kzo7$5X`/yQE~v|oUR&Nb]`dL(Z->z5+`)' );
define( 'SECURE_AUTH_KEY',  'wN%/IGWWsCOU3~8%u+5rP`>S=h1g739pEZYG($mJ5btuaRow.tH+}ez11Gj0B$a{' );
define( 'LOGGED_IN_KEY',    'soW4S&RKfC%dh_f#YJ{$v;$w:H8H.Dm!T 0$}V]kyMobl1twZ?Ok%0j|e;ME4p2g' );
define( 'NONCE_KEY',        'TzQ+cB&DhcYe:G`9YnwpW]4uHgG:F]bTUauf9_(E_.zKr!aN+FbU=8i`_j.#43i,' );
define( 'AUTH_SALT',        '1D[DE[fgxbLAhe_S#vtjQdT,;d)Z).C1T9eZ6ar9&|NiU,34cCy}XHfmP<)dOh,&' );
define( 'SECURE_AUTH_SALT', '>$cpz5KG+nQ(Ggq-ej- x&NUsl!6N*7`%X5^a>Rf=vf|d(W6fi</@Tq-Tc/GT0B*' );
define( 'LOGGED_IN_SALT',   't~NCOAL^g1kl)BSvo!9=p >-8fE9HuOLjDVcWrPN^hHxr1jO.x:#C+FuSki6DF{s' );
define( 'NONCE_SALT',       '*j6]) a6~-i3HGtmXY)&saAnRUE,Y3Tk]+jw=%4<(W=9.fhy,}QV0P*Xx&btgk0)' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'NexusCrafters';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
