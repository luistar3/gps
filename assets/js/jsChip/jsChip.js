	
    $('document').ready(function(){
       

      
        if ( document.getElementById( "chart5" )) {
            fnc_reporteCantidadChipsPorOperador();
            fnc_cantidadDeDineroPorOperador();
        }
        if ( document.getElementById( "tablaListarChip" )) {
        
            listarChip();       
            fnc_reiniciarValidador();
        }
      
      

    });

    function fnc_reiniciarValidador() {
      $.validate({
        modules: 'security, toggleDisabled',
        onSuccess: function () {

          return true;
        }
      });
    }


$('#chipBotonNuevo').click(function () {
  $('#bd-example-modal-lg form').get(0).reset();
  fnc_reiniciarValidador();
  fnc_chipLimpiarModal();
});


    $('#chipGuardar').click(function(){
     
    
      var chipNumero = document.getElementById('chipNumero').value;
      var chipTarifa = document.getElementById('chipTarifa').value;
      var chipFechaContrato = document.getElementById('chipFechaContrato').value;
      var chipOperador = document.getElementById('chipOperador').value;
      var chipTipo = document.getElementById('chipTipo').value;
      var chipId = document.getElementById('chipId').value;

      var parametros={
        "p": "xZ6rQTOHxk",
        "chipNumero": chipNumero,
        "chipTarifa": chipTarifa,
        "chipFechaContrato": chipFechaContrato,
        "chipOperador": chipOperador,
        "chipTipo": chipTipo,
        "chipId": chipId
      };
      fnc_guardarChip(parametros);
    });

function fnc_guardarChip(parametros){
        swal({
            title: '¿Estas Seguro?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {       

            if(result.value){
                var proceso = 'xZ6rQTOHxk';
                $.ajax({
                    type: "GET",
                    url: "../modules/chip.php",
                    data: parametros,
                   
                    success: function(response) {
                        if(response=='1'){
                            swal(
                                'Agregado!',
                                'El Registro Fue Agregado',
                                'success'
                            )
                          var table = $('#tablaListarChip').DataTable();
                          table.clear();
                          table.destroy();
                            listarChip();
                            $('#chipCancelar').click();

                        } else if (response=='3'){
                            swal(
                                'Error!',
                                'El Numero ya Existe',
                              'error'
                            )
                        } else if (response=='4'){
                          swal(
                            'Exito!',
                            'El Registro Fue Modificado',
                            'success'
                          )
                          var table = $('#tablaListarChip').DataTable();
                          table.clear();
                          table.destroy();
                          listarChip();
                          $('#chipCancelar').click();
                        }
                        else{

                        }

                        
                        
                        console.log(response);
                    },
                    failure: function (response) {
                        swal(
                        "Error Interno",
                        "Vaya, tu registro no se guardó", // had a missing comma
                        "error"
                        )
                    }
                });
               

            }
          
        })
    }




    
    $('#boton').click(function(){
        listarChip();
    });
    var listarChip = function(){
      var table = $('#tablaListarChip').DataTable();
      table.clear();
      table.destroy();
      
      
        var idioma = '';
      

      //$('#tablaListarChip').empty(); // empty in case the columns change

      //document.getElementById("chipLlenar").innerHTML = '<tr id="chipLlenar"><th></th> < th class="table-plus datatable-nosort" > Numero Chip</th >   <th>Tipo Contrato</th> <th>Operador</th><th>Fecha Contrato</th> <th>Meses de Servicio</th> <th>Tarifa</th>th>Traza</th> <th></th>';
    
        var table = $('#tablaListarChip').DataTable({
          
        
          "scrollX": true,
            "destroy":true,
           
            "ajax": {
                url: "../modules/chip.php", // json datasource				
                type: 'GET',  // method  , by default get
                data :{
                    "p":"J9Y0B7rh86"
                }

            },
          
            'columns': [
            { data: 'numero' },
            { data: 'tipo_contrato',
              render: function (data) { 
                if (data =="prepago") {
                    return('<span class="badge badge-pill badge-primary">'+data+'</span>');
                }
                else{
                    return('<span class="badge badge-pill badge-warning">'+data+'</span>');
                }
                }
            },
            { data: 'operador',
              render: function(data, type, row, meta){
                  if(data=="movistar"){
                      return('<button type="button" class="btn btn-success btn-lg btn-block" disabled >Movistar</button>');
                  }
                  else if( data=="entel"){
                    return('<button type="button" class="btn btn-primary btn-lg btn-block " disabled >Entel</button>');
                  }
                  else if( data=="claro"){
                    return('<button type="button" class="btn btn-danger btn-lg btn-block " disabled >Claro</button>');
                  }
                  else if( data=="bitel"){
                    return('<button type="button" class="btn btn-warning btn-lg btn-block " disabled >Bitel</button>');
                  }
                  
              } },
           
            { data: 'fechacontrato',
              render : function (data) {
                  return('<a href="javascript:;"><i aria-hidden="true"> '+data+'</i></a>');
              }
             },
            { data: 'difereciafechacontratohoy',
              render: function(data, type, row, meta){
                  return('<button type="button" class="btn btn-outline-info" disabled >'+data+'</button>');
              }
            },
            {data:'tarifa',
                render: function (data, type, row, meta) {
                    return ('<span class="badge badge-pill badge-secondary"> S/.' + data+'</span>');
             }
            },
            { data : 'traza',
                render : function(data, type, row, meta){
                    return('<div class="alert alert-dark" role="alert"><small> '+data+' </small></div>');
             }
            },
            
              { "defaultContent": '<div class="dropdown"><a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Ver</a> <a id="editarChip" class="dropdown-item"  href="#"><i class="fa fa-pencil"></i> Editar</a><a class="dropdown-item"  id = "eliminarChip" href="#"><i class="fa fa-trash"></i> Eliminar</a>	</div>	</div>'}
            
            
            ],
            
            responsive: false,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
                
            }
            ],
            
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "info": "_START_-_END_ de _TOTAL_ registros",
                searchPlaceholder: "Search"
            },
            dom: 'Blfrtip',
            buttons: [
            'copy', 'csv', 'pdf', 'print'
            ]
    

        });




      $('#tablaListarChip tbody').off('click');
      $('#tablaListarChip tbody').on( 'click', '#editarChip', function () {
       
        var data = table.row( $(this).parents('tr') ).data();
        
        console.log(data);
        $("#bd-example-modal-lg").modal('show');
        $('#bd-example-modal-lg form').get(0).reset();
        $('#chipGuardar').attr("disabled", false);
        $('#chipGuardar').removeClass('disabled');
        fnc_chipMostrarDatosEditar(data);
       
        //fnc_reiniciarValidador();

        
         
} );


    }

    var chart5,options;
    function fnc_reporteCantidadChipsPorOperador(){
        var proceso ='Rd5f84FT7D';
    
    $.ajax({
        type: 'GET',
        data:{
          'p': proceso
        },   
        url: '../modules/chip.php',
        success: function(datos){
            datosChart(datos);
        }
      });
      
    }

    function fnc_cantidadDeDineroPorOperador(){
        var proceso ='Q6SwcynHWV';
    
        $.ajax({
            type: 'GET',
            data:{
              'p': proceso
            },   
            url: '../modules/chip.php',
            success: function(datos){
                fnc_datosChartCantidadDeDineroPorOperador(datos);
            }
          });
          
    }

    function fnc_chipLimpiarModal() {
      document.getElementById("chipId").value ="0";
      document.getElementById("chipNumero").value = "";
      document.getElementById("chipTarifa").value = "";
      document.getElementById("chipFechaContrato").value = "";
      document.getElementById("chipOperador").value = "";
      document.getElementById("chipTipo").value = "";
    }

    function fnc_chipMostrarDatosEditar(data) {
      document.getElementById("chipId").value= data.idchip;
      document.getElementById("chipNumero").value = parseInt(data.numero) ;
      document.getElementById("chipTarifa").value = data.tarifa;
      document.getElementById("chipFechaContrato").value = data.fechacontrato;
      document.getElementById("chipOperador").value = data.operador;
      document.getElementById("chipTipo").value = data.tipo_contrato;
      
    }

  
