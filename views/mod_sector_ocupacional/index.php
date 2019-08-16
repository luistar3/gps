
  <section class="content">
    <div class="container-fluid">
      
     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros); ?>"><i class="material-icons">home</i> Inicio</a></li>
        <li class="active"><i class="material-icons">reorder</i> Sectores Ocupacionales</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                SECTOR OCUPACIONALES
                <small><strong>Administraci&oacute;n de Sectores Ocupacionales</strong></small>
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              
              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <?php $url_parametros_index_sector_ocupacional_detalle = $url_parametros; ?>
                  <?php $url_parametros_index_sector_ocupacional_detalle['v'] = 'agregar'; ?>
                  <a href="../modules/sector_ocupacional.php?<?php echo http_build_query($url_parametros_index_sector_ocupacional_detalle); ?>" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">
                    <i class="material-icons">add_box</i>
                    <span>AGREGAR</span>
                  </a>
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
              <div class="table-responsive" id="divBuscarSectorOcupacional">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Basic Examples -->

      <!-- Large Size -->
      <!-- <div class="modal fade" id="ModalBuscarAntecedentes" tabindex="-1" role="dialog">
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
      </div> -->

    </div>
  </section>
  <script type="text/javascript">
    window.onload = function() {
      fncViewBuscarSectorOcupacionalIndex('<?php echo $sex; ?>');
    };
  </script>
