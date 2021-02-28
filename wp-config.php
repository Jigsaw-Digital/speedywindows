<?php

$domainArray = explode('.', $_SERVER['HTTP_HOST']);
if(in_array('local', $domainArray)) {
	define( 'DB_NAME', 'wp_speedywindows' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', '127.0.0.1' );
}elseif(in_array('test', $domainArray)) {
	define( 'DB_NAME', 'wp_speedywindows' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', '127.0.0.1' );
}elseif(in_array('app', $domainArray)) {
	define( 'DB_NAME', '' );
	define( 'DB_USER', '' );
	define( 'DB_PASSWORD', '3?Nrlb59' );
	define( 'DB_HOST', '127.0.0.1' );
}

define('DB_CHARSET', 'utf8');
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
define( 'AUTH_KEY',          'He<nj;&J!tZKn.B4v0w9Lz[K5 ,JLw}?fr6m|G$Wv^.v[t`8~PFh)FoZ?iZeDPm?' );
define( 'SECURE_AUTH_KEY',   'dS [ ujVd{4+k::@H#G*U.{?ev~s|~](<_tdTFm@oS%fXk?#+j#[cWQ3/(aO)nZ6' );
define( 'LOGGED_IN_KEY',     'c>%*SipY{<Cv6uLYpwYb%rcg6gc?-{HFM57)1vPD<VyRg%b7)2}J&lWP9ThZS7l#' );
define( 'NONCE_KEY',         'oo_AJ}!__lbn*%{eUfK.a9je +:M-}gnvr]RI6~A&Ew:eiGG?Ijg/z|.C~uju%yj' );
define( 'AUTH_SALT',         'sMsrhm#z.qFK3Yx`)B~rEO9_yG4u! h{Bn-ZP kzs=e1lLq=:-dcx}n593so?^pR' );
define( 'SECURE_AUTH_SALT',  'krnW*wXV*0!j&hwS&+)S%$hq0*Mw+PhfDqC|OLg;D2^HhDoV{qvpW},0s}x[h&M ' );
define( 'LOGGED_IN_SALT',    '#aJ{4#/[OY5A1Ix`2 /.+ldvEF0t k;tr/NZ[.SMMi$p06tC?f9HOY;<G`;w7TG2' );
define( 'NONCE_SALT',        'RlT}b.P`FTLA^+w!<J-kS0{>QaOkrc@HYJ MH9!+fu{6yOrHR_IN~npa_OK%U7nI' );
define( 'WP_CACHE_KEY_SALT', 'DRnXeO4j!<mv([A-SnY1P&}1HWeNRW;kp-/{d*<Uv4OW@6?37&s[qfqN=O^Lo:oQ' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );