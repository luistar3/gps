
<?php

if (isset($_SESSION['registroMasivo'])) {
  
?>


<script>

function fnc_MenesajeInscritos(){
  bootbox.alert({
    size: 'small',
    title: "Mensaje",
    message: "Nuevas Persona Agregadas = <?php echo($_SESSION['registroMasivo']["contPersonaNuevas"]); ?> <br> Personas Procesadas = <?php echo($_SESSION['registroMasivo']["contRegistros"]); ?>"
    //callback: function(){ /* your callback code */ }
  });
}
 
$( document ).ready(function() {
    fnc_MenesajeInscritos();
    });
  
</script>



<?php
unset($_SESSION['registroMasivo']);
}

?>

<?php

if (isset($_SESSION['mensaje'])) {
  
?>


<script>

function fnc_MenesajeInscritos(){
  bootbox.alert({
    size: 'small',
    title: "Mensaje",
    message: "<?php echo($_SESSION['mensaje']["ses_MensajeDescripcion"]); ?>"
    //callback: function(){ /* your callback code */ }
  });
}
 
$( document ).ready(function() {
    fnc_MenesajeInscritos();
    });
  
</script>



<?php
unset($_SESSION['mensaje']);
}

?>


<section class="content">
    <div class="container-fluid">

     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./evento.php?v=eventopPage"><i class="material-icons">home</i> Inicio</a></li>
        <li class="active"><i class="material-icons">domain</i> Eventos</a></li>
      </ol>

      
      <!-- #END# Breadcrumbs -->

     
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                EVENTOS
                <small><strong>Administraci&oacute;n de Eventos</strong></small>
              </h2>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Inline Layout -->

      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body" style="padding-bottom: 0px;">

                <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                    <a href="../modules/evento.php?v=agregar" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">
                      <i class="material-icons">add_box</i>
                      <span>AGREGAR</span>
                    </a>
                  </div>
                  <!-- <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                    <button type="button" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect" onclick="fncExportarBusquedaEgresados('<?php //echo $sex; ?>');">
                      <i class="material-icons">library_books</i>
                      <span>REPORTE EXCEL</span>
                    </button>
                  </div> -->
                </div>

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Inline Layout -->


      <?php

      $btnEvento="";
      $btnMantenimiento = "";

      if (isset($_SESSION['usuario']["ses_PermisoPSTobjeto"])) {
         $boton=$_SESSION['usuario']["ses_PermisoPSTobjeto"];
             $botonPermisos=$_SESSION['usuario']["ses_PermisoPSTobjeto"];


             $btnEvento=($botonPermisos[0]);
            $btnMantenimiento = ($botonPermisos[1]);
      }



      ?>
      <!-- Inline Layout -->

      <!-- #END# Inline Layout -->


      <!-- Basic Examples -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
          <div class="header bg-blue-upt">
              <h2>
                EVENTOS
                <!-- <small><strong>Administraci&oacute;n de Empresas</strong></small> -->
              </h2>
            </div>
            <div class="body">
              <div class="table-responsive" id="divBuscarEmpresa">

              <!-- <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/architecture.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;"> -->


              <table width="100%" class="table table-striped table-bordered" id="table_id" class="display" >
          <thead>
            <tr>
              <th width="3%"></th>
              <th width="15%">Nombre del Evento</th>
              <!-- <th width="10%">Fecha Creacion</th> -->
              <th width="10%">Lugar</th>
              <th width="1%">Aforo</th>
              <th width="1%">Registrados</th>
              <th width="12%">Inicio - Fin Del Evento</th>
              <th width="6%">Dependencia</th>
              <th width="5%">Tipo de Evento</th>

              <th width="2%" class="no-print">Estado</th>
              <!-- <th width="3%">Estado</th> -->
              <th width="15%" class="no-print" data-orderable="false">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtListarEventos) > 0){ ?>
              <?php foreach ($dtListarEventos as $ListarEventos) { ?>
                <tr>
                  <td align="center"><?php echo $contador; ?></td>
                  <td><?php echo strtoupper($ListarEventos["Nombre"]); ?></td>
                  <!-- <td><?php //echo $ListarEventos["fecha"]; ?></td> -->
                  <td><?php echo strtoupper($ListarEventos["Lugar"]); ?></td>
                  <td align="center"><?php echo $ListarEventos["Aforo"]; ?></td>
                  <td align="center"><?php echo $ListarEventos["Registrados"]; ?></td>

                  <td><h4><span class="label label-warning"><?php echo $ListarEventos["InicioFecha"]; ?></span> - <span class="label label-primary"> <?php echo $ListarEventos["FinFecha"]; ?></span> </h4></td>
                  <td><?php echo $ListarEventos["facultad"]; ?> </td>
                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                  <td align="center" class=""><?php
                        if ($ListarEventos["Tipo"] == 'T'  ) {

                            $toogle='checked';

                        } else {


                            $toogle='';
                        }

                  ?>
                  <input class="" id="chkEventoToogle_<?php echo $ListarEventos["IdEvento"]; ?>" type="checkbox" <?php echo($toogle);  ?> data-toggle="toggle" data-on="Público" data-off="Privado" value="<?php echo $ListarEventos["IdEvento"]; ?>" onchange="fncCambiarEstadoEvento(this, <?php echo $ListarEventos["IdEvento"]; ?>); return false;  /*alert($(this).prop('checked'));*/" >
                  </td>


                  <td>
                    <?php
                      // $url_parametros_sector_detalle['sesion'] = $sex;
                       $url_parametros_sector_control['v'] = 'control';
                       $url_parametros_sector_control['id'] = base64_encode($ListarEventos["IdEvento"]);
                       $url_parametros_asistentes['v'] = 'registrarEventoSelect';
                       $url_parametros_asistentes['IdEvento'] = ($ListarEventos["IdEvento"]);
                       $url_parametros_detalle_evento['v'] = 'fechas';
                       $url_parametros_detalle_evento['id'] = base64_encode($ListarEventos["IdEvento"]);


                       $url_parametros_modificar_control ['v'] = 'editar';
                       $url_parametros_modificar_control ['id'] = base64_encode($ListarEventos["IdEvento"]);



                       $url_parametros_reporte_asistencia['v'] = 'reporte';
                       $url_parametros_reporte_asistencia ['id'] = base64_encode($ListarEventos["IdEvento"]);

                       $url_parametros_asistentes_a_evento['v'] = 'registradosPorEventoMes'; 
                       $url_parametros_asistentes_a_evento['id'] = base64_encode( $ListarEventos["IdEvento"]);
                     ?>




                    

                   
                    <?php
                    // if($Fecha>$ListarEventos["InicioFecha"]){
                      
                      ?>
                     <a href="<?php if($Fecha>$ListarEventos["InicioFecha"]){ echo '#'; }else{ echo '../modules/evento.php?'.http_build_query($url_parametros_modificar_control); } ?>" class="btn btn-warning btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar" <?php  if($Fecha>$ListarEventos["InicioFecha"]){echo("disabled");} ?> >
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                      <?php
                    // }
                    // else {

                      ?>
                      
                       <!-- <a href="../modules/evento.php?<?php echo http_build_query($url_parametros_modificar_control); ?>" class="btn btn-warning btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar" <?php  if($Fecha>$ListarEventos["InicioFecha"]){echo("disabled");} ?> >
                      <span class="glyphicon glyphicon-edit"></span>
                    </a> -->
                      <?php
                    // }
                    ?>
                     <a href="<?php if($Fecha>$ListarEventos["FinFecha"]){ echo '#'; }else{ echo '../modules/Registro.php?'.http_build_query($url_parametros_asistentes); } ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Agregar Asistentes" data-original-title="Agregar Asistentes" <?php  if($Fecha>$ListarEventos["FinFecha"]){echo("disabled");} ?> >
                      <span class="glyphicon glyphicon-user"></span>
                    </a>
                     
                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_asistentes_a_evento); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Listado de Asistentes" data-original-title="Listado de Asistentes">
                                                      
                      <span class="glyphicon glyphicon-paste"></span>
                    </a>    

                    <a href="<?php if($Fecha>$ListarEventos["FinFecha"]){ echo '#'; }else{ echo '../modules/detalle_evento.php?'.http_build_query($url_parametros_detalle_evento); } ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Cronograma Evento" data-original-title="Cronograma Evento" <?php  if($Fecha>$ListarEventos["FinFecha"]){echo("disabled");} ?> >
                      <span class="glyphicon glyphicon-list-alt"></span>
                    </a>

                    <a target="_blank" href="<?php if($Fecha>$ListarEventos["FinFecha"]){ echo '#'; }else{ echo '../modules/control_asistencia.php?'.http_build_query($url_parametros_sector_control); } ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistencia" data-original-title="Asistencia"  <?php  if($Fecha>$ListarEventos["FinFecha"]){echo("disabled");} ?> >
                      <span class="glyphicon glyphicon-time"></span>
                    </a>
                    <a href="../modules/control_asistencia.php?<?php echo http_build_query($url_parametros_reporte_asistencia); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Reporte" data-original-title="Reporte">
                      <span class="glyphicon glyphicon-tasks"></span>
                    </a>

                  </td>
                </tr>
                <?php $contador++; ?>
                <?php } ?>
            <?php } ?>

          </tbody>
        </table>



              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Basic Examples -->




    </div>
  </section>

  <script type="text/javascript">
    
    function fncCambiarEstadoEvento(checkbox, IdEvento) {
  
      var CheckedBox = $(checkbox).prop('checked');

      if(CheckedBox == true){
        valor = 'T';
      }else{
        valor = 'F';
      }

      var parametros = {
          "p" : "CambioEstadoEvento",
          "id" : IdEvento,
          "valor":valor
      };

      $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   '../modules/evento.php', //archivo que recibe la peticion
        type:  'GET', //método de envio
        beforeSend: function () {
          $("#resultado").val("Verificando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          // $("#resultado").val(response);  
          btnConfirmar = 'OK'; 
          if(response == 1){
            tipo = 'success';
            titulo = 'Completado';
            texto = 'Estado cambiado con exito';
          }else{
            tipo = 'error';
            titulo = 'Error';
            texto = 'Error en cambio de estado. Verificar registro';
          }  

          fncMostrarMensaje(tipo, titulo, texto, btnConfirmar);        
        }
      });

    
  }

  </script>
