
  <section class="content">
    <div class="container-fluid">
      
     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros); ?>"><i class="material-icons">home</i> Inicio</a></li>
        <li><a href="../modules/sector_ocupacional.php?sesion=<?php echo $sex; ?>&v=index"><i class="material-icons">reorder</i> Sectores Ocupacionales</a></li>
        <li class="active"><i class="material-icons">view_module</i> Detalle Sector Ocupacional</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                <strong><?php echo $dtConsultarSectorOcupacional[0]['varNombre']; ?></strong>
                <small><strong>Detalle de Sectores Ocupacionales</strong></small>
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              
              <div class="row clearfix">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                  <a href="../modules/sector_ocupacional.php?sesion=<?php echo $sex; ?>&v=index" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect">
                    <i class="material-icons">arrow_back</i>
                  </a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <a href="../modules/sector_ocupacional_detalle.php?sesion=<?php echo $sex; ?>&v=agregar&so=<?php echo $dtConsultarSectorOcupacional[0]['IdSectorOcupacional']; ?>" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">
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
              <div class="table-responsive" id="divBuscarSectorOcupacionalDetalle">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Basic Examples -->

    </div>
  </section>
  <script type="text/javascript">
    window.onload = function() {
      fncViewBuscarSectorOcupacionalDetalleIndex('<?php echo $sex; ?>', <?php echo $dtConsultarSectorOcupacional[0]['IdSectorOcupacional']; ?>);
    };
  </script>
