<?php 

include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_Evento.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');

class business_Evento
{

    public function fncBusinessListarEventos(){

		@session_start();
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			// if($_SESSION['usuario']["ses_Titulo"]=='Administrador'){

				$idPermiso = $_SESSION['usuario']["ses_Permiso"];
			
				$sql = "usp_Eve_ListarEventos";
				// echo $sql.' '.$idPermiso;
				$proc = mssql_init($sql, $connectionstatus); 
				
				mssql_bind($proc, '@USRId', $idPermiso, SQLVARCHAR, false, false, 30);
			// }
			// else{

			// 	$sql = "usp_Eve_ListarEventos";
			// 	$proc = mssql_init($sql, $connectionstatus); 
			// 	$idPermiso = $_SESSION['usuario']["ses_Permiso"];
			// 	mssql_bind($proc, '@USRId', $idPermiso, SQLVARCHAR, false, false, 30);
							
			// }
		
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