<?php

require 'environment.php';

global $config;
$config = [];
try {
    if (ENVIRONMENT == 'development') {
        $config['dbname'] = 'conta_azul';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '123456789';
    } else {
        $config['dbname'] = 'conta_azul';
        $config['host'] = '192.168.1.30';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '123456789';
    }
    //code...
} catch (\Throwable $th) {
    echo 'Erro ao acessar sistema', $th->getMessage();
}
