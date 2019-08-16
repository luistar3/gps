<?php 
	$sex = $_GET['sesion'];
	$url_parametros_index['sesion'] = $sex;
	header('Location: ../index.php?' . http_build_query($url_parametros_index));
?>