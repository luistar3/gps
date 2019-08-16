<?php
@session_start();
if (isset ($_SESSION['registroMasivo'])) {
  ?>
<script>

function fnc_MenesajeInscritos(){
  bootbox.alert({
    size: 'small',
    title: "Mensaje",
    message: "Nuevas Persona Agregadas = <?php echo($_SESSION['registroMasivo']["contPersonaNuevas"]); ?>
    <br> Nuevas Incripciones = <?php echo($_SESSION['registroMasivo']["contRegistroNuevo"]); ?>
    <br> Personas Procesadas = <?php echo($_SESSION['registroMasivo']["contRegistros"]); ?>"
    //callback: function(){ /* your callback code */ }
  });
}
 
$( document ).ready(function() {
    fnc_MenesajeInscritos();
    });
  
</script>

  <?php

}

unset($_SESSION['registroMasivo']);
?>

<section class="content">
    <div class="container-fluid">
      

     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./evento.php?v=eventopPage"><i class="material-icons">register</i>Inicio</a></li>
        <li><a href="../modules/evento.php?v=index"><i class="material-icons">domain</i> Eventos</a></li>
        <li class="active"><i class="material-icons">person</i>Personas</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
        
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                <strong><?php echo( strtoupper('LISTADO DE PERSONAS POR EVENTO') ); ?></strong>
              </h2>
            </div>

            <div class="body" style="padding-bottom: 0px;">
   
              <div class="row clearfix">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                  <a href="../modules/evento.php?v=index" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect">
                    <i class="material-icons">arrow_back</i>
                  </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-5 col-xs-6">
                  <a href="#" class="btn btn-block btn-danger btn-lg m-l-0 m-r-0 waves-effect" onclick="fncVerificarChecks(); return false;">
                    <i class="material-icons">delete</i> Eliminar Seleccionados
                  </a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-5 col-xs-6">
                  <a href="../modules/persona.php?v=generar&pal=evento&IdEvento=<?php echo $IdEvento; ?>" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect">
                    <i class="material-icons">credit_card</i> Imprimir Carnets
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- Inline Layout -->
      <!-- <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                REGISTRO DE PERSONAS PARA LOS EVENTOS
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <a href="#" class="btn btn-block btn-info btn-lg m-l-0 m-r-0 waves-effect" disabled>
                  
                  <span>CANTIDAD DE REGISTRADO = <?php echo(count($dtListadoPersonasPorEvento)) ?> </span>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div> -->
      <!-- #END# Inline Layout -->


      <!-- Basic Examples -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <div class="table-responsive" id="divBuscarEmpresa">

              <?php $parametro_delete='Q6SwcynHWV'; ?>
              <form action="../modules/Registro.php?p=<?php echo $parametro_delete; ?>" method="POST" id="frmListadoRegistro" role="form">
                <!-- <legend>Form title</legend> -->
              
                
                
              
              

<input type="hidden" name="IdEvento" id="input" class="form-control" value="<?php echo($IdEvento); ?>">

              <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_id" class="display" >
          <thead>
            <tr>
              <th width="4%" class="no-print">Seleccionar</th>
              <th width="15%">Nombre </th>
              <th width="10%">Apellidos</th>
              <th width="10%">DNI</th>
              <th width="10%">Celular</th>
              <th width="10%" data-orderable="false">Correo</th>
              <th width="5%" class="no-print">Descargado</th>
              <th width="10%" class="no-print" data-orderable="false">Estado de la Inscripción</th>
              <th width="10%" class="no-print" data-orderable="false">Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtListadoPersonasPorEvento) > 0){ ?>
              <?php foreach ($dtListadoPersonasPorEvento as $ListadoPersonasPorEvento) { ?>
                <tr>
                  <td align="center">   
                  
                 
                      <div class="form-check">
                        <input class="form-check-input clsidDelete" type="checkbox" name="idDelete[]" value="<?php echo($ListadoPersonasPorEvento['IdPersona'])?>" id="<?php echo($ListadoPersonasPorEvento['IdPersona'])?>x">
                        <label class="form-check-label" for="<?php echo($ListadoPersonasPorEvento['IdPersona'])?>x">
                          
                        </label>
                      </div>
                      
                      
                   <?php// echo $contador; ?>
                   
                   </td>
                  <td><?php echo $ListadoPersonasPorEvento["Nombre"];?></td>
                  <td><?php echo $ListadoPersonasPorEvento["ApePat"];echo(" ");echo $ListadoPersonasPorEvento["ApeMat"];?></td>
                  <td><?php echo $ListadoPersonasPorEvento["Dni"];?></td>
                  <td><?php echo $ListadoPersonasPorEvento["Celular"];?></td>
                  <td><?php echo $ListadoPersonasPorEvento["Correo"];?></td>
                  <td align="center">
                    <?php 
                      //echo $ListadoPersonasPorEvento["Descargado"]; 
                      if( $ListadoPersonasPorEvento["Descargado"] == 1 ){
                        echo '<i class="material-icons">check</i>';
                      }
                    ?>
                  </td>
                  <td align="center">
                  <?php 
                  $estado= $ListadoPersonasPorEvento["Estado"];
                  $marca = "";
                  $class = "";
                  if ($estado==1) {
                    $marca = "Activo";
                    $class = "btn btn-primary";
                  }
                  else{
                    $marca = "Inactivo";
                    $class = "btn btn-warning";
                  
                  }
                  $pam = "'".$estado."'";
                  ?>
                  <input type="text" name="" value="<?php echo($ListadoPersonasPorEvento["Estado"]) ?>" id="<?php echo($ListadoPersonasPorEvento['IdPersona'])?>"  hidden >
                  <input  id="<?php echo($ListadoPersonasPorEvento['IdPersona'])?>q" class="btn btn-warning"  type="button" onclick="fnc_cambiarEstado(<?php echo($ListadoPersonasPorEvento['IdPersona'].','.$IdEvento.','.$pam)?>)" value="<?php echo($marca); ?>">
                  </td>
                  <td>
                    <input  id="<?php echo($ListadoPersonasPorEvento['IdPersona'])?>q" class="btn btn-danger"  type="button" onclick="fnc_EliminarPersonaEvento(<?php echo($ListadoPersonasPorEvento['IdPersona'].','.$IdEvento.",'".base64_encode($IdEvento)."'" )?>)" value="Eliminar">
                      <?php
                        $url_parametros_carnet['v']  = 'generar';
                      
                        $url_parametros_carnet['Dni'] = base64_encode( $ListadoPersonasPorEvento["Dni"]);
                        $url_parametros_carnet['IdEvento'] = $IdEvento;   
                        $url_parametros_carnet['pal'] = 'evento';                   


                        ?>
                     <a href="../modules/persona.php?<?php echo http_build_query($url_parametros_carnet); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Generar Carnet" data-original-title="GENERAR">
                      <span class="glyphicon glyphicon-credit-card"></span>
                    </a>
                  </td>

                  
                   
                  
                
                </tr>
                <?php $contador++; ?>
                <?php } ?>
            <?php } ?>
            
          </tbody>
        </table>

                <!-- <button type="submit" class="btn btn-primary">Borrar</button> -->
              </form>
              


              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Basic Examples -->

      


    </div>
  </section>

