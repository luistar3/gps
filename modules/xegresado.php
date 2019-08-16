<?php  
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Egresado.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_Usuario.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_Egresado.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_EgresadoAntecedente.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_GradoAcademico.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEgresado/business_TituloAcademico.php');
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
		// $sex = $_GET['sesion'];
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
			case 'divConsultarEgresado':
					view_divConsultarEgresado($sex);
				break;
			case 'divBuscarAntecedentes':
					view_divBuscarAntecedentes($sex);
				break;
			default:
				header('Location: ../errors/404.php?sesion='.$sex);  
				break;

		}

	// FUNCIONES
	// ===================================================
	}elseif( isset($_GET["p"]) and $_GET["p"] !== "" ){
		// $sex = $_GET['sesion'];
		$get_opcion = $_GET["p"];
			
		switch ($get_opcion) {

			case 'YM78VPSv6V':
					fnc_AsignarBusquedaEgresado($sex);
				break;
			case 'cI8oWtap2J':
					fnc_Busqueda($sex);
				break;
			case 'CEYDy3ZNdH':
					fnc_Agregar($sex);
				break;
			case 'HZ7C6xjnP5':
					fnc_Modificar($sex);
				break;
			case 'VToiyAhYBR':
					fnc_ExportarSet($sex);
				break;
			case '78fzObwYUv':
					fnc_Exportar($sex);
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

		$business_GradoAcademico = new business_GradoAcademico();
		$dtConsultarGradoAcademicoActivos = $business_GradoAcademico -> fncBusinessConsultarActivos();

		$business_SectorOcupacionalDetalle = new business_SectorOcupacionalDetalle();
		$dtConsultarSectorOcupacionalDetalleActivos = $business_SectorOcupacionalDetalle -> fncBusinessConsultarActivos();

		$business_Usuario = new business_Usuario();
		$dtConsultarDependenciasUsuario = $business_Usuario -> fncBusinessConsultarDependenciasUsuario($_SESSION['usuario']["ses_USRId"]);

		include('../views/includes/header.php');
		include('../views/mod_egresado/index.php');
		include('../views/includes/footer.php');
	}

	function view_AgregarEditar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$menu_activo = "egresados_index";

		// unset($_SESSION['egresado']);
		$business_GradoAcademico = new business_GradoAcademico();
		$dtConsultarGradoAcademicoActivos = $business_GradoAcademico -> fncBusinessConsultarActivos();

		$business_TituloAcademico = new business_TituloAcademico();
		$dtConsultarTituloAcademicoActivos = $business_TituloAcademico -> fncBusinessConsultarActivos();

		$business_Usuario = new business_Usuario();
		$dtConsultarDependenciasUsuario = $business_Usuario -> fncBusinessConsultarDependenciasUsuario($_SESSION['usuario']["ses_USRId"]);

		$operacion = $_GET["v"];
		if( $operacion == "editar" ){
			$get_id = $_GET["id"];

			$business_Egresado = new business_Egresado();
			$dtConsultarEgresado = $business_Egresado -> fncBusinessConsultarPorId($get_id, $_SESSION['usuario']["ses_USRId"]);
			if ( count($dtConsultarEgresado) == 0 ){
				header('Location: ../index.php?' . http_build_query($url_parametros));
			}
		}

		include('../views/includes/header.php');
		include('../views/mod_egresado/add_edit.php');
		include('../views/includes/footer.php');
	}

	function view_divConsultarEgresado($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		if( !isset($_POST["idptadependenciafijo"]) ){ $validacion_post = false; }
		if( !isset($_POST["coduniv"]) ){ $validacion_post = false; }
		if( !isset($_POST["nombre_apellido"]) ){ $validacion_post = false; }

		$post_idptadependenciafijo 				= $_POST["idptadependenciafijo"];
		$post_coduniv 				= $_POST["coduniv"];
		$post_nombreapellido 	= $_POST["nombre_apellido"];

		if($post_coduniv == ""){ $post_coduniv = -1; }

		if ($validacion_post == true){
			$business_Egresado = new business_Egresado();
			$dtConsultarEgresados = $business_Egresado -> fncBusinessConsultarEgresados($post_coduniv, $post_nombreapellido, $post_idptadependenciafijo);
			include('../views/mod_egresado/div_consultaregresado.php');
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros));
		}		

	}

	function view_divBuscarAntecedentes($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		if( !isset($_POST["id_egresado"]) ){ $validacion_post = false; }

		$post_id_egresado 				= $_POST["id_egresado"];

		if ($validacion_post == true){
			$business_EgresadoAntecedente = new business_EgresadoAntecedente();
			$dtConsultarEgresadoAntecedentes = $business_EgresadoAntecedente -> fncBusinessConsultarPorEgresado($post_id_egresado, $_SESSION['usuario']["ses_USRId"]);
			include('../views/mod_egresado/div_buscarantecedentes.php');
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros));
		}		

	}

	//===========================================================================
	//	FUNCIONES
	//===========================================================================

	function fnc_Busqueda($sex)
	{
			// $args = array(
			// 	'num' => 1,
			// 	'the_title' => 2
			// );
			// header('Location: ../modules/mod_egresado/index.php?' . http_build_query($args)); 
		$url_parametros['sesion'] = $sex;
		@session_start();
		$validacion_post = true;

		if( !isset($_POST["idptadependenciafijo"]) ){ $validacion_post = false; }
		if( !isset($_POST["nombre_apellido"]) ){ $validacion_post = false; }
		if( !isset($_POST["dni"]) ){ $validacion_post = false; }
		if( !isset($_POST["edad"]) ){ $validacion_post = false; }
		if( !isset($_POST["grado_academico"]) ){ $validacion_post = false; }
		if( !isset($_POST["sector_ocupacional"]) ){ $validacion_post = false; }

		if ($validacion_post == true){

			$post_idptadependenciafijo 				= $_POST["idptadependenciafijo"];
			$post_nombre_apellido 		= $_POST["nombre_apellido"];
			$post_dni 								= $_POST["dni"];
			$post_edad 								= $_POST["edad"];
			$post_grado_academico 		= $_POST["grado_academico"];
			$post_sector_ocupacional 	= $_POST["sector_ocupacional"];

			if($post_edad == ""){$post_edad=-1;}
			if($post_grado_academico == ""){$post_grado_academico=-1;}
			if($post_sector_ocupacional == ""){$post_sector_ocupacional=-1;}

			$business_Egresado = new business_Egresado();
			$dtConsultarEgresados = $business_Egresado -> fncBusinessConsultar(
				$post_idptadependenciafijo,
				$post_nombre_apellido,
				$post_dni,
				$post_edad,
				$post_grado_academico,
				$post_sector_ocupacional
			);

			include('../views/mod_egresado/div_buscaregresados.php');
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}
	
	function fnc_ExportarSet($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		$response = array();
		$response['mensaje'] = false;

		if( !isset($_POST["nombre_apellido"]) ){ $validacion_post = false; }
		if( !isset($_POST["dni"]) ){ $validacion_post = false; }
		if( !isset($_POST["edad"]) ){ $validacion_post = false; }
		if( !isset($_POST["grado_academico"]) ){ $validacion_post = false; }
		if( !isset($_POST["sector_ocupacional"]) ){ $validacion_post = false; }

		if ($validacion_post == true){
			unset($_SESSION['reporte_egresados']); 

			$post_nombre_apellido 		= $_POST["nombre_apellido"];
			$post_dni 								= $_POST["dni"];
			$post_edad 								= $_POST["edad"];
			$post_grado_academico 		= $_POST["grado_academico"];
			$post_sector_ocupacional 	= $_POST["sector_ocupacional"];

			$_SESSION['reporte_egresados']['nombre_apellido'] = $post_nombre_apellido;
			$_SESSION['reporte_egresados']['dni'] = $post_dni;
			$_SESSION['reporte_egresados']['edad'] = $post_edad;
			$_SESSION['reporte_egresados']['grado_academico'] = $post_grado_academico;
			$_SESSION['reporte_egresados']['sector_ocupacional'] = $post_sector_ocupacional;

			$response['mensaje'] = true;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);			
		}else{
			// $response['mensaje'] = false;
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}
		
	}

	function fnc_Exportar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_SESSION['reporte_egresados']["nombre_apellido"]) ){ $validacion_post = false; }
		if( !isset($_SESSION['reporte_egresados']["dni"]) ){ $validacion_post = false; }
		if( !isset($_SESSION['reporte_egresados']["edad"]) ){ $validacion_post = false; }
		if( !isset($_SESSION['reporte_egresados']["grado_academico"]) ){ $validacion_post = false; }
		if( !isset($_SESSION['reporte_egresados']["sector_ocupacional"]) ){ $validacion_post = false; }

		if ($validacion_post == true){

			$post_nombre_apellido 		= $_SESSION['reporte_egresados']["nombre_apellido"];
			$post_dni 								= $_SESSION['reporte_egresados']["dni"];
			$post_edad 								= $_SESSION['reporte_egresados']["edad"];
			$post_grado_academico 		= $_SESSION['reporte_egresados']["grado_academico"];
			$post_sector_ocupacional 	= $_SESSION['reporte_egresados']["sector_ocupacional"];

			if($post_edad == ""){$post_edad=-1;}
			if($post_grado_academico == ""){$post_grado_academico=-1;}
			if($post_sector_ocupacional == ""){$post_sector_ocupacional=-1;}

			$business_Egresado = new business_Egresado();
			$dtConsultarEgresados = $business_Egresado -> fncBusinessConsultar(
				$_SESSION['usuario']["ses_IdPtaDependenciaFijo"],
				$post_nombre_apellido,
				$post_dni,
				$post_edad,
				$post_grado_academico,
				$post_sector_ocupacional
			);

			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Reporte_Egresados.xls");
			header("Pragma: no-cache");
			header("Expires: 0");

			include('../views/mod_egresado/excel.php');
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}

	function fnc_AsignarBusquedaEgresado($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		$response = array();

		if( !isset($_POST["coduniv"]) ){ $validacion_post = false; }
		if( !isset($_POST["itemest"]) ){ $validacion_post = false; }
		if( !isset($_POST["idsem"]) ){ $validacion_post = false; }

		if ($validacion_post == true){

			$post_coduniv = $_POST["coduniv"];
			$post_itemest = $_POST["itemest"];
			$post_idsem 	= $_POST["idsem"];

			$business_Egresado = new business_Egresado();
			$dtConsultarEgresados = $business_Egresado -> fncBusinessBuscarInformacionEgresado($post_coduniv, $post_itemest, $post_idsem);

			if ( count($dtConsultarEgresados) > 0 ){
				// $_SESSION["egresado"]["CodUniv"] 		= $dtConsultarEgresados[0]['CodUniv'];
				// $_SESSION["egresado"]["ItemEst"] 		= $dtConsultarEgresados[0]['ItemEst'];
				// $_SESSION["egresado"]["Nombres"] 		= $dtConsultarEgresados[0]['Nombres'];
				// $_SESSION["egresado"]["Apellidos"]	= $dtConsultarEgresados[0]['Apellidos'];
				// $_SESSION["egresado"]["Dni"] 				= $dtConsultarEgresados[0]['Dni'];
				// $_SESSION["egresado"]["IdSem"] 			= $dtConsultarEgresados[0]['IdSem'];
				// $_SESSION["egresado"]["Semestre"] 	= $dtConsultarEgresados[0]['Semestre'];

				$response["CodUniv"] 		= $dtConsultarEgresados[0]['CodUniv'];
				$response["ItemEst"] 		= $dtConsultarEgresados[0]['ItemEst'];
				$response["Nombres"] 		= $dtConsultarEgresados[0]['Nombres'];
				$response["Apellidos"]	= $dtConsultarEgresados[0]['Apellidos'];
				$response["Dni"] 				= $dtConsultarEgresados[0]['Dni'];
				$response["IdSem"] 			= $dtConsultarEgresados[0]['IdSem'];
				$response["Semestre"] 	= $dtConsultarEgresados[0]['Semestre'];

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

		if( !isset($_POST["hidden_coduniv"]) || $_POST["hidden_coduniv"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["hidden_itemest"]) || $_POST["hidden_itemest"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["hidden_idsem"]) || $_POST["hidden_idsem"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["dni"]) || $_POST["dni"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["destacado"]) || $_POST["destacado"] == "" ){ $validacion_post = false; }

		if( !isset($_POST["edad"]) || $_POST["edad"] == "" ){ $validacion_post = false; }		
		if( !isset($_POST["fecha_nacimiento"]) ){ $validacion_post = false; }
		if( !isset($_POST["telefono_celular"]) ){ $validacion_post = false; }
		if( !isset($_POST["telefono_fijo"]) ){ $validacion_post = false; }
		if( !isset($_POST["domicilio_real"]) ){ $validacion_post = false; }
		if( !isset($_POST["domicilio_procesal"]) ){ $validacion_post = false; }
		if( !isset($_POST["email"]) ){ $validacion_post = false; }
		if( !isset($_POST["fecha_ingreso"]) ){ $validacion_post = false; }
		if( !isset($_POST["fecha_egreso"]) ){ $validacion_post = false; }
		if( !isset($_POST["grado_academico"]) ){ $validacion_post = false; }
		if( !isset($_POST["fecha_grado_academico"]) ){ $validacion_post = false; }
		if( !isset($_POST["titulo_academico"]) ){ $validacion_post = false; }
		if( !isset($_POST["fecha_titulo_academico"]) ){ $validacion_post = false; }
		
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_Egresado = new data_Egresado();
			$data_Egresado->setCodUniv( $_POST["hidden_coduniv"] );
			$data_Egresado->setItemEst( $_POST["hidden_itemest"] );
			$data_Egresado->setIdsem( $_POST["hidden_idsem"] );
			$data_Egresado->setBitDestacado( $_POST["destacado"] );
			$data_Egresado->setDatNacimiento( fncFormatearFecha($_POST["fecha_nacimiento"]) );
			$data_Egresado->setVarDNI( fncCodificarTexto($_POST["dni"]) );
			$data_Egresado->setVarDomicilioReal( fncCodificarTexto($_POST["domicilio_real"]) );
			$data_Egresado->setVarDomicilioProcesal( fncCodificarTexto($_POST["domicilio_procesal"]) );
			$data_Egresado->setIntEdad( fncCodificarTexto($_POST["edad"]) );
			$data_Egresado->setVarTelefonoCelular( fncCodificarTexto($_POST["telefono_celular"]) );
			$data_Egresado->setVarTelefonoFijo( fncCodificarTexto($_POST["telefono_fijo"]) );
			$data_Egresado->setVarEmail( fncCodificarTexto($_POST["email"]) );
			$data_Egresado->setDatIngresoUniversidad( fncFormatearFecha($_POST["fecha_ingreso"]) );
			$data_Egresado->setDatEgresoUniversidad( fncFormatearFecha($_POST["fecha_egreso"]) );
			$data_Egresado->setIdGradoAcademico( $_POST["grado_academico"] );
			$data_Egresado->setDatGradoAcademico( fncFormatearFecha($_POST["fecha_grado_academico"]) );
			$data_Egresado->setIdTituloAcademico( $_POST["titulo_academico"] );
			$data_Egresado->setDatTitulacion( fncFormatearFecha($_POST["fecha_titulo_academico"]) );

			$business_Egresado = new business_Egresado();
			$bolAgregarEgresado = $business_Egresado -> fncBusinessAgregar($data_Egresado);

			if($bolAgregarEgresado){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			header('Location: ../modules/egresado.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	
	}

	function fnc_Modificar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["hidden_idegresado"]) || $_POST["hidden_idegresado"] == "" ){ $validacion_post = false; }

		if( !isset($_POST["destacado"]) || $_POST["destacado"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["dni"]) || $_POST["dni"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["edad"]) || $_POST["edad"] == "" ){ $validacion_post = false; }		
		if( !isset($_POST["fecha_nacimiento"]) ){ $validacion_post = false; }
		if( !isset($_POST["telefono_celular"]) ){ $validacion_post = false; }
		if( !isset($_POST["telefono_fijo"]) ){ $validacion_post = false; }
		if( !isset($_POST["domicilio_real"]) ){ $validacion_post = false; }
		if( !isset($_POST["domicilio_procesal"]) ){ $validacion_post = false; }
		if( !isset($_POST["email"]) ){ $validacion_post = false; }
		if( !isset($_POST["fecha_ingreso"]) ){ $validacion_post = false; }
		if( !isset($_POST["fecha_egreso"]) ){ $validacion_post = false; }
		if( !isset($_POST["grado_academico"]) ){ $validacion_post = false; }
		if( !isset($_POST["fecha_grado_academico"]) ){ $validacion_post = false; }
		if( !isset($_POST["titulo_academico"]) ){ $validacion_post = false; }
		if( !isset($_POST["fecha_titulo_academico"]) ){ $validacion_post = false; }
		
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_Egresado = new data_Egresado();
			$data_Egresado->setIdEgresado( $_POST["hidden_idegresado"] );
			$data_Egresado->setBitDestacado( $_POST["destacado"] );
			$data_Egresado->setDatNacimiento( fncFormatearFecha($_POST["fecha_nacimiento"]) );
			$data_Egresado->setVarDNI( fncCodificarTexto($_POST["dni"]) );
			$data_Egresado->setVarDomicilioReal( fncCodificarTexto($_POST["domicilio_real"]) );
			$data_Egresado->setVarDomicilioProcesal( fncCodificarTexto($_POST["domicilio_procesal"]) );
			$data_Egresado->setIntEdad( fncCodificarTexto($_POST["edad"]) );
			$data_Egresado->setVarTelefonoCelular( fncCodificarTexto($_POST["telefono_celular"]) );
			$data_Egresado->setVarTelefonoFijo( fncCodificarTexto($_POST["telefono_fijo"]) );
			$data_Egresado->setVarEmail( fncCodificarTexto($_POST["email"]) );
			$data_Egresado->setDatIngresoUniversidad( fncFormatearFecha($_POST["fecha_ingreso"]) );
			$data_Egresado->setDatEgresoUniversidad( fncFormatearFecha($_POST["fecha_egreso"]) );
			$data_Egresado->setIdGradoAcademico( $_POST["grado_academico"] );
			$data_Egresado->setDatGradoAcademico( fncFormatearFecha($_POST["fecha_grado_academico"]) );
			$data_Egresado->setIdTituloAcademico( $_POST["titulo_academico"] );
			$data_Egresado->setDatTitulacion( fncFormatearFecha($_POST["fecha_titulo_academico"]) );

			$business_Egresado = new business_Egresado();
			$bolAgregarEgresado = $business_Egresado -> fncBusinessModificar($data_Egresado);

			if($bolAgregarEgresado){
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro modificado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se modificó el registro. Inténtelo nuevamente.";		
			}
			$url_parametros['v'] = 'index';
			header('Location: ../modules/egresado.php?' . http_build_query($url_parametros)); 
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}



?>