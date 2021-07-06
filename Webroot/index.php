<?php

namespace MVC\Webroot;

use MVC\Dispatcher;

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));// /mvc/
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));// C:\xampp\htdocs\mvc\webroot\index.php

require(ROOT . 'vendor/autoload.php');//C:\xampp\htdocs\mvc

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>