<script>

  function fnc_EliminarPersonaEvento(IdPersona, IdEvento, EncodeIdEvento) {

    swal({
      title: 'Eliminar Asistente al Evento',
      text: 'Seguro que desea eliminar el asistente del evento?',
      type: "info",
      showCancelButton: true,
      confirmButtonColor: '#141438',
      confirmButtonText: 'Si!',
      cancelButtonText: "Cancelar",
      closeOnConfirm: false,
      focusConfirm: true,
    }, function () {

        var parametros = {
            "p" : "EliminarPersonaEvento",
            "IdEvento" : IdEvento,
            "IdPersona":IdPersona
        };

        $.ajax({
          data:  parametros, //datos que se envian a traves de ajax
          url:   '../modules/Registro.php', //archivo que recibe la peticion
          type:  'GET', //método de envio
          // async: true,
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

            url = '../modules/Registro.php?v=registradosPorEventoMes&id='+EncodeIdEvento;
            fncConfirmarMensaje(url, titulo, texto, btnConfirmar);


          }
        });

    });
    
  }

function fnc_cambiarEstado(idPersona,idEvento,estado){

  swal({
    title: 'Cambio de Estado',
    text: 'Seguro que desea cambiar el estado del asistente?',
    type: "info",
    showCancelButton: true,
    confirmButtonColor: '#141438',
    confirmButtonText: 'Si!',
    cancelButtonText: "Cancelar",
    closeOnConfirm: true,
    focusConfirm: true,
  }, function () {

    var valorEstado = document.getElementById(idPersona).value;

      var parametros = {
            "p":"J9Y0B7rh86",
            "IdEvento":idEvento,
            "IdPersona":idPersona,
            "Estado":valorEstado

           
        };

     // alert(idPersona+"-"+idEvento+"="+estado);

      $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   '../modules/Registro.php', //archivo que recibe la peticion
            type:  'GET', //método de envio
            beforeSend: function () {
                   // $("#resultado").val("Verificando, espere por favor...");
                    
            },
            success:  function (respuesta) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              
              if (respuesta["0"]=1) {
                document.getElementById(idPersona).value=respuesta["2"];
                document.getElementById(idPersona+"q").value=respuesta["1"];


                bootbox.alert({
                        message: "ESTADO MODIFICADO",
                        size: 'small'
                    });

              }
              else{

              }


            }
        });

  });

      
}


function fncVerificarChecks(){

  if ( $('.clsidDelete:checked').length == 0 ) {
    // alert("0")
    btnConfirmar = 'OK'; 
    tipo = 'error';
    titulo = 'Error';
    texto = 'Debe seleccionar al menos un registro para poder eliminar';

    fncMostrarMensaje(tipo, titulo, texto, btnConfirmar); 
  }else{
    // alert("1")

    swal({
      title: 'Eliminación de asistentes',
      text: 'Seguro que desea eliminar los seleccionados?',
      type: "info",
      showCancelButton: true,
      confirmButtonColor: '#141438',
      confirmButtonText: 'Si!',
      cancelButtonText: "Cancelar",
      closeOnConfirm: true,
      focusConfirm: true,
    }, function () {

      $('#frmListadoRegistro').submit();

    });


    
  }

  

}

</script>