<?php  
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_EgresadoAntecedente.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_Usuario.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_Egresado.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_EgresadoAntecedente.php');

	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_Empresa.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_TipoContrato.php');

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
	$dtConsultarPermisoModulo = $business_Usuario -> fncBusinessConsultarPermisoModulo($_SESSION['usuario']["ses_USRId"], 'btnEgresados');
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

			case 'XS4StNyoTl':
					fnc_Agregar($sex);
				break;
			case 'sVZbh6sPhN':
					fnc_Modificar($sex);
				break;
			case '5INVr7Rv6C':
					fnc_Eliminar($sex);
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

	function view_Index($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$menu_activo = "egresados_index";
		$get_id_egresado = $_GET["eg"];

		$business_Egresado = new business_Egresado();
		$dtConsultarEgresado = $business_Egresado -> fncBusinessConsultarPorId($get_id_egresado, $_SESSION['usuario']["ses_USRId"]);

		if ( count($dtConsultarEgresado) == 0 ){
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}

		$business_EgresadoAntecedente = new business_EgresadoAntecedente();
		$dtConsultarEgresadoAntecedentes = $business_EgresadoAntecedente -> fncBusinessConsultarPorEgresado($get_id_egresado, $_SESSION['usuario']["ses_USRId"]);

		include('../views/includes/header.php');
		include('../views/mod_egresado/mod_antecedente/index.php');
		include('../views/includes/footer.php');
	}

	function view_AgregarEditar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$menu_activo = "egresados_index";
		$get_id_egresado = $_GET["eg"];

		$business_TipoContrato = new business_TipoContrato();
		$dtConsultarTipoContratoActivos = $business_TipoContrato -> fncBusinessConsultarActivos();

		$business_Empresa = new business_Empresa();
		$dtConsultarEmpresaActivos = $business_Empresa -> fncBusinessConsultarActivos();

		$business_Egresado = new business_Egresado();
		$dtConsultarEgresado = $business_Egresado -> fncBusinessConsultarPorId($get_id_egresado, $_SESSION['usuario']["ses_USRId"]);
		
		$operacion = $_GET["v"];
		if( $operacion == "editar" ){
			$get_id = $_GET["id"];

			$business_EgresadoAntecedente = new business_EgresadoAntecedente();
			$dtConsultarEgresadoAntecedente = $business_EgresadoAntecedente -> fncBusinessConsultarPorId($get_id, $_SESSION['usuario']["ses_USRId"]);
			if ( count($dtConsultarEgresadoAntecedente) == 0 ){
				header('Location: ../index.php?' . http_build_query($url_parametros)); 
			}
		}

		include('../views/includes/header.php');
		include('../views/mod_egresado/mod_antecedente/add_edit.php');
		include('../views/includes/footer.php');
	}


	//===========================================================================
	//	FUNCIONES
	//===========================================================================
		 
	function fnc_Agregar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		
		if( !isset($_POST["hidden_idegresado"]) || $_POST["hidden_idegresado"] == "" ){ $validacion_post = false; }

		if( !isset($_POST["empresa"]) || $_POST["empresa"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tiempo"]) || $_POST["tiempo"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tipo_tiempo"]) || $_POST["tipo_tiempo"] == "" ){ $validacion_post = false; }		
		if( !isset($_POST["puesto"]) || $_POST["puesto"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tipo_contrato"]) || $_POST["tipo_contrato"] == "" ){ $validacion_post = false; }
		
		$get_id_egresado = $_POST["hidden_idegresado"];

		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_EgresadoAntecedente = new data_EgresadoAntecedente();
			$data_EgresadoAntecedente->setIdEgresado( $_POST["hidden_idegresado"] );

			$data_EgresadoAntecedente->setIdEmpresa( $_POST["empresa"] );
			$data_EgresadoAntecedente->setIdTipoContrato( $_POST["tipo_contrato"] );
			$data_EgresadoAntecedente->setIntTiempoLaboral( $_POST["tiempo"] );
			$data_EgresadoAntecedente->setVarTipoTiempo( fncCodificarTexto($_POST["tipo_tiempo"]) );
			$data_EgresadoAntecedente->setVarPuesto( fncCodificarTexto($_POST["puesto"]) );

			$business_EgresadoAntecedente = new business_EgresadoAntecedente();
			$bolAgregarEgresadoAntecedente = $business_EgresadoAntecedente -> fncBusinessAgregar($data_EgresadoAntecedente);

			if($bolAgregarEgresadoAntecedente){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			$url_parametros['eg'] = $get_id_egresado;
			header('Location: ../modules/antecedente.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	
	}

	function fnc_Modificar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["hidden_idegresadoantecedente"]) || $_POST["hidden_idegresadoantecedente"] == "" ){ $validacion_post = false; }

		if( !isset($_POST["empresa"]) || $_POST["empresa"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tiempo"]) || $_POST["tiempo"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tipo_tiempo"]) || $_POST["tipo_tiempo"] == "" ){ $validacion_post = false; }		
		if( !isset($_POST["puesto"]) || $_POST["puesto"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tipo_contrato"]) || $_POST["tipo_contrato"] == "" ){ $validacion_post = false; }
		
		$get_id_egresado = $_POST["hidden_idegresado"];

		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_EgresadoAntecedente = new data_EgresadoAntecedente();
			$data_EgresadoAntecedente->setIdEgresadoAntecedente( $_POST["hidden_idegresadoantecedente"] );
			$data_EgresadoAntecedente->setIdEmpresa( $_POST["empresa"] );
			$data_EgresadoAntecedente->setIdTipoContrato( $_POST["tipo_contrato"] );
			$data_EgresadoAntecedente->setIntTiempoLaboral( $_POST["tiempo"] );
			$data_EgresadoAntecedente->setVarTipoTiempo( fncCodificarTexto($_POST["tipo_tiempo"]) );
			$data_EgresadoAntecedente->setVarPuesto( fncCodificarTexto($_POST["puesto"]) );

			$business_EgresadoAntecedente = new business_EgresadoAntecedente();
			$bolModificarEgresadoAntecedente = $business_EgresadoAntecedente -> fncBusinessModificar($data_EgresadoAntecedente);

			if($bolModificarEgresadoAntecedente){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro modificado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se modificó el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			$url_parametros['eg'] = $get_id_egresado;
			header('Location: ../modules/antecedente.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}

	function fnc_Eliminar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_GET["eg"]) || $_GET["eg"] == "" ){ $validacion_post = false; }
		if( !isset($_GET["id"]) || $_GET["id"] == "" ){ $validacion_post = false; }

		$get_id_egresado = $_GET["eg"];
		$get_id_egresado_antecedente = $_GET["id"];

		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$business_Egresado = new business_Egresado();
			$dtConsultarEgresado = $business_Egresado -> fncBusinessConsultarPorId($get_id_egresado, $_SESSION['usuario']["ses_USRId"]);

			if ( count($dtConsultarEgresado) == 0 ){
				header('Location: ../index.php?' . http_build_query($url_parametros)); 
			}

			$business_EgresadoAntecedente = new business_EgresadoAntecedente();
			$bolEliminarEgresadoAntecedente = $business_EgresadoAntecedente -> fncBusinessEliminar($get_id_egresado_antecedente, $_SESSION['usuario']["ses_USRId"]);

			if($bolEliminarEgresadoAntecedente){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro eliminado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se eliminó el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			$url_parametros['eg'] = $get_id_egresado;
			header('Location: ../modules/antecedente.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}


?>