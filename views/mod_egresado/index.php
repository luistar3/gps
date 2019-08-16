
  <section class="content">
    <div class="container-fluid">
      
     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros); ?> "><i class="material-icons">home</i> Inicio</a></li>
        <li class="active"><i class="material-icons">school</i> Egresados</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                EGRESADOS
                <small><strong>Administraci&oacute;n de Egresados</strong></small>
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              <form>
                <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <div class="form-line">
                       <select class="form-control show-tick" id="dependencia" data-live-search="true" onchange="fncViewBuscarEgresadosIndex('<?php echo $sex; ?>'); return false;">
                          <option value="">-- Todos --</option>
                          <?php  foreach ($dtConsultarDependenciasUsuario as $Dependencia) { ?>
                            <option value="<?php echo $Dependencia['IdPtaDependenciaFijo']; ?>" ><?php echo $Dependencia['Sigla']; ?> - <?php echo $Dependencia['Descripcion']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" class="form-control" id="nombre_apellido" placeholder="Nombre y/o Apellido" onkeypress="return fncBuscarKeyPress(event, 'fncViewBuscarEgresadosIndex('<?php echo $sex; ?>');');">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6">
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" class="form-control" id="dni" placeholder="Dni" onkeypress="return fncBuscarKeyPress(event, 'fncViewBuscarEgresadosIndex('<?php echo $sex; ?>');');">
                      </div>
                    </div>
                  </div>                  
                  <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6">
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" class="form-control" id="edad" placeholder="Edad" onkeypress="return fncBuscarKeyPress(event, 'fncViewBuscarEgresadosIndex('<?php echo $sex; ?>');');">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="form-group">
                      <div class="form-line">
                       <select class="form-control show-tick" id="grado_academico" onchange="fncViewBuscarEgresadosIndex('<?php echo $sex; ?>'); return false;">
                          <option value="">-- Todos --</option>
                          <?php  foreach ($dtConsultarGradoAcademicoActivos as $GradoAcademico) { ?>
                            <option value="<?php echo $GradoAcademico['IdGradoAcademico']; ?>" <?php if($GradoAcademico['IdGradoAcademico']==$IdGradoAcademico){ echo 'selected';} ?> ><?php echo $GradoAcademico['varNombre']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="form-group">
                      <div class="form-line">
                        <select class="form-control show-tick" id="sector_ocupacional" data-live-search="true" onchange="fncViewBuscarEgresadosIndex('<?php echo $sex; ?>'); return false;">
                          <option value="">-- Todos --</option>

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

                                echo '<option value="'.$SectorOcupacionalDetalle['IdSectorOcupacionalDetalle'].'">'.$SectorOcupacionalDetalle['varNombre'].'</option>';
                              }
                            }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" align="center">
                    <button type="button" class="btn btn-block btn-primary btn-lg waves-effect" onclick="fncViewBuscarEgresadosIndex('<?php echo $sex; ?>'); return false;">
                      <i class="material-icons">search</i>
                      <span>BUSCAR</span>
                    </button>
                  </div>
                </div>
              </form>
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
                    <a href="../modules/egresado.php?sesion=<?php echo $sex; ?>&v=agregar" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">
                      <i class="material-icons">add_box</i>
                      <span>AGREGAR</span>
                    </a>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                    <button type="button" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect" onclick="fncExportarBusquedaEgresados('<?php echo $sex; ?>');">
                      <i class="material-icons">library_books</i>
                      <span>REPORTE EXCEL</span>
                    </button>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Inline Layout -->

      <!-- Basic Examples -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <div class="table-responsive" id="divBuscarEgresados">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Basic Examples -->

      <!-- Large Size -->
      <div class="modal fade" id="ModalBuscarAntecedentes" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="ModalBuscarAntecedentesLabel">ANTECEDENTES LABORALES</h4>
            </div>
            <div class="modal-body">              
              <div id="divBuscarAntecedentes"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-lg btn-danger waves-effect" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <script type="text/javascript">
    window.onload = function() {
      fncViewBuscarEgresadosIndex('<?php echo $sex; ?>');
    };
  </script>
