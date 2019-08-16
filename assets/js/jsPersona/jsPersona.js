function fncDescargarDiv(nombreDiv, nombreArchivo){
    // //*
    // var element = $("#graficos-canvasGeneral"); // global variable
    // var getCanvas; // global variable

    // // $("#btn-Preview-Image").on('click', function () {
    //      html2canvas(element, {
    //      onrendered: function (canvas) {
    //             $("#previewImage").append(canvas);
    //             getCanvas = canvas;
    //          }
    //      });
    // // });
    // //*

    // html2canvas($("#graficos-canvasGeneral"), {
    //     onrendered: function(canvas) {
    //         theCanvas = canvas;
    //         document.body.appendChild(canvas);

    //         // Convert and download as image 
    //         Canvas2Image.saveAsPNG(canvas); 
    //         $("#previewImage").append(canvas);
    //         // Clean up 
    //         //document.body.removeChild(canvas);
    //     }
    // });

    // html2canvas($('#graficos-canvasGeneral').get(0)).then(function (canvas) {
    //   var base64encodedstring = canvas.toDataURL("image/jpeg", 1);
    //   $('#previewImage').attr('src', base64encodedstring);
    // });

    // var element = $("#" + "graficos-" + nombreDiv)[0];


    // var element = $("#" + nombreDiv)[0];
    // html2canvas(element).then(function (canvas) {
    //     var myImage = canvas.toDataURL();
    //     downloadURI(myImage, nombreArchivo + ".pdf");
    var element = $("#" + nombreDiv)[0];
    $('html,body').scrollTop(0);
    html2canvas(element, { scale: 2} ).then(function (canvas) {
      // var ctx = canvas.getContext('2d');
      //
      // ctx.webkitImageSmoothingEnabled = false;
      // ctx.mozImageSmoothingEnabled = false;
      // ctx.imageSmoothingEnabled = false;
      
      var imgData = canvas.toDataURL(
        'image/png', 1.0);
      //Get the original size of canvas/image
      var img_w = canvas.width;
      var img_h = canvas.height;

      // alert(img_w)
      // alert(img_h)

      // var myImage = canvas.toDataURL();
      var pdf = new jsPDF('p', 'mm', [img_w, img_h]);
      // var width = pdf.internal.pageSize.getWidth();
      // var height = pdf.internal.pageSize.getHeight();
      pdf.addImage(imgData, 'PNG', 0, 0, img_w, img_h); //addImage(image, format, x-coordinate, y-coordinate, width, height)
       
      // doc.addPage();

      pdf.save(nombreArchivo + ".pdf");

    });

  
}

function fncDescargarDiv2(nombreDivFront, nombreDivBack, nombreArchivo){

    var elementFront = $("#" + nombreDivFront)[0];
    var elementBack = $("#" + nombreDivBack)[0];

    var img_w = 548;
    var img_h = 860;

    var pdf = new jsPDF('p', 'mm', [img_w, img_h]);

    html2canvas(elementFront, {scale: 2} ).then(function (canvasFront) {

      pdf.addPage();
      var imgDataFront = canvasFront.toDataURL('image/png', 1.0);
      pdf.addImage(imgDataFront, 'PNG', 0, 0, img_w, img_h); 

    });

    html2canvas(elementBack, {scale: 2} ).then(function (canvasBack) {

      pdf.addPage();
      var imgDataBack = canvasBack.toDataURL('image/png', 1.0);
      pdf.addImage(imgDataBack, 'PNG', 0, 0, img_w, img_h);          

    });

    pdf.save(nombreArchivo + ".pdf");

}


function downloadURI(uri, name) {
    var link = document.createElement("a");

    link.download = name;
    link.href = uri;
    document.body.appendChild(link);
    link.click();
    // clearDynamicLink(link); 
    var element = link;
    element.parentNode.removeChild(element);
}


function fnc_buscarApellido(){
    removeTableBody();
    var apellidoPaternoBusqueda = document.getElementById("apellidoPaternoBusqueda").value;
    var apellidoMaternoBusqueda = document.getElementById("apellidoMaternoBusqueda").value;
    var dniBusqueda = document.getElementById("dnibusqueda").value;
    var nombreBusqueda = document.getElementById("nombreBusqueda").value

    //var idEvento  = document.getElementById("IdEvento").value;
    var parametros = {
        "p"         : "xP6riiTOHxk",
        "apellidoPaterno": apellidoPaternoBusqueda,
        "apellidoMaterno": apellidoMaternoBusqueda,
        "dni"       : dniBusqueda,
        "nombre"    : nombreBusqueda
       
    };

    var table = $('#table_ids').DataTable();
    table.clear();
    table.destroy();

    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   '../modules/Persona.php', //archivo que recibe la peticion
            type:  'GET', //método de envio
            beforeSend: function () {
                    $("#resultado").val("Verificando, espere por favor...");
                    
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                   
                    if (Object.keys(response).length) {
                        $("#resultado").val(Object.keys(response).length);

                        for (var i = 0; i < response.length; i++) {  
                            var activo = 'class="bg-success"';
                            var activoboton = '';
                            if (response[i]["Estado"] == '0') {
                                activo = 'class="bg-danger"';
                                activoboton = 'disabled';
                            }
                            
                            $('#cuerpoTabla').append('<tr ' + activo + ' >' + '<td>' + response[i]["Dni"] + '</td>' + '<td>' + response[i]["Nombre"] + '</td>' + '<td>' + response[i]["ApePat"] + '</td>' + '<td>' + response[i]["ApeMat"] + '</td>' + '<td>' + response[i]["NombreTipo"] + '</td>' + '<td>' + response[i]["Celular"] + '</td>' + '<td>' + response[i]["Correo"] + '</td>'+'<td> <button '+activoboton+'  class="btn btn-primary btn-block btn-lg m-t-10 waves-effect" onclick="fnc_RegistrarUsuarioEvento(this,'+response[i]["IdPersona"]+')"> ' +"Agregar" +'</button> </td></tr>' );    
                        }

                    
                    }else{
                        $("#resultado").val( "0 resultados");
                    }

                    //var myJSON = JSON.stringify(response);

                   //console.log(myJSON);  
                     recargartabla();
                    

            }
    });
    

}

