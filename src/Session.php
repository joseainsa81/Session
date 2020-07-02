<?php

/**
 * Session - Clase para el manejo de la sesiones php
 *
 * @author    José Julián Aínsa Gutiérrez <joseainsa81@gmail.com>
 * @license   //creativecommons.org/licenses/by/4.0/legalcode.es CC BY 4.0
 * @note      Este programa se distribuye con la esperanza de que sea de 
 * utilidad, pero SIN NINGUNA GARANTÍA; ni siquiera la garantía implícita
 * de COMERCIABILIDAD o APTITUD PARA UN PROPÓSITO EN PARTICULAR.
 * @version   v.1.0.0 (2020-01-01)
 */

namespace Joseainsa81\Session;

/**
 * Session - Clase para el manejo de la sesiones php
 *
 * @author    José Julián Aínsa Gutiérrez <joseainsa81@gmail.com>
 */
class Session
{
    /**
     * Especifica el nombre de la sesión que se usa como nombre de cookie. 
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.name
     * @var string|null
     */
    private static $name = null;

    /**
     * Define el nombre del gestor que se usa para almacenar y recuperar información asociada con una sesión.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.save-handler
     * @var string|null
     */
    private static $save_handler = null;

    /**
     * Define el argumento que es pasado al gestor de almacenamiento.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.save-path
     * @var string|null
     */
    private static $save_path = null;

    /**
     * Probabilidad para manejar la probabilidad de que la rutina de gc se inicie
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.gc-probability
     * @var int|null
     */
    private static $gc_probability = null;

    /**
     * Divisor para manejar la probabilidad de que la rutina de gc se inicie
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.gc-divisor
     * @var int|null
     */
    private static $gc_divisor = null;

    /**
     * Define cuánto tiempo se mantendrá viva una sesión PHP no utilizada
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.gc-maxlifetime
     * @var int|null
     */
    private static $gc_maxlifetime = null;

    /**
     * Define el nombre del manejador que se usa para serializar/deserializar datos.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.serialize-handler
     * @var string|null
     */
    private static $serialize_handler = null;

    /**
     * Especifica el tiempo de vida en segundos de la cookie que es enviada al navegador.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-lifetime
     * @var int|null
     */
    private static $cookie_lifetime = null;

    /**
     * Especifica la ruta a establecer en la cookie de sesión.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-path
     * @var string|null
     */
    private static $cookie_path = null;

    /**
     * Especifica el dominio a establecer en la cookie de sesión.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-domain
     * @var string|null
     */
    private static $cookie_domain = null;

    /**
     * Especifica si las cookies deberían enviarse sólo sobre conexiones seguras.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-secure
     * @var boolean|null
     */
    private static $cookie_secure = null;

    /**
     * Marca la cookie como accesible sólo a través del protocolo HTTP.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-httponly
     * @var boolean|null
     */
    private static $cookie_httponly = null;

    /**
     * Permite a los servidores afirmar que no se debe enviar una cookie junto con solicitudes entre sitios.
     *
     * @see https://www.php.net/manual/en/session.configuration.php#ini.session.cookie-samesite
     * @var string|null
     */
    private static $cookie_samesite = null;

    /**
     * Especifica si el módulo usará el modo de id de sesión estricto.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.use-strict-mode
     * @var boolean|null
     */
    private static $use_strict_mode = null;

    /**
     * Especifica si el módulo usará cookies para almacenar el id de sesión en la parte del cliente.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.use-cookies
     * @var boolean|null
     */
    private static $use_cookies = null;

    /**
     * Especifica si el módulo sólo usará cookies para almacenar el id de sesión en la parte del cliente.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.use-only-cookies
     * @var boolean|null
     */
    private static $use_only_cookies = null;

    /**
     * Contiene la subcadena para comprobar cada HTTP Referer.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.referer-check
     * @var string|null
     */
    private static $referer_check = null;

    /**
     * Especifica el método de control de caché usado por páginas de sesión.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.cache-limiter
     * @var string|null
     */
    private static $cache_limiter = null;

    /**
     * Especifica el tiempo de vida en minutos para las páginas de sesión examinadas, esto no tiene efecto para el limitador nocache.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.cache-expire
     * @var int|null
     */
    private static $cache_expire = null;

    /**
     * Si está habilitado sid transparente o no.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.use-trans-sid
     * @var boolean|null
     */
    private static $use_trans_sid = null;

