<?php

// declare autoloader function
function __autoload($class)
{
	$baseDir = __DIR__;
    $parts = explode('\\', $class);
    require_once $baseDir. DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parts) . '.php';
}


//get 
define('SHORTURL_PREFIX', $_SERVER['SERVER_NAME'] .'/shorturl/r.php?c=');
?>