# # [joseainsa81](https://github.com/joseainsa81) / **[Session](https://github.com/joseainsa81/Session)**

Buenos días.
Esta es una clase para el manejo de las sesiones en php.
Está optimizada para php 7.3. 
Todos los parámetros obsoletos en php 7.3 no están incluidos en esta clase.
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

## Huella digital

## Marca de tiempo

## Reseteo por número de solicitudes

## Token de sesión

# Test

La clase viene con un carpeta llamada [test](https://github.com/joseainsa81/Session/tree/master/test "test") donde se incluye la clase [SessionTest.php](https://github.com/joseainsa81/Session/blob/master/test/SessionTest.php "SessionTest.php"). También incluye el archivo [.phar de phpunit](https://phpunit.readthedocs.io/es/latest/installation.html#php-archive-phar) para que no te tengas que preocupar de instalar nada para su ejecución.
Para ejecutar esta clase lo más rápido y cómodo es abrir en tu localhost el archivo [test.php](https://github.com/joseainsa81/Session/blob/master/test/test.php "test.php").

# Docs

La clase viene con un carpeta llamada [docs](https://github.com/joseainsa81/Session/tree/master/docs "docs") donde se incluye la posibilidad de generar la documentación de [phpDocumentor](https://www.phpdoc.org/). También incluye el arhivo [.phar de phpDocumentor](http://phpdoc.org/phpDocumentor.phar) para que no te tengas que preocupar de instalar nada para su ejecución.
Para ello abré en tu localhost el archivo [docs.php](https://github.com/joseainsa81/Session/blob/master/docs/docs.php "docs.php") y pulsa en el enlace **Generar documentación de phpdocumentor**. Una vez creada la documentación ya podrás verla en los enlaces **clean** y **responsive-twig**
 bajo el título **phpDocumentor**.

# Licencia

![Licencia de Creative Commons - CC BY 4.0](https://i.creativecommons.org/l/by/4.0/88x31.png)
Este software se distribuye bajo la licencia **CC BY 4.0** ([Creative Commons Attribution 4.0 International Public License](https://creativecommons.org/licenses/by/4.0/legalcode.es)). Por favor lea el archivo archivo [LICENSE.md](https://github.com/joseainsa81/Session/blob/master/LICENSE.md "LICENSE.md") para obtener información sobre la disponibilidad y distribución del software.

Este programa se distribuye con la esperanza de que sea de utilidad, pero SIN NINGUNA GARANTÍA; ni siquiera la garantía implícita de COMERCIABILIDAD o APTITUD PARA UN PROPÓSITO EN PARTICULAR.

Esta clase puede usarse tanto en proyectos comerciales como proyectos sin ánimo de lucro.

Por favor, si vas a usar el proyecto mantén todos los comentarios de la clase, incluidos los de referencia al autor y a la licencia.
