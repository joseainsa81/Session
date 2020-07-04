<?php

/**
 * SessionTest - Clase para el manejo de la sesiones php
 *
 * @author    José Julián Aínsa Gutiérrez <joseainsa81@gmail.com>
 * @license   //creativecommons.org/licenses/by/4.0/legalcode.es CC BY 4.0
 * @note      Este programa se distribuye con la esperanza de que sea de 
 * utilidad, pero SIN NINGUNA GARANTÍA; ni siquiera la garantía implícita
 * de COMERCIABILIDAD o APTITUD PARA UN PROPÓSITO EN PARTICULAR.
 * @version   v.1.0.0 (2020-01-01)
 */

use Joseainsa81\Session\Session;


/**
 * Clase Test de Joseainsa81\Session
 * 
 */
class SessionTest extends PHPUnit\Framework\TestCase
{
    private static $folder_session_tmp = __DIR__ . '/tmp/';
    private static $session_name = 'PRUEBAS';

    public static function setUpBeforeClass(): void
    {
    }
    protected function setUp(): void
    {
    }
    protected function assertPreConditions(): void
    {
    }

    public function testSessions()
    {
        // Modificamos opciones
        $options = array(
            // Modificamos el nombre de la cookie
            'name' => self::$session_name,
            // Establecemos una nueva carpeta donde guardar las sesiones
            'save_path' => self::$folder_session_tmp
        );

        // Iniciamos la clase
        Session::init($options);

        // Comprobamos que existe un id de sesión
        $session_id = session_id();
        $this->assertNotEmpty($session_id);

        // Comprobamos que existe la huella digital
        $fingerprint = $_SESSION['_fingerprint'];
        $this->assertNotEmpty($fingerprint);

        // Comprobamos que existe la marca de tiempo
        $fingerprint = $_SESSION['_timeout_idle'];
        $this->assertNotEmpty($fingerprint);

        // Comprobamos que marca que no ha expirado la marca de tiempo
        $fingerprint_expired = $_SESSION['_expired'];
        $this->assertFalse($fingerprint_expired);

        // Comprobamos que existe la variable de reseteo
        // y que es igual a 1 porque es la primera vez que se entra
        $reset_n = $_SESSION['_n'];
        $this->assertSame($reset_n, 1);

        // Comprobamos que existe el token de sesión
        $token = $_SESSION['token'];
        $this->assertNotEmpty($token);

        // Regeneramos el id de sesión 
        Session::regenerateId();

        // Comprobamos que el nuevo id de sesión es distinto al anterior
        $new_session_id = session_id();
        $this->assertNotSame($session_id, $new_session_id);




        // Elimina la sesión sin crear una nueva
        Session::exterminate();
    }



    protected function onNotSuccessfulTest(\Throwable $t): void
    {
        throw $t;
    }

    protected function assertPostConditions(): void
    {
    }
    protected function tearDown(): void
    {
    }
    public static function tearDownAfterClass(): void
    {
    }
}
