
<?php
// ECHO var_dump($_SESSION['mensaje']);
if (isset($_SESSION['mensaje']) && trim($_SESSION['mensaje']["ses_MensajeDescripcion"]) != '' ) {

  
?>


<script>

function fnc_MenesajeInscritos(){
  bootbox.alert({
    size: 'small',
    title: "Mensaje",
    message: "<?php echo($_SESSION['mensaje']["ses_MensajeDescripcion"]); ?> "
    //callback: function(){ /* your callback code */ }
  });
}
 
$( document ).ready(function() {
    fnc_MenesajeInscritos();
    });
  
</script>



<?php
}
unset($_SESSION['mensaje']);
?>

<section class="content">
    <div class="container-fluid">

     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./evento.php?v=eventopPage"><i class="material-icons">home</i>Inicio</a></li>
        <li class="active"><i class="material-icons">people</i> Personas</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                PERSONAS
                <!-- <small><strong>Administraci&oacute;n de Empresas</strong></small> -->
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <?php //$url_parametros_index_empresa = $url_parametros; ?>
                  <?php $url_parametros_index_empresa['v'] = 'agregar'; ?>
                  <a href="../modules/persona.php?<?php echo http_build_query($url_parametros_index_empresa); ?>" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">

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
              <div class="table-responsive" id="divBuscarEmpresa">




              <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="idIndexPersona" class="display" >
          <thead>
            <tr>
              <th width="4%"></th>
              <th width="20%">Nombre</th>
              <th width="10%">Correo</th>
              <th width="10%">Celular</th>
              <th width="1%">Dni</th>



              <th width="8%">Tipo</th>
              <!-- <th width="3%">Estado</th> -->
              <th width="10%" data-orderable="false">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $contador = 1; ?>
            <?php if (count($dtListarPersonas) > 0){ ?>
              <?php foreach ($dtListarPersonas as $ListarPersonas) { ?>
                <tr>
                  <td bgcolor="#C3CBCB" align="center"><?php echo $contador; ?></td>
                  <td ><?php echo $ListarPersonas["Nombre"]; echo(' ');echo ($ListarPersonas["ApePat"].' '.$ListarPersonas["ApeMat"]);?></td>
                  <td><?php echo $ListarPersonas["Correo"]; ?></td>
                  <td><?php echo $ListarPersonas["Celular"]; ?></td>
                  <td><?php echo $ListarPersonas["Dni"]; ?></td>



                  <td><?php echo $ListarPersonas["NombreTipoUsuario"]; ?></td>



                  <td align="center">

                    <!-- <button type="button" class="btn btn-info btn-md m-l-0 m-r-0 waves-effect" data-toggle="modal" data-target="#ModalBuscarAntecedentes" onclick="fncViewAntecedentesLaborales(<?php echo $ListarPersonas["IdListarPersonas"]; ?>); return false;">
                      <i class="material-icons">info</i>
                    </button>       -->

                    <?php
                    $url_parametros_editar['v']="editar";
                    $url_parametros_editar['IdPersona']=base64_encode($ListarPersonas["IdPersona"]);
                    ?>

                    <a href="../modules/persona.php?<?php echo http_build_query($url_parametros_editar); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Modificar" data-original-title="Modificar">

                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                        <?php
                        $url_parametros_carnet['v']  = 'generar';
                        $url_parametros_carnet['IdPersona'] = $ListarPersonas["IdPersona"];
                        $url_parametros_carnet['Nombre']    =  $ListarPersonas["Nombre"];
                        $url_parametros_carnet['Apellido']  = $ListarPersonas["ApePat"]." ".$ListarPersonas["ApeMat"];
                        $url_parametros_carnet['Dni']  =base64_encode( $ListarPersonas["Dni"]);
                        $url_parametros_carnet['TipoPersona']  =$ListarPersonas["IdTipoPersona"];


                        ?>
                    <a href="../modules/persona.php?<?php echo http_build_query($url_parametros_carnet); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Generar Carnet" data-original-title="GENERAR">

                      <span class="glyphicon glyphicon-credit-card"></span>
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
<script>
 $(document).ready( function () {
          $('#idIndexPersona').DataTable(   {
     
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
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5]
                }
            }
            /*, 'print'*/
        ]
    });
      } ); 

</script>