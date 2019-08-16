<?php  
   @session_start();

  // include_once('../complements/funciones.php');

  if( isset($_SESSION['usuario']["ses_UsuarioLogeado"]) and $_SESSION['usuario']["ses_UsuarioLogeado"] == true ){
    //header('Location: ../../modules');

    echo($_SESSION['usuario']["ses_UsuarioLogeado"]);
  }

  //$parametro_login = "6x8RlHMFSK";

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Universidad Privada de Tacna - Registro de Egresados Destacados</title>
  <!-- Favicon-->
  <link rel="icon" href="../favicon.jpg" type="image/x-icon">

  <!-- Google Fonts --> <!-- URGENTE CAMBIAR A LOCAL -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <div class="card lg">
      <div class="body">
      <?php  $parametro_login="D5cdBfAkBQ"; ?>
        <form id="sign_up" method="POST" action="../../modules/Usuario.php?p=<?php echo $parametro_login; ?>">
          <div class="msg">Autenticación de Usuario</div>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">person</i>
            </span>
            <div class="form-line">
              <input type="text" class="form-control" name="nombre" maxlength="100" placeholder="Nombre" style="text-transform: uppercase;" required autofocus>
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
            <i class="material-icons">person_outline</i>
            </span>
            <div class="form-line">
              <input type="text" class="form-control" name="apellidoPaterno" maxlength="100" placeholder="Apellido Paterno" style="text-transform: uppercase;" required autofocus>
            </div>
            <div class="form-line">
              <input type="text" class="form-control" name="apellidoMaterno" maxlength="100" placeholder="Apellido Materno" style="text-transform: uppercase;" required autofocus>
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
            <i class="material-icons">chrome_reader_mode</i>
            </span>
            <div class="form-line">
              <input type="text" class="form-control" name="documento" maxlength="15" placeholder="documento de indentidad" style="text-transform: uppercase;" required autofocus>
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
            <i class="material-icons">email</i>
            </span>
            <div class="form-line">
              <input type="email" class="form-control" name="mail" maxlength="100" placeholder="MAIL"  required autofocus>
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
            <i class="material-icons">contact_phone</i>
            </span>
            <div class="form-line">
              <input type="number" class="form-control" name="telefono" maxlength="15" placeholder="telefono"  required >
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">lock</i>
            </span>
            <div class="form-line">
              <input type="password" class="form-control" name="contrasena" minlength="3" placeholder="Contraseña" required>
            </div>
            <span style="color:#ff0000">
            <?php
            if (isset($_GET["c"])) {
              echo($_GET["c"]);
            }
            ?>
          </div>
          <div class="input-group">
            <span class="input-group-addon">
            <i class="material-icons">lock_outline</i>
            </span>
            <div class="form-line">
              <input type="password" class="form-control" name="rcontrasena" minlength="3" placeholder="Repita Contraseña" required>
            </div>
            <?php
            if (isset($_GET["rc"])) {
              echo($_GET["rc"]);
            }
            ?>
          </div>
          <div class="g-recaptcha" data-sitekey="6Lc7dJ8UAAAAAIRf7VlfcIDyM8f4N3kKUj_5BEjb"></div>
<span style="color:#ff0000">
<?php
if (isset($_GET["v"])) {
  echo($_GET["v"]);
}
?>
</span>
          <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">REGISTRAR</button>

        </form>
      </div>
     
    </div>
    
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