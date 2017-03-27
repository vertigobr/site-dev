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

define('DB_NAME', 'wordpress');



/** MySQL database username */

define('DB_USER', 'wordpress');



/** MySQL database password */

define('DB_PASSWORD', 'F7AYUbrBGx');



/** MySQL hostname */

define('DB_HOST', 'mysql');



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

define('AUTH_KEY',         'iCntFBdD;V8h<!%bQ]e4C1lSTRk*s`VVDNa<(LYzBd0$_/b{OaE;Y2MvWrpQgrOj');

define('SECURE_AUTH_KEY',  'WZ<N|c?Qm8RG%y73UW.pxF^d`y!0`=-{mB&wv.;6U)|(k!6@7NDlFWK-8$zg$^~e');

define('LOGGED_IN_KEY',    '#X+)W)Ny0piWhkrd:ogih5,hLX<&ngQ{a`iC07Rt_:&5Fz/I%[nF iY2) 7ZZ^j+');

define('NONCE_KEY',        '.ln={Iw[>?V2`/85e9{NzO|3rmbn`3SPQa6^wo0j!At36+{b%{d:C+q! bSP=udW');

define('AUTH_SALT',        ',Bjqt//?rdU:fP[UOEP*Ftzyk]fE=?F&ZV]@c/KP6F`ZG2<Oh7[g>hJC*L=S s^:');

define('SECURE_AUTH_SALT', 'wSZN$1xaS2_D`/2:` a1#,hiC hMP9*tH_ @M3.r&.jWD:u@Od(bvimuo;:_KO d');

define('LOGGED_IN_SALT',   'I3-{f6vL-QhWu&ou*e^[3}G=5}_gmSk.;u.y@c-N!QUy^P USac{_QKH(U+Gt2(y');

define('NONCE_SALT',       '<}&<GYl()M24x(SPsR%#d7_m^W#Jf4y[;AaO)Gqpn=<&AqB4zSqGU(X&/b5ZO[V5');



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

