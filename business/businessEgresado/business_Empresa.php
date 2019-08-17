<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_Empresa.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');


class business_Empresa
{

	public function fncBusinessConsultarActivos()
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_Empresa_ConsultarActivos";
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


	public function fncBusinessConsultar()
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_Empresa_Consultar";

			// echo "usp_Sed_S_Empresa_Consultar ";
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

	public function fncBusinessConsultarPorId($IdEmpresa)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_Empresa_ConsultarPorId";

			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@IdEmpresa', $IdEmpresa, SQLINT4, false, false, 10);

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

  public function fncBusinessVerificarRuc($DtEmpresa)
  {
    
    $connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
      $varRuc                       = $DtEmpresa->getVarRuc();
      
      $sql = "usp_Sed_S_Empresa_VerificarRuc";

      $proc = mssql_init($sql, $connectionstatus); 
      mssql_bind($proc, '@varRuc', $varRuc, SQLVARCHAR, false, false, 10);

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

	public function fncBusinessAgregar($DtEmpresa) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$IdSectorOcupacionalDetalle 	= $DtEmpresa->getIdSectorOcupacionalDetalle();
      $varRuc                       = $DtEmpresa->getVarRuc();
    	$varNombre 										= $DtEmpresa->getVarNombre();
    	$varDireccion 								= $DtEmpresa->getVarDireccion();
    	$varTelefono 									= $DtEmpresa->getVarTelefono();
    	$bitActivo										= $DtEmpresa->getBitActivo();
    	
      $sql = "usp_Sed_I_Empresa";

      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdSectorOcupacionalDetalle', $IdSectorOcupacionalDetalle, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@varRuc', $varRuc, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varNombre', $varNombre, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varDireccion', $varDireccion, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varTelefono', $varTelefono, SQLVARCHAR , false, false, 10); 
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

  public function fncBusinessModificar($DtEmpresa) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$IdEmpresa										= $DtEmpresa->getIdEmpresa();

    	$IdSectorOcupacionalDetalle 	= $DtEmpresa->getIdSectorOcupacionalDetalle();
      $varRuc                       = $DtEmpresa->getVarRuc();
    	$varNombre 										= $DtEmpresa->getVarNombre();
    	$varDireccion 								= $DtEmpresa->getVarDireccion();
    	$varTelefono 									= $DtEmpresa->getVarTelefono();
    	$bitActivo										= $DtEmpresa->getBitActivo();

      $sql = "usp_Sed_U_Empresa";

      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdEmpresa', $IdEmpresa, SQLINT4 , false, false, 10); 
     
     	mssql_bind($proc, '@IdSectorOcupacionalDetalle', $IdSectorOcupacionalDetalle, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@varRuc', $varRuc, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varNombre', $varNombre, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varDireccion', $varDireccion, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varTelefono', $varTelefono, SQLVARCHAR , false, false, 10); 
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