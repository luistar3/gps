<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Registro.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Evento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Persona.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_TipoEvento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Usuario.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Registro.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Persona.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Evento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_TipoEvento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Usuario.php');


    // VERIFICAR PERMISO DEL MODULO
	 @session_start();
	 if (isset($_SESSION['usuario'])) {
		 # code...
		
	 }
	 else {
		 
		 header('Location: ../views/website/login.php');
		 @exit();
	 }
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
			case 'registrar':
					view_registrar();
				break;
			case 'registrarEventoSelect':
					view_registrarEventoSelect();
				break;
			case 'registroPorEventoMes':
					view_verRegistroPorEventoMes(); //lista  de evento  repartidos por mes
					break;
				break;
			case 'registradosPorEventoMes':
					view_verRegistradosPorEventoMes(); //lista  de personas inscritas al evento
				break;
			case 'agregar':
					view_AgregarEditar();
				break;
			case 'editar':
					view_AgregarEditar();
				break;
			case 'pageRegistro':
					view_EventosDondeUnoEstaRegistrado();
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
				fnc_CambiarEstadoInscripcion();
				break;
			case 'xZ6rQTOHxk':
					fnc_Agregar($sex);
				break;
			case 'XqWerTyX':
					fnc_AgregarMasivoVista();
				break;
			case 'qWerTy':
					fnc_AgregarMasivo();
				break;
			case 'QDrthty':
					fnc_AgregarMasivoAccion();
				break;
			case 'uctftGr4Jm':
					fnc_IncribirUsuario();
				break;
			case 'TbGGr4Jm':
					fnc_IncribirUsuarioIndividual();
				break;
			case 'UkUELwv6kL':
					fnc_AgregarMasivoAccionSoloPersonas();
				break;
			case 'Q6SwcynHWV':
					fnc_borrarCheckListadoRegistro();
				break;
			case 'EliminarPersonaEvento':
					fnc_borrarPersonaEvento();
				break;

			default:
				header('Location: ../errors/404.php?sesion='.$sex);
				break;
		}

	}else{
		header('Location: ../errors/404.php?sesion='.$sex);
	}

	//===========================================================================
	//	VISTAS fnc_AgregarMasivoAccionSoloPersonas
	//===========================================================================

	function view_Index()
	{
		@session_start();
        $menu_activo = "mantenimiento_registro_evento_index";
		$business_Registro = new business_Registro();
		$dtListarRegistros = $business_Registro -> fncBusinessListarRegistros();
		include('../views/includes/header.php');
		include('../views/mod_registro/index.php');
		include('../views/includes/footer.php');
	}


	function view_EventosDondeUnoEstaRegistrado()
	{
		@session_start();
		$menu_activo = "mantenimiento_evento_usuario_registro";

		$data_Persona = new data_Persona();
		$bussines_persona = new business_Persona();
		$data_Persona ->setVarDni($_SESSION['usuario']["ses_Dni"]);
		$dt_persona =  $bussines_persona -> fncBusinessBuscarIdPorDni($data_Persona);

		$business_Registro = new business_Registro();

		if ( count($dt_persona)>0 ) {
			$dtListarRegistros = $business_Registro -> fncBusinessListarRegistrosdeInscripcion($dt_persona[0]["IdPersona"]);
		}else {
			$dtListarRegistros = $business_Registro -> fncBusinessListarRegistrosdeInscripcion(1);
		}
		$dtListarRegistros=utf8_converter($dtListarRegistros);

		include('../views/includes/header.php');
		include('../views/mod_registro/index.php');
		include('../views/includes/footer.php');
	}

	function view_registrar()
	{
        @session_start();
        //$url_parametros['sesion'] = $sex;
        $menu_activo = "mantenimiento_registrar_personas_index";
		//unset($_SESSION['empresa']);

		$business_resgistro = new business_Registro();
		$dtListaEventosParaRegistro = $business_resgistro -> fncBusinessListarEventoParaRegistro();

		//$operacion = $_GET["v"];
		//if( $operacion == "editar" ){
		//	$get_id = $_GET["id"];

			//$business_Empresa = new business_Empresa();
			//$dtConsultarEmpresa = $business_Empresa -> fncBusinessConsultarPorId($get_id);
			// if ( count($dtConsultarEmpresa) == 0 ){
			// 	header('Location: ../index.php?' . http_build_query($url_parametros));
			// }
       // }


		include('../views/includes/header.php');
		include('../views/mod_registro/view_registro.php');
		include('../views/includes/footer.php');
	}

		function view_verRegistroPorEventoMes()
	{

		// $menu_activo = "mantenimiento_registro_evento_mes";
		$menu_activo = "mantenimiento_evento_index";

		@session_start();
		$business_Evento = new business_Evento();
		$dtListarEventosMes = $business_Evento -> fncBusinessListarEventosMes();
		$enero=array();$febrero=array();$marzo=array();$abril=array();$mayo=array();$junio=array();$julio=array();$agosto=array();$setiembre=array();$octubre=array();$noviembre=array();$diciembre=array();
		foreach ($dtListarEventosMes as $dtListarEventos) {

			$mes = $dtListarEventos["InicioFecha"];

			$mes = date("m",strtotime($mes));
			//echo($mes. "___");
			//$data_evento = new data_Evento();


			switch ($mes) {
					case '01':


					array_push($enero, $dtListarEventos);
						break;
					case '02':
					# code...
					array_push($febrero, $dtListarEventos);
						break;
					case '03':
					# code...
					array_push($marzo, $dtListarEventos);
						break;
					case '04':
					# code...
					array_push($abril, $dtListarEventos);
						break;
					case '05':
					# code...
					array_push($mayo, $dtListarEventos);
						break;
					case '06':
					# code...
					array_push($junio, $dtListarEventos);
						break;
					case '07':
					# code...
					array_push($julio, $dtListarEventos);
						break;
					case '08':
					# code...
					array_push($agosto, $dtListarEventos);
						break;
					case '09':
					# code...
					array_push($setiembre, $dtListarEventos);
						break;
					case '10':
					# code...
					array_push($octubre, $dtListarEventos);
						break;
					case '11':
					# code...
					array_push($noviembre, $dtListarEventos);
						break;
					case '12':
					# code...
					array_push($diciembre, $dtListarEventos);
						break;

					default:
					# code...
						break;
			}
		}


		include('../views/includes/header.php');
		include('../views/mod_Registro/view_registro_por_evento.php');
		include('../views/includes/footer.php');
	}


	function view_verRegistradosPorEventoMes()
	{
        @session_start();


        $menu_activo = "mantenimiento_evento_index";

		$IdEvento = base64_decode($_GET["id"]);

		$business_resgistro = new business_Registro();
		$dtListadoPersonasPorEvento = $business_resgistro -> fncBusinessListarPersonasPorEvento($IdEvento);

		$dtListadoPersonasPorEvento = utf8_converter($dtListadoPersonasPorEvento);



		include('../views/includes/header.php');
		include('../views/mod_registro/view_registro_personas_por_evento.php');
		include('../views/includes/footer.php');
	}
	function view_registrarEventoSelect()
	{
		@session_start();

		$IdEvento 		= $_GET["IdEvento"];
		//$Nombre			= $_GET["Nombre"];
		//$Lugar 			= $_GET["Lugar"];
		//$InicioFecha 	= $_GET["InicioFecha"];
		$business_Evento = new business_Evento();

		$dtEvento = $business_Evento->fncBusinessConsultarPorId($IdEvento);
		$Nombre = $dtEvento[0]["Nombre"];
        //$url_parametros['sesion'] = $sex;
        $menu_activo = "mantenimiento_registro_evento_agregar_index";
		//unset($_SESSION['empresa']);

		//$business_resgistro = new business_Registro();
		//$dtListaEventosParaRegistro = $business_resgistro -> fncBusinessListarEventoParaRegistro();

		//$operacion = $_GET["v"];
		//if( $operacion == "editar" ){
		//	$get_id = $_GET["id"];

			//$business_Empresa = new business_Empresa();
			//$dtConsultarEmpresa = $business_Empresa -> fncBusinessConsultarPorId($get_id);
			// if ( count($dtConsultarEmpresa) == 0 ){
			// 	header('Location: ../index.php?' . http_build_query($url_parametros));
			// }
       // }


		include('../views/includes/header.php');
		include('../views/mod_registro/view_registroSelect.php');
		include('../views/includes/footer.php');
	}


	//===========================================================================
	//	FUNCIONES
	//===========================================================================

	function fnc_CambiarEstadoInscripcion()
	{
		@session_start();
		$business_Registro = new business_Registro();

		$estado = $_GET["Estado"];
		$IdPersona = $_GET["IdPersona"];
		$IdEvento = $_GET["IdEvento"];
		$InsertarEstado = "";
		$InsertarNom="";
		if ($estado==0) {
			$InsertarEstado=1;
			$InsertarNom="Activo";
		}
		else{
			$InsertarEstado=0;
			$InsertarNom="Inactivo";
		}
		//echo($estado."-".$IdPersona."-".$IdEvento);
		$bolrespuesta = $business_Registro -> fncBusinessCambiarEstadoInscricpcion($IdPersona,$IdEvento,$InsertarEstado);
		if ($bolrespuesta) {
			$bol["0"]=1;
			$bol["1"]=$InsertarNom;
			$bol["2"]=$InsertarEstado;

			header('Content-Type: application/json; charset=utf-8');

			  echo json_encode (utf8_converter($bol));

		}
		else{
			$bol["0"]=0;
			$bol["1"]=$InsertarNom;
			$bol["2"]=$InsertarEstado;
			$bol["3"]=$estado;
			header('Content-Type: application/json; charset=utf-8');

			  echo json_encode (utf8_converter($bol));
		}

	}

	function fnc_borrarCheckListadoRegistro()
	{
		@session_start();

		$IdDelete= $_POST['idDelete'];
		$IdEvento= $_POST['IdEvento'];
		$business_Registro = new business_Registro();
		for ($i=0; $i < count($IdDelete); $i++) {
			$estado =0;
			$eliminado =1;
			$bolEliminarRegistro = $business_Registro -> fncBussinesEliminarRegistro($IdEvento,$IdDelete[$i],$estado,$eliminado);

		}
		$_SESSION['registroMasivo']["contRegistros"] = "Proceso Finalizado";


		$url_parametros_asistentes_a_evento['v'] 		= 'registradosPorEventoMes';
        $url_parametros_asistentes_a_evento['id'] =  base64_encode($IdEvento);
		header('Location: ../modules/Registro.php?' . http_build_query($url_parametros_asistentes_a_evento));

	}



	function fnc_AgregarMasivoVista()
	{

		@session_start();
		$IdEvento = $_POST["IdEvento"];
		$menu_activo = "mantenimiento_registro_evento_agregar_index";
		if ($_FILES['archivo']["error"] > 0){
			$url_parametros['v'] = 'index';
		 	header('Location: ../modules/Registro.php?' . http_build_query($url_parametros));
		}else{
			// echo "dsfd34324sfsd";
			$nombre=strftime( "%Y-%m-%d-%H-%M-%S", time() ).$_FILES['archivo']['name'];
			move_uploaded_file($_FILES['archivo']['tmp_name'],"../files/" . $nombre);


			$data_Persona = new data_Persona();
			$data_Registro = new Registro();
			$business_Registro = new business_Registro();
			$business_Persona = new Business_Persona();

			$archivo = fopen("../files/".$nombre, "r");
			$archivocount = fopen("../files/".$nombre, "r");
			$contador = 0;
			$contador_fila = 0;
			$lista = array();
			$business_PersonaInterna = new business_Persona();
			$countTotal = 0;



			$archivocountcolumns = fopen("../files/".$nombre, "r");
			$contadoeee = 0;
			$contador_columnas = 0;


			  while(($data = fgetcsv($archivocountcolumns, 1000, ",")) !== FALSE)
			  {
			  	if( $contadoeee == 0 ){

			  		if( trim($data[0]) != '' ){

			  			$arrayPrimeraFila = explode(";", $data[0]);
			  			for ($i=0; $i < count($arrayPrimeraFila) ; $i++) {
			  				$contador_columnas = $contador_columnas + 1;
			  			}

			  		}
			  	}
			  	$contadoeee++;
			  }


			if( $contador_columnas <> 13 ){
				@fclose($archivo);
				@fclose($archivocount);
				@fclose($archivocountcolumns);
				@unlink("../files/".$nombre);

				$url_parametros['v'] = 'index';
		 		header('Location: ../modules/Registro.php?' . http_build_query($url_parametros));
			}else{


				while (($data = fgetcsv($archivocount, 0, ";")) == true){
					$countTotal++;
				}

				while (($datos = fgetcsv($archivo, 0, ";")) == true){

					if($contador_fila > 0 and $contador < $countTotal-1){

						$num = count($datos);
						$data_Persona -> setVarDni($datos[0]);
						$dtConsultarPersonaPorDni = $business_Registro -> fncBusinessConsultarPersonaPorDni($data_Persona);


						$excelDni 								= fncCodificarTexto( trim($datos[0]) );
						$excelNombre 							= fncCodificarTexto( trim($datos[3]) );
						$excelApellidoPaterno 		= fncCodificarTexto( trim($datos[1]) );
						$excelApellidoMaterno 		= fncCodificarTexto( trim($datos[2]) );
						$excelEstamento 					= fncCodificarTexto( trim($datos[4]) );
						$excelFechaInicioContrato = date("Y-m-d", strtotime( str_replace("/","-", trim($datos[5]) ) ));
						$excelFechaFinContrato 		= date("Y-m-d", strtotime(str_replace("/","-", trim($datos[6]) ) ));
						$excelDependencia 				= fncCodificarTexto( trim($datos[7]) );
						$excelUnidadOrganica 			= fncCodificarTexto( trim($datos[8]) );
						$excelCargo 							= fncCodificarTexto( trim($datos[9]) );
						$excelDependenciaCargo 		= fncCodificarTexto( trim($datos[10]) );
						$excelTelefono 						= fncCodificarTexto( trim($datos[11]) );
						$excelEmail 							= fncCodificarTexto( trim($datos[12]) );



						if( $excelDni != ''/* && $excelFechaInicioContrato != '' && $excelFechaFinContrato != ''*/ ){

							$lista[$contador]["dni"]									= $excelDni;
							$lista[$contador]["nombre"]								= strtoupper($excelNombre);
							$lista[$contador]["apellidoPat"]					= strtoupper($excelApellidoPaterno);
							$lista[$contador]["apellidoMat"]					= strtoupper($excelApellidoMaterno);
							$lista[$contador]["estamentoex"]					= strtoupper($excelEstamento);
							$lista[$contador]["fechaInicioContrato"]	= $excelFechaInicioContrato;
							$lista[$contador]["fechaFinContrato"]			= $excelFechaFinContrato;
							$lista[$contador]["dependencia"]					= strtoupper($excelDependencia);
							$lista[$contador]["unidadOrganica"]				= strtoupper($excelUnidadOrganica);
							$lista[$contador]["cargo"]								= strtoupper($excelCargo);
							$lista[$contador]["dependeciaCargo"]			= strtoupper($excelDependenciaCargo);
							$lista[$contador]["correo"]								= strtoupper($excelEmail);
							$lista[$contador]["telefono"]							= strtoupper($excelTelefono);;
							$lista[$contador]["activo"]								= false;
							$lista[$contador]["estamento"]						= strtoupper("EXTERNO");



							$estamentos = array();
							$dtListaInterna = $business_PersonaInterna -> fncBusinessConsultarDniInterno( str_replace(' ', '', $excelDni) );


							/*  buscar si la persona ya esta registrada en el evento - enc aso de que la accion sea solo agregar personas al sistema un IdEvento=0 es el que se carga aqui */
							$dataRegistroInscripcion = new Registro();
							$dataRegistroInscripcion -> setIdEvento($IdEvento);

							if (count($dtConsultarPersonaPorDni)>0)  {
								$dataRegistroInscripcion -> setIdPersona($dtConsultarPersonaPorDni[0]["IdPersona"]);
								$lista[$contador]["idPersona"] = $dtConsultarPersonaPorDni[0]["IdPersona"];
							}else {
								$dataRegistroInscripcion -> setIdPersona(0);
								$lista[$contador]["idPersona"] = 0;
							}

							$dtExisteEnEvento = $business_Registro->fncBusinessConsultarPersonaRegistrada($dataRegistroInscripcion);

							/*------------------- */

							/* agdiciona u campoa ala lista para uq se visualice  si ya se registro o no */

							if (count($dtExisteEnEvento)>0) {
								# code...

									$lista[$contador]["existe"] = 1;

							}
							else {
								# code...
									$lista[$contador]["existe"] = 0;
							}


							/*-------------------- */

							if (count ($dtConsultarPersonaPorDni)>0) {
								$lista[$contador]["correoEvento"] = $dtConsultarPersonaPorDni[0]["Correo"];
								$lista[$contador]["celularEvento"] = $dtConsultarPersonaPorDni[0]["Celular"];
								$lista[$contador]["activo"] =true;

								if (count($dtListaInterna)>0) {

									foreach ($dtListaInterna as $value) {
										//$lista[$contador]["nombre"] = fncCodificarTexto($value["NomPer"]);
										//$lista[$contador]["apellidoPat"] = fncCodificarTexto($value["ApepPer"]);
										//$lista[$contador]["apellidoMat"]= fncCodificarTexto($value["ApemPer"]);
									//	$lista[$contador]["correoUpt"] = $value["Email"];
									//	$lista[$contador]["celularUpt"] = $value["TelefCelular"];

										array_push($estamentos, $value["DesEstamento"]);
									}
									$lista[$contador]["estamento"]= $estamentos;
								}
								else{
									$lista[$contador]["estamento"]= "EXTERNO";
								}

							}

						}

						$contador++;

					}
					$contador_fila = 1;
				}

				@fclose($archivo);
				@fclose($archivocount);
				@fclose($archivocountcolumns);
				@unlink("../files/".$nombre);

				$lista = utf8_converter2($lista);

				include('../views/includes/header.php');
				include('../views/mod_registro/view_registroVista.php');
				include('../views/includes/footer.php');

			}

		}

	}
	function fnc_AgregarMasivoAccion()
	{
		@session_start();
	
		$contPersonaNuevas = 0;
		$contRegistroNuevo = 0;
		$contRegistroRepetido=0;
		$mensajeAdd = "";
		$mensajeAddRegist = "";
		$datos			= $_POST["data"];

		$IdEvento 													= $_POST["idEvento"];
		$data_Usuario =new data_Usuario();
		$business_Usuario		= new business_Usuario();

		$data_Persona = new data_Persona();
		$data_Registro = new Registro();
			$business_Registro = new business_Registro();
			$business_Persona = new Business_Persona();
			$data_Usuario =new data_Usuario();
			$business_Usuario		= new business_Usuario();

		$personas = array();
		/*for ($i=0; $i < count($dni); $i++) {
			$personas[$i]["dni"] =  $dni[$i];
			$personas[$i]["nombre"] 							= strtoupper($nombre[$i]);
			$personas[$i]["apellido"] 						= strtoupper( $ApePat[$i])." ".strtoupper($ApeMat[$i]);
			$personas[$i]["correo"] 							= strtoupper($correo[$i]);
			$personas[$i]["telefono"] 						= $telefono[$i];
			$personas[$i]["estamento"] 						= strtoupper($estamento[$i]);

			$personas[$i]["ApePat"] 							= strtoupper($ApePat[$i]);
			$personas[$i]["ApeMat"] 							= strtoupper($ApeMat[$i]);
			$personas[$i]["estamentoex"] 					= strtoupper($estamentoex[$i]);
			$personas[$i]["fechaInicioContrato"] 	= $fechaInicioContrato[$i];
			$personas[$i]["fechaFinContrato"] 		= $fechaFinContrato[$i];
			$personas[$i]["dependencia"] 					= strtoupper($dependencia[$i]);
			$personas[$i]["unidadOrganica"] 			= strtoupper($unidadOrganica[$i]);
			$personas[$i]["cargo"] 								= strtoupper($cargo[$i]);
			$personas[$i]["dependenciacargo"] 		= strtoupper($dependenciacargo[$i]);
			$personas[$i]["modificar"]    				= strtoupper($modificar[$i]);

		}*/

			$data_Persona = new data_Persona();
			$data_Registro = new Registro();
			$business_Registro = new business_Registro();
			$business_Persona = new Business_Persona();


		foreach ($datos as $key => $value) {
			$data_Persona -> setVarDni($value["dni"]);
			$dtConsultarPersonaPorDni = $business_Registro -> fncBusinessConsultarPersonaPorDni($data_Persona);


			if (isset($dtConsultarPersonaPorDni[0]['Dni'])) {
				//echo($datos[0].'existe y esta habilitado');
				if ($dtConsultarPersonaPorDni[0]['Estado']==1) {
					$data_Registro -> setIdEvento(base64_decode($IdEvento) );
					$data_Registro -> setIdPersona($dtConsultarPersonaPorDni[0]['IdPersona']);
					$dtConsultarInscripcion = $business_Registro -> fncBusinessConsultarPersonaRegistrada($data_Registro);

					if (isset($dtConsultarInscripcion[0]['IdRegistro'])) {//si encuentra algo no registrara por ya esta inscrita
						//echo ($dtConsultarPersonaPorDni[0]['Dni'].' no se registrara a este evento por q ya es');
						$contRegistroRepetido++;
					}
					else{
						//echo ($dtConsultarPersonaPorDni[0]['Dni'].'se registrara a este evento');
					$IdEvento = str_replace(" ","",base64_decode($IdEvento));
					$data_Registro -> setIdEvento($IdEvento);
					$data_Registro -> setIdPersona($dtConsultarPersonaPorDni[0]['IdPersona']);
					$data_Registro -> setVarEstado(1);
					$data_Registro -> setVarDependencia(strtoupper($value["estamento"]));
					$data_Registro -> setVarDireccionIP(fncObtenerIpAdress());
					$data_Registro -> setVarDireccionMAC(fncObtenerMac());
					$data_Registro -> setVarNavegadorWeb(fnc_ObtenerNavegador());
					$data_Registro -> setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);


					$bolAgregarRegistro = $business_Registro -> fncBusinessAgregar($data_Registro);

						if ($bolAgregarRegistro) {
							$contRegistroNuevo++;
						}
					}

				}

			}else{

			$data_Persona->setVarDni($value["dni"]);
			$data_Persona->setVarNombre( strtoupper($value["nombre"] ));
			$data_Persona->setVarApellido(strtoupper($value["apellidoPat"])."".strtoupper($value["apellidoMat"]));

			$data_Persona->setVarCorreo( strtoupper($value["correo"]) );
			$data_Persona->setIntCelular( $value["telefono"] );
			$data_Persona->setVarClave( md5('123456') );
			$data_Persona->setVarEstado( 1 );
			$data_Persona->setVarUsuario($value["dni"]);
			$data_Persona->setIdTipoPersona( 1 );
			$data_Persona->setVarAvatar('avatar.jpg');

			$data_Persona->setApeMat(strtoupper($value["apellidoMat"]));
			$data_Persona->setApePat(strtoupper($value["apellidoPat"]));
			$data_Persona->setEstamento(strtoupper($value["estamentoex"]));
			$data_Persona->setFechaFinContrato($value["fechaFinContrato"]);
			$data_Persona->setFechaInicioContrato($value["fechaInicioContrato"]);
			$data_Persona->setDependencia(strtoupper($value["dependencia"]));
			$data_Persona->setUnidadOrganica(strtoupper($value["unidadOrganica"]));
			$data_Persona->setCargo(strtoupper($value["cargo"]));
			$data_Persona->setDependenciaCargo(strtoupper($value["dependenciacargo"]));

			$data_Persona->setVarDireccionIP(fncObtenerIpAdress());
			$data_Persona->setVarDireccionMAC(fncObtenerMac());
			$data_Persona->setVarNavegadorWeb(fnc_ObtenerNavegador());
			$data_Persona->setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);



			if ($value["estamento"] == "EXTERNO") {
				$data_Persona->	setIdTipoPersona( 2 );
			}



			$bolRegistrosCorrectos = $business_Persona -> fncBusinessAgregar($data_Persona);

			if ($bolRegistrosCorrectos) {

				$contPersonaNuevas++;


										$data_Usuario -> setUsuario(str_replace(" ","",$value["dni"]));
										$data_Usuario -> setClave(md5(str_replace(" ","",$value["dni"])));
										$data_Usuario -> setIdRol(3);
										$data_Usuario -> setVarNombres( strtoupper($value["nombre"]));
										$data_Usuario -> setvarApellidos(strtoupper($value["apellidoPat"])."".strtoupper($value["apellidoMat"]));
										$data_Usuario -> setEstado(1);
										$data_Usuario -> setCambioContrasena(1);
										$data_Usuario -> setDireccionIp(fncObtenerIpAdress());
										$data_Usuario -> setDireccionMac(fncObtenerMac());
										$data_Usuario -> setUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);



										$bolAgregarUsuario = $business_Usuario -> fncBusinessAgregarUsuario($data_Usuario);
			}



			}


		}
		foreach ($datos as $key => $value) {
			$data_Persona -> setVarDni($value["dni"]);
			$dtConsultarPersonaPorDni = $business_Registro -> fncBusinessConsultarPersonaPorDni($data_Persona);

			if (isset($dtConsultarPersonaPorDni[0]['Dni'])) {
				//echo($datos[0].'existe y esta habilitado');
				if ($dtConsultarPersonaPorDni[0]['Estado']==1) {
					$data_Persona -> setVarDni($value["dni"]);
					$data_Registro -> setIdPersona($dtConsultarPersonaPorDni[0]['IdPersona']);
					$dtConsultarInscripcion = $business_Registro -> fncBusinessConsultarPersonaRegistrada($data_Registro);

					if (isset($dtConsultarInscripcion[0]['IdRegistro'])) {//si encuentra algo no registrara por ya esta inscrita
						//echo ($dtConsultarPersonaPorDni[0]['Dni'].' no se registrara a este evento por q ya es');

					}
					else{
						//echo ($dtConsultarPersonaPorDni[0]['Dni'].'se registrara a este evento');
					$IdEvento = str_replace(" ","",base64_decode($IdEvento));
					$data_Registro -> setIdEvento($IdEvento);
					$data_Registro -> setIdPersona($dtConsultarPersonaPorDni[0]['IdPersona']);
					$data_Registro -> setVarEstado(1);
					$data_Registro -> setVarDependencia(strtoupper($value["estamento"]));
					$data_Registro -> setVarDireccionIP(fncObtenerIpAdress());
					$data_Registro -> setVarDireccionMAC(fncObtenerMac());
					$data_Registro -> setVarNavegadorWeb(fnc_ObtenerNavegador());
					$data_Registro -> setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);
					$bolAgregarRegistro = $business_Registro -> fncBusinessAgregar($data_Registro);

					if ($bolAgregarRegistro) {
						$contRegistroNuevo++;

						$mensajeAddRegist =$bolAgregarRegistro;
					}

					}

				}

			}else{

			$data_Persona->setVarDni($value["dni"]);
			$data_Persona->setVarNombre( strtoupper($value["nombre"] ));
			$data_Persona->setVarApellido( strtoupper($value["apellidoPat"])."".strtoupper($value["apellidoMat"]));

			$data_Persona->setVarCorreo(strtoupper( $value["correo"] ));
			$data_Persona->setIntCelular( $value["telefono"] );
			$data_Persona->setVarClave( md5('123456') );
			$data_Persona->setVarEstado( 1 );
			$data_Persona->setVarUsuario($value["dni"]);
			$data_Persona->	setIdTipoPersona( 1 );
			$data_Persona->setVarAvatar('avatar.jpg');


			$data_Persona->setApeMat(strtoupper($value["apellidoMat"]));
			$data_Persona->setApePat(strtoupper($value["apellidoPat"]));
			$data_Persona->setEstamento(strtoupper($value["estamentoex"]));
			$data_Persona->setFechaFinContrato($value["fechaFinContrato"]);
			$data_Persona->setFechaInicioContrato($value["fechaInicioContrato"]);
			$data_Persona->setDependencia(strtoupper($value["dependencia"]));
			$data_Persona->setUnidadOrganica(strtoupper($value["unidadOrganica"]));
			$data_Persona->setCargo(strtoupper($value["cargo"]));
			$data_Persona->setDependenciaCargo(strtoupper($value["dependenciacargo"]));
			$data_Persona->setVarDireccionIP(fncObtenerIpAdress());
			$data_Persona->setVarDireccionMAC(fncObtenerMac());
			$data_Persona->setVarNavegadorWeb(fnc_ObtenerNavegador());
			$data_Persona->setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);

			if ($value["estamento"] == "EXTERNO") {
				$data_Persona->	setIdTipoPersona( 2 );
			}

			$bolRegistrosCorrectos = $business_Persona -> fncBusinessAgregar($data_Persona);

			if ($bolRegistrosCorrectos) {

				$mensaje = $bolRegistrosCorrectos();
				$contPersonaNuevas++;



										$data_Usuario -> setUsuario(str_replace(" ","",$value["dni"]));
										$data_Usuario -> setClave(md5(str_replace(" ","",$value["dni"])));
										$data_Usuario -> setIdRol(3);
										$data_Usuario -> setVarNombres( strtoupper($value["nombre"]));
										$data_Usuario -> setvarApellidos(strtoupper($value["apellidoPat"])."".strtoupper($value["apellidoMat"]));
										$data_Usuario -> setEstado(1);
										$data_Usuario -> setCambioContrasena(1);
										$data_Usuario -> setDireccionIp(fncObtenerIpAdress());
										$data_Usuario -> setDireccionMac(fncObtenerMac());
										$data_Usuario -> setUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);


										$bolAgregarUsuario = $business_Usuario -> fncBusinessAgregarUsuario($data_Usuario);
			}

			}


		}

		/* --------	verificar solicitud  de actualizacion ---------*/

			$Permod = $datos;
			foreach ($Permod as $key => $value) {


			if ($value["modificar"]=='0') {


			}else{



			$data_Persona->setIdPersona( str_replace(' ','', $value["modificar"]));

			$data_Persona->setVarNombre( strtoupper($value["nombre"] ));
			$data_Persona->setVarApellido( strtoupper($value["apellidoPat"])."".strtoupper($value["apellidoMat"]));

			$data_Persona->setVarCorreo(strtoupper( $value["correo"] ));
			$data_Persona->setIntCelular( $value["telefono"] );
			$data_Persona->setVarClave( md5('123456') );
			$data_Persona->setVarEstado( 1 );
			$data_Persona->setVarUsuario($value["dni"]);
			$data_Persona->setIdTipoPersona( 1 );
			$data_Persona->setVarAvatar('avatar.jpg');


			$data_Persona->setApeMat(strtoupper($value["apellidoMat"]));
			$data_Persona->setApePat(strtoupper($value["apellidoPat"]));
			$data_Persona->setEstamento(strtoupper($value["estamentoex"]));
			$data_Persona->setFechaFinContrato($value["fechaFinContrato"]);
			$data_Persona->setFechaInicioContrato($value["fechaInicioContrato"]);
			$data_Persona->setDependencia(strtoupper($value["dependencia"]));
			$data_Persona->setUnidadOrganica(strtoupper($value["unidadOrganica"]));
			$data_Persona->setCargo(strtoupper($value["cargo"]));
			$data_Persona->setDependenciaCargo(strtoupper($value["dependenciacargo"]));
			$data_Persona->setVarDireccionIP(fncObtenerIpAdress());
			$data_Persona->setVarDireccionMAC(fncObtenerMac());
			$data_Persona->setVarNavegadorWeb(fnc_ObtenerNavegador());
			$data_Persona->setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);


			if ($value["estamento"] == "EXTERNO") {
				$data_Persona->	setIdTipoPersona( 2 );
			}

			//print_r($data_Persona);
			//echo("<br>");

			$bol = $business_Persona -> fncBusinessModificarMasivo($data_Persona);
			//print_r($bol);
			}


		}


		//print_r($Permod);


		/*  ------ ////	verificar solicitud  de actualizacion ---------*/


