<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpressmc' );

/** MySQL database username */
define( 'DB_USER', 'mouhcine' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+!hmo;jLD[|Nq~?m(Nm{WQm/$vbha{5q+w>s,q+$A6Wy9)]ik1ra;%0F)Mhv*T7%');
define('SECURE_AUTH_KEY',  'sP2d!m@+,4?IsG^hF@,rHVO$g/o.a4X y+b)Obo E5D_CZo|f^_l:/|HrW/g2-I<');
define('LOGGED_IN_KEY',    '&E~myoTr,QA:G--Y<t;9xh<|DsBfyWMZT_<}qO#>G$G4=D|#^3~8fF$iz8*M6!vK');
define('NONCE_KEY',        '#%lHd%.u5+:K%Pel k2G_0A+{trXX$F|B~q_b(q.T+2M3xT:ZArtRn(`{#y|yE$)');
define('AUTH_SALT',        'Qm+j6}R7(Y?tC3(+N,4lv#axbj_i1}ME[YR&I.& hB(?c{-*ZV+k`MeG!VK7h,yt');
define('SECURE_AUTH_SALT', 'nC Y8jBW-{/<]vB]hTty-Of0Ar6.C!*_F`(~08|OCQVRBZyB78lKdJ?D[/#=!E*+');
define('LOGGED_IN_SALT',   'yPVb|V+s)sdWS%n?Q!_+UAO5{aX@|VFAqO2cSW0Q]7K5$0-ynH,} ecD|:]|DdhT');
define('NONCE_SALT',       'M(L5sylqJ!ZUX-&8(EOcOxyW1WK)$%-}{B&MBV8*z{<*?,R$k{u#a_w9+,Qdz1>l');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );