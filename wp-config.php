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
define( 'DB_NAME', 'kitmdb' );

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
define( 'AUTH_KEY',         'l(7Fb3)k`&]%13;vw8Z$n+ ke4^1z|&54878Ukr+_!6K6hi6N=pZXu[*oS-<#<J%' );
define( 'SECURE_AUTH_KEY',  ':nx*TM6@(Vh?pT)gze*)Qz],e5~4woo<^p^0C9 0WVk.v17A7-jwInl5JAEkZ/E9' );
define( 'LOGGED_IN_KEY',    '$>q?1U!B*#=ooECNR_t~T ?mcl+D!]c_vRtgck7YYz8uB%I~ihZ-t}%oO|[x.0NA' );
define( 'NONCE_KEY',        '`G@2f(qXSAB_`8o9VAY7lL$J;dvQ#5%f!OT)#L=M_3A3[,N(nCs$/Xh0Lf4_qaP}' );
define( 'AUTH_SALT',        '1pS ,,W,cS/B~*p%&Gl~Gf&-un?i:BWp(w~mo];!GyT9Xt)?s.T-m:nYmX?!,T%a' );
define( 'SECURE_AUTH_SALT', 'rsfT9#}7x;].80}SuW^jj,-=$cSc=v1ur3/6 y}f<s5k1~wn 9U-{/~jO@Aqu8_9' );
define( 'LOGGED_IN_SALT',   ']NL8)j]y{6/GhwH23=0 $,DHVslr4P=gg>DWQ5P+Bta[ti?!+Q3a cH9N@8b&e.U' );
define( 'NONCE_SALT',       '4U`2:DOI&0}vdr101rYDm,ig|=@B:naQ9K+voRb?1n+<Jn:mQ*%V2Q(cb1d%9tK6' );

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
