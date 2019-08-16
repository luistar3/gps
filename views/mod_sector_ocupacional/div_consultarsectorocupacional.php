          
        <?php $url_parametros_consultar['sesion'] = $sex;  ?>
        <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
          <thead>
            <tr>
              <th width="4%">Nro.</th>
              <th width="36%">Nombre</th>
              <th width="36%">Descripción</th>                            
              <th width="6%">Tipo</th>
              <th width="6%">Estado</th>
              <th width="10%" data-orderable="false">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtConsultarSectorOcupacionales) > 0){ ?>
              <?php foreach ($dtConsultarSectorOcupacionales as $SectorOcupacional) { ?>
                <tr>
                  <td align="center"><?php echo $contador; ?></td>
                  <td><?php echo $SectorOcupacional["varNombre"]; ?></td>
                  <td><?php echo $SectorOcupacional["varDescripcion"]; ?></td>
                  <td align="center">
                    <?php  
                      echo ' ';
                      switch ($SectorOcupacional["varTipo"]) {
                        case 'privado': echo 'Privado'; break;
                        case 'publico': echo 'Público'; break;
                        default: echo ' '; break;
                      }
                    ?>
                  </td>
                  <td align="center">
                    <?php  
                      echo ' ';
                      switch ($SectorOcupacional["bitActivo"]) {
                        case '1': echo '<span class="badge bg-green">Activo</span>'; break;
                        case '0': echo '<span class="badge bg-red">Inactivo</span>'; break;
                        default: echo ' '; break;
                      }
                    ?>
                  </td>
                  <td align="left">
                    <?php 
                      $url_parametros_sector_detalle['sesion'] = $sex;
                      $url_parametros_sector_detalle['v'] = 'index'; 
                      $url_parametros_sector_detalle['so'] = $SectorOcupacional["IdSectorOcupacional"];
                    ?>
                    <!-- <button type="button" class="btn btn-info btn-md m-l-0 m-r-0 waves-effect" data-toggle="modal" data-target="#ModalBuscarAntecedentes" onclick="fncViewAntecedentesLaborales(<?php echo $SectorOcupacional["IdSectorOcupacional"]; ?>); return false;">
                      <i class="material-icons">info</i>
                    </button>       -->           
                    <a href="../modules/sector_ocupacional_detalle.php?<?php echo http_build_query($url_parametros_sector_detalle); ?>" class="btn btn-warning btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Detalles" data-original-title="Detalles">
                      <i class="material-icons">toc</i>
                    </a>
                    <?php 
                      $url_parametros_sector_editar['sesion'] = $sex;
                      $url_parametros_sector_editar['v'] = 'editar'; 
                      $url_parametros_sector_editar['id'] = $SectorOcupacional["IdSectorOcupacional"];
                    ?>
                    <a href="../modules/sector_ocupacional.php?<?php echo http_build_query($url_parametros_sector_editar); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar">
                      <i class="material-icons">edit</i>
                    </a>                            
                  </td>
                </tr>
                <?php $contador++; ?>
                <?php } ?>
            <?php } ?>
            
          </tbody>
        </table>

      