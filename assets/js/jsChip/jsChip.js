	
    $('document').ready(function(){
       

      
        if ( document.getElementById( "chart5" )) {
            fnc_reporteCantidadChipsPorOperador();
            fnc_cantidadDeDineroPorOperador();
        }
        if ( document.getElementById( "tablaListarChip" )) {
            listarChip();

            $.validate({
              modules: 'security, toggleDisabled',
              onSuccess: function () {
                 
                  return true;
              }
          });
        }
      
      

    });

    

    $('#chipGuardar').click(function(){

        
      var chipNumero = document.getElementById('chipNumero').value;
      var chipTarifa = document.getElementById('chipTarifa').value;
      var chipFechaContrato = document.getElementById('chipFechaContrato').value;
      var chipOperador = document.getElementById('chipOperador').value;
      var chipTipo = document.getElementById('chipTipo').value;
      var parametros={
        "p": "xZ6rQTOHxk",
        "chipNumero": chipNumero,
        "chipTarifa": chipTarifa,
        "chipFechaContrato": chipFechaContrato,
        "chipOperador": chipOperador,
        "chipTipo": chipTipo
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
                            listarChip();
                            $('#chipCancelar').click();

                        } else if (response == '3'){
                            swal(
                                'Error!',
                                'El Numero ya Existe',
                              'error'
                            )
                        }else{
                          swal(
                            'Error!',
                            'Ups,El Registro No Fue Agregado',
                            'error'
                          )
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

        var idioma = '';
      

      //$('#tablaListarChip').empty(); // empty in case the columns change
       
        var table = $('#tablaListarChip').DataTable({
            "destroy":true,
            "deferRender": true,
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
                  return('<a href="javascript:;"><i class="icon-copy fa fa-calendar" aria-hidden="true"> _ '+data+'</i></a>');
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
            
            { "defaultContent": '<div class="dropdown"><a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a>	<a class="dropdown-item"  href="#"><i class="fa fa-pencil"></i> Edit</a><a class="dropdown-item"  id = "delete" href="#"><i class="fa fa-trash"></i> Delete</a>	</div>	</div>'}
            
            
            ],
            "language": idioma,
          
        	scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
                searchPlaceholder: "Search"
            },
            dom: 'Blfrtip',
            buttons: [
            'copy', 'csv', 'pdf', 'print'
            ]

        });
        
      $('#tablaListarChip tbody').on( 'click', '#delete', function () {
       
        var edatos = table.row( $(this).parents('tr') ).data();
        console.log(edatos);
         
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
