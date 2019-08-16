<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_ControlAsistencia.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Persona.php');
	
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_ControlAsistencia.php');
	//include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_sms.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Persona.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_DetalleEvento.php');
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
			case 'reporte':
				view_reporteEntradaSalida();
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
			case 'xRgrQTUH':
					fnc_ChardAsitencia();
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

	function view_reporteEntradaSalida(){
		@session_start();
		$menu_activo = "mantenimiento_evento_index";
        $get_id = base64_decode($_GET["id"]);
        $businessControlAsistencia = new business_ControlAsistencia(); //agregar horaios creados
		$dtConsultarEntradaSalida= $businessControlAsistencia -> fncBusinessConsultarEntradaSalida($get_id);
		$business_DetalleEvento = new business_DetalleEvento();
		$dtDetalleEvento = new data_DetalleEvento();
		$dtDetalleEvento -> setIdEvento($get_id);
		$dtListarDetalleEventos = $business_DetalleEvento -> fncBusinessListarEventosDetalle($dtDetalleEvento);
		$dtConsultarEntradaSalida = utf8_converter($dtConsultarEntradaSalida);
		$dtListarDetalleEventos = utf8_converter($dtListarDetalleEventos);
		
	
		
		include('../views/includes/header.php');
		include('../views/mod_control_Asistencia/reporteEntradaSalida.php');
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

	function fnc_Agregar()
	{


		$codEvento 		= $_GET['di'];		
		$codQr		 	= $_GET['qr']; //Ny85    el fomrato es  
		$qR 			= base64_decode ($codQr);// /9							"/71391320"
		$qR				= base64_decode($codEvento).$qR;		// 				5/71391320
		$entradaSalida = $_GET["entradaSalida"];


		$response = array();


		$response['Respuesta'] = -1; // -1: Por Defecto | 0: Incorrecto, Error | 1: Correcto | 2: Advertencia
		$response['RespuestaTexto'] = '';

		//echo($qR);
		$qR 			= explode("/",$qR);
		$FechaInicio 	= $_GET['InicioFecha'];
		$FechaFin 		= $_GET['FinFecha'];
		

		// buscando id del dni

		$data_persona= new data_Persona();
		$business_Persona = new business_Persona();
		$dni = $qR[1];
		$data_persona-> setVarDni($dni);		
		$dtConsultarIdPorDni = $business_Persona -> fncBusinessBuscarIdPorDni($data_persona);//buscadmos el dni para luego dar valor a $qR[1] con el idPersona   buscado mediante un dni
		$qR[1] = $dtConsultarIdPorDni[0]['IdPersona'];

		//echo($dtConsultarIdPorDni[0]['Nombre'].$dtConsultarIdPorDni[0]['IdPersona']);
		//echo($dni);

		// fin buscando id del dni

		
		if ($qR[0] == base64_decode($codEvento)) {
			
																						// $qR[0],$qR[1]    identificador para evento, identificador para usuario
			$businessControlAsistencia = new business_ControlAsistencia();
			$dtConsultarRegistro = $businessControlAsistencia -> fncBusinessBuscarRegistro($qR[0],$qR[1]); //busqueda de algun registro de inscripcion tabla REGISTRO
			if (count ($dtConsultarRegistro) == 0) {
				$response['Respuesta'] = 0;
				$response['RespuestaTexto'] = 'El DNI: '.$dni.' no esta inscrito al evento';
				// echo("No esta inscrito al evento $qR[0] --- $qR[1] "); //sii
												// idevento ----  idusuario
			} else {
				
				$dtConsultarFechaHora = $businessControlAsistencia -> fncBusinessObtenerFechaHora();
				$dtConsultarHora = $businessControlAsistencia -> fncBusinessObtenerHora();
				$Fecha = $dtConsultarFechaHora[0]["Fecha"];
				$Hora = $dtConsultarHora[0]["Hora"];
				// $Hora = new Datetime($Hora);
				$Verificacion = fnc_RevisarFechaEntreRangos($FechaInicio,$FechaFin,$Fecha);
				
				if ($Verificacion) { // si esta dentro del rango de fechas  true/false
					
					// $IdUltimoResgistro ="";
					// $dtConsultarRegistroExistente = $businessControlAsistencia -> fncBusinessObtenerRegistroIdPersonaIdEvento($qR[1],$qR[0]); // verificacion de que exista alguna asistencia tabla CONTROL_REGISTRO
					// if (count($dtConsultarRegistroExistente)>0) { //si ecnutra almenos un registro
					// 	$contarregistros = 0;
					// 	foreach ($dtConsultarRegistroExistente as $key => $RegistrosExistentes) {	
					// 			$registroFechaExistente= $RegistrosExistentes["FechaAsistencia"];		
							
					// 			if ( $registroFechaExistente === $Fecha) {
					// 				$contarregistros++;		
					// 			} 
					// 			$IdUltimoResgistro = $RegistrosExistentes["IdControlAsistencia"]; //ultimo registro del control de asistenci atabla CONTROL ASISTEnCIA
					// 	}
					// 	if ($contarregistros == 0) {							
					// 		$respuestas = fnc_InsertarRegistroAsistencia($qR[1],$qR[0]);
					// 		echo ("Gracias por volver");
					// 	} else {			
					// 		if ($entradaSalida == 1) {
					// 			$respuesta = fnc_InsertarRegistroAsistenciaSalida($IdUltimoResgistro);
					// 			echo("salida".$IdUltimoResgistro);
					// 		} else {
					// 			echo("repetido");
					// 		}
											
							
					// 	}					
						
					// } else {
					// 		$respuestas = fnc_InsertarRegistroAsistencia($qR[1],$qR[0]);
					// 		echo("Bienvenido al Evento $respuestas");
					// 	}

						$fecFecha=new DateTime($Fecha);

						$data_detalleAsistencia = new business_DetalleEvento();
						$dtDetallesistencia = $data_detalleAsistencia -> fncBusinessListarDetallePorIdEvento(base64_decode($codEvento),$Fecha);
						$suma="";
						$cont=0;
						$array = array();
						
						 
						$verificacion = false;
						if (count($dtDetallesistencia)>0) {

							$arrayFiltros = array();
							$bolAgregarAsistencia = true;						 
							$Horaserver = new DateTime($Hora);					 
							$Tolerancia= new DateTime('00:20');



							$Horaservernuevo=strtotime($Hora);
							$valorHoraRestas =  strtotime('23:59');
							$contenedorMenorFecha = array();
							$contadorcont=0;
					
							$posi =0;
							foreach ($dtDetallesistencia as $value) {
								# code...
								$suma = $suma."----". $value['IdDetalleEvento']."--".$value['Nombre']."--".$value['InicioHora']."---".$value["FinHora"]."<br>";
								
	
								$array[$cont][0]= $value['IdDetalleEvento'];
								$array[$cont][1]= $value['InicioHora'];
								$array[$cont][2]= $value["FinHora"];
								$array[$cont][3]= $value["Comentario"];
						

								$IniciodeHora= strtotime($value['InicioHora']);
								$FindeHora=strtotime($value['FinHora']);								
								$diferenciaFinDeHora = ($Horaservernuevo)-($FindeHora);
								$diferenciaFinDeHora= abs($diferenciaFinDeHora);
							
								if (/*$valorHoraRestas>$diferenciaInicioDeHora || */$valorHoraRestas>$diferenciaFinDeHora ) {
								
									$posi=$value['IdDetalleEvento'];
									$valorHoraRestas = $diferenciaFinDeHora;
							
									

								}
								

								$cont++;

							}
							
							
							for ($i=0; $i < count($array) ; $i++) { 
								
								
								$uno = new DateTime($array[$i][1]);
								$dos = new DateTime($array[$i][2]);
								$difUno= $uno->diff($Horaserver);
								$difDos= $dos->diff($Horaserver);
	
								$estadoUno='';
								$estadoDos='';
								if ($uno < $Horaserver) {
									$estadoUno='Despues';
								}else{
									$estadoUno='Antes';
	
								}
								if ($dos < $Horaserver) {
									$estadoDos='Despues';
								}else{
									$estadoDos='Antes';
									
								}
								
								
								$array[$i][4] = $Tolerancia->diff($uno);
								$array[$i][4] = $array[$i][4]->format("%H:%I");
								$array[$i][5] = $uno ->modify("+20 minutes");
								$array[$i][5] = $array[$i][5] ->format('H:i');
								$array[$i][8] = $estadoUno;
								
								
							
	
								$array[$i][6] = $Tolerancia->diff($dos);
								$array[$i][6] = $array[$i][6]->format("%H:%I");
								$array[$i][7] = $dos ->modify("+20 minutes"); 
								$array[$i][7] = $array[$i][7]->format('H:i');
								$array[$i][9] = $estadoDos;
	
								// [][0]		IdDetalle
								// [][1]		InicioHora
								// [][2]		FinHora
								// [][4]		inicio de la tolerancia de  InicioHora
								// [][5]		Fin de la Toleranci de 		InicioHora
								// [][6]		inicio de la tolerancia de  FinHora
								// [][7]		Fin de la Toleranci de 		FinHora
	
								// $print1 =''. $difUno->format('%H:%I').PHP_EOL;
								// $print2 =''. $difDos->format('%H:%I').PHP_EOL;
								// echo("\n");
								// echo($array[$i][5]);
								// echo("\n");
					
								// echo('inicio:'.$print1.'->'.$estadoUno);
								// echo("\n");
					
								// echo('Fin   :'.$print2.'->'.$estadoDos);
								// echo("\n");
								// echo("***********************");							
	
							}
							for ($i=0; $i < count($array) ; $i++) { 
	
								$HI= new DateTime($array[$i][4] );
								$HF= new DateTime($array[$i][5] );
								if ($Horaserver>=$HI && $Horaserver<=$HF) {
									$arrayFiltros[$i][0]=$array[$i][0];//DetalleEvento
									$arrayFiltros[$i][1]=$qR[1];//Usuario
									$arrayFiltros[$i][2]=$qR[0];//evento
									$arrayFiltros[$i][3]='Inicio';
									$arrayFiltros[$i][4]=$array[$i][3];//Comentario
									$arrayFiltros[$i][5]=$array[$i][8];//Antes-Despues
									$arrayFiltros[$i][6]=$array[$i][4];// de
									$arrayFiltros[$i][7]=$array[$i][5];//hasta
									$arrayFiltros[$i][8]=$array[$i][6];// de  entrada
									$arrayFiltros[$i][9]=$array[$i][7];//hasta  entrada
 									
								}
								$HI= new DateTime($array[$i][6] );
								$HF= new DateTime($array[$i][7] );
								if($Horaserver>=$HI && $Horaserver<=$HF){
									$arrayFiltros[$i][0]=$array[$i][0];//detalleEvento
									$arrayFiltros[$i][1]=$qR[1];//Usuario
									$arrayFiltros[$i][2]=$qR[0];//evento
									$arrayFiltros[$i][3]='Fin';
									$arrayFiltros[$i][4]=$array[$i][3];//Comentario
									$arrayFiltros[$i][5]=$array[$i][9];//Antes-Despues
									$arrayFiltros[$i][6]=$array[$i][4];// de
									$arrayFiltros[$i][7]=$array[$i][5];//hasta
									$arrayFiltros[$i][8]=$array[$i][6];// de salida
									$arrayFiltros[$i][9]=$array[$i][7];//hasta salida
								}
								
								
							}

							// $response = array();
							// array_push($response, ($dtListarCronograma));
							// header('Content-Type: application/json; charset=utf-8');
							// echo '{"items":' . json_encode($response[0]) . '}';
							
							//$respuesta = array();
							
							if ( count($arrayFiltros)==0 ) {
								//print_r($arrayFiltros); 
							}else {
								// print_r($arrayFiltros); //sii
							}
							
							
							if (count($arrayFiltros) ==0 ) {
								
								if ($entradaSalida == 1) {
										//$respuesta["respuesta"]["Marcacion"] = "Marcado Libre";
										// echo (" Marcacion libre  \n $dni");	 //sii																									
										$bolAgregarAsistencia = $businessControlAsistencia -> fncBusinessAgregarControlAsistenciaAutomaticoNull($qR[1],$qR[0], $posi);
										if($bolAgregarAsistencia){
											$response['Respuesta'] = 1;
											$response['RespuestaTexto'] = 'El DNI:'.$dni.' se registró con marcación libre';
										}else{
											$response['Respuesta'] = 0;
											$response['RespuestaTexto'] = 'Error en registro de marcación';
										}
								}else {
									//$respuesta["respuesta"]["Marcacion"] = "No Esta Dentro del horario de Marcado";
									// echo("No Esta Dentro del horario de Marcacion"); //sii
									$response['Respuesta'] = 0;
									$response['RespuestaTexto'] = 'El DNI:'.$dni.' no esta dentro del horario de marcación';
								}
							}
							for ($a=0; $a < 3; $a++) { 
								if (array_key_exists($a, $arrayFiltros)) {
											$dtControlAsistencia = $businessControlAsistencia -> fncBusinessObtenerRegistroIdPersonaIdEventoIdDetalle($qR[1],$qR[0],$arrayFiltros[$a][0]);
										if (count($dtControlAsistencia)==0) {

											if ($arrayFiltros[$a][3]=='Inicio') {
												// echo("se ingresa inicio \n "); //sii
												// echo ($arrayFiltros[$a][0].'+'.$qR[1].'+'.$qR[0]); //sii
												// echo(" \n ".count($dtControlAsistencia)."\n" ); //sii
												// echo($qR[1].'-'.$qR[0].'-'.$arrayFiltros[$a][0]); //sii
												$bolAgregarAsistencia = $businessControlAsistencia -> fncBusinessAgregarControlAsistenciaAutomatico($qR[1],$qR[0],$arrayFiltros[$a][0]);
												if($bolAgregarAsistencia){
													$response['Respuesta'] = 1;
													$response['RespuestaTexto'] = 'El DNI:'.$dni.' ya marcó su asistencia con anterioridad';
												}else{
													$response['Respuesta'] = 0;
													$response['RespuestaTexto'] = 'Error en registro de marcación';
												}
												//print_r($arrayFiltros);
												
											}
											else{
												if ($entradaSalida == 1) {
													// echo ("No marcaste entrada pero Marcacion libre  \n"); //sii
													// echo ($arrayFiltros[$a][0].'+'.$qR[1].'+'.$qR[0]); //sii
													// echo(" \n "); //sii
													
													$bolAgregarAsistencia = $businessControlAsistencia -> fncBusinessAgregarControlAsistenciaAutomaticoNull($qR[1],$qR[0],$arrayFiltros[$a][0]);
													if($bolAgregarAsistencia){
														$response['Respuesta'] = 1;
														$response['RespuestaTexto'] = 'El DNI:'.$dni.' no marcó entrada pero si realizó marcación libre';
													}else{
														$response['Respuesta'] = 0;
														$response['RespuestaTexto'] = 'Error en registro de marcación';
													}
												}else {
													// echo ("No marcaste entrada  \n"); //sii
													// echo ($arrayFiltros[$a][0].'+'.$qR[1].'+'.$qR[0]); //sii
													// echo(" \n "); //sii
													
													$response['Respuesta'] = 0;
													$response['RespuestaTexto'] = 'El DNI:'.$dni.' no marcó entrada';

													//$bolAgregarAsistencia = $businessControlAsistencia -> fncBusinessAgregarControlAsistenciaAutomaticoNull($qR[1],$qR[0],$arrayFiltros[$a][0]);
												}
												
											}
									
											
										}
										else {
											if ($arrayFiltros[$a][3]=='Fin') {
											
												// echo("se ecnotro una entrada \n se registrara salida \n"); //sii
												// echo ($arrayFiltros[$a][0].'+'.$qR[1].'+'.$qR[0].''.$arrayFiltros[$a][4]); //sii
												// echo("\n".count($dtControlAsistencia)."\n"); //sii
												// echo("\n".$dtControlAsistencia[0]['IdControlAsistencia']."**** \n"); //sii
												$bolAgregarAsistenciaSalida = $businessControlAsistencia -> fncBusinessAgregarControlAsistenciaAutomaticoSalida($dtControlAsistencia[0]['IdControlAsistencia']);
												
												if($bolAgregarAsistencia){
													$response['Respuesta'] = 1;
													$response['RespuestaTexto'] = 'El DNI:'.$dni.' registró su salida con éxito';
												}else{
													$response['Respuesta'] = 0;
													$response['RespuestaTexto'] = 'Error en registro de marcación';
												}

												//print_r($arrayFiltros);
												
												

											}
										else{

										
												if ($entradaSalida == 1) {
															// echo ("no marcaste entrada pero Marcacion libre  \n"); //sii
															// echo ($arrayFiltros[$a][0].'+'.$qR[1].'+'.$qR[0]); //sii
															// echo(" \n "); //sii
															
															$bolAgregarAsistencia = $businessControlAsistencia -> fncBusinessAgregarControlAsistenciaAutomaticoNull($qR[1],$qR[0],$arrayFiltros[$a][0]);

															$response['Respuesta'] = 2;
															$response['RespuestaTexto'] = 'El DNI:'.$dni.' no marcó entrada pero si Marcación libre';
															// if($bolAgregarAsistencia){
															// 	$response['Respuesta'] = 1;
															// 	$response['RespuestaTexto'] = 'El DNI:'.$dni.' registró su salida con éxito';
															// }else{
															// 	$response['Respuesta'] = 0;
															// 	$response['RespuestaTexto'] = 'Error en registro de marcación';
															// }
												}else {
															// echo ("No se puede hacer una marcación ahora 2"); //sii
															// echo ($arrayFiltros[$a][0].'+'.$qR[1].'+'.$qR[0].''.$arrayFiltros[$a][4]."\n	"); //sii
															$response['Respuesta'] = 0;
															$response['RespuestaTexto'] = 'No puede realizar una marcación ahora';

												}
											}
										}
								}
								///
								

								//
									// if ($dtControlAsistencia['FechaAsistenciaSalida']===NULL) {

									// 	if ($Horaserver>=$arrayFiltros[$a][8] && $Horaserver<=$arrayFiltros[$a][8]){
									// 		echo("se actuliza para marcar salida");
									// 	}
									// 	else{

									// 		echo("aun no puede marcar");
									// 	}
										
									// }
								
							}


							

						}
						else{
							
							// echo('No Existe Una Etapa Para Hoy'); //sii

							$response['Respuesta'] = 0;
							$response['RespuestaTexto'] = 'No existe una etapa para hoy';
						}
						

					
						// if ($Horaserver>=$array[1][4] && $Horaserver<=$array[1][5]) {
						// 	echo("dentro");
						// }
						
						// 
						// $fechaUno=new DateTime('11:30');
						// $fechaDos=new DateTime('16:15');
						
						// $dateInterval = $fechaUno->diff($fechaDos);
						// echo $dateInterval->format('Total: %H horas %i minutos %s segundos').PHP_EOL;
						
						


									
				} else {
					// echo("fecha esta fuera del rango"); //sii
					$response['Respuesta'] = 0;
					$response['RespuestaTexto'] = 'Fecha esta fuera del rango';
				}
				
				//echo("$Verificacion w $Fecha 00 $FechaInicio 00 $FechaFin ");
			}
			
		} else {
				// echo ("El usuario no pertence a este evento $qR[0] "); //sii
			$response['Respuesta'] = 0;
			$response['RespuestaTexto'] = 'El DNI:'.$dni.' no pertence a este evento';
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


		header('Content-Type: application/json; charset=utf-8');
  	echo '{"items":' . json_encode($response) . '}';
	}

	function fnc_ChardAsitencia()
	{
		@session_start();
		 $business_ControlAsistencia = new business_ControlAsistencia();
		 $data_ControlAsistencia = new data_ControlAsistencia();
		 
		$IdEvento = base64_decode($_GET["di"]) ;

		 $dtControlAsistencia = $business_ControlAsistencia->fncBusinessObtenerControlAsistencia($IdEvento);

		 $response = array();
        array_push($response, ($dtControlAsistencia));
        header('Content-Type: application/json; charset=utf-8');
      	echo '{"items":' . json_encode($response[0]) . '}';

		

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
	

	function utf8_converter($array){
		array_walk_recursive($array, function(&$item, $key){
		if(!mb_detect_encoding($item, 'utf-8', true)){
		$item = utf8_encode($item);
		}
		});

		return $array;
	}



?>