              <?php $menu_class_active = 'class="active"'; ?>
              <?php //$url_parametros_menu = $url_parametros; ?>
              <?php //$url_parametros_menu['v'] = 'index'; ?>

              <ul class="list">

                <li class="header">MEN&Uacute; NAVEGACI&Oacute;N</li>

                <!-- HOME -->
                <li <?php if($menu_activo == 'dashboard'){ echo $menu_class_active; } ?> >
                  <a   href="../modules/evento.php?v=eventopPage" >
                    <i class="material-icons">home</i>
                    <span>Inicio</span>
                  </a>
              
                 
                </li>

                <!-- /MENU DEL USUARIO -->
                <?php //if ($_SESSION['usuario']["ses_IdRol"]==1 || $_SESSION['usuario']["ses_IdRol"]==2 ) {  ?>


                <!-- EVENTO -->
                <li <?php if($menu_activo == 'mantenimiento_listar_eventos_futuro' || $menu_activo == 'mantenimiento_listar_eventos_detalle' || $menu_activo == 'mantenimiento_evento_index' || $menu_activo == 'mantenimiento_agregar_evento_index' || $menu_activo == 'mantenimiento_sectorocupacional_index' || $menu_activo == 'mantenimiento_registro_evento_agregar_index' || $menu_activo == 'mantenimiento_registrar_personas_index' || $menu_activo == 'mantenimiento_listar_eventos_futuro' ){ echo $menu_class_active; } ?>>
                  <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">event</i>
                    <span>Eventos</span>
                  </a>
                  <ul class="ml-menu">
                    <?php //if ($_SESSION['usuario']["ses_IdRol"]==1 || $_SESSION['usuario']["ses_IdRol"]==2 ) { ?>
                    <?php //if ( array_search('btnEvento', $_SESSION['usuario']['ses_PermisoPSTobjeto'], true) >= 0 ) { ?>
                    <?php if( in_array("btnEvento", $_SESSION['usuario']['ses_PermisoPSTobjeto']) ){ ?>
                      <li <?php if($menu_activo == 'mantenimiento_evento_index'){ echo $menu_class_active; } ?> >
                        <a href="../modules/evento.php?v=index">Listado de Eventos</a>
                      </li>
                    <?php } ?>
                   <!--  <li <?php if($menu_activo == 'mantenimiento_evento_usuario_index'){ echo $menu_class_active; } ?>  >
                      <a href="../modules/Evento.php?v=eventopPage">Eventos Proximos</a>
                    </li> -->

                    <li <?php if($menu_activo == 'dashboard'){ echo $menu_class_active; } ?> >
                      <a href="../modules/evento.php?v=eventopPage">Eventos Próximos</a>
                    </li>
                    <li <?php if($menu_activo == 'mantenimiento_evento_usuario_registro'){ echo $menu_class_active; } ?> >
                      <a href="../modules/Registro.php?v=pageRegistro">Eventos Inscritos</a>
                    </li>

                    <!-- <li <?php if($menu_activo == 'mantenimiento_evento_usuario_registro'){ echo $menu_class_active; } ?> >
                      <a href="../modules/Registro.php?v=pageRegistro">Eventos Inscritos</a>
                    </li> -->
                    <!-- <li <?php if($menu_activo == 'mantenimiento_sectorocupacional_index'){ echo $menu_class_active; } ?> >
                      <a href="../modules/sector_ocupacional.php?<?php echo http_build_query($url_parametros_menu); ?> ">Reporte</a>
                    </li> -->


                    <!-- <li <?php if($menu_activo == 'mantenimiento_agregar_evento_index'){ echo $menu_class_active; } ?> >
                      <a href="../modules/evento.php?v=agregar">Agrega un Nuevo Evento</a>
                    </li>

                    <li <?php if($menu_activo == 'mantenimiento_registrar_personas_index'){ echo $menu_class_active; } ?>>
                    <a href="../modules/Registro.php?v=registrar" >Agrega Invitados a tu Evento</a>
                    </li> -->
                    <!-- <li <?php if($menu_activo == 'mantenimiento_listar_eventos_futuro'){ echo $menu_class_active; } ?>> -->

                    <!-- listar evento para registro de detalle -->
                    <!-- <li <?php if($menu_activo == 'mantenimiento_listar_eventos_detalle'){ echo $menu_class_active; } ?>>
                    <a href="../modules/evento.php?v=listarfuturo" >Ver Cronograma de tu Evento</a>
                    </li> -->

                    <!-- <li <?php if($menu_activo == 'mantenimiento_sectorocupacional_index'){ echo $menu_class_active; } ?>>
                    <a href="../modules/evento.php?v=eventopPage">Eventos UPT</a>
                    </li> -->
                  </ul>

                </li>  <!-- PERSONAS -->

                <?php //if ($_SESSION['usuario']["ses_IdRol"]==1 || $_SESSION['usuario']["ses_IdRol"]==2 ) { ?>
                <?php //if ( array_search('btnMantenimiento', $_SESSION['usuario']['ses_PermisoPSTobjeto'], true) >= 0 ) { ?>
                <?php if( in_array("btnMantenimiento", $_SESSION['usuario']['ses_PermisoPSTobjeto']) ){ ?>
                  <li <?php if($menu_activo == 'mantenimiento_persona_index' || $menu_activo == 'mantenimiento_agregar_persona_index' || $menu_activo == 'mantenimiento_usuario_index'){ echo $menu_class_active; } ?>>
                    <a href="javascript:void(0);" class="menu-toggle">
                      <i class="material-icons">settings</i>
                      <span>Mantenimiento</span>
                    </a>
                    <ul class="ml-menu">
                      <li <?php if($menu_activo == 'mantenimiento_persona_index'){ echo $menu_class_active; } ?> >
                        <a href="../modules/persona.php?v=index">Personas</a>
                      </li>
                      <!-- <li <?php if($menu_activo == 'mantenimiento_agregar_persona_index'){ echo $menu_class_active; } ?> >
                        <a href="../modules/persona.php?v=agregar" >Agrega una Persona</a>
                      </li> -->

                      <li <?php if($menu_activo == 'mantenimiento_tipo_empresa_index'){ echo $menu_class_active; } ?> >
                        <a href="../modules/tipo_evento.php?v=index">Tipos de Eventos</a>
                      </li>


                      <!-- <li <?php //if($menu_activo == 'mantenimiento_sectorocupacional_index'){ echo $menu_class_active; } ?> >
                      <a href="../modules/persona.php?v=eventopPage">Pagina de Eventos</a>
                      </li> -->
                    </ul>
                  </li>
                <?php } ?>

                <!-- TIPOEVENTOS -->
                <!-- <li <?php if($menu_activo == 'mantenimiento_tipo_empresa_index' || $menu_activo == 'mantenimiento_agregar_tipo_empresa_index' || $menu_activo == 'mantenimiento_usuario_index'){ echo $menu_class_active; } ?>>
                  <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">event</i>
                    <span>Tipo de Eventos</span>
                  </a>
                  <ul class="ml-menu">
                    <li <?php if($menu_activo == 'mantenimiento_tipo_empresa_index'){ echo $menu_class_active; } ?> >
                      <a href="../modules/tipo_evento.php?v=index">Tipos de Evento</a>
                    </li>
                    <li <?php //if($menu_activo == 'mantenimiento_agregar_tipo_empresa_index'){ echo $menu_class_active; } ?> >
                      <a href="../modules/sector_ocupacional.php?<?php echo http_build_query($url_parametros_menu); ?> " >Agregar</a>
                    </li>
                    <li <?php //if($menu_activo == 'mantenimiento_sectorocupacional_index'){ echo $menu_class_active; } ?> >
                      <a href="../modules/sector_ocupacional.php?<?php echo http_build_query($url_parametros_menu); ?> ">Reporte</a>
                    </li>
                  </ul>
                </li> -->

                </li>  <!-- REGISTROS A EVENTOS -->

                <!-- <li <?php if($menu_activo == 'mantenimiento_registro_evento_index' || $menu_activo == 'mantenimiento_registro_evento_mes' || $menu_activo == 'mantenimiento_usuario_index'){ echo $menu_class_active; } ?>>
                  <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">assignment</i>
                    <span>Registros a Eventos</span>
                  </a>
                  <ul class="ml-menu">
                    <li <?php if($menu_activo == 'mantenimiento_registro_evento_index'){ echo $menu_class_active; } ?>  >
                      <a href="../modules/Registro.php?v=index">Registrado a Un Evento</a>
                    </li>
                    <li <?php if($menu_activo == 'mantenimiento_registro_evento_mes'){ echo $menu_class_active; } ?>>
                      <a href="../modules/Registro.php?v=registroPorEventoMes" >Ver Participantes por Evento</a>
                    </li>

                  </ul>
                </li> -->


                <?php //} ?>

                </li>  <!-- MENU PUBLICO -->

                <!-- <li <?php if($menu_activo == 'mantenimiento_evento_usuario_index' || $menu_activo == 'mantenimiento_evento_usuario_registro' || $menu_activo == 'mantenimiento_usuario_index'){ echo $menu_class_active; } ?>>
                  <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">assignment</i>
                    <span>Eventos para ti</span>
                  </a>
                  <ul class="ml-menu">

                    <li <?php //if($menu_activo == 'mantenimiento_sectorocupacional_index'){ echo $menu_class_active; } ?> >
                      <a href="../modules/sector_ocupacional.php?<?php //echo http_build_query($url_parametros_menu); ?> ">Reporte</a>
                    </li>
                  </ul>
                </li> -->




            </ul>
