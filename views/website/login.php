<?php  
   @session_start();

  // include_once('../complements/funciones.php');

  //if( isset($_SESSION['usuario']["ses_UsuarioLogeado"]) and $_SESSION['usuario']["ses_UsuarioLogeado"] == true ){
    //header('Location: ../../modules');

    //echo($_SESSION['usuario']["ses_UsuarioLogeado"]);
  //}

  $parametro_login = "6x8RlHMFSK";

  // if (isset($_SESSION['mensaje'])) {
     # code...
    // echo("<script> alert(".$_SESSION['mensaje'].");</script>");
   //}
    $mensaje = '';
   if (isset($_SESSION['mensaje'])) {
     $mensaje=$_SESSION['mensaje']["ses_MensajeDescripcion"];
    
   }
    @session_unset($_SESSION['mensaje']);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Universidad Privada de Tacna - Sistema de Eventos Web</title>
  <!-- Favicon-->
  <link rel="icon" href="../favicon.jpg" type="image/x-icon">
<!--  reCpatcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <!-- Google Fonts --> <!-- URGENTE CAMBIAR A LOCAL -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Bootstrap Core Css -->
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
  <div class="signup-box">
    <div class="logo">
      <a href="javascript:void(0);">Admin <b>UE</b></a>
      <small>UPT Eventos</small>
    </div>
    <div class="card">
      <div class="body">
      	<?php //fnc_ImprimirMensajeSession(); ?>
        <form id="sign_up" method="POST" action="../../modules/Usuario.php?p=<?php echo $parametro_login; ?>">
          <div class="msg">Autenticación de Usuario</div>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">person</i>
            </span>
            <div class="form-line">
              <!-- <input type="text" class="form-control" name="usuario" maxlength="15" placeholder=" Usuario"  style="text-transform: lowercase;" required autofocus> -->
               <input type="text" class="form-control" name="usuario" maxlength="15" placeholder=" Usuario"   required autofocus>
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
              <input type="password" class="form-control" name="contrasena" minlength="3" placeholder=" Contraseña" required>
            </div>
            
          </div>

          <div class="recaptcha-wrap center">                   
           
            <div  class="g-recaptcha" data-sitekey="6Lc7dJ8UAAAAAIRf7VlfcIDyM8f4N3kKUj_5BEjb"></div>
          
          </div>
     
          <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">INGRESAR</button>

        </form>
         <div class="msg"><span class="label label-danger"><?php echo($mensaje);?></span></div>
        
      </div>
     
    </div>
    <div class="msg"><a href="registrar.php" >Registrarse</a></div>
  </div>

  <!-- Jquery Core Js -->
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core Js -->
  <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>

  <!-- Waves Effect Plugin Js -->
  <script src="../../assets/plugins/node-waves/waves.js"></script>

  <!-- Validation Plugin Js -->
  <script src="../../assets/plugins/jquery-validation/jquery.validate.js"></script>

  <!-- Custom Js -->
  <script src="../../assets/js/admin.js"></script>
  <script src="../../assets/js/pages/examples/sign-in.js"></script>
  
</body>

</html>

<?php
  //if (isset($_SESSION['mensaje'])) {
    # code...
   // session_unset($_SESSION['mensaje']);
 // }

?>