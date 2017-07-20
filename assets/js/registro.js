$(document).ready(function(){

    $(".paso1 button.next").click(function(){

        var negocio = $(".paso1 input.negocio").val();
        
        var nombre = $(".paso1 input.nombre").val();
        if(nombre == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        
        var apellidos = $(".paso1 input.apellidos").val();
        if(apellidos == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var cp = $(".paso1 input.cp").val();
        if(cp == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var direccion = $(".paso1 input.direccion").val();
        if(direccion == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var cif = $(".paso1 input.cif").val();
        if(cif == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var ciudad = $(".paso1 input.ciudad").val();
        if(ciudad == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var comunidad = $(".paso1 input.comunidad").val();
        if(comunidad == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var pais = $(".paso1 input.pais").val();
        if(pais == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var movil = $(".paso1 input.movil").val();
        if(movil == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var email = $(".paso1 input.email").val();
        if(email == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var pass = $(".paso1 input.pass").val();
        if(pass == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        var pass2 = $(".paso1 input.pass2").val();
        if(pass2 == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Por favor rellene todos los datos obligatorios"}
	        );
            return;
        }
        
        if(pass != pass2){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Las contrase\u00f1as deben ser iguales"}
	        );
            return;
        }

        $.ajax({
        
        	beforeSend: function(){
        
        	},
        	url: "paso1-action.php",
        	type: "POST",
        
        
        	data: {
        	    "negocio":negocio,
        		"nombre": nombre,
        		"apellidos": apellidos,
        		"cp": cp,
        		"direccion": direccion,
        		"cif": cif,
        		"ciudad": ciudad,
        		"provincia": comunidad,
        		"pais": pais,
        		"movil": movil,
        		"email": email,
        		"pass": pass,

        	},
        
        	success: function(data){
        	   if(data)
        	       $(".paso1 .result").html(data);
        	   else
        	       window.location = ("registroTrans2.php");
        	},
        
        	error: function(jqXHR,estado,error) {
            	console.log(estado);
            	console.log(error);
            },
        
        	complete: function(jqXHR,estado) {
            	console.log(estado);
            },
        
        	timeout: 10000
        });

    });
    
    $(".paso2 button.next").click(function(){
    
        if($(".paso2 .tipo-transporte input[type=checkbox]:checked").length == 0){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Debe seleccionar al menos un tipo de veh\u00edculo"}
	        );
            return;
        }
        
        checks = [];
        
        $(".paso2 .tipo-transporte :checked").each(function(){
            var cla = $(this).attr("class");
            checks.push($(".paso2 label."+cla).text());
        });

     $.ajax({

			beforeSend: function(){

			},
			
			url: "paso2-action.php",
			type: "POST",


			data: {

				"checks": checks,

			},

			success: function(data){
			     window.location = ("registroTrans3.php");
			 },

			error: function(jqXHR,estado,error) {
		    	console.log(estado);
		    	console.log(error);
		    },

			complete: function(jqXHR,estado) {
		    	console.log(estado);
		    },

			timeout: 10000
		});

    });
    
    $(".paso3 .cont-img input").on("change", function(){
        var t = $(this);
		file = $(this).prop('files')[0];
		fr = new FileReader();
		fr.onload = function(e){
			$(t).siblings('img').attr("src", e.target.result);
		}
		fr.readAsDataURL($(this).prop('files')[0]);
	});

	$(".paso3 form").submit(function(event){
	    var coche = $(this).closest(".vehiculo-cargas").find("label.title").text();
	    $(this).find(".cocheT").val(coche);
		var formData = new FormData($(this)[0]);
		$.ajax({
			type:'POST',
			url: 'guardarFotoRegistro.php',
			data: formData,
			async: false,
			success: function(msg){
			     $(".paso3 .resultT").html(msg);
			},
			cache: false,
			contentType: false,
			processData: false,
		});
		event.preventDefault();
	});
    
    $(".registro-porteador button.aceptar").click(function(){

        var nombre = $(".datos-porteador .nombre").val();
        if(nombre == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Rellene todos los campos"}
	        );
            return;
        }
        
        var apellidos = $(".datos-porteador .apellidos").val();
        if (apellidos == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Rellene todos los campos"}
	        );
            return;
        }
        
        var email = $(".datos-porteador .email").val();
        if (email == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Rellene todos los campos"}
	        );
            return;
        }
        
        var telefono = $(".datos-porteador .telefono").val();
        if (telefono == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Rellene todos los campos"}
	        );
            return;
        }
        
        var contra = $(".datos-porteador .contra").val();
        if (contra == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Rellene todos los campos"}
	        );
            return;
        }
        
        var repite = $(".datos-porteador .repite").val();
        if (repite == ""){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Rellene todos los campos"}
	        );
            return;
        }
        
        if(contra != repite){
	        $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Los passwords no coinciden"}
	        );
        }
            
        
        $.ajax({

			beforeSend: function(){

			},
			url: "registro-porteador.php",
			type: "POST",


			data: {

    			"nombre": nombre,
				"apellidos": apellidos,
				"email": email,
				"telefono": telefono,
				"contra": contra,
				"repite": repite,
			},

			success: function(data){
    			if(data != "")
    			     $(".registro-porteador .result").html(data);
                else
                     window.location = ("index.php");
			 },

			error: function(jqXHR,estado,error) {
		    	console.log(estado);
		    	console.log(error);
		    },

			complete: function(jqXHR,estado) {
		    	console.log(estado);
		    },

			timeout: 10000
		});
    });
    
    $(".elegir-registro button").click(function(){

        var tipo = $(this).attr("class");
        $(".elegir-registro").fadeOut(function(){
           if(tipo == "porteador"){
               window.location = ("registroUser.php");
           }else{
               window.location = ("registroTrans1.php");
           }
        });
    });
    
    if ($('.paso4').length > 0 ) {
        $(".value-fianza").html("2.42%");
    }
    
    $(".fianza").on("input", function(){
        var value = $(this).val();
        $(".value-fianza").html(value + "%");
    });
    
});