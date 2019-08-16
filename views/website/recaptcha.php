<?php

$response_recaptcha = $_POST["g-recaptcha-response"];
$secret = '6Lc7dJ8UAAAAAAPxht9eLdpUbQS__lEy6LA5jnY0';
if (isset($response_recaptcha) && $response_recaptcha) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $validation_server = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response_recaptcha&remoteip=$ip");
    $data = json_decode($validation_server, TRUE);
    
    $permiso = array();
    foreach ($data as $key => $value) {
        array_push($permiso,$value);
    }

    if ($permiso[0]==1) {
        

        if (isset($_POST["contrasena"]) && (isset($_POST["rcontrasena"])) && (isset($_POST["nombre"])) && (isset($_POST["apellido"])) && (isset($_POST["documento"])) && (isset($_POST["mail"])) && (isset($_POST["telefono"])) ) {
            if ($_POST["contrasena"]==($_POST["rcontrasena"])) {
                echo("existo");
    ?>
               <script>
                var contrasena      = "<?php echo($_POST["contrasena"])?>";
                var nombre          = "<?php echo($_POST["nombre"])?>";
                var apellido        = "<?php echo($_POST["apellido"])?>";
                var documento       = "<?php echo($_POST["documento"])?>";
                var email            = "<?php echo($_POST["mail"])?>";
                var telefono        = "<?php echo($_POST["telefono"])?>";

   

            realizaProceso(contrasena,nombre,apellido,documento,email,telefono);
            function realizaProceso(contrasena,nombre,apellido,documento,email,telefono){
                      var parametros = {
                            "contrasena"  :contrasena,
                            "nombre"      :nombre,
                            "apellido"    :apellido,
                            "documento"   :documento,
                            "mail"        :email,
                            "telefono"    :telefono
                                     };
                    $.ajax({
                            data:  parametros,
                            url:   '../../modules/Usuario.php?p=D5cdBfAkBQ',
                            type:  'post',
                            beforeSend: function () {
                                    $("#resultado").html("Procesando, espere por favor...");
                            },
                            success:  function (response) {
                                    alert(response);
                            }
                    });
            }

           
               </script>     
    <?php

            }
            else{
                $url_parametros['c'] = 'La ontraseña no es igual';
                $url_parametros['rc'] = 'La ontraseña no es igual';
            header('Location: registrar.php?' . http_build_query($url_parametros)); 
            }
        }
    }
    else{

        $url_parametros['v'] = 'Verifique el reCAPTCHA';
        header('Location: resgistrar.php?' . http_build_query($url_parametros)); 
    }
}
else{
    $url_parametros['v'] = 'Verifique el reCAPTCHA';
        header('Location: registrar.php?' . http_build_query($url_parametros)); 

    if (isset($_POST["contrasena"]) && isset($_POST["rcontrasena"]) ) {
        if ($_POST["contrasena"]==($_POST["rcontrasena"])) {
            echo("existo");
        }
        else{
            $url_parametros['c'] = 'la clave no es igual';
            $url_parametros['rc'] = 'la clave no es igual';
        header('Location: registrar.php?' . http_build_query($url_parametros)); 
        }
    }
}
?>