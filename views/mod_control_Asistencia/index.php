<body>

<div class="main" style="padding-top: 50px; background: #141438;">

    <!-- Sign up form -->
    <!-- <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section> -->

    <?php 
    $id             = $dtConsultarEvento[0]["IdEvento"];
    $Nombre         = $dtConsultarEvento[0]["Nombre"];
    $Descripcion    = $dtConsultarEvento[0]["Descripcion"];
    $NombreTipo     = $dtConsultarEvento[0]["NombreTipo"];
    $InicioFecha    = $dtConsultarEvento[0]["InicioFecha"];
    $FinFecha       = $dtConsultarEvento[0]["FinFecha"];

    $id = base64_encode($id);
    ?>
    <script type = "text/javascript">
    var id = "<?php echo($id);?>";
    var InicioFecha = "<?php echo($InicioFecha);?>";
    var FinFecha = "<?php echo($FinFecha);?>";
    </script>

    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container ">
            <div class="signin-content" style="padding-top: 40px; padding-bottom: 20px;">
                <div class="signin-image container" style="height: 457px; padding-top: 15px; border: 1px solid #e2e1e1">
                    <!-- <figure><img src="../assets/control/images/signin-image.jpg" alt="sing up image"></figure> -->
                    <!-- <a href="#" class="signup-image-link">Create an account</a> -->
                    <div class="embed-responsive-item well">
                    <video id="preview"class="embed-responsive embed-responsive-16by9"></video>
                    </div>
                    
                  
                    <script>
                        let scanner = new Instascan.Scanner(
                            {
                                video: document.getElementById('preview')
                            }
                        );
                        scanner.addListener('scan', function(content) {
                            //alert('Escaneou o conteudo: ' + content + id);
                            var entradaSalida = document.getElementById("entradaSalida").value;

                            var parametros = {
                                    "p" : "xZ6rQTOHxk",
                                    "qr" : content,
                                    "di":id,
                                    "InicioFecha" : InicioFecha,
                                    "FinFecha" : FinFecha,
                                    "entradaSalida": entradaSalida
                            };
                            $.ajax({
                                    data:  parametros, //datos que se envian a traves de ajax
                                    url:   '../modules/control_asistencia.php', //archivo que recibe la peticion
                                    type:  'GET', //método de envio
                                    dataType: 'json',
                                    beforeSend: function () {
                                            $("#resultado").show();
                                            $("#resultado").val("Verificando, espere por favor...");
                                    },
                                    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                            // $("#resultado").hide();
                                            // $("#resultado").val(response);
                                            var data = response.items;
                                            // console.log( data.Respuesta )
                                            var Resultado = data.Respuesta;
                                            var EstiloAlerta = 'alert-default';
                                            // alert(Resultado)
                                            switch(Resultado){
                                              case -1: EstiloAlerta = 'alert-default'; break;
                                              case 0: EstiloAlerta = 'alert-danger'; break;
                                              case 1: EstiloAlerta = 'alert-success'; break;
                                              case 2: EstiloAlerta = 'alert-warning'; break;
                                            }

                                            $("#resultado").removeAttr('class');
                                            $("#resultado").addClass('alert');
                                            $("#resultado").addClass(EstiloAlerta);
                                            // alert(data);

                                            $("#resultado").text(data.RespuestaTexto);
                                            $("#resultado").show();
                                          //  alert("I am an alert box!");
                                            
                                    }
                            });

                           
                        });
                        Instascan.Camera.getCameras().then(cameras => 
                        {
                            if(cameras.length > 0){
                                scanner.start(cameras[0]);
                            } else {
                                console.error("No se encontro ninguna camara!");
                            }
                        });



                        function fncCambiarMensaje() {
                          $("#resultado").hide();

                          $("#resultado").removeAttr('class');
                          $("#resultado").addClass('alert');
                          $("#resultado").addClass('alert-default');

                          $("#resultado").text('');
                        }
                    </script>
                </div>

                <div class="signin-form" style="margin-right: 20px; margin-left: 40px;">
               <!--  <div>   
                
                </div>
                     -->
                    
                    <h2 class="form-title" style="margin-bottom: 50px;">
                        <?php  echo($Nombre); ?> 
                        <br>
                        <span style="font-size: 11px;">Tipo de Evento : <?php echo($NombreTipo) ?>  </span>
                    </h2>
                    
                    <form method="POST" class="register-form" id="login-form">
                         <!-- <div class="form-group">
                            
                        </div>
                        <div class="form-group">
                            
                        </div> -->
                        
                      
                        
                        <div class="select">
                        <select id="entradaSalida" class="browser-default custom-selecty btn-lg btn-block" onchange="fncCambiarMensaje();">
                            <option value="0" selected>Marcacion Rigida</option>
                            <option value="1">Marcacion libre</option>
                         
                        </select>
                        </div>
                        <br>
                        <!-- <br> -->
                        <!-- <div class="form-group" >
                                  <textarea name="resultado" id="resultado" cols="30" rows="10" style="min-width: 100%"></textarea>                  
                        </div> -->
                        <div class="alert alert-primary" role="alert" id="resultado" style="display: none;">
                          
                        </div>
                    </form>
                    <!-- <div class="social-login">
                        <span class="social-label">Universidad Privada de Tacna</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <!-- <br> -->
                <!-- <div align="center" style="float: left;">
                  <h6>Universidad Privada de Tacna</h6>
                </div> -->


                


            </div>
            <div align="center" style="padding: 9px;">
              <h6 style="font-size: 9px;">Universidad Privada de Tacna</h6>
            </div>
        </div>
        
    </section>


    <section class="sing-in" style="padding-top: 10px;">
        
        <div class="container" id="chart_div">
            
        </div>
        
    </section>

</div>

<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBarColors);

function drawBarColors() {
    

      var options = {
        title: '',
        chartArea: {width: '50%'},
        colors: ['#0d3a9b', '#F2BB09'],
        hAxis: {
          title: '',
          minValue: 0
        },
        vAxis: {
          title: ''
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
     

      setInterval(function() {

        var parametros = {
                "p" : "xRgrQTUH",
                "di":id
          };
            var JSON=$.ajax({
                data:  parametros,
                url:"../modules/control_asistencia.php",
                dataType: 'json',
                async: false}).responseText;
            var Respuesta=jQuery.parseJSON(JSON);
            var incritos = Respuesta["items"][1];
            var AsistentesHoy = Respuesta["items"][0];
       

      var data = google.visualization.arrayToDataTable([
            ['', 'Asistencia de Hoy', { role: 'annotation' } , 'Inscritos' , { role: 'annotation' } ],
            ['', AsistentesHoy["AsisHoy"], AsistentesHoy["AsisHoy"] + ' Asistencia(s)', incritos["AsisHoy"], incritos["AsisHoy"] + ' Asistentes' ],
      
             ]);

        chart.draw(data, options);
        }, 1300);
    }

</script>