
		<br>
		<table width="100%" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th width="10%">Cod. Univ.</th>
          <th width="45%">Nombres / Apellidos</th>
          <th width="10%">DNI</th>
          <th width="5%">Edad</th>
          <th width="10%">G. Académico</th>    
          <th width="5%">Destacado</th>                  
        </tr>
      </thead>
      <tbody>
          
          <?php if (count($dtConsultarEgresados) > 0){ ?>
            <?php foreach ($dtConsultarEgresados as $Egresado) { ?>
              <tr>
                <td align="center"><?php echo $Egresado["CodUniv"]; ?></td>
                <td><?php echo fncCodificarTexto($Egresado["NombresApellidos"]); ?></td>
                <td align="center"><?php echo $Egresado["varDNI"]; ?></td>
                <td align="center"><?php echo $Egresado["intEdad"]; ?></td>
                <td align="center"><?php echo fncCodificarTexto($Egresado["GradoAcademico"]); ?></td>
                <td align="center"><?php if( $Egresado["bitDestacado"] == 1 ){ echo 'Si'; }else{ echo 'No'; } ; ?></td>
              </tr>
            <?php } ?>
          <?php } ?>

      </tbody>
    </table>