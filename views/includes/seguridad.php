<?php 
	// ini_set("session.cookie_lifetime","10");
	// ini_set("session.gc_maxlifetime","10"); 
	include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
	//$sex = $_GET['sesion'];
	//$url_parametros['sesion'] = $sex;
	//fncVerificarSesionUsuario($sex);
	@session_start();

	// VALIDAR TIEMPO DE SESION DEL USUARIO
	//$tiempo = fncValidarTiempoSesion($_SESSION['timer']);
	// if ($tiempo){
	// 	$_SESSION['timer'] = time();
	// }else{
	// //	header('Location: ../index.php');
	// }

	@date_default_timezone_set('America/Lima');
	// if( !isset($_SESSION['usuario']["ses_UsuarioLogeado"]) or $_SESSION['usuario']["ses_UsuarioLogeado"] == false ){
	// 	// $url_parametros['v'] = 'login';
	// 	// header('Location: ../modules/usuario.php?' . http_build_query($url_parametros)); 
	// 	header('Location: ../errors/404.php?' . http_build_query($url_parametros)); 
	// }
	
?>