
	<div class="table-responsive">
    <table width="100%" class="table table-bordered table-striped table-hover js-antecedentes dataTable">
      <thead>
        <tr>
          <th width="4%">Nro.</th>
          <th width="42%">Nombre Empresa</th>
          <th width="8%">Tiempo</th>
          <th width="20%">Puesto</th>
          <th width="15%">Tipo Contrato</th>                
        </tr>
      </thead>
      <tbody>
        <?php $contador = 1; ?>
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
            </tr>
            <?php $contador++; ?>
          <?php } ?>
        <?php } ?>

      </tbody>
    </table>
  </div>