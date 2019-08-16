
	// ================================================================================
	// VISTAS
	// ================================================================================

  function fncViewBuscarEgresadosIndex(sex) {
    $(document).ajaxStart(function(){ Pace.stop(); Pace.bar.render(); });
    fncBuscarEgresadosIndex(sex);
    $(document).ajaxComplete(function(){ Pace.start(); Pace.stop(); });
  }

  function fncViewConsultarEgresadoReset(sex) {
  	fncViewConsultarEgresado(sex, 0);
  	$("#codigo_universitario").val("");
  	$("#nombre_apellido").val("");
  }

  function fncViewAntecedentesLaborales(sex, IdEgresado) {
    fncConsultarAntecedentesLaborales(sex, IdEgresado);
  }


	function fncViewConsultarEgresado(sex, valor) {
    $(document).ajaxStart(function(){ Pace.stop(); Pace.bar.render(); });
		if(valor == 0){
			$("#divConsultarEgresado").html("");
		}else{

			var vista = "divConsultarEgresado";

      var idptadependenciafijo  = $("#dependencia").val().trim();
			var coduniv 				= $("#codigo_universitario").val().trim();
			var nombre_apellido = $("#nombre_apellido").val().trim();

			if (coduniv == "" && nombre_apellido == "" ){ 
				fncMostrarMensaje('error','Validación de Búsqueda','Debe ingresar al menos un valor de búsqueda','OK!');
				return false;
		  }

		  if (nombre_apellido !== "" && nombre_apellido.length < 3 ){ 
		  	fncMostrarMensaje('error','Validación de Búsqueda','Debe ingresar al menos 3 caracteres en nombre y apellido','OK!');
				return false;
		  }

	  	$.ajax({
	      type: 'POST',
	      data:
	      {
          idptadependenciafijo: idptadependenciafijo,
	        coduniv: coduniv,
	        nombre_apellido: nombre_apellido,
          sesion: sex
	      },    
	      url: '../modules/egresado.php?v=' + vista,
	      success: function(data){
	        $("#divConsultarEgresado").html(data);
          
	      }
	    });
		  
	  }
    $(document).ajaxComplete(function(){ Pace.start(); Pace.stop(); });
  }


  // ================================================================================
	// FUNCIONES
	// ================================================================================

  function fncConsultarAntecedentesLaborales(sex, IdEgresado) {
    $(document).ajaxStart(function(){ Pace.stop(); Pace.bar.render(); });

      var vista = "divBuscarAntecedentes";

      $.ajax({
        type: 'POST',
        data:
        {
          id_egresado: IdEgresado,
          sesion: sex
        },    
        url: '../modules/egresado.php?v=' + vista,
        success: function(data){
          $("#divBuscarAntecedentes").html(data);
          fncHabilitarDatatable('js-antecedentes'); 
        }
      });
      
    $(document).ajaxComplete(function(){ Pace.start(); Pace.stop(); });
  }

  function fncBuscarEgresadosIndex(sex) {

    var proceso = "cI8oWtap2J";

    var idptadependenciafijo  = $("#dependencia").val().trim();
    var nombre_apellido     = $("#nombre_apellido").val().trim();
    var dni                 = $("#dni").val().trim();
    var edad                = $("#edad").val().trim();
    var grado_academico     = $("#grado_academico").val().trim();
    var sector_ocupacional  = $("#sector_ocupacional").val().trim();

    $.ajax({
      type: 'POST',
      data:
      {
        idptadependenciafijo: idptadependenciafijo,
        nombre_apellido: nombre_apellido,
        dni: dni,
        edad: edad,
        grado_academico: grado_academico,
        sector_ocupacional: sector_ocupacional,
        sesion: sex
      },    
      url: '../modules/egresado.php?p=' + proceso,
      success: function(data){
        $("#divBuscarEgresados").html(data); 
        fncHabilitarDatatable();       
      }
    });
  }

  function fncExportarBusquedaEgresados(sex) {

    var proceso_set       = "VToiyAhYBR";
    var proceso_exportar  = "78fzObwYUv";

    var nombre_apellido     = $("#nombre_apellido").val().trim();
    var dni                 = $("#dni").val().trim();
    var edad                = $("#edad").val().trim();
    var grado_academico     = $("#grado_academico").val().trim();
    var sector_ocupacional  = $("#sector_ocupacional").val().trim();

    swal({
      title: 'Exportar Reporte',
      text: 'Seguro que desea exportar la búsqueda?',
      type: "info",
      showCancelButton: true,
      confirmButtonColor: '#141438',
      confirmButtonText: 'Si!',
      cancelButtonText: "Cancelar",
      closeOnConfirm: true,
      focusConfirm: true,
    }, function () {

      $.ajax({
        type: 'POST',
        data:
        {
          nombre_apellido: nombre_apellido,
          dni: dni,
          edad: edad,
          grado_academico: grado_academico,
          sector_ocupacional: sector_ocupacional,
          sesion: sex
        },    
        url: '../modules/egresado.php?p=' + proceso_set,
        success: function(data){
          if(data.mensaje == true){
            window.open('../modules/egresado.php?sesion=' + sex +'&p=' + proceso_exportar,'_blank' );       
          }else{
            fncMostrarMensaje('error','Validación de Proceso','Error al generar Reporte de Egresado','OK!');
            return false;
          } 
        }
      });

    });
  }

  function fncAsignarBusquedaEgresado(sex, coduniv, itemest, idsem) {

  	var proceso = "YM78VPSv6V";

  	$.ajax({
      type: 'POST',
      data:
      {
        coduniv: coduniv,
        itemest: itemest,
        idsem: idsem,
        sesion: sex
      },    
      url: '../modules/egresado.php?p=' + proceso,
      success: function(data){
      	if(data.mensaje == true){

      		$("#info_codigo_universitario").val("");
      		$("#info_nombre_egresado").val("");
      		$("#info_apellido_egresado").val("");
      		$("#info_semestre_egreso").val("");
          $("#dni").val("");

      		$("#info_codigo_universitario").val(data.CodUniv);
      		$("#info_nombre_egresado").val(data.Nombres);
      		$("#info_apellido_egresado").val(data.Apellidos);
      		$("#info_semestre_egreso").val(data.Semestre);

          $("#hidden_coduniv").val(data.CodUniv);
          $("#hidden_itemest").val(data.ItemEst);
          $("#hidden_idsem").val(data.IdSem);
          $("#dni").val(data.Dni);

      		$('#ModalBuscarEgresado').modal('hide');
      	}else{
      		fncMostrarMensaje('error','Validación de Búsqueda','Error en selección de información de Egresado','OK!');
					return false;
      	}        
      }
    });
  }


  function fncEliminarEgresado(sex, idUsuario, IdEgresado) {

    swal({
      title: 'Eliminación de Registro',
      text: 'Seguro que desea eliminar el egresado?',
      type: "error",
      showCancelButton: true,
      confirmButtonColor: '#7d0b03',
      confirmButtonText: 'Eliminar',
      cancelButtonText: "Cancelar",
      closeOnConfirm: false,
      focusConfirm: true,
    }, function () {

      $(document).ajaxStart(function() { Pace.restart(); });
      // $.ajax({
      //   type: 'POST',
      //   data:
      //   {
      //     sesion: token
      //   },    
      //   url: '../views/ModMatricula/ModMatricula/viewModHorario.php',
      //   success: function(data){
      //     document.getElementById('recargahorario').style.display = 'block';
      //     document.getElementById('vistaIzquierda').style.display = 'block';
      //     $("#recargahorario").html(data);
      //     $("#vistaDerecha").last().addClass("col-lg-12 col-xs-20 connectedSortable ui-sortable");
      //     $("#vistaIzquierda").last().addClass("col-lg-8 col-xs-20 connectedSortable ui-sortable");
      //   }
      // });
      
      // swal({
      //   title: 'Operación Existosa',
      //   text: "La operación se realizó con éxito",
      //   type: 'success',
      //   showCancelButton: false,
      //   confirmButtonColor: '#141438',
      //   confirmButtonText: 'OK'
      // }, function () {
      //   location.href = './';
      // })

    });
  }





