          
          <div class="row clearfix" style="max-height: 350px; overflow-y: auto;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

              <table width="100%" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th width="3%">#</th>
                    <th width="10%">Cod. Univ.</th>
                    <th width="40%">Nombres / Apellidos</th>                            
                    <th class="hidden-xs" width="5%">DNI</th>
                    <th class="hidden-xs" width="10%">Semestre Egreso</th>
                    <th width="25%">Dependencia</th>
                    <th width="7%">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $contador = 1; ?>
                  <?php if (count($dtConsultarEgresados) > 0){ ?>
                    <?php foreach ($dtConsultarEgresados as $Egresado) { ?>
                      <tr>
                        <td align="center"><?php echo $contador; ?></td>
                        <td><?php echo $Egresado["CodUniv"]; ?></td>
                        <td><?php echo $Egresado["NombreCompleto"]; ?></td>
                        <td class="hidden-xs"><?php echo $Egresado["NumeroDocumento"]; ?></td>
                        <td class="hidden-xs"><?php echo $Egresado["Semestre"]; ?></td>
                        <td><?php echo $Egresado["NombreDependencia"]; ?></td>
                        <?php if ($Egresado["ValidadorEgresado"] == 0){ ?>
                          <td align="left">
                            <button type="button" class="btn btn-primary btn-sm m-l-0 m-r-0 waves-effect" onclick="fncAsignarBusquedaEgresado('<?php echo $sex; ?>', <?php echo $Egresado["CodUniv"]; ?>, <?php echo $Egresado["ItemEst"]; ?>, <?php echo $Egresado["IdSem"]; ?>); return false;">
                              <i class="material-icons">launch</i>
                              <span>Asignar</span>
                            </button>
                          </td>
                          <?php }else{ ?>
                            <td align="center"><h4><span class="label label-warning">Asignado</span></h4></td>
                          <?php } ?>
                      </tr>
                      <?php $contador++; ?>
                      <?php } ?>
                  <?php }else{ ?>
                    <tr>
                      <td colspan="6" align="center">No existen registros de búsqueda</td>
                    </tr>
                  <?php } ?>
                  
                </tbody>
              </table>

            </div>
          </div>