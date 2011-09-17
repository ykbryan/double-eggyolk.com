<?php
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
define('DB_NAME', 'tengdb');

/** MySQL database username */
define('DB_USER', 'tengdb');

/** MySQL database password */
define('DB_PASSWORD', 'Bryan1986');

/** MySQL hostname */
define('DB_HOST', '182.50.131.219');

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
define('AUTH_KEY',         '-OpO1*X|XwX+8+30C7`?R.K/gDDF?XBM_FjI-uwTnD97a}fcBEm7dPzCIq|^2Zw6');
define('SECURE_AUTH_KEY',  ' &-jLI#^AWACRf^EVV~qcD){r5aq0t$b;vL Q}`0nojphz^$DxjJV)uP*6yZ)0XR');
define('LOGGED_IN_KEY',    'EBmstJ|x*z/]oIQ|<_t1X6F4t7i8-@t!3aT:rvLovHyNNYY~HA~D[>lfkX|1Y.RZ');
define('NONCE_KEY',        '[mrtY.*C-&U8!RM#BXvT%f^s]&_/ktS#Q-3c1S>-P0Wg,qjsO1pH(p{w+SJ5/jy/');
define('AUTH_SALT',        'A`$-j8AS F OiK+J91G(7fZh|7gSOXqx-Dk+_ni`@aP@:9IgnW B|0=w)UPn-R4T');
define('SECURE_AUTH_SALT', 'B-BT>~Y#oA?6ivch}n]q-jCi#7nA[s](9.>}),bJ4D04-84T-+}/9rCMOiz;za=:');
define('LOGGED_IN_SALT',   'FnV_>{z-RjL$(,61WL4{{ECB@{RY`X.A0/>q|unzTf6tei;!hS2;)aCj%En;Q(3z');
define('NONCE_SALT',       '@pe.BY%CS~y,UT!>pX^+HRp*e.oN}=1Uuk%L,q$QU!w.EmL^iaL5|6DaR&VXJ4,E');

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
