<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_Evento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_Evento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_TipoEvento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_TipoEvento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_ControlAsistencia.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_ControlAsistencia.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_DetalleEvento.php');
	include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/business/businessEvento/business_DetalleEvento.php');

	



    // VERIFICAR PERMISO DEL MODULO
	 @session_start();

	 if (!isset($_SESSION['usuario'])) {
		header('Location: ../views/website/login.php');
		exit();
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
			
			case 'eventopPage':
					view_mostrarPaginaEventos();
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
			case 'listarfuturo':
					view_ListarEventoDetalle();
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
					fnc_VerificarAforo($sex);
				break;
			case 'Q6SwcynHWV':
					fnc_VerificarSesionRuc($sex);
				break;
			case 'CambioEstadoEvento':
					fnc_CambiarEstadoEvento();
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

	function utf8_converter($array){
		array_walk_recursive($array, function(&$item, $key){
		if(!mb_detect_encoding($item, 'utf-8', true)){
		$item = utf8_encode($item);
		}
		});

		return $array;
	}

	function view_Index()
	{
		@session_start();
		$menu_activo = "mantenimiento_evento_index";
		
		$businessControlAsistencia = new business_ControlAsistencia();
		$dtConsultarFechaHora = $businessControlAsistencia -> fncBusinessObtenerFechaHora();
		$Fecha = $dtConsultarFechaHora[0]["Fecha"];
		$business_Evento = new business_Evento();
		$dtListarEventos = $business_Evento -> fncBusinessListarEventos();
		$dtListarEventos = utf8_converter($dtListarEventos);
		include('../views/includes/header.php');
		include('../views/mod_evento/index.php');
		include('../views/includes/footer.php');
	}
	function view_ListarEventoDetalle()
	{
		@session_start();
        $menu_activo = "mantenimiento_listar_eventos_detalle";
		$business_Evento = new business_Evento();
		$dtListarEventos = $business_Evento -> fncBusinessListarEventosDetalle();
		include('../views/includes/header.php');
		include('../views/mod_evento/eventoDetalle.php');
		include('../views/includes/footer.php');
	}


	function view_mostrarPaginaEventos()
	{
		@session_start();
        $menu_activo = "dashboard";
		$business_Evento = new business_Evento();
		$dtListarEventos = $business_Evento -> fncBusinessListarEventosPublicos();

		$dtListarEventos = utf8_converter($dtListarEventos);

		include('../views/includes/header.php');
		include('../views/mod_evento/eventosPage.php');
		include('../views/includes/footer.php');
	}

	function view_AgregarEditar()
	{
        @session_start();
        //$url_parametros['sesion'] = $sex;
        $menu_activo = 'mantenimiento_agregar_evento_index';
		//unset($_SESSION['empresa']);
		
		$business_TipoEvento = new business_TipoEvento();
		$dtListarTipoEventos = $business_TipoEvento -> fncBusinessListarTipoEventos();
		$business_Evento = new business_Evento();
		$dtListarPermisosEvento = $business_Evento -> fncBusinessListarDependenciaPermiso();
		$dtListarPermisosEvento =utf8_converter($dtListarPermisosEvento);


		 $operacion = $_GET["v"];
		if( $operacion == "editar" ){
			$get_id = base64_decode($_GET["id"]);

			$business_Evento = new business_Evento();
			$dtConsultarEvento = $business_Evento -> fncBusinessConsultarPorId($get_id);
 			$dtConsultarEvento =utf8_converter($dtConsultarEvento);
		
        }
     

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

		if( !isset($_POST["nombreEvento"]) || $_POST["nombreEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["lugar"]) || $_POST["lugar"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tipoEvento"]) || $_POST["tipoEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["estadoEvento"]) || $_POST["estadoEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["descripcion"]) || $_POST["descripcion"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["fechaInicio"]) || $_POST["fechaInicio"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["fechaFinal"]) || $_POST["fechaFinal"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tipoEvento"]) || $_POST["tipoEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["aforo"]) || $_POST["aforo"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["banner"]) || $_POST["banner"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["lat"]) || $_POST["lat"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["long"]) || $_POST["long"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["modalidadEvento"]) || $_POST["modalidadEvento"] == "" ){ $validacion_post = false; }

		if( !isset($_POST["MagnitudEvento"]) || $_POST["MagnitudEvento"] == "" ){ $validacion_post = false; }
					
		if ($validacion_post == true){

			$fechaInicio=$_POST["fechaInicio"];
			$fechaFin=$_POST["fechaFinal"];

			$fechaInicio = date( 'Y-m-d', strtotime($fechaInicio));
			$fechaFin = date( 'Y-m-d', strtotime($fechaFin));

		
			if ($fechaInicio <= $fechaFin) {
				
			

			$data_Evento = new data_Evento();

			$data_Evento -> setVarNombre(strtoupper($_POST["nombreEvento"]) );
			$data_Evento -> setVarLugar(strtoupper($_POST["lugar"]));
			$data_Evento -> setVarEstado($_POST["estadoEvento"]);
			$data_Evento -> setVarTipo($_POST["tipoEvento"]);
			$data_Evento -> setVarDescripcion(strtoupper($_POST["descripcion"]));
			$data_Evento -> setDateInicioFecha($_POST["fechaInicio"]." "."00:00:00.000");
			$data_Evento -> setDateFinFecha($_POST["fechaFinal"]." "."00:00:00.000");
			$data_Evento -> setStimeInicioHora("2007-05-08"." "."00:00:00");
			$data_Evento -> setStimeFinHora("2007-05-08"." "."00:00:00");
			$data_Evento -> setIntAforo($_POST["aforo"]);
			$data_Evento -> setVarBanner("X.JPG");
			$data_Evento -> setVarUbicacionLatitud($_POST["lat"]);
			$data_Evento -> setVarUbicacionLongitud($_POST["long"]);
			$data_Evento -> setIdTipoEvento($_POST["modalidadEvento"]);
			$data_Evento -> setDependencia($_SESSION['usuario']["ses_IdDependencia"] );
			$data_Evento -> setvarUsuarioCreador($_SESSION['usuario']["ses_IdUsuario"] );

			$depefijo = explode('*',($_POST["depefijo"]));
			$areasector = $_POST["depegeneral"];

			$data_Evento ->setIdPtaDependenciaFijo($depefijo[1]);
			$data_Evento ->setIdDepe($depefijo[0]);
			
			if($_POST["MagnitudEvento"] == 'A'){
					$data_Evento ->setIdPtaDependenciaFijo(null);
					$data_Evento ->setIdDepe($areasector);
			}

		
	
			$business_Evento = new business_Evento(); 
			$bolAgregarEvento = $business_Evento -> fncBusinessAgregar($data_Evento); 
			$data_DetalleEvento = new data_DetalleEvento();
			$business_DealleEvento = new business_DetalleEvento(); 
//print_r($bolAgregarEvento);
		
/*  agregar cronogamas por cada dia  */
		
			while ($fechaInicio <= $fechaFin) {
		

			$data_DetalleEvento -> setIdEvento($bolAgregarEvento[0]["Id"]);
			$data_DetalleEvento -> setVarEstado(1);
			$data_DetalleEvento -> setDateFecha($fechaInicio);
			$data_DetalleEvento -> setTimeInicioHora("08:00:00");
			$data_DetalleEvento -> setTimeFinHora("16:00:00");
			$data_DetalleEvento -> setVarComentario("Primera estapa") ;
			


			$bolAgregarDetalle = $business_DealleEvento -> fncBusinessAgregar($data_DetalleEvento);
		
			$fechaInicio=date ('Y-m-d', strtotime($fechaInicio. ' + 1 days'));

			

			}

			$bolAgregarEvento=true;
/*  ------agregar cronogamas por cada dia  -------*/
			

				 if($bolAgregarEvento){
				 	$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				 	$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro insertado con éxito";		
				 }else{
				 	$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				 	$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro el registro. Inténtelo nuevamente.";		
				 }
				 $url_parametros['v'] = 'index';

				
				 header('Location: ../modules/evento.php?' . http_build_query($url_parametros));
				
				
			}else{
				$url_parametros['v'] = 'index';

				
				header('Location: ../modules/evento.php?' . http_build_query($url_parametros));
					$_SESSION['mensaje']["ses_MensajeTipo"] 	= "Incorrecto";	
				 	$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se registro Fecha incorrectas";
			}

			}else{

				$url_parametros['v'] = 'index';
				header('Location: ../modules/evento.php?' . http_build_query($url_parametros));
			}	
			
		
	}

	function fnc_Modificar()
	{
		@session_start();
		//$url_parametros['sesion'] = $sex;
		$validacion_post = true;
		if( !isset($_POST["hidden_idEvento"]) || $_POST["hidden_idEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["nombreEvento"]) || $_POST["nombreEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["lugar"]) || $_POST["lugar"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tipoEvento"]) || $_POST["tipoEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["estadoEvento"]) || $_POST["estadoEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["descripcion"]) || $_POST["descripcion"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["fechaInicio"]) || $_POST["fechaInicio"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["fechaFinal"]) || $_POST["fechaFinal"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["tipoEvento"]) || $_POST["tipoEvento"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["aforo"]) || $_POST["aforo"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["banner"]) || $_POST["banner"] == "" || $_POST["xBanner"] =="" ){ $validacion_post = false; }
		if( !isset($_POST["lat"]) || $_POST["lat"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["long"]) || $_POST["long"] == "" ){ $validacion_post = false; }
		if( !isset($_POST["modalidadEvento"]) || $_POST["modalidadEvento"] == "" ){ $validacion_post = false; }
		//if( !isset($_POST["depefijo"]) || $_POST["depefijo"] == "" ){ $validacion_post = false; }
		
		if( !isset($_POST["MagnitudEvento"]) || $_POST["MagnitudEvento"] == "" ){ $validacion_post = false; }

			
		if ($validacion_post == true){

			$fechaInicio=$_POST["fechaInicio"];
			$fechaFin=$_POST["fechaFinal"];

			$fechaInicio = date( 'Y-m-d', strtotime($fechaInicio));
			$fechaFin = date( 'Y-m-d', strtotime($fechaFin));

			
			if ($fechaInicio <= $fechaFin) {

			$data_Evento = new data_Evento();
			$data_Evento -> setIdEvento( base64_decode($_POST["hidden_idEvento"]));
			$data_Evento -> setVarNombre(strtoupper($_POST["nombreEvento"]));
			$data_Evento -> setVarLugar(strtoupper($_POST["lugar"]));
			$data_Evento -> setVarEstado($_POST["estadoEvento"]);
			$data_Evento -> setVarTipo($_POST["tipoEvento"]);
			$data_Evento -> setVarDescripcion(strtoupper($_POST["descripcion"]));
			$data_Evento -> setDateInicioFecha($_POST["fechaInicio"]." "."00:00:00.000");
			$data_Evento -> setDateFinFecha($_POST["fechaFinal"]." "."00:00:00.000");
			$data_Evento -> setStimeInicioHora("2007-05-08"." ".$_POST["horaInicio"]);
			$data_Evento -> setStimeFinHora("2007-05-08"." ".$_POST["horaFinal"]);
			$data_Evento -> setIntAforo($_POST["aforo"]);

			$depefijo 		= explode('*',($_POST["depefijo"]));
			$areasector = $_POST["depegeneral"];
			$data_Evento ->setIdPtaDependenciaFijo($depefijo[1]);
			$data_Evento ->setIdDepe($depefijo[0]);
			
			if($_POST["MagnitudEvento"] == 'A'){
					$data_Evento ->setIdPtaDependenciaFijo(null);
					$data_Evento ->setIdDepe($areasector);
			}

				if(!isset($_POST["banner"]) || $_POST["banner"] == "") {
					$data_Evento -> setVarBanner($_POST["xBanner"]);
				} else {
					$data_Evento -> setVarBanner($_POST["banner"]);
				}

			
			
			$data_Evento -> setVarUbicacionLatitud($_POST["lat"]);
			$data_Evento -> setVarUbicacionLongitud($_POST["long"]);
			$data_Evento -> setIdTipoEvento($_POST["modalidadEvento"]);

			$data_DetalleEvento = new data_DetalleEvento();
			$bus_DealleEvento = new business_DetalleEvento();
			$data_DetalleEvento -> setIdEvento( base64_decode( $_POST["hidden_idEvento"]));
			//print_r($data_DetalleEvento);
			$ListarDetalleEventos = $bus_DealleEvento -> fncBusinessListarEventosDetalle($data_DetalleEvento);
			//print_r($ListarDetalleEventos);


			$modFechasValidadas = "";
			foreach ($ListarDetalleEventos as $value) {
				
				 if (($fechaInicio <=$value["Fecha"]) && ($value["Fecha"]<=$fechaFin )) {
					 $modFechasValidadas =1;
					 //echo ("entro".$fechaInicio ."<=".$value["Fecha"]."<=".$fechaFin );
					 //echo ("<br>");
				 }
				 else {
					 $modFechasValidadas = 0;
					 break;
				 }

				
			}


		if ($modFechasValidadas==1) {

			$business_Evento = new business_Evento(); 
			$bolAgregarEvento = $business_Evento -> fncBusinessModificar($data_Evento);
			if($bolAgregarEvento){

				
				$business_DetalleEvento = new business_DetalleEvento(); 
				// $data_DetalleEvento ->setIdEvento();
				$dtListarDetalleEventos = $business_DetalleEvento -> fncBusinessListarEventosDetalle($data_DetalleEvento);
				
				while ($fechaInicio <= $fechaFin) {
			
							$add="ADD";

				 	foreach ($dtListarDetalleEventos as  $value) {

						if ($fechaInicio == $value["Fecha"]) {
					
							$add = "NADD";
							// echo("<br>");
							// echo("NADD");
							// echo("<br>");
							// echo("fecha inicio".$fechaInicio ."== ".$value["Fecha"]);
							// echo("<br>");
					 		// echo($fechaInicio);
							//break;

						}
						else{
							// echo("<br>");
							// echo("falta");
							// echo("fecha inicio".$fechaInicio ."== ".$value["Fecha"]);
							// echo("<br>");
							//  echo($fechaInicio);
							//  echo("<br>");
						}
					
					 }
					
				
					 	if ($add == "ADD") {

								// echo("<br>");
								// echo("agregado");
								// echo("<br>");
								$data_DetalleEvento -> setIdEvento( base64_decode($_POST["hidden_idEvento"]));
								$data_DetalleEvento -> setVarEstado(1);
								$data_DetalleEvento -> setDateFecha($fechaInicio);
								$data_DetalleEvento -> setTimeInicioHora("08:00:00");
								$data_DetalleEvento -> setTimeFinHora("16:00:00");
								$data_DetalleEvento -> setVarComentario("Primera estapa") ;
								
								//print_r($data_DetalleEvento);


								$bolAgregarDetalle = $business_DetalleEvento -> fncBusinessAgregar($data_DetalleEvento);
							
						# code...
					}
				
			
				 $fechaInicio=date ('Y-m-d', strtotime($fechaInicio. ' + 1 days'));

				

				}


				
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "correcto";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "Registro Modificado con éxito";		
			}else{
				$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
				$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se modifico el registro. Inténtelo nuevamente.";		
			}
		} else {
			$_SESSION['mensaje']["ses_MensajeTipo"] 	= "error";	
			$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se modifico el registro. Inténtelo nuevamente. Fechas no coinciden con el Cronograma";
		}
		
		//	$business_Evento = new business_Evento(); 
		//	$bolAgregarEvento = $business_Evento -> fncBusinessModificar($data_Evento);

			

			

			
			$url_parametros['v'] = 'index';

			
			header('Location: ../modules/evento.php?' . http_build_query($url_parametros)); 
		}else{

			$url_parametros['v'] = 'index';

				
				header('Location: ../modules/evento.php?' . http_build_query($url_parametros));
					$_SESSION['mensaje']["ses_MensajeTipo"] 	= "Incorrecto";	
				 	$_SESSION['mensaje']["ses_MensajeDescripcion"] 	= "No se ha modificado, Fechas incorrectas";
		}
			
		}else{
			header('Location: ../index.php?' . http_build_query($url_parametros)); 

			
		}	

	}



	function fnc_CambiarEstadoEvento()
	{
		@session_start();
		$validacion_post = true;
		if( !isset($_GET["id"]) || $_GET["id"] == "" ){ $validacion_post = false; }
		if( !isset($_GET["valor"]) || $_GET["valor"] == "" ){ $validacion_post = false; }


		if ($validacion_post == true){

			$business_Evento = new business_Evento(); 
			$bolModificarEvento = $business_Evento -> fncBusinessCambiarEstado($_GET["valor"], $_GET["id"]);

			if( $bolModificarEvento )
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



?>