<section class="content">
    <div class="container-fluid">
      
     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros); ?>"><i class="material-icons">register</i>Inicio</a></li>
        <li class="active"><i class="material-icons">domain</i>Registro</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                REGISTRO DE PERSONAS PARA LOS EVENTOS
                <!-- <small><strong>Administraci&oacute;n de Empresas</strong></small> -->
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              
              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <?php //$url_parametros_index_empresa = $url_parametros; ?>
                  <?php $url_parametros_index_empresa['v'] = 'agregar'; ?>
                  <a href="../modules/empresa.php?<?php echo http_build_query($url_parametros_index_empresa); ?>" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">
                  
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




              <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_id" class="display" >
          <thead>
            <tr>
              <th width="4%"></th>
              <th width="15%">Nombre </th>
              <th width="10%">Descripcion</th>
              
              <!-- <th width="3%">Estado</th> -->
              <th width="10%" data-orderable="false">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtListaEventosParaRegistro) > 0){ ?>
              <?php foreach ($dtListaEventosParaRegistro as $ListaEventosParaRegistro) { ?>
                <tr>
                  <td align="center"><?php echo $contador; ?></td>
                  <td><?php echo $ListaEventosParaRegistro["Nombre"]; echo (' ');?></td>
                  <td><?php echo $ListaEventosParaRegistro["Descripcion"]; echo (" al ");  ?></td>
                 
                
                  <td align="center">
                    <?php 
                      // $url_parametros_sector_detalle['sesion'] = $sex;
                      // $url_parametros_sector_detalle['v'] = 'index'; 
                      // $url_parametros_sector_detalle['so'] = $ListarRegistros["IdListarEventos"];
                        $url_parametros['v'] = "registrarEventoSelect";
                        $url_parametros['IdEvento'] = $ListaEventosParaRegistro["IdEvento"];
                        $url_parametros['Nombre'] = $ListaEventosParaRegistro["Nombre"];
                        $url_parametros['Lugar'] = $ListaEventosParaRegistro["Lugar"];
                        $url_parametros['InicioFecha'] = $ListaEventosParaRegistro["InicioFecha"];
                    
                    ?>
                    <!-- <button type="button" class="btn btn-info btn-md m-l-0 m-r-0 waves-effect" data-toggle="modal" data-target="#ModalBuscarAntecedentes" onclick="fncViewAntecedentesLaborales(<?php echo $ListarRegistros["IdListarEventos"]; ?>); return false;">
                      <i class="material-icons">info</i>
                    </button>       -->           
                   
               
                    <a href="../modules/registro.php?<?php echo http_build_query($url_parametros); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="registra" data-original-title="Modificar">
                      
                      <span class="glyphicon glyphicon-th-list"></span>
                    </a>                            
                  </td>
                </tr>
                <?php $contador++; ?>
                <?php } ?>
            <?php } ?>
            
          </tbody>
        </table>



              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- #END# Basic Examples -->

      


    </div>
  </section>
