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
define( 'DB_NAME', 'M-tron_energy' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '$bn7sY+4iyd4ReX?iZRLrAD$|u>Y1v@Kq*y2*Z/h}$ihF$#e~wYv9G^1A[1UP1tQ' );
define( 'SECURE_AUTH_KEY',  'rqV34/Rc:8D&g8d6aiAP }!e,Qt/B?VOa5No;=3l?y!hCV+N5L&t-#p6+9f=w)Gq' );
define( 'LOGGED_IN_KEY',    ':Df0i@k88`y]5t)rOme.)6GzNDxeS8k,nmC?>H*L}C-1IH[UZ]xp ,P[,~l|,43O' );
define( 'NONCE_KEY',        'L$J`&VDsF.F_*_p@7z+kq-Z%=_#(-Pv:bY20LQMd~x6p%OZ/ew4Ukw$QU=h|8Bn(' );
define( 'AUTH_SALT',        '`Y@vqlH0Ny797)/j/`$<n}O&0Ya/+R]l6gYUbIJ*LSRqSuu{Ru1C,pW%[ -._n5N' );
define( 'SECURE_AUTH_SALT', 'eBq,4b~@VP[}_IkRyS$#^iR1tf/ Q3y07rSJj8vM3v><&|;&9zi<u)&Of,3j?w)]' );
define( 'LOGGED_IN_SALT',   'f}H_{F$~oa>FGv}tfED^q(3Cf?l7q/ X!i,bb%(}C&3m){7YiPU[+;r46%jKWSB5' );
define( 'NONCE_SALT',       'OV$.ljEO,rx8C:s}b.Sn_NyQGo< I4*[/<osAFO2G{ARfrQP%lHTuc=tYwk+Be/3' );

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
