<?php

if (file_exists($_ENV['TWIGPRESS_PATH'] . '/twigpress.php')){
    require_once $_ENV['TWIGPRESS_PATH'] . '/twigpress.php';
}

if (!defined('GOUTTE'))
    define ('GOUTTE', dirname (__DIR__).'/lib/Goutte/goutte.phar');

if (!defined('TEMPLATE_PATH')){
    define('TEMPLATE_PATH', dirname (__DIR__));
}