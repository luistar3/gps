<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_TipoEvento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_TipoEvento.php');
	



    // VERIFICAR PERMISO DEL MODULO
	// @session_start();
	// $url_parametros['sesion'] = $sex;
	// $business_Usuario = new business_Usuario();
	// $dtConsultarPermisoModulo = $business_Usuario -> fncBusinessConsultarPermisoModulo($_SESSION['usuario']["ses_USRId"], 'btnEmpresas');
	// if ( count($dtConsultarPermisoModulo) == 0 ){
	// 	$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
	// 	$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
	// 	$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "El Usuario no tiene permiso a este módulo.";
	// 	header('Location: ../index.php?' . http_build_query($url_parametros)); 
	// 	exit();
	// }

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
			case 'editar':
					view_AgregarEditar();
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

			case 'J9Y0B7rh86':
					fnc_Busqueda($sex);
				break;
			case 'xZ6rQTOHxk':
					fnc_Agregar($sex);
				break;
			case 'uctftGr4Jm':
					fnc_Modificar($sex);
				break;
			case 'UkUELwv6kL':
					fnc_VerificarRuc($sex);
				break;
			case 'Q6SwcynHWV':
					fnc_VerificarSesionRuc($sex);
				break;
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

	function view_Index()
	{
		@session_start();
        $menu_activo = "mantenimiento_tipo_empresa_index";
		$business_TipoEvento = new business_TipoEvento();
		$dtListarTipoEventos = $business_TipoEvento -> fncBusinessListarTipoEventos();
		include('../views/includes/header.php');
		include('../views/mod_tipo_evento/index.php');
		include('../views/includes/footer.php');
	}

	function view_AgregarEditar()
	{
        //@session_start();
        //$url_parametros['sesion'] = $sex;
        //$menu_activo = "mantenimiento_empresas_index";
		//unset($_SESSION['empresa']);

		// $business_SectorOcupacionalDetalle = new business_SectorOcupacionalDetalle();
		// $dtConsultarSectorOcupacionalDetalleActivos = $business_SectorOcupacionalDetalle -> fncBusinessConsultarActivos();


		// $operacion = $_GET["v"];
		// if( $operacion == "editar" ){
		// 	$get_id = $_GET["id"];

		// 	$business_Empresa = new business_Empresa();
		// 	$dtConsultarEmpresa = $business_Empresa -> fncBusinessConsultarPorId($get_id);
		// 	if ( count($dtConsultarEmpresa) == 0 ){
		// 		header('Location: ../index.php?' . http_build_query($url_parametros)); 
		// 	}
        // }
     

		include('../views/includes/header.php');
		include('../views/mod_evento/add_edit.php');
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

		if ($validacion_post == true){
			$business_Empresa = new business_Empresa();
			$dtConsultarEmpresas = $business_Empresa -> fncBusinessConsultar();

			include('../views/mod_empresa/div_consultarempresa.php');

		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}
	
	function fnc_VerificarRuc($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		$response = array();
		$response['mensaje'] = false;

		unset($_SESSION['empresa']);
		$_SESSION['empresa']['rucvalidado'] = false;

		if( !isset($_POST["ruc"]) || $_POST["ruc"] == "" ){ $validacion_post = false; }

		if ($validacion_post == true){
			$data_Empresa = new data_Empresa();
			$data_Empresa->setVarRuc( fncCodificarTexto($_POST["ruc"]) );

			$business_Empresa = new business_Empresa();
			$dtConsultarEmpresas = $business_Empresa -> fncBusinessVerificarRuc($data_Empresa);

			if ( count($dtConsultarEmpresas) == 0 ){
				$response['mensaje'] = true;
				$_SESSION['empresa']['rucvalidado'] = true;
			}else{
				$response['mensaje'] = false;
				$_SESSION['empresa']['rucvalidado'] = false;
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);	
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}

	function fnc_VerificarSesionRuc($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		$response = array();
		$response['mensaje'] = false;

		if( !isset($_SESSION['empresa']['rucvalidado']) || $_SESSION['empresa']['rucvalidado'] == "" ){ $validacion_post = false; }

		if ($validacion_post == true){
			if ( $_SESSION['empresa']['rucvalidado'] == true ){
				$response['mensaje'] = true;
			}else{
				$response['mensaje'] = false;
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);	
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}

	function fnc_Agregar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["sector"]) || $_POST["sector"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["ruc"]) || $_POST["ruc"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["direccion"]) ){ $validacion_post = false; }
		if( !isset($_POST["telefono"]) ){ $validacion_post = false; }
		if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_Empresa = new data_Empresa();
			$data_Empresa->setIdSectorOcupacionalDetalle( $_POST["sector"] );
			$data_Empresa->setVarNombre( fncCodificarTexto($_POST["nombre"]) );
			$data_Empresa->setVarDireccion( fncCodificarTexto($_POST["direccion"]) );
			$data_Empresa->setVarTelefono( fncCodificarTexto($_POST["telefono"]) );
			$data_Empresa->setVarRuc( fncCodificarTexto($_POST["ruc"]) );
			$data_Empresa->setBitActivo( $_POST["activo"] );
			
			$business_Empresa = new business_Empresa();
			$bolAgregarEmpresa = $business_Empresa -> fncBusinessAgregar($data_Empresa);

			if($bolAgregarEmpresa){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			header('Location: ../modules/empresa.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	
	}

	function fnc_Modificar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["hidden_idempresa"]) || $_POST["hidden_idempresa"] == "" ){ $validacion_post = false; }

		if( !isset($_POST["sector"]) || $_POST["sector"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["ruc"]) || $_POST["ruc"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["direccion"]) ){ $validacion_post = false; }
		if( !isset($_POST["telefono"]) ){ $validacion_post = false; }
		if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_Empresa = new data_Empresa();
			$data_Empresa->setIdEmpresa( $_POST["hidden_idempresa"] );
			$data_Empresa->setIdSectorOcupacionalDetalle( $_POST["sector"] );
			$data_Empresa->setVarNombre( fncCodificarTexto($_POST["nombre"]) );
			$data_Empresa->setVarDireccion( fncCodificarTexto($_POST["direccion"]) );
			$data_Empresa->setVarTelefono( fncCodificarTexto($_POST["telefono"]) );
			$data_Empresa->setVarRuc( fncCodificarTexto($_POST["ruc"]) );
			$data_Empresa->setBitActivo( $_POST["activo"] );

			$business_Empresa = new business_Empresa();
			$bolModificarEmpresa = $business_Empresa -> fncBusinessModificar($data_Empresa);

			if($bolModificarEmpresa){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro modificado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se modificó el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			header('Location: ../modules/empresa.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}



?>