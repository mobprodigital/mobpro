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
define('DB_NAME', 'wp_mobpro');

/** MySQL database username */
define('DB_USER', 'gyan');

/** MySQL database password */
define('DB_PASSWORD', 'Jobs@786');

/** MySQL hostname */
define('DB_HOST', '50.62.209.160');

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
define('AUTH_KEY',         'Q95fhe)*MP*hiEdW.Y@HdDwJn_p>~cgbYwQ{of[UOB`.P3T(^k?Y_e*o&v+J:F)s');
define('SECURE_AUTH_KEY',  'Py]/U*?5+f0*pbfRl}-tAT(U,]+Ge^.;jx$<mV$K6.n dUKa>@pU8C6GJ2t:D|f;');
define('LOGGED_IN_KEY',    'n%X@21d1HBLOPJ^+@r)N%K*ef|m#JE}Us^Q3Ac-[QlBHC]$x1^xnG_vMNOL@?3uZ');
define('NONCE_KEY',        '8 JuR~&ab:SQq=R?XH{wyP~!{8s8[iVBi!5;a0l@=zDsDNwWsq90RFmEZAsS9|p-');
define('AUTH_SALT',        'XzWzwQk5fcI>92:&PYH<_i4sDDCW0Wt~LA`E2sMHU/n{FPrfn3zBXP?7W97>QM=F');
define('SECURE_AUTH_SALT', 'iyV[|P]r?r*sM_VnRDOG>{Jf(-/D/;l_anI{HZIEARH2C1y#cd*HKS~zzdkvj_ys');
define('LOGGED_IN_SALT',   '{8x7]Bt4)vA^b4&#y>r^Kr<BN2~o`<_cPTsLB[wkCmiJ9}h]J|L~;D5_cGHQuX&d');
define('NONCE_SALT',       'D2t{AX<r$!<b<nV[2ZC6y+Q@ jLZ{qGKwu@iuQw^/=-=T{<A7ZO;u1#7C5$+>I7V');

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