function datosChart(datos){

 
 var data = JSON.parse(datos);

    Highcharts.chart('chart5', {
        title: {
            text: 'Pie point CSS'
        },
     
        series: [{
            type: 'pie',
            allowPointSelect: true,
            
            data: data,
            showInLegend: true
        }]
    });

  
   
}

function fnc_datosChartCantidadDeDineroPorOperador(datos){

    var formato = [
        {
          name: "Chrome",
          y: 62.74,
          drilldown: "Chrome"
        },
        {
          name: "Firefox",
          y: 10.57,
          drilldown: "Firefox"
        },
        {
          name: "Internet Explorer",
          y: 7.23,
          drilldown: "Internet Explorer"
        },
        {
          name: "Safari",
          y: 5.58,
          drilldown: "Safari"
        },
        {
          name: "Edge",
          y: 4.02,
          drilldown: "Edge"
        },
        {
          name: "Opera",
          y: 1.92,
          drilldown: "Opera"
        },
        {
          name: "Other",
          y: 7.62,
          drilldown: null
        }
      ];

    
      console.log(formato);


      datosParse=JSON.parse(datos);


    Highcharts.chart('chartPrecio', {
        chart: {
          type: 'column'
        },
        title: {
          text: 'Reporte del total de dinero a pagar por operador'
        },
        subtitle: {
          text: ''
        },
        xAxis: {
          type: 'category'
        },
        yAxis: {
          title: {
            text: 'Total de dinero a pagar por operador'
          }
      
        },
        legend: {
          enabled: false
        },
        plotOptions: {
          series: {
            borderWidth: 0,
            dataLabels: {
              enabled: true,
              format: 'S/.{point.y:.1f}'
            }
          }
        },
      
        tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>S/.{point.y:.2f}</b> de pago<br/>'
        },
      
        series: [
          {
            name: "Operador Telefonico",
            colorByPoint: true,
            data: datosParse
          }
        ]
      });
}
