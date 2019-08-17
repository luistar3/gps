<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_SectorOcupacional.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');


class business_SectorOcupacional
{

	public function fncBusinessConsultar()
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_SectorOcupacional_Consultar";

			// echo "usp_Sed_S_SectorOcupacional_Consultar ";
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

	public function fncBusinessConsultarPorId($IdSectorOcupacional)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_SectorOcupacional_ConsultarPorId";

			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@IdSectorOcupacional', $IdSectorOcupacional, SQLINT4, false, false, 10);

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

	// public function fncBusinessConsultarActivos()
	// {
		
	// 	$connection = new connection();
	// 	$connectionstatus = $connection -> openConnection();
	// 	if ($connectionstatus) 
	// 	{
	// 		$sql = "usp_Sed_S_SectorOcupacional_ConsultarActivos";
	// 		$proc = mssql_init($sql, $connectionstatus);  

	// 		$result = mssql_execute($proc);
	// 		$devolver = sqlsrv_getdata($result);
	// 		$connection -> closeConnection($connectionstatus);
	// 		unset($connectionstatus);
	// 		unset($connection);
	// 		return $devolver;
	// 	} 
	// 	else 
	// 	{
	// 		unset($connectionstatus);
	// 		unset($connection);
	// 		echo 'Tenemos un problema: ' . mssql_get_last_message();
	// 	}
	// }


	public function fncBusinessAgregar($DtSectorOcupacional) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$varNombre 								= $DtSectorOcupacional->getVarNombre();
    	$varDescripcion 					= $DtSectorOcupacional->getVarDescripcion();
    	$varTipo 									= $DtSectorOcupacional->getVarTipo();
    	$bitActivo								= $DtSectorOcupacional->getBitActivo();
    	
      $sql = "usp_Sed_I_SectorOcupacional";

      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@varNombre', $varNombre, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varDescripcion', $varDescripcion, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varTipo', $varTipo, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@bitActivo', $bitActivo, SQLINT4 , false, false, 10); 

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

  public function fncBusinessModificar($DtSectorOcupacional) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$IdSectorOcupacional			= $DtSectorOcupacional->getIdSectorOcupacional();

    	$varNombre 								= $DtSectorOcupacional->getVarNombre();
    	$varDescripcion 					= $DtSectorOcupacional->getVarDescripcion();
    	$varTipo 									= $DtSectorOcupacional->getVarTipo();
    	$bitActivo								= $DtSectorOcupacional->getBitActivo();

      $sql = "usp_Sed_U_SectorOcupacional";
      // echo "usp_Sed_U_SectorOcupacional ".$IdSectorOcupacional.', '.$varNombre.', '.$varDescripcion.', '.$varTipo.', '.$bitActivo;
      // exit();
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdSectorOcupacional', $IdSectorOcupacional, SQLINT4 , false, false, 10); 
     
     	mssql_bind($proc, '@varNombre', $varNombre, SQLVARCHAR , false, false, 550); 
      mssql_bind($proc, '@varDescripcion', $varDescripcion, SQLVARCHAR , false, false, 650); 
      mssql_bind($proc, '@varTipo', $varTipo, SQLVARCHAR , false, false, 10); 	
      mssql_bind($proc, '@bitActivo', $bitActivo, SQLINT4 , false, false, 10); 							
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