<?php
//Begin Really Simple Security Server variable fix
   $_SERVER["HTTPS"] = "on";
//END Really Simple Security

//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'FBQr3W19I8351CoVnPNBHPzB0P3SByCBoXzn8fB5tDJtYRvMZoTbpWcbPHR8ciYi');
//END Really Simple Security key

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
define( 'DB_NAME', 'vlad1995ma' );

/** Database username */
define( 'DB_USER', 'vlad1995ma' );

/** Database password */
define( 'DB_PASSWORD', 'nFW7H_H9ZVNPCWRP' );

/** Database hostname */
define( 'DB_HOST', 'localhost:/var/run/mysql8-container/mysqld.sock' );

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
define( 'AUTH_KEY',         'g7AI4Qc{B]VS@i:vD2[/UNl&t&L5t#Z.~Y|HBGybOY60J8Gou7i&Yh(Jz^1sk)@C' );
define( 'SECURE_AUTH_KEY',  '8fYDp1qHZX^*VR{#q Y<&$!=d5sQ9R*^-IOlz,YgqSU}kI0~^bs~<>&nNRlLOzUj' );
define( 'LOGGED_IN_KEY',    '=x?lv-Udg`.q!C:{%4oh>]q2<IhTx<ZIn:0wkIl]px!dO9[Ar@^0379e~HzVH6j-' );
define( 'NONCE_KEY',        '{-#w{`Zx&&Ajud%TGq/Kg`k)aq]f2j8/8]+[UIKN)4{|r]=z5CQ^2o*hgSi:N{hL' );
define( 'AUTH_SALT',        'NT-SN_0a,JyKbo>k>tSV-&0kWt!%xqKrzMTD8YP4* h-4Z1Ll@m:XrMRNExeESSk' );
define( 'SECURE_AUTH_SALT', 'E}22@NGh.6uJB6_/2yjeTayUsc5js1jKw-4F1UD&l.t4:jA~1X1;wwOMnoH#$mm#' );
define( 'LOGGED_IN_SALT',   'C3)Wlt%z6vH{[2VP0z7)f4Aor+Irk#PF{aMl*MQ80pw_u$)<RebH>$Klzi(LStLf' );
define( 'NONCE_SALT',       ')S_aaI<_^ly2^2-j*qfn,FjI6yg-@TT+i0,YL?85tgLOzG.EkS-2]*n]>*BTJ/*C' );

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