function recargartabla() {
    
    // var table = $('#table_idse').DataTable();
    
    // table.clear.().redraw();

    var table = $('#table_ids').DataTable();
   
    table.redraw();
    
}

//$.when(fnc_buscarApellido()).recargartabla(function2());

function removeTableBody(){
    $('#cuerpoTabla').empty();
 var table = $('#table_ids').DataTable();
    //table.Rows.Clear();
    // table.redraw();

    //var table = $('#table_ids').DataTable();
    //table.dataTable().fnDestroy();
   
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function fnc_RegistrarUsuarioEvento(btn,idPersona){

    var idEvento  = document.getElementById("IdEventoApellido").value;
    //alert(idPersona+' '+idEvento);
    var parametros = {
        "p" : "TbGGr4Jm",
        "IdEvento" : idEvento,
        "IdPersona" : idPersona
       
    };
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   '../modules/Registro.php', //archivo que recibe la peticion
            type:  'GET', //método de envio
            beforeSend: function () {
                   // $("#resultado").val("Verificando, espere por favor...");
                    
            },
            success:  function (respuesta) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                
               if (respuesta["btrespuesta"]==1) {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);

                bootbox.alert({
                    message: respuesta["mensaje"],
                    size: 'small'
                });
               // alert(respuesta["mensaje"]);
               } else {

                bootbox.alert({
                    message: respuesta["mensaje"],
                    size: 'small'
                });
                //alert(respuesta["mensaje"]);
               }
                


            }
        });
}

function fnc_PersonaAgregarNuevaPersonaEvento(){
    var IdEvento = document.getElementById("personaIdEvento").value;
    var dni = document.getElementById("idDni").value;
    var nombre = document.getElementById("nombre").value;
    var ApePat = document.getElementById("apellidoPaterno").value;
    var ApeMat = document.getElementById("apellidoMaterno").value;
    var fechaFin = document.getElementById("fechaFin").value;
    var fechaInicio = document.getElementById("fechaInicio").value;
    var correo = document.getElementById("xcorreo").value;
    var celular = document.getElementById("celular").value;
    var dependencia = document.getElementById("dependencia").value;
    var estamento = document.getElementById("estamento").value;
    var unidadOrganica = document.getElementById("unidadOrganica").value;
    var cargo = document.getElementById("cargo").value;
    var dependenciaCargo = document.getElementById("dependenciaCargo").value;
    var estadoPersona = document.getElementById("estadoPersona").value;
    
    var parametros = {
        "p":"J9Y0B7rh86",
        "IdEvento":IdEvento,
        "dni":dni,
        "nombre":nombre,
        "ApePat":ApePat,
        "ApeMat":ApeMat,
        "fechaFin":fechaFin,
        "fechaInicio":fechaInicio,
        "correo":correo,
        "celular":celular,
        "dependencia":dependencia,
        "estamento":estamento,
        "unidadOrganica":unidadOrganica,
        "cargo":cargo,
        "dependenciaCargo":dependenciaCargo,
        "estadoPersona":estadoPersona
    };

   
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   '../modules/persona.php', //archivo que recibe la peticion
        type:  'GET', //método de envio
        beforeSend: function () {
               // $("#resultado").val("Verificando, espere por favor...");
                
        },
        success:  function (respuesta) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            if (respuesta["respuesta"]["tipo"]==1) {
                

                bootbox.alert({
                    message: respuesta["respuesta"]["mensaje"],
                    size: 'small'
                });
               // alert(respuesta["mensaje"]);
               } else {

                bootbox.alert({
                    message: respuesta["respuesta"]["mensaje"],
                    size: 'small'
                });
                //alert(respuesta["mensaje"]);
               }


        }
    });
        
}




$(document).ready(function () {

    $('#btn').attr("disabled", true);

    $('#idDni, #nombre, #apellidoPaterno, #apellidoMaterno,#xcorreo').keyup(function () {
        var buttonDisabled = $('#idDni').val().length == 0 || $('#nombre').val().length == 0 || $('#apellidoPaterno').val().length == 0 || $('#apellidoMaterno').val().length == 0 || $('#xcorreo').val().length == 0 ;
        $('#btn').attr("disabled", buttonDisabled);
    });
});


function SoloNumeros(evt){
    if(window.event){//asignamos el valor de la tecla a keynum
     keynum = evt.keyCode; //IE
    }
    else{
     keynum = evt.which; //FF
    } 
    //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
    if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
     return true;
    }
    else{
     return false;
    }
   }






