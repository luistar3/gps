<?php  
   @session_start();

  // include_once('../complements/funciones.php');

  if( isset($_SESSION['Actualizacion']) and $_SESSION['Actualizacion']== 1 ){
   
      $usuario = $_GET['dni'];
  }
  else{


					//$url_parametros["dni"] =$_POST["usuario"];
          header('Location: ../website/login.php');
          exit();

  }

  $parametro_login = "JhccuOuolR";

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

<body class="signup-page" onkeydown="return (event.keyCode != 116)" >
  <div class="signup-box">
    <div class="logo">
      <a href="javascript:void(0);">Admin <b>UE</b></a>
      <small>UPT Eventos</small>
    </div>
    <div class="card">
      <div class="body">
      	<?php //fnc_ImprimirMensajeSession(); ?>
        <form id="sign_up" method="POST" action="../../modules/Usuario.php?p=<?php echo $parametro_login; ?>">
          <div class="msg"><span class="label label-primary">Necesita Hacer un Cambio de Contraseña</span></div>
           <input type="hidden" class="form-control" name="usuariox" maxlength="15" value="<?php echo($usuario); ?>" placeholder="Usuario" style="text-transform: lowercase;" >
          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">person</i>
            </span>
            <div class="form-line">
              <input type="text" class="form-control" name="usuario" maxlength="15" value="<?php echo($usuario); ?>" placeholder="Usuario" style="text-transform: lowercase;" required autofocus readonly>
              
            </div>
          </div>
          <!-- <div class="input-group" >
            <span class="input-group-addon">
              <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
              <input type="password" class="form-control" name="contrasenaAnterior" minlength="3" placeholder="Contraseña Anterior" required>
            </div>
            
          </div> -->
            <div class="input-group">
              <span class="input-group-addon">
                <i class="material-icons">lock</i>
              </span>
              <div class="form-line">
                <input type="password" class="form-control" name="contrasenaAnterior" minlength="5" placeholder="Contraseña Anterior" required>
              </div>
            
            </div>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="material-icons">vpn_key</i>
              </span>
              <div class="form-line">
                <input type="password" class="form-control" name="contrasenaNueva" minlength="5" placeholder="Contraseña Nueva" required>
              </div>
                          
            </div>
             <div class="input-group">
              <span class="input-group-addon">
                <i class="material-icons">vpn_key</i>
              </span>
              <div class="form-line">
                <input type="password" class="form-control" name="repitaContrasenaNueva" minlength="5" placeholder="Repita Contraseña" required>
              </div>
                          
            </div>

          <div class="recaptcha-wrap center">                   
           
            <div  class="g-recaptcha" data-sitekey="6Lc7dJ8UAAAAAIRf7VlfcIDyM8f4N3kKUj_5BEjb"></div>
          
          </div>
     
          <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">REGISTRAR CAMBIO</button>

        </form>
      </div>
     
    </div>
            <div class="msg">
                <img src="../../images/reload.svg" alt="Image" style="height: 50px">
                <div id="contenedor">
            </div>

<script language="javascript"> 
 var segundos = 300; //Segundos de la cuenta atrás 
    function tiempo(){  
  var t = setTimeout("tiempo()",1000);  
  document.getElementById('contenedor').innerHTML = 'Será redireccionado en '+segundos--+" segundos.";  
  if (segundos==0){
        window.location.href='login.php';  //Págiana a la que redireccionará a X segundos
  
   clearTimeout(t);  
  }  
 }  
 tiempo()


 
    </script> 

    <script type = "text/javascript">
    window.onload = function () {
        document.onkeydown = function (e) {
            return (e.which || e.keyCode) != 116;
        };
    }
</script>

<script type="text/javascript">
    $(function () {
        $(document).keydown(function (e) {
            return (e.which || e.keyCode) != 116;
        });
    });
</script>
    
</div>

<?php
session_unset($_SESSION['Actualizacion']);
?>

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