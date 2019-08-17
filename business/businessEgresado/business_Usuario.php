<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_Usuario.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');


class business_Usuario
{

	public function fncBusinessAutenticarUsuario($DataUsuario)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_Usuario_AutenticarUsuario";
			$proc = mssql_init($sql, $connectionstatus);  

			mssql_bind($proc, '@varUsuario', $DataUsuario->getVarUsuario(), SQLVARCHAR, false, false, 10); 
			mssql_bind($proc, '@varContrasena', $DataUsuario->getVarContrasena(), SQLVARCHAR, false, false, 10); 

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


  public function fncBusinessAutenticarUsuarioPermisos($post_usuario)
  {
    
    $connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
      $sql = "usp_Eve_S_AutenticarUsuarioPermisosUsuario";
      $proc = mssql_init($sql, $connectionstatus);  
      // echo "usp_Sed_S_Usuario_AutenticarUsuarioPermisos ".$CodPer.', '.$CodUniv;
      mssql_bind($proc, '@dni', $post_usuario, SQLVARCHAR, false, false, 20); 
     

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
			$sql = "usp_Sed_S_Usuario_Consultar";

			// echo "usp_Sed_S_Usuario_Consultar ";
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

	public function fncBusinessConsultarPorId($IdUsuario)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_Usuario_ConsultarPorId";

			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@IdUsuario', $IdUsuario, SQLINT4, false, false, 10);

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

  public function fncBusinessVerificarUsuario($DtUsuario)
  {
    
    $connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
      $varUsuario                       = $DtUsuario->getVarUsuario();
      
      $sql = "usp_Sed_S_Usuario_VerificarUsuario";

      $proc = mssql_init($sql, $connectionstatus); 
      mssql_bind($proc, '@varUsuario', $varUsuario, SQLVARCHAR, false, false, 10);

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


  public function fncBusinessConsultarDependenciasUsuario($USRId)
  {
    $connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {      
      $sql = "usp_Sed_S_Usuario_ConsultarDependenciasUsuario";

      $proc = mssql_init($sql, $connectionstatus); 
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


  public function fncBusinessConsultarPermisoModulo($USRId, $btnModulo)
  {
    $connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {      
      $sql = "usp_Sed_S_Usuario_ConsultarPermisoModulo";

      $proc = mssql_init($sql, $connectionstatus); 
      mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);
      mssql_bind($proc, '@btnModulo', $btnModulo, SQLVARCHAR , false, false, 10);

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


	public function fncBusinessAgregar($DtUsuario) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$varUsuario 						= $DtUsuario->getVarUsuario();
      $varContrasena 	 				= $DtUsuario->getVarContrasena();
    	$varNombres 						= $DtUsuario->getVarNombre();
    	$varApellidos						= $DtUsuario->getVarApellido();
    	$varNivel 							= $DtUsuario->getVarNivel();
    	$IdPtaDependenciaFijo 	= $DtUsuario->getIdPtaDependenciaFijo();
    	$bitActivo							= $DtUsuario->getBitActivo();
    	$varDireccionIP 				= fncObtenerIpAdress();
    	
      $sql = "usp_Sed_I_Usuario";

      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@varUsuario', $varUsuario, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varContrasena', $varContrasena, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varNombres', $varNombres, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varApellidos', $varApellidos, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varNivel', $varNivel, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@IdPtaDependenciaFijo', $IdPtaDependenciaFijo, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@bitActivo', $bitActivo, SQLINT4 , false, false, 10); 
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

  public function fncBusinessModificar($DtUsuario) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$IdUsuario							= $DtUsuario->getIdUsuario();

    	// $varUsuario 						= $DtUsuario->getVarUsuario();
      $varContrasena 	 				= $DtUsuario->getVarContrasena();
    	$varNombres 						= $DtUsuario->getVarNombre();
    	$varApellidos 					= $DtUsuario->getVarApellido();
    	$varNivel 							= $DtUsuario->getVarNivel();
    	$IdPtaDependenciaFijo 	= $DtUsuario->getIdPtaDependenciaFijo();
    	$bitActivo							= $DtUsuario->getBitActivo();
    	$varDireccionIP 				= fncObtenerIpAdress();

      $sql = "usp_Sed_U_Usuario";

      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdUsuario', $IdUsuario, SQLINT4 , false, false, 10); 
     
     	// mssql_bind($proc, '@varUsuario', $varUsuario, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varContrasena', $varContrasena, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varNombres', $varNombres, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varApellidos', $varApellidos, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varNivel', $varNivel, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@IdPtaDependenciaFijo', $IdPtaDependenciaFijo, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@bitActivo', $bitActivo, SQLINT4 , false, false, 10); 
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


  public function fncBusinessModificarInformacion($DtUsuario) 
  { 
    $connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
      $IdUsuario              = $DtUsuario->getIdUsuario();

      // $varUsuario            = $DtUsuario->getVarUsuario();
      // $varContrasena          = $DtUsuario->getVarContrasena();
      $varNombres             = $DtUsuario->getVarNombre();
      $varApellidos           = $DtUsuario->getVarApellido();
      $varNivel               = $DtUsuario->getVarNivel();
      $IdPtaDependenciaFijo   = $DtUsuario->getIdPtaDependenciaFijo();
      $bitActivo              = $DtUsuario->getBitActivo();
      $varDireccionIP         = fncObtenerIpAdress();

      $sql = "usp_Sed_U_Usuario_Informacion";

      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdUsuario', $IdUsuario, SQLINT4 , false, false, 10); 
     
      // mssql_bind($proc, '@varUsuario', $varUsuario, SQLVARCHAR , false, false, 10); 
      // mssql_bind($proc, '@varContrasena', $varContrasena, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varNombres', $varNombres, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varApellidos', $varApellidos, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@varNivel', $varNivel, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@IdPtaDependenciaFijo', $IdPtaDependenciaFijo, SQLINT4 , false, false, 10); 
      mssql_bind($proc, '@bitActivo', $bitActivo, SQLINT4 , false, false, 10); 
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

}

?>