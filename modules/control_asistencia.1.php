<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_ControlAsistencia.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Persona.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_ControlAsistencia.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_sms.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Persona.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/complements/funciones.php');
	



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
            case 'control':
                    view_ControlarAsitencia();
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
					fnc_Agregar();
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
		//@session_start();
       // $menu_activo = "mantenimiento_empresas_index";
		// $business_Evento = new business_Evento();
		// $dtListarEventos = $business_Evento -> fncBusinessListarEventos();
		// include('../views/includes/header.php');
		// include('../views/mod_evento/index.php');
		// include('../views/includes/footer.php');
	}
    function view_ControlarAsitencia(){

        $get_id = base64_decode($_GET["id"]);
        $businessControlAsistencia = new business_ControlAsistencia();
		$dtConsultarEvento = $businessControlAsistencia -> fncBusinessConsultarPorId($get_id);
	
		
		include('../views/includes/control_asistencia_header.php');
		include('../views/mod_control_Asistencia/index.php');
		include('../views/includes/control_asistencia_footer.php');

        
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

	function fnc_Agregar()
	{


		$codEvento 		= $_GET['di'];		
		$codQr		 	= $_GET['qr']; //Ny85    el fomrato es  
		$qR 			= base64_decode ($codQr);// /9							"/71391320"
		$qR				= base64_decode($codEvento).$qR;		// 				5/71391320
		$entradaSalida = $_GET["entradaSalida"];




		//echo($qR);
		$qR 			= explode("/",$qR);
		$FechaInicio 	= $_GET['InicioFecha'];
		$FechaFin 		= $_GET['FinFecha'];
		

		// buscando id del dni

		$data_persona= new data_Persona();
		$business_Persona = new business_Persona();
		$dni = $qR[1];
		$data_persona-> setVarDni($dni);		
		$dtConsultarIdPorDni = $business_Persona -> fncBusinessBuscarIdPorDni($data_persona);
		$qR[1] = $dtConsultarIdPorDni[0]['IdPersona'];

		//echo($dtConsultarIdPorDni[0]['Nombre'].$dtConsultarIdPorDni[0]['IdPersona']);
		//echo($dni);

		// fin buscando id del dni

		
		if ($qR[0] == base64_decode($codEvento)) {
			
																						// $qR[0],$qR[1]    identificador para evento, identificador para usuario
			$businessControlAsistencia = new business_ControlAsistencia();
			$dtConsultarRegistro = $businessControlAsistencia -> fncBusinessBuscarRegistro($qR[0],$qR[1]); //busqueda de algun registro de inscripcion tabla REGISTRO
			if (count ($dtConsultarRegistro) == 0) {
			
				echo("No esta inscrito al evento $qR[0] --- $qR[1] ");
												// idevento ----  idusuario
			} else {
				
				$dtConsultarFechaHora = $businessControlAsistencia -> fncBusinessObtenerFechaHora();
				$Fecha = $dtConsultarFechaHora[0]["Fecha"];
				$Verificacion = fnc_RevisarFechaEntreRangos($FechaInicio,$FechaFin,$Fecha);
				
				if ($Verificacion) { // si esta dentro del rango de fechas  true/false
					
					$IdUltimoResgistro ="";
					$dtConsultarRegistroExistente = $businessControlAsistencia -> fncBusinessObtenerRegistroIdPersonaIdEvento($qR[1],$qR[0]); // verificacion de que exista alguna asistencia tabla CONTROL_REGISTRO
					if (count($dtConsultarRegistroExistente)>0) { //si ecnutra almenos un registro
						$contarregistros = 0;
						foreach ($dtConsultarRegistroExistente as $key => $RegistrosExistentes) {	
								$registroFechaExistente= $RegistrosExistentes["FechaAsistencia"];		
							
								if ( $registroFechaExistente === $Fecha) {
									$contarregistros++;		
								} 
								$IdUltimoResgistro = $RegistrosExistentes["IdControlAsistencia"]; //ultimo registro del control de asistenci atabla CONTROL ASISTEnCIA
						}
						if ($contarregistros == 0) {							
							$respuestas = fnc_InsertarRegistroAsistencia($qR[1],$qR[0]);
							echo ("Gracias por volver");
						} else {			
							if ($entradaSalida == 1) {
								$respuesta = fnc_InsertarRegistroAsistenciaSalida($IdUltimoResgistro);
								echo("salida".$IdUltimoResgistro);
							} else {
								echo("repetido");
							}
											
							
						}					
						
					} else {
							$respuestas = fnc_InsertarRegistroAsistencia($qR[1],$qR[0]);
							echo("Bienvenido al Evento $respuestas");
						}
									
				} else {
					echo("fecha esta fuera del rango");
				}
				
				//echo("$Verificacion w $Fecha 00 $FechaInicio 00 $FechaFin ");
			}
			
		} else {
				echo ("El usuario no pertence a este evento $qR[0] ");
		}
		////////////
		//$qR = explode("/",$qR);
		// if ($qR[0] == base64_decode($codEvento)) {
		// 	echo("Pertenece a este Evento $qR /// base64_decode($codEvento)");
			
		// } else {
		// 	echo("no Pertenece a este Evento $qR[0] ///// base64_decode($codEvento)");
		// }
		

		//echo(base64_encode("1/5"));	


		// @session_start();
		// $url_parametros['sesion'] = $sex;
		// $validacion_post = true;

		// if( !isset($_POST["sector"]) || $_POST["sector"] == "" ){ $validacion_post = false; }
		// if( !isset($_POST["ruc"]) || $_POST["ruc"] == "" ){ $validacion_post = false; }
		// if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }
		// if( !isset($_POST["direccion"]) ){ $validacion_post = false; }
		// if( !isset($_POST["telefono"]) ){ $validacion_post = false; }
		// if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		// $_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		// $_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		// if ($validacion_post == true){

		// 	$data_Empresa = new data_Empresa();
		// 	$data_Empresa->setIdSectorOcupacionalDetalle( $_POST["sector"] );
		// 	$data_Empresa->setVarNombre( fncCodificarTexto($_POST["nombre"]) );
		// 	$data_Empresa->setVarDireccion( fncCodificarTexto($_POST["direccion"]) );
		// 	$data_Empresa->setVarTelefono( fncCodificarTexto($_POST["telefono"]) );
		// 	$data_Empresa->setVarRuc( fncCodificarTexto($_POST["ruc"]) );
		// 	$data_Empresa->setBitActivo( $_POST["activo"] );
			
		// 	$business_Empresa = new business_Empresa();
		// 	$bolAgregarEmpresa = $business_Empresa -> fncBusinessAgregar($data_Empresa);

		// 	if($bolAgregarEmpresa){
		// 		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
		// 		$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";		
		// 	}else{
		// 		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
		// 		$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro el registro. Inténtelo nuevamente.";		
		// 	}
		// 	$url_parametros['v'] = 'index';
		// 	header('Location: ../modules/empresa.php?' . http_build_query($url_parametros)); 
		// }else{
		// 	header('Location: ../index.php?' . http_build_query($url_parametros)); 
		// }	
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

	function fnc_RevisarFechaEntreRangos ($fecha_inicio, $fecha_fin, $fecha){

		$fecha_inicio = strtotime($fecha_inicio);
		$fecha_fin = strtotime($fecha_fin);
		$fecha = strtotime($fecha);

		if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin))
			return true;
		else
			return false;
	}
	function fnc_InsertarRegistroAsistencia ($IdPersona , $IdEvento){

		$data_ControlAsistencia = new data_ControlAsistencia();
		$data_ControlAsistencia->setIdEvento($IdEvento);
		$data_ControlAsistencia->setIdPersona($IdPersona);
		$businessControlAsistencia = new business_ControlAsistencia();
		$bolAgregarControlAsistencia = $businessControlAsistencia->fncBusinessAgregarControlAsistencia($data_ControlAsistencia);

		return $bolAgregarControlAsistencia;


	}

	function fnc_InsertarRegistroAsistenciaSalida ($Ultimoregistro){

		$data_ControlAsistencia = new data_ControlAsistencia();
		$data_ControlAsistencia->setIdControlAsistecia($Ultimoregistro);
		//$data_ControlAsistencia->setIdPersona($IdPersona);
		$businessControlAsistencia = new business_ControlAsistencia();
		$bolAgregarControlAsistenciaSalida = $businessControlAsistencia->fncBusinessAgregarControlAsistenciaSalida($data_ControlAsistencia);

		return $bolAgregarControlAsistenciaSalida;


	}
	





?>