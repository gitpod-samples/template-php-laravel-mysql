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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'example_app' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '@Csas1234' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'yUyR8QGvc-xy;S&;?]/5UeZh`HmllbdI|yvT8|>yHc|44vpjeR{RUEsP.aW/m.@g' );
define( 'SECURE_AUTH_KEY',  ' <;#K;``W%}k}&;|<1]A`rjL3irxcG;bxUD:({|Zh08AO00]lu@E/b};c}TaY]M`' );
define( 'LOGGED_IN_KEY',    '/^xxNQ<2GCpbeSR3@-j)`9l^!i)W0civJSrWtB}tBbq/RL-EJ)ZiPFrpU/19W9h:' );
define( 'NONCE_KEY',        'b/KC6^rJ_ypdP&V%eJvB63s2&*dGOffoL,dhg ~i60Z%O3Q RlU1 #!6s=svhKlQ' );
define( 'AUTH_SALT',        'eXHYeHRH:YptaCPM>b5h^?J[iXR8yr6WzYvoQ&yHP.,C]$8W:NO*}Xx `T(YAq>%' );
define( 'SECURE_AUTH_SALT', 'fy !a!S9E3C>YUS^)d%NV|~9a<iKV),{48HbVrKt9i%=DhL2kSyPRMj<t_)K6@`M' );
define( 'LOGGED_IN_SALT',   '[(0?-(+A?ffrRfyLg,*yxaf>B&e}mJX8:$~DZ9I <H:F*U*E;l20`,dB0V2o&#Tk' );
define( 'NONCE_SALT',       '24+K&KP*d<W@j8gEYgVAsKxY?>Uc8KQly$IdXabHWrCjIu~gyl:lD>l,8k nMnd{' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
define('FORCE_SSL_ADMIN', true);
define('FORCE_SSL_LOGIN', true);
$_SERVER['HTTPS']='on';
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
