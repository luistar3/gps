
  <section class="content">
    <div class="container-fluid">
      
     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros); ?>"><i class="material-icons">home</i> Inicio</a></li>
        <li class="active"><i class="material-icons">domain</i> Empresas</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                EMPRESAS
                <small><strong>Administraci&oacute;n de Empresas</strong></small>
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              
              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <?php $url_parametros_index_empresa = $url_parametros; ?>
                  <?php $url_parametros_index_empresa['v'] = 'agregar'; ?>
                  <a href="../modules/empresa.php?<?php echo http_build_query($url_parametros_index_empresa); ?>" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">
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
              <div class="table-responsive" id="divBuscarEmpresa">
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
      fncViewBuscarEmpresaIndex('<?php echo $sex; ?>');
    };
  </script>
