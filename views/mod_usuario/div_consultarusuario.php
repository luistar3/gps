          
        <?php $url_parametros_consultar['sesion'] = $sex;  ?>
        <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
          <thead>
            <tr>
              <th width="4%">Nro.</th>
              <th width="15%">Usuario</th>
              <th width="66%">Nombre / Apellido</th>                            
              <th width="5%">Estado</th>
              <th width="10%" data-orderable="false">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtConsultarUsuarios) > 0){ ?>
              <?php foreach ($dtConsultarUsuarios as $Usuario) { ?>
                <tr>
                  <td align="center"><?php echo $contador; ?></td>
                  <td align="center"><?php echo $Usuario["varUsuario"]; ?></td>
                  <td><?php echo $Usuario["varNombres"].' '.$Usuario["varApellidos"]; ?></td>
                  <td align="center">
                    <?php  
                      echo ' ';
                      switch ($Usuario["bitActivo"]) {
                        case '1': echo '<span class="badge bg-green">Activo</span>'; break;
                        case '0': echo '<span class="badge bg-red">Inactivo</span>'; break;
                        default: echo ' '; break;
                      }
                    ?>
                  </td>
                  <td align="left">
                    <?php 
                      $url_parametros_consultar['v'] = 'editar'; 
                      $url_parametros_consultar['id'] = $Usuario["IdUsuario"];
                    ?>
                    <a href="../modules/usuario.php?<?php echo http_build_query($url_parametros_consultar); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar">
                      <i class="material-icons">edit</i>
                    </a>                            
                  </td>
                </tr>
                <?php $contador++; ?>
                <?php } ?>
            <?php } ?>
            
          </tbody>
        </table>

      