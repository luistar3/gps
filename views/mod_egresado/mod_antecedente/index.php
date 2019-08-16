
  <section class="content">
    <div class="container-fluid">
      
     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros); ?>"><i class="material-icons">home</i> Inicio</a></li>
        <li><a href="../modules/egresado.php?sesion=<?php echo $sex; ?>&v=index"><i class="material-icons">school</i> Egresados</a></li>
        <li class="active"><i class="material-icons">business_center</i> Antecedentes</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                <strong><?php echo $dtConsultarEgresado[0]['CodUniv']; ?></strong> - <?php echo $dtConsultarEgresado[0]['NombresApellidos']; ?>
                <small><strong>Antecedentes Laborales</strong></small>
              </h2>
            </div>

            <div class="body" style="padding-bottom: 0px;">
   
              <div class="row clearfix">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                  <a href="../modules/egresado.php?sesion=<?php echo $sex; ?>&v=index" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect">
                    <i class="material-icons">arrow_back</i>
                  </a>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <a href="../modules/antecedente.php?sesion=<?php echo $sex; ?>&v=agregar&eg=<?php echo $get_id_egresado; ?>" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">
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
              <div class="table-responsive">
                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
                    <tr>
                      <th width="2%">Nro.</th>
                      <th width="45%">Nombre Empresa</th>
                      <th width="8%">Tiempo</th>
                      <th width="20%">Puesto</th>
                      <th width="15%">Tipo Contrato</th>                
                      <th width="10%" data-orderable="false">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $contador = 1; ?>
                    <?php $parametro_eliminar_antecedente = "5INVr7Rv6C"; ?>
                    <?php if (count($dtConsultarEgresadoAntecedentes) > 0){ ?>
                      <?php foreach ($dtConsultarEgresadoAntecedentes as $EgresadoAntecedente) { ?>
                        <tr>
                          <td align="center"><?php echo $contador; ?></td>
                          <td><?php echo $EgresadoAntecedente["NombreEmpresa"]; ?></td>
                          <td align="center">
                            <?php echo $EgresadoAntecedente["intTiempoLaboral"]; ?>
                            <?php  
                              echo ' ';
                              switch ($EgresadoAntecedente["varTipoTiempo"]) {
                                case 'd': echo 'día(s)'; break;
                                case 'm': echo 'mes(es)'; break;
                                case 'a': echo 'año(s)'; break;
                                default: echo ' '; break;
                              }
                            ?>
                          </td>
                          <td><?php echo $EgresadoAntecedente["varPuesto"]; ?></td>
                          <td align="center"><?php echo $EgresadoAntecedente["NombreTipoContrato"]; ?></td>
                          <td align="left">
                            <a href="../modules/antecedente.php?sesion=<?php echo $sex; ?>&v=editar&eg=<?php echo  $EgresadoAntecedente["IdEgresado"]; ?>&id=<?php echo  $EgresadoAntecedente["IdEgresadoAntecedente"]; ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="#" class="btn btn-danger btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Eliminar" data-original-title="Eliminar" onclick="fncConfirmarMensaje('../modules/antecedente.php?sesion=<?php echo $sex; ?>&p=<?php echo $parametro_eliminar_antecedente; ?>&eg=<?php echo  $EgresadoAntecedente["IdEgresado"]; ?>&id=<?php echo  $EgresadoAntecedente["IdEgresadoAntecedente"]; ?>','Eliminación de Registro','Seguro que desea eliminar el registro: << <?php echo $EgresadoAntecedente["NombreEmpresa"]; ?> >> ?','Eliminar!'); return false;">
                              <i class="material-icons">delete</i>
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
