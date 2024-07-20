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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jumpseat' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

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
define('AUTH_KEY',         '~_2FlbT,r0FPa~0/fq;^n;zf5OqDK$4vj+P@tGL]0gAlP/{b}&l`>#)&Pt0/&pYW');
define('SECURE_AUTH_KEY',  'cJ]IqV3,#<-!{?({5u|b6F|I|7LOi~M$olX2E7CNE+F)jl+@n?OBF3Chf1J-J5I{');
define('LOGGED_IN_KEY',    'jm IY-KLN+r|c$W<M$XBUu-iqc;JM+:Qbw/=I7ly!GQ6{~u(-mN?w?uYG+df{&:Q');
define('NONCE_KEY',        'WNL38gK=+@2]gtX+/W`k4-g;F]]~qW_&tSEKcK/_4d5%9]Eu|nYp_m/J8*Ev-Q-X');
define('AUTH_SALT',        'a,#glo_IpX,`#J7:QmAxisd#BXZO5-fnDV}k(O5rNXXsd`Y;q4|rzXD(wBCW@P|P');
define('SECURE_AUTH_SALT', 'p|k(YUS*+^?M]Anv>;Q92|Fj~+vJ85Hc^T[TM;}yH1kqO)e^jwKm!X|pc<1vXw(&');
define('LOGGED_IN_SALT',   '<qs0wL!v[36UU}f-(UB1Iqpj<caqyS7R3{!6WKQGDCIm&ufw3O$J{,(zzM5>*gs_');
define('NONCE_SALT',       'P,oS9b=A`r.VZ!HdKztx%NH|B:W{QkwLpg)bcJ^Y`9>OW<D/-B-q{cZF+?,CSiy;');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'js';

/** Absolute path to the WordPress directory. */
/** Absolute path to the WordPress directory. */


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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);


if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */
