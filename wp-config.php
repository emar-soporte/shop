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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'emarcom_nueva' );

/** MySQL database username */
define( 'DB_USER', 'emarcom_adm_nueva' );

/** MySQL database password */
define( 'DB_PASSWORD', 'B,cnd!NM7&@6' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'pt38f1fj4l4bkiwnntrsqpd2wizzj17n3qk6bqx9fuw55mgx39pmm6tosn8erxap' );
define( 'SECURE_AUTH_KEY',  'yy73xqhkhb2qnrj51iknsun21nz3xefnmcygrqd6wzhclvoataowuqfpwp1hhkui' );
define( 'LOGGED_IN_KEY',    'ogpeeuvmcdqd1xx8vq16nanszoawkexeqtv8hzdugmj1o45kzpkncvlvkwrb6b7c' );
define( 'NONCE_KEY',        'dfatkqkgwz4dzgzt4ehpyoj0p8ofjwmcvcodverrdk1yn0jlcvcqel2cnvw4rkcz' );
define( 'AUTH_SALT',        'hpe42wfadbkvwrtydrwenwlb9ao4gu9m6bu67xfhg9sgspro9tma9b5ouoqkbea3' );
define( 'SECURE_AUTH_SALT', 'vpfcsry4x1rq6xuayicashqbgmxvbjz99gqprbj0vzckjog3fdg3tbmpv0hsbsin' );
define( 'LOGGED_IN_SALT',   'l3vclriesflxwzbhse13zuvyhbd79ll5vddkbozb9bzz0otpd7nzttunkkllwjgi' );
define( 'NONCE_SALT',       'dbtqtzdo2wtqhldvbphknoy8bevfjs8ktmsjdoljppw9h1fphv53itrbzkrgnrpc' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wppf_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';