    /**
     * Especifica cuáles etiquetas HTML son reescritas para incluir el ID de sesión cuando está habilitado el soporte para SID transparente.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.trans-sid-tags
     * @var string|null
     */
    private static $trans_sid_tags = null;

    /**
     * Especifica los hosts que se reescriben para incluir el ID de sesión cuando el soporte para SID transparente está habilitado.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.trans-sid-hosts
     * @var string|null
     */
    private static $trans_sid_hosts = null;

    /**
     * Especificar la longitud de la cadena del ID de sesión.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.sid-length
     * @var int|null
     */
    private static $sid_length = null;

    /**
     * Especifica el número de bits en caracteres de ID de sesión codificados.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.hash-bits-per-character
     * @var int|null
     */
    private static $sid_bits_per_character = null;

    /**
     * Habilita el seguimiento del progreso de subida de ficheros, rellenado la variable $_SESSION.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.enabled
     * @var boolean|null
     */
    private static $upload_progress_enabled = null;

    /**
     * Limpieza de la información del progreso al finalizar la lectura de los datos del POST.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.cleanup
     * @var boolean|null
     */
    private static $upload_progress_cleanup = null;

    /**
     * Prefijo usado para la clave del progreso de subida en $_SESSION.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.prefix
     * @var string|null
     */
    private static $upload_progress_prefix = null;

    /**
     * El nombre de la clave a usar en $_SESSION para guardar la información del progreso de subida.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.name
     * @var string|null
     */
    private static $upload_progress_name = null;

    /**
     * Determina cada cuanto debería actualizarse la información del proceso de subida.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.freq
     * @var mixed|null
     */
    private static $upload_progress_freq = null;

    /**
     * El retraso mínimo entre actualizaciones, en segundos. 
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.min-freq
     * @var int|null
     */
    private static $upload_progress_min_freq = null;

    /**
     * Si está habilitado significa que los datos de sesión solamente son rescritos si cambian.
     *
     * @see https://www.php.net/manual/es/session.configuration.php#ini.session.lazy-write
     * @var boolean|null
     */
    private static $lazy_write = null;

    /**
     * Comprueba si está activa la huella digital
     *
     * @var boolean
     */
    private static $fingerprint_enable = false;

    /**
     * Sal de la huella digital de la sesión
     *
     * @var string
     */
    private static $fingerprint_salt = '';

    /**
     * Huella digital de la sesión
     *
     * @var string
     */
    private static $_fingerprint = '';

    /**
     * Comprueba si está activa la eliminación de la sesión con php por tiempo
     *
     * @var boolean
     */
    private static $timeout_enable = false;

    /**
     * Número de segudos que se mantendrá viva una sesión PHP no utilizada
     *
     * @var int
     */
    private static $timeout = 1380;

    /**
     * Activa el reseteo por número de solicitudes
     *
     * @var boolean
     */
    private static $reset_enable = false;

    /**
     * Número de solicitudes antes del reseteo
     *
     * @var int
     */
    private static $reset_limit = 10;

    /**
     * Activa la creación de un token de sessión para usarlo de forma externa a esta clase
     *
     * @var boolean
     */
    private static $token_enable = false;



