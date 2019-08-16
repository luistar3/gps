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
                LISTADO DE EVENTO PARA AGREGAR DETALLES
                <!-- <small><strong>Administraci&oacute;n de Empresas</strong></small> -->
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              
              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <?php //$url_parametros_index_empresa = $url_parametros; ?>
                  <?php $url_parametros_index_empresa['v'] = 'agregar'; ?>
                  <a href="../modules/empresa.php?<?php echo http_build_query($url_parametros_index_empresa); ?>" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">
                  
                  <span>-------</span>
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
              <th width="15%">Nombre</th>
           
              <th width="10%">Lugar</th>
            
              <th width="12%">Inicio - Fin</th>             
        
              <!-- <th width="3%">Estado</th> -->
              <th width="10%" data-orderable="false">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtListarEventos) > 0){ ?>
              <?php foreach ($dtListarEventos as $ListarEventos) { ?>
                <tr>
                  <td align="center"><?php echo $contador; ?></td>
                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
               
                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                  
              

                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                 
             
                  
                  <td align="center">
                    <?php 
                      // $url_parametros_sector_detalle['sesion'] = $sex;
                       $url_parametros_detalle['v'] = 'fechas'; 
                       $url_parametros_detalle['id'] = base64_encode($ListarEventos["IdEvento"]);
                       $url_parametros_modificar_control ['v'] = 'editar';
                       $url_parametros_modificar_control ['id'] = base64_encode($ListarEventos["IdEvento"]);
                   
                    ?>
            
                    
                    
                    <a href="../modules/detalle_evento.php?<?php echo http_build_query($url_parametros_detalle); ?>" class="btn btn-warning btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Detalle Fechas" data-original-title="Detalle Fechas">
                      
                      <span class="glyphicon glyphicon-calendar"></span>
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
