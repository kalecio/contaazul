<?php

session_start();
require_once 'config.php';
//define('BASE_URL', 'http://192.168.1.30/contaazul');
define('BASE_URL', 'http://localhost/contaazul');
spl_autoload_register(function ($class) {
    if (file_exists('controllers/' . $class . '.php')) {

        require_once 'controllers/' . $class . '.php';
    } elseif (file_exists('models/' . $class . '.php')) {

        require_once 'models/' . $class . '.php';
    } elseif (file_exists('core/' . $class . '.php')) {

        require_once 'core/' . $class . '.php';
    }
});

$core = new Core();
$core->run();
