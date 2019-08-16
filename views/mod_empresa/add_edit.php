  <?php $url_parametros_addedit_empresa = $url_parametros; ?>
  <section class="content">
    <div class="container-fluid">
      <?php  

        switch ($operacion) {
          case 'agregar': 
            $titulo_operacion = "Agregar Empresa";
            $subtitulo_operacion = "Agregar Nueva Empresa";
            $icono_operacion = "add_box";
            $boton_operacion = "AGREGAR";
            $parametro_add_edit = "xZ6rQTOHxk";
            $bitActivo  = 1;
            $readonly_ruc = "";
            break;
          case 'editar': 
            $titulo_operacion = "Editar Empresa";
            $subtitulo_operacion = "Editar Empresa Registrada";
            $icono_operacion = "edit";
            $boton_operacion = "MODIFICAR";
            $parametro_add_edit = "uctftGr4Jm";
            $readonly_ruc = "readonly";

            $IdEmpresa                    = $dtConsultarEmpresa[0]['IdEmpresa'];
            $IdSectorOcupacionalDetalle   = $dtConsultarEmpresa[0]['IdSectorOcupacionalDetalle'];
            $varNombre                    = $dtConsultarEmpresa[0]['varNombre'];
            $varRuc                       = $dtConsultarEmpresa[0]['varRuc'];
            $varDireccion                 = $dtConsultarEmpresa[0]['varDireccion'];
            $varTelefono                  = $dtConsultarEmpresa[0]['varTelefono'];
            $bitActivo                    = $dtConsultarEmpresa[0]['bitActivo'];
            
            break;
        }
      ?>
      <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros_addedit_empresa); ?>"><i class="material-icons">home</i> Inicio</a></li>
        <?php $url_parametros_addedit_empresa['v'] = 'index'; ?>
        <li><a href="../modules/empresa.php?<?php echo http_build_query($url_parametros_addedit_empresa); ?>"><i class="material-icons">domain</i> Empresas</a></li>
        <li class="active"><i class="material-icons"><?php echo $icono_operacion ?></i> <?php echo $titulo_operacion ?></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      
      <?php $url_parametros_form_empresa = $url_parametros; ?>
      <?php $url_parametros_form_empresa['p'] = $parametro_add_edit; ?>
      <form id="form_validation" action="../modules/empresa.php?sesion=<?php echo $sex; ?>&p=<?php echo $parametro_add_edit; ?>"  method="POST">
        <div class="demo-masked-input">

          <!-- Inline Layout -->
          <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header bg-blue-upt">
                  <h2>
                    EMPRESAS
                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                  </h2>
                </div>
                <div class="body">

                    <div class="row clearfix">

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="ruc">RUC</label>
                        <div class="form-group">
                          <div class="form-line" id="divVerificarRucEmpresa">
                            <input type="text" id="ruc" name="ruc" class="form-control number" value="<?php echo $varRuc; ?>" maxlength="11" minlength="11" placeholder="RUC" required="true" <?php if($operacion == 'agregar'){echo 'onkeyup="fncVerificarExisteRuc(\''.$sex.'\', this.value); return false;"';} ?> <?php echo $readonly_ruc; ?> >
                          </div>
                        </div>
                        
                      </div>

                      <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" > -->
                        <!-- <button class="btn btn-danger btn-block m-t-15">Ya existe!</button> -->
                      <!-- </div> -->

                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label for="nombre">Nombre</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $varNombre; ?>" placeholder="Nombre del Sector" required="true" maxlength="550">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="sector">Tipo Sector</label>
                        <div class="form-group">
                          <div class="form-line">
                            <select class="form-control show-tick" id="sector" name="sector" required="true">
                              <option value="" selected>Seleccione</option>
                              <?php  

                                if( count($dtConsultarSectorOcupacionalDetalleActivos) > 0 ){
                                  echo '<optgroup label="'.$dtConsultarSectorOcupacionalDetalleActivos[0]['NombreSectorOcupacional'].'">'; // INICIO OPT
                                  $id_grupo_inicio = $dtConsultarSectorOcupacionalDetalleActivos[0]['IdSectorOcupacional'];

                                  foreach ($dtConsultarSectorOcupacionalDetalleActivos as $SectorOcupacionalDetalle) {
                                    $id_grupo_siguiente = $SectorOcupacionalDetalle['IdSectorOcupacional'];

                                    if( $id_grupo_siguiente !== $id_grupo_inicio ){
                                      echo '</optgroup>';
                                      echo '<optgroup label="'.$SectorOcupacionalDetalle['NombreSectorOcupacional'].'">'; 
                                      $id_grupo_inicio = $SectorOcupacionalDetalle['IdSectorOcupacional'];
                                    }

                                    $selected = "";
                                    if($SectorOcupacionalDetalle['IdSectorOcupacionalDetalle']==$IdSectorOcupacionalDetalle){ $selected = "selected";}else{$selected = "";}
                                    echo '<option value="'.$SectorOcupacionalDetalle['IdSectorOcupacionalDetalle'].'" '.$selected.'>'.$SectorOcupacionalDetalle['varNombre'].'</option>';
                                  }
                                }

                              ?>

                            </select>
                          </div>
                        </div>
                      </div>

                    </div>
                  
                    <div class="row clearfix">

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="direccion">Dirección</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $varDireccion; ?>" placeholder="Dirección de la Empresa" maxlength="550">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="telefono">Teléfono</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="telefono" name="telefono" class="form-control number" value="<?php echo $varTelefono; ?>" placeholder="Teléfono">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="activo">Estado</label>
                        <div class="form-group">
                          <div class="form-line">
                           <select class="form-control show-tick" id="activo" name="activo" required="true">
                              <option value="1" <?php if($bitActivo == '1'){echo 'selected';} ?> >Activo</option>
                              <option value="0" <?php if($bitActivo == '0'){echo 'selected';} ?> >Inactivo</option>                              
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <input type="hidden" id="hidden_idempresa" name="hidden_idempresa" value="<?php echo $IdEmpresa; ?>">
                        <button type="submit" class="btn btn-primary btn-block btn-lg m-t-10 waves-effect" <?php if($operacion == 'agregar'){echo 'onclick="fncValidarRegistroEmpresa(\''.$sex.'\'); return false;"';} ?> >
                          <i class="material-icons"><?php echo $icono_operacion ?></i>
                          <span><?php echo strtoupper($boton_operacion) ?></span>
                        </button>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <button type="button" class="btn btn-danger btn-block btn-lg m-t-10 waves-effect" onclick="fncConfirmarMensaje('../modules/empresa.php?sesion=<?php echo $sex; ?>&v=index','Cancelar Operación','Seguro que desea cancelar la operación?','Si!'); return false;">
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
