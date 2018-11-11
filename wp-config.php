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
define('DB_NAME', 'bonoco2');

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
define('AUTH_KEY',         'JMnNy#n+6fExUD[}~kJ.UCtt:-6dz>oWi;oPJXu/ U=UL2;50.3@}}@3.KQ(o590');
define('SECURE_AUTH_KEY',  'AoEpeP;CZSe$<e~FDh]txC17lD%[SdpzcZFra`%_6G?>hZg{r#8sb@K,#HM:.&ej');
define('LOGGED_IN_KEY',    'wchtSs~(GA.rsrj!A:i^kr}NK5Mzr{:p`Vu&]z]k7`y!=AILI#6fQpVUOF&rh_s{');
define('NONCE_KEY',        'FBB/R;IT8$X2^xN[~E{=KY|4Z//`*G}Psx!;wI FQ.I$*tE$M9#:x[^DQXJM5nE=');
define('AUTH_SALT',        ':P?Od`^L;[tIxk]*0b!Mc)z*`uR4](x-4H^D:q]X;A4ep-{I3f[i!E9rkAnFuo3c');
define('SECURE_AUTH_SALT', 'mJWKoW)4&des9A7kKQp%0/XT>_&+L$.[2fq**jx{lDg}LD{7D<J7,xv;:IB#  $>');
define('LOGGED_IN_SALT',   '>+S)H3H$9b!{w4&vPbI:;SCs%xr X@w)$PZ8bLC>*V+M1qkdfqA@r3TVam}U%*9|');
define('NONCE_SALT',       'S[MPRiQN55QeI/fz Fp}ldS;RSF}WI=cmF-%|oE[^m_h(ddRE S~Nq,m|JxGF}04');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bnKP_';

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
