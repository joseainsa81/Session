<?php
define('PATH', __DIR__ . '/../../');
// Namespaces
spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    if (file_exists(PATH . "src/$className.php")) {
        require_once(PATH . "src/$className.php");
    }
});
