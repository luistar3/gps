<?php 

include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_Chip.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
//include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');

class business_Chip
{

  public function fncBusinessListarChips(){

			@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
				$sql = "usp_Gps_Chip_ListarChips";
						//$USRId = $_SESSION['usuario']["ses_USRId"] ;
				// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
				$proc = mssql_init($sql, $connectionstatus); 
							// mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);
				// mssql_bind($proc, '@IdPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);

							// mssql_bind($proc, '@NombreApellido', $NombreApellido, SQLVARCHAR, false, false, 10); 
							// mssql_bind($proc, '@varDni', $varDni, SQLVARCHAR, false, false, 10); 
							// mssql_bind($proc, '@intEdad', $intEdad, SQLINT4, false, false, 10); 
							// mssql_bind($proc, '@IdGradoAcademico', $IdGradoAcademico, SQLINT4, false, false, 10); 
							// mssql_bind($proc, '@IdSectorAcademico', $IdSectorAcademico, SQLINT4, false, false, 10); 

				$result = mssql_execute($proc);
				$devolver = sqlsrv_getdata($result);
				$connection -> closeConnection($connectionstatus);
				unset($connectionstatus);
				unset($connection);
				return $devolver;
			} 
			else 
			{
				unset($connectionstatus);
				unset($connection);
				echo 'Tenemos un problema: ' . mssql_get_last_message();
			}
	}
	public function fnc_reporteCantidadChipsPorOperador(){

		@session_start();
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Gps_Chip_CantidadPorOperador";
					//$USRId = $_SESSION['usuario']["ses_USRId"] ;
			// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
			$proc = mssql_init($sql, $connectionstatus); 
						// mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);
			// mssql_bind($proc, '@IdPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);

						// mssql_bind($proc, '@NombreApellido', $NombreApellido, SQLVARCHAR, false, false, 10); 
						// mssql_bind($proc, '@varDni', $varDni, SQLVARCHAR, false, false, 10); 
						// mssql_bind($proc, '@intEdad', $intEdad, SQLINT4, false, false, 10); 
						// mssql_bind($proc, '@IdGradoAcademico', $IdGradoAcademico, SQLINT4, false, false, 10); 
						// mssql_bind($proc, '@IdSectorAcademico', $IdSectorAcademico, SQLINT4, false, false, 10); 

			$result = mssql_execute($proc);
			$devolver = sqlsrv_getdata($result);
			$connection -> closeConnection($connectionstatus);
			unset($connectionstatus);
			unset($connection);
			return $devolver;
		} 
		else 
		{
			unset($connectionstatus);
			unset($connection);
			echo 'Tenemos un problema: ' . mssql_get_last_message();
		}
}

