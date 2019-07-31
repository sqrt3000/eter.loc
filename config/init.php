<?php

define("DEBUG", 1); //Установка 0 и 1 два режима, если 1 - то режим отладки)
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/eter/core');
define("LIBS", ROOT . '/vendor/eter/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'eter');

// http://eter.loc/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://eter.loc/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
// http://eter.loc
$app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';