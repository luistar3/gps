
	// ================================================================================
	// VISTAS
	// ================================================================================

  function fncViewBuscarEmpresaIndex(sex) {
    $(document).ajaxStart(function(){ Pace.stop(); Pace.bar.render(); });
    fncBuscarEmpresaIndex(sex);
    $(document).ajaxComplete(function(){ Pace.start(); Pace.stop(); });
  }


  // ================================================================================
	// FUNCIONES
	// ================================================================================

  function fncBuscarEmpresaIndex(sex) {

    var proceso = "J9Y0B7rh86";

    $.ajax({
      type: 'POST',
      data:{
        sesion: sex
      },   
      url: '../modules/empresa.php?p=' + proceso,
      success: function(data){
        $("#divBuscarEmpresa").html(data); 
        fncHabilitarDatatable();       
      }
    });
  }

  function fncValidarRegistroEmpresa(sex) {

    var proceso = "Q6SwcynHWV";

    $.ajax({
      type: 'POST',  
      data:{
        sesion: sex
      },   
      url: '../modules/empresa.php?p=' + proceso,
      success: function(data){
        if( data.mensaje == true ){
          $( "#form_validation" ).submit(); 
          return true;
        }else{
          fncMostrarMensaje('error','Validación de RUC','Debe ingresar un RUC validado','OK!');
          return false;
        }             
      }
    });

  }

  function fncVerificarExisteRuc(sex, valor) {

    var proceso = "UkUELwv6kL";

    if( valor.length == 11 ){

      $.ajax({
        type: 'POST',
        data: {
          ruc: valor,
          sesion: sex
        },    
        url: '../modules/empresa.php?p=' + proceso,
        success: function(data){
          // $("#divVerificarRucEmpresa").html(''); 
          $( "#divVerificarRucEmpresa" ).removeClass( "focused error success" );

          if( data.mensaje == true ){
            $( "#divVerificarRucEmpresa" ).removeClass( "focused error" );
            $( "#divVerificarRucEmpresa" ).addClass( "focused success" );
            // $("#divVerificarRucEmpresa").html('<button class="btn btn-success btn-block m-t-15">Disponible</button>'); 
          } 

          if( data.mensaje == false ){
            $( "#divVerificarRucEmpresa" ).removeClass( "focused success" );
            $( "#divVerificarRucEmpresa" ).addClass( "focused error" );            
            // $("#divVerificarRucEmpresa").html('<button class="btn btn-danger btn-block m-t-15">No disponible!</button>'); 
          }
        }
      });

      
    }else{
      // $("#divVerificarRucEmpresa").html(''); 
      $( "#divVerificarRucEmpresa" ).removeClass( "focused error success" );
    }
  }





