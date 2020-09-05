<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("COMPONENTS", ROOT . '/components'); //widgets
define("CORE", ROOT . '/vendor/shop/core');
define("LIBS", ROOT . '/vendor/shop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'watches');

$https = filter_input(INPUT_SERVER, 'HTTPS'); //отфильтрованный $_SERVER['HTTPS']
$host = filter_input(INPUT_SERVER, 'HTTP_HOST'); //$_SERVER['HTTP_HOST']
$php_self = filter_input(INPUT_SERVER, 'PHP_SELF'); //$_SERVER['PHP_SELF']
$app_path = (isset($https) && !empty($https) && $https != 'off') ? 'https://' : 'http://';
$app_path .= "{$host}{$php_self}";
$app_path = preg_replace("#[^/]+$#", '', $app_path);
$app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);

define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';
