<section class="content">
    <div class="container-fluid">
      
     <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros); ?>"><i class="material-icons">home</i> Inicio</a></li>
        <li class="active"><i class="material-icons">domain</i> Empresas</a></li>
      </ol>
      <!-- #END# Breadcrumbs -->
      <?php fnc_ImprimirMensajeSession(); ?>
      <!-- Inline Layout -->
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header bg-blue-upt">
              <h2>
                EVENTOS 
                <!-- <small><strong>Administraci&oacute;n de Empresas</strong></small> -->
              </h2>
            </div>
            <div class="body" style="padding-bottom: 0px;">
              
              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                  <?php //$url_parametros_index_empresa = $url_parametros; ?>
                  <?php $url_parametros_index_empresa['v'] = 'agregar'; ?>
                  <a href="../modules/empresa.php?<?php echo http_build_query($url_parametros_index_empresa); ?>" class="btn btn-block btn-warning btn-lg m-l-0 m-r-0 waves-effect">
                  
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
            <select name="" id="">
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            </select>
              <div class="table-responsive" id="divBuscarEmpresa">

              <div id="exTab2" class="container col-lg-12 col-md-12 col-sm-12 col-xs-12">	
                        <ul class="nav nav-tabs">
                              <li class="active">
                                <a  href="#1" data-toggle="tab">ENERO</a>
                              </li>
                              <li><a href="#2" data-toggle="tab">FEBRERO</a>
                              </li>
                              <li><a href="#3" data-toggle="tab">MARZO</a>
                              </li>
                              <li><a href="#4" data-toggle="tab">ABRIL</a>
                              </li>
                              <li><a href="#5" data-toggle="tab">MAYO</a>
                              </li>
                              <li><a href="#6" data-toggle="tab">JUNIO</a>
                              </li>
                              <li><a href="#7" data-toggle="tab">JULIO</a>
                              </li>
                              <li><a href="#8" data-toggle="tab">AGOSTO</a>
                              </li>
                              <li><a href="#9" data-toggle="tab">SETIEMBRE</a>
                              </li>
                              <li><a href="#10" data-toggle="tab">OCTUBRE</a>
                              </li>
                              <li><a href="#11" data-toggle="tab">NOVIEMBRE</a>
                              </li>
                              <li><a href="#12" data-toggle="tab">DICIEMBRE</a>
                              </li>
                            

                            </ul>

                              <div class="tab-content ">
                                <div class="tab-pane active" id="1">
                                      <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_enero" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                            
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                            
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($enero) > 0){ ?>
                                              <?php foreach ($enero as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
                                                  
                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                 
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    <!-- <button type="button" class="btn btn-info btn-md m-l-0 m-r-0 waves-effect" data-toggle="modal" data-target="#ModalBuscarAntecedentes" onclick="fncViewAntecedentesLaborales(<?php //echo $ListarEventos["IdListarEventos"]; ?>); return false;">
                                                      <i class="material-icons">info</i>
                                                    </button>       -->           
                                                    
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                        
                                </div>
                                <div class="tab-pane" id="2">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_febrero" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                              
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                              
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($febrero) > 0){ ?>
                                              <?php foreach ($febrero as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
                                                  
                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                 
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    <!-- <button type="button" class="btn btn-info btn-md m-l-0 m-r-0 waves-effect" data-toggle="modal" data-target="#ModalBuscarAntecedentes" onclick="fncViewAntecedentesLaborales(<?php //echo $ListarEventos["IdListarEventos"]; ?>); return false;">
                                                      <i class="material-icons">info</i>
                                                    </button>       -->           
                                                   
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="3">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_marzo" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                             
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                          
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($marzo) > 0){ ?>
                                              <?php foreach ($marzo as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
                                                  
                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                 
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                   
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="4">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_abril" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                             
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                        
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($abril) > 0){ ?>
                                              <?php foreach ($abril as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
                                                 
                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                  
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                   
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="5">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_mayo" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                             
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                             
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($mayo) > 0){ ?>
                                              <?php foreach ($mayo as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
                                                 
                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="6">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_junio" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                             
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                              
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($junio) > 0){ ?>
                                              <?php foreach ($junio as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
                                             
                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                              
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="7">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_julio" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                             
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                             
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($julio) > 0){ ?>
                                              <?php foreach ($julio as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>

                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                  
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="8">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_agosto" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>

                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                             
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($agosto) > 0){ ?>
                                              <?php foreach ($agosto as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>

                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                  
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="9">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_setiembre" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>

                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                              
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($setiembre) > 0){ ?>
                                              <?php foreach ($setiembre as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>

                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                 
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="10">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_octubre" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                              
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                           
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($octubre) > 0){ ?>
                                              <?php foreach ($octubre as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
                                             
                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                 
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'control'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="11">
                                <table width="100%" class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_noviembre" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                             
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                              
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($noviembre) > 0){ ?>
                                              <?php foreach ($noviembre as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
                                             
                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
                                                    </a>                          
                                                  </td>
                                                </tr>
                                                <?php $contador++; ?>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                          </tbody>
                                        </table>
                                </div>
                                <div class="tab-pane" id="12">
                                <table width="100%" class="table table-striped table-bordered" id="table_diciembre" class="display" >
                                          <thead>
                                            <tr>
                                              <th width="4%"></th>
                                              <th width="15%">Nombre</th>
                                             
                                              <th width="10%">Lugar</th>
                                              <th width="1%">Aforo</th>
                                              <th width="12%">Inicio - Fin</th>             
                                              <th width="6%">Hora</th>
                                              <th width="6%">Tipo de Evento</th>
                                                                      
                                             
                                              <!-- <th width="3%">Estado</th> -->
                                              <th width="10%" data-orderable="false">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php $contador = 1; ?>
                                            <?php if (count($diciembre) > 0){ ?>
                                              <?php foreach ($diciembre as $ListarEventos) { ?>
                                                <tr>
                                                  <td align="center"><?php echo $contador; ?></td>
                                                  <td><?php echo $ListarEventos["Nombre"]; ?></td>
                                             
                                                  <td><?php echo $ListarEventos["Lugar"]; ?></td>
                                                  <td><?php echo $ListarEventos["Aforo"]; ?></td>
                                              

                                                  <td>De <?php echo $ListarEventos["InicioFecha"]; ?> al <?php echo $ListarEventos["FinFecha"]; ?></td>
                                                  <td><?php echo $ListarEventos["InicioHora"]; ?> - <?php echo $ListarEventos["FinHora"]; ?></td>
                                                  <td><?php echo $ListarEventos["NombreTipoEvento"]; ?></td>
                                                
                                                  <!-- <td align="center"> -->
                                                    <?php  
                                                      // echo ' ';
                                                      // switch ($ListarEventos["Estado"]) {
                                                      //   case 'A': echo 'Activo'; break;
                                                      //   case 'I': echo 'Inactivo'; break;
                                                      //   default: echo ' '; break;
                                                      // }
                                                    ?>
                                                  <!-- </td> -->
                                                
                                                  <td align="center">
                                                    <?php 
                                                      // $url_parametros_sector_detalle['sesion'] = $sex;
                                                      $url_parametros_sector_control['v'] = 'registradosPorEventoMes'; 
                                                      $url_parametros_sector_control['id'] = base64_encode( $ListarEventos["IdEvento"]);
                                                    ?>
                                                    
                                                    <a href="../modules/Registro.php?<?php echo http_build_query($url_parametros_sector_control); ?>" class="btn btn-primary btn-md m-l-0 m-r-0 waves-effect" data-toggle="tooltip" data-placement="left" title="Asistentes" data-original-title="Asistentes">
                                                      
                                                      <span class="glyphicon glyphicon-tag"></span>
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
          </div>
        </div>
      </div>
      <!-- #END# Basic Examples -->

      



    </div>
  </section>

