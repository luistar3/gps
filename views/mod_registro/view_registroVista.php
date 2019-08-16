<section class="content">
    <div class="container-fluid">

     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros); ?>"><i class="material-icons">register</i>Inicio</a></li>
        <li class="active"><i class="material-icons">domain</i>Registro</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                REGISTRO DE PERSONAS PARA LOS EVENTOS
                <!-- <small><strong>Administraci&oacute;n de Empresas</strong></small> -->
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">

              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <?php //$url_parametros_index_empresa = $url_parametros; ?>
                  <?php $url_parametros_index_empresa['v'] = 'agregar'; ?>
                  <a href="#" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect" onclick="fncInscribirPersonasExcel(); return false;" id="btnInscribir" >
                    <span>INSCRIBIR</span>
                    <div id="p" style="width:400px;"></div>
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
              <div class="table-responsive" id="divBuscarEmpresa" style="overflow-y: auto; height: 600px;">
             <?php
             if ($IdEvento=="0" ) {
              $parametro_add_edit = 'UkUELwv6kL';
             }else {
              $parametro_add_edit = 'QDrthty';
             }
    
             

             ?>
 <form id="form_validation_inscribir" action="#" onsubmit="return false;"  method="POST" >

    <!-- <form id="form_validation_inscribir" action="../modules/Registro.php?p=<?php //echo $parametro_add_edit; ?>"  method="POST"> -->


