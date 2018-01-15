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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'cE 0bpw9,o{Z4_FLzPZhO!;Hb3~RoDwQ7b1tZ,Z4R||5< e;jA~:irUwZ>Q^I.hZ');
define('SECURE_AUTH_KEY',  'QV<F)b{re;}1tC=]JONJtoeNC0}31zx2xT2.jhdE0A_vx3<[}o%9QV$#cr.K=8P(');
define('LOGGED_IN_KEY',    '@?8ot//L:a/9ZVq=9WI@?/Zl3;R,<}9]?dpvD:=P (4=DB8(coZ,bD{#3tK,DWsZ');
define('NONCE_KEY',        '<5(l`H?Jv9]eqe;Um//YeZv^1QqwDD5QK>d<qxaK7^-@zOo9b,e%-Y2bZu+aY}*s');
define('AUTH_SALT',        '^HhhUl59dX}{Et!]l9qD/t@f_t=fk&c-EW> u<?]Cob{Uu$tt1hg$]fMxd:Sv~=1');
define('SECURE_AUTH_SALT', 'Iyjd{w}PE[&GJ4P;_,/^ZlSg{ ?N+hH_@#t8![qIS`!AW{xL}@ k$PBz>=D_] YL');
define('LOGGED_IN_SALT',   '}_X}civXv>7|]>^  [/aa{*rGRXrbV/PTM#vfG(6!LNY79Jg~,-j)t5hfv2i&6D~');
define('NONCE_SALT',       ']!?E5e@&Z*H3 `mDhl)Qj!.?b>-JFM-nZ_P7k*#a,nq@]y|e$s{`8y%<_Y4^)U~z');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
