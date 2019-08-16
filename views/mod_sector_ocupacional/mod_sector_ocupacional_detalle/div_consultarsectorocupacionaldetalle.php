          
      
        <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
          <thead>
            <tr>
              <th width="4%">Nro.</th>
              <th width="38%">Nombre</th>
              <th width="38%">Descripción</th>                            
              <th width="10%">Estado</th>
              <th width="10%" data-orderable="false">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtConsultarSectorOcupacionalDetalles) > 0){ ?>
              <?php foreach ($dtConsultarSectorOcupacionalDetalles as $SectorOcupacionalDetalle) { ?>
                <tr>
                  <td align="center"><?php echo $contador; ?></td>
                  <td><?php echo $SectorOcupacionalDetalle["varNombre"]; ?></td>
                  <td><?php echo $SectorOcupacionalDetalle["varDescripcion"]; ?></td>
                  <td align="center">
                    <?php  
                      echo ' ';
                      switch ($SectorOcupacionalDetalle["bitActivo"]) {
                        case '1': echo '<span class="badge bg-green">Activo</span>'; break;
                        case '0': echo '<span class="badge bg-red">Inactivo</span>'; 
                        default: echo ' '; break;
                      }
                    ?>
                  </td>
                  <td align="left">
                    <a href="../modules/sector_ocupacional_detalle.php?sesion=<?php echo $sex; ?>&v=editar&so=<?php echo  $SectorOcupacionalDetalle["IdSectorOcupacional"]; ?>&id=<?php echo  $SectorOcupacionalDetalle["IdSectorOcupacionalDetalle"]; ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar">
                      <i class="material-icons">edit</i>
                    </a>                            
                  </td>
                </tr>
                <?php $contador++; ?>
                <?php } ?>
            <?php } ?>
            
          </tbody>
        </table>

      