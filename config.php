<?php
require 'environment.php';

global $config;
$config = array();
if(ENVIRONMENT == 'development') {
	$config['dbname'] = 'mococaonline_contaazul';
	$config['host'] = 'robb0149.publiccloud.com.br:3306';
	$config['dbuser'] = 'mococ_azul';
	$config['dbpass'] = 'CREEDcreed040405';
} else {
	$config['dbname'] = 'contaazul';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
}
?>