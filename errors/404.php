<?php  
  // if( !isset($_GET["sesion"]) or $_GET["sesion"] == "" ){ 
  //   header('Location: http://net.upt.edu.pe'); 
  // }else{
  //   $sex = $_GET['sesion'];
  //   $url_parametros['sesion'] = $sex;
  //   header('Location: modules/index.php?' . http_build_query($url_parametros)); 
  // }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>404 | Universidad Privada de Tacna</title>
  <!-- Favicon-->
  <link rel="icon" href="../favicon.jpg" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Bootstrap Core Css -->
  <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="four-zero-four">
    <div class="four-zero-four-container">
        <div class="error-code">404</div>
        <div class="error-message">Esta p&aacute;gina no existe</div>
        <div class="button-place">
            <a href="../index.php?<?php echo http_build_query($url_parametros); ?>" class="btn btn-default btn-lg waves-effect">IR AL PRINCIPAL</a>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../assets/plugins/node-waves/waves.js"></script>
</body>

</html>