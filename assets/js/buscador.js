function checkLoginPorte(){
     var userOK = 0;
     var porteOK = 0;
     var cookieEntera = document.cookie;
     var quitaEspacios = cookieEntera.split(" ");
     for (item2 in quitaEspacios){
         var cookieTokens = quitaEspacios[item2].split("=");
         for( item in cookieTokens ){
             var name = cookieTokens[item].split("=");
             if(name[0] == "user"){
                 userOK = 1;
             }
         }
     }
         
    for (item2 in quitaEspacios){
         var cookieTokens = quitaEspacios[item2].split("=");
         for( item in cookieTokens ){
             if(cookieTokens[0] == "tipo_usuario"){
                var lastChar = cookieTokens[1].substr(cookieTokens[1].length - 1);
                if(lastChar == ";")
                    cookieTokens[1] = cookieTokens[1].slice(0 ,-1);
                if(cookieTokens[1] == "porteador"){
                    porteOK = 1;
                }
             }
         }
     }
     
     return (userOK && porteOK);
}

function getDimensiones(tipo){

    var result;

    switch(tipo){
        case "1":
            var dimensiones;
            var pesoTodo;
            var unidades1 = $(".espe-1.alto-ancho :selected").text();
            var alto = $(".espe-1.alto").val();
            var ancho = $(".espe-1.ancho").val();
            var largo = $(".espe-1.largo").val();
            if(alto == "")
                alto = "No Especificado";
            if(ancho == "")
                ancho = "No Especificado";    
            if(largo == "")
                largo = "No Especificado";
                
            dimensiones = "Alto/Ancho/Largo: " + alto + " / " + ancho + " / " + largo + " (" + unidades1 + ")";
            
            var pesoTipo = $(".espe-1.tipo-peso :selected").text();
            var peso = $(".espe-1.peso").val();
            if(peso == "")
                peso = "No Especificado";
            
            var pesoTodo = "Peso: " + peso + " (" + pesoTipo + ")";
            
            var numeroPales = $(".espe-1.pales").val();
            
            if(numeroPales == ""){
                numeroPales = "No Especificado";
            }
                
            var pales = "Numero de pal\u00E9s: " + numeroPales;
            
            result = dimensiones + "; " + pesoTodo + "; " + pales;
            
            break;
            
        case "2":
            var dimensiones;
            var pesoTodo;
            var unidades1 = $(".espe-2.alto-ancho :selected").text();
            var alto = $(".espe-2.alto").val();
            var ancho = $(".espe-2.ancho").val();
            var largo = $(".espe-2.largo").val();
            if(alto == "")
                alto = "No Especificado";
            if(ancho == "")
                ancho = "No Especificado";    
            if(largo == "")
                largo = "No Especificado";
                
            dimensiones = "Alto/Ancho/Largo: " + alto + " / " + ancho + " / " + largo + " (" + unidades1 + ")";
            
            var pesoTipo = $(".espe-2.tipo-peso :selected").text();
            var peso = $(".espe-2.peso").val();
            if(peso == "")
                peso = "No Especificado";
            
            var pesoTodo = "Peso: " + peso + " (" + pesoTipo + ")";
            
            result = dimensiones + "; " + pesoTodo;
            
            break;
            
        case "3":
            var liquido = $(".espe-3.liquido :selected").text();
            var volumen = $(".espe-3.volumen").val();
            
            if(volumen == "")
                volumen = "No Especificado";
                
            result = "Volumen de liquido: " + volumen + " (" + liquido + ")";
            
            break;
            
        case "4":
            var dimensiones;
            var pesoTodo;
            var unidades1 = $(".espe-4.alto-ancho :selected").text();
            var alto = $(".espe-4.alto").val();
            var ancho = $(".espe-4.ancho").val();
            var largo = $(".espe-4.largo").val();
            if(alto == "")
                alto = "No Especificado";
            if(ancho == "")
                ancho = "No Especificado";    
            if(largo == "")
                largo = "No Especificado";
                
            dimensiones = "Alto/Ancho/Largo: " + alto + " / " + ancho + " / " + largo + " (" + unidades1 + ")";
            
            var pesoTipo = $(".espe-4.tipo-peso :selected").text();
            var peso = $(".espe-4.peso").val();
            if(peso == "")
                peso = "No Especificado";
            
            var pesoTodo = "Peso: " + peso + " (" + pesoTipo + ")";
            
            var especie = $(".espe-4.especie").val();
            if(especie == "")
                especie = "No Especificado";
                
            especie = "Especie Animal: " + especie;
            
            var ejemplares = $(".espe-4.ejemplares").val();
            if(ejemplares == "")
                ejemplares = "No Especificado";
                
            ejemplares = "Numero de ejemplares: " + ejemplares;    
                
            result = dimensiones + "; " + pesoTodo + "; " + especie + "; " + ejemplares;
            
            break;
            
        case "5":
            var result = $(".espe-5.descripcion").val();
            if(result == "")
                result = "No Especificado";
            
            break;
    }
    
    return result;
}