<input type="text" value="<?php echo $parametro_add_edit; ?>" id='p' name="p" hidden>
 <input type="text" value="<?php echo(base64_encode($IdEvento)); ?>" id="idEvento" name="IdEvento" hidden>
 <input type="text" value="<?php echo($parametro_add_edit); ?>"  id="param" name="param" hidden >


              <TABLE ID="tblPets" border="1" class="table table-bordered  table-hover js-basic-example dataTable">
              <thead>
              <TR class="bg-blue-upt" style="color: white;">
                <TH>N</TH>
                <TH WIDTH="20%">DNI</TH>
                <TH WIDTH="20%">Nombre</TH>
                <TH WIDTH="20%">Apellido Paterno</TH>
                <TH WIDTH="20%">Apellido Materno</TH>
                <TH WIDTH="20%">Estamento</TH>
                <TH WIDTH="20%">Inicio Contrato</TH>
                <TH WIDTH="20%">Fin Contrato</TH>
                <TH WIDTH="20%">Dependencia</TH>
                <TH WIDTH="20%">Unidad Organica</TH>
                <TH WIDTH="20%">Cargo</TH>
                <TH WIDTH="20%">DependenciaCargo</TH>



                <TH WIDTH="20% ">Correo</TH>

                <TH WIDTH="20% ">Num. Telf.</TH>
                <TH WIDTH="20% ">Dependencia Sistema</TH>
                <TH WIDTH="20% ">Modificar</TH>
                <TH WIDTH="20% ">Acción</TH>
                <!-- <TD ><INPUT TYPE="Button" onClick="addRow('tblPets')" VALUE="Add Row"></TD> -->
              </TR>
              </thead>
              <tbody>
              <?php $contador = 1; ?>
            <?php
            $existeEnElEvento=0;
            $existeEnElSistema=0;
            ?>
              <?php foreach ($lista as $ListarPersonas) { ?>
                <tr  <?php if($ListarPersonas["activo"]){echo('class="bg-warning"'); $existeEnElSistema = 1; }else {echo('class=""');} ?> > <!-- si la persona ya existe en el sistema -->
                  <td


                    <?php
                    if($ListarPersonas["existe"]==1){

                        echo('bgcolor="#a3d4b8"');
                        $existeEnElEvento = 1;

                    }

                    ?>


                    align="center" class="border border-dark" ><?php echo $contador; ?>


                    <input type="hidden" name="existeRegistradoEnElEvento[]" id="input" class="form-control" value="<?php echo $existeEnElEvento; ?>">
                    <input type="hidden" name="existeRegistradoEnElSistema[]" id="input" class="form-control" value="<?php echo $existeEnElSistema ;?>">

                    </td>
                  <td >
                   <input style="width: 80px;" type="text" name="dni[]" id="" readonly value=<?php echo $ListarPersonas["dni"]; ?>> <span class="text-danger" style="float: right">(*)</span>




                   </td>
                  <td> <textarea style="width: 140px;"  name="nombre[]" id="" ><?php echo $ListarPersonas["nombre"]; ?> </textarea> <span class="text-danger" style="float: right">(*)</span> </td>
                  <td> <textarea  name="apellidoPat[]" id="" ><?php echo $ListarPersonas["apellidoPat"]; ?> </textarea> <span class="text-danger" style="float: right">(*)</span> </td>
                  <td> <textarea  name="apellidoMat[]" id="" ><?php echo $ListarPersonas["apellidoMat"]; ?></textarea> </td>
                  <td> <textarea  name="estamentoex[]" id=""> <?php echo $ListarPersonas["estamentoex"]; ?> </textarea> </td>
                  <td> <input type="date" name="fechaInicioContrato[]" id="" class="form-control"value=<?php echo $ListarPersonas["fechaInicioContrato"]; ?>> <span class="text-danger" style="float: right">(*)</span> </td>
                  <td> <input type="date" name="fechaFinContrato[]" id="" class="form-control" value=<?php echo $ListarPersonas["fechaFinContrato"]; ?>> <span class="text-danger" style="float: right">(*)</span> </td>
                  <td> <textarea name="dependencia[]" ><?php echo $ListarPersonas["dependencia"]; ?></textarea> </td>
                  <td> <textarea  name="unidadOrganica[]"  > <?php echo $ListarPersonas["unidadOrganica"]; ?></textarea> </td>
                  <td> <textarea name="cargo[]" > <?php echo $ListarPersonas["cargo"]; ?> </textarea> </td>
                  <td> <textarea  name="dependeciaCargo[]"  ><?php echo $ListarPersonas["dependeciaCargo"]; ?> </textarea> </td>


                  <td>

                     <textarea  name="correo[]"><?php echo $ListarPersonas["correo"]; ?></textarea>
                    <?php
                    // if (isset($ListarPersonas['correoUpt'])) {
                    //   echo(" <span style=\"background-color: #9999ff;\" > <p class=\"text-primary\">".$ListarPersonas['correoUpt']."</p> </span>");
                    // }
                    // if (isset($ListarPersonas['correoEvento'])){
                    //   echo("<hr/><span style=\"background-color: #9999ff;\" ><p class=\"text-danger\">".$ListarPersonas['correoEvento']."</p></span>");
                    // }

                    echo("<hr/><span style=\"background-color: #9999ff;\" ><p class=\"text-danger\">".$ListarPersonas['correoEvento']."</p></span>");
                    ?>

                  </td>
                  <td>


                  <textarea  name="telefono[]" id=""><?php echo $ListarPersonas["telefono"]; ?></textarea>


                  <?php
                    // if (isset($ListarPersonas['celularUpt'])) {
                    //   echo("<span style=\"background-color: #9999ff;\" ><p class=\"text-primary\">".$ListarPersonas['celularUpt']."</p></span>");
                    // }
                    // if (isset($ListarPersonas['celularEvento'])){
                    //   echo("<hr/><span style=\"background-color: #9999ff;\" ><p class=\"text-danger\">".$ListarPersonas['celularEvento']."</p></span>");
                    // }

                      echo("<hr/><span style=\"background-color: #9999ff;\" ><p class=\"text-danger\">".$ListarPersonas['celularEvento']."</p></span>");
                   ?>


                </td>

                  <td >
                   <select name="estamento[]">
                    <?php
                if (is_array($ListarPersonas["estamento"])) {
                  # code...

                    foreach ($ListarPersonas["estamento"] as  $estamentos) {

                      ?>
                      <option value="<?php echo($estamentos); ?>">  <?php echo($estamentos); ?>   </option>
                    <?php

                        }
                        ?>

                      <option value="EXTERNO">EXTERNO</option>
                    <?php
                      }else{
                        ?>

                        <option value="<?php echo($ListarPersonas["estamento"]); ?>">  <?php echo($ListarPersonas["estamento"]); ?>   </option>
                        <?php
                      }


                  ?>
                    </select>
                </td>

                 <td align="center">
                   <select
                   <?php
                   if($ListarPersonas["idPersona"]==0){
                        echo("disabled");
                    }
                   ?>

                   name="modificar[]" id="">
                   <option value="<?php echo($ListarPersonas["idPersona"]); ?>">Modificar</option>
                   <option value="0">No Modificar</option>
                   </select>
                  </td>

                  <td align="center">
                    <button type="button" class="btn btn-labeled btn-danger " onClick="delRow(this)">
                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span></button>

                  </td>



                </tr>
                <?php $contador++;  $existeEnElEvento=0; $existeEnElSistema =0; ?>
                <?php } ?>
            <?php //} ?>

            </tbody>
            </TABLE>

            <!-- <input name="Enviar" id="" class="btn btn-primary" type="submit" value="Inscribir"> -->

            <?php //print_r(($lista)); echo($countTotal);?>


            </form>
              <!-- <p align="right" class="text-primary">Persona Registrada en el sistema institucional</p>
              <p align="right" class="text-danger">Persona Registrada en el sistema de Eventos </p> -->

               <?php unset($lista); unset($ListarPersonas); unset($contador); ?>
              </div>


            <!-- LEYENDA -->
            <br>
            <div class="clearfix"></div>
            <div class="container-fluid">

              <div class="row">

                <div class="col-md-6">

                  <div class="row">
                    <div class="col-md-12">
                      <h5><strong>LEYENDA DE USUARIOS</strong></h5>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-1" style="height: 30px; border: solid 1px #ccc;"></div>
                    <div class="col-md-11"><span>Usuario Nuevo</span></div>
                  </div>

                  <div class="row">
                    <div class="col-md-1 bg-warning" style="height: 30px; height: 30px; border: solid 1px #ccc;"></div>
                    <div class="col-md-11"><span>Usuario ya registrado en el sistema</span></div>
                  </div>

                  <?php


                  if ($IdEvento!=0) {
                    ?>
                    <div class="row">
                    <div class="col-md-1" style="height: 30px; height: 30px; background-color: #a3d4b8;"></div>
                    <div class="col-md-11"><span>Usuario ya registrado en el Evento</span></div>
                  </div>
                    <?php
                  }
                  ?>


                  <!-- <div class="row">
                    <div class="col-md-1 bg-danger" style="height: 30px; height: 30px; border: solid 1px #ccc;"></div>
                    <div class="col-md-11"><span>Usuario ya registrado en el sistema</span></div>
                  </div> -->

                </div>

                <div class="col-md-6">

                  <div class="row">
                    <div class="col-md-12">
                      <h5><strong>LEYENDA DE INFORMACION DE USUARIOS</strong></h5>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-1" style="height: 30px; border: solid 1px #ccc; padding-top: 3px; padding-left: 2.5%"><span class="text-primary">info</span></div>
                    <div class="col-md-11"><span>Persona Registrada en el sistema institucional</span></div>
                  </div>

                  <div class="row">
                    <div class="col-md-1" style="height: 30px; height: 30px; border: solid 1px #ccc; padding-top: 3px; padding-left: 2.5%"><span class="text-danger">info</span></div>
                    <div class="col-md-11"><span>Persona Registrada en el sistema de Eventos</span></div>
                  </div>

                </div>

              </div>

            </div>

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Basic Examples -->



    </div>
  </section>


