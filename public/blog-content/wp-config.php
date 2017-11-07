<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'jeff');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'gN9o:(5QfwToQJcD@FGH9#;b<<f}Z$f,0qP=t0Z~Lx}@zz{4r{th9/N2bB9G,}B!');
define('SECURE_AUTH_KEY', '!}9A*ZYh *C@g<G6w@2!}6YL)8R@Ea&[LO,=t3NAl8OGhUp1xIPjvZtT[#)Vn_b,');
define('LOGGED_IN_KEY', '%m$<@k[xQ.p.f4xTRNSjY-m^CZ$ZxUc^c;36=2KN;?4SuxSbOE-)|_r>]`>aCSS$');
define('NONCE_KEY', '`B$$1sc{[0`2_~2Ar-1Aok<_(1 9N&8P~KSRHQ`_%Mioef0l<E!ah5W  fu^TS?-');
define('AUTH_SALT', 'gOaSP0q<%}Mz&ghax6St_86*#K(D;[?Rbw!HDK>Flld4=kXB!Ut8agqPTQ]0?xQq');
define('SECURE_AUTH_SALT', 'mG;:DtWI!aq*Hr<EnvF*Gd<U+=#Clb0lz#n{xHl}U:hFGM85B]!%Z<S=f)}5/$L2');
define('LOGGED_IN_SALT', '$~k?cQE4bO~hglL3aoVQmy)CLg:4u9w8MiF1V0al=r:Iie,D4H:n@BNaf%1fk)L4');
define('NONCE_SALT', 'vK,uK3X(F L~~M5QKmV9z|jlFN&9LUJEwz#dmcO&gW7Uy@p&{`p&7P9ZRY)jmLG7');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'cb23_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

