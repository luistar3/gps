	
    $('document').ready(function(){
        listarChip();
        fnc_reporteCantidadChipsPorOperador();

    });

    
    $('#boton').click(function(){
        listarPersonas();
    });
    var listarChip = function(){

        var idioma = {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                 }
        }

        var table = $('#tablaListarChip').DataTable({
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
                  return('<a href="javascript:;"><i class="icon-copy fa fa-calendar" aria-hidden="true"></i> calendar</a>');
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
            
            { "defaultContent": '<div class="dropdown"><a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a>	<a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a><a class="dropdown-item"  id = "delete" href="#"><i class="fa fa-trash"></i> Delete</a>	</div>	</div>'}
            
            
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
        
        $('#tablaDatos tbody').on( 'click', '#delete', function () {
        var datos = table.row( $(this).parents('tr') ).data();
        console.log(datos);
         datos =null;
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

    console.log(dati);
    console.log(ed);
   
}
