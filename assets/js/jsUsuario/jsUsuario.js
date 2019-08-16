
	// ================================================================================
	// VISTAS
	// ================================================================================

  function fncViewBuscarUsuarioIndex(sex) {
    $(document).ajaxStart(function(){ Pace.stop(); Pace.bar.render(); });
    fncBuscarUsuarioIndex(sex);
    $(document).ajaxComplete(function(){ Pace.start(); Pace.stop(); });
  }


  // ================================================================================
	// FUNCIONES
	// ================================================================================

  function fncBuscarUsuarioIndex(sex) {

    var proceso = "s5ApcnXHNU";

    $.ajax({
      type: 'POST',
      data:{
        sesion: sex
      },     
      url: '../modules/Usuario.php?p=' + proceso,
      success: function(data){
        $("#divBuscarUsuario").html(data); 
        fncHabilitarDatatable();       
      }
    });
  }

  function fncValidarRegistroUsuario(sex) {

    var contrasena1 = $( "#contrasena" ).val(); 
    var contrasena2 = $( "#contrasena2" ).val(); 

    var proceso = "suIEnlqXNQ";

    $.ajax({
      type: 'POST', 
      data:{
        sesion: sex
      },   
      url: '../modules/Usuario.php?p=' + proceso,
      success: function(data){
        if( data.mensaje == true ){

          if (contrasena1 == contrasena2 ) {
            $( "#form_validation" ).submit(); 
            return true;
          }else{
            fncMostrarMensaje('error','Validación de Usuario','Las contraseñas deben coincidir como validación','OK!');
            return false;
          }
          
        }else{
          fncMostrarMensaje('error','Validación de Usuario','Debe ingresar un Usuario validado','OK!');
          return false;
        }             
      }
    });

  }

  function fncVerificarExisteUsuario(sex, valor) {
    
    var proceso = "NAxBFSWwxj";

    $.ajax({
      type: 'POST',
      data: {
        usuario: valor,
        sesion: sex
      },    
      url: '../modules/usuario.php?p=' + proceso,
      success: function(data){
        $( "#divVerificarUsuario" ).html("");

        if( data.mensaje == true ){
          $( "#divVerificarUsuario" ).html('<i class="material-icons">check_box</i>');
        } 

        if( data.mensaje == false ){
          $( "#divVerificarUsuario" ).html('<i class="material-icons">error</i>');           
        }
        // $( "#divVerificarUsuario" ).removeClass( "focused error success" );

        // if( data.mensaje == true ){
        //   $( "#divVerificarUsuario" ).removeClass( "focused error" );
        //   $( "#divVerificarUsuario" ).addClass( "focused success" );
        // } 

        // if( data.mensaje == false ){
        //   $( "#divVerificarUsuario" ).removeClass( "focused success" );
        //   $( "#divVerificarUsuario" ).addClass( "focused error" );            
        // }
      }
    });


  }


  function fncVerificarContrasena() {
    
    var contrasena1 = $( "#contrasena" ).val(); 
    var contrasena2 = $( "#contrasena2" ).val(); 

    // $( "#divContrasena1" ).removeClass( "focused error success" );
    // $( "#divContrasena2" ).removeClass( "focused error success" );

    // if (contrasena1 !== "" || contrasena2 !== ""){
    //   if (contrasena1 == contrasena2 ) {
    //     $( "#divContrasena1" ).removeClass( "focused error" );
    //     $( "#divContrasena1" ).addClass( "focused success" );
    //     $( "#divContrasena2" ).removeClass( "focused error" );
    //     $( "#divContrasena2" ).addClass( "focused success" );
    //   }else{
    //     $( "#divContrasena1" ).removeClass( "focused success" );
    //     $( "#divContrasena1" ).addClass( "focused error" ); 
    //     $( "#divContrasena2" ).removeClass( "focused success" );
    //     $( "#divContrasena2" ).addClass( "focused error" );   
    //   }
    // } 

    $( "#divContrasena1" ).html("");
    $( "#divContrasena2" ).html("");

    if (contrasena1 !== "" || contrasena2 !== ""){
      if (contrasena1 == contrasena2 ) {
        $( "#divContrasena1" ).html('<i class="material-icons">check_box</i>');
        $( "#divContrasena2" ).html('<i class="material-icons">check_box</i>');
      }else{
        $( "#divContrasena1" ).html('<i class="material-icons">error</i>');
        $( "#divContrasena2" ).html('<i class="material-icons">error</i>');   
      }
    }      

  }





