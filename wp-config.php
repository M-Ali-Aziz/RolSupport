<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rol_support_db2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

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
define('AUTH_KEY',         'GYpreVoB,omw/MnlQiL ogCwN)<xKZkB9<}4~mDJomi{]N9a1c#1Iw:,$$^G0+zT');
define('SECURE_AUTH_KEY',  '+ErNC)T>$m1&^O@U-Zg) aX<yxNokb@9Rb6,%&6/4V:q87cC37Y|1nY^-bk1b@hO');
define('LOGGED_IN_KEY',    'xOTV`*4;LrS+)t;tnoLS2==lt7(ADRmDN!4%o6@|QrBmETpz}WOfYfhFRz8}^6xY');
define('NONCE_KEY',        '4%e{_zf0rT|!JXwYZ|WqtirEVRGjzl5~e`VG5c,L,FsmWq%c~F*9Oy=F@)t@4)<0');
define('AUTH_SALT',        '3B5| >Jt`OpM.iwU35:q3-e2B.,[j*:!hy$U&-n|FUdj8CP9:S$_eo-,pe97n!Z`');
define('SECURE_AUTH_SALT', '7y~nx} GqqWrYr>j3P%IoUAo9BKcTXe87z;:<Xj6U/`lH4=W?6oa;6J{v)T?L]`y');
define('LOGGED_IN_SALT',   'm4>q7 -Yz(2&6|42$2;r50APq;5KADM#Uk)cRt)aP*U@I.7+O*}||1<uaYLOmK;H');
define('NONCE_SALT',       '.N*xprQ6?si6$<!&doo57M=iC{Z|-5TofOLi=|#k2aFXP<]_PaO<(bj^vD~L[td~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
