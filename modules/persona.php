<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Persona.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Persona.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Usuario.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Usuario.php');



    // VERIFICAR PERMISO DEL MODULO
	 @session_start();
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
			case 'generar':
					view_Generar();
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

			case '6x8RlHMFSK': 
					fnc_AutenticarUsuario();
				break;
			case 'J9Y0B7rh86':
					fnc_AgregarPersonaRegistrarEvento();
				break;
			case 'xZ6rQTOHxk':
					fnc_Agregar();
				break;
			case 'uctftGr4Jm':
					fnc_Modificar();
				break;
			case 'eLXzIh5jMU':
					fnc_CerrarSesion();
				break;
			case 'xP6riiTOHxk':
					fnc_buscarPersonaporApellido();
				break;
			default:
				header('Location: ../errors/404.php?sesion='.$sex);  
				break;
		}

	}else{
		header('Location: ../errors/404.php?sesion='.$sex);   
	}

	//===========================================================================
	//	VISTAS   fnc_AgregarPersonaRegistrarEvento
	//===========================================================================

	function view_Index()
	{
		@session_start();
        $menu_activo = "mantenimiento_persona_index";
		$business_Persona = new business_Persona();
		$dtListarPersonas = $business_Persona -> fncBusinessListarPersonas();
		$dtListarPersonas = utf8_converter($dtListarPersonas);
		include('../views/includes/header.php');
		include('../views/mod_persona/index.php');
		include('../views/includes/footer.php');
	}
	function view_Generar()
	{
		if ($_SESSION['usuario']["ses_IdRol"]==1 ||$_SESSION['usuario']["ses_IdRol"]==2 ){


			$menu_activo = "mantenimiento_persona_index";
		}
		else {
			$menu_activo = "mantenimiento_evento_usuario_registro";
		}
		
		
		$IdPersona = $_GET["IdPersona"];
		$nombre= $_GET["Nombre"];
		$apellido= $_GET["Apellido"];
		$dni = $_GET["Dni"];

		$bolVistaPersona = 0;
		if( isset($_GET["pal"]) ){
			$bolVistaPersona = 1;
		}else{
			$bolVistaPersona = 0;
		}

		if( !isset($_GET["Dni"]) ){
			$IdEvento = $_GET["IdEvento"];
		}else{
			$IdEvento = 0;
		}
		

		$TipoPersona = $_GET["TipoPersona"];
		if ($TipoPersona == 1) { 
			$NomTipoUsuario = "Asociado";
		}
		else {
			$NomTipoUsuario = "Invitado";
		}
		$encodeDni = base64_decode($dni);

		$encodeDni = base64_encode('/'.$encodeDni);

		$businessPersona = new business_Persona();

		$dtPersona = array();

		if( $IdEvento == 0 ){ 
			$data_Persona= new data_Persona();
			$data_Persona->setVarDni(base64_decode($_GET["Dni"]) );
			$dtPersona = $businessPersona ->fncBusinessBuscarIdPorDni($data_Persona);
		}else{
			$dtPersona = $businessPersona ->fncBusinessGenerarPorIdEvento($IdEvento);
		}

		$dtPersona = utf8_converter($dtPersona);
		$restric="";
		if (isset($_GET['restric'])) {

			$restric = $_GET['restric'];

		}
		





	   include('../views/includes/header.php');
	   include('../views/mod_persona/carnet.php');
	   include('../views/includes/footer.php');
	}

	function view_AgregarEditar()
	{
        //@session_start();
        //$url_parametros['sesion'] = $sex;
        $menu_activo = "mantenimiento_persona_index";
		//unset($_SESSION['empresa']);

		// $business_SectorOcupacionalDetalle = new business_SectorOcupacionalDetalle();
		// $dtConsultarSectorOcupacionalDetalleActivos = $business_SectorOcupacionalDetalle -> fncBusinessConsultarActivos();


		 $operacion = $_GET["v"];
		 if( $operacion == "editar" ){
			$get_id = base64_decode($_GET["IdPersona"]) ;

			$business_Persona = new business_Persona();
			$dtConsultarPersona = $business_Persona -> fncBusinessConsultarPorId($get_id);
			$dtConsultarPersona = utf8_converter($dtConsultarPersona);
			if ( count($dtConsultarPersona) == 0 ){
				header('Location: ../index.php?'); 
			}
        }
     

		include('../views/includes/header.php');
		include('../views/mod_persona/add_edit.php');
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
	
	function fnc_VerificarRuc()
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
	function fnc_CerrarSesion()
	{
		@session_start();
		unset($_SESSION['usuario']);
		// unset($_SESSION['mensaje']);
		header('Location: ../views/website/login.php');
		//header('Location: ../index.php?' . http_build_query($url_parametros)); 
	}
	function fnc_AutenticarUsuario()
	{
		// @session_start();
		// //$sex = $_GET['sesion'];
		// //$url_parametros['sesion'] = $sex;

		// $business_Usuario = new business_Usuario();
		// $dtAutenticarUsuario = $business_Usuario -> fncBusinessAutenticarUsuario($_SESSION['codper'], $_SESSION['codigo']);

		// if (count($dtAutenticarUsuario) > 0){

		// 	// if ( $dtAutenticarUsuario[0]['bitActivo'] == true){
		// 		$_SESSION['usuario']["ses_USRId"] 									= $dtAutenticarUsuario[0]['USRId'];
		// 		$_SESSION['usuario']["ses_SISid"] 									= $dtAutenticarUsuario[0]['SISid'];
		// 		$_SESSION['usuario']["ses_UsuarioNombre"] 					= $dtAutenticarUsuario[0]['varUsuarioNombre'];
		// 		// $_SESSION['usuario']["ses_UsuarioNombre"] 				= $dtAutenticarUsuario[0]['varNombres'].' '.$dtAutenticarUsuario[0]['varApellidos'];
		// 		// $_SESSION['usuario']["ses_IdPtaDependenciaFijo"] 	=	$dtAutenticarUsuario[0]['IdPtaDependenciaFijo'];
		// 		// $_SESSION['usuario']["ses_NombreDependencia"] 		=	$dtAutenticarUsuario[0]['NombreDependencia'];
		// 		$_SESSION['usuario']["ses_varNivel"] 								=	$dtAutenticarUsuario[0]['varNivel'];

		// 		// $_SESSION['usuario']["ses_ModEgresado"] 						=	$dtAutenticarUsuario[0]['ModEgresado'];
		// 		// $_SESSION['usuario']["ses_ModEmpresa"] 							=	$dtAutenticarUsuario[0]['ModEmpresa'];
		// 		// $_SESSION['usuario']["ses_ModSectorOcupacional"] 		=	$dtAutenticarUsuario[0]['ModSectorOcupacional'];

		// 		// $_SESSION['usuario']["ses_ModEgresado"] 						=	1;
		// 		// $_SESSION['usuario']["ses_ModEmpresa"] 							=	1;
		// 		// $_SESSION['usuario']["ses_ModSectorOcupacional"] 		=	0;

		// 		$_SESSION['usuario']["ses_UsuarioLogeado"] 				= true;

		// 		$_SESSION['mensaje']["ses_MensajeEstado"] 				= 0;
		// 		$_SESSION['mensaje']["ses_MensajeTipo"] 					= "";
		// 	}else{
		// 		$_SESSION['usuario']["ses_UsuarioLogeado"] = false;
		// 		$_SESSION['mensaje']["ses_MensajeEstado"] 	= 1;
		// 		$_SESSION['mensaje']["ses_MensajeTipo"] = "error";
		// 		$_SESSION['mensaje']["ses_MensajeDescripcion"] = "Usuario se encuentra inactivo";
		// 		// header('Location: ../index.php');
		// 	}

		// // }else{
		// // 	$_SESSION['usuario']["ses_UsuarioLogeado"] = false;				
		// // 	$_SESSION['mensaje']["ses_MensajeEstado"] = 1;
		// // 	$_SESSION['mensaje']["ses_MensajeTipo"] = "error";
		// // 	$_SESSION['mensaje']["ses_MensajeDescripcion"] = "Error en inicio de sesión";
		// // 	// header('Location: ../index.php');
		// // }
		// 	// echo $_SESSION['usuario']["ses_USRId"];
		// 	// exit();
		//header('Location: ../index.php?' . http_build_query($url_parametros)); 

		if( isset($_POST["usuario"]) and isset($_POST["contrasena"]) ){
			@session_start();

			$post_usuario 		= $_POST["usuario"];
			$post_contrasena 	= $_POST["contrasena"];

			$business_Persona = new business_Persona;
			//$dtBuscarUsuario = $data_Persona -> fncBusinessAutenticarUsuario();
			$data_Persona= new data_Persona();
			$data_Persona->setVarUsuario($post_usuario);
			$data_Persona->setVarClave(md5($post_contrasena));


			
			$dtAutenticarUsuario = $business_Persona -> fncBusinessAutenticarUsuario($data_Persona);
			if (count($dtAutenticarUsuario)){

				if ( $dtAutenticarUsuario[0]['Estado'] == 1){
					$_SESSION['usuario']["ses_UsuarioNombre"] 				=$dtAutenticarUsuario[0]['varNombres'].' '.$dtAutenticarUsuario[0]['varApellidos'];
					$_SESSION['usuario']["ses_TipoUsuario"] 				=$dtAutenticarUsuario[0]['TipoUsuario'];
					$_SESSION['usuario']["ses_Usuario"] 					=$dtAutenticarUsuario[0]['Usuario'];
					$_SESSION['usuario']["ses_IdUsuario"] 					=$dtAutenticarUsuario[0]['IdUsuario'];
					$_SESSION['usuario']["ses_UsuarioLogeado"] 				=true;

					$_SESSION['mensaje']["ses_MensajeEstado"] 	= 0;
					$_SESSION['mensaje']["ses_MensajeTipo"] = "";

					//echo($_SESSION['usuario']["ses_UsuarioNombre"]);

					header('Location: ../modules/index.php');
				}else{
					$_SESSION['usuario']["ses_UsuarioLogeado"] = false;
					$_SESSION['mensaje']["ses_MensajeEstado"] 	= 1;
					$_SESSION['mensaje']["ses_MensajeTipo"] = "error";
					$_SESSION['mensaje']["ses_MensajeDescripcion"] = "Usuario se encuentra inactivo";
					header('Location: ../views/website/login.php');
					//echo("no activo");
				}
					
			}else{
				$_SESSION['usuario']["ses_UsuarioLogeado"] = false;				
				$_SESSION['mensaje']["ses_MensajeEstado"] = 1;
				$_SESSION['mensaje']["ses_MensajeTipo"] = "error";
				$_SESSION['mensaje']["ses_MensajeDescripcion"] = "Error en inicio de sesión";
				header('Location: ../views/website/login.php');
			}
			//header('Location: ../index.php');
			//echo("no encontro");
		}else{
			//header('Location: ../index.php');
			//echo("no esta");
		}
	
	}
	function fnc_buscarPersonaporApellido()
	{
		@session_start();
		
		//$apellidoPaterno = $_GET['apellidoPaterno'];
		// $apellidoMaterno = $_GET['apellidoMaterno'];
		// $dni =$_GET['dni'];
		// $nombre = $_GET['nombre'];

		if ( isset($_GET['apellidoPaterno'])) {
			$apellidoPaterno = $_GET['apellidoPaterno'];
		}else {
			$apellidoPaterno = "";
		}

		if ( isset($_GET['apellidoMaterno'])) {
			$apellidoMaterno = $_GET['apellidoMaterno'];
		}else {
			$apellidoMaterno = "";
		}

		if ( isset($_GET['dni'])) {
			$dni = $_GET['dni'];
		}else {
			$dni = "";
		}

		if ( isset($_GET['nombre'])) {
			$nombre = $_GET['nombre'];
		}else {
			$nombre = "";
		}

		$businessPersona = new business_Persona();
		$dtPersona = $businessPersona -> fncBusinessConsultarPorApellido($apellidoPaterno,$apellidoMaterno,$dni,$nombre);
		$contador =0;
		$array = array();
		foreach ($dtPersona as $value) {
			$array[$contador]["Dni"] =  $value["Dni"];
			$array[$contador]["Nombre"] =  $value["Nombre"];
			$array[$contador]["ApePat"] = ($value["ApePat"]);
			$array[$contador]["ApeMat"] =  ($value["ApeMat"]);
			$array[$contador]["NombreTipo"] = ($value["NombreTipo"]);
			$array[$contador]["IdPersona"] = $value["IdPersona"];
			$array[$contador]["Estado"] = $value["Estado"];
			$array[$contador]["Celular"] = $value["Celular"];
			$array[$contador]["Correo"] = $value["Correo"];
			$contador++;

		}
		

		
		//echo json_encode($dtPersona, JSON_UNESCAPED_UNICODE);

	//	print_r($dtPersona);
		// $response = array();
        //  array_push($response, ($dtPersona));
		header('Content-Type: application/json; charset=utf-8');
		//print_r(utf8_converter($array)) ;
		 // var_dump($dtPersona);
		
		echo json_encode (utf8_converter($array));
		  //echo($nombre."*".$apellidoPaterno."*".$apellidoMaterno."*".$dni);

		//print_r($dtPersona);

	}
	function utf8_converter($array){
		array_walk_recursive($array, function(&$item, $key){
		if(!mb_detect_encoding($item, 'utf-8', true)){
		$item = utf8_encode($item);
		}
		});

		return $array;
	}
	function jsonRemoveUnicodeSequences( $struct )
	{
		return preg_replace( "/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode( $struct ) );
	}

	function fnc_AgregarPersonaRegistrarEvento()
	{
		@session_start();
		//$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_GET["dni"]) || $_GET["dni"] == "" ){ $validacion_post = false; }
		if( !isset($_GET["nombre"]) || $_GET["nombre"] == "" ){ $validacion_post = false; }		
		if( !isset($_GET["ApePat"]) || $_GET["ApePat"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["tipoPersona"]) || $_POST["tipoPersona"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["correo"]) || $_POST["correo"] == "" ){ $validacion_post = false; }
		//if( !isset($_GET["celular"]) || $_GET["celular"] == "" ){ $validacion_post = false; }		
		//if(	!isset($_POST["password"]) || $_POST["password"]==""){ $validacion_post = false;}
		if(	!isset($_GET["estadoPersona"]) || $_GET["estadoPersona"]==""){ $validacion_post = false;}
		//if(	!isset($_POST["usuario"]) || $_POST["usuario"]==""){ $validacion_post = false;}
		//if(	!isset($_POST["avatar"]) || $_POST["avatar"]==""){ $validacion_post = false;}
		// if( !isset($_POST["direccion"]) ){ $validacion_post = false; }
		// if( !isset($_POST["telefono"]) ){ $validacion_post = false; }
		// if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_Persona = new data_Persona();
			$data_Persona->setVarDni( str_replace(" ","",$_GET["dni"]) );
			$data_Persona->setVarNombre( strtoupper($_GET["nombre"] ));
			$data_Persona->setVarApellido( strtoupper($_GET["ApePat"])." ".strtoupper($_GET["ApeMat"] ));


			$data_Persona->setIdTipoPersona( 2 );
			$data_Persona->setVarCorreo( strtoupper($_GET["correo"] ));
			$data_Persona->setIntCelular( $_GET["celular"] );
			//$data_Persona->setVarClave( md5($_POST["password"]) ); 
			$data_Persona->setVarClave(md5('123456')); 
			$data_Persona->setVarEstado( $_GET["estadoPersona"] );
			$data_Persona->setVarUsuario(str_replace(" ","",$_GET["dni"]));
			$data_Persona->setVarAvatar(date("Y-m-d H:i:s").'jpg');

			$data_Persona->setApeMat(strtoupper($_GET["ApeMat"]));
			$data_Persona->setApePat(strtoupper($_GET["ApePat"]));
			$data_Persona->setEstamento(strtoupper($_GET["estamento"]));
			$data_Persona->setFechaFinContrato($_GET["fechaFin"]);
			$data_Persona->setFechaInicioContrato($_GET["fechaInicio"]);
			$data_Persona->setDependencia(strtoupper($_GET["dependencia"]));
			$data_Persona->setUnidadOrganica(strtoupper($_GET["unidadOrganica"]));
			$data_Persona->setCargo(strtoupper($_GET["cargo"]));
			$data_Persona->setDependenciaCargo(strtoupper($_GET["dependenciaCargo"]));
			$data_Persona->setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);
			
			$data_Persona->setVarDireccionIP(fncObtenerIpAdress());
			$data_Persona->setVarDireccionMAC(fncObtenerMac());
			$data_Persona->setVarNavegadorWeb(fnc_ObtenerNavegador());

			$business_PersonaInterna = new business_Persona();

			$dtListaInterna = $business_PersonaInterna -> fncBusinessConsultarDniInterno($data_Persona->getVarDni());
			if (count($dtListaInterna)) {
	
				 	$data_Persona->	setIdTipoPersona( 1 );
			}
	
			
			$business_Persona = new business_Persona();
			$dtListaDni = $business_Persona -> fncBusinessConsultarPorDni($data_Persona->getVarDni());
			
			if (count($dtListaDni)>0 /*|| count($dtListaDniUsuario)>0*/) {
				
				// $_SESSION['mensaje']["ses_MensajeTipo"] 	= "incorrecto";	
				// $_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Dni o Usuario ya existe registrado";
				// $url_parametros['v'] = 'index';
			 	// header('Location: ../modules/persona.php?' . http_build_query($url_parametros)); 
				 $respuesta["respuesta"]["tipo"]=0;
				 $respuesta["respuesta"]["mensaje"]="DNI ya existe ";
				 header('Content-Type: application/json; charset=utf-8');
		    	 echo json_encode (utf8_converter($respuesta));
			}
			else{

			

				//print_r($data_Persona);
				$bolAgregarPersona = $business_Persona -> fncBusinessAgregar($data_Persona);

				
					

				if ($bolAgregarPersona) {

						$data_Usuario = new data_Usuario();
						$data_Usuario -> setUsuario(str_replace(" ","",$_GET["dni"]));
						$data_Usuario -> setClave(md5($_GET["dni"]));
						$data_Usuario -> setIdRol(3);
						$data_Usuario -> setVarNombres(strtoupper($_GET["nombre"] ));
						$data_Usuario -> setvarApellidos( strtoupper($_GET["ApePat"])." ".strtoupper($_GET["ApeMat"] ));
						$data_Usuario -> setEstado(1);
						$data_Usuario -> setCambioContrasena(1);
						$data_Usuario -> setUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);
						$data_Usuario -> setDireccionIp(fncObtenerIpAdress());
						$data_Usuario -> setDireccionMac(fncObtenerMac());
						$business_Usuario	= new business_Usuario();
						$bolAgregarUsuario = $business_Usuario -> fncBusinessAgregarUsuario($data_Usuario);

						//echo("paso por ahi");
					

					$business_Persona = new business_Persona();
					$dtListaDni = $business_Persona -> fncBusinessConsultarPorDni($data_Persona->getVarDni());


					$data_Registro = new Registro();
					$business_Registro = new business_Registro();

					$data_Registro -> setIdEvento($_GET["IdEvento"]);
					$data_Registro -> setIdPersona($dtListaDni[0]["IdPersona"]);
					$data_Registro -> setVarEstado(1);
					if( !isset($_GET["estamento"]) || $_GET["estamento"] == "" ){
						$data_Registro -> setVarDependencia("EXTERNO");
					}else{
						$data_Registro -> setVarDependencia(strtoupper($_GET["estamento"]));
					}
					
					$bolAgregarRegistro = $business_Registro -> fncBusinessAgregar($data_Registro);
					
					if ($bolAgregarRegistro) {

						$respuesta["respuesta"]["tipo"]=1;
						$respuesta["respuesta"]["mensaje"]="Se Agregó y se registró al Evento ";
						header('Content-Type: application/json; charset=utf-8');
						echo json_encode (utf8_converter($respuesta));
					}else {
						$respuesta["respuesta"]["tipo"]=1;
						$respuesta["respuesta"]["mensaje"]="Se Agregó pero No se registró ";
						header('Content-Type: application/json; charset=utf-8');
						echo json_encode (utf8_converter($respuesta));
					}
					
				}else{
					$respuesta["respuesta"]["tipo"]=0;
					$respuesta["respuesta"]["mensaje"]="Ocurrió un Problema";
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode (utf8_converter($respuesta));
				}
		
			}
			

		
		}else{

			$respuesta["respuesta"]["tipo"]=0;
			$respuesta["respuesta"]["mensaje"]="Campos requeridos no enviados";
			header('Content-Type: application/json; charset=utf-8');
		    echo json_encode (utf8_converter($respuesta));
		
		}	
	}

	function fnc_Agregar()
	{
		@session_start();
		//$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["dni"]) || $_POST["dni"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }		
		//if( !isset($_POST["apellidoMaterno"]) || $_POST["apellidoMaterno"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["tipoPersona"]) || $_POST["tipoPersona"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["correo"]) || $_POST["correo"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["celular"]) || $_POST["celular"] == "" ){ $validacion_post = false; }		
		//if(	!isset($_POST["password"]) || $_POST["password"]==""){ $validacion_post = false;}
		if(	!isset($_POST["estadoPersona"]) || $_POST["estadoPersona"]==""){ $validacion_post = false;}
		//if(	!isset($_POST["usuario"]) || $_POST["usuario"]==""){ $validacion_post = false;}
		//if(	!isset($_POST["avatar"]) || $_POST["avatar"]==""){ $validacion_post = false;}
		// if( !isset($_POST["direccion"]) ){ $validacion_post = false; }
		// if( !isset($_POST["telefono"]) ){ $validacion_post = false; }
		// if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_Persona = new data_Persona();
			$data_Persona->setVarDni( str_replace(" ","",$_POST["dni"]) );
			$data_Persona->setVarNombre( strtoupper($_POST["nombre"]) );
			$data_Persona->setVarApellido( strtoupper($_POST["apellidoPaterno"])." ".strtoupper($_POST["apellidoMaterno"] ));
			$data_Persona->setIdTipoPersona( $_POST["tipoPersona"] );
			$data_Persona->setVarCorreo( strtoupper($_POST["correo"] ));
			$data_Persona->setIntCelular( $_POST["celular"] );
			//$data_Persona->setVarClave( md5($_POST["password"]) ); 
			$data_Persona->setVarClave(md5('123456')); 
			$data_Persona->setVarEstado( $_POST["estadoPersona"] );
			$data_Persona->setVarUsuario(str_replace(" ","",$_POST["dni"]));
			$data_Persona->setVarAvatar(date("Y-m-d H:i:s").'jpg');

			$data_Persona->setApeMat(strtoupper($_POST["apellidoMaterno"]));
			$data_Persona->setApePat(strtoupper($_POST["apellidoPaterno"]));
			$data_Persona->setEstamento(strtoupper($_POST["estamento"]));
			$data_Persona->setFechaFinContrato($_POST["fechaFin"]);
			$data_Persona->setFechaInicioContrato($_POST["fechaInicio"]);
			$data_Persona->setDependencia(strtoupper($_POST["dependencia"]));
			$data_Persona->setUnidadOrganica(strtoupper($_POST["unidadOrganica"]));
			$data_Persona->setCargo(strtoupper($_POST["cargo"]));
			$data_Persona->setDependenciaCargo(strtoupper($_POST["dependenciaCargo"]));
			$data_Persona->setVarDireccionIP(fncObtenerIpAdress());
			$data_Persona->setVarDireccionMAC(fncObtenerMac());
			$data_Persona->setVarNavegadorWeb(fnc_ObtenerNavegador());
			

			if (isset($_SESSION['usuario']["ses_IdUsuario"])) {
				$data_Persona->setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);
			}else {
				$data_Persona->setVarUsuarioCreador("0");
			}
			


			$business_PersonaInterna = new business_Persona();

			$dtListaInterna = $business_PersonaInterna -> fncBusinessConsultarDniInterno($data_Persona->getVarDni());
			if (count($dtListaInterna)) {
				// foreach ($dtListaInterna as $value) {
				
				// 	$data_Persona-> setVarNombre($value["NomPer"]);
				// 	$data_Persona-> setVarApellido($value["ApepPer"].' '.$value["ApemPer"]);
				// 	$data_Persona->	setIdTipoPersona( 1 );
					
	
				// }

				 	$data_Persona->	setIdTipoPersona( 1 );
			}
			

			// $data_Empresa->setVarTelefono( fncCodificarTexto($_POST["telefono"]) );
			// $data_Empresa->setVarRuc( fncCodificarTexto($_POST["ruc"]) );
			// $data_Empresa->setBitActivo( $_POST["activo"] );
			
			$business_Persona = new business_Persona();
			$dtListaDni = $business_Persona -> fncBusinessConsultarPorDni($data_Persona->getVarDni());
			//$dtListaDniUsuario = $business_Persona ->fncBusinessConsultarPorUsuario($data_Persona->getVarUsuario());

			if (count($dtListaDni)>0 /*|| count($dtListaDniUsuario)>0*/) {
				//$_SESSION["respuesta"]["tipo"]=1;
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "incorrecto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Dni o Usuario ya existe registrado";
				$url_parametros['v'] = 'index';
			 	header('Location: ../modules/persona.php?' . http_build_query($url_parametros)); 

				//echo (count($dtListaDniUsuario));
			}
			else{
				$bolAgregarPersona = $business_Persona -> fncBusinessAgregar($data_Persona);


									

				if($bolAgregarPersona){


					$data_Usuario = new data_Usuario();
					$data_Usuario -> setUsuario(str_replace(" ","",$_POST["dni"]));
					 $data_Usuario -> setClave(md5($_POST["dni"]));
					 $data_Usuario -> setIdRol(3);
					 $data_Usuario -> setVarNombres(strtoupper($_POST["nombre"] ));
					 $data_Usuario -> setvarApellidos(strtoupper($_POST["apellidoMaterno"]));
					 $data_Usuario -> setEstado(1);
					 $data_Usuario -> setCambioContrasena(1);
					 if (isset($_SESSION['usuario']["ses_IdUsuario"])) {
						 $data_Usuario -> setUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);
					 }else {
						 $data_Usuario -> setUsuarioCreador("0");
					 }
					$data_Usuario -> setDireccionIp(fncObtenerIpAdress());
					$data_Usuario -> setDireccionMac(fncObtenerMac());
					 
					 $business_Usuario	= new business_Usuario();
					 $bolAgregarUsuario = $business_Usuario -> fncBusinessAgregarUsuario($data_Usuario);
					
					$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
					$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";		
				}else{
					$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
					$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se realizo el registro. Inténtelo nuevamente.";		
				}
				 $url_parametros['v'] = 'index';
				 header('Location: ../modules/persona.php?' . http_build_query($url_parametros)); 
			}
			

		
		}else{
			$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
			$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se realizo el registro. Inténtelo nuevamente.";		
			$url_parametros['v'] = 'index';
			header('Location: ../modules/persona.php?' . http_build_query($url_parametros)); 
		}	
	}

	function fnc_Modificar()
	{
		@session_start();
		//$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		if( !isset($_POST["dni"]) || $_POST["dni"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }		
		//if( !isset($_POST["apellido"]) || $_POST["apellido"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["tipoPersona"]) || $_POST["tipoPersona"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["correo"]) || $_POST["correo"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["celular"]) || $_POST["celular"] == "" ){ $validacion_post = false; }		
		//if(	!isset($_POST["password"]) || $_POST["password"]==""){ $validacion_post = false;}
		//if(	!isset($_POST["estadoPersona"]) || $_POST["estadoPersona"]==""){ $validacion_post = false;}
		//if(	!isset($_POST["usuario"]) || $_POST["usuario"]==""){ $validacion_post = false;}
		//if(	!isset($_POST["avatar"]) || $_POST["avatar"]==""){ $validacion_post = false;}
		// if( !isset($_POST["direccion"]) ){ $validacion_post = false; }
		// if( !isset($_POST["telefono"]) ){ $validacion_post = false; }
		// if( !isset($_POST["activo"]) ){ $validacion_post = false; }
		
		$_SESSION['mensaje']["ses_MensajeEstado"] = 1;	
		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "";				
		if ($validacion_post == true){

			$data_Persona = new data_Persona();
			$data_Persona->setIdPersona( $_POST["IdPersona"]);
			$data_Persona->setVarDni( str_replace(" ","",$_POST["dni"]) );
			$data_Persona->setVarNombre( strtoupper($_POST["nombre"]) );
			$data_Persona->setVarApellido( strtoupper($_POST["apellidoPaterno"])." ".strtoupper($_POST["apellidoMaterno"] ));
			$data_Persona->setIdTipoPersona( $_POST["tipoPersona"] );
			$data_Persona->setVarCorreo( strtoupper($_POST["correo"] ));
			$data_Persona->setIntCelular( $_POST["celular"] );
			$data_Persona->setVarClave( md5($_POST["password"]) );
			$data_Persona->setVarEstado( $_POST["estadoPersona"] );
			$data_Persona->setVarUsuario(str_replace(" ","",$_POST["dni"]));



			$data_Persona->setApeMat(strtoupper($_POST["apellidoMaterno"]));
			$data_Persona->setApePat(strtoupper($_POST["apellidoPaterno"]));
			$data_Persona->setEstamento(strtoupper($_POST["estamento"]));
			$data_Persona->setFechaFinContrato($_POST["fechaFin"]);
			$data_Persona->setFechaInicioContrato($_POST["fechaInicio"]);
			$data_Persona->setDependencia(strtoupper($_POST["dependencia"]));
			$data_Persona->setUnidadOrganica(strtoupper($_POST["unidadOrganica"]));
			$data_Persona->setCargo(strtoupper($_POST["cargo"]));
			$data_Persona->setDependenciaCargo(strtoupper($_POST["dependenciaCargo"]));

			if(!isset($_POST["avatar"]) || $_POST["avatar"] == "") {
				$data_Persona-> setVarAvatar($_POST["xavatar"]);
			} else {
				$data_Persona -> setVarAvatar(date("Y-m-d H:i:s"));
			}

			
			$business_Persona = new business_Persona();
			//$business_Persona_Usuario = new business_Persona();
			$dtListaDni = $business_Persona -> fncBusinessConsultarPorDni($data_Persona->getVarDni());
			//$dtListaDniUsuario = $business_Persona_Usuario ->fncBusinessConsultarPorUsuario($data_Persona->getVarUsuario());

		
			if (count($dtListaDni)>0) {

				$data_Persona->setVarUsuario( str_replace(" ","",$_POST["dni"]) );
				

				 if ($dtListaDni[0]['IdPersona'] == base64_decode($_POST["IdPersona"])) {
					 $bolAgregarPersona = $business_Persona -> fncBusinessModificar($data_Persona);
					// echo("primer");
					// 	 echo("<pre>");
					// print_r($data_Persona);
					 //echo("</pre>")
				 	$url_parametros['v'] = 'index';
				 	header('Location: ../modules/persona.php?' . http_build_query($url_parametros)); 
				 }
				 else{
					
				 	$_SESSION['mensaje']["ses_MensajeTipo"] 	= "incorrecto";	
				 	$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Dni o Usuario ya existe registrado";
				 	$url_parametros['v'] = 'index';
				 	header('Location: ../modules/persona.php?' . http_build_query($url_parametros)); 
				 }
				

				//echo (count($dtListaDniUsuario));
			}
			else{
				//echo("no encontro dni igual");
				$bolAgregarPersona = $business_Persona -> fncBusinessModificar($data_Persona);
				if($bolAgregarPersona){

					echo("segundo");
					//print_r($bolAgregarPersona);
					$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
					$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro Modificado con éxito";		
				}else{
					$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
					$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se realizo la Modificacion. Inténtelo nuevamente.";		
				}
				 $url_parametros['v'] = 'index';
				 header('Location: ../modules/persona.php?' . http_build_query($url_parametros)); 
			}
			

		
		}else{
			$url_parametros['v'] = 'index';
			header('Location: ../modules/persona.php?' . http_build_query($url_parametros));
			//header('Location: ../index.php?' . http_build_query($url_parametros)); 
		}	

	}

?>