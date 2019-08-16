<?php 
	if( !isset($_GET["sesion"]) or $_GET["sesion"] == "" ){ 
		header('Location: http://net.upt.edu.pe'); 
	}else{
		$sex = $_GET['sesion'];
		$url_parametros_index['sesion'] = $sex;
		header('Location: ../index.php?' . http_build_query($url_parametros_index));
	}
?>