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
			$sql = "usp_Eve_S_BuscarUsuarioClave";
			$proc = mssql_init($sql, $connectionstatus);  

			mssql_bind($proc, '@Usuario', $DataUsuario->getUsuario(), SQLVARCHAR, false, false, 10); 
			mssql_bind($proc, '@Clave', $DataUsuario->getClave(), SQLVARCHAR, false, false, 10); 

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
	public function fncBusinessBuscarUsuario($documento)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_BuscarUsuario";
			$proc = mssql_init($sql, $connectionstatus);  

			 
			mssql_bind($proc, '@documento', $documento, SQLVARCHAR, false, false, 30); 

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
	public function fncBusinessAgregarUsuario($data_Usuario)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{

			$Usuario		 =$data_Usuario -> getUsuario();
			$clave			 =$data_Usuario -> getClave();
			$Rol			 =$data_Usuario -> getIdRol();
			$Nombre			 =$data_Usuario -> getVarNombres();
			$Apellidos		 =$data_Usuario -> getvarApellidos();
			$Estado			 =$data_Usuario -> getEstado();
			$CambioContrasena=$data_Usuario -> getCambioContrasena();
			$UsuarioCreador	 =$data_Usuario -> getUsuarioCreador();
			$DireccionIp 	 =$data_Usuario -> getDireccionIp();
			$DireccionMac	 =$data_Usuario -> getDireccionMac();



			$sql = "usp_Eve_I_AgregarUsuario";
			$proc = mssql_init($sql, $connectionstatus);  

			 
			
			mssql_bind($proc, '@Usuario', $Usuario, SQLVARCHAR, false, false, 30);
			mssql_bind($proc, '@Clave', $clave, SQLVARCHAR, false, false, 30);
			mssql_bind($proc, '@IdRol', $Rol, SQLVARCHAR, false, false, 30);
			mssql_bind($proc, '@VarNombres', $Nombre, SQLVARCHAR, false, false, 30); 
			mssql_bind($proc, '@VarApellidos', $Apellidos, SQLVARCHAR, false, false, 30);
			mssql_bind($proc, '@CambioContrasena', $CambioContrasena, SQLINT4, false, false, 10); 
			mssql_bind($proc, '@UsuarioCreador', $UsuarioCreador, SQLINT4, false, false, 10); 
			mssql_bind($proc, '@DireccionMac', $DireccionMac, SQLVARCHAR, false, false, 100); 
			mssql_bind($proc, '@DireccionIp', $DireccionIp, SQLVARCHAR, false, false, 100); 



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

		public function fncBusinessActualizarContrasenaUsuario($dni,$clave)
	{
	  
	  $connection = new connection();
	  $connectionstatus = $connection -> openConnection();
	  if ($connectionstatus) 
	  {
		$sql = "usp_Eve_U_ActualizarContrasenaUsuario";
		$proc = mssql_init($sql, $connectionstatus);  
		// echo "usp_Sed_S_Usuario_AutenticarUsuarioPermisos ".$CodPer.', '.$CodUniv;
		mssql_bind($proc, '@dni', $dni, SQLVARCHAR, false, false, 20); 
		mssql_bind($proc, '@contrasenaNueva', (md5($clave)) , SQLVARCHAR, false, false, 300); 
	   
  
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











 
}

?>