public function fnc_reporteCantidadDeDineroPorOperador(){

	@session_start();
	$connection = new connection();
	$connectionstatus = $connection -> openConnection();
	if ($connectionstatus) 
	{
		$sql = "usp_Gps_Chip_CantidadDineroPorOperador";
				//$USRId = $_SESSION['usuario']["ses_USRId"] ;
		// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
		$proc = mssql_init($sql, $connectionstatus); 
					// mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);
		// mssql_bind($proc, '@IdPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);

					// mssql_bind($proc, '@NombreApellido', $NombreApellido, SQLVARCHAR, false, false, 10); 
					// mssql_bind($proc, '@varDni', $varDni, SQLVARCHAR, false, false, 10); 
					// mssql_bind($proc, '@intEdad', $intEdad, SQLINT4, false, false, 10); 
					// mssql_bind($proc, '@IdGradoAcademico', $IdGradoAcademico, SQLINT4, false, false, 10); 
					// mssql_bind($proc, '@IdSectorAcademico', $IdSectorAcademico, SQLINT4, false, false, 10); 

		$result = mssql_execute($proc);
		$devolver = sqlsrv_getdata($result);
		$connection -> closeConnection($connectionstatus);
		unset($connectionstatus);
		unset($connection);
		return $devolver;
	} 
	else 
	{
		unset($connectionstatus);
		unset($connection);
		echo 'Tenemos un problema: ' . mssql_get_last_message();
	}
}

	public function fnc_buscarChipPorNumero($numero){
		//@session_start();
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Gps_Chip_BusarPorNumero";
					//$USRId = $_SESSION['usuario']["ses_USRId"] ;
			// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@numeroChip', $numero, SQLVARCHAR, false, false, 18);
			// mssql_bind($proc, '@IdPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);

						// mssql_bind($proc, '@NombreApellido', $NombreApellido, SQLVARCHAR, false, false, 10); 
						// mssql_bind($proc, '@varDni', $varDni, SQLVARCHAR, false, false, 10); 
						// mssql_bind($proc, '@intEdad', $intEdad, SQLINT4, false, false, 10); 
						// mssql_bind($proc, '@IdGradoAcademico', $IdGradoAcademico, SQLINT4, false, false, 10); 
						// mssql_bind($proc, '@IdSectorAcademico', $IdSectorAcademico, SQLINT4, false, false, 10); 

			$result = mssql_execute($proc);
			$devolver = sqlsrv_getdata($result);
			$connection -> closeConnection($connectionstatus);
			unset($connectionstatus);
			unset($connection);
			return $devolver;
		} 
		else 
		{
			unset($connectionstatus);
			unset($connection);
			echo 'Tenemos un problema: ' . mssql_get_last_message();
		}
		
	}
	public function fnc_insertarChip($chip){
		//@session_start();
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Gps_Chip_Insertar";

			$operador 		= $chip -> getOperador();
			$tipo_contrato  = $chip -> getTipo_contrato();
			$numero 		= $chip -> getNumero();
			$fechacontrato  = $chip -> getFechacontrato();
			$tarifa 		= $chip -> getTarifa();
					//$USRId = $_SESSION['usuario']["ses_USRId"] ;
			// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@operador', $operador, SQLVARCHAR, false, false, 50);
			mssql_bind($proc, '@tipo_contrato', $tipo_contrato, SQLVARCHAR, false, false, 50);
			mssql_bind($proc, '@numero', $numero, SQLVARCHAR, false, false, 50);
			mssql_bind($proc, '@fechacontrato', $fechacontrato, SQLVARCHAR, false, false, 50);
			mssql_bind($proc, '@tarifa', $tarifa, SQLVARCHAR, false, false, 50);
			// mssql_bind($proc, '@IdPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);

						// mssql_bind($proc, '@NombreApellido', $NombreApellido, SQLVARCHAR, false, false, 10); 
						// mssql_bind($proc, '@varDni', $varDni, SQLVARCHAR, false, false, 10); 
						// mssql_bind($proc, '@intEdad', $intEdad, SQLINT4, false, false, 10); 
						// mssql_bind($proc, '@IdGradoAcademico', $IdGradoAcademico, SQLINT4, false, false, 10); 
						// mssql_bind($proc, '@IdSectorAcademico', $IdSectorAcademico, SQLINT4, false, false, 10); 

		 $result = mssql_execute($proc);

		if ($result) {
			$connection -> closeConnection($connectionstatus);
			unset($connectionstatus);
			unset($connection);
			return true;
		}else{
			$connection -> closeConnection($connectionstatus);
			unset($connectionstatus);
			unset($connection);
			return false;
		}
			
	}
}


