<?php 

include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/connection.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_Registro.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/data/data_Persona.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/funciones.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/gps/complements/navegador.php');

class business_Registro
{

    public function fncBusinessListarRegistros(){

	//	@session_start();
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_S_ListarRegistros";
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
	 public function fncBussinesEliminarRegistro($IdEvento,$IdPersona,$estado,$eliminado ){

	//	@session_start();
		$connection = new connection();
		$connectionstatus = $connection -> openConnection();
		if ($connectionstatus) 
		{
			$sql = "usp_Eve_U_EliminaRegistro";
      		//$USRId = $_SESSION['usuario']["ses_USRId"] ;
			// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
			$proc = mssql_init($sql, $connectionstatus); 
            // mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);
			// mssql_bind($proc, '@IdPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);

             mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR, false, false, 10); 
             mssql_bind($proc, '@IdPersona', $IdPersona, SQLVARCHAR, false, false, 10); 
             mssql_bind($proc, '@Estado', $estado, SQLVARCHAR, false, false, 10); 
             mssql_bind($proc, '@Eliminado', $eliminado, SQLINT4, false, false, 10); 
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
	public function fncBusinessCambiarEstadoInscricpcion($IdPersona,$IdEvento,$estado){

		//	@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
				$sql = "usp_Eve_U_ActualizarEstadoInscripcion";
						//$USRId = $_SESSION['usuario']["ses_USRId"] ;
				// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
				$proc = mssql_init($sql, $connectionstatus); 
							// mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);
				// mssql_bind($proc, '@IdPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);
	
							 mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR, false, false, 10); 
							 mssql_bind($proc, '@IdPersona', $IdPersona, SQLVARCHAR, false, false, 10); 
							 mssql_bind($proc, '@Estado', $estado, SQLVARCHAR, false, false, 10); 
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
	public function fncBusinessListarRegistrosdeInscripcion($IdEvento){

		//	@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
				$sql = "usp_Eve_S_ListarRegistrosDeEventos";
						//$USRId = $_SESSION['usuario']["ses_USRId"] ;
				// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
				$proc = mssql_init($sql, $connectionstatus); 
							// mssql_bind($proc, '@USRId', $USRId, SQLINT4, false, false, 10);
				// mssql_bind($proc, '@IdPtaDependenciaFijo', $idPtaDependenciaFijo, SQLINT4, false, false, 10);
	
							 mssql_bind($proc, '@IdPersona', $IdEvento, SQLVARCHAR, false, false, 10); 
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
	public function fncBusinessListarEventoParaRegistro(){

			@session_start();
			$connection = new connection();
			$connectionstatus = $connection -> openConnection();
			if ($connectionstatus) 
			{
				$sql = "usp_Eve_S_ListarEventosParaRegistro";
				
				if ($_SESSION['usuario']["ses_Titulo"]=='Administrador') {

			

					$proc = mssql_init($sql, $connectionstatus); 
					$idPermiso = $_SESSION['usuario']["ses_Permiso"];
				mssql_bind($proc, '@USRId', $idPermiso, SQLVARCHAR, false, false, 30);
				}
				else {

					$proc = mssql_init($sql, $connectionstatus); 
							$idPermiso = $_SESSION['usuario']["ses_Permiso"];
				mssql_bind($proc, '@USRId', $idPermiso, SQLVARCHAR, false, false, 30);
				}
	
	
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
		public function fncBusinessListarPersonasPorEvento($IdEvento){

			//	@session_start();
				$connection = new connection();
				$connectionstatus = $connection -> openConnection();
				if ($connectionstatus) 
				{
					$sql = "usp_Eve_S_ListarPersonasPorEvento";
						//$USRId = $_SESSION['usuario']["ses_USRId"] ;
					// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
					$proc = mssql_init($sql, $connectionstatus); 
					 mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR, false, false, 10);
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
		public function fncBusinessConsultarPersonaPorDni($dtPersona){

			//	@session_start();
				$connection = new connection();
				$connectionstatus = $connection -> openConnection();
				if ($connectionstatus) 
				{
					$sql = "usp_Eve_S_BuscarPersonaPorDni";

					$dni = $dtPersona -> getVarDni();
					//echo ($dni);
					  //$USRId = $_SESSION['usuario']["ses_USRId"] ;
					// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
					$proc = mssql_init($sql, $connectionstatus); 
					mssql_bind($proc, '@dni', $dni, SQLVARCHAR, false, false, 10);
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
			public function fncBusinessConsultarPersonaRegistrada($dtRegistro){

				//	@session_start();
					$connection = new connection();
					$connectionstatus = $connection -> openConnection();
					if ($connectionstatus) 
					{
						$sql = "usp_Eve_S_BuscarIncripcion";
	
						$getIdEvento  = $dtRegistro -> getIdEvento();
						$setIdPersona = $dtRegistro -> getIdPersona();
						//echo ($dni);
						  //$USRId = $_SESSION['usuario']["ses_USRId"] ;
						// echo "usp_Sed_S_Egresado_Consultar ".$USRId.', '.$idPtaDependenciaFijo.', '.$NombreApellido.', '.$varDni.', '.$intEdad.', '.$IdGradoAcademico.', '.$IdSectorAcademico;
						$proc = mssql_init($sql, $connectionstatus); 
						mssql_bind($proc, '@IdEvento', $getIdEvento, SQLVARCHAR, false, false, 10);
						mssql_bind($proc, '@IdPersona', $setIdPersona, SQLVARCHAR, false, false, 10);
			
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

	public function fncBusinessAgregar($DtRegistro) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
    	$IdEvento 								= $DtRegistro->getIdEvento();
    	$IdPersona 								= $DtRegistro->getIdPersona();
			$Estado 									= $DtRegistro->getVarEstado();
			$Estamento 								= $DtRegistro-> getVarDependencia();//es estamento
			$varDireccionIP						= $DtRegistro-> getVarDireccionIP();
			$varDireccionMac					= $DtRegistro-> getVarDireccionMAC();
			$varNaveadorWeb						= $DtRegistro-> getVarNavegadorWeb();
			$IntUsuarioCreador				= $DtRegistro-> getVarUsuarioCreador();


		

      $sql = "usp_Eve_I_AgregarRegistro";
 			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
      $proc = mssql_init($sql, $connectionstatus);
      mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR , false, false, 10); 
      mssql_bind($proc, '@IdPersona', $IdPersona, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@Estado', $Estado, SQLVARCHAR , false, false, 10); 
			mssql_bind($proc, '@Modalidad', $Estamento, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@VarDireccionIp', $varDireccionIP, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@VarDireccionMac', $varDireccionMac, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@VarNavegadorWeb', $varNaveadorWeb, SQLVARCHAR , false, false, 100); 
			mssql_bind($proc, '@UsuarioCreador', $IntUsuarioCreador, SQLINT4 , false, false, 100); 
     		
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

  public function fncBusinessEliminarPersonaEvento($IdEvento, $IdPersona) 
	{ 
  	$connection = new connection();
    $connectionstatus = $connection -> openConnection();
    if ($connectionstatus) 
    {
			$IdEvento									= $IdEvento;
    	$IdPersona 								= $IdPersona;

      $sql = "usp_Eve_U_EliminarPersonaEvento";
			 $proc = mssql_init($sql, $connectionstatus);
			 mssql_bind($proc, '@IdEvento', $IdEvento, SQLVARCHAR , false, false, 10);
			 mssql_bind($proc, '@IdPersona', $IdPersona, SQLVARCHAR , false, false, 10); 
			 
			 
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
      return false;
    }
  }

//   public function fncBusinessModificar($DtEgresado) 
// 	{ 
//   	$connection = new connection();
//     $connectionstatus = $connection -> openConnection();
//     if ($connectionstatus) 
//     {
//     	$IdEgresado 						= $DtEgresado->getIdEgresado();
//     	$bitDestacado 					= $DtEgresado->getBitDestacado();
//     	$datNacimiento 					= $DtEgresado->getDatNacimiento();
//     	$varDNI 								= $DtEgresado->getVarDNI();
//     	$varDomicilioReal 			= $DtEgresado->getVarDomicilioReal();
//     	$varDomicilioProcesal 	= $DtEgresado->getVarDomicilioProcesal();
//     	$intEdad 								= $DtEgresado->getIntEdad();
//     	$varTelefonoCelular 		= $DtEgresado->getVarTelefonoCelular();
//     	$varTelefonoFijo 				= $DtEgresado->getVarTelefonoFijo();
//     	$varEmail 							= $DtEgresado->getVarEmail();
//     	$datIngresoUniversidad 	= $DtEgresado->getDatIngresoUniversidad();
//     	$datEgresoUniversidad 	= $DtEgresado->getDatEgresoUniversidad();
//     	$IdGradoAcademico 			= $DtEgresado->getIdGradoAcademico();
//     	$datGradoAcademico 			= $DtEgresado->getDatGradoAcademico();
//     	$IdTituloAcademico 			= $DtEgresado->getIdTituloAcademico();
//     	$datTitulacion 					= $DtEgresado->getDatTitulacion();
//     	$varDireccionIP 				= fncObtenerIpAdress();

//       $sql = "usp_Sed_U_Egresado";
//  			// echo $sql.' '.$CodUniv.', '.$ItemEst.', '.$IdSem.', '.$DatNacimiento.', '.$varDNI.', '.$varDomicilioReal.', '.$varDomicilioProcesal.', '.$intEdad.', '.$varTelefonoCelular.', '.$varTelefonoFijo.', '.$varEmail.', '.$datIngresoUniversidad.', '.$datEgresoUniversidad.', '.$IdGradoAcademico.', '.$datGradoAcademico.', '.$IdTituloAcademico.', '.$datTitulacion.', '.$varDireccionIP;
//       $proc = mssql_init($sql, $connectionstatus);
//       mssql_bind($proc, '@IdEgresado', $IdEgresado, SQLINT4 , false, false, 10); 
     
//      	mssql_bind($proc, '@bitDestacado', $bitDestacado, SQLINT4 , false, false, 10); 
//       mssql_bind($proc, '@datNacimiento', $DatNacimiento, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@varDNI', $varDNI, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@varDomicilioReal', $varDomicilioReal, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@varDomicilioProcesal', $varDomicilioProcesal, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@intEdad', $intEdad, SQLINT4 , false, false, 10); 
//       mssql_bind($proc, '@varTelefonoCelular', $varTelefonoCelular, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@varTelefonoFijo', $varTelefonoFijo, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@varEmail', $varEmail, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@datIngresoUniversidad', $datIngresoUniversidad, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@datEgresoUniversidad', $datEgresoUniversidad, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@IdGradoAcademico', $IdGradoAcademico, SQLINT4 , false, false, 10); 
//       mssql_bind($proc, '@datGradoAcademico', $datGradoAcademico, SQLVARCHAR , false, false, 10); 
//       mssql_bind($proc, '@IdTituloAcademico', $IdTituloAcademico, SQLINT4 , false, false, 10); 
//       mssql_bind($proc, '@datTitulacion', $datTitulacion, SQLVARCHAR , false, false, 10); 	
//       mssql_bind($proc, '@varDireccionIP', $varDireccionIP, SQLVARCHAR , false, false, 10); 					
//       $result = mssql_execute($proc);

//       if ($result) {
//         $connection -> closeConnection($connectionstatus);
//         unset($connectionstatus);
//         unset($connection);
//         return true;
//       }else{
//         $connection -> closeConnection($connectionstatus);
//         unset($connectionstatus);
//         unset($connection);
//         return false;
//       }
//     } 
//     else 
//     {
//       unset($connectionstatus);
//       unset($connection);
//       echo 'Tenemos un problema: ' . mssql_get_last_message();
//     }
//   }

}

?>