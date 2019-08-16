<?php  
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_SectorOcupacionalDetalle.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_Usuario.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_SectorOcupacional.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_SectorOcupacionalDetalle.php');


	if( (isset($_GET["sesion"]) and $_GET["sesion"] !== "") or (isset($_POST["sesion"]) and $_POST["sesion"] !== "") ){
		if( isset($_GET["sesion"]) ){$sex = $_GET['sesion'];}
		if( isset($_POST["sesion"]) ){$sex = $_POST['sesion'];}		
		fncVerificarSesionUsuario($sex);
	}else{
		header('Location: ../');
		exit();
	}

	// VERIFICAR PERMISO DEL MODULO
	@session_start();
	$url_parametros['sesion'] = $sex;
	$business_Usuario = new business_Usuario();
	$dtConsultarPermisoModulo = $business_Usuario -> fncBusinessConsultarPermisoModulo($_SESSION['usuario']["ses_USRId"], 'btnSectorOcupacional');
	if ( count($dtConsultarPermisoModulo) == 0 ){
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
		$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "El Usuario no tiene permiso a este módulo.";
		header('Location: ../index.php?' . http_build_query($url_parametros)); 
		exit();
	}

	// VISTAS
	// ===================================================
	if( isset($_GET["v"]) and $_GET["v"] !== "" ){
		$get_opcion = $_GET["v"];
			
		switch ($get_opcion) {
			
			case 'index':
					view_Index($sex);
				break;
			case 'agregar':
					view_AgregarEditar($sex);
				break;
			case 'editar':
					view_AgregarEditar($sex);
				break;
			default:
				header('Location: ../errors/404.php?sesion='.$sex);  
				break;

		}

	// FUNCIONES
	// ===================================================
	}elseif( isset($_GET["p"]) and $_GET["p"] !== "" ){
		$get_opcion = $_GET["p"];
			
		switch ($get_opcion) {

			case '3bXRiADial':
					fnc_Busqueda($sex);
				break;
			case 'qxqWJubFnz':
					fnc_Agregar($sex);
				break;
			case 'Yu99PD1co1':
					fnc_Modificar($sex);
				break;
			// case '3nln0mrVbD':
			// 		fnc_Eliminar();
			// 	break;
			default:
				header('Location: ../errors/404.php?sesion='.$sex);  
				break;
		}

	}else{
		header('Location: ../errors/404.php?sesion='.$sex);  
	}

	//===========================================================================
	//	VISTAS
	//===========================================================================

	function view_Index($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$menu_activo = "mantenimiento_sectorocupacional_index";

		$get_id_sectorocupacional = $_GET["so"];

		$business_SectorOcupacional = new business_SectorOcupacional();
		$dtConsultarSectorOcupacional = $business_SectorOcupacional -> fncBusinessConsultarPorId($get_id_sectorocupacional);

		if ( count($dtConsultarSectorOcupacional) == 0 ){
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}

		include('../views/includes/header.php');
		include('../views/mod_sector_ocupacional/mod_sector_ocupacional_detalle/index.php');
		include('../views/includes/footer.php');
	}


	function view_AgregarEditar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$menu_activo = "mantenimiento_sectorocupacional_index";
		$get_id_sectorocupacional = $_GET["so"];

		$business_SectorOcupacional = new business_SectorOcupacional();
		$dtConsultarSectorOcupacional = $business_SectorOcupacional -> fncBusinessConsultarPorId($get_id_sectorocupacional);
		
		$operacion = $_GET["v"];
		if( $operacion == "editar" ){
			$get_id = $_GET["id"];

			$business_SectorOcupacionalDetalle = new business_SectorOcupacionalDetalle();
			$dtConsultarSectorOcupacionalDetalle = $business_SectorOcupacionalDetalle -> fncBusinessConsultarPorId($get_id);
			if ( count($dtConsultarSectorOcupacionalDetalle) == 0 ){
				header('Location: ../index.php?' . http_build_query($url_parametros)); 
			}
		}

		include('../views/includes/header.php');
		include('../views/mod_sector_ocupacional/mod_sector_ocupacional_detalle/add_edit.php');
		include('../views/includes/footer.php');
	}


	//===========================================================================
	//	FUNCIONES
	//===========================================================================
		
	function fnc_Busqueda($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		if( !isset($_POST["so"]) || $_POST["so"] == "" ){ $validacion_post = false; }

		if ($validacion_post == true){
			
			$post_id_sectorocupacional = $_POST["so"];

			$business_SectorOcupacionalDetalle = new business_SectorOcupacionalDetalle();
			$dtConsultarSectorOcupacionalDetalles = $business_SectorOcupacionalDetalle -> fncBusinessConsultarPorSectorOcupacional($post_id_sectorocupacional);

			include('../views/mod_sector_ocupacional/mod_sector_ocupacional_detalle/div_consultarsectorocupacionaldetalle.php');
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}

	function fnc_Agregar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		
		if( !isset($_POST["hidden_idsectorocupacional"]) || $_POST["hidden_idsectorocupacional"] == "" ){ $validacion_post = false; }

		if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["descripcion"]) ){ $validacion_post = false; }
		if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		$get_id_sectorocupacional = $_POST["hidden_idsectorocupacional"];

		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_SectorOcupacionalDetalle = new data_SectorOcupacionalDetalle();
			$data_SectorOcupacionalDetalle->setIdSectorOcupacional( $_POST["hidden_idsectorocupacional"] );

			$data_SectorOcupacionalDetalle->setVarNombre( fncCodificarTexto($_POST["nombre"]) );
			$data_SectorOcupacionalDetalle->setVarDescripcion( fncCodificarTexto($_POST["descripcion"]) );
			$data_SectorOcupacionalDetalle->setBitActivo( $_POST["activo"] );

			$business_SectorOcupacionalDetalle = new business_SectorOcupacionalDetalle();
			$bolAgregarSectorOcupacionalDetalle = $business_SectorOcupacionalDetalle -> fncBusinessAgregar($data_SectorOcupacionalDetalle);

			if($bolAgregarSectorOcupacionalDetalle){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			$url_parametros['so'] = $get_id_sectorocupacional;
			header('Location: ../modules/sector_ocupacional_detalle.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	
	}

	function fnc_Modificar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["hidden_idsectorocupacionaldetalle"]) || $_POST["hidden_idsectorocupacionaldetalle"] == "" ){ $validacion_post = false; }

		if( !isset($_POST["hidden_idsectorocupacional"]) || $_POST["hidden_idsectorocupacional"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["descripcion"]) ){ $validacion_post = false; }
		if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		$get_id_sectorocupacional = $_POST["hidden_idsectorocupacional"];

		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_SectorOcupacionalDetalle = new data_SectorOcupacionalDetalle();
			$data_SectorOcupacionalDetalle->setIdSectorOcupacionalDetalle( $_POST["hidden_idsectorocupacionaldetalle"] );
			$data_SectorOcupacionalDetalle->setIdSectorOcupacional( $_POST["hidden_idsectorocupacional"] );
			$data_SectorOcupacionalDetalle->setVarNombre( fncCodificarTexto($_POST["nombre"]) );
			$data_SectorOcupacionalDetalle->setVarDescripcion( fncCodificarTexto($_POST["descripcion"]) );
			$data_SectorOcupacionalDetalle->setBitActivo( $_POST["activo"] );

			$business_SectorOcupacionalDetalle = new business_SectorOcupacionalDetalle();
			$bolModificarSectorOcupacionalDetalle = $business_SectorOcupacionalDetalle -> fncBusinessModificar($data_SectorOcupacionalDetalle);

			if($bolModificarSectorOcupacionalDetalle){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro modificado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se modificó el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			$url_parametros['so'] = $get_id_sectorocupacional;
			header('Location: ../modules/sector_ocupacional_detalle.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}

	// function fnc_Eliminar()
	// {
	// 	@session_start();
	// 	$validacion_post = true;

	// 	if( !isset($_GET["so"]) || $_GET["so"] == "" ){ $validacion_post = false; }
	// 	if( !isset($_GET["id"]) || $_GET["id"] == "" ){ $validacion_post = false; }

	// 	$get_id_sectorocupacional = $_GET["so"];
	// 	$get_id_sectorocupacional_antecedente = $_GET["id"];

	// 	$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
	// 	$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
	// 	if ($validacion_post == true){

	// 		$business_SectorOcupacional = new business_SectorOcupacional();
	// 		$dtConsultarEgresado = $business_SectorOcupacional -> fncBusinessConsultarPorId($get_id_sectorocupacional);

	// 		if ( count($dtConsultarEgresado) == 0 ){
	// 			header('Location: ../index.php');
	// 		}

	// 		$business_SectorOcupacionalDetalle = new business_SectorOcupacionalDetalle();
	// 		$bolEliminarSectorOcupacionalDetalle = $business_SectorOcupacionalDetalle -> fncBusinessEliminar($get_id_sectorocupacional_antecedente);

	// 		if($bolEliminarSectorOcupacionalDetalle){
	// 			$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
	// 			$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro eliminado con éxito";		
	// 		}else{
	// 			$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
	// 			$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se eliminó el registro. Inténtelo nuevamente.";		
	// 		}

	// 		header('Location: ../modules/antecedente.php?v=index&so='.$get_id_sectorocupacional);
	// 	}else{
	// 		header('Location: ../index.php');
	// 	}	

	// }


?>