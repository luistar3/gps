<?php //$url_parametros_addedit_empresa = $url_parametros; ?>
  <section class="content">
    <div class="container-fluid">
      <?php  
//echo($_SESSION['usuario']["ses_Permiso"]);
//print_r($_SESSION['usuario']["ses_PermisoValorEspecifico"]);
        switch ($operacion) {
          case 'agregar': 
            $titulo_operacion     = "Agregar Evento";
            $subtitulo_operacion  = "Agregar Nuevo Evento";
            $icono_operacion      = "add_box";
            $boton_operacion      = "AGREGAR";
            $parametro_add_edit   = "xZ6rQTOHxk";
            $bitActivo            = 1;
            $readonly_ruc         = "";

            $IdEvento                     = "";
            $Nombre                       = "";
            $Lugar                        = "";
            $Estado                       = "1";
            $Descripcion                  = "";
            
            $Aforo                        = "1";
      
            $UbicacionLongitud            = "-70.2355131692448";
            $UbicacionLatitud             = "-18.002904340795254";
            $IdTipoEvento                 = "";
            $NombreTipoEvento             = "";

            $ahora = time();
            $unDiaEnSegundos = 24 * 60 * 60;
           // $manana = $ahora + $unDiaEnSegundos;
            $fechaInicioDefecto = date("Y-m-d", $ahora);
          //  $manana = $ahora + $unDiaEnSegundos+$unDiaEnSegundos;
            $fechaFinDefecto = date("Y-m-d", $ahora);
            $InicioFecha                  = $fechaInicioDefecto;
            $FinFecha                     = $fechaFinDefecto;
            $InicioHora                   = "";
            $FinHora                      = "";
            $Tipo                         = "";
            $Banner                       = "default.jpg";
            $IdTipoDepe                   = "";



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
            $formated_time                = date("H:i", strtotime($InicioHora));


            $FinHora                      = $dtConsultarEvento[0]['FinHora'];


            $formated_time_fin            = date("H:i", strtotime($FinHora));
            $Tipo                         = $dtConsultarEvento[0]['Tipo'];
            $Banner                       = $dtConsultarEvento[0]['Banner'];

            $IdTipoDepe                   = $dtConsultarEvento[0]["IdDepe"].'*'.$dtConsultarEvento[0]["IdPtaDependenciaFijo"];

            break;
        }
      ?>
      <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./evento.php?v=eventopPage"><i class="material-icons">home</i> Inicio</a></li>
        <?php $url_parametros_addedit_empresa['v'] = 'index'; ?>
        <li><a href="../modules/evento.php?<?php echo http_build_query($url_parametros_addedit_empresa); ?>"><i class="material-icons">event</i> Eventos</a></li>
        <li class="active"><i class="material-icons"><?php echo $icono_operacion ?></i> <?php echo $titulo_operacion ?></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      
      <?php //$url_parametros_form_empresa = $url_parametros; ?>
      <?php //$url_parametros_form_empresa['p'] = $parametro_add_edit; ?>
      <form id="form_validation" action="../modules/evento.php?p=<?php echo $parametro_add_edit; ?>"  method="POST">
        <div class="demo-masked-input">



          <input name="hidden_idEvento" id="" class="btn btn-primary" type="hidden" value=<?php echo(base64_encode( $IdEvento)) ?>>
          <input type="hidden"  name="xBanner" value=<?php echo($Banner); ?> >


          <!-- Inline Layout -->
          <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header bg-blue-upt">
                  <h2>
                    Evento
                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                  </h2>
                </div>
                <div class="body">

                    <div class="row clearfix">

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="evento">Nombre del evento </label>
                        <div class="form-group">
                          <div class="form-line" id="divNombreEvento">
                            <input type="text" id="nombreEvento" name="nombreEvento" class="form-control text"  maxlength="259" value="<?php echo $Nombre; ?>"  placeholder="Nombre del Evento" required="true"   >
                          </div>
                        </div>
                        
                      </div>

                      <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" > -->
                        <!-- <button class="btn btn-danger btn-block m-t-15">Ya existe!</button> -->
                      <!-- </div> -->

                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label for="lugar">Lugar</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="lugar" name="lugar" class="form-control" value="<?php echo $Lugar; ?>" placeholder="Lugar del Evento" required="true" maxlength="550">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="tipoEvento">Tipo de Evento</label>
                        <div class="form-group">
                          <div class="form-line">
                              <select class="form-control show-tick" id="tipoEvento" name="tipoEvento" required="true">
                                <!-- <option value="" selected>Seleccione el tipo de evento</option> -->
                                <option value="T" <?php if ($Tipo=='T') {
                                  # code...
                                  echo("selected");
                                } ?> >Público</option>
                                <option value="F" <?php if ($Tipo=='F') {
                                  # code...
                                  echo("selected");
                                } ?>>Privado</option>
                                

                            

                              </select>
                          </div>
                        </div>
                      </div>

                    </div>
                  
                    <div class="row clearfix">

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="descripcion">Descripción</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?php echo $Descripcion; ?>" placeholder="Descripcion del Evento" maxlength="550"required="true">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="fechaInicio">Fecha de Inicio</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="date" id="fechaInicio" name="fechaInicio" class="form-control " value="<?php echo $InicioFecha; ?>" required>
                            
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="fechaFin">Fecha de Fin</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="date" id="fechaFin" name="fechaFinal" class="form-control " value="<?php echo $FinFecha; ?>" required>
                            

                          </div>
                        </div>
                      </div>

                      <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="activo">Estado</label>
                        <div class="form-group">
                          <div class="form-line">
                           <select class="form-control show-tick" id="activo" name="activo" required="true">
                              <option value="1" <?php //if($bitActivo == '1'){echo 'selected';} ?> >Activo</option>
                              <option value="0" <?php //if($bitActivo == '0'){echo 'selected';} ?> >Inactivo</option>                              
                            </select>
                          </div>
                      </div> -->
                      </div>

                      <div class="row clearfix">

                     

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="fechaInicio">Estado de Eventos</label>
                        <div class="form-group">
                          <div class="form-line">
                          <select class="form-control show-tick" id="estadoEvento" name="estadoEvento">
                              <!-- <option value="" selected>Seleccione el Estado <del></del> evento</option> -->
                              <option value="1" <?php
                              if ($Estado==1) {
                                # code...
                                  echo("selected");
                              }
                              ?>>Activo</option>
                              <option value="0" <?php
                              if ($Estado==0) {
                                # code...
                                  echo("selected");
                              }
                              ?>>Inactivo</option>
                              <?php  

                                // if( count($dtConsultarSectorOcupacionalDetalleActivos) > 0 ){
                                //   echo '<optgroup label="'.$dtConsultarSectorOcupacionalDetalleActivos[0]['NombreSectorOcupacional'].'">'; // INICIO OPT
                                //   $id_grupo_inicio = $dtConsultarSectorOcupacionalDetalleActivos[0]['IdSectorOcupacional'];

                                //   foreach ($dtConsultarSectorOcupacionalDetalleActivos as $SectorOcupacionalDetalle) {
                                //     $id_grupo_siguiente = $SectorOcupacionalDetalle['IdSectorOcupacional'];

                                //     if( $id_grupo_siguiente !== $id_grupo_inicio ){
                                //       echo '</optgroup>';
                                //       echo '<optgroup label="'.$SectorOcupacionalDetalle['NombreSectorOcupacional'].'">'; 
                                //       $id_grupo_inicio = $SectorOcupacionalDetalle['IdSectorOcupacional'];
                                //     }

                                //     $selected = "";
                                //     if($SectorOcupacionalDetalle['IdSectorOcupacionalDetalle']==$IdSectorOcupacionalDetalle){ $selected = "selected";}else{$selected = "";}
                                //     echo '<option value="'.$SectorOcupacionalDetalle['IdSectorOcupacionalDetalle'].'" '.$selected.'>'.$SectorOcupacionalDetalle['varNombre'].'</option>';
                                //   }
                                // }

                              ?>

                            </select>
                            

                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="fechaFin">Aforo</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="number" id="aforo" name="aforo" class="form-control" min="1" value="<?php echo $Aforo; ?>" required>
                            

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" hidden>
                        <label for="horaInicio">Hora de Inicio</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="time" id="datetimepicker3" name="horaInicio" class="form-control" value="<?php echo $formated_time; ?>">
                           
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" hidden >
                        <label for="horaFin">Hora de Fin</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="time" id="horaFin" name="horaFinal" class="form-control" value="<?php echo $formated_time_fin; ?>">
                            

                          </div>
                        </div>
                      </div>     

                      <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="banner">Banner</label>
                        <div class="form-group">
                          <div class="form-line">
                          <span class="btn btn-primary btn-file">
                            <input type="file" id="banner" name="banner" value="<?php echo $Banner; ?>" accept=".png, .jpg, .jpeg">
                          </span>

                          </div>
                        </div>
                      </div> -->
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="Modalidad">Modalidad</label>
                        <div class="form-group">
                          <div class="form-line">

                          <select class="form-control" id="modalidadEvento" name="modalidadEvento">
                        
                              <?php  
                              foreach ($dtListarTipoEventos as $key => $value) {
                                # code...
                                $selected="";
                               ?> 
                             
                              
                             <option value= <?php echo('"'.$value['IdTipoEvento'].'"'); if($IdTipoEvento==$value['IdTipoEvento']){echo("selected");}?>  > <?php echo($value['Nombre']);?> </option>
                               
                             <?php  
                              }

                              ?>
                             
                             


                            </select>
                            

                          </div>
                        </div>
                      
                      </div>

                      <?php 
                        $valorEspecificoArray = $_SESSION['usuario']["ses_PermisoValorEspecifico"];
                      ?>

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="Modalidad">Magnitud del Evento</label>
                        <div class="form-group">
                          <div class="form-line">

                            <select class="form-control" id="MagnitudEvento" name="MagnitudEvento" required="true" onchange="fncCambiarSelectDependencias(); return false;">
                              <option value="D" <?php if( $operacion == 'agregar' ){ echo 'selected'; } ?> >Por Dependencia</option>
                              <?php if ( isset($_SESSION['usuario']["ses_PermisoValorEspecifico"]) && trim($valorEspecificoArray[0]) != '' ) { ?>
                                <option value="A" <?php if( $operacion == 'editar' && $dtConsultarEvento[0]["IdPtaDependenciaFijo"] == '' ){ echo 'selected'; } ?> >Por Área o Sector</option>  
                              <?php } ?>           
                            </select>
                            
                          </div>
                        </div>
                      
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="divDependencias" > <!-- id="elementsToOperateOn" -->
                        <label for="Modalidad">Dependencia</label>
                        <div class="form-group">
                          <div class="form-line">

                          <select class="form-control" id="DependenciaEvento" name="depefijo" data-live-search="true" required="true"> <!-- required="true" -->
                            <option value="">Seleccione la Dependencia</option>
                            <?php  


                              foreach ($dtListarPermisosEvento as $key => $value) {
                                # code...
                                $selected="";
                               ?> 
                             
                              
                             <option value= <?php 
                             echo('"'.$value['IdDepe'].'*'.$value['IdPtaDependenciaFijo'].'"'); 
                             if($IdTipoDepe==($value['IdDepe'].'*'.$value['IdPtaDependenciaFijo']))
                             {
                               echo("selected");
                              }
                             
                             ?>  > <?php echo($value['Descripcion']);?> </option>
                               
                             <?php  
                              }

                              ?>
                             


                            </select>
                            
                          </div>
                        </div>
                      
                      </div>
                             

                      <div class="col-lg-12 col-md-123 col-sm-123 col-xs-12" id="divAreasSector" style="display: none;" > <!-- id="elementsToOperateOn" -->
                        <label for="Modalidad">Área o Sector</label>
                        <div class="form-group">
                          <div class="form-line">

                          <select class="form-control" id="AreaSectorEvento" name="depegeneral" data-live-search="true"> <!-- required="true" -->
                            <option value="">Seleccione el Área o Sector</option>
                              <?php if( $valorEspecificoArray[0] == -1 ){  ?>
                                <optgroup label="General">
                                  <option value="-1" <?php if( $dtConsultarEvento[0]["IdDepe"] == -1 ){ echo 'selected'; } ?> >TODA LA UNIVERSIDAD</option>
                                </optgroup>
                              <?php } ?>
                              <?php if( $valorEspecificoArray[0] == -1 || $valorEspecificoArray[0] == 301 ){  ?>
                                <optgroup label="Administrativo">
                                  <?php if( $valorEspecificoArray[0] == -1 || $valorEspecificoArray[0] == 301 ){  ?><option value="301" <?php if( $dtConsultarEvento[0]["IdDepe"] == 301 ){ echo 'selected'; } ?>>RECTORADO</option><?php } ?>
                                </optgroup>
                              <?php } ?>
                              <?php if( $valorEspecificoArray[0] == -1 || ($valorEspecificoArray[0] >= 312 && $valorEspecificoArray[0] <= 317) ){  ?>
                                <optgroup label="Academico">
                                  <?php if( $valorEspecificoArray[0] == -1 || $valorEspecificoArray[0] == 314 ){  ?><option value="314" <?php if( $dtConsultarEvento[0]["IdDepe"] == 314 ){ echo 'selected'; } ?> >FACULTAD DE INGENIERÍA</option><?php } ?>
                                  <?php if( $valorEspecificoArray[0] == -1 || $valorEspecificoArray[0] == 313 ){  ?><option value="313" <?php if( $dtConsultarEvento[0]["IdDepe"] == 313 ){ echo 'selected'; } ?> >FACULTAD DE EDUCACIÓN, CIENCIAS DE LA COMUNICACION Y HUMANIDADES</option><?php } ?>
                                  <?php if( $valorEspecificoArray[0] == -1 || $valorEspecificoArray[0] == 312 ){  ?><option value="312" <?php if( $dtConsultarEvento[0]["IdDepe"] == 312 ){ echo 'selected'; } ?> >FACULTAD DE DERECHO Y CIENCIAS POLÍTICAS</option><?php } ?>
                                  <?php if( $valorEspecificoArray[0] == -1 || $valorEspecificoArray[0] == 315 ){  ?><option value="315" <?php if( $dtConsultarEvento[0]["IdDepe"] == 315 ){ echo 'selected'; } ?> >FACULTAD DE CIENCIAS DE LA SALUD</option><?php } ?>
                                  <?php if( $valorEspecificoArray[0] == -1 || $valorEspecificoArray[0] == 316 ){  ?><option value="316" <?php if( $dtConsultarEvento[0]["IdDepe"] == 316 ){ echo 'selected'; } ?> >FACULTAD DE CIENCIAS EMPRESARIALES</option><?php } ?>
                                  <?php if( $valorEspecificoArray[0] == -1 || $valorEspecificoArray[0] == 317 ){  ?><option value="317" <?php if( $dtConsultarEvento[0]["IdDepe"] == 317 ){ echo 'selected'; } ?> >FACULTAD DE ARQUITECTURA Y URBANISMO</option><?php } ?>
                                </optgroup>
                              <?php } ?>

                            </select>
                            
                          </div>
                        </div>
                   


                      <?php
                        $valorEspecificoArray = $_SESSION['usuario']["ses_PermisoValorEspecifico"];
                              if ( $valorEspecificoArray[0] >299 && $valorEspecificoArray[0] <400 ) {
                                ?>
                                  <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label ></label>
                                                     
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="Depe" class="custom-control-input" value=<?php echo($valorEspecificoArray[0]) ?> id="defaultUnchecked" disabled>
                                        <label class="custom-control-label" for="defaultUnchecked">Por Facultad</label>
                                    </div>
                                  
                                  </div> -->
                                  <?php
                              }
                      ?>
                  
                      <div class="invisible" >

                      <label for="latitude">
                          Lat:
                      </label>
                      <input id="lat" type="text" name="lat" style="color:red" class="d-print-none"  value=<?php echo ($UbicacionLatitud); ?> readonly/>
                      <label for="longitude">
                          Long:
                      </label>
                      <input id="long" type="text" name="long" style="color:red" class="d-print-none" value=<?php echo ($UbicacionLongitud); ?> readonly/>

                      </div>
                      

                    </div>

                  </div>


                    

                    <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <input type="hidden" id="hidden_idempresa" name="hidden_idempresa" value="<?php echo $IdEmpresa; ?>">
                        <button type="submit" class="btn btn-primary btn-block btn-lg m-t-10 waves-effect" <?php //if($operacion == 'agregar'){echo 'onclick="fncValidarRegistroEmpresa(\''.$sex.'\'); return false;"';} ?> >
                          <i class="material-icons"><?php echo $icono_operacion ?></i>
                          <span><?php echo strtoupper($boton_operacion) ?></span>
                        </button>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <button type="button" class="btn btn-danger btn-block btn-lg m-t-10 waves-effect" onclick="fncConfirmarMensaje('../modules/evento.php?sesion=<?php echo $sex; ?>&v=index','Cancelar Operación','Seguro que desea cancelar la operación?','Si!'); return false;">
                          <i class="material-icons">cancel</i>
                          <span>CANCELAR</span>
                        </button>
                      </div>
                    </div>
                    <h6> <span class="label label-danger">*</span> La fecha de Inicio del Evento no puede ser superior a la fecha Fin del Evento</h6> 
                    <div id="map_canvas" class="z-depth-1-half map-container" style="height: 500px">
                    
                    </div>
                 
                    

                
                </div>
                
              </div>
            </div>
          </div>
         

          <script type="text/javascript">


                $(document).ready(function() {
                
                handleStatusChanged();
                fncCambiarSelectDependencias()
                
                });

                function handleStatusChanged() {
                  $('#defaultUnchecked').on('change', function () {
                    toggleStatus();   
                  });
                }

                function toggleStatus() {
                  if ($('#defaultUnchecked').is(':checked')) {
                      $('#elementsToOperateOn :input').attr('disabled', true);
                  } else {
                      $('#elementsToOperateOn :input').removeAttr('disabled');
                  }   
                }





                function fncCambiarSelectDependencias() {
                  var Tipo = $('#MagnitudEvento option:selected').val();
                  // alert(Tipo);

                  if( Tipo == 'D' ){
                    $('#divDependencias').show();
                    $('#divAreasSector').hide();

                    $("#DependenciaEvento").attr('required', 'required');
                    $("#AreaSectorEvento").removeAttr('required');
                  }else{
                    $('#divDependencias').hide();
                    $('#divAreasSector').show();

                    $("#DependenciaEvento").removeAttr('required');
                    $("#AreaSectorEvento").attr('required', 'required');
                  }      
                    
                }







              function inicializarMap() {
                  // Creating map object
                  var lati= <?php echo ($UbicacionLatitud); ?> ;
                  var longi=  <?php echo ($UbicacionLongitud); ?>;
                  var map = new google.maps.Map(document.getElementById('map_canvas'), {
                      zoom: 13,
                      center: new google.maps.LatLng(lati, longi),
                      mapTypeId: google.maps.MapTypeId.ROADMAP
                  });

                  // creates a draggable marker to the given coords
                  var vMarker = new google.maps.Marker({
                      position: new google.maps.LatLng(lati, longi),
                      draggable: true
                  });

                  // adds a listener to the marker
                  // gets the coords when drag event ends
                  // then updates the input with the new coords
                  google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                      $("#lat").val(evt.latLng.lat().toFixed(8));
                      $("#long").val(evt.latLng.lng().toFixed(8));

                      map.panTo(evt.latLng);
                  });

                  // centers the map on markers coords
                  map.setCenter(vMarker.position);

                  // adds the marker on the map
                  vMarker.setMap(map);
              }
      
           
            </script>
        </div>

      </form>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0kIg52zqfcWuszYY428FklRdYQcqLy24&callback"
          async defer>
      </script>
   
    </div>
  </section>

 