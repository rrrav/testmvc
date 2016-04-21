<?php

/**
 * Common settings
 */
ini_set('display_error', 1);
error_reporting(E_ALL);

/**
 * System settings
 */
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Router.php');
require_once(ROOT . '/components/Db.php');

/**
 * Router connect
 */
$router = new Router();
$router->start();