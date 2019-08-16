	
		<table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <thead>
        <tr>
          <th width="4%">Nro.</th>
          <th width="8%">Cod. Univ.</th>
          <th width="43%">Nombres / Apellidos</th>
          <th width="10%">DNI</th>
          <th width="5%">Edad</th>
          <th width="10%">G. Académico</th>    
          <th width="5%">Destacado</th>                  
          <th width="15%" data-orderable="false">Acciones</th>
        </tr>
      </thead>
      <tbody>
          <?php $contador = 1; ?>
          <?php if (count($dtConsultarEgresados) > 0){ ?>
            <?php foreach ($dtConsultarEgresados as $Egresado) { ?>
              <tr>
                <td align="center"><?php echo $contador; ?></td>
                <td align="center"><?php echo $Egresado["CodUniv"]; ?></td>
                <td><?php echo $Egresado["NombresApellidos"]; ?></td>
                <td align="center"><?php echo $Egresado["varDNI"]; ?></td>
                <td align="center"><?php echo $Egresado["intEdad"]; ?></td>
                <td align="center"><?php echo $Egresado["GradoAcademico"]; ?></td>
                <td align="center"><?php if( $Egresado["bitDestacado"] == 1 ){ echo '<i class="material-icons">star</i>'; } ; ?></td>
                <td align="left">
              		<button type="button" class="btn btn-info btn-md m-l-0 m-r-0 waves-effect" data-toggle="modal" data-target="#ModalBuscarAntecedentes" onclick="fncViewAntecedentesLaborales('<?php echo $sex; ?>', <?php echo $Egresado["IdEgresado"]; ?>); return false;">
                    <i class="material-icons">info</i>
                  </button>                	
                  <a href="../modules/antecedente.php?sesion=<?php echo $sex; ?>&v=index&eg=<?php echo  $Egresado["IdEgresado"]; ?>" class="btn btn-warning btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Antecedentes Laborales" data-original-title="Antecedentes Laborales">
                    <i class="material-icons">business_center</i>
                  </a>
                  <a href="../modules/egresado.php?sesion=<?php echo $sex; ?>&v=editar&id=<?php echo  $Egresado["IdEgresado"]; ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar">
                    <i class="material-icons">edit</i>
                  </a>                            
                </td>
              </tr>
              <?php $contador++; ?>
            <?php } ?>
          <?php } ?>

      </tbody>
    </table>

    