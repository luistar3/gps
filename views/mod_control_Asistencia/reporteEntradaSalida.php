<section class="content">
    <div class="container-fluid">
      
     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <!-- <li><a href="./?<?php// echo http_build_query($url_parametros); ?>"><i class="material-icons">home</i> Inicio</a></li> -->
        <li><a href="./evento.php?v=eventopPage"><i class="material-icons">home</i> Inicio</a></li>
        <li class="active"><i class="material-icons">domain</i> Eventos</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php //fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->


 <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                    <?php if (count($dtListarDetalleEventos)==0) {
                      echo('Ningun Detalle Agregado');
                    }
                    else{
                      echo ( strtoupper($dtListarDetalleEventos[0]['Nombre'] ));
                    }
                     ?>
                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                  </h2>
            </div>

            <div class="body" style="padding-bottom: 0px;">
   
              <div class="row clearfix">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                  <a href="../modules/evento.php?v=index" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect">
                    <i class="material-icons">arrow_back</i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>



      <div class=" clearfix">
        <div class="  col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
          <div class="card">
            <div class="header bg-blue-upt">
              <h6>
                CRONOGRAMA DEL EVENTO
                <!-- <small><strong>Administraci&oacute;n de Empresas</strong></small> -->
              </h6>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              
            <div class="clearfix">
            <div class="bg-success  col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 
<!--  -->

              <table id="example" class="display table" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    
                                    <th align="center" class="text-center">Fecha</th>
                                    <th align="center" class="text-center">Hora de Inicio</th>
                                    <th align="center" class="text-center">Hora de Finalización</th>
                                    <th align="center" class="text-center">Asistencias</th>
                                    <th>Descripcion</th>

                            
                                    
                                
                                </tr>
                            </thead>
                            <tbody>
                            <?php $contador = 1; ?>
               <?php if (count($dtListarDetalleEventos) > 0){ ?>
                 <?php foreach ($dtListarDetalleEventos as $ListarDetalleEventos) { ?>
                <tr>
                  <td align="center" class="text-center"><?php echo $contador; ?></td>
                 
                  <td align="center" class="text-center"><?php echo $ListarDetalleEventos["Fecha"]; ?></td>
                  <td align="center" class="text-center"><?php echo $ListarDetalleEventos["InicioHora"]; ?></td>
                  <td align="center" class="text-center"><?php echo $ListarDetalleEventos["FinHora"]; ?></td>
                  <td align="center" class="text-center"><?php echo $ListarDetalleEventos["Asistencias"]; ?></td>
                  <td><?php echo $ListarDetalleEventos["Comentario"]; ?></td>
                  
                 
               
                </tr>
                    <?php $contador++; ?>
                  <?php } ?>
                <?php } ?>
                              
                            </tbody>
                         
                 </table>








<!--  -->





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




              <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="idReporteAsistencia" class="display" >
          <thead>
            <tr>
              <th width="4%"></th>
              <th width="15%">Nombre</th>
              <th width="15%">DNI</th>
              <th width="10%">Fecha </th>
              <th width="10%" class="table-primary"  >Fecha Asistencia Ingreso</th>
              <th width="10%" class="table-primary" >Fecha Asistencia Salida</th>
              <th width="12%">Etapa Del Evento</th>             
             
              <!-- <th width="3%">Estado</th> -->
             
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtConsultarEntradaSalida) > 0){ ?>
              <?php foreach ($dtConsultarEntradaSalida as $ListarEntradaSalida) { ?>
                <tr>
                  <td align="center"><?php echo $contador; ?></td>
                  <td><?php echo ($ListarEntradaSalida["NombrePersona"].' '.$ListarEntradaSalida["ApePat"].' '.$ListarEntradaSalida["ApeMat"]); ?></td>
                  <td><?php echo $ListarEntradaSalida["Dni"]; ?></td>
                  <td><?php echo $ListarEntradaSalida["Fecha"]; ?></td>
                  <td class="table-info" ><?php echo $ListarEntradaSalida["FechaAsistencia"]; ?></td>
                  <td class="table-info" ><?php echo $ListarEntradaSalida["FechaAsistenciaSalida"]; ?></td>
              

                  <td>De <?php echo $ListarEntradaSalida["Comentario"]; ?></td>
          
              
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
<script>
 $(document).ready( function () {
          $('#idReporteAsistencia').DataTable(   {
     
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'Copiar'
                
            },
            {
                extend: 'csv',
                text: 'CSV'
            },
            {
                extend: 'excel',
                text: 'Excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6 ]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5,6]
                }
            }
            /*, 'print'*/
        ]
    });
      } ); 

</script>