public function fnc_BusinessModificarChip($chip){ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {		
			$idchip			= $chip -> getIdchip();
			$operador 		= $chip -> getOperador();
			$tipo_contrato  = $chip -> getTipo_contrato();
			$numero 		= $chip -> getNumero();
			$fechacontrato  = $chip -> getFechacontrato();
			$tarifa 		= $chip -> getTarifa();
    	

	  $sql = "usp_Gps_Chip_ActualizarChip";
	    $proc = mssql_init($sql, $connectionstatus);
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
			mssql_bind($proc, '@idchip', $idchip, SQLVARCHAR, false, false, 50);
			mssql_bind($proc, '@operador', $operador, SQLVARCHAR, false, false, 50);
			mssql_bind($proc, '@tipo_contrato', $tipo_contrato, SQLVARCHAR, false, false, 50);
			mssql_bind($proc, '@numero', $numero, SQLVARCHAR, false, false, 50);
			mssql_bind($proc, '@fechacontrato', $fechacontrato, SQLVARCHAR, false, false, 50);
			mssql_bind($proc, '@tarifa', $tarifa, SQLVARCHAR, false, false, 50);
		
			 
			 
      $result = mssql_execute($proc);

      if ($result) {
        $connection -> closeConnection($connectionstatus);
        unset($connectionstatus);
        unset($connection);
        return true;
      }else{
        $connection -> closeConnection($connectionstatus);
        unset($connectionstatus);
        unset($connection);
        return false;
      }
    } 
    else 
    {
      unset($connectionstatus);
      unset($connection);
      echo 'Tenemos un problema: ' . mssql_get_last_message();
    }
  }
	public function fncBusinessListarEventosDetalle(){

			@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{

				$sql = "usp_Eve_S_ListarEventosParaDetalle";
				// echo $sql." ".$idPermiso;

				if ($_SESSION['usuario']["ses_Titulo"]=='Administrador') {
								
					$proc = mssql_init($sql, $connectionstatus); 
					$idPermiso = $_SESSION['usuario']["ses_Permiso"];
					mssql_bind($proc, '@USRId', $idPermiso, SQLVARCHAR, false, false, 30);
				}
				else{
											
					$proc = mssql_init($sql, $connectionstatus); 
					$idPermiso = $_SESSION['usuario']["ses_Permiso"];
					mssql_bind($proc, '@USRId', $idPermiso, SQLVARCHAR, false, false, 30);

				}

				
							
				$result = mssql_execute($proc);
				$devolver = sqlsrv_getdata($result);
				$connection -> closeConnection($connectionstatus);
				unset($connectionstatus);
				unset($connection);
				return $devolver;
			} 
			else 
			{
				unset($connectionstatus);
				unset($connection);
				echo 'Tenemos un problema: ' . mssql_get_last_message();
			}
					
		}
	public function fncBusinessListarEventosMes(){

			@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
			
				$sql = "usp_Eve_S_ListarEventoMes";
						
				if ($_SESSION['usuario']["ses_Titulo"]=='Administrador') {
								
					$proc = mssql_init($sql, $connectionstatus); 
					$idPermiso = $_SESSION['usuario']["ses_Permiso"];
					mssql_bind($proc, '@USRId', $idPermiso, SQLVARCHAR, false, false, 30);



				}
				else{
											
					$proc = mssql_init($sql, $connectionstatus); 
					$idPermiso = $_SESSION['usuario']["ses_Permiso"];
					mssql_bind($proc, '@USRId', $idPermiso, SQLVARCHAR, false, false, 30);

				}
			
							
				$result = mssql_execute($proc);
				$devolver = sqlsrv_getdata($result);
				$connection -> closeConnection($connectionstatus);
				unset($connectionstatus);
				unset($connection);
				return $devolver;
			} 
			else 
			{
				unset($connectionstatus);
				unset($connection);
				echo 'Tenemos un problema: ' . mssql_get_last_message();
			}
					
		}
	public function fncBusinessListarEventosPublicos(){

		//	@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
				$sql = "usp_Eve_S_ListarEventosPublicosPrivados";
				$proc = mssql_init($sql, $connectionstatus); 
			
				$result = mssql_execute($proc);
				$devolver = sqlsrv_getdata($result);
				$connection -> closeConnection($connectionstatus);
				unset($connectionstatus);
				unset($connection);
				return $devolver;
			} 
			else 
			{
				unset($connectionstatus);
				unset($connection);
				echo 'Tenemos un problema: ' . mssql_get_last_message();
			}
			
		}


	public function fncBusinessConsultarPorId($IdEvento)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_ConsultarPorIdEvento";

			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR, false, false, 10);
			

			$result = mssql_execute($proc);
			$devolver = sqlsrv_getdata($result);
			$connection -> closeConnection($connectionstatus);
			unset($connectionstatus);
			unset($connection);
			return $devolver;
		} 
		else 
		{
			unset($connectionstatus);
			unset($connection);
			echo 'Tenemos un problema: ' . mssql_get_last_message();
		}
	}
	public function fncBusinessListarDependenciaPermiso()
	{
		@session_start();
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_ListarPermisosEvento";
			$proc = mssql_init($sql, $connectionstatus); 

			if ($_SESSION['usuario']["ses_Titulo"]=='Administrador'){
				$idPermiso = $_SESSION['usuario']["ses_Permiso"];
				mssql_bind($proc, '@permiso', $idPermiso, SQLVARCHAR, false, false, 30);
			}else{
				$idPermiso = $_SESSION['usuario']["ses_Permiso"];
				mssql_bind($proc, '@permiso', $idPermiso, SQLVARCHAR, false, false, 30);

			}

			$result = mssql_execute($proc);
			$devolver = sqlsrv_getdata($result);
			$connection -> closeConnection($connectionstatus);
			unset($connectionstatus);
			unset($connection);
			return $devolver;
		} 
		else 
		{
			unset($connectionstatus);
			unset($connection);
			echo 'Tenemos un problema: ' . mssql_get_last_message();
		}
	}

	public function fncBusinessAgregar($DtEvento) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {

			$VarNombre 								= $DtEvento->getVarNombre();
			$VarDescripcion 					= $DtEvento->getVarDescripcion();
    	$VarLugar 								= $DtEvento->getVarlugar();
			$VarTipo 									= $DtEvento->getVarTipo();
			$VarEstado 								= $DtEvento->getVarEstado();    	
    	$DateInicioFecha 					= $DtEvento->getDateInicioFecha();
    	$DateFinFecha 						= $DtEvento->getDateFinFecha();
    	$StimeInicioHora 					= $DtEvento->getStimeInicioHora();
    	$StimeFinHora 						= $DtEvento->getStimeFinHora();
    	$IntAforo 								= $DtEvento->getIntAforo();
    	$VarBanner 								= $DtEvento->getVarBanner();
    	$VarUbicacionLatitud 			= $DtEvento->getVarUbicacionLatitud();
			$VarUbicacionLongitud 		= $DtEvento->getVarUbicacionLongitud();
			$IdTipoEvento							= $DtEvento->getIdTipoEvento();
			$Dependencia					  	= $DtEvento->getDependencia();
			$IdPtaDependenciaFijo			= $DtEvento->getIdPtaDependenciaFijo();
			$IdDepe										= $DtEvento->getIdDepe();
			$VarUsuarioCreador				= $DtEvento->getvarUsuarioCreador();
    

      $sql = "usp_Eve_I_InsertaEvento";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@VarNombre', $VarNombre, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@VarDescripcion', $VarDescripcion, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@VarLugar', $VarLugar, SQLVARCHAR , false, false, 10);
			mssql_bind($proc, '@VarEstado', $VarEstado, SQLVARCHAR , false, false, 10);        
     	mssql_bind($proc, '@VarTipo', $VarTipo, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@DateInicioFecha', $DateInicioFecha, SQLVARCHAR  , false, false, 19); 
      mssql_bind($proc, '@DateFinFecha', $DateFinFecha, SQLVARCHAR , false, false, 19); 
      mssql_bind($proc, '@StimeInicioHora', $StimeInicioHora, SQLVARCHAR , false, false, 19); 
      mssql_bind($proc, '@StimeFinHora', $StimeFinHora, SQLVARCHAR , false, false, 19); 
      mssql_bind($proc, '@IntAforo', $IntAforo, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@VarBanner', $VarBanner, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@VarUbicacionLatitud', $VarUbicacionLatitud, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@VarUbicacionLongitud', $VarUbicacionLongitud, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@IdTipoEvento', $IdTipoEvento, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@IdDependencia', $Dependencia, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@IdPtaDependenciaFijo', $IdPtaDependenciaFijo, SQLVARCHAR , false, false, 9); 
			mssql_bind($proc, '@IdDepe', $IdDepe, SQLVARCHAR , false, false, 9); 
			mssql_bind($proc, '@VarUsuarioCreador', $VarUsuarioCreador, SQLVARCHAR , false, false, 9); 
      	
			$result = mssql_execute($proc);
			
		
			$devolver = sqlsrv_getdata($result);
			$connection -> closeConnection($connectionstatus);
			unset($connectionstatus);
			unset($connection);
			return $devolver;
		
    } 
    else 
    {
      unset($connectionstatus);
			unset($connection);
			echo 'Tenemos un problema: ' . mssql_get_last_message();
    }
  }

  public function fncBusinessModificar($DtEvento) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
			$IdEvento									= $DtEvento->getIdEvento();
    	$VarNombre 								= $DtEvento->getVarNombre();
			$VarDescripcion 					= $DtEvento->getVarDescripcion();
    	$VarLugar 								= $DtEvento->getVarlugar();
			$VarTipo 									= $DtEvento->getVarTipo();
			$VarEstado 								= $DtEvento->getVarEstado();    	
    	$DateInicioFecha 					= $DtEvento->getDateInicioFecha();
    	$DateFinFecha 						= $DtEvento->getDateFinFecha();
    	$StimeInicioHora 					= $DtEvento->getStimeInicioHora();
    	$StimeFinHora 						= $DtEvento->getStimeFinHora();
    	$IntAforo 								= $DtEvento->getIntAforo();
    	$VarBanner 								= $DtEvento->getVarBanner();
    	$VarUbicacionLatitud 			= $DtEvento->getVarUbicacionLatitud();
			$VarUbicacionLongitud 		= $DtEvento->getVarUbicacionLongitud();
			$IdTipoEvento							= $DtEvento->getIdTipoEvento();
			$IdPtaDependenciaFijo			= $DtEvento->getIdPtaDependenciaFijo();
			$IdDepe										= $DtEvento->getIdDepe();

      $sql = "usp_Eve_U_ActualizarEvento";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
			 $proc = mssql_init($sql, $connectionstatus);
			 mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR , false, false, 10);
			 mssql_bind($proc, '@VarNombre', $VarNombre, SQLVARCHAR , false, false, 10); 
			 mssql_bind($proc, '@VarDescripcion', $VarDescripcion, SQLVARCHAR , false, false, 10); 
			 mssql_bind($proc, '@VarLugar', $VarLugar, SQLVARCHAR , false, false, 10);
			 mssql_bind($proc, '@VarEstado', $VarEstado, SQLVARCHAR , false, false, 10);        
			 mssql_bind($proc, '@VarTipo', $VarTipo, SQLVARCHAR , false, false, 10); 
			 mssql_bind($proc, '@DateInicioFecha', $DateInicioFecha, SQLVARCHAR  , false, false, 19); 
			 mssql_bind($proc, '@DateFinFecha', $DateFinFecha, SQLVARCHAR , false, false, 19); 
			 mssql_bind($proc, '@StimeInicioHora', $StimeInicioHora, SQLVARCHAR , false, false, 19); 
			 mssql_bind($proc, '@StimeFinHora', $StimeFinHora, SQLVARCHAR , false, false, 19); 
			 mssql_bind($proc, '@IntAforo', $IntAforo, SQLVARCHAR , false, false, 10); 
			 mssql_bind($proc, '@VarBanner', $VarBanner, SQLVARCHAR , false, false, 10); 
			 mssql_bind($proc, '@VarUbicacionLatitud', $VarUbicacionLatitud, SQLVARCHAR , false, false, 10); 
			 mssql_bind($proc, '@VarUbicacionLongitud', $VarUbicacionLongitud, SQLVARCHAR , false, false, 10); 
			 mssql_bind($proc, '@IdTipoEvento', $IdTipoEvento, SQLVARCHAR , false, false, 10); 
			 mssql_bind($proc, '@IdPtaDependenciaFijo', $IdPtaDependenciaFijo, SQLVARCHAR , false, false, 9); 
			 mssql_bind($proc, '@IdDepe', $IdDepe, SQLVARCHAR , false, false, 9); 
			 
			 
      $result = mssql_execute($proc);

      if ($result) {
        $connection -> closeConnection($connectionstatus);
        unset($connectionstatus);
        unset($connection);
        return true;
      }else{
        $connection -> closeConnection($connectionstatus);
        unset($connectionstatus);
        unset($connection);
        return false;
      }
    } 
    else 
    {
      unset($connectionstatus);
      unset($connection);
      echo 'Tenemos un problema: ' . mssql_get_last_message();
    }
  }

  

  public function fncBusinessCambiarEstado($Valor, $IdEvento) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
			$IdEvento									= $IdEvento;
    	$Estado 								= $Valor;

      $sql = "usp_Eve_U_CambiarEstadoEvento";
			 $proc = mssql_init($sql, $connectionstatus);
			 mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR , false, false, 10);
			 mssql_bind($proc, '@Estado', $Estado, SQLVARCHAR , false, false, 10); 
			 
			 
      $result = mssql_execute($proc);

      if ($result) {
        $connection -> closeConnection($connectionstatus);
        unset($connectionstatus);
        unset($connection);
        return true;
      }else{
        $connection -> closeConnection($connectionstatus);
        unset($connectionstatus);
        unset($connection);
        return false;
      }
    } 
    else 
    {
      unset($connectionstatus);
      unset($connection);
      return false;
    }
  }

}

?>