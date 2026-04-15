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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );
/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATEvrf', '' );

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
define( 'AUTH_KEY',          '4DnmH,?f>&[qJ@H&mL]wNij.unr$#MZ[lWR{+#~By9vvj:VLA7sZH[#z_fGH?q22' );
define( 'SECURE_AUTH_KEY',   's:/Va_-p^Up2+2(vHveYREE/_79U$]/S.Ik~T!YJa&!pcC BEuIjKOj&!Kw^%.qq' );
define( 'LOGGED_IN_KEY',     'c*(<A,dAuv5h#o6fT`{APBm+=`[kFji-+B.NEop9?J-BF[`yZMsDi+!vC%N;U+)s' );
define( 'NONCE_KEY',         '9osLx53wb00Wc2{F5YxQYLaDzHe,i5hr|.pm?aWI[4#dl(t$0pQWhlN;XvPXr{Hs' );
define( 'AUTH_SALT',         '7V,JbB~MoDCq@dpS~>a4rlVctcJ4fAm6|}qwq@IkL (lZoF-VB)QCFXQZK Q8,r9' );
define( 'SECURE_AUTH_SALT',  'e.PBIvXq{@<]{fNZ8DR%&&SsHSXp103rj}Y%7xzD3}kAP!3i )ce3$.bJ6Crs*IE' );
define( 'LOGGED_IN_SALT',    'Ih:t&aq&<v3b=LmF2tz=>bhutXD}M6/@h/UpTOu2w47uZNi6/=)XX$:ZPzLJ_GtM' );
define( 'NONCE_SALT',        'uh)DD:7c&x:EFk+ScVOW}L7Hm7K@Dd8V5LbkrBUPy`F[>$?j7p>NiIjUljeo{iG ' );
define( 'WP_CACHE_KEY_SALT', '_{837>;1.EHt4ScfT7g^`v}%v?1NZEv`/X:EJNVp9_j,;D HWGaZ1te{/2}Rt&k@' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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

/** Absolute path to the WordPress directory. */

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
