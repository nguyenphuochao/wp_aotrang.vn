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
define( 'DB_NAME', 'aotrang_vn_old' );

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
define( 'AUTH_KEY',         '#3I04>XKqu4V#wC1{QePJm9pjIjL;VdH|3r~s(*!NguKmTZZ}hd7)(/JbJ?,B}h.' );
define( 'SECURE_AUTH_KEY',  ';xFM0};B$d7Jvf1.BXlZqmO;tW1QP?K]Lx8P+}>5cMltm^n>Ss8f`#K4L,IcB(cC' );
define( 'LOGGED_IN_KEY',    's`sb-D-VM~f3j.f]%4bDxJFSajt62Po&^zkfU#R9z<pc`,=,aMn`@:*KXS]kMM0X' );
define( 'NONCE_KEY',        'e)r]4Uj2 _aD`O8<Xcut+QsI9GqX6<Ur`X[-U?V>9g4aCb{cN:/wYXmWVXe*<{jX' );
define( 'AUTH_SALT',        'sV.g;MeAh42~t>0ECLH.Qq#xcV.lL9mua]83#d9N?ZN,h9mTZhb]x`k,nLyaP*SJ' );
define( 'SECURE_AUTH_SALT', 'B<){o h{/SPL<}F5u|sfduE[W8#bS;~kg+ELo?I )0Nl]1Soa%}{kf`Rb:Pt t,,' );
define( 'LOGGED_IN_SALT',   'f0<1O.f)!+BV?KC`O|SN`gN98-h2:w0WiR`Hp<T5woCIftX$,]T:F`u*9V<(Ny#e' );
define( 'NONCE_SALT',       'zV)h2O9/PuhwWu~PS7$*86?C/`+ |+1J58/vD(T&q^}tvZ9JKEz)?uJN -L(X$Bt' );

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
