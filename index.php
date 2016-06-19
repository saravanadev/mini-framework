<?php

session_start();

define('ROOT_DIR', 	realpath(dirname(__FILE__)) .'/');
define('APP_DIR', 	ROOT_DIR .'application/');

require(APP_DIR  . 'config/config.php');
require(APP_DIR  . 'config/database.php');
require(APP_DIR	 . 'config/routes.php');
require(ROOT_DIR . 'system/model.php');
require(ROOT_DIR . 'system/view.php');
require(ROOT_DIR . 'system/controller.php');
require(ROOT_DIR . 'system/application.php');

global $config;
define('BASE_URL', 	$config['base_url']);

$application 	= 	new Application();