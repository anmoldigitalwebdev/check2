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
define( 'DB_NAME', 'check2' );

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
define( 'AUTH_KEY',         'WTa>Y1*XJ:F,v_dX)tz,~7Js,Y:8B)22v3yf#Qs[Z;]-ZuMr-`Y,3*7Qofu]G5kX' );
define( 'SECURE_AUTH_KEY',  '_X>C=8U[fUxzR%$FF5msMyL)hm _F/,MUAf11X~d`V<vmRWfXNeU]L-^Wp N1q/ ' );
define( 'LOGGED_IN_KEY',    'aj?fRq][D]*Lz:9k3biAD.i$%fAhz5Fbny-i)}s<R@t.NmRG}/W)W;W=ILj1~n~!' );
define( 'NONCE_KEY',        '</{9i.&oXUD6-e?R1Wmp5 |uTs[*YEn$$8;Z8V  f>hJM,M_<W%.u-AI]lDid7JW' );
define( 'AUTH_SALT',        'jH:sHWkG#fM?7_v2G/K]W;=K1)3n_}]-P(,3aY#uK2-6pQMOKNHh h5*{@km[bb[' );
define( 'SECURE_AUTH_SALT', 'k?!Yw`]E|UXn_DYD@aq6|*Y>n%=4!~MIY+*UEGfQ*dE-XsQYp]x2D:P#84HY1,Mr' );
define( 'LOGGED_IN_SALT',   '1w-$M0_]3!uW+RGdWeX@{F>rP+YCs(do6u}dRYv`B}^S4Fp95MMX~G,~u7IdzB(R' );
define( 'NONCE_SALT',       'N_2KnuG`jL=<-;c:owHeOxtP]W6^FBzY$muxSYzx<BYbE7|0TiO`NK$M1jE>F7Ml' );

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
