# # [joseainsa81](https://github.com/joseainsa81) / **[Session](https://github.com/joseainsa81/Session)**

Buenos días.  
Esta es una clase para el manejo de las sesiones en php.

Está optimizada para php 7.3 y superiores.  
Todos los parámetros de configuración obsoletos en php 7.3 no están incluidos en esta clase.

Conforme vayan actualizando las versiones de php iré actualizando la clase.  
Si tienes cualquier duda, comentario, si encuentras algún error o si consideras que se puede mejorar esta clase no dudes en ponerte en contacto conmigo.

Esta clase incluye una mejora de seguridad en las opciones por defecto de php.ini.  
También incluye mejoras de funcionalidad:

- **Eliminación de archivos de sesión**: Si se especifica la ruta del servidor donde guardar los archivos de sesión, estos serán eliminados mediante la función `unlink()` al ser finalizada la sesión desde la clase [Session.php](https://github.com/joseainsa81/Session/blob/master/src/Session.php "Session.php").
- **Huella digital**: Se usa para evitar el robo de sesiones.
- **Marca de tiempo**: Añadirá a `$_SESSION` una marca de tiempo para revisar en cada inicio de sesión si ha expirado o no.
- **Reseteo por número de solicitudes**: Cada X solicitudes de inicio de sesión se regenera el ID. También se utiliza para evitar el robo de sesiones.
- **Token de sesión**: Crea un token único por sesión que puede ser utilizado en cualquier otra parte de tu proyecto.

# Instalación
Esta clase está disponible en [Packagist](https://packagist.org/packages/joseainsa81/session) y su instalación vía [Composer](https://getcomposer.org) es la recomendada. Solo añade esta línea a tu archivo `composer.json`:

```json
"joseainsa81/session": "*"
```

o vía terminal ejecutando:

```sh
composer require joseainsa81/session
```

Alternativamente, si no estás utilizando Composer, copia el contenido de la carpeta [src](https://github.com/joseainsa81/Session/tree/master/src "src") en tu proyecto y carga la clase [Session.php](https://github.com/joseainsa81/Session/blob/master/src/Session.php "Session.php") manualmente:

```php
<?php
use Joseainsa81\Session\Session;
require 'path/to/src/Session.php';
```

# Documentación de uso y ejemplos

## Inicio de la clase

```php
<?php
// Importa la clase en el espacio de nombres global
// Recuerda que se debe importar en la parte superior del script, no dentro de una función
use Joseainsa81\Session\Session;

// Carga el autoload de Composer
require 'vendor/autoload.php';
// O incluye la clase a mano
// require 'path/to/src/Session.php';

// Iniciamos la clase
// Como estamos iniciando $_SESSION recuerda no usar esa variable antes de iniciar la clase
Session::init();
```

## Parámetros de configuración

Estos son los parámetros de configurarción en tiempo de ejecución que se pueden establecer desde la clase:

- **name**: Especifica el nombre de la sesión que se usa como nombre de cookie. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.name).
- **save_handler**: Define el nombre del gestor que se usa para almacenar y recuperar información asociada con una sesión. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.save-handler).
- **save_path**: Define el argumento que es pasado al gestor de almacenamiento. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.save-path).
- **gc_probability**: Probabilidad para manejar la probabilidad de que la rutina de gc se inicie. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.gc-probability).
- **gc_divisor**: Divisor para manejar la probabilidad de que la rutina de gc se inicie. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.gc-divisor).
- **gc_maxlifetime**: Define cuánto tiempo se mantendrá viva una sesión PHP no utilizada. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.gc-maxlifetime).
- **serialize_handler**: Define el nombre del manejador que se usa para serializar/deserializar datos. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.serialize-handler).
- **cookie_lifetime**: Especifica el tiempo de vida en segundos de la cookie que es enviada al navegador. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-lifetime).
- **cookie_path**: Especifica la ruta a establecer en la cookie de sesión. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-path).
- **cookie_domain**: Especifica el dominio a establecer en la cookie de sesión. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-domain).
- **cookie_secure**: Especifica si las cookies deberían enviarse sólo sobre conexiones seguras. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-secure).
- **cookie_httponly**: Marca la cookie como accesible sólo a través del protocolo HTTP. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.cookie-httponly).
- **cookie_samesite**: Permite a los servidores afirmar que no se debe enviar una cookie junto con solicitudes entre sitios. [Más info](https://www.php.net/manual/en/session.configuration.php#ini.session.cookie-samesite).
- **use_strict_mode**: Especifica si el módulo usará el modo de id de sesión estricto. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.use-strict-mode).
- **use_cookies**: Especifica si el módulo usará cookies para almacenar el id de sesión en la parte del cliente. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.use-cookies).
- **use_only_cookies**: Especifica si el módulo sólo usará cookies para almacenar el id de sesión en la parte del cliente. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.use-only-cookies).
- **referer_check**: Contiene la subcadena para comprobar cada HTTP Referer. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.referer-check).
- **cache_limiter**: Especifica el método de control de caché usado por páginas de sesión. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.cache-limiter).
- **cache_expire**: Especifica el tiempo de vida en minutos para las páginas de sesión examinadas, esto no tiene efecto para el limitador nocache. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.cache-expire).
- **use_trans_sid**: Si está habilitado sid transparente o no. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.use-trans-sid).
- **trans_sid_tags**: Especifica cuáles etiquetas HTML son reescritas para incluir el ID de sesión cuando está habilitado el soporte para SID transparente. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.trans-sid-tags).
- **trans_sid_hosts**: Especifica los hosts que se reescriben para incluir el ID de sesión cuando el soporte para SID transparente está habilitado. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.trans-sid-hosts).
- **sid_length**: Especificar la longitud de la cadena del ID de sesión. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.sid-length).
- **sid_bits_per_character**: Especifica el número de bits en caracteres de ID de sesión codificados. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.hash-bits-per-character).
- **upload_progress_enabled**: Habilita el seguimiento del progreso de subida de ficheros, rellenado la variable $_SESSION. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.enabled).
- **upload_progress_cleanup**: Limpieza de la información del progreso al finalizar la lectura de los datos del POST. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.cleanup).
- **upload_progress_prefix**: Prefijo usado para la clave del progreso de subida en $_SESSION. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.prefix).
- **upload_progress_name**: El nombre de la clave a usar en $_SESSION para guardar la información del progreso de subida. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.name).
- **upload_progress_freq**: Determina cada cuanto debería actualizarse la información del proceso de subida. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.freq).
- **upload_progress_min_freq**: El retraso mínimo entre actualizaciones, en segundos. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.upload-progress.min-freq).
- **lazy_write**: Si está habilitado significa que los datos de sesión solamente son rescritos si cambian. [Más info](https://www.php.net/manual/es/session.configuration.php#ini.session.lazy-write).


*Aunque en el ejemplo están todos los parámetros puestos en la variable `$options` se recomienda solo poner aquellos que quieras sobreescribir.*

```php
<?php
$options = array(
// Valores que se recomienda modificar por seguridad:
    // Los valores son los de por defecto de php.ini, pero pueden variar en tu servidor
    'name' => "PHPSESSID",
    'save_path' => "",
    'cookie_domain' => "",
    
// Valores ya modificados por seguridad:
    // Le dice al navegador que elimine la cookie al cerrarse
    'cookie_lifetime' => 0,
    // Evitar propagación en url
    'use_cookies' => 1,
    'use_only_cookies' => 1,
    // Es obligatorio habilitar session.use_strict_mode por seguridad general de sesión.
    'use_strict_mode' => 1,
    // Evita el robo por cross-site scripting
    'cookie_httponly' => 1,
    // Evita robo por sniffing, solo para https
    'cookie_secure' => 1,
    // Este atributo es una forma de mitigar los ataques CSRF (Cross Site Request Forgery).
    'cookie_samesite' => 'Lax',
    // Probabilidad de que la rutina de gc (garbage collection, recolección de basura) se inicie en cada inicialización de sesión.
    'gc_maxlifetime' => 1440,
    'gc_probability' => 1,
    'gc_divisor' => 1000,
    // deshabilitar la administración transparente de ID de sesión mejora la seguridad general de ID de sesión al eliminar la posibilidad de una inyección o fuga de ID de sesión.
    'use_trans_sid' => 0,
    // Especifica el método de control de caché usado por páginas de sesión
    'cache_limiter' => 'nocache',  
    // IDs de sessión más fuertes
    'sid_length' => 48,
    'sid_bits_per_character' => 6,  
    // Me aseguro que esté puesto el valor por defecto
    'save_handler' => 'files',

// Otros parámetros de la configuración en tiempo de ejecución
    // Los valores son los de por defecto de php.ini, pero pueden variar en tu servidor
    'serialize_handler' => "php",
    'cookie_path' => "/",
    'referer_check' => "",
    'cache_expire' => "180",
    'trans_sid_tags' => "a=href,area=href,frame=src,form=",
    'trans_sid_hosts' => $_SERVER['HTTP_HOST'],
    'upload_progress_enabled' => "1",
    'upload_progress_cleanup' => "1",
    'upload_progress_prefix' => "upload_progress_",
    'upload_progress_name' => "PHP_SESSION_UPLOAD_PROGRESS",
    'upload_progress_freq' => "1%",
    'upload_progress_min_freq' => "1",
    'lazy_write' => "1" 
);
Session::init($options);
```

## Huella digital

Esta es una medida para evitar el robo de sesiones.  
Es un sistema de verificación doble donde cada sesión guarda la IP y los datos de navegador del usuario codificados con el algoritmo sha512.  
Para mayor seguridad se puede incluir una [sal](https://www.php.net/manual/es/faq.passwords.php#faq.passwords.salt) mediante el parámetro `fingerprint_salt`.

```php
<?php
$options = array(
    'fingerprint_salt' => 'Z@aBa"hj"y'
);
Session::init($options);
```

Por defecto viene activado, si lo quieres desactivar debes pasar el parámetro `fingerprint_enable` con valor `false`.

```php
<?php
$options = array(
    'fingerprint_enable' => false
);
Session::init($options);
```

## Marca de tiempo

Cada sesión guarda la marca de tiempo durante la que está viva.  
No se podrá retomar una sesión con una marca de tiempo inferior a la hora actual.  
De este modo nos aseguramos que un atacante no puede hacerse con sesiones antiguas.

Si un usuario entrara después de que la caducidad ha expirado la sesión se destruirá y se creará una nueva con la variable `$_SESSION['_expired'] = true`.  
El valor `true` solo estará disponible una sola vez al iniciar la nueva sesión, por defecto esa variable siempre existe y es igual a `false`.  
Esta variable sirve, por ejemplo, para poder poner el aviso de: *Su sesion ha expirado*.  
Recuerda que `timeout` debe ser inferior a `gc_maxlifetime` para que todo funcione correctamente.

Por defecto la caducidad de la sesión se establece en 1200 segundos (20 minutos), para cambiar este valor hay que pasar el número de segundos deseados al parámetro `timeout`.

```php
<?php
// 3600 segundos = 1 hora
$options = array(
    'timeout' => 3600
);
Session::init($options);
```

Por defecto viene activado, si lo quieres desactivar debes pasar el parámetro `timeout_enable` con valor `false`.

```php
<?php
$options = array(
    'timeout_enable' => false
);
Session::init($options);
```

## Reseteo por número de solicitudes

Como medida de seguridad para evitar el robo de sesiones se recomienda resetear el ID de sesión periódicamente.

Por defecto esta clase resetea el ID de sesión cada 10 peticiones que no sean POST o vía AJAX.  
Si quieres modificar el intervalo tendrás que pasar el valor que desees como parámetro al iniciar la clase.

```php
<?php
// Para resetear el ID de sesion cada 20 peticiones
$options = array(
    'reset_limit' => 20
);
Session::init($options);
```

Para comprobar que estamos en una petición POST se evalúa `$_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']` y `$_SERVER['REQUEST_METHOD'])`.  
Mientras que para las peticiones vía AJAX se evalúa que `strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] )` sea igual a `xmlhttprequest`.  
Puse esta limitación de no resetar en POST ni AJAX para evitar problemas de continuidad con las sesiones.  
Recuerda pasar la cabecera `X-Requested-With` igual a `XMLHttpRequest` en tus peticiones AJAX.

```javascript
var xhttp = new XMLHttpRequest();
xhttp.open(method, url);
xhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
```

Por defecto viene activado, si lo quieres desactivar debes pasar el parámetro `reset_enable` con valor `false`.

```php
<?php
$options = array(
    'reset_enable' => false
);
Session::init($options);
```

## Token de sesión

Esta funcionalidad crea un token que se mantiene durante toda la sesión.  
Puede ser útil en otros puntos de un proyecto para usar como [sal](https://www.php.net/manual/es/faq.passwords.php#faq.passwords.salt) de tokens de formularios.

El token se guarda en la variable `$_SESSION['token']`.

Por defecto viene activado, si lo quieres desactivar debes pasar el parámetro `token_enable` con valor `false`.

```php
<?php
$options = array(
    'token_enable' => false
);
Session::init($options);
```

# Test

La clase viene con un carpeta llamada [test](https://github.com/joseainsa81/Session/tree/master/test "test") donde se incluye la clase [SessionTest.php](https://github.com/joseainsa81/Session/blob/master/test/SessionTest.php "SessionTest.php"). También incluye el archivo [.phar de phpunit](https://phpunit.readthedocs.io/es/latest/installation.html#php-archive-phar) para que no te tengas que preocupar de instalar nada para su ejecución.

Para ejecutar esta clase lo más rápido y cómodo es abrir en tu localhost el archivo [test.php](https://github.com/joseainsa81/Session/blob/master/test/test.php "test.php").

# Docs

La clase viene con un carpeta llamada [docs](https://github.com/joseainsa81/Session/tree/master/docs "docs") donde se incluye la posibilidad de generar la documentación de [phpDocumentor](https://www.phpdoc.org/). También incluye el arhivo [.phar de phpDocumentor](http://phpdoc.org/phpDocumentor.phar) para que no te tengas que preocupar de instalar nada para su ejecución.

Para ello abré en tu localhost el archivo [docs.php](https://github.com/joseainsa81/Session/blob/master/docs/docs.php "docs.php") y pulsa en el enlace **Generar documentación de phpdocumentor**. Una vez creada la documentación ya podrás verla en los enlaces **clean** y **responsive-twig**
 bajo el título **phpDocumentor**.

# Licencia

![Licencia de Creative Commons - CC BY 4.0](https://i.creativecommons.org/l/by/4.0/88x31.png)

Este software se distribuye bajo la licencia **CC BY 4.0** ([Creative Commons Attribution 4.0 International Public License](https://creativecommons.org/licenses/by/4.0/legalcode.es)). 

Por favor lea el archivo archivo [LICENSE.md](https://github.com/joseainsa81/Session/blob/master/LICENSE.md "LICENSE.md") para obtener información sobre la disponibilidad y distribución del software.

Este programa se distribuye con la esperanza de que sea de utilidad, pero SIN NINGUNA GARANTÍA; ni siquiera la garantía implícita de COMERCIABILIDAD o APTITUD PARA UN PROPÓSITO EN PARTICULAR.

Esta clase puede usarse tanto en proyectos comerciales como proyectos sin ánimo de lucro.

Por favor, si vas a usar el proyecto mantén todos los comentarios de la clase, incluidos los de referencia al autor y a la licencia.
