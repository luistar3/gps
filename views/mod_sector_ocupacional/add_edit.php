  <?php $url_parametros_addedit_sector_ocupacional = $url_parametros; ?>
  <section class="content">
    <div class="container-fluid">
      <?php  

        switch ($operacion) {
          case 'agregar': 
            $titulo_operacion = "Agregar Sector Ocupacional";
            $subtitulo_operacion = "Agregar Nuevo Sector Ocupacional";
            $icono_operacion = "add_box";
            $boton_operacion = "AGREGAR";
            $parametro_add_edit = "q6QmtYfGNx";
            $bitActivo  = 1;
            break;
          case 'editar': 
            $titulo_operacion = "Editar Sector Ocupacional";
            $subtitulo_operacion = "Editar Sector Ocupacional Registrado";
            $icono_operacion = "edit";
            $boton_operacion = "MODIFICAR";
            $parametro_add_edit = "AjmyJwHUah";

            $IdSectorOcupacional    = $dtConsultarSectorOcupacional[0]['IdSectorOcupacional'];
            $varNombre              = $dtConsultarSectorOcupacional[0]['varNombre'];
            $varDescripcion         = $dtConsultarSectorOcupacional[0]['varDescripcion'];
            $varTipo                = $dtConsultarSectorOcupacional[0]['varTipo'];
            $bitActivo              = $dtConsultarSectorOcupacional[0]['bitActivo'];
            
            break;
        }
      ?>
      <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros_addedit_sector_ocupacional); ?>"><i class="material-icons">home</i> Inicio</a></li>
        <?php $url_parametros_addedit_sector_ocupacional['v'] = 'index'; ?>
        <li><a href="../modules/sector_ocupacional.php?<?php echo http_build_query($url_parametros_addedit_sector_ocupacional); ?>"><i class="material-icons">reorder</i> Sectores Ocupacionales</a></li>
        <li class="active"><i class="material-icons"><?php echo $icono_operacion ?></i> <?php echo $titulo_operacion ?></li>
      </ol>
      <!-- #END# Breadcrumbs -->

      <?php $url_parametros_form_sector_ocupacional = $url_parametros; ?>
      <?php $url_parametros_form_sector_ocupacional['p'] = $parametro_add_edit; ?>
      <form id="form_validation" action="../modules/sector_ocupacional.php?sesion=<?php echo $sex; ?>&p=<?php echo $parametro_add_edit; ?>"  method="POST">
        <div class="demo-masked-input">

          <!-- Inline Layout -->
          <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header bg-blue-upt">
                  <h2>
                    SECTOR OCUPACIONALES
                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                  </h2>
                </div>
                <div class="body">

                    <div class="row clearfix">

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="nombre">Nombre</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $varNombre; ?>" placeholder="Nombre del Sector" required="true" maxlength="550">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="tipo">Tipo Sector</label>
                        <div class="form-group">
                          <div class="form-line">
                           <select class="form-control show-tick" id="tipo" name="tipo" required="true">
                              <option value="privado" <?php if($varTipo == 'privado'){echo 'selected';} ?> >Privado</option>
                              <option value="publico" <?php if($varTipo == 'publico'){echo 'selected';} ?> >Público</option>
                            </select>
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

                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="descripcion">Descripcion</label>
                        <div class="form-group">
                          <div class="form-line">
                            <textarea id="descripcion" name="descripcion" rows="5" class="form-control no-resize" placeholder="Descripcion del Sector" maxlength="650"><?php echo $varDescripcion; ?></textarea>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <input type="hidden" id="hidden_idsectorocupacional" name="hidden_idsectorocupacional" value="<?php echo $IdSectorOcupacional; ?>">
                        <button type="submit" class="btn btn-primary btn-block btn-lg m-t-10 waves-effect">
                          <i class="material-icons"><?php echo $icono_operacion ?></i>
                          <span><?php echo strtoupper($boton_operacion) ?></span>
                        </button>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <button type="button" class="btn btn-danger btn-block btn-lg m-t-10 waves-effect" onclick="fncConfirmarMensaje('../modules/sector_ocupacional.php?sesion=<?php echo $sex; ?>&v=index','Cancelar Operación','Seguro que desea cancelar la operación?','Si!'); return false;">
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
