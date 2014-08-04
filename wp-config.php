<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '*YV)2a+(q3h>g{H1xY:(m1I^y|ok<QA/a~R<C?rEp59lMBM-fzYf|WvcI8s+z~?6');
define('SECURE_AUTH_KEY',  'QXBG-C!yziN-jRpL:o6kKcF/A@rR(JH_qm|/(CAFZA2$?LE6[N3Kd!3H6ZzjLAW/');
define('LOGGED_IN_KEY',    'h7YE R/GGkM4W9*?8~*e8uZa+!:X_`|9Z%>/(SiuviLF?A(h)Ry$fl+:-JCT0!X~');
define('NONCE_KEY',        't,f2atG}}@?G5~x07{PLuMkZ| SO5HU!PF@Fw:F|!x=!` I++Ak~W6ub~s#N6T!X');
define('AUTH_SALT',        'Sp`37&<e*Ur+@I`B }5At0?t-y 4QrPinN54rrl#(M>9n)I9ketVQ6/rAzC[o+[*');
define('SECURE_AUTH_SALT', '3+bD/eLVE3^]KWlO(2-<SZqPPfZOZwwu3.|Zy6oh`#32CX! |TE1kEQ7C|Tq;s#[');
define('LOGGED_IN_SALT',   'MR&Wq(f<88/~#vdv&TjzP*WZgD!}Pt}QEaTSp).||8U}>9^U6ed,kd~|1H7cB-2y');
define('NONCE_SALT',       'V0BLd=M;*$#ITL-!*R$=3,Ov_K,:$oDaxFD<RlLi}|6 Mi7gW6jr)pLXpyb?2w.L');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
