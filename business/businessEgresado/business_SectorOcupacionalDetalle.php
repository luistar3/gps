<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_SectorOcupacionalDetalle.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');


class business_SectorOcupacionalDetalle
{

	public function fncBusinessConsultarActivos()
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_SectorOcupacionalDetalle_ConsultarActivos";
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


	public function fncBusinessConsultarPorSectorOcupacional($IdSectorOcupacional)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_SectorOcupacionalDetalle_ConsultarPorSectorOcupacional";
      // echo "usp_Sed_S_SectorOcupacionalDetalle_ConsultarPorSectorOcupacional ".$IdSectorOcupacional;
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

	public function fncBusinessConsultarPorId($IdSectorOcupacionalDetalle)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_SectorOcupacionalDetalle_ConsultarPorId";

			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@IdSectorOcupacionalDetalle', $IdSectorOcupacionalDetalle, SQLINT4, false, false, 10);

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


	public function fncBusinessAgregar($DtSectorOcupacionalDetalle) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$IdSectorOcupacional	= $DtSectorOcupacionalDetalle->getIdSectorOcupacional();
    	$varNombre 						= $DtSectorOcupacionalDetalle->getVarNombre();
    	$varDescripcion 			= $DtSectorOcupacionalDetalle->getVarDescripcion();
    	$bitActivo 						= $DtSectorOcupacionalDetalle->getBitActivo();

      $sql = "usp_Sed_I_SectorOcupacionalDetalle";
      // echo "usp_Sed_I_SectorOcupacionalDetalle ".$IdSectorOcupacional.', '.$varNombre.', '.$varDescripcion.', '.$bitActivo;
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdSectorOcupacional', $IdSectorOcupacional, SQLINT4 , false, false, 10); 
     
     	mssql_bind($proc, '@varNombre', $varNombre, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varDescripcion', $varDescripcion, SQLVARCHAR , false, false, 10); 
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

  public function fncBusinessModificar($DtSectorOcupacionalDetalle) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$IdSectorOcupacionalDetalle	= $DtSectorOcupacionalDetalle->getIdSectorOcupacionalDetalle();

    	$IdSectorOcupacional				= $DtSectorOcupacionalDetalle->getIdSectorOcupacional();
    	$varNombre 									= $DtSectorOcupacionalDetalle->getVarNombre();
    	$varDescripcion 						= $DtSectorOcupacionalDetalle->getVarDescripcion();
    	$bitActivo 									= $DtSectorOcupacionalDetalle->getBitActivo();

      $sql = "usp_Sed_U_SectorOcupacionalDetalle";
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdSectorOcupacionalDetalle', $IdSectorOcupacionalDetalle, SQLINT4 , false, false, 10); 
     
     	mssql_bind($proc, '@IdSectorOcupacional', $IdSectorOcupacional, SQLINT4 , false, false, 10);      
     	mssql_bind($proc, '@varNombre', $varNombre, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varDescripcion', $varDescripcion, SQLVARCHAR , false, false, 10); 
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