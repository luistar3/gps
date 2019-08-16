<?php 
	
	@session_start();

	if( !isset($_SESSION['usuario']["ses_IdUsuario"]) ){
		header('Location: views/website/login.php'); 
	}else{
		header('Location: modules/evento.php?v=eventopPage'); 
	}

	// if( !isset($_GET["sesion"]) or $_GET["sesion"] == "" ){ 
	// 	header('Location: http://net.upt.edu.pe'); 
	// }else{
	// 	$sex = $_GET['sesion'];
	// 	$url_parametros_index['sesion'] = $sex;
	// 	header('Location: modules/index.php?' . http_build_query($url_parametros_index)); 
		
	// }
?>