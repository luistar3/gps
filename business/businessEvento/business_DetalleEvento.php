<?php 

include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_DetalleEvento.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');

class business_DetalleEvento
{

    public function fncBusinessListarEventosDetalle($dtDetalleEvento){

	//	@session_start();
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$IdEvento = $dtDetalleEvento ->getIdEvento();
			$sql = "usp_Eve_S_ListarPorIdEventoParaDetalleEvento";

			// echo $sql." ".$IdEvento;
      		
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
	public function fncBusinessBuscarFechaLimiteEvento($IdEvento){

		//	@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
			
				$sql = "usp_Eve_S_BuscarFechaLimiteEvento";
						
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
	public function fncBusinessListarEventosMes(){

		//	@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
				$sql = "usp_Eve_S_ListarTodosEventos";
						
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
	public function fncBusinessListarDetallePorIdEvento($IdEvento,$Fecha, $IdDetalleEvento = 0){

		//	@session_start();

		  $intIdEvento =(int)$IdEvento;
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
				$sql = "usp_Eve_S_BuscarPorIdEventoDetalleEvento";
				$proc = mssql_init($sql, $connectionstatus); 
				mssql_bind($proc, '@IdEvento',$intIdEvento, SQLVARCHAR, false, false, 10);
				mssql_bind($proc, '@Fecha',$Fecha, SQLVARCHAR, false, false, 10);
				mssql_bind($proc, '@IdDetalleEvento',$IdDetalleEvento, SQLVARCHAR, false, false, 10);
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

	public function fncBusinessEliminar($IdDetalleEvento)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_U_EliminarDetalleDetalleEvento";

			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@IdDetalleEvento', $IdDetalleEvento, SQLVARCHAR, false, false, 10);
			

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

	public function fncBusinessAgregar($data_DetalleEvento) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {

			$IdEvento								= $data_DetalleEvento->getIdEvento();
			$Estado 								= $data_DetalleEvento->getVarEstado();
    	$Fecha 									= $data_DetalleEvento->getDateFecha();
			$InicioHora 						= $data_DetalleEvento->getTimeInicioHora();
			$FinHora 								= $data_DetalleEvento->getTimeFinHora();   
			$Comentario 						= $data_DetalleEvento->getVarComentario();   	

    	// $datIngresoUniversidad 	= $DtEgresado->getDatIngresoUniversidad();
    	// $datEgresoUniversidad 	= $DtEgresado->getDatEgresoUniversidad();
    	// $IdGradoAcademico 			= $DtEgresado->getIdGradoAcademico();
    	// $datGradoAcademico 			= $DtEgresado->getDatGradoAcademico();
    	// $IdTituloAcademico 			= $DtEgresado->getIdTituloAcademico();
    	// $datTitulacion 					= $DtEgresado->getDatTitulacion();
    	// $varDireccionIP 				= fncObtenerIpAdress();

      $sql = "usp_Eve_I_InsertarNuevaEtapaDetalleEvento";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@Estado', $Estado, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@Fecha', $Fecha, SQLVARCHAR , false, false, 10);
			mssql_bind($proc, '@InicioHora', $InicioHora, SQLVARCHAR , false, false, 10);        
			mssql_bind($proc, '@Finhora', $FinHora, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@Comentario', $Comentario, SQLVARCHAR , false, false, 10); 
     
      	
			$result = mssql_execute($proc);
			
		//	echo ($result);

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


  public function fncBusinessMarcarCarnetDescargado($IdEvento, $IdPersona) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {

      $sql = "usp_Eve_U_MarcarCarnetDescargado";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@IdPersona', $IdPersona, SQLVARCHAR , false, false, 10);      
      	
			$result = mssql_execute($proc);
			
		//	echo ($result);

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


  public function fncBusinessModificar($data_DetalleEvento) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {

    	$IdDetalleEvento				= $data_DetalleEvento->getIdDetalleEvento();
			// $IdEvento								= $data_DetalleEvento->getIdEvento();
			$Estado 								= $data_DetalleEvento->getVarEstado();
    	$Fecha 									= $data_DetalleEvento->getDateFecha();
			$InicioHora 						= $data_DetalleEvento->getTimeInicioHora();
			$FinHora 								= $data_DetalleEvento->getTimeFinHora();   
			$Comentario 						= $data_DetalleEvento->getVarComentario();   	

    	// $datIngresoUniversidad 	= $DtEgresado->getDatIngresoUniversidad();
    	// $datEgresoUniversidad 	= $DtEgresado->getDatEgresoUniversidad();
    	// $IdGradoAcademico 			= $DtEgresado->getIdGradoAcademico();
    	// $datGradoAcademico 			= $DtEgresado->getDatGradoAcademico();
    	// $IdTituloAcademico 			= $DtEgresado->getIdTituloAcademico();
    	// $datTitulacion 					= $DtEgresado->getDatTitulacion();
    	// $varDireccionIP 				= fncObtenerIpAdress();

      $sql = "usp_Eve_U_DetalleEvento";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdDetalleEvento', $IdDetalleEvento, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@Estado', $Estado, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@Fecha', $Fecha, SQLVARCHAR , false, false, 10);
			mssql_bind($proc, '@InicioHora', $InicioHora, SQLVARCHAR , false, false, 10);        
			mssql_bind($proc, '@Finhora', $FinHora, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@Comentario', $Comentario, SQLVARCHAR , false, false, 10); 
     
      	
			$result = mssql_execute($proc);
			
		//	echo ($result);

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