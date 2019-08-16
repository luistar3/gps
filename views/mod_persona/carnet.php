<?php //$url_parametros_addedit_empresa = $url_parametros; ?>
  <section class="content">
    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./evento.php?v=eventopPage"><i class="material-icons">home</i> Inicio</a></li>
        <?//php $url_parametros_addedit_empresa['v'] = 'index'; ?>
        <li><a href="../modules/persona.php?v=index<?php //echo http_build_query($url_parametros_addedit_empresa); ?>"><i class="material-icons">person</i> Persona</a></li>
        <li class="active"><i class="material-icons"><?//php echo $icono_operacion ?></i> <?php echo ("Carnet"); ?></li>
      </ol>
      <!-- #END# Breadcrumbs -->

      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <!-- <div class="card"> -->
            <div class="header bg-blue-upt" style="padding: 5px;">
              <h4 style="padding-left: 10px;">
                IMPRESIÓN DE CARNET POR PERSONA
                <!-- <small><strong>Administraci&oacute;n de Empresas</strong></small> -->
              </h4>
            </div>
            <div class="body" style="padding: 10px; padding-bottom: 15px; background-color: white;">
              <?php  
                if( $bolVistaPersona == 0 ){
                  $strPaginaRegresar = 'persona.php?v=index';
                }else{
                  $strPaginaRegresar = 'Registro.php?v=registradosPorEventoMes&id='.base64_encode($_GET["IdEvento"]);
                }
              ?>
              <div class="row clearfix">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                  <a href="../modules/<?php echo $strPaginaRegresar; ?>" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect">
                    <i class="material-icons">arrow_back</i>
                  </a>
                </div>
              </div>

              <!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <?php //$url_parametros_index_empresa = $url_parametros; ?>
                  <?php $url_parametros_index_empresa['v'] = 'agregar'; ?>
                  <a href="#" class="btn btn-warning btn-lg m-l-0 m-r-0 waves-effect text-center" style="width: 30%" onclick="fncImprimir(); return false;">                  
                    <span>IMPRIMIR CARNET</span>
                  </a>
                </div>
              </div> -->

            </div>
          <!-- </div> -->
        </div>
      </div>
      <!-- #END# Inline Layout -->



      <br>
      <!-- <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet"> -->
      <link href="https://fonts.googleapis.com/css?family=Baloo|Viga" rel="stylesheet">

      <?php //$url_parametros_form_empresa = $url_parametros; ?>
      <?php //$url_parametros_form_empresa['p'] = $parametro_add_edit; ?>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


        <div class="panel-group full-body" id="accordion_19" role="tablist" aria-multiselectable="true">
          <?php $panel_active = 'in'; ?>
          <?php foreach ($dtPersona as $Persona) { ?>


          <?php 
            // var_dump($dtPersona);
          ?>
          <?php
          $nombre       = $Persona["Nombre"];
          $apellido     = $Persona["ApePat"]." ".$Persona["ApeMat"];
          $cargo        = $Persona["Cargo"];

          $IdPersona    = $Persona["IdPersona"];
          $dni          = $Persona["Dni"];
          $dni          = base64_encode($dni);
          $encodeDni = base64_decode($dni);
          $encodeDni = base64_encode('/'.$encodeDni);

          $Descargado    = $Persona["Descargado"];
          $depeCargo    = $Persona["DependenciaCargo"];

          if ($Persona["Estamento"] ==" " || $Persona["Estamento"] == null ) {
            $estamento= "UPT";
          }else {
             $estamento    = mb_strtoupper($Persona["Estamento"]);
          }
          if ($Persona["Dependencia"] == "" || $Persona["Dependencia"] == null ) {
            $dependencia = "UNIVERSIDAD PRIVADA DE TACNA" ;
          }else {
            $dependencia = $Persona["Dependencia"];
          }
          if ( trim($Persona["DependenciaCargo"]) !="") {
            $dependencia = $depeCargo;
          }
          else {
            $dependencia = $Persona["Dependencia"];
          }
        
          ?>

            

            <div class="panel " id="Panel_<?php echo($IdPersona) ?>">
              <input type="hidden" id="IdPersona_<?php echo($IdPersona) ?>" class="div-IdPersona" value="<?php echo($IdPersona) ?>" />
              <input type="hidden" id="Dni_<?php echo($IdPersona) ?>" class="div-Dni" value="<?php echo( base64_decode($dni) ) ?>" />
              <div class="panel-heading" role="tab" id="headingOne_19">
                  <h4 class="panel-title" <?php if($Descargado == 1){ echo 'style="background-color: #141438 !important; color: white !important;"'; } ?> >
                      <a role="button" data-toggle="collapse" data-parent="#accordion_19" href="#collapseOne_<?php echo $IdPersona ; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $IdPersona ; ?>">
                          <i class="material-icons">perm_contact_calendar</i> <?php echo strtoupper($apellido).', '.strtoupper($nombre); ?> <span class="pull-right" id="spanDescargado_<?php echo($IdPersona) ?>"> <?php if($Descargado == 1){ echo '<i class="material-icons">check</i>'; } ?> </span>
                      </a>
                  </h4>
              </div>
              <div id="collapseOne_<?php echo $IdPersona ; ?>" class="panel-collapse collapse <?php echo $panel_active; ?>" role="tabpanel" aria-labelledby="headingOne_19">
                  <div class="panel-body">
                      
                    <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <a

                        <?php
                        if ($restric=="I") {
                          echo('class="invisible"');
                        }
                        ?>
                        
                         href="#" class="btn btn-warning btn-lg m-l-0 m-r-0 waves-effect text-center" style="width: 30%" onclick="impri(<?php echo($IdPersona) ?>); return false;">                  
                          <span>IMPRIMIR CARNET</span>
                        </a>
                      </div>
                    </div>

                    <div class="row">

                      <div id="print" class="d-inline-flex">

                        <div class="col-md-6" style="position:obsolute;" >
                          <div class="card front" id="cardFront_<?php echo $IdPersona ; ?>" style="padding: 0px;">
                              <div class="blue" style="color: #9b9b9b;"><h5>_____ <img src="../assets/images/logo.png" alt="" style="width: 73px; height: 89px;">  _____</h5><!-- <BR> --><h5 style="font-size:11px; color: #9b9b9b; padding-top: 5px;">UNIVERSIDAD PRIVADA DE TACNA<!-- CARNET DE INGRESO --></h5></div>

                              <div class="yellow"><H1 style="transform: rotate(270deg); margin-top: 353px; margin-left: 5px; font-family: 'Viga', sans-serif; letter-spacing: 5px;"><?php /*echo 'ADMINISTRATIVO';*/ echo($estamento) ?></H1></div>


                              <!-- <div class="dots" style="background-image: url('../assets/images/0c10728a101f5.png')"> -->
                              <div class="dots" style="background-color: #e5e5e5;">
                                <!-- <H1>UPT</H1>UNIVERSIDAD PRIVADA DE TACNA -->
                                <!-- <br> -->
                              <?php if(strlen(strtoupper($apellido))>20){ ?>
                                 <h5 style="margin-top: 11px; font-family: 'Viga', sans-serif; padding: 0 8px 0 8px; text-transform: uppercase;"><?php /*echo 'Roberto Alejandro';*/ echo( strtoupper($apellido) /*ucwords(strtolower($apellido))*/ ) ?></h5>
                                  
                             <?php }
                             else { ?>
                               <h5 style="margin-top: 11px; font-family: 'Viga', sans-serif; padding: 0 8px 0 8px; text-transform: uppercase;"><?php /*echo 'Roberto Alejandro';*/ echo( strtoupper($apellido) /*ucwords(strtolower($apellido))*/ ) ?></h45>
                           <?php 
                           }
                             ?>
                               
                               <?php if(strlen(strtoupper($nombre))>17 ){ ?>
                                 <h5 style="margin-top: 11px; font-family: 'Viga', sans-serif; padding: 0 8px 0 8px; text-transform: uppercase; "><?php /*echo 'Roberto Alejandro';*/ echo( strtoupper($nombre) /*ucwords(strtolower($apellido))*/ ) ?></h5>
                                  
                              <?php }
                                else { ?>
                                  <h5 style="margin-top: 11px; font-family: 'Viga', sans-serif; padding: 0 8px 0 8px; text-transform: uppercase;"><?php /*echo 'Roberto Alejandro';*/ echo( strtoupper($nombre) /*ucwords(strtolower($apellido))*/ ) ?></h5>
                              <?php 
                              }
                                ?>

                                

                                <h5 style="margin-top: 10px; font-family: 'Viga', sans-serif; padding: 0 8px 0 8px; color: #969696; font-size: 12px;">DNI <?php echo base64_decode($dni); ?></h5>    

                                <hr style="margin: 0; margin-left: 11px; margin-right: 11px; border-color: #b9b9b9 /*#d4d3d3*/;" /> 
                                <!-- <br> -->
                                <!-- <br> -->


                                <h6 style="font-size: 12px; margin-top: 5px; font-family: 'Viga', sans-serif; padding: 0 8px 0 8px; color: #545454; text-transform: uppercase;"><?php /*echo 'JEFE DE ÁREA';*/ echo( strtoupper($cargo) ) ?></h6>
                            
                                  <?php if(strlen(strtoupper($dependencia))>30){ ?>
                                 <h6 style="font-size: 10px; font-family: 'Viga', sans-serif; padding: 0 8px 0 8px; margin-top: 9px; color: #969696; line-height: 17px; text-transform: uppercase;"><?php /*echo 'Oficina de Tecnologías de la Información y otra oficina mas'; */ echo(strtoupper($dependencia)) ?></h6>
                                  
                                  <?php }
                                  else { ?>
                                    <h5 style="font-size: 12px; font-family: 'Viga', sans-serif; padding: 0 8px 0 8px; margin-top: 9px; color: #969696; line-height: 17px; text-transform: uppercase;"><?php /*echo 'Oficina de Tecnologías de la Información y otra oficina mas'; */ echo(strtoupper($dependencia)) ?></h5>
                                <?php 
                                }
                                  ?>

                               
                                
                              </div>
                              <!-- <div class="pink">
                                <h5 style="margin-top: 39px; color: #886a30; font-size: 8px;"><?php echo base64_decode($dni); ?></h5>                                                 
                              </div> -->
                          </div>

                        </div>
                        <div class="col-md-6">

                        <div class="card back" id="cardBack_<?php echo $IdPersona ; ?>" style="padding: 0px;">
                            <div class="yellow"></div>
                            <div class="top dots" style="background-color: url('../assets/images/0c10728a101f5.png')" >
                              <div class="" id="qrcode_<?php echo($encodeDni) ?>" style="padding: 12px;"></div>
                              <input type="hidden" id="valor_<?php echo $IdPersona ; ?>" class="div-valor" value="<?php echo($encodeDni) ?>" style="" />
                              <!-- <br> -->
                              <h4 style="margin-top: 12px; font-family: 'Viga', sans-serif;"><?php echo base64_decode($dni); ?></h4>
                              <img src="<?php echo '../complements/barcode.inc.php?text='.$encodeDni.'&size=45&codetype=Code39&print=false'; ?>" />
                            </div>

                            <!-- <div class="bottom dots"  style="background-image: url('../assets/images/0c10728a101f5.png')" ></div> -->
                            <div class="bottom dots"  style="background-color: #AB8B4E /*#e5e5e5*/; margin-top: 7px;" ></div>
                            <div class="pink">
                              
                              <?php  
                              // require_once($_SERVER["DOCUMENT_ROOT"] . '/EventosWeb/complements/barcode.inc.php'); 
                              // $code_number = '125689365472365458';
                              // #new barCodeGenrator($code_number,0,'hello.gif'); 
                              // new barCodeGenrator($code_number,0,'hello.gif', 190, 130, true);
                              ?>

                            </div>
                          </div>


                        </div>

                      </div>



                    </div>

                  </div>
              </div>

            </div>

            <?php $panel_active = ''; ?>
             

              

          <?php } ?>
                                  <!-- <input type="button" onclick="impri(<?php //echo($IdPersona) ?>); return false;" value="impri"> -->

        </div>


      </div>
    </div>



   <!--  <input type="hidden" id="valor" class="div-valor" value="<?php echo($encodeDni) ?>" style=""> -->
        <!-- <button onClick="createQrCode()" id="r" class="btn btn-light">Generar</button> -->
        <!-- <button onClick="fncImprimir()" id="p" class="btn btn-light" style="display:none" disabled>imprimir</button> -->







    </body>
    <script>

       function impri(IdPersona){
       var IdPersona = IdPersona;

      var $dniv = $('#Dni_'+IdPersona).val();
      var nombrefront = '_' + $dniv;
      var nombreback  = '_' + $dniv + '_back';
      //Get the original size of canvas/image
    //[top, left, bottom, right]
       var opt = {
              margin:       [-0.201, 0, -8, 0],
              filename:     nombrefront,
              image:        { type: 'jpeg', quality: 2 },
              html2canvas:  { scale: 4 },
              jsPDF:        { unit: 'in', format: [2.85, 4.485],precision:1, orientation: 'portrait' }
                };
        var element = document.getElementById('cardFront_' + IdPersona);
        html2pdf(element, opt);

        var optback = {
              margin:       [-0.2, 0, -8, 0],
              filename:     nombreback,
              image:        { type: 'jpeg', quality: 2 },
              html2canvas:  { scale: 4 },
              jsPDF:        { unit: 'in', format: [2.85, 4.485],precision:1, orientation: 'portrait' }
                };
        var element = document.getElementById('cardFront_' + IdPersona);
        var element = document.getElementById('cardBack_' + IdPersona);
        html2pdf(element, optback);
        fncMarcarComoDescargadoPersonaEvento(<?php if(isset($_GET["IdEvento"])){ echo $_GET["IdEvento"]; }else{ echo 0; } ?>, IdPersona);
       }                    

    function fncImprimir(IdPersona){

      // var myInput1Vals = $(".div-IdPersona").map(function() {

        var IdPersona = IdPersona;

        if(IdPersona > 0){ 
          // var $encodeDni = $("#valor_" + IdPersona).val();

          var $dniv = $('#Dni_'+IdPersona).val();
          var nombrefront = '_' + $dniv;
          var nombreback  = '_' + $dniv + '_back';

          // var nombrefront= <?php echo('"'.base64_decode($encodeDni).'"') ?>;
          // var nombreback= <?php echo('"'.base64_decode($encodeDni).'_back"') ?>;
          fncDescargarDiv('cardFront_' + IdPersona, nombrefront);
          fncDescargarDiv('cardBack_' + IdPersona, nombreback);

          // var NombrePdf = <?php echo('"'.base64_decode($encodeDni).'"') ?>;
          // fncDescargarDiv2('cardFront', 'cardBack', NombrePdf);

          fncMarcarComoDescargadoPersonaEvento(<?php if(isset($_GET["IdEvento"])){ echo $_GET["IdEvento"]; }else{ echo 0; } ?>, IdPersona);

        }

      // });

    }

    function createQrCode()
    {
      // var $j_object = $(".div-valor");
      // $j_object.each( function(i) { alert(i.val()); } );

      // $('.div-valor').each(function (i) {
      //   alert(i);
      //   });

      var myInput1Vals = $(".div-valor").map(function() {
          // alert(this.value);      

          // var userInput = document.getElementById('valor').value;
          var userInput = this.value;

          var qrcode = new QRCode("qrcode_" + userInput, {
              text: userInput,
              width: 200,
              height: 200,
              colorDark: "#000000",
              colorLight: "white",
              correctLevel : QRCode.CorrectLevel.H
          });
          // document.getElementById('r').disabled=true;
          // document.getElementById('p').disabled=false;
          // document.getElementById('r').style.display = 'none';
          // document.getElementById('p').style.display = 'block';
      });

    }


    function fncMarcarComoDescargadoPersonaEvento(IdEvento, IdPersona) {

      if(IdEvento > 0){

        var parametros = {
          "p"         : "Descargado",
          "IdEvento": IdEvento,
          "IdPersona": IdPersona
           
        };

        $.ajax({
          data:  parametros, //datos que se envian a traves de ajax
          url:   '../modules/detalle_evento.php', //archivo que recibe la peticion
          type:  'GET', //método de envio
          beforeSend: function () {
            // $("#resultado").val("Verificando, espere por favor...");              
          },
          success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              
            if (response == true){
              // panel-success
              // $('#Panel_' + IdPersona).addClass('panel-success')

              
              $('#Panel_' + IdPersona + ' .panel-heading .panel-title').removeAttr('style');
              $('#Panel_' + IdPersona + ' .panel-heading .panel-title').removeClass('panel-descargado');
              $('#Panel_' + IdPersona + ' .panel-heading .panel-title').addClass('panel-descargado'); //success

              $('#spanDescargado_' + IdPersona).html('<i class="material-icons">check</i>');

            }else{
              fncMostrarMensaje('error', 'Descargo de Carnet', 'Error en proceso de descargo. Intentelo de nuevo', 'OK');
            }                

          }
        });

      }

    }

    $( document ).ready(function() {
        createQrCode();
    });

    </script>

