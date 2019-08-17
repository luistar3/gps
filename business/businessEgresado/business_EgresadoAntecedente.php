<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_EgresadoAntecedente.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');


class business_EgresadoAntecedente
{

	public function fncBusinessConsultarPorEgresado($IdEgresado, $USRId)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_EgresadoAntecedente_ConsultarPorEgresado";

			// echo "usp_Sed_S_EgresadoAntecedente_Consultar ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
      mssql_bind($proc, '@IdEgresado', $IdEgresado, SQLINT4, false, false, 10);
			mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);

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

	public function fncBusinessConsultarPorId($IdEgresadoAntecedente, $USRId)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_EgresadoAntecedente_ConsultarPorId";

			// echo "usp_Sed_S_EgresadoAntecedente_ConsultarPorId ".$IdEgresadoAntecedente.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@IdEgresadoAntecedente', $IdEgresadoAntecedente, SQLINT4, false, false, 10);
			mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);

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


	public function fncBusinessAgregar($DtEgresadoAcademico) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$IdEgresado 						= $DtEgresadoAcademico->getIdEgresado();
    	$IdEmpresa 							= $DtEgresadoAcademico->getIdEmpresa();
    	$IdTipoContrato 				= $DtEgresadoAcademico->getIdTipoContrato();
    	$intTiempoLaboral 			= $DtEgresadoAcademico->getIntTiempoLaboral();
    	$varTipoTiempo 					= $DtEgresadoAcademico->getVarTipoTiempo();
    	$varPuesto 							= $DtEgresadoAcademico->getVarPuesto();

    	$varDireccionIP 				= fncObtenerIpAdress();

      $sql = "usp_Sed_I_EgresadoAntecedente";
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdEgresado', $IdEgresado, SQLINT4 , false, false, 10); 
     
     	mssql_bind($proc, '@IdEmpresa', $IdEmpresa, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@IdTipoContrato', $IdTipoContrato, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@intTiempoLaboral', $intTiempoLaboral, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@varTipoTiempo', $varTipoTiempo, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varPuesto', $varPuesto, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varDireccionIP', $varDireccionIP, SQLVARCHAR , false, false, 10); 					
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

  public function fncBusinessModificar($DtEgresadoAcademico) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$IdEgresadoAntecedente	= $DtEgresadoAcademico->getIdEgresadoAntecedente();
    	// $IdEgresado             = $DtEgresadoAcademico->getIdEgresado();
      $IdEmpresa              = $DtEgresadoAcademico->getIdEmpresa();
      $IdTipoContrato         = $DtEgresadoAcademico->getIdTipoContrato();
      $intTiempoLaboral       = $DtEgresadoAcademico->getIntTiempoLaboral();
      $varTipoTiempo          = $DtEgresadoAcademico->getVarTipoTiempo();
      $varPuesto              = $DtEgresadoAcademico->getVarPuesto();
    	$varDireccionIP 				= fncObtenerIpAdress();

      $sql = "usp_Sed_U_EgresadoAntecedente";
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdEgresadoAntecedente', $IdEgresadoAntecedente, SQLINT4 , false, false, 10); 
     
     	mssql_bind($proc, '@IdEmpresa', $IdEmpresa, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@IdTipoContrato', $IdTipoContrato, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@intTiempoLaboral', $intTiempoLaboral, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@varTipoTiempo', $varTipoTiempo, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varPuesto', $varPuesto, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varDireccionIP', $varDireccionIP, SQLVARCHAR , false, false, 10);     				
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


  public function fncBusinessEliminar($IdEgresadoAntecedente, $IdPtaDependenciaFijo) 
  { 
    $connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
      $sql = "usp_Sed_D_EgresadoAntecedente";
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdEgresadoAntecedente', $IdEgresadoAntecedente, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@IdPtaDependenciaFijo', $IdPtaDependenciaFijo, SQLINT4 , false, false, 10);
                
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