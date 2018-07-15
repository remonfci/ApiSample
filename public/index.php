<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

// Define application path
define('APPLICATION_PATH', realpath(__DIR__ . '/../'));

// Composer autoload
require APPLICATION_PATH . '/vendor/autoload.php';

// Run the application
Api\Bootstrap::init(require 'config/config.php');

