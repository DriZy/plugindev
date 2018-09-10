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
define('DB_NAME', 'unittest');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Y,lnaP 1tUN6S{5/@ao_H1tE$4xNx6pOD(+H{8$qB|eoR<Fdyg:wn4O7(c(;9*Nt');
define('SECURE_AUTH_KEY',  'wBW(g+d@*pn$4tIiFoCnt%S)zFLtF)cWY<<kpYBX1Vt>4_fhQn%`<Vy/,=M5L*!2');
define('LOGGED_IN_KEY',    'A,D^S|#~t(tU&`d&8<5i|,ZTo,r9[vdC:Scha> |Ww0hCR46v ->C@-zg_mEtt1N');
define('NONCE_KEY',        'vtL`q%laT~*Z@bTYqculoe>&ms$A=6mwH|(PS$ al@.C;6xNIa1AAk7yg2=&UDx7');
define('AUTH_SALT',        'NzC76:/ITn,[:7=zVg`/9X+|%by=$mWVyBC BLUpLZi$Ri&[~3[t3_NcJ~?1#FSR');
define('SECURE_AUTH_SALT', '9EIly9M@PjQwJ,@R&OHHo|*]uGz?3.1*DdF4I|HEqOMKo&wN%{Ci7mL6c!XMO,T=');
define('LOGGED_IN_SALT',   'fL2]^1d  ;Eemj:!z%U4++PL>ZKZGO`]`p-).&ePKby+v6m3jaD~Ja;XR# _KC *');
define('NONCE_SALT',       'h31b_J[a>)neDwo^+hAN0R]0E$huc^xEzV($W:5xk @N]oZT}mE@}3gy1J(4=-u ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
