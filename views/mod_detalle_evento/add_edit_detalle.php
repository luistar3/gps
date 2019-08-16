
<?php

if (isset($_SESSION['mensaje'])) {
  
?>


<script>

function fnc_MenesajeInscritos(){
  bootbox.alert({
    size: 'small',
    title: "Mensaje",
    message: " <?php echo($_SESSION['mensaje']);?> "
 
  });
}
 
$( document ).ready(function() {
    fnc_MenesajeInscritos();
    });
  
</script>



<?php
}
unset($_SESSION['mensaje']);
?>

  <section class="content">
    <div class="container-fluid">
      <?php  

        switch ($operacion) {
          case 'agregar': 
            $titulo_operacion     = "Agregar Fecha";
            $subtitulo_operacion  = "Agregar Nuevo Fecha Evento";
            $icono_operacion      = "add_box";
            $boton_operacion      = "AGREGAR";
            $parametro_add_edit   = "xZ6rQTOHxk";
            $bitActivo            = 1;
            $readonly_ruc         = "";

            $IdEvento                     = "";
            $Nombre                       = "";
            $Lugar                        = "";
            $Estado                       = "";
            $Descripcion                  = "";
            
            $Aforo                        = "";
      
            $UbicacionLongitud            = "-70.2355131692448";
            $UbicacionLatitud             = "-18.002904340795254";
            $IdTipoEvento                 = "";
            $NombreTipoEvento             = "";
            $InicioFecha                  = "";
            $FinFecha                     = "";
            $InicioHora                   = "";
            $FinHora                      = "";
            $Tipo                         = "";
            $Banner                       = "default.jpg";



            break;
          case 'editar': 
            $titulo_operacion = "Editar Evento";
            $subtitulo_operacion = "Editar Evento Registrado";
            $icono_operacion = "edit";
            $boton_operacion = "MODIFICAR";
            $parametro_add_edit = "uctftGr4Jm";
            $readonly_ruc = "";

            $IdEvento                     = $dtConsultarEvento[0]['IdEvento'];
            $Nombre                       = $dtConsultarEvento[0]['Nombre'];
            $Lugar                        = $dtConsultarEvento[0]['Lugar'];
            $Estado                       = $dtConsultarEvento[0]['Estado'];
            $Descripcion                  = $dtConsultarEvento[0]['Descripcion'];
            
            $Aforo                        = $dtConsultarEvento[0]['Aforo'];
      
            $UbicacionLongitud            = $dtConsultarEvento[0]['UbicacionLongitud'];
            $UbicacionLatitud             = $dtConsultarEvento[0]['UbicacionLatitud'];
            $IdTipoEvento                 = $dtConsultarEvento[0]['IdTipoEvento'];
            $NombreTipoEvento             = $dtConsultarEvento[0]['NombreTipoEvento'];
            $InicioFecha                  = $dtConsultarEvento[0]['InicioFecha'];
            $FinFecha                     = $dtConsultarEvento[0]['FinFecha'];




            $InicioHora                   = $dtConsultarEvento[0]['InicioHora'];
            $formated_time = date("HH:ii", strtotime($InicioHora));


            $FinHora                      = $dtConsultarEvento[0]['FinHora'];


            $formated_time_fin = date("HH:ii", strtotime($FinHora));
            $Tipo                         = $dtConsultarEvento[0]['Tipo'];
            $Banner                       = $dtConsultarEvento[0]['Banner'];

            
            break;
        }
      ?>
      <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./evento.php?v=eventopPage"><i class="material-icons">home</i> Inicio</a></li>
        <?php $url_parametros_addedit_empresa['v'] = 'index'; ?>
        <li><a href="../modules/evento.php?v=index<?php //echo http_build_query($url_parametros_addedit_empresa); ?>"><i class="material-icons">domain</i> Eventos</a></li>
        <li class="active"><i class="material-icons"><?php echo $icono_operacion ?></i> <?php echo $titulo_operacion ?></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                    <?php if (count($dtListarDetalleEventos)==0) {
                      echo('Ningun Detalle Agregado');
                    }
                    else{
                      echo ($dtListarDetalleEventos[0]['Nombre'] );
                    }
                     ?>
                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                  </h2>
            </div>

            <div class="body" style="padding-bottom: 0px;">
   
              <div class="row clearfix">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                  <a href="../modules/evento.php?v=index" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect">
                    <i class="material-icons">arrow_back</i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

        <input type="hidden" value=<?php echo $icono_operacion ?>>

      <?php //$url_parametros_form_empresa = $url_parametros; ?>
      <?php //$url_parametros_form_empresa['p'] = $parametro_add_edit; ?>
      <form id="form_validation" action="../modules/detalle_evento.php?p=<?php echo $parametro_add_edit; ?>"  method="POST"> <!-- action="../modules/detalle_evento.php?p=<?php echo $parametro_add_edit; ?>" -->
        <input type="hidden" name="hIdDetalle" value="" id="hIdDetalle">
        <div class="demo-masked-input">



          <input name="hidden_idEvento" id="" class="btn btn-primary" type="hidden" value="<?php echo(base64_encode( $dtDetalleEvento[0]["IdEvento"])) ?>">
       


          <!-- Inline Layout -->
          <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <!-- <div class="header bg-blue-upt">
                  <h2>
                    <?php if (count($dtListarDetalleEventos)==0) {
                      echo('Ningun Detalle Agregado');
                    }
                    else{
                      echo ($dtListarDetalleEventos[0]['Nombre'] );
                    }
                     ?>
                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                  </h2>
                </div> -->
                <div class="body">

                  <div class="row clearfix">

                    <div class="col-md-8 col-md-offset-2">

                        <div class="row clearfix">

                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label for="evento">Fecha </label>
                            <div class="form-group">
                              <div class="form-line" id="idFechaDetalle">
                              <input type="date"  required min="<?php echo($dtDetalleEvento[0]["InicioFecha"])?>"   max="<?php echo($dtDetalleEvento[0]["FinFecha"])?>" id="fecha" name="fecha" class="form-control " value="<?php echo $InicioFecha; ?>">
                              </div>
                            </div>
                            
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label for="horaInicio">Hora de Inicio</label>
                            <div class="form-group">
                              <div class="form-line">
                                <input type="time" id="horaInicio" min="06:00" max="23:00" name="horaInicio" class="form-control" required>
                               
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label for="horaInicio">Hora de Finalización</label>
                            <div class="form-group">
                              <div class="form-line">
                                <input type="time" id="finInicio" min="06:00" max="23:00" name="horaFin" class="form-control"  required>
                               
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="horaInicio">Etapa</label>
                            <div class="form-group">
                              <div class="form-line">
                                <input type="text" id="Comentario" name="comentario" class="form-control" value="<?php if( count($dtListarDetalleEventos) > 0 ){ echo 'Etapa '.(count($dtListarDetalleEventos) + 1); }else{ echo 'Etapa 1'; } ?>" placeholder="Ingrese comentario porfavor" required>
                                <input type="hidden" name="hNumeroRegistros" id="hNumeroRegistros" value="<?php echo count($dtListarDetalleEventos); ?>">
                              </div>
                            </div>
                          </div>


                          <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" > -->
                            <!-- <button class="btn btn-danger btn-block m-t-15">Ya existe!</button> -->
                          <!-- </div> -->


                          <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label for="tipoEvento">Tipo de Evento</label>
                            <div class="form-group">
                              <div class="form-line">
                                  <select class="form-control show-tick" id="tipoEvento" name="tipoEvento" required="true">
                                    <option value="" selected>Seleccione el Estado de la Fecha</option>
                                    <option value="A" >Activo</option>
                                    <option value="I" >Inactivo</option>
                                   
                                  

                                  </select>
                              </div>
                            </div>
                          </div> -->

                        </div>
                  
                      </div>
                    </div>

                    

                    <div class="row clearfix">
                      <div class="col-lg-7 col-md-7  "></div>
                      <div class="col-lg-1 col-md-1  ">
                        
                        <button id="btnFormularioDetalle" type="button" class="btn btn-outline-primary" onclick="fncSubmitFormularioDetalle();" <?php //if($operacion == 'agregar'){echo 'onclick="fncValidarRegistroEmpresa(\''.$sex.'\'); return false;"';} ?> >
                          <i class="material-icons"><?php echo $icono_operacion ?></i>
                          <span><?php echo strtoupper($boton_operacion) ?></span>
                        </button>
                      </div>
                      <div class="col-lg-1 col-md-1 ">
                        <button id="btnCancelarFormularioDetalle" type="button" class="btn btn-outline-danger" onclick="fncConfirmarMensaje('../modules/evento.php?v=index','Cancelar Operación','Seguro que desea cancelar la operación?','Si!'); return false;">
                          <i class="material-icons">cancel</i>
                          <span>CANCELAR</span>
                        </button>
                      </div>
                      <div class="col-lg-3 col-md-3  "></div>
                    </div>

                    <div id="" class="z-depth-1-half map-container" style="height: 500px">
                        <div class="modal-body row">
                          <div class="col-md-12 well well-lg">
                          <table id="example" class="display table" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    
                                    <th>Fecha</th>
                                    <th>Hora de Inicio</th>
                                    <th>Hora de Finalización</th>
                                    <th>Etapa</th>

                                    <!-- <th>Estado</th> -->
                                    <th>Acciones</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                            <?php $contador = 1; ?>
                            <?php //var_export($dtListarDetalleEventos); ?>
            <?php if (count($dtListarDetalleEventos) > 0){ ?>
              <?php foreach ($dtListarDetalleEventos as $ListarDetalleEventos) { ?>
                <tr id="tr_<?php echo $ListarDetalleEventos["IdDetalleEvento"] ?>">
                  <td align="center"><span id="Contador_<?php echo $ListarDetalleEventos["IdDetalleEvento"] ?>"><?php echo $contador; ?></span></td>
                 
                  <td><span id="Fecha_<?php echo $ListarDetalleEventos["IdDetalleEvento"] ?>"><?php echo $ListarDetalleEventos["Fecha"]; ?></span></td>
                  <td><span id="InicioHora_<?php echo $ListarDetalleEventos["IdDetalleEvento"] ?>"><?php echo $ListarDetalleEventos["InicioHora"]; ?></span></td>
                  <td><span id="FinHora_<?php echo $ListarDetalleEventos["IdDetalleEvento"] ?>"><?php echo $ListarDetalleEventos["FinHora"]; ?></span></td>
                  <td><span id="Comentario_<?php echo $ListarDetalleEventos["IdDetalleEvento"] ?>"><?php echo $ListarDetalleEventos["Comentario"]; ?></span></td>
                  
                <!--   <td align="center"><?php 
                        if ($ListarDetalleEventos["Estado"] == 1  ) {
                         
                            echo("Activo");
                        } else {
                            # code...

                           echo("Inactivo");
                        }
                
                  ?>
                  </td> -->
                
                  <td align="left">                            
                  
                    <?php  
                    $url_parametros_modificar_control['p']="UkUELwv6kL";
                    $url_parametros_modificar_control['idEvento']=base64_encode( $ListarDetalleEventos["IdEvento"]);
                    $url_parametros_modificar_control['id']=base64_encode( $ListarDetalleEventos["IdDetalleEvento"]);
                    ?>

                    <?php if( $ListarDetalleEventos["ValidadorFechaHora"] == 1 && $ListarDetalleEventos["Asistencia"] == 0){  ?>
                      <a id="btnTablaModificar_<?php echo $ListarDetalleEventos["IdDetalleEvento"]; ?>" href="#" onclick="fncModificarDetalleEvento(<?php echo $ListarDetalleEventos["IdDetalleEvento"]; ?>); return false;" class="btn btn-warning btn-md m-l-0 m-r-0 waves-effect btnTablaModificar" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar">
                        <span class="glyphicon glyphicon-edit"></span> Modificar
                      </a> 
                      <a id="btnTablaEliminar_<?php echo $ListarDetalleEventos["IdDetalleEvento"]; ?>" onclick="fncVerificarEliminarDetalle('../modules/detalle_evento.php?<?php echo http_build_query($url_parametros_modificar_control); ?>'); return false;" href="#" class="btn btn-danger btn-md m-l-0 m-r-0 waves-effect btnTablaEliminar" data-toggle="tooltip" data-placement="left" title="Eliminar" data-original-title="Eliminar">
                        <span class="glyphicon glyphicon-remove"></span> Eliminar
                      </a> 
                    <?php } ?>                         
                  </td>
                </tr>
                <?php $contador++; ?>
                <?php } ?>
            <?php } ?>
                              
                            </tbody>
                         
                        </table>
                          <!-- </div>
                          <div id="Cronograma" class="col-md-6 well well-lg">

                          sss
                          </div>
                        </div> -->
                    </div>
                 
                    
                <h6><span class="label label-danger">(*)</span> El tiempo mínimo de una etapa del evento es de 1 hora</h6>
                <h6><span class="label label-danger">(*)</span> No se registrarán estapas con cruce de horarios</h6>
                <h6><span class="label label-danger">(*)</span> El cronograma creado está fuertemente ligado con la modificación del Evento</h6>
                

                </div>
              </div>
              
            </div>
            
          </div>

        </div>
 
      </form>
  
   
    </div>
  </section>


  <script type="text/javascript">
    
    function fncModificarDetalleEvento(IdDetalleEvento) {
      $('#btnFormularioDetalle i').text('edit');
      $('#btnFormularioDetalle span').text('MODIFICAR');

      var Fecha = $('#Fecha_' + IdDetalleEvento).text();
      $('#fecha').val(Fecha);

      var InicioHora = $('#InicioHora_' + IdDetalleEvento).text();
      $('#horaInicio').val(InicioHora);

      var FinHora = $('#FinHora_' + IdDetalleEvento).text();
      $('#finInicio').val(FinHora);

      var Comentario = $('#Comentario_' + IdDetalleEvento).text();
      $('#Comentario').val(Comentario);

      $('#hIdDetalle').val(IdDetalleEvento);
      $('#form_validation').attr('action', '../modules/detalle_evento.php?p=uctftGr4Jm');
      $('#tr_' + IdDetalleEvento).css("background-color", "#d2d2d2");
      $('#btnCancelarFormularioDetalle').attr('onclick','fncCancelarModificarDetalleEvento('+IdDetalleEvento+'); return false;');

      $('.btnTablaModificar').hide();  
      $('.btnTablaEliminar').hide(); 

      // $('.btnTablaModificar').attr('disabled', 'disabled');  
      // $('.btnTablaEliminar').attr('disabled', 'disabled');   
    }

    function fncCancelarModificarDetalleEvento(IdDetalleEvento) {
      $('#btnFormularioDetalle i').text('add_box');
      $('#btnFormularioDetalle span').text('AGREGAR');

      $('#fecha').val('');
      $('#horaInicio').val('');
      $('#finInicio').val('');
      $('#Comentario').val( 'Etapa ' + ( parseInt($('#hNumeroRegistros').val()) + 1) );

      $('#hIdDetalle').val(0);
      $('#form_validation').attr('action', '../modules/detalle_evento.php?p=xZ6rQTOHxk');
      $('#tr_' + IdDetalleEvento).removeAttr('style');
      $('#btnCancelarFormularioDetalle').attr('onclick',"fncConfirmarMensaje('../modules/evento.php?v=index','Cancelar Operación','Seguro que desea cancelar la operación?','Si!'); return false;")

      $('.btnTablaModificar').show();
      $('.btnTablaEliminar').show();
    }


    function fncVerificarEliminarDetalle(url) {
      
      swal({
        title: 'Eliminación de Cronograma',
        text: 'Seguro que desea eliminar el cronograma seleccionado?',
        type: "info",
        showCancelButton: true,
        confirmButtonColor: '#141438',
        confirmButtonText: 'Si!',
        cancelButtonText: "Cancelar",
        closeOnConfirm: true,
        focusConfirm: true,
      }, function () {

        location.href = url;

      });

    }

    function fncSubmitFormularioDetalle() {
      $('#form_validation').submit();
    }

  </script>

 