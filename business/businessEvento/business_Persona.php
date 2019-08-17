<?php 

include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_Persona.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/business/businessEvento/business_Registro.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/business/businessEvento/business_Persona.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_Registro.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_Persona.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');

class business_Persona
{

    public function fncBusinessListarPersonas(){

	//	@session_start();
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_ListarPersonas";
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
	
	public function fncBusinessAutenticarUsuario($DataUsuario)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_AutenticarUsuario";
			$proc = mssql_init($sql, $connectionstatus);  

			mssql_bind($proc, '@usuario', $DataUsuario->getVarUsuario(), SQLVARCHAR, false, false, 10); 
			mssql_bind($proc, '@password', $DataUsuario->getVarClave(), SQLVARCHAR, false, false, 10); 

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

	public function fncBusinessBuscarIdPorDni($dtPersona)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_BuscarPersonaPorDni";
			$proc = mssql_init($sql, $connectionstatus);  

			mssql_bind($proc, '@dni', $dtPersona->getVarDni(), SQLVARCHAR, false, false, 8); 
			

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
	public function fncBusinessGenerarPorIdEvento($IdEvento)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_GenerarPorIdEvento";
			$proc = mssql_init($sql, $connectionstatus);  

			mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR, false, false, 8); 
			

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
	public function fncBusinessConsultarPorId($IdPersona)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_BuscarPersonaId";
			$proc = mssql_init($sql, $connectionstatus);  

			mssql_bind($proc, '@IdPersona', $IdPersona, SQLVARCHAR, false, false, 10); 
			

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

// 	public function fncBusinessConsultarPorId($IdEgresado, $USRId)
// 	{
		
// 		$connection = new connection();
// 		$connectionstatus = $connection -> openConnection();
// 		if ($connectionstatus) 
// 		{
// 			$sql = "usp_Sed_S_Egresado_ConsultarPorId";

// 			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
// 			$proc = mssql_init($sql, $connectionstatus); 
// 			mssql_bind($proc, '@IdEgresado', $IdEgresado, SQLINT4, false, false, 10);
// 			mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);

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
public function fncBusinessConsultarDniInterno($dni) //cosultar a al tabla intenr ade personas registradas para  buscar dni y reemplazar datos 
{
	
	$connection = new connection();
	$connectionstatus = $connection -> openConnection();
	if ($connectionstatus) 
	{
		$sql = "usp_Eve_S_PersonaDniInterna";

		// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
		$proc = mssql_init($sql, $connectionstatus); 
		mssql_bind($proc, '@dni', $dni, SQLVARCHAR, false, false, 30);
		

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
	public function fncBusinessConsultarPorDni($dni)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_PersonaDni";

			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@dni', $dni, SQLVARCHAR, false, false, 10);
			

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


	public function fncBusinessConsultarPorApellido($apellidoPaterno,$apellidoMaterno,$dni,$nombre)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_BuscarPersonaPorApellido";

			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@apellidoPaterno', $apellidoPaterno, SQLVARCHAR, false, false, 30);
			mssql_bind($proc, '@apellidoMaterno', $apellidoMaterno, SQLVARCHAR, false, false, 30);
			mssql_bind($proc, '@nombre', $nombre, SQLVARCHAR, false, false, 30);
			mssql_bind($proc, '@dni', $dni, SQLVARCHAR, false, false, 30);
			
			

			$result = mssql_execute($proc);
			$devolver = sqlsrv_getdata($result);
			$connection -> closeConnection($connectionstatus);
			unset($connectionstatus);
			unset($connection);
			//print_r($nombre);
			return $devolver;
		} 
		else 
		{
			unset($connectionstatus);
			unset($connection);
			echo 'Tenemos un problema: ' . mssql_get_last_message();
		}
	}