<style>
.html2canvas-container { width: 3000px !important; height: 3000px !important; }
  .panel-descargado {
    background-color: #141438 !important;
    color: white !important;
  }

#qwe {
  background-color: #ffffff;

  border-radius: 10px 10px 10px 10px;
  width: 250px;
  height: 250px;
  display: flex;
}
.card {

  display: grid;
  font-family: "Trebuchet MS", sans-serif;
  height: 430px;
  margin: 20px auto;
  width: 274px;
  text-align: CENTER;
  position:relative;
  /* border-radius: 10px 10px 10px 10px; */
  /* border:solid 5px #141438; */   /*#1e3c4b*/
  border: none;

}
.front {
  grid-template-columns: repeat(12, 1fr);
  grid-template-rows: repeat(4, 1fr);


}
.front .blue {

  grid-column: 4 / span 9;
  grid-row: 1 / span 5;
}
.front .yellow {
  background-color: #141438 /*#8f9ca28f*/;
  grid-column: 1 / span 3;
  grid-row: 1 / span 6;
  color: white;
  font-weight: bold;

}
.front .pink {
  background-color: #AB8B4E /*#141438*/ /*#1e3c4b*/;
  grid-column: 9 / span 5;
  grid-row: 4 / span 4;
  margin-top: 55px;
}
.front .dots {

  background-size: 5px 5px;
  background-position: 0 0, 3px 3px;
  grid-column: 2 / span 12;
  grid-row: 3 / span 2;
  margin: 0 0 33px 46px;
  z-index: 1;
}
.front .personal-intro {
  color: white;
  display: flex;
  flex-direction: column;

  justify-content: center;
  text-align: center;
  width:56%;

  text-align: CENTER;
  justify-content:center;
  position:absolute;
  top:20px;
  left:6px;


}

