
  <section class="content">
    <div class="container-fluid">
      <?php  

        switch ($operacion) {
          case 'agregar': 
            $titulo_operacion = "Agregar Antecedente Laboral";
            $subtitulo_operacion = "Agregar Nuevo Antecedente Laboral";
            $icono_operacion = "add_box";
            $boton_operacion = "AGREGAR";
            $parametro_add_edit = "XS4StNyoTl";

            $IdEgresado             = $get_id_egresado;

            break;
          case 'editar': 
            $titulo_operacion = "Editar Antecedente Laboral";
            $subtitulo_operacion = "Editar Antecedente Laboral Registrado";
            $icono_operacion = "edit";
            $boton_operacion = "MODIFICAR";
            $parametro_add_edit = "sVZbh6sPhN";

            $IdEgresadoAntecedente  = $dtConsultarEgresadoAntecedente[0]['IdEgresadoAntecedente'];
            $IdEgresado             = $dtConsultarEgresadoAntecedente[0]['IdEgresado'];
            $IdEmpresa              = $dtConsultarEgresadoAntecedente[0]['IdEmpresa'];
            $IdTipoContrato         = $dtConsultarEgresadoAntecedente[0]['IdTipoContrato'];
            $intTiempoLaboral       = $dtConsultarEgresadoAntecedente[0]['intTiempoLaboral'];
            $varTipoTiempo          = $dtConsultarEgresadoAntecedente[0]['varTipoTiempo'];
            $varPuesto              = $dtConsultarEgresadoAntecedente[0]['varPuesto'];

            break;
        }
      ?>
      <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros); ?>"><i class="material-icons">home</i> Inicio</a></li>
        <li><a href="../modules/egresado.php?sesion=<?php echo $sex; ?>&v=index"><i class="material-icons">school</i> Egresados</a></li>
        <li><a href="../modules/antecedente.php?sesion=<?php echo $sex; ?>&v=index&eg=<?php echo $get_id_egresado; ?>"><i class="material-icons">business_center</i> Antecedentes</a></li>
        <li class="active"><i class="material-icons"><?php echo $icono_operacion ?></i> <?php echo $titulo_operacion ?></li>
      </ol>
      <!-- #END# Breadcrumbs -->

      <form id="form_validation" action="../modules/antecedente.php?sesion=<?php echo $sex; ?>&p=<?php echo $parametro_add_edit; ?>"  method="POST">
        <div class="demo-masked-input">

          <!-- Inline Layout -->
          <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header bg-blue-upt">
                  <h2>
                    <strong><?php echo $dtConsultarEgresado[0]['CodUniv']; ?></strong> - <?php echo $dtConsultarEgresado[0]['NombresApellidos']; ?>
                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                  </h2>
                </div>
                <div class="body">

                  <div class="row clearfix">
                    <div class="col-lg-6 col-md-1 col-sm-3 col-xs-4">
                      <label for="empresa">Empresa</label>
                      <div class="form-group">
                        <div class="form-line">
                         <select class="form-control show-tick" id="empresa" name="empresa" required="true" data-live-search="true">
                            <option value="" selected>Seleccione</option>
                            <?php  foreach ($dtConsultarEmpresaActivos as $Empresa) { ?>
                              <option value="<?php echo $Empresa['IdEmpresa']; ?>" <?php if($Empresa['IdEmpresa']==$IdEmpresa){ echo 'selected';} ?> ><?php echo $Empresa['varNombre']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-1 col-sm-3 col-xs-4">
                      <label for="tiempo">Tiempo</label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" id="tiempo" name="tiempo" class="form-control number" value="<?php echo $intTiempoLaboral; ?>" maxlength="4" placeholder="Tiempo" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-1 col-sm-3 col-xs-4">
                      <label for="tipo_tiempo">Tipo Tiempo</label>
                      <div class="form-group">
                        <div class="form-line">
                         <select class="form-control show-tick" id="tipo_tiempo" name="tipo_tiempo" required="true">
                            <option value="" selected>Seleccione</option>
                            <option value="d" <?php if($varTipoTiempo == 'd'){echo 'selected';} ?> >Día(s)</option>
                            <option value="m" <?php if($varTipoTiempo == 'm'){echo 'selected';} ?> >Mes(es)</option>
                            <option value="a" <?php if($varTipoTiempo == 'a'){echo 'selected';} ?> >Año(s)</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <label for="puesto">Puesto Laboral</label>
                      <div class="form-group">
                        <div class="form-line">
                          <input type="text" id="puesto" name="puesto" class="form-control" value="<?php echo $varPuesto; ?>" maxlength="550" placeholder="Puesto Laboral" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-1 col-sm-3 col-xs-4">
                      <label for="tipo_contrato">Tipo Contrato</label>
                      <div class="form-group">
                        <div class="form-line">
                         <select class="form-control show-tick" id="tipo_contrato" name="tipo_contrato" required="true">
                            <option value="" selected>Seleccione</option>
                            <?php  foreach ($dtConsultarTipoContratoActivos as $TipoContrato) { ?>
                              <option value="<?php echo $TipoContrato['IdTipoContrato']; ?>" <?php if($TipoContrato['IdTipoContrato']==$IdTipoContrato){ echo 'selected';} ?> ><?php echo $TipoContrato['varNombre']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                      <input type="hidden" id="hidden_idegresadoantecedente" name="hidden_idegresadoantecedente" value="<?php echo $IdEgresadoAntecedente; ?>">
                      <input type="hidden" id="hidden_idegresado" name="hidden_idegresado" value="<?php echo $IdEgresado; ?>">

                      <button type="submit" class="btn btn-primary btn-block btn-lg m-t-10 waves-effect">
                        <i class="material-icons"><?php echo $icono_operacion ?></i>
                        <span><?php echo strtoupper($boton_operacion) ?></span>
                      </button>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                      <button type="button" class="btn btn-danger btn-block btn-lg m-t-10 waves-effect" onclick="fncConfirmarMensaje('../modules/antecedente.php?sesion=<?php echo $sex; ?>&v=index&eg=<?php echo $get_id_egresado; ?>','Cancelar Operación','Seguro que desea cancelar la operación?','Si!'); return false;">
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

    </div>
  </section>
