$(function () {
    // $('.js-basic-example').DataTable({
    //     // dom: 'Bfrtip',
    //     "searching": false,
    //     "responsive" : true,
    //     "language"   : {
    //       "lengthMenu":     "Mostrar _MENU_ registros",
    //       "search":         "Buscar:",
    //       "info":           "Mostrando _START_ hasta _END_ de _TOTAL_ registros",
    //       "infoEmpty":      "Mostrando 0 hasta 0 de 0 registros",
    //       "zeroRecords":    "No existen registros de búsqueda",
    //       "paginate": {
    //         "first":      "Primero",
    //         "last":       "Último",
    //         "next":       "Siguiente",
    //         "previous":   "Anterior"
    //       }
    //     }
    //     // initComplete: function () {
    //     //     this.api().columns().every( function () {
    //     //         var column = this;
    //     //         var select = $('<select><option value=""></option></select>')
    //     //             .appendTo( $(column.footer()).empty() )
    //     //             .on( 'change', function () {
    //     //                 var val = $.fn.dataTable.util.escapeRegex(
    //     //                     $(this).val()
    //     //                 );
 
    //     //                 column
    //     //                     .search( val ? '^'+val+'$' : '', true, false )
    //     //                     .draw();
    //     //             } );
 
    //     //         column.data().unique().sort().each( function ( d, j ) {
    //     //             select.append( '<option value="'+d+'">'+d+'</option>' )
    //     //         } );
    //     //     } );
    //     // },
    //     // buttons: [
    //     //     'copy', 'csv', 'excel', 'pdf', 'print'
    //     // ]
    // });
    fncHabilitarDatatable(false);

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});

function fncHabilitarDatatable(class_tabla = 'js-basic-example', searching = false) {
    
    var table = $('.' + class_tabla).DataTable();
    table.destroy();
    // alert("fdf");
    $('.' + class_tabla).DataTable({
        // dom: 'Bfrtip',
        "searching": searching,
        "responsive" : true,
        "language"   : {
          "lengthMenu":     "Mostrar _MENU_ registros",
          "search":         "Buscar:",
          "info":           "Mostrando _START_ hasta _END_ de _TOTAL_ registros",
          "infoEmpty":      "Mostrando 0 hasta 0 de 0 registros",
          "zeroRecords":    "No existen registros de búsqueda",
          "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
          }
        }
        // initComplete: function () {
        //     this.api().columns().every( function () {
        //         var column = this;
        //         var select = $('<select><option value=""></option></select>')
        //             .appendTo( $(column.footer()).empty() )
        //             .on( 'change', function () {
        //                 var val = $.fn.dataTable.util.escapeRegex(
        //                     $(this).val()
        //                 );
 
        //                 column
        //                     .search( val ? '^'+val+'$' : '', true, false )
        //                     .draw();
        //             } );
 
        //         column.data().unique().sort().each( function ( d, j ) {
        //             select.append( '<option value="'+d+'">'+d+'</option>' )
        //         } );
        //     } );
        // },
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    });
}