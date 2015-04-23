<?php
// get autoloading script
// initialise global vars
require_once 'init.php';

use Util\Database\PdoConnection as PdoConnection;
use Util\Forms\Short as Short;
use Util\ShortUrl as ShortUrl;

// get db handler
$dbh = PdoConnection::getHandle();

// get form obj.
$Form = new Short('Shorten');

$output = null;


// check if form submitted
// check that url value is not empty
if (isset($_POST['url']) && !empty($_POST['url'])) 
{
	$shortUrl = new ShortUrl($dbh);

	try {
	    $code = $shortUrl->urlToShortCode($_POST['url']);
	}
	catch (\Exception $e) {
	    // var_dump($e);
	}
	$url = SHORTURL_PREFIX . $code;

	$output = '<p><strong>Short URL:</strong> <a href="//'.$url.'" target="_blank">'.$url.'</a></p>';
}



?>
<html>
<head>
	<title>URL Shortener</title>

	<meta name="description" content="This is a test, url shortener" />
	<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
	<h1>Shorten Me!</h1>
<?= $Form->render() ?>
<?php if (!is_null($output)):?>
	<hr>
	<?= $output ?>
<?php endif; ?>
</body>
</html>