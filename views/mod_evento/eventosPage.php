<link href="../assets/css/card.css" rel="stylesheet">

<section class="content">
    <div class="container-fluid">

  

      <!-- <div class="row clearfix">

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Basic Card Title <small>Description text here...</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                </div>
            </div>
        </div>

      </div> -->


      <!-- <div class="row"> -->
      <div class="row clearfix">

          <?php

          $parametro_add_edit = 'uctftGr4Jm';
          foreach ($dtListarEventos as $key => $value) {

            

          ?>
          <?php
            if ($value["Tipo"]==="T") {
              $tipo = "Publico";
            } else {
              $tipo = "Privado";
            }


            $dateInicioHora = strtotime( $value["InicioHora"] );
            $inicioHora = date( 'Y-m-d H:i:s', $dateInicioHora );
            $dateFinHora = strtotime( $value["Finhora"] );
            $finHora = date( 'Y-m-d H:i:s', $dateFinHora );
          ?>

          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="cursor: pointer; padding-bottom: 10px;" data-toggle="modal" data-target="#modelId" onclick="fncEventoModal('<?php echo ($value["NombreEvento"]); ?>','<?php echo ($value["Descripcion"]); ?>','<?php   echo ( str_replace("\""," ", $value["Lugar"])); ?>','<?php echo ($value["Aforo"]); ?>','<?php echo ($value["UbicacionLatitud"]); ?>','<?php echo ($value["UbicacionLongitud"]); ?>','<?php echo ($value["InicioFecha"]); ?>','<?php echo ($value["FinFecha"]); ?>','<?php echo ($value["InicioHora"]); ?>','<?php echo ($finHora); ?>','<?php echo ($value["Banner"]); ?>','<?php echo ($value["Tipo"]); ?>','<?php echo ($value["TipoNombre"]); ?>','<?php echo ($value["IdEvento"]); ?>')" >
              <div class="card">
              <!-- <div class="card" style="background: url(../images/<?php if ($value["Tipo"] == 'T'){ echo("publico.jpg");} else {echo("privado.jpg");} ?>) center/cover no-repeat;"> -->
                  <div class="header" style="background-color: <?php if ($value["Tipo"] == 'T'){ echo("#b6b6b6");} else {echo("#4a0500");} ?> !important">
                      <h2 style="overflow:hidden; white-space:nowrap; text-overflow: ellipsis; color: <?php if ($value["Tipo"] == 'T'){ echo("black");} else {echo("white");} ?> !important">
                          <?php echo strtoupper(($value["NombreEvento"])); ?> <small style="overflow:hidden; white-space:nowrap; text-overflow: ellipsis; color: <?php if ($value["Tipo"] == 'T'){ echo("white");} else {echo("white");} ?> !important"><?php echo ($value["Descripcion"]); ?></small>
                      </h2>

                      <ul class="header-dropdown m-r--5">
                          <li>
                              <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="timer">
                                  <i class="material-icons"><?php if ($value["Tipo"] == 'T'){ echo("lock_open");} else {echo("lock");} ?></i>
                              </a>
                          </li>
                      </ul>

                  </div>
                  <div class="body">
                      <!-- Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra. -->

                      <!-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                          <div class="carousel-inner" role="listbox">
                              <div class="item active">
                                  <img src="../images/<?php if ($value["Tipo"] == 'T'){ echo("publico.jpg");} else {echo("privado.jpg");} ?>" width="40%" />
                              </div>
                          </div>

                      </div> -->
                      <!-- <a href="../images/<?php if ($value["Tipo"] == 'T'){ echo("publico.jpg");} else {echo("privado.jpg");} ?>" data-sub-html="Demo Description"> -->
                          <img class="img-responsive thumbnail" src="../images/<?php if ($value["Tipo"] == 'T'){ echo("publico.jpg");} else {echo("privado.jpg");} ?>">
                      <!-- </a> -->

                      <p style="overflow:hidden; white-space:nowrap; text-overflow: ellipsis;"><?php echo ($value["InicioFecha"]); ?></p>

                      <blockquote class="m-b-0-0">
                          <p style="overflow:hidden; white-space:nowrap; text-overflow: ellipsis;"><?php echo ($value["Lugar"]); ?></p>
                      </blockquote>

                      

                  </div>
              </div>
          </div>



          <!-- <div class="example-2 dcard container">
            <div class="wrapper" style="background: url(../images/<?php if ($value["Tipo"] == 'T'){ echo("publico.jpg");} else {echo("privado.jpg");} ?>) center/cover no-repeat;" >

              <div class="header">
                <div class="date">
                  <span class="date"><?php echo ($value["InicioFecha"]); ?></span>

                </div>
                <ul class="menu-content">
                  <li><?php echo ($value["Lugar"]); ?></li>
                </ul>
              </div>
              <div class="data">
                <div class="content">

                <?php
                  if ($value["Tipo"]==="T") {
                    $tipo = "Publico";
                  } else {
                    $tipo = "Privado";
                  }


                  $dateInicioHora = strtotime( $value["InicioHora"] );
                  $inicioHora = date( 'Y-m-d H:i:s', $dateInicioHora );
                  $dateFinHora = strtotime( $value["Finhora"] );
                  $finHora = date( 'Y-m-d H:i:s', $dateFinHora );
                ?>

                  <span class="author"><?php echo ($tipo);?></span>
                  <h1 class="title">
                    <a href="#" data-toggle="modal" data-target="#modelId" onclick="fncEventoModal('<?php echo ($value["NombreEvento"]); ?>','<?php echo ($value["Descripcion"]); ?>','<?php   echo ( str_replace("\""," ", $value["Lugar"])); ?>','<?php echo ($value["Aforo"]); ?>','<?php echo ($value["UbicacionLatitud"]); ?>','<?php echo ($value["UbicacionLongitud"]); ?>','<?php echo ($value["InicioFecha"]); ?>','<?php echo ($value["FinFecha"]); ?>','<?php echo ($value["InicioHora"]); ?>','<?php echo ($finHora); ?>','<?php echo ($value["Banner"]); ?>','<?php echo ($value["Tipo"]); ?>','<?php echo ($value["TipoNombre"]); ?>','<?php echo ($value["IdEvento"]); ?>')" ><?php echo ($value["NombreEvento"]); ?></a>
                  </h1>
                  <p class="text"><?php echo ($value["Descripcion"]); ?></p>
                 
                </div>
              </div>
            </div>
         </div> -->

          <?php
             }


          ?>


      </div>
    </div>
</section>

<div>

<!-- modal -->



<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
                <div id="mapi" style ="height: 400px; width:100%;">
      </div>
      <div class="modal-body">


      <div class="content">
        <h1 id="eventTitle">Titulo</h1>

        </div>
          <span id="eventDescription">Descripcion </span>

          <div>
            <h3 id="eventPlace">Lugar</h3>
          </div>


          <div>


          </div>
          <div class="text-center">
            <h2 id="clock" class="label-primary" style="color:white;"></h2>

          </div>
        </div>



      </div>
      <div class="modal-footer">
            <form  id="form_validation" action="../modules/Registro.php?p=<?php echo $parametro_add_edit; ?>"  method="POST">
            <input type="hidden"  id="IdEvento" name="IdEvento">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="fncEliminarMap()">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="eventSave">Inscribir</button>
            </form>


      </div>
    </div>
  </div>
</div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0kIg52zqfcWuszYY428FklRdYQcqLy24&callback=initMap"
    async defer></script>

<script src="../assets/js/jsEvento/jsEvento.js"></script>
