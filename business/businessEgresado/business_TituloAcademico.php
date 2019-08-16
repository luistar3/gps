<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/data/data_TituloAcademico.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/complements/navegador.php');


class business_TituloAcademico
{

	public function fncBusinessConsultarActivos()
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Sed_S_TituloAcademico_ConsultarActivos";
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

}

?>