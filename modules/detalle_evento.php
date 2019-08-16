<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_DetalleEvento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_DetalleEvento.php');
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
			
			case 'fechas':
					view_mostrarDetalleEvento();
				break;
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
					fnc_Agregar();
				break;
			case 'uctftGr4Jm':
					fnc_Modificar();
				break;
			case 'UkUELwv6kL':
					fnc_Eliminar();
				break;
			case 'Q6SwcynHWV':
					fnc_VerificarSesionRuc($sex);
				break;
			case 'Descargado':
					fnc_MarcarCarnetDescargado();
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
        $menu_activo = "mantenimiento_listar_eventos_futuro";
		$business_Evento = new business_Evento();
		$dtListarEventos = $business_Evento -> fncBusinessListarEventos();
		include('../views/includes/header.php');
		include('../views/mod_evento/index.php');
		include('../views/includes/footer.php');
	}

	function view_mostrarDetalleEvento()
	{
		@session_start();
		$menu_activo = "mantenimiento_listar_eventos_detalle";
		$IdEvento = base64_decode($_GET['id']);
		// echo $IdEvento;
		$business_DetalleEvento = new business_DetalleEvento();

		$dtDetalleEvento = new data_DetalleEvento();

		$operacion = 'agregar';

		$dtDetalleEvento -> setIdEvento($IdEvento);
		$dtListarDetalleEventos = $business_DetalleEvento -> fncBusinessListarEventosDetalle($dtDetalleEvento);
		$dtDetalleEvento = $business_DetalleEvento -> fncBusinessBuscarFechaLimiteEvento($IdEvento);
		// var_dump($dtListarDetalleEventos);

	
		include('../views/includes/header.php');
		include('../views/mod_detalle_evento/add_edit_detalle.php');
		include('../views/includes/footer.php');
		//echo(count($dtListarDetalleEventos));
	}

	function view_AgregarEditar()
	{
        @session_start();
        //$url_parametros['sesion'] = $sex;
        $menu_activo = 'mantenimiento_agregar_evento_index';
		//unset($_SESSION['empresa']);
		
		$business_TipoEvento = new business_TipoEvento();
		$dtListarTipoEventos = $business_TipoEvento -> fncBusinessListarTipoEventos();
		// $business_SectorOcupacionalDetalle = new business_SectorOcupacionalDetalle();
		// $dtConsultarSectorOcupacionalDetalleActivos = $business_SectorOcupacionalDetalle -> fncBusinessConsultarActivos();


		 $operacion = $_GET["v"];
		if( $operacion == "editar" ){
			$get_id = base64_decode($_GET["id"]);

			$business_Evento = new business_Evento();
			$dtConsultarEvento = $business_Evento -> fncBusinessConsultarPorId($get_id);

			//echo (count($dtConsultarEvento));
			// if ( count($dtConsultarEmpresa) == 0 ){
			// 	header('Location: ../index.php?' . http_build_query($url_parametros)); 
			// }
        }
     

		include('../views/includes/header.php');
		include('../views/mod_evento/add_edit.php');
		include('../views/includes/footer.php');
	}


	//===========================================================================
	//	FUNCIONES
	//===========================================================================
	function fnc_Eliminar()
	{
		@session_start();
		
		$validacion_post = true;

		
		if( !isset($_GET["id"]) || $_GET["id"] == "" ){ $validacion_post = false; }
		if( !isset($_GET["idEvento"]) || $_GET["idEvento"] == "" ){ $validacion_post = false; }

	
		$get_idDetalle = base64_decode($_GET["id"]) ;
		echo($get_idDetalle);
			
		if ($validacion_post == true){

			$business_DealleEvento = new business_DetalleEvento(); 
			$bolEliminar = $business_DealleEvento -> fncBusinessEliminar($get_idDetalle);

			
	


			$url_parametros['v'] = 'fechas';
			
			$url_parametros['id'] =($_GET["idEvento"]);

			
			header('Location: ../modules/detalle_evento.php?' . http_build_query($url_parametros)); 


		}else{
			$url_parametros['v'] = 'fechas';
			$url_parametros['id'] =($_GET["idEvento"]);

			
			header('Location: ../modules/detalle_evento.php?' . http_build_query($url_parametros)); 
		}	

	}

	function fnc_MarcarCarnetDescargado()
	{
		@session_start();
		$validacion_post = true;

		if( !isset($_GET["IdEvento"]) || $_GET["IdEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_GET["IdPersona"]) || $_GET["IdPersona"] == "" ){ $validacion_post = false; }

		if ($validacion_post == true){
			$business_DetalleEvento = new business_DetalleEvento();
			$bolModificarDescargado = $business_DetalleEvento -> fncBusinessMarcarCarnetDescargado($_GET["IdEvento"], $_GET["IdPersona"]);

			if($bolModificarDescargado){
				echo 1;
			}else{
				echo 0;
			}

		}else{
			echo 0;
		}	

	}

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
		@session_start();
		//$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["fecha"]) || $_POST["fecha"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["horaInicio"]) || $_POST["horaInicio"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["horaFin"]) || $_POST["horaFin"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["comentario"]) || $_POST["comentario"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["hidden_idEvento"]) || $_POST["hidden_idEvento"] == "" ){ $validacion_post = false; }
		
		

		
				
		if ($validacion_post == true){

		
			$data_DetalleEvento = new data_DetalleEvento();

			$data_DetalleEvento -> setIdEvento(base64_decode($_POST["hidden_idEvento"]	) );
			$data_DetalleEvento -> setVarEstado(1);
			$data_DetalleEvento -> setDateFecha($_POST["fecha"]);
			$data_DetalleEvento -> setTimeInicioHora($_POST["horaInicio"]);
			$data_DetalleEvento -> setTimeFinHora($_POST["horaFin"]);
			$data_DetalleEvento -> setVarComentario($_POST["comentario"]) ;
		
			
			$business_DealleEvento = new business_DetalleEvento(); 

			$dtDetallesistencia = $business_DealleEvento -> fncBusinessListarDetallePorIdEvento($data_DetalleEvento->getIdEvento(),$data_DetalleEvento->getDateFecha());

			$bolFechavalida = true;
			$bolAgregarDetalle='';

			if (count($dtDetallesistencia)>0) {

				
				$inicial	= new DateTime($data_DetalleEvento->getTimeInicioHora());
				$final		= new DateTime($data_DetalleEvento->getTimeFinHora());
				foreach ($dtDetallesistencia as $value) {
					$horaInicio = new DateTime($value["InicioHora"]);
					$horaFin	= new DateTime($value["FinHora"]);
			
					if ($inicial<=$horaInicio && $horaInicio<=$final) {
						$bolFechavalida =false;
					}elseif($inicial<=$horaFin && $horaFin<=$final ){
						$bolFechavalida =false;
					}
					elseif ($horaInicio<=$inicial && $inicial <= $horaFin ) {
						$bolFechavalida =false;
					}elseif ($horaInicio<=$final && $final <= $horaFin ) {
						$bolFechavalida =false;
					}
					elseif($inicial > $final){
						$bolFechavalida =false;	
					}
				
				}

			$interval = $inicial->diff($final);
			$mini =  new DateTime("01:00");
			$interval = $interval->format("%H:%I");
			$interval = new DateTime($interval);
			if ($interval < $mini) {
				echo ("muy corto <br>");
				$bolFechavalida = false;
				$_SESSION['mensaje']="Horas Inicio y Hora Fin Incorrectos";
			}
			if ($bolFechavalida) {
				echo("validas");
				
				$bolAgregarDetalle = $business_DealleEvento -> fncBusinessAgregar($data_DetalleEvento);
				$_SESSION['mensaje']="Registro Exitoso";
		
				//$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";
			}else{ 
				echo("no validas"); 
				$bolAgregarDetalle = false;
				$_SESSION['mensaje']="Horas Inicio y Hora Fin Incorrectos";
				//$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Existe cruce de Horarios o el Evento es Muy Corto";
			}
			
			}
			else{
				$inicial	= new DateTime($data_DetalleEvento->getTimeInicioHora());
				$final		= new DateTime($data_DetalleEvento->getTimeFinHora());
				$interval = $inicial->diff($final);
				$mini =  new DateTime("01:00");
				$interval = $interval->format("%H:%I");
				$interval = new DateTime($interval);
				if ($interval < $mini) {
				
					$bolFechavalida = false;
					$_SESSION['mensaje']="Horas Inicio y Hora Fin Incorrectos";
				}else{
						
				$inicial	= new DateTime($data_DetalleEvento->getTimeInicioHora());
				$final		= new DateTime($data_DetalleEvento->getTimeFinHora());

				if($inicial > $final){
					$bolFechavalida =false;	
					$_SESSION['mensaje']="Horas Inicio y Hora Fin Incorrectos";
				}else{

					$bolAgregarDetalle = $business_DealleEvento -> fncBusinessAgregar($data_DetalleEvento);
					if ($bolAgregarDetalle) {
						$_SESSION['mensaje']="Registro Exitoso";
					}
					else{
						$_SESSION['mensaje']="Paso un Problema con su solicitud";
					}
				}

				
				
				}
			}
			
		
				$url_parametros['v'] = 'fechas';
				$url_parametros['id'] =base64_encode($data_DetalleEvento -> getIdEvento()) ;

				
				header('Location: ../modules/detalle_evento.php?' . http_build_query($url_parametros)); 
		}else{


			$url_parametros['v'] = 'fechas';
			$url_parametros['id'] =($_POST["hidden_idEvento"]) ;

			
			header('Location: ../modules/detalle_evento.php?' . http_build_query($url_parametros)); 
				
	}
}

	function fnc_Modificar()
	{
		

		@session_start();
		//$url_parametros['sesion'] = $sex;
		$validacion_post = true;

		if( !isset($_POST["fecha"]) || $_POST["fecha"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["horaInicio"]) || $_POST["horaInicio"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["horaFin"]) || $_POST["horaFin"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["comentario"]) || $_POST["comentario"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["hidden_idEvento"]) || $_POST["hidden_idEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["hIdDetalle"]) || $_POST["hIdDetalle"] == "" ){ $validacion_post = false; }
		

		
				
		if ($validacion_post == true){

		
			$data_DetalleEvento = new data_DetalleEvento();

			$data_DetalleEvento -> setIdDetalleEvento( $_POST["hIdDetalle"] );
			$data_DetalleEvento -> setIdEvento(base64_decode($_POST["hidden_idEvento"]	) );
			$data_DetalleEvento -> setVarEstado(1);
			$data_DetalleEvento -> setDateFecha($_POST["fecha"]);
			$data_DetalleEvento -> setTimeInicioHora($_POST["horaInicio"]);
			$data_DetalleEvento -> setTimeFinHora($_POST["horaFin"]);
			$data_DetalleEvento -> setVarComentario($_POST["comentario"]) ;
		
			
			$business_DealleEvento = new business_DetalleEvento(); 

			$dtDetallesistencia = $business_DealleEvento -> fncBusinessListarDetallePorIdEvento($data_DetalleEvento->getIdEvento(),$data_DetalleEvento->getDateFecha(), $data_DetalleEvento->getIdDetalleEvento());

			$bolFechavalida = true;
			$bolAgregarDetalle='';

			if (count($dtDetallesistencia)>0) {

				
				$inicial	= new DateTime($data_DetalleEvento->getTimeInicioHora());
				$final		= new DateTime($data_DetalleEvento->getTimeFinHora());
				foreach ($dtDetallesistencia as $value) {
					$horaInicio = new DateTime($value["InicioHora"]);
					$horaFin	= new DateTime($value["FinHora"]);
			
					if ($inicial<=$horaInicio && $horaInicio<=$final) {
						$bolFechavalida =false;
					}elseif($inicial<=$horaFin && $horaFin<=$final ){
						$bolFechavalida =false;
					}
					elseif ($horaInicio<=$inicial && $inicial <= $horaFin ) {
						$bolFechavalida =false;
					}elseif ($horaInicio<=$final && $final <= $horaFin ) {
						$bolFechavalida =false;
					}
					elseif($inicial > $final){
						$bolFechavalida =false;	
					}
				
				}

			$interval = $inicial->diff($final);
			$mini =  new DateTime("01:00");
			$interval = $interval->format("%H:%I");
			$interval = new DateTime($interval);
			if ($interval < $mini) {
				echo ("muy corto <br>");
				$bolFechavalida = false;
				$_SESSION['mensaje']="Horas Inicio y Hora Fin Incorrectos";
			}
			if ($bolFechavalida) {
				echo("validas");
				
				$bolAgregarDetalle = $business_DealleEvento -> fncBusinessModificar($data_DetalleEvento);
				$_SESSION['mensaje']="Registro Exitoso";
		
				//$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";
			}else{ 
				echo("no validas"); 
				$bolAgregarDetalle = false;
				$_SESSION['mensaje']="Horas Inicio y Hora Fin Incorrectos";
				//$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Existe cruce de Horarios o el Evento es Muy Corto";
			}
			
			}
			else{
				$inicial	= new DateTime($data_DetalleEvento->getTimeInicioHora());
				$final		= new DateTime($data_DetalleEvento->getTimeFinHora());
				$interval = $inicial->diff($final);
				$mini =  new DateTime("01:00");
				$interval = $interval->format("%H:%I");
				$interval = new DateTime($interval);
				if ($interval < $mini) {
				
					$bolFechavalida = false;
					$_SESSION['mensaje']="Horas Inicio y Hora Fin Incorrectos";
				}else{
						
				$inicial	= new DateTime($data_DetalleEvento->getTimeInicioHora());
				$final		= new DateTime($data_DetalleEvento->getTimeFinHora());

				if($inicial > $final){
					$bolFechavalida =false;	
					$_SESSION['mensaje']="Horas Inicio y Hora Fin Incorrectos";
				}else{

					$bolAgregarDetalle = $business_DealleEvento -> fncBusinessModificar($data_DetalleEvento);
					if ($bolAgregarDetalle) {
						$_SESSION['mensaje']="Registro Exitoso";
					}
					else{
						$_SESSION['mensaje']="Paso un Problema con su solicitud";
					}
				}

				
				
				}
			}
			
		
				$url_parametros['v'] = 'fechas';
				$url_parametros['id'] =base64_encode($data_DetalleEvento -> getIdEvento()) ;

				
				header('Location: ../modules/detalle_evento.php?' . http_build_query($url_parametros)); 
		}else{


			$url_parametros['v'] = 'fechas';
			$url_parametros['id'] =($_POST["hidden_idEvento"]) ;

			
			header('Location: ../modules/detalle_evento.php?' . http_build_query($url_parametros)); 
				
	}


	}



?>