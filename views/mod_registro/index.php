<section class="content">
    <div class="container-fluid">
      
     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./evento.php?v=eventopPage"><i class="material-icons">register</i>Inicio</a></li>
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
                <!-- REGISTRO DE PERSONAS INSCRITAS A EVENTOS -->
                <!-- <small><strong>Administraci&oacute;n de Empresas</strong></small> -->

                INSCRIPCIONES A EVENTOS
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              
              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                <?php 
                        $url_parametros_carnet['v']  = 'generar';
                        $url_parametros_carnet['IdPersona'] = $_SESSION['usuario']["ses_DatosPersonaID"];
                        $url_parametros_carnet['Nombre']    =  $_SESSION['usuario']["ses_DatosPersonaNombre"];
                        $url_parametros_carnet['Apellido']  = $_SESSION['usuario']["ses_DatosPersonaApellido"];
                        $url_parametros_carnet['Dni']  =base64_encode( $_SESSION['usuario']["ses_DatosPersonaDNI"]);
                        $url_parametros_carnet['TipoPersona']  = $_SESSION['usuario']["ses_DatosPersonaTipo"];
                        $url_parametros_carnet['restric']  = "I";

                        
                        
                        ?>
                    <a href="../modules/persona.php?<?php echo http_build_query($url_parametros_carnet); ?>" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Generar Carnet" data-original-title="GENERAR">
                      
                      <span class="glyphicon glyphicon-credit-card"></span>
                      <span>GENERAR CARNET</span>
                    </a>   
                    <!-- <a href="../modules/evento.php?v=eventopPage" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Generar Carnet" data-original-title="GENERAR">
                   
                      <span class="glyphicon glyphicon-credit-card"></span>
                      <span>Inicio</span>
                    </a>  -->
                    
                  
                  
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
              <th width="3%"></th>
              <th width="15%">Nombre</th>
              <th width="10%">Inicio - Fin Del Evento</th>
              <th width="20%">Nombre del evento</th>
              <th width="20%">Lugar del Evento</th>
              <!-- <th width="12%">Fecha</th>              -->
              
              <th width="5%">Estado de la inscripción</th>
                                      
              <th width="5%" class="no-print">Publico/Privado</th>
              <!-- <th width="3%">Estado</th> -->
              <!-- <th width="10%" data-orderable="false">Acciones</th> -->
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtListarRegistros) > 0){ ?>
              <?php foreach ($dtListarRegistros as $ListarRegistros) { ?>
                <tr>
                  <td align="center"><?php echo $contador; ?></td>
                  <td><?php echo $ListarRegistros["Nombre"]; echo (' '); echo ($ListarRegistros["Apellido"]); ?></td>
                  <td> <span class="label label-warning"><?php echo $ListarRegistros["InicioFecha"];?></span> - <span class="label label-primary"><?php  echo($ListarRegistros["FinFecha"]);?></span></td>
                  <td><?php echo $ListarRegistros["NombreEvento"]; ?></td>
                  <td><?php echo $ListarRegistros["Lugar"]; ?></td>
                  <!-- <td><?php //echo $ListarRegistros["InicioFecha"]; ?></td> -->
                 
              

                  
                  <td>
                  <?php 
                  
                  if ($ListarRegistros["EstadoRegistro"]==1) {
                    # code...
                      echo ("Activo");
                  } else {
                      echo ("Inactivo");
                  }
                  
                  
                  ?></td>
                  <td align="center"><?php 
                        if ($ListarRegistros["Tipo"] == 'T'  ) {
                            # code...
                            echo("Publico");
                        } else {
                            # code...

                            echo ("Privado");
                        }
                
                  ?>
                  
                  </td>
                  <!-- <td align="center"> -->
                    <?php  
                      // echo ' ';
                      // switch ($ListarRegistros["Estado"]) {
                      //   case 'A': echo 'Activo'; break;
                      //   case 'I': echo 'Inactivo'; break;
                      //   default: echo ' '; break;
                      // }
                    ?>
                  <!-- </td> -->
                
                  <!-- <td align="center">
          
                    <a href="../modules/sector_ocupacional_detalle.php?<?php // http_build_query($url_parametros_sector_detalle); ?>" class="btn btn-warning btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Detalles" data-original-title="Detalles">
                   
                      <span class="glyphicon glyphicon-list-alt" ></span>

                    </a>
               
                    <a href="../modules/sector_ocupacional.php?<?php //echo http_build_query($url_parametros_sector_editar); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar">
                      
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>                            
                  </td> -->
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