<script type="text/javascript">

function fncInscribirPersonasExcel() {

  swal({
      title: 'Inscribir Personas',
      text: 'Seguro que desea inscribir la data de personas?',
      type: "info",
      showCancelButton: true,
      confirmButtonColor: '#141438',
      confirmButtonText: 'Si!',
      cancelButtonText: "Cancelar",
      closeOnConfirm: true,
      focusConfirm: true,
    }, function () {
      $( "form" ).submit(function( event ) {
        var dato =( $( this ).serializeArray() );
        var objson = "";
        var contador =0;
       // var p = dato[0];
       // var idEvento = dato[1];

        var arrayRegistradoEnElEvento = $('input[name="existeRegistradoEnElEvento[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var arrayRegistradoEnElSistema = $('input[name="existeRegistradoEnElSistema[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var arraydni = $('input[name="dni[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var arraynombre = $('textarea[name="nombre[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var apellidoPat = $('textarea[name="apellidoPat[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();
        
        var apellidoMat = $('textarea[name="apellidoMat[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var estamentoex = $('textarea[name="estamentoex[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var fechaInicioContrato = $('input[name="fechaInicioContrato[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var fechaFinContrato = $('input[name="fechaFinContrato[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var dependencia = $('textarea[name="dependencia[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var unidadOrganica = $('textarea[name="unidadOrganica[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var cargo = $('textarea[name="cargo[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var dependenciacargo = $('textarea[name="dependeciaCargo[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();


        var correo = $('textarea[name="correo[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var telefono = $('textarea[name="telefono[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var estamento = $('select[name="estamento[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();

        var modificar = $('select[name="modificar[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();


        var datos  = [];
        var objeto = {};
        var p = document.getElementById("param").value;  
        var idEvento = document.getElementById("idEvento").value;  
      
    
       
        $('#btnInscribir').hide(); //oculto mediante id


        for(var i= 0; i < arraydni.length; i++) {

            //var nombre = arrayNombres[i];

              var datos  = [];
                var objeto = {};
                var mobjson =null;

           datos.push({
                "registradoEvento"    : arrayRegistradoEnElEvento[i],
                "registradoSistema"  : arrayRegistradoEnElSistema[i],
                "dni"    : arraydni[i],
                "nombre"    : arraynombre[i],
                "apellidoPat": apellidoPat[i],
                "apellidoMat" : apellidoMat[i],
                "estamentoex" : estamentoex[i],
                "fechaInicioContrato" : fechaInicioContrato[i],
                "fechaFinContrato" : fechaFinContrato[i],
                "dependencia" : dependencia[i],
                "unidadOrganica" :  unidadOrganica[i],
                "cargo"           : cargo[i],
                "dependenciacargo"         : dependenciacargo[i],
                "correo"           : correo[i],
                "estamento"           : estamento[i],
                "modificar"           : modificar[i],
                "telefono"           : telefono[i]

            });

            //objeto.datos = datos;

            var mobjson = {"p":p,"idEvento":idEvento,'data':datos}

            $.ajax({
            data:  mobjson, //datos que se envian a traves de ajax
            url:   '../modules/Registro.php?p='+p+'&IdEvento='+idEvento,
            type:  'POST',
            async: false , //método de envio
            beforeSend: function () {
                   // $("#resultado").val("Verificando, espere por favor...");
                    
            },
            success:  function (respuesta) {
              
               console.log(respuesta);
              
                


                }, 
            complete: function () {
         
            }
            });
          }

        //objeto.datos = datos;
     

        //  var p = document.getElementById("p").value;  
        //  var idEvento = document.getElementById("idEvento").value;  
        //  var mobjson = {"p":p,"idEvento":idEvento,'data':datos}
        // console.log(mobjson);

        

        //  $.ajax({
        //     data:  mobjson, //datos que se envian a traves de ajax
        //     url:   '../modules/Registro.php?p='+p+'&IdEvento='+idEvento,
        //     type:  'POST', //método de envio
        //     beforeSend: function () {
        //            // $("#resultado").val("Verificando, espere por favor...");
                    
        //     },
        //     success:  function (respuesta) {
        //         var datos  = [];
        //         var objeto = {};
        //        console.log(respuesta);
                


        //     }
        // });

       

      });


      $('#form_validation_inscribir').submit();

    });


}
function disableBtn() {
    document.getElementById("btnInscribir").disabled = true;
}
</script>
