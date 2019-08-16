  <?php $url_parametros_addedit_usuario = $url_parametros; ?>
  <section class="content">
    <div class="container-fluid">
      <?php  

        switch ($operacion) {
          case 'agregar': 
            $titulo_operacion = "Agregar Usuario";
            $subtitulo_operacion = "Agregar Nuevo Usuario";
            $icono_operacion = "add_box";
            $boton_operacion = "AGREGAR";
            $parametro_add_edit = "D5cdBfAkBQ";
            $bitActivo  = 1;
            $readonly_ruc = "";
            break;
          case 'editar': 
            $titulo_operacion = "Editar Usuario";
            $subtitulo_operacion = "Editar Usuario Registrado";
            $icono_operacion = "edit";
            $boton_operacion = "MODIFICAR";
            $parametro_add_edit = "JhccuOuolR";
            $readonly_ruc = "readonly";

            $IdUsuario                    = $dtConsultarUsuario[0]['IdUsuario'];
            $IdPtaDependenciaFijo         = $dtConsultarUsuario[0]['IdPtaDependenciaFijo'];
            $varUsuario                   = $dtConsultarUsuario[0]['varUsuario'];
            $varNombre                    = $dtConsultarUsuario[0]['varNombres'];
            $varApellido                  = $dtConsultarUsuario[0]['varApellidos'];
            $varNivel                     = $dtConsultarUsuario[0]['varNivel'];
            $bitActivo                    = $dtConsultarUsuario[0]['bitActivo'];
            
            break;
        }
      ?>
      <!-- Breadcrumbs -->
      <ol class="breadcrumb breadcrumb-bg-teal align-right">
        <li><a href="./?<?php echo http_build_query($url_parametros_addedit_usuario); ?>"><i class="material-icons">home</i> Inicio</a></li>
        <?php $url_parametros_addedit_usuario['v'] = 'index'; ?>
        <li><a href="../modules/usuario.php?<?php echo http_build_query($url_parametros_addedit_usuario); ?>"><i class="material-icons">supervisor_account</i> Usuarios</a></li>
        <li class="active"><i class="material-icons"><?php echo $icono_operacion ?></i> <?php echo $titulo_operacion ?></li>
      </ol>
      <!-- #END# Breadcrumbs -->

      <?php $url_parametros_form_usuario = $url_parametros; ?>
      <?php $url_parametros_form_usuario['p'] = $parametro_add_edit; ?>
      <form id="form_validation" action="../modules/usuario.php?<?php echo http_build_query($url_parametros_form_usuario); ?>"  method="POST" autocomplete="off">
        <div class="demo-masked-input">

          <!-- Inline Layout -->
          <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header bg-blue-upt">
                  <h2>
                    USUARIOS
                    <small><strong><?php echo $subtitulo_operacion ?></strong></small>
                  </h2>
                </div>
                <div class="body">

                    <div class="row clearfix">

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="usuario">Usuario</label>
                        <div class="input-group">
                          <div class="form-line">
                            <input type="text" id="usuario" name="usuario" class="form-control" value="<?php echo $varUsuario; ?>" maxlength="15" minlength="3" placeholder="Usuario" required="true" <?php if($operacion == 'agregar'){echo 'onkeyup="fncVerificarExisteUsuario(\''.$sex.'\', this.value); return false;"';} ?> <?php echo $readonly_ruc; ?> >
                          </div>
                          <span class="input-group-addon" id="divVerificarUsuario"></span>
                        </div>
                        
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="contrasena">Contraseña</label>
                        <div class="input-group">
                          <div class="form-line">
                            <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña" maxlength="550" onkeyup="fncVerificarContrasena(); return false;" <?php if($operacion == 'agregar'){echo 'required="true"';} ?> >
                          </div>
                          <span class="input-group-addon" id="divContrasena1"></span>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label for="contrasena2">Repetir Contraseña</label>
                        <div class="input-group">
                          <div class="form-line">
                            <input type="password" id="contrasena2" name="contrasena2" class="form-control" placeholder="Repetir Contraseña" maxlength="550" onkeyup="fncVerificarContrasena(); return false;" <?php if($operacion == 'agregar'){echo 'required="true"';} ?> >
                          </div>
                          <span class="input-group-addon" id="divContrasena2"></span>
                        </div>
                      </div>

                    </div>
                    
                    <div class="row clearfix">

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="nombre">Nombres</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $varNombre; ?>" placeholder="Nombre del Usuario" maxlength="550" required="true">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="apellido">Apellidos</label>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $varApellido; ?>" placeholder="Apellidos del Usuario" maxlength="550" required="true">
                          </div>
                        </div>
                      </div>

                    </div>
                  
                    <div class="row clearfix">

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="idptadependenciafijo">Dependencia</label>
                        <div class="form-group">
                          <div class="form-line">
                            <select class="form-control show-tick" data-live-search="true" id="idptadependenciafijo" name="idptadependenciafijo" required="true">
                              <option value="" selected>Seleccione</option>              
                              <?php  foreach ($dtConsultarDependenciaActivos as $Dependencia) { ?>
                                <option value="<?php echo $Dependencia['IdPtaDependenciaFijo']; ?>" <?php if($Dependencia['IdPtaDependenciaFijo']==$IdPtaDependenciaFijo){ echo 'selected';} ?> ><?php echo $Dependencia['Descripcion']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="nivel">Nivel</label>
                        <div class="form-group">
                          <div class="form-line">
                           <select class="form-control show-tick" id="nivel" name="nivel" required="true">
                              <option value="usuario" <?php if($varNivel == 'usuario'){echo 'selected';} ?> >Usuario</option> 
                              <option value="admin" <?php if($varNivel == 'admin'){echo 'selected';} ?> >Administrador</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label for="activo">Estado</label>
                        <div class="form-group">
                          <div class="form-line">
                           <select class="form-control show-tick" id="activo" name="activo" required="true">
                              <option value="1" <?php if($bitActivo == '1'){echo 'selected';} ?> >Activo</option>
                              <option value="0" <?php if($bitActivo == '0'){echo 'selected';} ?> >Inactivo</option>                              
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <input type="hidden" id="hidden_idusuario" name="hidden_idusuario" value="<?php echo $IdUsuario; ?>">
                        <button type="submit" class="btn btn-primary btn-block btn-lg m-t-10 waves-effect" <?php if($operacion == 'agregar'){echo 'onclick="fncValidarRegistroUsuario(\''.$sex.'\'); return false;"';} ?> >
                          <i class="material-icons"><?php echo $icono_operacion ?></i>
                          <span><?php echo strtoupper($boton_operacion) ?></span>
                        </button>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <button type="button" class="btn btn-danger btn-block btn-lg m-t-10 waves-effect" onclick="fncConfirmarMensaje('../modules/usuario.php?sesion=<?php echo $sex; ?>&v=index','Cancelar Operación','Seguro que desea cancelar la operación?','Si!'); return false;">
                          <i class="material-icons">cancel</i>
                          <span>CANCELAR</span>
                        </button>
                      </div>
                    </div>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- #END# Inline Layout -->

        </div>

      </form>

    </div>
  </section>
