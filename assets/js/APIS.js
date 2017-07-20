function getDistance(source, destination, elemDistance, elemTime) {
    
    var distance = 1;
    
    var service = new google.maps.DistanceMatrixService();
    
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS"){
            var distance = response.rows[0].elements[0].distance.text;
            var duration = response.rows[0].elements[0].duration.text;
        }else{
            distance = "No ha sido posible medir la distancia";
            duration = "No ha sido psible determinar el tiempo";
        }
        
        $(elemDistance).html(distance);
        $(elemTime).html(duration);
    });

}

function getRoute(source, destination, idMap){

    var directionsDisplay;
    
    var directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
    map = new google.maps.Map(document.getElementById(idMap));
    directionsDisplay.setMap(map);
    
    var request = {
        origin: source,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
}


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(document).ready(function(){
    
    $(".input-auto").click(function(){
    
        var id = $(this).attr("id");    
    
        var autoComplete = new google.maps.places.Autocomplete(   
        document.getElementById(id), {
            /*
types: ['(regions)'],
            componentRestrictions: {country: "es"}
*/
        });

    });
    
    if($(".porte-detalles-container").length > 0){
        var get_origen = getParameterByName("origen");
        var get_destino = getParameterByName("destino");
        var elemDistancia = $(".info-distance");
        var elemTiempo = $(".info-time");
        
        getDistance(get_origen, get_destino, elemDistancia, elemTiempo);
        getRoute(get_origen, get_destino, 'cont-map-porte');
    }
    
    if($(".ruta-detalles-container").length > 0){
        var get_origen = getParameterByName("origen");
        var get_destino = getParameterByName("destino");
        var elemDistancia = $(".info-distance");
        var elemTiempo = $(".info-time");
        
        getDistance(get_origen, get_destino, elemDistancia, elemTiempo);
        getRoute(get_origen, get_destino, 'cont-map-ruta');
    }
    
});

