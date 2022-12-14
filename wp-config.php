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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bitexco' );

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
define( 'AUTH_KEY',         'Q@kv~z#Sh5r0!{Z!aN#:b+DY=QJ&WD^>nKw!k-/P!;M9+0E!$zf!xt5.nOU-U4z6' );
define( 'SECURE_AUTH_KEY',  'T[.N6(&%l/tBJ3tgao2O/ph=1ymX*^&Maz05j4zczI{*ZTJ?g-1&o4&rfS@E$__a' );
define( 'LOGGED_IN_KEY',    'EL&`>1jazM(l31|(ZA O~K[T&9)xd/N~;Sb5#LmWf<}akwy3~.wmiFZe$|yoh:GF' );
define( 'NONCE_KEY',        'h>c~;N,&MrwntlWID|h8#P`?Pcf8<e`%6_;l_2j!-:q`*+fn0,-u4r#6,?otH>N$' );
define( 'AUTH_SALT',        '/,mgzh5BX/!f3T.8(nm=Yxwt) ]mr~{~ *Pn^bVosg;5x,c~v]4,fw] d! a?B6|' );
define( 'SECURE_AUTH_SALT', '6zGR}Mv:d{2%J/6QG2EI94>)iv)&|,,bh+Z~nyXHX=s5RfLCsf=i8T}C0v7{X~7w' );
define( 'LOGGED_IN_SALT',   '4ny_Rt>`mV>]MUmt;.3eLO:nBp;8)`(O&;2&-@p9dj6B#K?fPdNCP>>lpPlsiDtk' );
define( 'NONCE_SALT',       'AQJDO9)GT*p3;$u=E&`Z.`rxO8k*mRLmnf:9< /65Eg^JvG5P1%YXae^R2[b^hVd' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
