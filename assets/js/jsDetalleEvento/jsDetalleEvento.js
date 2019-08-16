
function fnc_DetalleEvento_verEtapas(s){

    var parametros = {
            "IdDetalleEvento" : s,
            "p" : "futin",
    };
    $.ajax({
            data:  parametros,
            url:   '../modules/detalle_eventoCronograma.php',
            type:  'GET',
            beforeSend: function () {
                    //$("#Cronograma").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                    //$("#Cronograma").html(response);
                    

                  
                    console.log(response);
                   console.log(response['0']);

                                

            }
    });
}
    

// function fnc_DetalleEvento_AgregarFechas(){

//     var parametros = {
//             "valorCaja1" : valorCaja1,
//             "valorCaja2" : valorCaja2
//     };
//     $.ajax({
//             data:  parametros,
//             url:   'ejemplo_ajax_proceso.php',
//             type:  'post',
//             beforeSend: function () {
//                     $("#resultado").html("Procesando, espere por favor...");
//             },
//             success:  function (response) {
//                     $("#resultado").html(response);
//             }
//     });
// }