function validatePublicarPorte(){
    var login = checkLoginPorte();
    var result = true;

    if(!login){
        jQuery('.overlay').fadeIn( function() { 
    		jQuery('.js-modal-login3').fadeIn().css('display','inline-block'); 
        });
        
        result = false;
        return result;
    }
    
    
    var origen = $(".env-publi .origen-input").val();    
    var destino = $(".env-publi .destino-input").val();
    
    if(origen == "" || destino == ""){
        $.alert({
        	title:"",
        	confirmButton:"Aceptar",
	        content:"Debe seleccionar un origen y un destino!"}
        );
        
        result = false;
        return result;
    }
    
    var carga = $(".env-publi .tipo-cargas select :selected").text();
    var tipoDimensiones = $(".especificaciones.active").attr("data-especifica");
    if(tipoDimensiones != undefined)
        var dimensiones = getDimensiones(tipoDimensiones);
    if(dimensiones == undefined)
        dimensiones = "No Especificado";
        
    $(".env-publi .dimensiones").val(dimensiones);
    
    return result;
}

$(document).ready(function(){
	
	$(".trans-publi button.publicar-ruta").click(function(){
        var origen = $(".trans-publi .origen-input").val();
        var destino = $(".trans-publi .destino-input").val();
        if(origen == "" || destino == ""){
            $.alert({
        		title:"",
        		confirmButton:"Aceptar",
        		content:"Debe seleccionar un origen y un destino!"}
	        );
            return;
        }  
        var recogida = $(".trans-publi .input-recogida").val();
        var entrega = $(".trans-publi .input-entrega").val();
        var vehiculos = [];
        
        $(".trans-publi .vehiculo ul li").each(function(){
            var item = $(this).text().slice(0,-1);
            vehiculos.push(item);
        });
        
        var presu = $(".trans-publi .input-presu").val();
        var descrip = $(".trans-publi .descripcion textarea").val();
        
        var checkOrigen = 0;
        var checkDestino = 0;
        var checkRecogida = 0;
        var checkEntrega = 0;
        
        if($(".check-trans-origen").is(":checked")){
            checkOrigen = 1;
        }
        if($(".check-trans-destino").is(":checked")){
            checkDestino = 1;
        }
        if($(".check-trans-recogida").is(":checked")){
            checkRecogida= 1;
        }
        if($(".check-trans-entrega").is(":checked")){
            checkEntrega= 1;
        }
        
        $.ajax({

			beforeSend: function(){

			},
			url: "includes/main-buscador/publicar-ruta.php",
			type: "POST",


			data: {
				"origen": origen,
				"destino": destino,
				"recogida": recogida,
				"entrega": entrega,
				"vehiculos": vehiculos,
				"presu": presu,
				"descrip": descrip,
				"checkOrigen":checkOrigen,
				"checkDestino":checkDestino,
				"checkRecogida":checkRecogida,
				"checkEntrega":checkEntrega,
			},

			success: function(data){
    			window.location="index.php";
            },

			error: function(jqXHR,estado,error) {
			    window.location="index.php";
		    	console.log(estado);
		    	console.log(error);
		    },

			complete: function(jqXHR,estado) {
		    	console.log(estado);
		    },

			timeout: 10000
		});

	});
	
});
