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
                TIPO EVENTOS 
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
              <th width="4%">Nro</th>
              <th width="15%">Título</th>
              <th width="10%">Descripción</th>
              <!-- <th width="10%">Estado</th> -->
         
              <!-- <th width="10%" data-orderable="false">Acciones</th> -->
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtListarTipoEventos) > 0){ ?>
              <?php foreach ($dtListarTipoEventos as $ListarTipoEventos) { ?>
                <tr>
                  <td align="center"><?php echo $contador; ?></td>
                  <td><?php echo $ListarTipoEventos["Nombre"]; ?></td>
                  <td><?php echo $ListarTipoEventos["Descripcion"]; ?></td>
                  <!-- <td align="center"><?php 
                        // if ($ListarTipoEventos["Estado"] == 1  ) {
                        //     # code...
                        //     $toogle='checked';
                           
                        // } else {
                        //     # code...

                        //     $toogle='';
                           
                        // }
                
                  ?>
                  <input type="checkbox" <?php echo($toogle);  ?> data-toggle="toggle" data-on="Activo" data-off="Inactivo">
                  </td> -->
                  
                  <!-- <td align="center"> -->
                    <?php  
                      // echo ' ';
                      // switch ($ListarEventos["Estado"]) {
                      //   case 'A': echo 'Activo'; break;
                      //   case 'I': echo 'Inactivo'; break;
                      //   default: echo ' '; break;
                      // }
                    ?>
                  <!-- </td> -->
                
                  <!-- <td align="center"> -->
                    <?php 
                      // $url_parametros_sector_detalle['sesion'] = $sex;
                      // $url_parametros_sector_detalle['v'] = 'index'; 
                      // $url_parametros_sector_detalle['so'] = $ListarEventos["IdListarEventos"];
                    ?>
                    <!-- <button type="button" class="btn btn-info btn-md m-l-0 m-r-0 waves-effect" data-toggle="modal" data-target="#ModalBuscarAntecedentes" onclick="fncViewAntecedentesLaborales(<?php echo $ListarEventos["IdListarEventos"]; ?>); return false;">
                      <i class="material-icons">info</i>
                    </button>       -->           
                    <!-- <a href="../modules/sector_ocupacional_detalle.php?<?php // http_build_query($url_parametros_sector_detalle); ?>" class="btn btn-warning btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Detalles" data-original-title="Detalles">
                   
                      <span class="glyphicon glyphicon-list-alt" style="margin:auto;"></span>

                    </a> -->
               
                    <!-- <a href="../modules/sector_ocupacional.php?<?php //echo http_build_query($url_parametros_sector_editar); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar">
                      
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>                             -->
                  <!-- </td> -->
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
