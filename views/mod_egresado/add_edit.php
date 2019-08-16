
  <section class="content">
    <div class="container-fluid">
      <?php  

        switch ($operacion) {
          case 'agregar': 
            $titulo_operacion = "Agregar Egresado";
            $subtitulo_operacion = "Agregar Nuevo Egresado";
            $icono_operacion = "add_box";
            $boton_operacion = "AGREGAR";
            $parametro_add_edit = "CEYDy3ZNdH";
            break;
          case 'editar': 
            $titulo_operacion = "Editar Egresado";
            $subtitulo_operacion = "Editar Egresado Registrado";
            $icono_operacion = "edit";
            $boton_operacion = "MODIFICAR";
            $parametro_add_edit = "HZ7C6xjnP5";

            $IdEgresado             = $dtConsultarEgresado[0]['IdEgresado'];
            $CodUniv                = $dtConsultarEgresado[0]['CodUniv'];
            $ItemEst                = $dtConsultarEgresado[0]['ItemEst'];
            $Idsem                  = $dtConsultarEgresado[0]['Idsem'];
            $bitDestacado           = $dtConsultarEgresado[0]['bitDestacado'];
            $datNacimiento          = $dtConsultarEgresado[0]['datNacimiento'];
            $varDNI                 = $dtConsultarEgresado[0]['varDNI'];
            $varDomicilioReal       = $dtConsultarEgresado[0]['varDomicilioReal'];
            $varDomicilioProcesal   = $dtConsultarEgresado[0]['varDomicilioProcesal'];
            $intEdad                = $dtConsultarEgresado[0]['intEdad'];
            $varTelefonoCelular     = $dtConsultarEgresado[0]['varTelefonoCelular'];
            $varTelefonoFijo        = $dtConsultarEgresado[0]['varTelefonoFijo'];
            $varEmail               = $dtConsultarEgresado[0]['varEmail'];
            $datIngresoUniversidad  = $dtConsultarEgresado[0]['datIngresoUniversidad'];
            $datEgresoUniversidad   = $dtConsultarEgresado[0]['datEgresoUniversidad'];
            $IdGradoAcademico       = $dtConsultarEgresado[0]['IdGradoAcademico'];
            $datGradoAcademico      = $dtConsultarEgresado[0]['datGradoAcademico'];
            $IdTituloAcademico      = $dtConsultarEgresado[0]['IdTituloAcademico'];
            $datTitulacion          = $dtConsultarEgresado[0]['datTitulacion'];

            $NombresEgresado        = $dtConsultarEgresado[0]['Nombres'];
            $ApellidosEgresado      = $dtConsultarEgresado[0]['ApellidoPaterno'];
            $NombreSemestre         = $dtConsultarEgresado[0]['Semestre'];

            break;
        }
      ?>
      <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?sesion=<?php echo $sex; ?>"><i class="material-icons">home</i> Inicio</a></li>
        <li><a href="../modules/egresado.php?sesion=<?php echo $sex; ?>&v=index"><i class="material-icons">school</i> Egresados</a></li>
        <li class="active"><i class="material-icons"><?php echo $icono_operacion ?></i> <?php echo $titulo_operacion ?></li>
      </ol>
      <!-- #END# Breadcrumbs -->

      <form id="form_validation" action="../modules/egresado.php?sesion=<?php echo $sex; ?>&p=<?php echo $parametro_add_edit; ?>"  method="POST">
        <div class="demo-masked-input">

          <!-- Inline Layout -->
          <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header bg-blue-upt">
                  <h2>
                    EGRESADOS
                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                  </h2>
                </div>
                <div class="body">

                    <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <label for="info_codigo_universitario">Cod. Universitario</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="info_codigo_universitario" name="info_codigo_universitario" class="form-control" value="<?php echo $CodUniv; ?>" placeholder="Código" readonly="true" required="true">
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                        <label for="info_nombre_egresado">Nombres</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="info_nombre_egresado" name="info_nombre_egresado" class="form-control" value="<?php echo $NombresEgresado; ?>" placeholder="Nombres del egresado" readonly="true">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                        <label for="info_apellido_egresado">Apellidos</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="info_apellido_egresado" name="info_apellido_egresado" class="form-control" value="<?php echo $ApellidosEgresado; ?>" placeholder="Apellidos del egresado" readonly="true">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-8 col-xs-6">
                        <label for="info_semestre_egreso">Semestre Egreso</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="info_semestre_egreso" name="info_semestre_egreso" class="form-control" value="<?php echo $NombreSemestre; ?>" placeholder="Semestre" readonly="true">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12"> 
                        <input type="hidden" id="hidden_idegresado" name="hidden_idegresado" value="<?php echo $IdEgresado; ?>">
                        <input type="hidden" id="hidden_coduniv" name="hidden_coduniv" value="<?php echo $CodUniv; ?>">
                        <input type="hidden" id="hidden_itemest" name="hidden_itemest" value="<?php echo $ItemEst; ?>">
                        <input type="hidden" id="hidden_idsem" name="hidden_idsem" value="<?php echo $Idsem; ?>">
                        <button type="button" <?php if($operacion == "editar"){echo 'disabled="true"';} ?> class="btn btn-primary btn-block btn-lg m-t-10 waves-effect" <?php if($operacion == "agregar"){echo 'data-toggle="modal" data-target="#ModalBuscarEgresado" onclick="fncViewConsultarEgresadoReset(\''.$sex.'\'); return false;"';} ?> >
                          <i class="material-icons">search</i>
                          <span>BUSCAR</span>
                        </button>
                      </div>
                    </div>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- #END# Inline Layout -->

          <!-- Inline Layout -->
          <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header bg-blue-upt">
                  <h2>
                    INFORMACI&Oacute;N ADICIONAL DEL EGRESADO
                  </h2>
                </div>
                <div class="body">

                    <div class="row clearfix">
                      <div class="col-lg-1 col-md-1 col-sm-3 col-xs-4">
                        <label for="destacado">Destacado</label>
                        <div class="form-group">
                          <div class="form-line">
                           <select class="form-control show-tick" id="destacado" name="destacado" required="true">
                              <option value="0" <?php if($bitDestacado == 0){echo 'selected';} ?> >--</option>
                              <option value="1" <?php if($bitDestacado == 1){echo 'selected';} ?> >Si</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4">
                        <label for="dni">DNI</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="dni" name="dni" class="form-control dni" value="<?php echo $varDNI; ?>" placeholder="12345678" required="true">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-1 col-sm-3 col-xs-4">
                        <label for="edad">Edad</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="edad" name="edad" class="form-control number" value="<?php echo $intEdad; ?>" maxlength="2" placeholder="Edad" required="true">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-2 col-sm-3 col-xs-4">
                        <label for="fecha_nacimiento">Nacimiento</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $datNacimiento; ?>" class="datepicker form-control date" placeholder="____/__/__">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-4">
                        <label for="telefono_celular">Teléfono Celular</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="telefono_celular" name="telefono_celular" class="form-control number" value="<?php echo $varTelefonoCelular; ?>" maxlength="12" placeholder="Teléfono Celular">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-4">
                        <label for="telefono_fijo">Teléfono Fijo</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="telefono_fijo" name="telefono_fijo" class="form-control number" value="<?php echo $varTelefonoFijo; ?>" maxlength="10" placeholder="Teléfono Fijo">
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="row clearfix">

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="domicilio_real">Domicilio Real</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="domicilio_real" name="domicilio_real" class="form-control" value="<?php echo $varDomicilioReal; ?>" maxlength="550" placeholder="Domicilio Real">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="domicilio_procesal">Domicilio Procesal</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="domicilio_procesal" name="domicilio_procesal" class="form-control" value="<?php echo $varDomicilioProcesal; ?>" maxlength="550" placeholder="Domicilio Procesal">
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="row clearfix">

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="email">Correo electrónico</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="email" name="email" class="form-control email" value="<?php echo $varEmail; ?>" placeholder="ejemplo@ejemplo.com">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <label for="fecha_ingreso">Ingreso</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="fecha_ingreso" name="fecha_ingreso" class="datepicker form-control date" value="<?php echo $datIngresoUniversidad; ?>" placeholder="____/__/__" required="true"> 
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <label for="fecha_egreso">Egreso</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="fecha_egreso" name="fecha_egreso" class="datepicker form-control date" value="<?php echo $datEgresoUniversidad; ?>" placeholder="____/__/__" required="true">
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="row clearfix">

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <label for="grado_academico">Grado Académico</label>
                        <div class="form-group">
                          <div class="form-line">
                           <select class="form-control show-tick" id="grado_academico" name="grado_academico" required="true">
                              <option value="" selected>Seleccione</option>
                              <?php  foreach ($dtConsultarGradoAcademicoActivos as $GradoAcademico) { ?>
                                <option value="<?php echo $GradoAcademico['IdGradoAcademico']; ?>" <?php if($GradoAcademico['IdGradoAcademico']==$IdGradoAcademico){ echo 'selected';} ?> ><?php echo $GradoAcademico['varNombre']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <label for="fecha_grado_academico">Fecha Obtención Grado</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="fecha_grado_academico" name="fecha_grado_academico" class="datepicker form-control date" value="<?php echo $datGradoAcademico; ?>" placeholder="____/__/__" required="true">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <label for="titulo_academico">Título Académico</label>
                        <div class="form-group">
                          <div class="form-line">
                           <select class="form-control show-tick" id="titulo_academico" name="titulo_academico" required="true">
                              <option value="" selected>Seleccione</option>
                              <?php  foreach ($dtConsultarTituloAcademicoActivos as $TituloAcademico) { ?>
                                <option value="<?php echo $TituloAcademico['IdTituloAcademico']; ?>" <?php if($TituloAcademico['IdTituloAcademico']==$IdTituloAcademico){ echo 'selected';} ?> ><?php echo $TituloAcademico['varNombre']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <label for="fecha_titulo_academico">Fecha Obtención Título</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="fecha_titulo_academico" name="fecha_titulo_academico" class="datepicker form-control date" value="<?php echo $datTitulacion; ?>" placeholder="____/__/__">
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-lg m-t-10 waves-effect">
                          <i class="material-icons"><?php echo $icono_operacion ?></i>
                          <span><?php echo strtoupper($boton_operacion) ?></span>
                        </button>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <button type="button" class="btn btn-danger btn-block btn-lg m-t-10 waves-effect" onclick="fncConfirmarMensaje('../modules/egresado.php?sesion=<?php echo $sex; ?>&v=index','Cancelar Operación','Seguro que desea cancelar la operación?','Si!'); return false;">
                          <i class="material-icons">cancel</i>
                          <span>CANCELAR</span>
                        </button>
                      </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
          <!-- #END# Inline Layout -->

        </div>

      </form>
<?php //echo $_SESSION['usuario']["ses_SISid"] ; ?>
      <?php if ($operacion == "agregar"){  ?>
        <!-- Large Size -->
        <div class="modal fade" id="ModalBuscarEgresado" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="ModalBuscarEgresadoLabel">BÚSQUEDA DE EGRESADOS</h4>
              </div>
              <div class="modal-body">
                
                <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="dependencia">Dependencia</label>
                    <div class="form-group">
                      <div class="form-line">
                        <select class="form-control show-tick" id="dependencia" name="dependencia" data-live-search="true">
                          <!-- <option value="">-- Todos --</option> -->
                          <?php  foreach ($dtConsultarDependenciasUsuario as $Dependencia) { ?>
                            <option value="<?php echo $Dependencia['IdPtaDependenciaFijo']; ?>" ><?php echo $Dependencia['Sigla']; ?> - <?php echo $Dependencia['Descripcion']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
                    <label for="codigo_universitario">C&oacute;digo Universitario</label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" id="codigo_universitario" name="codigo_universitario" class="form-control" placeholder="Código" onkeypress="return fncBuscarKeyPress(event, 'fncViewConsultarEgresado(\'<?php echo $sex; ?>\', 1);');" >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-5 col-xs-7">
                    <label for="nombre_apellido">Nombre y/o Apellido</label>
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" id="nombre_apellido" name="nombre_apellido" class="form-control" placeholder="Nombre y/o Apellido" onkeypress="return fncBuscarKeyPress(event, 'fncViewConsultarEgresado(\'<?php echo $sex; ?>\',1);');">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <button type="button" class="btn btn-primary btn-lg btn-block m-t-10 waves-effect" onclick="fncViewConsultarEgresado(<?php echo $sex; ?>, 1); return false;">BUSCAR</button>
                  </div>
                </div>
                <br>

                <div id="divConsultarEgresado"></div>              

              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary waves-effect">SAVE CHANGES</button> -->
                <button type="button" class="btn btn-lg btn-danger waves-effect" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </section>
