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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'recipshare' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         '!=vm]v-.)Z!;fcq/N53Y{z >M+&OIgC69[|,$+f6h(W 1hP)h!EE:)vH8$Q_Ip$@' );
define( 'SECURE_AUTH_KEY',  'hCp&Wftu5q^ ? :]!MQV7LbY7#+-8eDDC#u=Jj sU!~Y^U%Uq_oa)x%,}GOt:g.h' );
define( 'LOGGED_IN_KEY',    '@:R>+J7ziCY.`b .nuaqgdOZH~eDMV1EC1|b8.zZmBRm20)$`:n6Z2x{.b<._w?V' );
define( 'NONCE_KEY',        'N,j*Jxb_[PTUg$(hI_pfz&BaE|6|gM5Z10V4`I0Bs>_?0CG/}0<bc^Yq~34k=G4m' );
define( 'AUTH_SALT',        '@vkkj{!ffJdCea%2_y>yB@^1Pz[[xwI68^S}Z7zH||+EG`Bv5kQb^PpiW)WqAnp~' );
define( 'SECURE_AUTH_SALT', 'Nj11LScQ*o76Y^`E7(Fq;mu#6lc!lYeq4S5-&hi|Lh+2)BkUV+ce2eg~G_*A]Q.z' );
define( 'LOGGED_IN_SALT',   '!Lek27*UF,fvY=U!l&J8@02mzp,#OeLS48Du>*M(th4UvaL`4(</.Ocp.YB$w:^!' );
define( 'NONCE_SALT',       'qXip|sdNCbc}fu(ZaIlMx3}5GpzraecIV(|8TKZ[]?b}b pLt[A6bU?T,AlK#66i' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
