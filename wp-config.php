<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lms_db' );

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
define( 'AUTH_KEY',         'L|qclp+*yro{~.`!b*unvQ~rV#K7;+6t#C%q&P(T@Nn}3v3Iu!~:PVyZEM08p&:>' );
define( 'SECURE_AUTH_KEY',  'CA5%]5z4%R<Q=!Cx!lX9)*;@aDTGYLs[WyMW>PK ^!~+zK?MMkazBBD0k*1}HvC^' );
define( 'LOGGED_IN_KEY',    '^@oej!C=1Jq;U]Za{^L.ExMMx+L#R(H4>rKt>16ywVpH/{R-]4C1?(d?*nJC,P~#' );
define( 'NONCE_KEY',        'MrwVv*h !eQv)@/JL*d2#dE<L^H8QX6K)m]QhaCIq9$68:Z@5Bys~rku6 )p(.}m' );
define( 'AUTH_SALT',        'x1qX_wb<eng,zdZF$AN;moCe3OFa]0V??bTx-y2Ev[;h@YoTxg]LGBG1ir,CuOn2' );
define( 'SECURE_AUTH_SALT', '*hN`9V]%`.:|!roqnDJ<z$t.ZxWBsfX25=}J[^*yh@<6;gF0v^^C67=Y.6-^ u-Z' );
define( 'LOGGED_IN_SALT',   '/Ux!E5u2{HxNir{23<oFf]}_6-!HE~ D]UJ1C#!^3wuCB%f3lG7BYeU!8xS>%_Vn' );
define( 'NONCE_SALT',       '/5e9&cZN|;dXz<<&~hUL,7xNKDZUOKItqI|_U5Al?Qn5A/_n0{=m5E#T+_DN)}Jk' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_brainova';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