echo(1);





			$_SESSION['registroMasivo']["contRegistros"] 		= count($personas);
			$_SESSION['registroMasivo']["contPersonaNuevas"] 	= $contPersonaNuevas;
			$_SESSION['registroMasivo']["contRegistroNuevo"] 	= $contRegistroNuevo;
			$_SESSION['registroMasivo']["contRegistroRepetido"] 	= $contRegistroRepetido;


			$url_parametros_asistentes_a_evento['v'] = 'registradosPorEventoMes';
      $url_parametros_asistentes_a_evento['id'] = base64_encode( base64_decode($_POST['IdEvento']) );
		 	//header('Location: ../modules/Registro.php?' . http_build_query($url_parametros_asistentes_a_evento));

	}
	function fnc_AgregarMasivoAccionSoloPersonas()
	{
		@session_start();
		//$url_parametros['sesion'] = $sex;

		$contPersonaNuevas = 0;
		//$contRegistroNuevo = 0;
		//$contRegistroRepetido=0;

		$datos			= $_POST["data"];

		$IdEvento 													= $_POST["idEvento"];


		// $dni 									= $_POST["dni"];
		// $nombre 							= $_POST["nombre"];
		// //$apellido = $_POST["apellido"];
		// $correo 							= $_POST["correo"];
		// $telefono 						= $_POST["telefono"];
		// $estamento 						= $_POST["estamento"];
		// $ApePat 							= $_POST["apellidoPat"];
		// $ApeMat 							= $_POST["apellidoMat"];
		// $estamentoex 					= $_POST['estamentoex'];
		// $fechaInicioContrato  = $_POST['fechaInicioContrato'];
		// $fechaFinContrato  		= $_POST['fechaFinContrato'];
		// $dependencia 					= $_POST['dependencia'];
		// $unidadOrganica 			= $_POST['unidadOrganica'];
		// $cargo 								= $_POST['cargo'];
		// $dependenciacargo 		= $_POST['dependeciaCargo'];
		// $modificar 						= $_POST['modificar'];

		// $personas = array();
		// for ($i=0; $i < count($dni); $i++) {
		// 	$personas[$i]["dni"] 									= $dni[$i];
		// 	$personas[$i]["nombre"] 							= strtoupper($nombre[$i]);
		// 	$personas[$i]["apellido"] 						= strtoupper($ApePat[$i]." ".$ApeMat[$i]);
		// 	$personas[$i]["correo"] 							= strtoupper($correo[$i]);
		// 	$personas[$i]["telefono"]						  = $telefono[$i];
		// 	$personas[$i]["estamento"] 						= strtoupper($estamento[$i]);

		// 	$personas[$i]["ApePat"] 							= strtoupper($ApePat[$i]);
		// 	$personas[$i]["ApeMat"] 							= strtoupper($ApeMat[$i]);
		// 	$personas[$i]["estamentoex"] 					= strtoupper($estamentoex[$i]);
		// 	$personas[$i]["fechaInicioContrato"] 	= $fechaInicioContrato[$i];
		// 	$personas[$i]["fechaFinContrato"] 		= $fechaFinContrato[$i];
		// 	$personas[$i]["dependencia"] 					= strtoupper($dependencia[$i]);
		// 	$personas[$i]["unidadOrganica"] 			= strtoupper($unidadOrganica[$i]);
		// 	$personas[$i]["cargo"] 								= strtoupper($cargo[$i]);
		// 	$personas[$i]["dependenciacargo"] 		= strtoupper($dependenciacargo[$i]);
		// 	$personas[$i]["modificar"]    				= $modificar[$i];

		// }


			$business_Registro  = new business_Registro();
			$business_Persona 	= new Business_Persona();
			$business_Usuario		= new business_Usuario();

			$data_Persona 			= new data_Persona();
			$data_Usuario 			= new data_Usuario();
			$data_Registro 			= new Registro();

		foreach ($datos as $key => $value) {

				$data_Persona -> setVarDni($value["dni"]);
				$dtConsultarPersonaPorDni = $business_Registro -> fncBusinessConsultarPersonaPorDni($data_Persona);
				//$dtConsultarPersonaPorDni = $business_Registro -> fncBusinessConsultarPersonaPorDni($data_Persona);

			if (count($dtConsultarPersonaPorDni)>0){


			}else{

					//$data_Persona = new data_Persona();
					$data_Persona->setVarDni($value["dni"]);
					$data_Persona->setVarNombre( strtoupper($value["nombre"]) );
					$data_Persona->setVarApellido(strtoupper($value["apellidoPat"])."".strtoupper($value["apellidoMat"]));

					$data_Persona->setVarCorreo( strtoupper($value["correo"] ));
					$data_Persona->setIntCelular( $value["telefono"] );
					$data_Persona->setVarClave( md5('123456') );
					$data_Persona->setVarEstado( 1 );
					$data_Persona->setVarUsuario($value["dni"]);
					$data_Persona->setIdTipoPersona( 1 );
					$data_Persona->setVarAvatar('avatar.jpg');

					$data_Persona->setApeMat(strtoupper($value["apellidoMat"]));
					$data_Persona->setApePat(strtoupper($value["apellidoPat"]));
					$data_Persona->setEstamento(strtoupper($value["estamentoex"]));
					$data_Persona->setFechaFinContrato($value["fechaFinContrato"]);
					$data_Persona->setFechaInicioContrato($value["fechaInicioContrato"]);
					$data_Persona->setDependencia(strtoupper($value["dependencia"]));
					$data_Persona->setUnidadOrganica(strtoupper($value["unidadOrganica"]));
					$data_Persona->setCargo(strtoupper($value["cargo"]));
					$data_Persona->setDependenciaCargo(strtoupper($value["dependenciacargo"]));
					$data_Persona->setVarDireccionIP(fncObtenerIpAdress());
					$data_Persona->setVarDireccionMAC(fncObtenerMac());
					$data_Persona->setVarNavegadorWeb(fnc_ObtenerNavegador());
					$data_Persona->setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);

						if ($value["estamento"] == "EXTERNO") {
							$data_Persona->	setIdTipoPersona( 2 );
						}



						$bolRegistrosCorrectos = $business_Persona -> fncBusinessAgregar($data_Persona);

						if ($bolRegistrosCorrectos) {
							echo("modifico");
							$contPersonaNuevas++;

							/**registro de usuarios para cada persona ingresada nueva */

													//echo ("se agrego y se creara susuario");

													$data_Usuario -> setUsuario(str_replace(" ","",$value["dni"]));
													$data_Usuario -> setClave(md5(str_replace(" ","",$value["dni"])));
													$data_Usuario -> setIdRol(3);
													$data_Usuario -> setVarNombres( strtoupper($value["nombre"]));
													$data_Usuario -> setvarApellidos(strtoupper($value["apellidoPat"])."".strtoupper($value["apellidoMat"]));
													$data_Usuario -> setEstado(1);
													$data_Usuario -> setCambioContrasena(1);
													$data_Usuario -> setDireccionIp(fncObtenerIpAdress());
													$data_Usuario -> setDireccionMac(fncObtenerMac());
													$data_Usuario -> setUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);



													$bolAgregarUsuario = $business_Usuario -> fncBusinessAgregarUsuario($data_Usuario);

							/**//// registro de usuarios para cada persona ingresada*/
						}



			}


		}



			/* --------	verificar solicitud  de actualizacion ---------*/

			$Permod = $datos;
			foreach ($Permod as $value) {
			$data_Persona = new data_Persona();

			if ($value["modificar"]==0) {


			}else{



			$data_Persona->setIdPersona($value["modificar"]);
			//$data_Persona->setVarDni( str_replace(' ','', $value["dni"]));
			$data_Persona->setVarNombre( strtoupper($value["nombre"] ));
			$data_Persona->setVarApellido( strtoupper($value["apellidoPat"])."".strtoupper($value["apellidoMat"]));
			$data_Persona->setVarCorreo(strtoupper( $value["correo"] ));
			$data_Persona->setIntCelular( $value["telefono"] );
			$data_Persona->setVarEstado( 1 );
			$data_Persona->setVarUsuario($value["dni"]);
			$data_Persona->setVarClave( md5('123456'));
			$data_Persona->setVarAvatar('avatar.jpg');
			$data_Persona->setIdTipoPersona( 1 );



			$data_Persona->setApeMat(strtoupper($value["apellidoMat"]));
			$data_Persona->setApePat(strtoupper($value["apellidoPat"]));
			$data_Persona->setEstamento(strtoupper($value["estamentoex"]));
			$data_Persona->setFechaFinContrato($value["fechaFinContrato"]);
			$data_Persona->setFechaInicioContrato($value["fechaInicioContrato"]);
			$data_Persona->setDependencia(strtoupper($value["dependencia"]));
			$data_Persona->setUnidadOrganica(strtoupper($value["unidadOrganica"]));
			$data_Persona->setCargo(strtoupper($value["cargo"]));
			$data_Persona->setDependenciaCargo(strtoupper($value["dependenciacargo"]));
			$data_Persona->setVarDireccionIP(fncObtenerIpAdress());
			$data_Persona->setVarDireccionMAC(fncObtenerMac());
			$data_Persona->setVarNavegadorWeb(fnc_ObtenerNavegador());
			$data_Persona->setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);


			if ($value["estamento"] == "EXTERNO") {
				$data_Persona->	setIdTipoPersona( 2 );
			}



			$bol = $business_Persona -> fncBusinessModificarMasivo($data_Persona);

			}


		}



		/*  ------ ////	verificar solicitud  de actualizacion ---------*/

			echo(1);


			$_SESSION['registroMasivo']["contRegistros"] 		= count($personas);
			$_SESSION['registroMasivo']["contPersonaNuevas"] 	= $contPersonaNuevas;
			//$_SESSION['registroMasivo']["contRegistroNuevo"] 	= $contRegistroNuevo;
			//$_SESSION['registroMasivo']["contRegistroRepetido"] 	= $contRegistroRepetido;


			//$url_parametros_asistentes_a_evento['v'] = 'index';
           // $url_parametros_asistentes_a_evento['id'] = base64_encode( $_POST['IdEvento']);
		 	//header('Location: ../modules/persona.php?' . http_build_query($url_parametros_asistentes_a_evento));

	}
	function fnc_AgregarMasivo()
	{
		@session_start();
		//$url_parametros['sesion'] = $sex;

		if ($_FILES['archivo']["error"] > 0)
			{
			$url_parametros['v'] = 'index';
		 	header('Location: ../modules/Registro.php?' . http_build_query($url_parametros));
			}
			else
			{
			$nombre=$_FILES['archivo']['name'];
			move_uploaded_file($_FILES['archivo']['tmp_name'],"../files/" . $_FILES['archivo']['name']);
			}

			$data_Persona = new data_Persona();
			$data_Registro = new Registro();
			$business_Registro = new business_Registro();
			$business_Persona = new Business_Persona();
			$dtConsultarPersonaPorDni="";




			$archivo = fopen("../files/".$nombre, "r");
			while (($datos = fgetcsv($archivo, ",")) == true)
			{
			$num = count($datos);
			$data_Persona -> setVarDni($datos[0]);
			$dtConsultarPersonaPorDni = $business_Registro -> fncBusinessConsultarPersonaPorDni($data_Persona);

			if (isset($dtConsultarPersonaPorDni[0]['Dni'])) {
				//echo($datos[0].'existe y esta habilitado');
				if ($dtConsultarPersonaPorDni[0]['Estado']==1) {
					$data_Registro -> setIdEvento($_POST['IdEvento']);
					$data_Registro -> setIdPersona($dtConsultarPersonaPorDni[0]['IdPersona']);
					$dtConsultarInscripcion = $business_Registro -> fncBusinessConsultarPersonaRegistrada($data_Registro);

					if (isset($dtConsultarInscripcion[0]['IdRegistro'])) {//si encuentra algo no registrara por ya esta inscrita
						//echo ($dtConsultarPersonaPorDni[0]['Dni'].' no se registrara a este evento por q ya es');
					}
					else{
						//echo ($dtConsultarPersonaPorDni[0]['Dni'].'se registrara a este evento');
					$IdEvento = str_replace(" ","",$_POST["IdEvento"]);
					$data_Registro -> setIdEvento($IdEvento);
					$data_Registro -> setIdPersona($dtConsultarPersonaPorDni[0]['IdPersona']);
					$data_Registro -> setVarEstado(1);
					$bolAgregarRegistro = $business_Registro -> fncBusinessAgregar($data_Registro);
					}

				}

			}else{
			//$data_Persona = new data_Persona();
			$data_Persona->setVarDni($datos[0]);
			$data_Persona->setVarNombre( $datos[1] );
			$data_Persona->setVarApellido( $datos[2]);
			$data_Persona->setIdTipoPersona( 3 );
			$data_Persona->setVarCorreo( $datos[3] );
			$data_Persona->setIntCelular( $datos[4] );
			$data_Persona->setVarClave( md5('123456') );
			$data_Persona->setVarEstado( 1 );
			$data_Persona->setVarUsuario($datos[0]);
			$data_Persona->	setIdTipoPersona( 2 );
			$data_Persona->setVarAvatar('avatar.jpg');

			$business_PersonaInterna = new business_Persona();

			$dtListaInterna = $business_PersonaInterna -> fncBusinessConsultarDniInterno($data_Persona->getVarDni());
			if (count($dtListaInterna)) {
				foreach ($dtListaInterna as $value) {

					$data_Persona-> setVarNombre($value["NomPer"]);
					$data_Persona-> setVarApellido($value["ApepPer"].' '.$value["ApemPer"]);
					$data_Persona->	setIdTipoPersona( 1 );


				}
			}

			$bolRegistrosCorrectos = $business_Persona -> fncBusinessAgregar($data_Persona);

			// if ($bolRegistrosCorrectos) {

			// 							//echo ("se agrego y se creara susuario");
			// 							$data_Usuario =new data_Usuario();
			// 							$data_Usuario -> setUsuario(str_replace(" ","",$value["dni"]));
			// 							$data_Usuario -> setClave(md5(str_replace(" ","",$value["dni"])));
			// 							$data_Usuario -> setIdRol(3);
			// 							$data_Usuario -> setVarNombres( strtoupper($value["nombre"]));
			// 							$data_Usuario -> setvarApellidos(strtoupper($value["ApePat"])."".strtoupper($value["ApeMat"]));
			// 							$data_Usuario -> setEstado(1);
			// 							$data_Usuario -> setCambioContrasena(1);

			// 							$business_Usuario		= new business_Usuario();
			// 							$bolAgregarUsuario = $business_Usuario -> fncBusinessAgregarUsuario($data_Usuario);
			// }



			}




			}
			$archivor = fopen("../files/".$nombre, "r");
			while (($datos = fgetcsv($archivor, ",")) == true)
			{
			$num = count($datos);
			$data_Persona -> setVarDni($datos[0]);
			$dtConsultarPersonaPorDni = $business_Registro -> fncBusinessConsultarPersonaPorDni($data_Persona);

			if (isset($dtConsultarPersonaPorDni[0]['Dni'])) {
				//echo($datos[0].'existe y esta habilitado');
				if ($dtConsultarPersonaPorDni[0]['Estado']==1) {
					$data_Registro -> setIdEvento($_POST['IdEvento']);
					$data_Registro -> setIdPersona($dtConsultarPersonaPorDni[0]['IdPersona']);
					$dtConsultarInscripcion = $business_Registro -> fncBusinessConsultarPersonaRegistrada($data_Registro);

					if (isset($dtConsultarInscripcion[0]['IdRegistro'])) {//si encuentra algo no registrara por ya esta inscrita
						//echo ($dtConsultarPersonaPorDni[0]['Dni'].' no se registrara a este evento por q ya es');
					}
					else{
						//echo ($dtConsultarPersonaPorDni[0]['Dni'].'se registrara a este evento');
					$IdEvento = str_replace(" ","",$_POST["IdEvento"]);
					$data_Registro -> setIdEvento($IdEvento);
					$data_Registro -> setIdPersona($dtConsultarPersonaPorDni[0]['IdPersona']);
					$data_Registro -> setVarEstado(1);
					$bolAgregarRegistro = $business_Registro -> fncBusinessAgregar($data_Registro);
					}

				}

			}


			}
			//Cerramos el archivo
			fclose($archivo);



		// 	$business_Empresa = new business_Empresa();
		// 	$bolAgregarEmpresa = $business_Empresa -> fncBusinessAgregar($data_Empresa);

		// 	if($bolAgregarEmpresa){
		// 		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";
		// 		$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";
		// 	}else{
		// 		$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";
		// 		$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro el registro. Inténtelo nuevamente.";
		// 	}
		 	$url_parametros['v'] = 'index';
		 	header('Location: ../modules/Registro.php?' . http_build_query($url_parametros));
		// }else{
		// 	header('Location: ../index.php?' . http_build_query($url_parametros));
		// }
	}


	function fnc_IncribirUsuario()
	{
		@session_start();

		$bussines_persona = new business_Persona();
		$data_Persona = new data_Persona();

		$data_Persona ->setVarDni($_SESSION['usuario']["ses_Dni"]);
		$dt_persona =  $bussines_persona -> fncBusinessBuscarIdPorDni($data_Persona);

		$data_Registro = new Registro();
		$business_Registro = new  business_Registro();

		if (count($dt_persona)>0) {


				$data_Registro -> setIdEvento( $_POST["IdEvento"]);
				$data_Registro -> setIdPersona( $dt_persona[0]["IdPersona"]  );

				$bolrespuesta = $business_Registro -> fncBusinessConsultarPersonaRegistrada($data_Registro);

				if (count($bolrespuesta)>0) {
					//enrutar
				}
				else {

							$data_Registro -> setVarDependencia('EXTERNO');
							$data_Registro -> setVarEstado(1);
							$data_Registro -> setVarDireccionIP(fncObtenerIpAdress());
							$data_Registro -> setVarDireccionMAC(fncObtenerMac());
							$data_Registro -> setVarNavegadorWeb(fnc_ObtenerNavegador());
							$data_Registro -> setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);
							$bolAgregarRegistro = $business_Registro -> fncBusinessAgregar($data_Registro);

//							echo ($bolAgregarRegistro);
							header('Location: ../modules/Registro.php?v=pageRegistro');
				}
		}
		else{
			echo("aqui");
		}



	}
	function fnc_IncribirUsuarioIndividual()
	{
		@session_start();

		$data_Registro = new Registro();
		$business_Registro = new  business_Registro();

		$data_Registro -> setIdEvento( $_GET["IdEvento"]);
		$data_Registro -> setIdPersona( $_GET["IdPersona"]  );

		$bolrespuesta = $business_Registro -> fncBusinessConsultarPersonaRegistrada($data_Registro);
		$respuesta["respuesta"] = "";
		if (count($bolrespuesta)>0) {
			$respuesta["btrespuesta"] = 0;
			$respuesta["mensaje"] = "La Persona Ya Se Encuentra Registrada al Evento";
			header('Content-Type: application/json; charset=utf-8');

			  echo json_encode (utf8_converter($respuesta));
		}else {

			$data_Registro -> setVarDependencia('EXTERNO');
			$data_Registro -> setVarEstado(1);
			$data_Registro -> setVarDireccionIP(fncObtenerIpAdress());
			$data_Registro -> setVarDireccionMAC(fncObtenerMac());
			$data_Registro -> setVarNavegadorWeb(fnc_ObtenerNavegador());
			$data_Registro -> setVarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"]);
			$bolAgregarRegistro = $business_Registro -> fncBusinessAgregar($data_Registro);
			$respuesta["btrespuesta"] = 1;
			$respuesta["mensaje"] ="Exito en el Registro";

			header('Content-Type: application/json; charset=utf-8');

			echo json_encode (utf8_converter($respuesta));
		}

	}

	function fnc_borrarPersonaEvento()
	{
		@session_start();
		$validacion_post = true;
		if( !isset($_GET["IdEvento"]) || $_GET["IdEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_GET["IdPersona"]) || $_GET["IdPersona"] == "" ){ $validacion_post = false; }


		if ($validacion_post == true){

			$business_Registro = new  business_Registro();
			$bolEliminar = $business_Registro -> fncBusinessEliminarPersonaEvento($_GET["IdEvento"], $_GET["IdPersona"]);

			if( $bolEliminar )
			{
				echo 1;
			}else{
				echo 0;
			}

			// if ( $_SESSION['empresa']['rucvalidado'] == true ){
			// 	$response['mensaje'] = true;
			// }else{
			// 	$response['mensaje'] = false;
			// }
			// header('Content-Type: application/json; charset=utf-8');
			// echo json_encode($response);

		}else{
			echo 0;
		}

	}


	function utf8_converter($array){
		array_walk_recursive($array, function(&$item, $key){
		if(!mb_detect_encoding($item, 'utf-8', true)){
		$item = utf8_encode($item);
		}
		});

		return $array;
	}



?>
