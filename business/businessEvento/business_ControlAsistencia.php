<?php 

include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_ControlAsistencia.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');

class business_ControlAsistencia
{

    
	public function fncBusinessObtenerFechaHora(){

		//	@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
				$sql = "usp_Eve_S_ObtenerFechaHora";
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
		public function fncBusinessObtenerHora(){

			//	@session_start();
				$connection = new connection();
				$connectionstatus = $connection -> openConnection();
				if ($connectionstatus) 
				{
					$sql = "usp_Eve_S_ObtenerHora";
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
		public function fncBusinessObtenerRegistroIdPersonaIdEvento($IdPersona, $IdEvento){

			//	@session_start();
				$connection = new connection();
				$connectionstatus = $connection -> openConnection();
				if ($connectionstatus) 
				{
					$sql = "usp_Eve_S_BuscarAsistencia";
					  //$USRId = $_SESSION['usuario']["ses_USRId"] ;
					// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
					$proc = mssql_init($sql, $connectionstatus); 
					mssql_bind($proc, '@IdEvento',$IdEvento , SQLINT4, false, false, 10);
					mssql_bind($proc, '@IdPersona', $IdPersona, SQLINT4, false, false, 10);
		
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
			public function fncBusinessObtenerRegistroIdPersonaIdEventoIdDetalle($IdPersona, $IdEvento,$IdDetalle){

				//	@session_start();
					$connection = new connection();
					$connectionstatus = $connection -> openConnection();
					if ($connectionstatus) 
					{
						$sql = "usp_Eve_S_BuscarRegistroControlAsistencia";
						  //$USRId = $_SESSION['usuario']["ses_USRId"] ;
						// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
						$proc = mssql_init($sql, $connectionstatus); 
						mssql_bind($proc, '@IdEvento',$IdEvento , SQLINT4, false, false, 10);
						mssql_bind($proc, '@IdPersona', $IdPersona, SQLINT4, false, false, 10);
						mssql_bind($proc, '@IdDetalleEvento', $IdDetalle, SQLINT4, false, false, 10);
			
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
// 	public function fncBusinessConsultar($idPtaDependenciaFijo, $NombreApellido = '', $varDni = '', $intEdad = '', $IdGradoAcademico = '', $IdSectorAcademico = '')
// 	{
// 		@session_start();
// 		$connection = new connection();
// 		$connectionstatus = $connection -> openConnection();
// 		if ($connectionstatus) 
// 		{
// 			$sql = "usp_Sed_S_Egresado_Consultar";
//       $USRId = $_SESSION['usuario']["ses_USRId"] ;
// 			// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
// 			$proc = mssql_init($sql, $connectionstatus); 
//       mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);
// 			mssql_bind($proc, '@IdPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);

//       mssql_bind($proc, '@NombreApellido', $NombreApellido, SQLVARCHAR, false, false, 10); 
//       mssql_bind($proc, '@varDni', $varDni, SQLVARCHAR, false, false, 10); 
//       mssql_bind($proc, '@intEdad', $intEdad, SQLINT4, false, false, 10); 
//       mssql_bind($proc, '@IdGradoAcademico', $IdGradoAcademico, SQLINT4, false, false, 10); 
//       mssql_bind($proc, '@IdSectorAcademico', $IdSectorAcademico, SQLINT4, false, false, 10); 

// 			$result = mssql_execute($proc);
// 			$devolver = sqlsrv_getdata($result);
// 			$connection -> closeConnection($connectionstatus);
// 			unset($connectionstatus);
// 			unset($connection);
// 			return $devolver;
// 		} 
// 		else 
// 		{
// 			unset($connectionstatus);
// 			unset($connection);
// 			echo 'Tenemos un problema: ' . mssql_get_last_message();
// 		}
// 	}

	public function fncBusinessConsultarPorId($Id)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_BuscarEventoId";

			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			//mssql_bind($proc, '@IdEgresado', $IdEgresado, SQLINT4, false, false, 10);
			mssql_bind($proc, '@Id', $Id, SQLINT4, false, false, 10);

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
	public function fncBusinessConsultarEntradaSalida($Id)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_ReporteEntradaSalidaControlAsistencia";

			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			//mssql_bind($proc, '@IdEgresado', $IdEgresado, SQLINT4, false, false, 10);
			mssql_bind($proc, '@idEvento', $Id , SQLINT4, false, false, 10);

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

	public function fncBusinessObtenerControlAsistencia($Id)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_BuscarCantidadAsistentes";

			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			//mssql_bind($proc, '@IdEgresado', $IdEgresado, SQLINT4, false, false, 10);
			mssql_bind($proc, '@IdEVento', $Id , SQLINT4, false, false, 10);

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

	public function fncBusinessBuscarRegistro($IdEvento,$IdPerosna)//Consulta hacia la tabla registro
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_BuscarRegistro";

			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			//mssql_bind($proc, '@IdEgresado', $IdEgresado, SQLINT4, false, false, 10);
			mssql_bind($proc, '@IdEvento', $IdEvento, SQLINT4, false, false, 10);
			mssql_bind($proc, '@IdPersona', $IdPerosna, SQLINT4, false, false, 10);

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

// 	public function fncBusinessConsultarEgresados($CodUniv, $NombreApellido, $idPtaDependenciaFijo)
// 	{
		
// 		$connection = new connection();
// 		$connectionstatus = $connection -> openConnection();
// 		if ($connectionstatus) 
// 		{
// 			$sql = "usp_Sed_S_Egresado_ConsultarEgresados";

// 			// echo "usp_Sed_S_Egresado_ConsultarEgresados ".$CodUniv.', '.$NombreApellido.', '.$idPtaDependenciaFijo;
// 			$proc = mssql_init($sql, $connectionstatus); 

// 			mssql_bind($proc, '@CodUniv', $CodUniv, SQLINT4, false, false, 10); 
// 			mssql_bind($proc, '@NombreApellido', $NombreApellido, SQLVARCHAR, false, false, 10); 
// 			mssql_bind($proc, '@idPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);

// 			$result = mssql_execute($proc);
// 			$devolver = sqlsrv_getdata($result);
// 			$connection -> closeConnection($connectionstatus);
// 			unset($connectionstatus);
// 			unset($connection);
// 			return $devolver;
// 		} 
// 		else 
// 		{
// 			unset($connectionstatus);
// 			unset($connection);
// 			echo 'Tenemos un problema: ' . mssql_get_last_message();
// 		}
// 	}

// 	public function fncBusinessBuscarInformacionEgresado($CodUniv, $ItemEst, $IdSem)
// 	{
		
// 		$connection = new connection();
// 		$connectionstatus = $connection -> openConnection();
// 		if ($connectionstatus) 
// 		{
// 			$sql = "usp_Sed_S_Egresado_BuscarInformacionEgresado";

// 			// echo "usp_Sed_S_Egresado_BuscarInformacionEgresado ".$CodUniv.', '.$ItemEst.', '.$IdSem;
// 			$proc = mssql_init($sql, $connectionstatus); 

// 			mssql_bind($proc, '@CodUniv', $CodUniv, SQLINT4, false, false, 10); 
// 			mssql_bind($proc, '@ItemEst', $ItemEst, SQLINT4, false, false, 10); 
// 			mssql_bind($proc, '@IdSem', $IdSem, SQLINT4, false, false, 10);

// 			$result = mssql_execute($proc);
// 			$devolver = sqlsrv_getdata($result);
// 			$connection -> closeConnection($connectionstatus);
// 			unset($connectionstatus);
// 			unset($connection);
// 			return $devolver;
// 		} 
// 		else 
// 		{
// 			unset($connectionstatus);
// 			unset($connection);
// 			echo 'Tenemos un problema: ' . mssql_get_last_message();
// 		}
// 	}

	public function fncBusinessAgregarControlAsistencia($DtControlAsistencia) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	
    	$IdPersona 								= $DtControlAsistencia->getIdpersona();
    	$IdEvento 									= $DtControlAsistencia->getIdEvento();
    	
		
		// private $stimeFechaAsiStencia;
		// private $IdPersona;
		// private $IdEvento;

      $sql = "usp_Eve_I_RegistroAsistencia";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdPersona', $IdPersona, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@IdEvento', $IdEvento, SQLINT4 , false, false, 10); 
    					
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
  
	public function fncBusinessAgregarControlAsistenciaAutomatico($IdPersona,$IdEvento,$IdDetalleEvento) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	
      $sql = "usp_Eve_I_AgregarControlAsistencia";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdPersona', $IdPersona, SQLINT4 , false, false, 10); 
	  mssql_bind($proc, '@IdEvento', $IdEvento, SQLINT4 , false, false, 10); 
	  mssql_bind($proc, '@IdDetalleEvento', $IdDetalleEvento, SQLINT4 , false, false, 10); 
    					
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
  public function fncBusinessAgregarControlAsistenciaAutomaticoSalida($IdcontrolAsistencia) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
		
    	
      $sql = "usp_Eve_U_ActualizarRegistroSalidaAutomatica";
			 // echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
	$proc = mssql_init($sql, $connectionstatus);
	  mssql_bind($proc, '@IdControlAsistencia', $IdcontrolAsistencia,  SQLVARCHAR , false, false, 10); 
    					
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
	public function fncBusinessAgregarControlAsistenciaAutomaticoNull($IdPersona,$IdEvento,$IdDetalleEvento) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
			$sql = "usp_Eve_U_ActualizarRegistroSalidaAutomaticaNull";
    	
			$proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdPersona', $IdPersona, SQLINT4 , false, false, 10); 
	 		mssql_bind($proc, '@IdEvento', $IdEvento, SQLINT4 , false, false, 10); 
	 		mssql_bind($proc, '@IdDetalleEvento', $IdDetalleEvento, SQLINT4 , false, false, 10); 
    					
    					
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

  public function fncBusinessAgregarControlAsistenciaSalida($data_ControlAsistencia) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	 $IdcontrolAsistencia						= $data_ControlAsistencia->getIdControlAsistecia();
    

      $sql = "usp_Eve_U_ActualizarRegistroSalida";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdControlAsistencia', $IdcontrolAsistencia, SQLVARCHAR , false, false, 10); 
   				
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

}

?>