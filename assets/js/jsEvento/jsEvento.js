var map;
var ubicacion;


function fncEventoModal(nombre,descripcion,lugar,Aforo,Latitud,longitud,inicioFecha,finFecha,inicioHora,finHora,banner,tipo,tipoNombr0e,IdEvento){
    //alert(Latitud + '55' + longitud);
    ubicacion = {lat: parseFloat(Latitud), lng: parseFloat(longitud) };
    //fncMoveToLocation(Latitud,longitud);
    
    initMap();
    if (tipo == "T") {
        document.getElementById('eventSave').disabled=false;
        document.getElementById('IdEvento').value= IdEvento;
    }
    else{
        document.getElementById('eventSave').disabled=true;
    }

    fncDatosModal(nombre,descripcion,lugar,inicioFecha);
}
function fncDatosModal(nombre,descripcion,lugar,inicioFecha){

    //var numero1 = document.getElementById("numero1").value;
    document.getElementById('eventTitle').innerHTML = nombre;
    document.getElementById('eventDescription').innerHTML = descripcion;
    document.getElementById('eventPlace').innerHTML = lugar;
    
   
    var r = inicioFecha.replace("-","/");
    //console.log(r);
    fncMostrarHora(r);  

}

function fncContarAforo(IdEvento){
    var parametros = {
        "p" : "xZ6rQTOHxk",
        "qr" : content,
        "di":id,
        "InicioFecha" : InicioFecha,
        "FinFecha" : FinFecha
};
$.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   '../modules/control_asistencia.php', //archivo que recibe la peticion
        type:  'GET', //método de envio
        beforeSend: function () {
                $("#resultado").val("Verificando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resultado").val(response);
                
        }
});
    
}




function fncMostrarHora(inicioFecha){
       
        $('#clock').countdown(inicioFecha, function(event) {
            $(this).html("El Evento Empezar&aacute; en: "+event.strftime('%D days %H:%M:%S').replace("days", "d" +"&iacute;"+"as"));
          });
      
}

function fncEliminarMap(){
    map = null;
    ubicacion= null;
}

function initMap() {
  map = new google.maps.Map(document.getElementById('mapi'), {
    center: ubicacion,
    zoom: 18,
    icon:image,
    styles: [
        {
            "featureType": "administrative",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": "-100"
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": 65
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": "50"
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": "-100"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "all",
            "stylers": [
                {
                    "lightness": "30"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "all",
            "stylers": [
                {
                    "lightness": "40"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#ffff00"
                },
                {
                    "lightness": -25
                },
                {
                    "saturation": -97
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [
                {
                    "lightness": -25
                },
                {
                    "saturation": -100
                }
            ]
        }
    ]
  });


  var image = '../icons/point.png';
  var beachMarker = new google.maps.Marker({
    position: ubicacion,
    map: map,
    icon: image
  });

}


function revisarFecha() {

    var inicioFecha = new Date(document.getElementById('fechaInicio').value);
    var finFecha = new Date(document.getElementById('fechaFin').value);
    var today = new Date();
    if (inicioFecha.getTime() > finFecha.getTime()) {
      alert("The first date is after the second date!");
    }  
  }


   

