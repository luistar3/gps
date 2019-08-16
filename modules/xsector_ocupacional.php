<?php  
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_SectorOcupacional.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_Usuario.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_SectorOcupacional.php');

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
			// case 'divConsultar':
			// 		view_divConsultar();
			// 	break;
			// case 'divBuscarDetalles':
			// 		view_divBuscarDetalles();
			// 	break;
			default:
				header('Location: ../errors/404.php?sesion='.$sex);  
				break;

		}

	// FUNCIONES
	// ===================================================
	}elseif( isset($_GET["p"]) and $_GET["p"] !== "" ){
		$get_opcion = $_GET["p"];
			
		switch ($get_opcion) {

			case 'xRmsuVqAfs':
					fnc_Busqueda($sex);
				break;
			case 'q6QmtYfGNx':
					fnc_Agregar($sex);
				break;
			case 'AjmyJwHUah':
					fnc_Modificar($sex);
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
		$menu_activo = "mantenimiento_sectorocupacional_index";

		include('../views/includes/header.php');
		include('../views/mod_sector_ocupacional/index.php');
		include('../views/includes/footer.php');
	}

	function view_AgregarEditar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$menu_activo = "mantenimiento_sectorocupacional_index";

		$operacion = $_GET["v"];
		if( $operacion == "editar" ){
			$get_id = $_GET["id"];

			$business_SectorOcupacional = new business_SectorOcupacional();
			$dtConsultarSectorOcupacional = $business_SectorOcupacional -> fncBusinessConsultarPorId($get_id);
			if ( count($dtConsultarSectorOcupacional) == 0 ){
				header('Location: ../index.php?' . http_build_query($url_parametros)); 
			}
		}

		include('../views/includes/header.php');
		include('../views/mod_sector_ocupacional/add_edit.php');
		include('../views/includes/footer.php');
	}

	// function view_divConsultar()
	// {
	// 	@session_start();
	// 	$validacion_post = true;
	// 	if( !isset($_POST["coduniv"]) ){ $validacion_post = false; }
	// 	if( !isset($_POST["nombre_apellido"]) ){ $validacion_post = false; }

	// 	$post_coduniv 				= $_POST["coduniv"];
	// 	$post_nombreapellido 	= $_POST["nombre_apellido"];

	// 	if($post_coduniv == ""){ $post_coduniv = -1; }

	// 	if ($validacion_post == true){
	// 		$business_Egresado = new business_Egresado();
	// 		$dtConsultarEgresados = $business_Egresado -> fncBusinessConsultarEgresados($post_coduniv, $post_nombreapellido, $_SESSION['usuario']["ses_IdPtaDependenciaFijo"]);
	// 		include('../views/mod_egresado/div_consultaregresado.php');
	// 	}else{
	// 		header('Location: ../index.php');
	// 	}		

	// }

	// function view_divBuscarDetalles()
	// {
	// 	@session_start();
	// 	$validacion_post = true;
	// 	if( !isset($_POST["id_egresado"]) ){ $validacion_post = false; }

	// 	$post_id_egresado 				= $_POST["id_egresado"];

	// 	if ($validacion_post == true){
	// 		$business_EgresadoAntecedente = new business_EgresadoAntecedente();
	// 		$dtConsultarEgresadoAntecedentes = $business_EgresadoAntecedente -> fncBusinessConsultarPorEgresado($post_id_egresado, $_SESSION['usuario']["ses_IdPtaDependenciaFijo"]);
	// 		include('../views/mod_egresado/div_buscarantecedentes.php');
	// 	}else{
	// 		header('Location: ../index.php');
	// 	}		

	// }

	//===========================================================================
	//	FUNCIONES
	//===========================================================================

	function fnc_Busqueda($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if ($validacion_post == true){
			$business_SectorOcupacional = new business_SectorOcupacional();
			$dtConsultarSectorOcupacionales = $business_SectorOcupacional -> fncBusinessConsultar();

			include('../views/mod_sector_ocupacional/div_consultarsectorocupacional.php');
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}
	

	function fnc_Agregar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["tipo"]) || $_POST["tipo"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["descripcion"]) ){ $validacion_post = false; }
		if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_SectorOcupacional = new data_SectorOcupacional();
			$data_SectorOcupacional->setVarTipo( $_POST["tipo"] );
			$data_SectorOcupacional->setVarNombre( fncCodificarTexto($_POST["nombre"]) );
			$data_SectorOcupacional->setVarDescripcion( fncCodificarTexto($_POST["descripcion"]) );
			$data_SectorOcupacional->setBitActivo( $_POST["activo"] );
			
			$business_SectorOcupacional = new business_SectorOcupacional();
			$bolAgregarSectorOcupacional = $business_SectorOcupacional -> fncBusinessAgregar($data_SectorOcupacional);

			if($bolAgregarSectorOcupacional){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			header('Location: ../modules/sector_ocupacional.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	
	}

	function fnc_Modificar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["hidden_idsectorocupacional"]) || $_POST["hidden_idsectorocupacional"] == "" ){ $validacion_post = false; }

		if( !isset($_POST["tipo"]) || $_POST["tipo"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["descripcion"]) ){ $validacion_post = false; }
		if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_SectorOcupacional = new data_SectorOcupacional();
			$data_SectorOcupacional->setIdSectorOcupacional( $_POST["hidden_idsectorocupacional"] );
			$data_SectorOcupacional->setVarTipo( $_POST["tipo"] );
			$data_SectorOcupacional->setVarNombre( fncCodificarTexto($_POST["nombre"]) );
			$data_SectorOcupacional->setVarDescripcion( fncCodificarTexto($_POST["descripcion"]) );
			$data_SectorOcupacional->setBitActivo( $_POST["activo"] );

			$business_SectorOcupacional = new business_SectorOcupacional();
			$bolModificarSectorOcupacional = $business_SectorOcupacional -> fncBusinessModificar($data_SectorOcupacional);

			if($bolModificarSectorOcupacional){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro modificado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se modificó el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			header('Location: ../modules/sector_ocupacional.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}



?>