	public function fncBusinessConsultarPorUsuario($usuario)
	{
		
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_PersonaUsuario";

			// echo "usp_Sed_S_Egresado_ConsultarPorId ".$IdEgresado.", ".$USRId;
			$proc = mssql_init($sql, $connectionstatus); 
			mssql_bind($proc, '@usuario', $usuario, SQLVARCHAR, false, false, 20);
	

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

	public function fncBusinessAgregar($DtPersona) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
			
    	$varDni 				  	= $DtPersona->getVarDni();
    	$varNombre 					= $DtPersona->getVarNombre();
    	$varApellido 				= $DtPersona->getVarApellido();
    	$varCorreo 					= $DtPersona->getVarCorreo();
    	$intCelular 				= $DtPersona->getIntCelular();
    	$varEstado 					= $DtPersona->getVarEstado();
    	$varUsuario 				= $DtPersona->getVarUsuario();
    	$varClave 					= $DtPersona->getVarClave();
    	$varAvatar 					= $DtPersona->getVarAvatar();
			$IdTipoPersona 			= $DtPersona->getIdTipoPersona();
			
			$ApeMat               = $DtPersona->  getApeMat();
			$ApePat            		= $DtPersona->	getApePat();
			$Estamento            = $DtPersona->  getEstamento();
			$FechaFinContrato  		= $DtPersona->  getFechaFinContrato();
			$FechaInicioContrato  = $DtPersona->  getFechaInicioContrato();
			$Dependencia          = $DtPersona->  getDependencia();
			$UnidadOrganica       = $DtPersona->  getUnidadOrganica();
			$Cargo                = $DtPersona->  getCargo();
			$DependenciaCargo     = $DtPersona->  getDependenciaCargo();
			$varUsuarioCreador    = $DtPersona->  getVarUsuarioCreador();

			$varDireccionIP 			= $DtPersona->	getVarDireccionIP();
			$varDireccionMac			= $DtPersona->	getVarDireccionMAC();
			$varNavegador					= $DtPersona->	getVarNavegadorWeb();

    	// $varEmail 							= $DtEgresado->getVarEmail();
    	// $datIngresoUniversidad 	= $DtEgresado->getDatIngresoUniversidad();
    	// $datEgresoUniversidad 	= $DtEgresado->getDatEgresoUniversidad();
    	// $IdGradoAcademico 			= $DtEgresado->getIdGradoAcademico();
    	// $datGradoAcademico 			= $DtEgresado->getDatGradoAcademico();
    	// $IdTituloAcademico 			= $DtEgresado->getIdTituloAcademico();
    	// $datTitulacion 					= $DtEgresado->getDatTitulacion();
			// $varDireccionIP 				= fncObtenerIpAdress();
			// $VarUsuarioCreador = 0;
			// if (isset( $_SESSION['usuario']["ses_IdUsuario"])) {
			// 	$VarUsuarioCreador = $_SESSION['usuario']["ses_IdUsuario"];
			// }
			

      $sql = "usp_Eve_I_AgregarPersona";
 			 //echo $sql.' '.$varDni.', '.$varNombre.', '.$varApellido.', '.$varCorreo.', '.$intCelular.', '.$varEstado.', '.$varUsuario.', '.$varClave.', '.$varAvatar.', '.$ApeMat.', '.$ApePat.', '.$Estamento.', '.$FechaInicioContrato.', '.$FechaFinContrato.', '.$Dependencia.', '.$UnidadOrganica.', '.$Cargo.', '.$DependenciaCargo.', '.$DependenciaCargo;
			$proc = mssql_init($sql, $connectionstatus);
			
      mssql_bind($proc, '@dni', $varDni, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@nombre', $varNombre, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@apellido', $varApellido, SQLVARCHAR , false, false, 100); 
     
     	mssql_bind($proc, '@correo', $varCorreo, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@celular', $intCelular, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@estado', $varEstado, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@usuario', $varUsuario, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@clave', $varClave, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@avatar', $varAvatar, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@idTipoPersona', $IdTipoPersona, SQLVARCHAR , false, false, 10); 
			
			mssql_bind($proc, '@ApeMat', $ApeMat, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@ApePat', $ApePat, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@Estamento', $Estamento, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@FechaInicioContrato', $FechaInicioContrato, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@FechaFinContrato', $FechaFinContrato, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@Dependencia', $Dependencia, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@UnidadOrganica', $UnidadOrganica, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@Cargo', $Cargo, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@DependenciaCargo', $DependenciaCargo, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@VarUsuarioCreador', $varUsuarioCreador, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@VarDireccionIp', $varDireccionIP, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@VarDireccionMac', $varDireccionMac, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@VarNavegadorWeb', $varNavegador, SQLVARCHAR , false, false, 300); 

     					
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
	

	

  public function fncBusinessModificar($DtPersona) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
			$IdPersona					= $DtPersona->getIdPersona();
    	$varDni 					  = $DtPersona->getVarDni();
    	$varNombre 					= $DtPersona->getVarNombre();
    	$varApellido 				= $DtPersona->getVarApellido();
    	$varCorreo 					= $DtPersona->getVarCorreo();
    	$intCelular 				= $DtPersona->getIntCelular();
    	$varEstado 					= $DtPersona->getVarEstado();
    	$varUsuario 				= $DtPersona->getVarUsuario();
    	$varClave 					= $DtPersona->getVarClave();
    	$varAvatar 					= $DtPersona->getVarAvatar();
			$IdTipoPersona 			= $DtPersona->getIdTipoPersona();
			
			$ApeMat               = $DtPersona->  getApeMat();
			$ApePat            		= $DtPersona->	getApePat();
			$Estamento            = $DtPersona->  getEstamento();
			$FechaInicioContrato  = $DtPersona->  getFechaFinContrato();
			$FechaFinContrato     = $DtPersona->  getFechaInicioContrato();
			$Dependencia          = $DtPersona->  getDependencia();
			$UnidadOrganica       = $DtPersona->  getUnidadOrganica();
			$Cargo                = $DtPersona->  getCargo();
			$DependenciaCargo     = $DtPersona->  getDependenciaCargo();
    	// $varEmail 							= $DtEgresado->getVarEmail();
    	// $datIngresoUniversidad 	= $DtEgresado->getDatIngresoUniversidad();
    	// $datEgresoUniversidad 	= $DtEgresado->getDatEgresoUniversidad();
    	// $IdGradoAcademico 			= $DtEgresado->getIdGradoAcademico();
    	// $datGradoAcademico 			= $DtEgresado->getDatGradoAcademico();
    	// $IdTituloAcademico 			= $DtEgresado->getIdTituloAcademico();
    	// $datTitulacion 					= $DtEgresado->getDatTitulacion();
    	// $varDireccionIP 				= fncObtenerIpAdress();

      $sql = "usp_Eve_U_ActualizarPersona";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
			$proc = mssql_init($sql, $connectionstatus);
			mssql_bind($proc, '@IdPersona', base64_decode($IdPersona), SQLINT4 , false, false, 10);
      mssql_bind($proc, '@dni', $varDni, SQLVARCHAR , false, false, 8); 
      mssql_bind($proc, '@nombre', $varNombre, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@apellido', $varApellido, SQLVARCHAR , false, false, 100);      
     	mssql_bind($proc, '@correo', $varCorreo, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@celular', $intCelular, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@estado', $varEstado, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@usuario', $varDni , SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@clave', $varClave, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@avatar', $varAvatar, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@idTipoPersona', $IdTipoPersona, SQLVARCHAR , false, false, 10); 
			
			//echo("sdd");
			mssql_bind($proc, '@ApeMat', $ApeMat, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@ApePat', $ApePat, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@Estamento', $Estamento, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@FechaInicioContrato', $FechaInicioContrato, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@FechaFinContrato', $FechaFinContrato, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@Dependencia', $Dependencia, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@UnidadOrganica', $UnidadOrganica, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@Cargo', $Cargo, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@DependenciaCargo', $DependenciaCargo, SQLVARCHAR , false, false, 100); 
     					
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
	

	public function fncBusinessModificarMasivo($DtPersona) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
			$IdPersona					= $DtPersona->getIdPersona();
    	//$varDni 					  = $DtPersona->getVarDni();
    	$varNombre 					= $DtPersona->getVarNombre();
    	$varApellido 				= $DtPersona->getVarApellido();
    	$varCorreo 					= $DtPersona->getVarCorreo();
    	$intCelular 				= $DtPersona->getIntCelular();
    	$varEstado 					= $DtPersona->getVarEstado();
    	$varUsuario 				= $DtPersona->getVarUsuario();
    	$varClave 					= $DtPersona->getVarClave();
    	$varAvatar 					= $DtPersona->getVarAvatar();
			$IdTipoPersona 			= $DtPersona->getIdTipoPersona();
			
			$ApeMat               = $DtPersona->  getApeMat();
			$ApePat            		= $DtPersona->	getApePat();
			$Estamento            = $DtPersona->  getEstamento();
			$FechaInicioContrato  = $DtPersona->  getFechaFinContrato();
			$FechaFinContrato     = $DtPersona->  getFechaInicioContrato();
			$Dependencia          = $DtPersona->  getDependencia();
			$UnidadOrganica       = $DtPersona->  getUnidadOrganica();
			$Cargo                = $DtPersona->  getCargo();
			$DependenciaCargo     = $DtPersona->  getDependenciaCargo();

			
    	// $varEmail 							= $DtEgresado->getVarEmail();
    	// $datIngresoUniversidad 	= $DtEgresado->getDatIngresoUniversidad();
    	// $datEgresoUniversidad 	= $DtEgresado->getDatEgresoUniversidad();
    	// $IdGradoAcademico 			= $DtEgresado->getIdGradoAcademico();
    	// $datGradoAcademico 			= $DtEgresado->getDatGradoAcademico();
    	// $IdTituloAcademico 			= $DtEgresado->getIdTituloAcademico();
    	// $datTitulacion 					= $DtEgresado->getDatTitulacion();
    	// $varDireccionIP 				= fncObtenerIpAdress();

			$sql = "usp_Eve_U_ActualizarPersonaMasivo";
		
				// echo $sql.' '.$IdPersona.', '.$varNombre.', '.$varApellido.', '.$varCorreo.', '.$intCelular.', '.$varEstado.', '.$varUsuario.', '.$varClave.', '.$varAvatar.', '.$IdTipoPersona.', '.$ApeMat.', '.$ApePat.', '.$Estamento.', '.$FechaInicioContrato.', '.$FechaFinContrato.', '.$Dependencia.', '.$UnidadOrganica.', '.$Cargo.' ,'.$DependenciaCargo;
			//	echo("<br>");
			$proc = mssql_init($sql, $connectionstatus);
			// $proc = mssql_init($sql, $connectionstatus);
			mssql_bind($proc, '@IdPersona', trim($IdPersona), SQLINT4 , false, false, 10);
      //mssql_bind($proc, '@dni', $varDni, SQLVARCHAR , false, false, 8); 
      mssql_bind($proc, '@nombre', $varNombre, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@apellido', $varApellido, SQLVARCHAR , false, false, 100);      
     	mssql_bind($proc, '@correo', $varCorreo, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@celular', $intCelular, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@estado', $varEstado, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@usuario', $varDni , SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@clave', $varClave, SQLVARCHAR , false, false, 100); 
      mssql_bind($proc, '@avatar', $varAvatar, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@idTipoPersona', $IdTipoPersona, SQLVARCHAR , false, false, 10); 			
			mssql_bind($proc, '@ApeMat', $ApeMat, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@ApePat', $ApePat, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@Estamento', $Estamento, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@FechaInicioContrato', $FechaInicioContrato, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@FechaFinContrato', $FechaFinContrato, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@Dependencia', $Dependencia, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@UnidadOrganica', $UnidadOrganica, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@Cargo', $Cargo, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@DependenciaCargo', $DependenciaCargo, SQLVARCHAR , false, false, 100);
			 // var_dump($proc);
			 //echo mssql_get_last_message();
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