.back {
  grid-template-columns: repeat(12, 1fr);
  grid-template-rows: repeat(12, 1fr);
  text-align: CENTER;

}
.back .yellow {
  background-color: ##1e3c4b;
  grid-column: 1 / span 9;
  grid-row: 1 / span 3;
}
.back .top.dots {

  background-color:#8c94988c;
  background-size: 6px 6px;
  background-position: 0 0, 3px 3px;
  grid-column: 2 / span 10;
  grid-row: 2 / span 7;
  margin-bottom: 27px;
}

.back .top.dots img {
  display: initial !important;
}

.back .personal-info {
  grid-column: 1 / span 6;
  grid-row: 3 / span 7;
  text-align: right;


}
.back .personal-info p {
  font-size: 10px;
  text-align: CENTER;
}
.back .personal-info p:first-of-type {
  font-size: 18px;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.back .personal-info p:nth-of-type(2) {
  font-size: 12px;
  margin-bottom: 15px;
}
.back .bottom.dots {

  background-size: 6px 6px;
  background-position: 0 0, 3px 3px;
  grid-column: 1 / span 7;
  grid-row: 12 / span 1;
  z-index: 2;
}
.back .pink {
  background-color: #141438 /*#1e3c4b*/;
  grid-column: 8 / span 5;
  grid-row: 12 / span 1;
  margin-top: 7px;
}

                      </style>

<style type="text/css">


@media print
{
#qwe {
  background-color: #ffffff;

  border-radius: 10px 10px 10px 10px;
  width: 250px;
  height: 250px;
  display: flex;
}
.card {

  display: grid;
  font-family: "Trebuchet MS", sans-serif;
  height: 520px;
  margin: 20px auto;
  width: 390px;
  text-align: CENTER;
  position:relative;
  border-radius: 10px 10px 10px 10px;
  border:solid 5px #1e3c4b;

}
.front {
  grid-template-columns: repeat(12, 1fr);
  grid-template-rows: repeat(4, 1fr);


}
.front .blue {

  grid-column: 4 / span 9;
  grid-row: 1 / span 4;
}
.front .yellow {
  background-color: #8f9ca28f;
  grid-column: 1 / span 3;
  grid-row: 1 / span 6;

}
.front .pink {
  background-color: #1e3c4b;
  grid-column: 8 / span 5;
  grid-row: 10 / span 3;
}
.front .dots {

  background-size: 5px 5px;
  background-position: 0 0, 3px 3px;
  grid-column: 2 / span 12;
  grid-row: 3 / span 2;
  margin: 0 0 50px 45px;
  z-index: 1;
}
.front .personal-intro {
  color: white;
  display: flex;
  flex-direction: column;

  justify-content: center;
  text-align: center;
  width:56%;

  text-align: CENTER;
  justify-content:center;
  position:absolute;
  top:20px;
  left:6px;


}

.back {
  grid-template-columns: repeat(12, 1fr);
  grid-template-rows: repeat(12, 1fr);
  text-align: CENTER;

}
.back .yellow {
  background-color: ##1e3c4b;
  grid-column: 1 / span 9;
  grid-row: 1 / span 3;
}
.back .top.dots {

  background-color:#8c94988c;
  background-size: 6px 6px;
  background-position: 0 0, 3px 3px;
  grid-column: 2 / span 10;
  grid-row: 2 / span 7;
  margin-bottom: -18px;
}
.back .personal-info {
  grid-column: 1 / span 6;
  grid-row: 3 / span 7;
  text-align: right;


}
.back .personal-info p {
  font-size: 10px;
  text-align: CENTER;
}
.back .personal-info p:first-of-type {
  font-size: 18px;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.back .personal-info p:nth-of-type(2) {
  font-size: 12px;
  margin-bottom: 15px;
}
.back .bottom.dots {

  background-size: 6px 6px;
  background-position: 0 0, 3px 3px;
  grid-column: 1 / span 8;
  grid-row: 11 / span 2;
  z-index: 2;
}
.back .pink {
  background-color: #1e3c4b;
  grid-column: 8 / span 5;
  grid-row: 10 / span 3;
}


}




</style>
  </section>