    /**
     * Modifica las opciones con mejoras de seguridad
     *
     * @see    https://www.php.net/manual/en/session.security.ini.php
     * @note   Pongo los valores en esta función para tenerlo mejor controlado
     * @return void
     */
    private static function setSecureOptions()
    {
        // Le dice al navegador que elimine la cookie al cerrarse
        self::$cookie_lifetime = 0;

        // Evitar propagación en url
        self::$use_cookies = 1;
        self::$use_only_cookies = 1;

        // Es obligatoria habilitar session.use_strict_mode por seguridad general de sesión. 
        self::$use_strict_mode = 1;

        // Evita el robo por cross-site scripting
        self::$cookie_httponly = 1;

        // Evita robo por sniffing, solo para https
        self::$cookie_secure = (
            (isset($_SERVER['HTTPS'])
                && $_SERVER['HTTPS'] !== null
                && $_SERVER['HTTPS'] != 'off')
            ? 1
            : (
                (isset($_SERVER['SERVER_PROTOCOL'])
                    && $_SERVER['SERVER_PROTOCOL'] !== null
                    && strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 5)) == 'https')
                ? 1
                : 0));

        // Este atributo es una forma de mitigar los ataques CSRF (Cross Site Request Forgery).
        self::$cookie_samesite = 'Lax'; // Lax | Strict

        // Probabilidad de que la rutina de gc (garbage collection, recolección de basura) se inicie en cada inicialización de sesión.
        self::$gc_maxlifetime = 1440;
        self::$gc_probability = 1;
        self::$gc_divisor = 1000;

        // deshabilitar la administración transparente de ID de sesión mejora la seguridad general de ID de sesión al eliminar la posibilidad de una inyección o fuga de ID de sesión. 
        self::$use_trans_sid = 0;

        // Especifica el método de control de caché usado por páginas de sesión
        self::$cache_limiter = 'nocache';

        // IDs de sessión más fuertes
        self::$sid_length = 48;
        self::$sid_bits_per_character = 6;

        // Me aseguro que esté puesto el valor por defecto
        self::$save_handler = ' files';

        // A parte de modificar las opciones de la sesión activo las funcionalidades de seguridad

        // Activo la huella digital
        self::$fingerprint_enable = true;

        // Activo la marca de tiempo
        self::$timeout_enable = true;
        self::$timeout = 1200; // 20 minutos

        // Activo el reseteo de id de sesión
        self::$reset_enable = true;
        self::$reset_limit = 20;

        // Activo la creación de un token de sesión
        self::$token_enable = true;
    }

    /**
     * Inicio de la clase
     *
     * @param array $options Array de opciones a reemplazar
     * @return void
     */
    public static function init($options = array())
    {
        // Sobreescribimos las opciones de configuracion
        // Mejoras de seguridad de los valores iniciales
        self::setSecureOptions();
        // Opciones predefinidas por el usuario
        // Si se pasan valores null se usará lo predeterminado por php.ini
        // Mejoras recomendadas: name, save_path y cookie_domain
        foreach ($options as $key => $value) {
            if (isset(self::$$key)) {
                self::$$key = $value;
            }
        }

        // Especifica el nombre de la sesión que se usa como nombre de cookie.
        if (self::$name !== null) {
            ini_set('session.name', self::$name);
        }

        // Define el nombre del gestor que se usa para almacenar y recuperar información asociada con una sesión.
        if (self::$save_handler !== null) {
            ini_set('session.save_handler', self::$save_handler);
        }
        //  Define el argumento que es pasado al gestor de almacenamiento.
        if (self::$save_path !== null) {
            ini_set('session.save_path', self::$save_path);
        }

        // Cambia la probabilidad de que la rutina de gc (garbage collection, recolección de basura) se inicie.
        if (self::$gc_probability !== null) {
            ini_set('session.gc_probability', self::$gc_probability);
        }
        if (self::$gc_divisor !== null) {
            ini_set('session.gc_divisor', self::$gc_divisor);
        }
        // Especifica el número de segundos transcurridos después de que la información sea vista como 'basura' y potencialmente limpiada.
        if (self::$gc_maxlifetime !== null) {
            ini_set('session.gc_maxlifetime', self::$gc_maxlifetime);
        }

        // Define el nombre del manejador que se usa para serializar/deserializar datos.
        if (self::$serialize_handler !== null) {
            ini_set('session.serialize_handler', self::$serialize_handler);
        }

        // Especifica el tiempo de vida en segundos de la cookie que es enviada al navegador.
        // El valor por defecto 0 significa "hasta que el navegador se cierre".
        if (self::$cookie_lifetime !== null) {
            ini_set('session.cookie_lifetime', self::$cookie_lifetime);
        }
        // Especifica la ruta a establecer en la cookie de sesión.
        if (self::$cookie_path !== null) {
            ini_set('session.cookie_path', self::$cookie_path);
        }
        // Especifica el dominio a establecer en la cookie de sesión.
        if (self::$cookie_domain !== null) {
            ini_set('session.cookie_domain', self::$cookie_domain);
        }
        // Especifica si las cookies deberían enviarse sólo sobre conexiones seguras.
        if (self::$cookie_secure !== null) {
            ini_set('session.cookie_secure', self::$cookie_secure);
        }
        // Marca la cookie como accesible sólo a través del protocolo HTTP.
        if (self::$cookie_httponly !== null) {
            ini_set('session.cookie_httponly', self::$cookie_httponly);
        }
        // Permite a los servidores afirmar que no se debe enviar una cookie junto con solicitudes entre sitios.
        if (self::$cookie_samesite !== null) {
            ini_set('session.cookie_samesite', self::$cookie_samesite);
        }

        // Especifica si el módulo usará el modo de id de sesión estricto.
        if (self::$use_strict_mode !== null) {
            ini_set('session.use_strict_mode', self::$use_strict_mode);
        }
        // Especifica si el módulo usará cookies para almacenar el id de sesión en la parte del cliente.
        if (self::$use_cookies !== null) {
            ini_set('session.use_cookies', self::$use_cookies);
        }
        // Especifica si el módulo sólo usará cookies para almacenar el id de sesión en la parte del cliente.
        if (self::$use_only_cookies !== null) {
            ini_set('session.use_only_cookies', self::$use_only_cookies);
        }

        // Contiene la subcadena para comprobar cada HTTP Referer.
        if (self::$referer_check !== null) {
            ini_set('session.referer_check', self::$referer_check);
        }

        // Especifica el método de control de caché usado por páginas de sesión.
        if (self::$cache_limiter !== null) {
            ini_set('session.cache_limiter', self::$cache_limiter);
        }
        // Especifica el tiempo de vida en minutos para las páginas de sesión examinadas, esto no tiene efecto para el limitador nocache.
        if (self::$cache_expire !== null) {
            ini_set('session.cache_expire', self::$cache_expire);
        }

        // Si está habilitado sid transparente o no.
        if (self::$use_trans_sid !== null) {
            ini_set('session.use_trans_sid', self::$use_trans_sid);
        }
        // Especifica cuáles etiquetas HTML son reescritas para incluir el ID de sesión cuando está habilitado el soporte para SID transparente.
        if (self::$trans_sid_tags !== null) {
            ini_set('session.trans_sid_tags', self::$trans_sid_tags);
        }
        // Especifica los hosts que se reescriben para incluir el ID de sesión cuando el soporte para SID transparente está habilitado.
        if (self::$trans_sid_hosts !== null) {
            ini_set('session.trans_sid_hosts', self::$trans_sid_hosts);
        }

        // Especificar la longitud de la cadena del ID de sesión.
        if (self::$sid_length !== null) {
            ini_set('session.sid_length', self::$sid_length);
        }
        // Especifica el número de bits en caracteres de ID de sesión codificados.
        if (self::$sid_bits_per_character !== null) {
            ini_set('session.sid_bits_per_character', self::$sid_bits_per_character);
        }

        // Habilita el seguimiento del progreso de subida de ficheros, rellenado la variable $_SESSION.
        if (self::$upload_progress_enabled !== null) {
            ini_set('session.upload_progress.enabled', self::$upload_progress_enabled);
        }
        // Limpieza de la información del progreso al finalizar la lectura de los datos del POST.
        if (self::$upload_progress_cleanup !== null) {
            ini_set('session.upload_progress.cleanup', self::$upload_progress_cleanup);
        }
        // Prefijo usado para la clave del progreso de subida en $_SESSION.
        if (self::$upload_progress_prefix !== null) {
            ini_set('session.upload_progress.prefix', self::$upload_progress_prefix);
        }
        // El nombre de la clave a usar en $_SESSION para guardar la información del progreso de subida.
        if (self::$upload_progress_name !== null) {
            ini_set('session.upload_progress.name', self::$upload_progress_name);
        }
        // Determina cada cuanto debería actualizarse la información del proceso de subida.
        if (self::$upload_progress_freq !== null) {
            ini_set('session.upload_progress.freq', self::$upload_progress_freq);
        }
        // El retraso mínimo entre actualizaciones, en segundos.
        if (self::$upload_progress_min_freq !== null) {
            ini_set('session.upload_progress.min_freq', self::$upload_progress_min_freq);
        }

        // Si está habilitado significa que los datos de sesión solamente son rescritos si cambian.
        if (self::$lazy_write !== null) {
            ini_set('session.lazy_write', self::$lazy_write);
        }

        // Iniciamos la sesión
        self::sessionStart();
    }

    /**
     * Inicia una session
     *
     * @return void
     */
    private static function sessionStart()
    {

        // Inicia la sesión
        session_start();

        // Huella digital
        self::checkFirgerprint();

        // Eliminación por marca de tiempo
        self::checkTimeout();

        // Reseteo del id de sesión
        self::checkReset();

        // Crea un token de sesión
        self::createToken();
    }

    /**
     * Comprueba la huella digital
     *
     * @return void
     */
    private static function checkFirgerprint()
    {
        // Salimos si no está activado
        if (self::$fingerprint_enable == false) {
            return;
        }
        self::$_fingerprint = self::createFirgerprint();
        if (!isset($_SESSION['_fingerprint'])) {
            // Guardamos la huella digital
            $_SESSION['_fingerprint'] = self::$_fingerprint;
        } else if ($_SESSION['_fingerprint'] != self::$_fingerprint) {
            // Si no corresponde destruimos la sesión
            self::destroy();
        }
    }

    /**
     * Crea una cadena de texto para la verificación doble
     *
     * @return string La huella digital de la sesión
     */
    private static function createFirgerprint()
    {
        return hash('sha512', self::$fingerprint_salt . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
    }

    /**
     * Comprueba si ha caducado
     *
     * @return void
     */
    private static function checkTimeout()
    {
        // Salimos si no está activado
        if (self::$timeout_enable == false) {
            return;
        }
        if (!isset($_SESSION['_timeout_idle'])) {
            // Iniciamos la marca de tiempo
            $_SESSION['_timeout_idle'] = time() + self::$timeout;
            $_SESSION['_expired'] = false;
        }
        if (empty($_SESSION['_timeout_idle'])) {
            // Si no existe destruimos la sesión
            self::destroy();
        } elseif ($_SESSION['_timeout_idle']  < time()) {
            // Si ha pasado el tiempo destruimos la sesión
            self::destroy();
            $_SESSION['_expired'] = true;
        } else {
            // Reseteamos la marca de tiempo
            $_SESSION['_timeout_idle'] = time() + self::$timeout;
            $_SESSION['_expired'] = false;
        }
    }

    /**
     * Reseteo del id de sesión
     *
     * @return void
     */
    private static function checkReset()
    {
        // Salimos si no está activado
        if (self::$reset_enable == false) {
            return;
        }
        // Si es una petición POST o AJAX no reseteamos
        if (
            (isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']) && strtoupper($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']) == 'POST')
            ||
            (isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
            ||
            (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        ) {
            return;
        }

        if (!isset($_SESSION['_n'])) {
            // Si viene vacío iniciamos contador
            $_SESSION['_n'] = 1;
        } else if ($_SESSION['_n'] <= self::$reset_limit) {
            // Si es menor o igual que self::$reset_limit no reseteamos 
            $_SESSION['_n'] = $_SESSION['_n'] + 1;
        } else {
            // Si no cumple con lo anterior lo reseteamos
            $_SESSION['_n'] = 1;
            self::regenerateId();
        }
    }

    /**
     * Regenera un id de sessión
     *
     * @return void
     */
    public static function regenerateId()
    {
        // Guardamos el id
        $session_id = session_id();
        // Regeneramos el id de sesión
        session_regenerate_id();
        // Eliminamos el archivo antiguo
        self::unlink($session_id);
    }

    /**
     * @brief Crea un token de sesión
     *
     * @return string El token creado
     */
    private static function createToken()
    {
        // Salimos si no está activado
        if (self::$token_enable == false) {
            return;
        }
        // Si no existe el token lo creamos
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(16));
        }
    }

    /**
     * Elimina la sesión creando una nueva
     *
     * @return void
     */
    public static function destroy()
    {
        // Eliminamos la sesión
        self::exterminate();
        // Iniciamos la sesión
        self::sessionStart();
    }

    /**
     * Elimina la sesión sin crear una nueva
     *
     * @return void
     */
    public static function exterminate()
    {
        // Guardamos el id
        $session_id = session_id();
        // Destruimos todas las variables de sesión
        $_SESSION = array();
        // Destruimos la sesión
        session_destroy();
        // Eliminamos el archivo de sesión
        self::unlink($session_id);
    }

    /**
     * Elimina el archivo de sessión
     *
     * @param string $session_id Id de sesión a eliminar
     * @return void
     */
    private static function unlink($session_id)
    {
        if (self::$save_handler == ' files' && !empty(self::$save_path)) {
            $sess_file = self::$save_path . 'sess_' . $session_id;
            if (file_exists($sess_file)) {
                @unlink($sess_file);
            }
        }
    }
}
