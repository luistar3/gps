<?php  
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_GradoAcademico.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_GradoAcademico.php');

	// VISTAS
	// ===================================================
	if( isset($_GET["v"]) and $_GET["v"] !== "" ){
		$get_opcion = $_GET["v"];
			
		switch ($get_opcion) {
			
			case 'index':
					view_Index();
				break;
			case 'agregar':
					view_AgregarEditar();
				break;
			default:
				header('Location: ../errors/404.php'); 
				break;

		}

	// FUNCIONES
	// ===================================================
	}elseif( isset($_GET["p"]) and $_GET["p"] !== "" ){
		$get_opcion = $_GET["p"];
			
		switch ($get_opcion) {

			case '':
					fnc_ConsultarActivos();
				break;
			default:
				header('Location: ../errors/404.php'); 
				break;
		}

	}else{
		header('Location: ../errors/404.php'); 
	}

	//===========================================================================
	//	VISTAS
	//===========================================================================

	function view_Index()
	{
		// @session_start();
		// $menu_activo = "egresados_index";

		// include('../views/includes/header.php');
		// include('../views/mod_egresado/index.php');
		// include('../views/includes/footer.php');
	}

	function view_AgregarEditar()
	{
		// @session_start();
		// $menu_activo = "egresados_index";

		// include('../views/includes/header.php');
		// include('../views/mod_egresado/add_edit.php');
		// include('../views/includes/footer.php');
	}



	//===========================================================================
	//	FUNCIONES
	//===========================================================================
		 
	function fnc_ConsultarActivos()
	{
		// @session_start();
		// $validacion_post = true;
		// $response = array();

		// if( !isset($_POST["coduniv"]) ){ $validacion_post = false; }
		// if( !isset($_POST["itemest"]) ){ $validacion_post = false; }
		// if( !isset($_POST["idsem"]) ){ $validacion_post = false; }

		// if ($validacion_post == true){

		// 	$post_coduniv = $_POST["coduniv"];
		// 	$post_itemest = $_POST["itemest"];
		// 	$post_idsem 	= $_POST["idsem"];

		// 	$business_Egresado = new business_Egresado();
		// 	$dtConsultarEgresados = $business_Egresado -> fncBusinessBuscarInformacionEgresado($post_coduniv, $post_itemest, $post_idsem);

		// 	if ( count($dtConsultarEgresados) > 0 ){
		// 		// $_SESSION["egresado"]["CodUniv"] 		= $dtConsultarEgresados[0]['CodUniv'];
		// 		// $_SESSION["egresado"]["ItemEst"] 		= $dtConsultarEgresados[0]['ItemEst'];
		// 		// $_SESSION["egresado"]["Nombres"] 		= $dtConsultarEgresados[0]['Nombres'];
		// 		// $_SESSION["egresado"]["Apellidos"]	= $dtConsultarEgresados[0]['Apellidos'];
		// 		// $_SESSION["egresado"]["Dni"] 				= $dtConsultarEgresados[0]['Dni'];
		// 		// $_SESSION["egresado"]["IdSem"] 			= $dtConsultarEgresados[0]['IdSem'];
		// 		// $_SESSION["egresado"]["Semestre"] 	= $dtConsultarEgresados[0]['Semestre'];

		// 		$response["CodUniv"] 		= $dtConsultarEgresados[0]['CodUniv'];
		// 		$response["ItemEst"] 		= $dtConsultarEgresados[0]['ItemEst'];
		// 		$response["Nombres"] 		= $dtConsultarEgresados[0]['Nombres'];
		// 		$response["Apellidos"]	= $dtConsultarEgresados[0]['Apellidos'];
		// 		$response["Dni"] 				= $dtConsultarEgresados[0]['Dni'];
		// 		$response["IdSem"] 			= $dtConsultarEgresados[0]['IdSem'];
		// 		$response["Semestre"] 	= $dtConsultarEgresados[0]['Semestre'];

		// 		$response['mensaje'] = true;
		// 	}else{
		// 		$response['mensaje'] = false;
		// 	}
			
		// 	header('Content-Type: application/json; charset=utf-8');
		// 	echo json_encode($response);
		// }else{
		// 	header('Location: ../index.php');
		// }			
		
	}


?>