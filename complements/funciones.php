<?php  

		function GetMAC(){
				ob_start();
				system('getmac');
				$Content = ob_get_contents();
				ob_clean();
				return substr($Content, strpos($Content,'\\')-20, 17);
		}



		function fncObtenerMac()
		{ 
			ob_start();
			system('getmac');
			$Content = ob_get_contents();
			ob_clean();
			return substr($Content, strpos($Content,'\\')-20, 17);
   		}
		

	
	function fncValidarTiempoSesion($stiempo)
	{
		$tiempo = 12000;
		if ( ($stiempo + $tiempo) > time() ){
			$ntiempo = time();
		}else{
			$ntiempo=0;
		}
		return $ntiempo;
	}

	function fncVerificarSesionUsuario($sex="")
	{
		session_save_path('E:/php/upt');
		session_name($sex);
	}

	function sqlsrv_getdata($result) 
	{
    $type = '2';
    $data = array();
    $i = 0;
    switch ($type) {
      case '1':
        while ($row = @mssql_fetch_array($result, MSSQL_BOTH)) {
            $data[$i] = $row;
            $i++;
        }
      break;
      case '2':
        while ($row = @mssql_fetch_array($result, MSSQL_ASSOC)) {
            $data[$i] = $row;
            $i++;
        }
      break;
      case '3':
        while ($row = @mssql_fetch_array($result, MSSQL_NUM)) {
            $data[$i] = $row;
            $i++;
        }
      break;
    }
    //error_log('retornando'.sizeof($data));
    return $data;
	}

	function fncFormatearFecha($fechaAnterior, $tipo = 'date')
	{
		if($fechaAnterior !== ""){ 
			switch ($tipo) {
				case 'date':
					$nuevaFecha = date('d-m-Y', strtotime($fechaAnterior));
					break;
				case 'datetime':
					$nuevaFecha = date('d-m-Y H:i:s', strtotime($fechaAnterior));
					break;
			}
		}
		return $nuevaFecha;
	}

		function utf8_converter2($array){
			array_walk_recursive($array, function(&$item, $key){
			if(!mb_detect_encoding($item, 'utf-8', true)){
			$item = utf8_encode($item);
			}
			});

			return $array;
		}

	function fncCodificarTexto($texto)
	{
	    // $textoCodificado = utf8_decode($texto);
		$textoCodificado = $texto;

	    if (ereg("&",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("&","&amp;",$textoCodificado); 
	    }
	    if (ereg("¿",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("¿","&iquest;",$textoCodificado); 
	    }
	    if (ereg("'",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("'","&prime;",$textoCodificado); 
	    }
	    if (ereg("á",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("á","&aacute;",$textoCodificado); 
	    }
	    if (ereg("é",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("é","&eacute;",$textoCodificado); 
	    }
	    if (ereg("í",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("í","&iacute;",$textoCodificado); 
	    }
	    if (ereg("ó",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("ó","&oacute;",$textoCodificado); 
	    }
	    if (ereg("ú",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("ú","&uacute;",$textoCodificado); 
	    }
	    if (ereg("Á",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("Á","&Aacute;",$textoCodificado); 
	    }
	    if (ereg("É",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("É","&Eacute;",$textoCodificado); 
	    }
	    if (ereg("Í",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("Í","&Iacute;",$textoCodificado); 
	    }
	    if (ereg("Ó",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("Ó","&Oacute;",$textoCodificado); 
	    }
	    if (ereg("Ú",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("Ú","&Uacute;",$textoCodificado); 
	    }
	    if (ereg("ñ",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("ñ","&ntilde;",$textoCodificado); 
	    }
	    if (ereg("Ñ",$textoCodificado))
	    { 
	    	$textoCodificado = str_replace("Ñ","&Ntilde;",$textoCodificado); 
	    }

	    return $textoCodificado;
	}

	function fncObtenerIpAdress()
	{
	 
	   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
	   {
	      $client_ip = 
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ? 
	            $_SERVER['REMOTE_ADDR'] 
	            : 
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
	               $_ENV['REMOTE_ADDR'] 
	               : 
	               "unknown" );
	 
	      // los proxys van añadiendo al final de esta cabecera
	      // las direcciones ip que van "ocultando". Para localizar la ip real
	      // del usuario se comienza a mirar por el principio hasta encontrar 
	      // una dirección ip que no sea del rango privado. En caso de no 
	      // encontrarse ninguna se toma como valor el REMOTE_ADDR
	 
	      $entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);
	 
	      reset($entries);
	      while (list(, $entry) = each($entries)) 
	      {
	         $entry = trim($entry);
	         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
	         {
	            // http://www.faqs.org/rfcs/rfc1918.html
	            $private_ip = array(
	                  '/^0\./', 
	                  '/^127\.0\.0\.1/', 
	                  '/^192\.168\..*/', 
	                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', 
	                  '/^10\..*/');
	 
	            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
	 
	            if ($client_ip != $found_ip)
	            {
	               $client_ip = $found_ip;
	               break;
	            }
	         }
	      }
	   }
	   else
	   {
	      $client_ip = 
	         ( !empty($_SERVER['REMOTE_ADDR']) ) ? 
	            $_SERVER['REMOTE_ADDR'] 
	            : 
	            ( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
	               $_ENV['REMOTE_ADDR'] 
	               : 
	               "unknown" );
	   }
	 
	   return $client_ip;
	 
	}

	function fnc_ImprimirMensajeSession()
	{
		@session_start();
		// session_save_path('E:/php/upt');
		// session_name($sex);

		if( (isset($_SESSION['mensaje']["ses_MensajeEstado"]) and $_SESSION['mensaje']["ses_MensajeEstado"] == 1) || (isset($_SESSION['mensaje']["ses_MensajeTipo"]) and $_SESSION['mensaje']["ses_MensajeTipo"] !== "") ){

			$tipo_mensaje 	= "";
			$texto_mensaje 	= "";
			switch (strtolower($_SESSION['mensaje']["ses_MensajeTipo"])) {
				case 'correcto':
					$tipo_mensaje 	= "success";
					$texto_mensaje 	= "Correcto";
					break;
				case 'error':
					$tipo_mensaje 	= "danger";
					$texto_mensaje 	= "Error";
					break;
			}

			if( $_SESSION['mensaje']["ses_MensajeTipo"] == "incorrecto" ){ 
		     echo '<div class="alert alert-danger">
						<strong>!</strong> '.$_SESSION['mensaje']["ses_MensajeDescripcion"].'
						</div>
				 ';
				// echo '<script language="javascript">';
				// echo 'alert(" !'.$_SESSION['mensaje']["ses_MensajeDescripcion"].'.")';
				// echo '</script>';
			}
			else{
				echo '<div class="alert alert-success">
				<strong>!</strong> '.$_SESSION['mensaje']["ses_MensajeDescripcion"].'
				</div>
		 ';


			
			}
	  }
	  
	  $_SESSION['mensaje']["ses_MensajeEstado"] = 0;
		$_SESSION['mensaje']["ses_MensajeTipo"] = "";
		
		
	}


	function fnc_HallarNavegador($u_agent) 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    //First get the platform?
    if(preg_match('/linux/i', $u_agent)) {
        $platform = 'Linux';
    }
    elseif(preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'Mac';
    }
	elseif(preg_match('/Windows NT 10.0/i', $u_agent)) {
        $platform = 'Windows 10';
    }
    elseif(preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'Windows';
    }
	
	//should I add support for 128 bit?? :D
    if(preg_match('/WOW64/i', $u_agent)) {
        $bit = '64';
    }
    else {
        $bit = '32';
    }
        
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    }
	elseif(preg_match('/Edge/i',$u_agent)) 
    { 
        $bname = 'Microsoft Edge'; 
        $ub = "Edge"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    }
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern,
		'bit'    => $bit
    );
} 
function fnc_ObtenerNavegador(){

	$ua=fnc_HallarNavegador();
$yourbrowser= $ua['name'] . " " . $ua['version'] . "->" .$ua['platform'] . " (" .$ua['bit']. " )" ;
return($yourbrowser);
}

?>