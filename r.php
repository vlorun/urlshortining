<?php
require_once 'init.php';

use Util\Database\PdoConnection as PdoConnection;
use Util\ShortUrl as ShortUrl;

if (empty($_GET["c"])) {
    header("Location: index.php");
    exit;
} 

$code = $_GET["c"];

// get db handler
// get ShortUrl object

$shortUrl = new ShortUrl(PdoConnection::getHandle());
try {
    $url = $shortUrl->shortCodeToUrl($code);
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $url);
}
catch (\Exception $e) {
// todo custom error page
print_r($e);
    header("Location: index.php");
    exit;
}
