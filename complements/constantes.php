<?php  
	
	define('DOMAIN', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME']);
	define('PROTOCOL', isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'http' ? 'http' : 'http');
	define('PORT', $_SERVER['SERVER_PORT']);
	define('SITE_PATH', preg_replace('/index.php$/i', '', $_SERVER['PHP_SELF']));
	// define('SITE_ROOT', PROTOCOL . '://' . DOMAIN . (PORT === '80' ? '' : ':' . PORT) . SITE_PATH);
	define('SITE_ROOT', PROTOCOL . '://' . DOMAIN . '/EventosWeb/' );
		
?>