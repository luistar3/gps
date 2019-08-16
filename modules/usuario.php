<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Persona.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Usuario.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Persona.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Usuario.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Registro.php');

	// if( (isset($_GET["sesion"]) and $_GET["sesion"] !== "") or (isset($_POST["sesion"]) and $_POST["sesion"] !== "") ){
	// 	if( isset($_GET["sesion"]) ){$sex = $_GET['sesion'];}
	// 	if( isset($_POST["sesion"]) ){$sex = $_POST['sesion'];}
	// 	fnc_AutenticarUsuario($sex);
	// }else{
	// 	header('Location: ../');
	// }

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
			case 'login':
					view_Login($sex);
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
			case 'eLXzIh5jMU':
					fnc_CerrarSesion($sex);
				break;

			case 's5ApcnXHNU':
					fnc_Busqueda($sex);
				break;
			case 'D5cdBfAkBQ':
					fnc_Agregar();
				break;
			case 'JhccuOuolR':
					fnc_ActualizarContrasenaUsuario();
				break;
			case 'NAxBFSWwxj':
					fnc_VerificarUsuario($sex);
				break;
			case 'suIEnlqXNQ':
					fnc_VerificarSesionUsuario($sex);
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

	function view_Login($sex)
	{
		include('../views/website/login.php');
	}

	function view_Index()
	{
		@session_start();
		$menu_activo = "mantenimiento_usuario_index";

		include('../views/includes/header.php');
		include('../views/mod_usuario/index.php');
		include('../views/includes/footer.php');
	}

	function view_AgregarEditar($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$menu_activo = "mantenimiento_usuario_index";
		unset($_SESSION['validacion']);

		$business_Dependencia = new business_Dependencia();
		$dtConsultarDependenciaActivos = $business_Dependencia -> fncBusinessConsultarActivos();


		$operacion = $_GET["v"];
		if( $operacion == "editar" ){
			$get_id = $_GET["id"];

			$business_Usuario = new business_Usuario();
			$dtConsultarUsuario = $business_Usuario -> fncBusinessConsultarPorId($get_id);
			if ( count($dtConsultarUsuario) == 0 ){
				header('Location: ../index.php?' . http_build_query($url_parametros));
			}
		}

		include('../views/includes/header.php');
		include('../views/mod_usuario/add_edit.php');
		include('../views/includes/footer.php');
	}

	//===========================================================================
	//	FUNCIONES
	//===========================================================================

	function fnc_AutenticarUsuario()
	{

		 @session_start();
		 unset( $_SESSION['usuario']);

		 $response_recaptcha = $_POST["g-recaptcha-response"];
		 $secret = '6Lc7dJ8UAAAAAAPxht9eLdpUbQS__lEy6LA5jnY0';
		 // if (isset($response_recaptcha) && $response_recaptcha) {
			 // $ip = $_SERVER['REMOTE_ADDR'];
			 // $validation_server = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response_recaptcha&remoteip=$ip");
			 // $data = json_decode($validation_server, TRUE);
			 //
			 // $permiso = array();
			 // foreach ($data as $key => $value) {
				//  array_push($permiso,$value);
			 // }

			 $permiso[0]=1;

			 if ($permiso[0]==1) {




			$business_Usuario 				= new business_Usuario();
			$data_Usuario 					= new data_Usuario;
			$business_UsuarioPermiso 		= new business_Usuario();

		if( isset($_POST["usuario"]) and isset($_POST["contrasena"]) ){
			@session_start();

			$post_usuario 		= $_POST["usuario"];
			$post_contrasena 	= $_POST["contrasena"];


			$data_Usuario->setUsuario($post_usuario);
			$data_Usuario->setClave(md5($post_contrasena) );

			$dtAutenticarUsuario	 	= $business_Usuario -> fncBusinessAutenticarUsuario($data_Usuario);
			


			if (count($dtAutenticarUsuario)){

				if ($dtAutenticarUsuario[0]["CambioContrasena"]==1) {
					
					$_SESSION['Actualizacion'] = 1;
					$url_parametros["dni"] =$_POST["usuario"];
					header('Location: ../views/website/cambioContrasena.php?' . http_build_query($url_parametros));
					exit();
				}

				$dtPermisosUsuario 			 =	 $business_UsuarioPermiso -> fncBusinessAutenticarUsuarioPermisos( $_POST["usuario"]);


				if ( $dtAutenticarUsuario[0]['Estado'] == true){
					$_SESSION['usuario']["ses_UsuarioNombre"] 					= $dtAutenticarUsuario[0]['varNombres'].' '.$dtAutenticarUsuario[0]['varApellidos'];
					$_SESSION['usuario']["ses_IdUsuario"] 						=	$dtAutenticarUsuario[0]['IdUsuario'];
					$_SESSION['usuario']["ses_Dependencia"] 					=	$dtAutenticarUsuario[0]['Dependencia'];
					//$_SESSION['usuario']["ses_NombreDependencia"] 				=	$dtAutenticarUsuario[0]['Dependencia'];
					$_SESSION['usuario']["ses_Titulo"]							=	$dtAutenticarUsuario[0]['Titulo'];
					$_SESSION['usuario']["ses_IdRol"] 							=	$dtAutenticarUsuario[0]['IdRol'];
					$_SESSION['usuario']["ses_IdDependencia"] 					=	$dtAutenticarUsuario[0]['Dependencia'];
					$_SESSION['usuario']["ses_Dni"] 							=	$_POST["usuario"];
					$_SESSION['usuario']["ses_UsuarioLogeado"] 					= true;

					$_SESSION['mensaje']["ses_MensajeEstado"] 	= 0;






					$objPermiso =array();
					$PermisoValorEspecifico =array();
					$datosPersona =array();
					$data_Persona = new data_Persona();
					$bussines_persona = new business_Persona();
					$data_Persona ->setVarDni($_POST["usuario"]);
					$dt_persona =  $bussines_persona -> fncBusinessBuscarIdPorDni($data_Persona);
					$_SESSION['usuario']["ses_DatosPersonaID"] 						= $dt_persona[0]["IdPersona"];
						$_SESSION['usuario']["ses_DatosPersonaDNI"] 						= $dt_persona[0]["Dni"];
						$_SESSION['usuario']["ses_DatosPersonaNombre"] 						= $dt_persona[0]["Nombre"];
						$_SESSION['usuario']["ses_DatosPersonaApellido"] 						= $dt_persona[0]["Apellido"];
						$_SESSION['usuario']["ses_DatosPersonaTipo"] 						= $dt_persona[0]["IdTipoPersona"];

					if (count($dtPermisosUsuario)) {



						foreach ($dtPermisosUsuario as $value) {
							$_SESSION['usuario']["ses_Permiso"] 					=  $value["USRId"];
							$_SESSION['usuario']["ses_PermisoDni"] 					=  $value["USRdni"];
							$_SESSION['usuario']["ses_PermisoNombre"] 				=  $value["PRFnombre"];
							$_SESSION['usuario']["ses_PermisoIdPtaDependencia"] 	=  $value["IdPtaDependencia"];
							$_SESSION['usuario']["ses_PermisoIdPtaDependenciaFijo"] =  $value["IdPtaDependenciaFijo"];
							array_push($objPermiso, $value["PSTobjeto"]);
							array_push($PermisoValorEspecifico, $value["CDPValorEspecifico"]);
						}
						$_SESSION['usuario']["ses_PermisoPSTobjeto"] 							= $objPermiso;
						$_SESSION['usuario']["ses_PermisoValorEspecifico"] 						= $PermisoValorEspecifico;

					}

					header('Location: ../modules/evento.php?v=eventopPage');
				}else{
					$_SESSION['usuario']["ses_UsuarioLogeado"] = false;
					$_SESSION['mensaje']["ses_MensajeEstado"] 	= 1;
					$_SESSION['mensaje']["ses_MensajeTipo"] = "error";
					$_SESSION['mensaje']["ses_MensajeDescripcion"] = "Usuario se encuentra inactivo";
					header('Location: ../views/website/login.php');
				}

			}else{
				$_SESSION['usuario']["ses_UsuarioLogeado"] = false;
				$_SESSION['mensaje']["ses_MensajeEstado"] = 1;
				$_SESSION['mensaje']["ses_MensajeTipo"] = "error";
				$_SESSION['mensaje']["ses_MensajeDescripcion"] = "Error en inicio de sesión";
				header('Location: ../views/website/login.php');

			}

		}else{
			//header('Location: ../index.php');
			header('Location: ../views/website/login.php');
			//echo("error al enviar");
		}

	}
	else {
		header('Location: ../views/website/login.php');
	}

// }
// else{
// 	header('Location: ../views/website/login.php');
// }

	}

	function fnc_CerrarSesion($sex)
	{
		@session_start();
		// unset($_SESSION['usuario']);
		// unset($_SESSION['mensaje']);
		header('Location: ../index.php?' . http_build_query($url_parametros));
	}



	function fnc_Busqueda($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if ($validacion_post == true){
			$business_Usuario = new business_Usuario();
			$dtConsultarUsuarios = $business_Usuario -> fncBusinessConsultar();

			include('../views/mod_usuario/div_consultarusuario.php');
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros));
		}

	}

	function fnc_VerificarUsuario($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		$response = array();
		$response['mensaje'] = false;

		unset($_SESSION['validacion']);
		$_SESSION['validacion']['usuariovalidado'] = false;

		if( !isset($_POST["usuario"]) || $_POST["usuario"] == "" ){ $validacion_post = false; }

		if ($validacion_post == true){
			$data_Usuario = new data_Usuario();
			$data_Usuario->setVarUsuario( fncCodificarTexto($_POST["usuario"]) );

			$business_Usuario = new business_Usuario();
			$dtConsultarUsuarios = $business_Usuario -> fncBusinessVerificarUsuario($data_Usuario);

			if ( count($dtConsultarUsuarios) == 0 ){
				$response['mensaje'] = true;
				$_SESSION['validacion']['usuariovalidado'] = true;
			}else{
				$response['mensaje'] = false;
				$_SESSION['validacion']['usuariovalidado'] = false;
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros));
		}

	}

	function fnc_VerificarSesionUsuario($sex)
	{
		@session_start();
		$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		$response = array();
		$response['mensaje'] = false;

		if( !isset($_SESSION['validacion']['usuariovalidado']) || $_SESSION['validacion']['usuariovalidado'] == "" ){ $validacion_post = false; }

		if ($validacion_post == true){
			if ( $_SESSION['validacion']['usuariovalidado'] == true ){
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
		@session_start();

		$response_recaptcha = $_POST["g-recaptcha-response"];
		$secret = '6Lc7dJ8UAAAAAAPxht9eLdpUbQS__lEy6LA5jnY0';
		if (/*isset($response_recaptcha) && $response_recaptcha*/$secret) {
			// $ip = $_SERVER['REMOTE_ADDR'];
			// $validation_server = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response_recaptcha&remoteip=$ip");
			// $data = json_decode($validation_server, TRUE);

			// $permiso = array();
			// foreach ($data as $key => $value) {
			// 	array_push($permiso,$value);
			// }
			$permiso[0] =1;
			
			if ($permiso[0]==1) {


				if (isset($_POST["contrasena"]) && (isset($_POST["rcontrasena"])) && (isset($_POST["nombre"])) &&  (isset($_POST["documento"])) && (isset($_POST["mail"])) && (isset($_POST["telefono"])) ) {
					if ($_POST["contrasena"]==($_POST["rcontrasena"])) {
						echo("existo");

						$data_Persona		 = new data_Persona();
						$data_Registro		 = new Registro();
						$business_Registro	 = new business_Registro();
						$business_Persona	 = new Business_Persona();
						$business_Usuario	 = new business_Usuario();

						$dtConsultarPersonaPorDni = $business_Persona -> fncBusinessConsultarDniInterno(str_replace(' ','',$_POST["documento"]));

						$existenciaInterna = false;
						if (count ($dtConsultarPersonaPorDni)>0) {
							$existenciaInterna = true;
						}
						$dtConsultarExternoPersonaPorDni = $business_Persona -> fncBusinessConsultarPorDni(str_replace(' ','',$_POST["documento"]));
						$existenciaExterna = false;
						if (count($dtConsultarPersonaPorDni)>0) {
							$existenciaExterna = true;
						}

						$dtConsultarDniUsuario  = $business_Usuario -> fncBusinessBuscarUsuario(str_replace(' ','',$_POST["documento"]));
						$existeUsuario = false;
						if (count($dtConsultarDniUsuario)>0) {
						$existeUsuario = true;
						}

						// print_r($dtConsultarPersonaPorDni);
						// print_r($dtConsultarExternoPersonaPorDni);
						// print_r($dtConsultarDniUsuario);

						if (count($dtConsultarDniUsuario)==0) {

							if (count ($dtConsultarExternoPersonaPorDni)==0) { //PERSONAS externa



									$data_Persona = new data_Persona();
									$data_Persona->setVarDni( str_replace(" ","",$_POST["documento"]) );
									$data_Persona->setVarNombre( strtoupper ($_POST["nombre"] ));
									$data_Persona->setVarApellido( strtoupper ($_POST["apellidoPaterno"]." ".$_POST["apellidoMaterno"] ));
									$data_Persona->setIdTipoPersona("1");
									$data_Persona->setVarCorreo( strtoupper ($_POST["mail"] ));
									$data_Persona->setIntCelular( $_POST["telefono"] );
									//$data_Persona->setVarClave( md5($_POST["password"]) );
									$data_Persona->setVarClave( md5('123456') );
									$data_Persona->setVarEstado( 1);
									$data_Persona->setVarUsuario(str_replace(" ","",$_POST["documento"]));
									$data_Persona->setVarAvatar(date("Y-m-d H:i:s").'jpg');
									$data_Persona->setApePat(strtoupper ($_POST["apellidoPaterno"]));
									$data_Persona->setApeMat(strtoupper ($_POST["apellidoMaterno"]));
							
									$data_Persona->setVarUsuarioCreador("0");
									

									if (count($dtConsultarPersonaPorDni)==0){
										$data_Persona->setIdTipoPersona("2");

									}

									$business_Persona = new business_Persona();

									$bolAgregarPersona = $business_Persona -> fncBusinessAgregar($data_Persona);

									if ($bolAgregarPersona) {
										echo ("se agrego y se creara susuario");
										$data_Usuario =new data_Usuario();
										$data_Usuario -> setUsuario(str_replace(" ","",$_POST["documento"]));
										$data_Usuario -> setClave(  md5(str_replace(" ","",$_POST["contrasena"])));
										$data_Usuario -> setIdRol(3);
										$data_Usuario -> setVarNombres(strtoupper ($_POST["nombre"] ));
										$data_Usuario -> setvarApellidos(strtoupper ($_POST["apellidoPaterno"]." ".$_POST["apellidoMaterno"] ));
										$data_Usuario -> setEstado(1);

										$business_Usuario		= new business_Usuario();
										$bolAgregarUsuario = $business_Usuario -> fncBusinessAgregarUsuario($data_Usuario);
										header('Location: ../views/website/login.php');

									}




								}
								else {
									//echo ("SOLO SE creara susuario");
										$data_Usuario =new data_Usuario();
										$data_Usuario -> setUsuario(str_replace(" ","",$_POST["documento"]));
										$data_Usuario -> setClave(str_replace(" ","",$_POST["contrasena"]));
										$data_Usuario -> setIdRol(3);
										$data_Usuario -> setVarNombres( strtoupper ( $_POST["nombre"] ));
										$data_Usuario -> setvarApellidos(strtoupper ($_POST["apellido"] ));
										$data_Usuario -> setEstado(1);
										$data_Usuario -> setUsuarioCreador("0");

										$business_Usuario		= new business_Usuario();
										$bolAgregarUsuario = $business_Usuario -> fncBusinessAgregarUsuario($data_Usuario);
										header('Location: ../views/website/login.php');
								}


						}
						else {

							$_SESSION['mensaje']["ses_MensajeDescripcion"] = "Usuario ya registrado";
							header('Location: ../views/website/login.php');
						}


					}
					else{
						$url_parametros['c'] = 'La contraseña no es igual';
						$url_parametros['rc'] = 'La contraseña no es igual';
						header('Location: ../views/website/registrar.php?' . http_build_query($url_parametros));
					}
				}
				else {

					$url_parametros['rc'] = 'Ocurrio un error';
					header('Location: ../views/website/registrar.php?' . http_build_query($url_parametros));
				}
			}
			else{

				$url_parametros['v'] = 'Verifique el reCAPTCHA';
				header('Location: ../views/website/registrar.php?' . http_build_query($url_parametros));
			}
		}
		else{
			$url_parametros['v'] = 'Verifique el reCAPTCHA';
			header('Location: ../views/website/registrar.php?' . http_build_query($url_parametros));

			if (isset($_POST["contrasena"]) && isset($_POST["rcontrasena"]) ) {
				if ($_POST["contrasena"]==($_POST["rcontrasena"])) {
					echo("existo");
				}
				else{
					$url_parametros['c'] = 'La clave no es igual';
					$url_parametros['rc'] = 'La clave no es igual';
					header('Location: ../views/website/registrar.php?' . http_build_query($url_parametros));
				}
			}
		}
		// $url_parametros['sesion'] = $sex;
		// $validacion_post = true;

		// if( !isset($_POST["usuario"]) || $_POST["usuario"] == "" ){ $validacion_post = false; }
		// if( !isset($_POST["contrasena"]) || $_POST["contrasena"] == "" ){ $validacion_post = false; }
		// if( !isset($_POST["nombre"]) || $_POST["nombre"] == "" ){ $validacion_post = false; }
		// if( !isset($_POST["apellido"]) || $_POST["apellido"] == "" ){ $validacion_post = false; }
		// if( !isset($_POST["nivel"]) ){ $validacion_post = false; }
		// if( !isset($_POST["idptadependenciafijo"]) ){ $validacion_post = false; }
		// if( !isset($_POST["activo"]) ){ $validacion_post = false; }

		// $_SESSION['mensaje']["ses_MensajeEstado"] = 1;
		// $_SESSION['mensaje']["ses_MensajeTipo"] 	= "";
		// if ($validacion_post == true){

		// 	$data_Usuario = new data_Usuario();
		// 	$data_Usuario->setVarUsuario( fncCodificarTexto($_POST["usuario"]) );
		// 	$data_Usuario->setVarContrasena( fncCodificarTexto($_POST["contrasena"]) );
		// 	$data_Usuario->setVarNombre( fncCodificarTexto($_POST["nombre"]) );
		// 	$data_Usuario->setVarApellido( fncCodificarTexto($_POST["apellido"]) );
		// 	$data_Usuario->setVarNivel( fncCodificarTexto($_POST["nivel"]) );
		// 	$data_Usuario->setIdPtaDependenciaFijo( $_POST["idptadependenciafijo"] );
		// 	$data_Usuario->setBitActivo( $_POST["activo"] );

		// 	$business_Usuario = new business_Usuario();
		// 	$bolAgregarUsuario = $business_Usuario -> fncBusinessAgregar($data_Usuario);

		// 	if($bolAgregarUsuario){
		// 		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";
		// 		$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";
		// 	}else{
		// 		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";
		// 		$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro el registro. Inténtelo nuevamente.";
		// 	}
		// 	$url_parametros['v'] = 'index';
		// 	header('Location: ../modules/usuario.php?' . http_build_query($url_parametros));
		// }else{
		// 	header('Location: ../index.php?' . http_build_query($url_parametros));
		// }
	}

	function fnc_ActualizarContrasenaUsuario()
	{
		@session_start();
	
		$validacion_post = true;

		if( !isset($_POST["usuario"]) || $_POST["usuario"] == "" ){ $validacion_post = false; }

		 if( !isset($_POST["usuariox"]) || $_POST["usuariox"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["contrasenaAnterior"]) || $_POST["contrasenaAnterior"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["contrasenaNueva"]) || $_POST["contrasenaNueva"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["contrasenaAnterior"]) || $_POST["contrasenaNueva"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["repitaContrasenaNueva"]) || $_POST["repitaContrasenaNueva"] == "" ){ $validacion_post = false; }
		if( $_POST["contrasenaNueva"] != $_POST["repitaContrasenaNueva"]) {	$validacion_post = false;	}
		

		
		if ($validacion_post == true){

			//echo("ecytro");

		$data_Usuario =	new data_Usuario();
		$business_Usuario = new business_Usuario();
	

		$data_Usuario->setUsuario($_POST["usuario"]);
		$data_Usuario->setClave(md5($_POST["contrasenaAnterior"]));

		$dtAutenticarUsuario	= $business_Usuario -> fncBusinessAutenticarUsuario($data_Usuario);
		
		//print_r($data_Usuario);
			if (count($dtAutenticarUsuario)>0) {
				//echo("entro");
				
				//$business_Usuario		= new business_Usuario();
				$bolAgregarUsuario = $business_Usuario -> fncBusinessActualizarContrasenaUsuario($_POST["usuariox"],$_POST["contrasenaNueva"]);
				//$_SESSION['mensaje'] = 1;
				$_SESSION['mensaje']["ses_MensajeDescripcion"]= "Modificación Correcta";

				// if($bolAgregarUsuario){
				// 	//echo("modifico");
				// 	$_SESSION['mensaje']["ses_MensajeDescripcion"]= "Modificación Correcta";
					
				// }else{
				// 	//echo("  no modifico");
				// 	$_SESSION['mensaje']["ses_MensajeDescripcion"]= "Error";
				
				// }
				header('Location: ../views/website/login.php');
			}
			else {
				$_SESSION['mensaje']["ses_MensajeDescripcion"]= "Contraseña Incorrecta";
				header('Location: ../views/website/login.php');
			}
		

		}else{
			$_SESSION['mensaje']["ses_MensajeDescripcion"]= "Datos Incorrectos";
			header('Location: ../views/website/login.php');
		}

	}



?>
