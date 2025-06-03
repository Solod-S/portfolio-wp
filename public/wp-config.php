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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',          'y92fs!y|0iQrD]>E7.NXM%d>m?I%2. TD>F,6>D_v+9NA|d6k|-M+VH@|[$+|u9u' );
define( 'SECURE_AUTH_KEY',   'W_O%~A*A@5(f~^Xf`yZ/X+9b=C]Y3QtWCsH~E<<KZ6[5GnFVz#IH[=00:GLneD53' );
define( 'LOGGED_IN_KEY',     '6!et/</4qlE3Bjqr.kC]h[0}vSJ/$.=M&<`+i|Xhr_>CG~/c1*)7mlLvL|8G6] $' );
define( 'NONCE_KEY',         'rKR!un=5[On~dAc]!N]Vna7sG+=+I(,y^19%1DTHgm[2?w&`Yd;AS1WU-q}0j8x1' );
define( 'AUTH_SALT',         'iYZsFLA7~Oq?E`s|2thf~z&TvkUgX4;xq9w%RCrc8-6#nd<.7DzdZ@c>jHM@ZZQ|' );
define( 'SECURE_AUTH_SALT',  '#hPC+IrmRHZo8=QX6i9;4cd4u}3)8~bG[ZmfEWN=ix*u@^M%N5*_CI//=ayx)*7k' );
define( 'LOGGED_IN_SALT',    '5~Q;Q..E^{ym5L$zuA(_b@UVhrF{:hU0k)n9PQ<-U-*x5PnPyzUg1+r<go*e]tgH' );
define( 'NONCE_SALT',        'aOP> &<UdE^&2*)QVPt~yYA6!WivrQwav?2>0-3u&gds=DO#$oFoL(3{fz6bJ`_^' );
define( 'WP_CACHE_KEY_SALT', 'D;S]/us=}x 7#dqws,>,0.qO[FjRLwq-p#*Lf;U=-rk[4#E7])HV`D_cw};8+^6J' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
