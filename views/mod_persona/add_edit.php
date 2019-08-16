<?php  

    switch ($operacion) {
      case 'agregar': 
        $titulo_operacion = "Agregar Persona";
        $subtitulo_operacion = "Agregar persona externa a la universidad";
        $icono_operacion = "add";
        $boton_operacion = "AGREGAR";

        break;
      case 'editar': 
        $titulo_operacion = "Editar Persona";
        $subtitulo_operacion = "Editar Persona Registrada";
        $icono_operacion = "edit";
        $boton_operacion = "MODIFICAR";
        break;
    }

?>

<?php //$url_parametros_addedit_empresa = $url_parametros; ?>
  <section class="content">
    <div class="container-fluid">
      
      <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./evento.php?v=eventopPage"><i class="material-icons">home</i> Inicio</a></li>
        <?php $url_parametros_addedit_empresa['v'] = 'index'; ?>
        <li><a href="../modules/persona.php?<?php echo http_build_query($url_parametros_addedit_empresa); ?>"><i class="material-icons">person</i> Persona</a></li>
        <li class="active"><i class="material-icons"><?php echo $icono_operacion ?></i> <?php echo $titulo_operacion ?></li>
      </ol>
      <!-- #END# Breadcrumbs -->

       
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <!-- <div class="header bg-blue-upt">
              <h2>
                <strong>....</strong>
              </h2>
            </div> -->

            <div class="body" style="padding-bottom: 0px;">
   
              <div class="row clearfix">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                  <a href="../modules/persona.php?v=index" class="btn btn-block btn-primary btn-lg m-l-0 m-r-0 waves-effect">
                    <i class="material-icons">arrow_back</i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


      <!-- Basic Examples -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="body">
              <div class="table-responsive" id="divBuscarEmpresa"> 



              <!-- tabs -->
              <ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
               <!--  <li class="nav-item active">
                  <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"
                    aria-selected="false" aria-expanded="true">Registrar por Busqueda</a>
                </li>
                -->
                <li class="nav-item active">
                  <a class="nav-link" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md"
                    aria-selected="false">Agregar y Registrar</a>
                </li>
                
                <?php if($operacion != 'editar'){  ?>
                  <li class="nav-item">
                    <a class="nav-link" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md"
                      aria-selected="true">Carga Masiva</a>
                  </li>
                <?php } ?>
              </ul>


              <div class="tab-content card pt-5" id="myTabContentMD">
                <div class="tab-pane" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
                

                    <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       

                      <div class="container">

                          <div class="row">

                            <div class="col-sm-12" >
                              <form method="POST" enctype="multipart/form-data" action="../modules/Registro.php?p=XqWerTyX&IdEvento=0>" >
                                <div class="form-group">
                                  <label >Cargue Archivo:</label>
                                  <!-- <input type="file" class="form-control" id="file" name="archivo" accept=".csv"> -->
                                  <input id="file" class="file form-control" type="file" multiple data-min-file-count="0" data-theme="fas" name="archivo" data-allowed-file-extensions='["csv"]' required="true">
                                  <input type="hidden" id="IdEventoApellido" name="IdEvento" value="0">
                                  <input type="hidden" name="p" value="qWerTy">
                                  <br>
                                  <!-- <button type="submit" id="cargar" class="btn btn-default" disabled>Cargar</button> -->
                                </div>



                              </form>

                            
                            </div>
                          </div>
                      </div>


                      <a href="../images/PLANTILLA.csv" >
                            <button type="button" class="btn btn-warning">DESCARGA LA PLANTILLA</button>
                        </a>  

                        <style>
                        .pdfobject-container {
                            width: 100%;
                            max-width: 100%;
                            height: 600px;
                            margin: 2em 0;
                          }

                        </style>
                        
                        <!--  -->
                          <!--Grid row-->
                          <div class="row d-flex justify-content-center">

                            <!--Grid column-->
                            <div id="pdf" class="col-md-12">

                              This column is centered

                            </div>
                            <!--Grid column-->

                          </div>
                          <!--Grid row-->

                      
                          <script>


                           var options = {
                              page: 2,
                              pdfOpenParams: {
                                navpanes: 1,
                                view: "FitH",
                                pagemode: "thumbs"
                              }
                            };

                             var myPDF = PDFObject.embed("../images/sample-3pp.pdf", "#pdf");                          
       
                          
                         </script>

                      </div>
                    </div>

                </div>



                <div class="tab-pane fade active in" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
                 






                <?php //$url_parametros_addedit_empresa = $url_parametros; ?>
                 
                    <div class="container-fluid">
                      
                      <?php  

                        switch ($operacion) {
                          case 'agregar': 
                            $titulo_operacion = "Agregar Persona";
                            $subtitulo_operacion = "Agregar persona externa a la universidad";
                            $icono_operacion = "add";
                            $boton_operacion = "AGREGAR";
                            $parametro_add_edit = "xZ6rQTOHxk";
                            $bitActivo  = 1;
                            $readonly_ruc = "";

                            $IdPersona             ='';
                            $Dni                   ='';
                            $Nombre                ='';
                            $Apellido              ='';
                            $Correo                ='';
                            $Celular               ='';
                            $Estado                ='1';
                            $Usuario               ='';
                            $Clave                 ="";
                            $IdTipoPersona         ="";
                            $avatar                ="";

                            $ApePat                 ="";
                            $ApeMat                 ="";
                            $Estamento              ="";
                            $FechaInicioContrato   ="";
                            $FechaFinContrato      ="";
                            $Dependencia           ="";
                            $UnidadOrganica       ="";
                            $Cargo                ="";
                            $DependenciaCargo     ="";


                            break;
                          case 'editar': 
                            $titulo_operacion = "Editar Persona";
                            $subtitulo_operacion = "Editar Persona Registrada";
                            $icono_operacion = "edit";
                            $boton_operacion = "MODIFICAR";
                            $parametro_add_edit = "uctftGr4Jm";
                            //$readonly_ruc = "readonly";

                            $IdPersona                    = $dtConsultarPersona[0]['IdPersona'];
                            $Dni                          = $dtConsultarPersona[0]['Dni'];
                            $Nombre                       = $dtConsultarPersona[0]['Nombre'];
                            $Apellido                     = $dtConsultarPersona[0]['Apellido'];
                            $IdTipoPersona                = $dtConsultarPersona[0]['IdTipoPersona'];
                            $Correo                       = $dtConsultarPersona[0]['Correo'];
                            $Celular                      = $dtConsultarPersona[0]['Celular'];
                            $Estado                       = $dtConsultarPersona[0]['Estado'];
                            $Usuario                      = $dtConsultarPersona[0]['Usuario'];
                            $Clave                        = $dtConsultarPersona[0]['Clave'];
                            $avatar                       = $dtConsultarPersona[0]['Avatar'];
                            
                            $ApePat                       =$dtConsultarPersona[0]['ApePat'];
                            $ApeMat                       =$dtConsultarPersona[0]['ApeMat'];
                            $Estamento                    =$dtConsultarPersona[0]['Estamento'];
                            $FechaInicioContrato          =$dtConsultarPersona[0]['FechaInicioContrato'];
                            $FechaFinContrato             =$dtConsultarPersona[0]['FechaFinContrato'];
                            $Dependencia                  =$dtConsultarPersona[0]['Dependencia'];
                            $UnidadOrganica               =$dtConsultarPersona[0]['UnidadOrganica'];
                            $Cargo                        =$dtConsultarPersona[0]['Cargo'];
                            $DependenciaCargo             =$dtConsultarPersona[0]['DependenciaCargo'];
                            break;
                        }
                      ?>
        

                      <?php //$url_parametros_form_empresa = $url_parametros; ?>
                      <?php //$url_parametros_form_empresa['p'] = $parametro_add_edit; ?>
                      <form id="form_validation" action="../modules/persona.php?p=<?php echo $parametro_add_edit; ?>"  method="POST">
                        <div class="demo-masked-input">


                          <input type="hidden" name="xavatar" value=<?php echo($avatar);  ?>>
                          <input type="hidden"  name="IdPersona" value=<?php echo(base64_encode($IdPersona));  ?>>

                          <!-- Inline Layout -->
                          <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="card">
                                <div class="header bg-blue-upt">
                                  <h2>
                                    Persona
                                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                                  </h2>
                                </div>
                                <div class="body">

                                    <div class="row clearfix">

                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="persona">Dni (*)</label>
                                        <div class="form-group">
                                          <div class="form-line" id="divDniPersona">
                                            <input type="text" id="idDni" name="dni" class="form-control text"  maxlength="8" value="<?php echo $Dni; ?>"  placeholder="DNI" required onKeyPress="return SoloNumeros(event);"  >
                                          </div>
                                        </div>
                                        
                                      </div>

                                      <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" > -->
                                        <!-- <button class="btn btn-danger btn-block m-t-15">Ya existe!</button> -->
                                      <!-- </div> -->

                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="nombre">Nombre (*)</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Nombre" required="true" maxlength="550">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="apellido">Apellido Paterno (*)</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control" value="<?php echo $ApePat; ?>" placeholder="Apellido" required="true" maxlength="550">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="apellido">Apellido Materno (*)</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control" value="<?php echo $ApeMat; ?>" placeholder="Apellido" required="true" maxlength="550">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden">
                                        <label for="tipoEvento">Tipo Persona/Usuario</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                              <select class="form-control show-tick" id="tipoEvento" name="tipoPersona" required="true">
                                                <option value="2" selected>Seleccione el tipo de evento</option>
                                                <option value="1" <?php
                                                if ($IdTipoPersona =="1") {
                                                  # code...
                                                  echo("selected");
                                                }
                                                ?>>root</option>
                                                <option value="2" <?php
                                                if ($IdTipoPersona =="2") {
                                                  # code...
                                                  echo("selected");
                                                }
                                                ?>>admin</option>
                                                <option value="3" <?php
                                                if ($IdTipoPersona =="3") {
                                                  # code...
                                                  echo("selected");
                                                }
                                                ?>>simple</option>                                                     

                                              </select>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                  
                                    <div class="row clearfix">

                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="fechaInicio">Fecha Inicio del Contrato</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="date" id="fechaInicio" name="fechaInicio" class="form-control " value="<?php echo $FechaInicioContrato; ?>">
                                            
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="fechaFin">Fecha Fin del Contrato</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="date" id="fechaFin" name="fechaFin" class="form-control " value="<?php echo $FechaFinContrato; ?>">
                                            
                                          </div>
                                        </div>
                                      </div>


                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="correo">Correo (*)</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="email" id="correo" name="correo" class="form-control" value="<?php echo $Correo; ?>" placeholder="Correo" maxlength="550"required="true">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="Celular">Celular (*)</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="number" id="celular" name="celular" class="form-control" value="<?php echo $Celular; ?>"  placeholder="nro" >
                                            
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden">
                                        <label for="usuario">Nombre de Usuario</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="text" id="usuario" name="usuario" class="form-control " value="<?php echo $Usuario; ?>" placeholder="User"  >
                                            

                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden">
                                        <label for="clave">Password</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="password" id="password" name="password" class="form-control" value="<?php echo $Clave; ?>"  >
                                            

                                          </div>
                                        </div>
                                      </div>

                                      <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="activo">Estado</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                           <select class="form-control show-tick" id="activo" name="activo" required="true">
                                              <option value="1" <?php //if($bitActivo == '1'){echo 'selected';} ?> >Activo</option>
                                              <option value="0" <?php //if($bitActivo == '0'){echo 'selected';} ?> >Inactivo</option>                              
                                            </select>
                                          </div>
                                      </div> -->
                                      </div>

                                      <div class="row clearfix">

                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                                        <label for="usuario">Dependencia</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="text" id="dependencia" name="dependencia" class="form-control " value="<?php echo $Dependencia; ?>" placeholder="Dependencia"  >
                                            

                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                                        <label for="usuario">Estamento</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="text" id="estamento" name="estamento" class="form-control " value="<?php echo $Estamento; ?>" placeholder="Dependencia"  >
                                            

                                          </div>
                                        </div>
                                      </div>
                                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                                        <label for="usuario">Unidad Organica</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="text" id="unidadOrganica" name="unidadOrganica" class="form-control " value="<?php echo $UnidadOrganica; ?>" placeholder="Unidad Organica"  >
                                            

                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                                        <label for="usuario">Cargo</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="text" id="cargo" name="cargo" class="form-control " value="<?php echo $Cargo; ?>" placeholder="Cargo"  >
                                            

                                          </div>
                                        </div>
                                      </div>
                                       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                                        <label for="usuario">Dependencia Cargo</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                            <input type="text" id="dependenciaCargo" name="dependenciaCargo" class="form-control " value="<?php echo $DependenciaCargo; ?>" placeholder="Depencia Cargo"  >
                                            

                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label for="estado">Estado Persona (*)</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                          <select class="form-control show-tick" id="estadoPersona" name="estadoPersona">
                                             
                                              <option value="1" <?php if($Estado==1) {echo("selected");} ?> >Activo</option>
                                              <option value="0" <?php if($Estado==0) {echo("selected");} ?> >Inactivo</option>
                                              

                                            </select>
                                            

                                          </div>
                                        </div>
                                      </div>
                                         

                                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 invisible">
                                        <label for="banner">Avatar</label>
                                        <div class="form-group">
                                          <div class="form-line">
                                          <span class="btn btn-primary btn-file">
                                            <input type="file" id="avatar" name="avatar" value="<?php echo $avatar; ?>" accept=".png, .jpg, .jpeg">
                                          </span>

                                          </div>
                                        </div>
                                      </div>
                                      
                                      
                                      </div>
                                     
                                      
                                      
                                    <div class="row clearfix">
                                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                        <input type="hidden" id="hidden_idempresa" name="hidden_idempresa" value="<?php echo $IdEmpresa; ?>">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg m-t-10 waves-effect" <?php //if($operacion == 'agregar'){echo 'onclick="fncValidarRegistroEmpresa(\''.$sex.'\'); return false;"';} ?> >
                                          <i class="material-icons"><?php echo $icono_operacion ?></i>
                                          <span><?php echo strtoupper($boton_operacion) ?></span>
                                        </button>
                                      </div>
                                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" hidden>
                                        <button type="button" class="btn btn-danger btn-block btn-lg m-t-10 waves-effect" onclick="fncConfirmarMensaje('../modules/empresa.php?sesion=<?php echo $sex; ?>&v=index','Cancelar Operación','Seguro que desea cancelar la operación?','Si!'); return false;">
                                          <i class="material-icons">cancel</i>
                                          <span>CANCELAR</span>
                                        </button>
                                      </div>
                                    </div>

                                    </div>

                        </div>

                      </form>
                  


                    </div>        

                  </div>
                </div>




              <!-- /tabs -->



        
                <h6><span class="badge badge-secondary">(*)</span>Campos Requridos </h6>
                  <!--  -->



              </div>
            </div>
          </div>
        </div>
      </div>



   
    </div>
  </section>

  <script>
  
      $("#file").change(function(){
        $("#cargar").prop("disabled", this.files.length == 0);
      });
  </script>

 