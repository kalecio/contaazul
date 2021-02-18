<?php
require 'environment.php';

global $config;
$config = array();
try {
	if (ENVIRONMENT == 'development') {
		$config['dbname'] = 'contaazul';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	} else {
		$config['dbname'] = 'contaazul';
		$config['host'] = '192.168.1.29';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	}
	//code...
} catch (\Throwable $th) {
	echo 'Erro ao acessar sistema', $th->getMessage();
}
