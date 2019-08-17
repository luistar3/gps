<?php
// Provee la clase para la conexión entre la aplicación y la base de datos.
// Para que sea correcta, se debe tener la extensión sqlsrv, es valido desde php 5.2.
// Modificar los parametros del constructor editará los parametros de la conexión.

class connection
{

	// $status -> El estatus de la conexión
	// $server -> La IP o dirección del servidor de la base de datos SQL Server
	// $database -> El nombre de la base de datos que vamos a tomar como predeterminada
	// $userid -> El nombre de usuario a conectarse a la base de datos
	// $passwd -> La contraseña de la base de datos a conectarse

	private $server;
	private $database;
	private $userid;
	private $passwd;

	function __construct()
	{
		
		$this->server = 'localhost';
		$this->database = 'GPSTEL';
		$this->userid = 'sa';
		$this->passwd = 'upt';
	}


	// La función que iniciará la conexión con la base de datos

	public function openConnection()
	{
		$status = null;

		if (!isset($status))
		{
			$status = mssql_connect($this -> server, $this -> userid, $this -> passwd);
			mssql_query('set dateformat dmy');
    	mssql_query('set datefirst 1');
			mssql_query("SET ANSI_NULLS ON");
      mssql_query("SET ANSI_WARNINGS ON");
			if (!$status || !mssql_select_db($this -> database, $status))
			{
				die('Error fatal. No se puede conectar a la base de datos.');
			}
			return $status;
		}
		else
		{
			return $status;
		}
	}

	public function closeConnection($status)
	{
		@mssql_close($status);
	}
}

?>
