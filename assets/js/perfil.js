var photoExample = "assets/images/profile.png";

function checkExists(text){
    var exists = 0;

    $(".lista-agregados li").each(function(){
        if($(this).find(".item-vehiculo").text() == text){
            exists = 1;
        }else{
            console.log("distinto");
        }
            
    });
    
    return exists;
}

function scheduler(){
   $(".vehiculos-perfil .cerrar").click(function(){
	   $(this).parent().parent().remove();
   });
}

function validatePerfilPorteador(){
    var nombre = $(".datos-perfil-porteador .informacion input[name='nombre']").val();
    if(nombre == ""){
        $.alert({
        	title:"",
        	confirmButton:"Aceptar",
	        content:"Rellene el campo nombre para actualizar"}
        );
        return false;
    }
    
   var apellidos = $(".datos-perfil-porteador .informacion input[name='apellidos']").val();
   if(apellidos == ""){
        $.alert({
        	title:"",
        	confirmButton:"Aceptar",
	        content:"Rellene el campo apellidos para actualizar"}
        );
        return false;
    }
    
   var email = $(".datos-perfil-porteador .informacion input[name='email']").val();
   if(email == ""){
        $.alert({
        	title:"",
        	confirmButton:"Aceptar",
	        content:"Rellene el campo email para actualizar"}
        );
        return false;
   }
    
   var telefono = $(".datos-perfil-porteador .informacion input[name='telefono']").val();
   if(telefono == ""){
        $.alert({
        	title:"",
        	confirmButton:"Aceptar",
	        content:"Rellene el campo telefono para actualizar"}
        );
        return false;
   }
    
   var contra = $(".datos-perfil-porteador .informacion input[name='contra']").val();
   if(contra == ""){
        $.alert({
        	title:"",
        	confirmButton:"Aceptar",
	        content:"Rellene el campo contraseña para actualizar"}
        );
        return false;
   }
    
   var repecontra = $(".datos-perfil-porteador .informacion input[name='repecontra']").val();
   
   if(contra != repecontra){
       $.alert({
        	title:"",
        	confirmButton:"Aceptar",
	        content:"Las contraseñas no coinciden"}
        );
       return false;
   }
   
   return true;
}

function validatePerfilTrans(){
    var contra = $(".datos-perfil-transportista .informacion input[name='contra']").val();
    var repe = $(".datos-perfil-transportista .informacion input[name='repecontra']").val();
    
    if(contra != repe){
        $.alert({
        	title:"",
        	confirmButton:"Aceptar",
	        content:"Los passwords deben ser iguales!"}
        );
        return false;
    }
    
    return true;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

$(document).ready(function(){
    
    scheduler();
    
    $(".deleter-porte").click(function(){
        var name = $(this).find('input').attr('value');
        $.confirm({
            title: false,
            content: 'Deseas eliminar este anuncio?',
            confirmButton: 'Si',
            cancelButton: 'No',
            confirm: function(){
                
                $.ajax({

        			beforeSend: function(){
        
        			},
        			url: "functions/delete-porte.php",
        			type: "POST",
        
        
        			data: {
            			'name': name,
        			},
        
        			success: function(data){
        			     window.location = ("miperfil.php");
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
            }
        });
    });
    
    $(".deleter-ruta").click(function(){
        var name = $(this).find('input').attr('value');
        $.confirm({
            title: false,
            content: 'Deseas eliminar este anuncio?',
            confirmButton: 'Si',
            cancelButton: 'No',
            confirm: function(){
                $.ajax({

        			beforeSend: function(){
        
        			},
        			url: "functions/delete-ruta.php",
        			type: "POST",
        
        
        			data: {
            			'name': name,
        			},
        
        			success: function(data){
        			 console.log(data);
        			     window.location = ("miperfil.php");
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
            }
        });
    });

    $(".vehiculos-perfil .add-vehicle").click(function(event){
        event.preventDefault();
   		var value = $(".vehiculos-perfil select").find(":selected").text();
   		var vehiculo = $(".vehiculos-perfil select").find(":selected").text();
   		var exists = checkExists(value);
   		if((value != "Seleccionar un Vehiculo") && (!exists)){
	   		$(".vehiculos-perfil ul").append("<li id='"+ value +"'><div><span>" + vehiculo + "</span><span class='cerrar'>X</span></div></li>");
	   		scheduler();
   		}
   		$(".vehiculos-perfil select").prop("selectedIndex",0);
    });


    $(".tabla-anuncios-porteador span.js-tab-perfil").click(function(){
       var typen = $(this).attr("name");
       var close = $(this).closest(".single-tab");
       if(!($(this).hasClass("active"))){
           $(".tabla-anuncios-porteador span").removeClass("active");
           $(".tabla-anuncios-porteador .single-tab").removeClass("active");
           $(this).addClass("active");
           $(close).addClass("active");
           $(".tabla-anuncios-porteador .datos-tabla .tabla-porteador").css("display","none");
           $(".tabla-anuncios-porteador .datos-tabla ." + typen).css("display","block");
       }
    });
    
    $(".tabla-anuncios-transportista span.js-tab-perfil").click(function(){
       var typen = $(this).attr("name");
       var close = $(this).closest(".single-tab");
       if(!($(this).hasClass("active"))){
           $(".tabla-anuncios-transportista span").removeClass("active");
           $(".tabla-anuncios-transportista .single-tab").removeClass("active");
           $(this).addClass("active");
           $(close).addClass("active");
           $(".tabla-anuncios-transportista .datos-tabla .tabla-transportista").css("display","none");
           $(".tabla-anuncios-transportista .datos-tabla ." + typen).css("display","block");
       }
    });
    
    $(".datos-perfil-porteador .cont-imagen input").on("change", function(){
        $(".datos-perfil-porteador .hay-foto").val("0");
		file = $(this).prop('files')[0];
		fr = new FileReader();
		fr.onload = function(e){
			$(".datos-perfil-porteador .cont-imagen .cont-img img").attr("src", e.target.result);
		}
		fr.readAsDataURL($(this).prop('files')[0]);
	});
    
    $(".datos-perfil-porteador .cont-imagen .deleter").click(function(){
        $(".datos-perfil-porteador .cont-imagen img").attr("src", photoExample);
        $(".datos-perfil-porteador .cont-imagen input").val("");
        $(".datos-perfil-porteador .hay-foto").val("0");
    });
    
    $(".registro-transportista .paso3 .changer input").on("change", function(){
        var id = $(this).attr("data-img");
		file = $(this).prop('files')[0];
		fr = new FileReader();
		fr.onload = function(e){
			$(".registro-transportista .paso3 .cont-img img#"+id).attr("src", e.target.result);
		}
		fr.readAsDataURL($(this).prop('files')[0]);
	});
    
    $(".datos-perfil-transportista .cont-imagen input").on("change", function(){
        $(".datos-perfil-transportista .hay-foto").val("0");
		file = $(this).prop('files')[0];
		fr = new FileReader();
		fr.onload = function(e){
			$(".datos-perfil-transportista .cont-imagen .cont-img img").attr("src", e.target.result);
		}
		fr.readAsDataURL($(this).prop('files')[0]);
	});
    
    $(".datos-perfil-transportista .cont-imagen .deleter").click(function(){
        $(".datos-perfil-transportista .cont-imagen img").attr("src", photoExample);
        $(".datos-perfil-transportista .cont-imagen input").val("");
        $(".datos-perfil-transportista .hay-foto").val("0");
    });
        
    $(".pagos-trans").click(function(event){
        event.preventDefault();
        
        checks = [];
    
        $(".metodos-pago :checked").each(function(){
            var cla = $(this).attr("class");
            checks.push($(".metodos-pago label."+cla).text());
        });
        
        $.ajax({

			beforeSend: function(){

			},
			url: "includes/perfil/updateTransPagos.php",
			type: "POST",


			data: {
    			 "checks": checks,
			},

			success: function(data){
			     $(".datos-perfil-transportista .result-pagos").html(data);
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
    
    $(".vehiculos-trans").click(function(event){
        event.preventDefault();
        vehiculos = [];
    
        $(".vehiculos-perfil .vehi-add ul li").each(function(){
            var item = $(this).text().slice(0,-1);
            vehiculos.push(item);
        });
        
        $.ajax({

			beforeSend: function(){

			},
			
			url: "includes/perfil/updateTransVehiculos.php",
			type: "POST",


			data: {
    			 "vehiculos": vehiculos,
			},

			success: function(data){
			     $(".datos-perfil-transportista .result-vehiculos").html(data);
			     $(".datos-perfil-transportista .result-recordar").html("RECUERDE AGREGAR LAS CARGAS A LOS VEHICULOS, Y ASI PUEDAN ENCONTRAR MEJOR SUS RUTAS PUBLICADAS!!!");
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
    
   $(".button-cargas").click(function(){
       cargas = [];

        $(".item-vehiculo").each(function(){
            var title = $(this).find("label.title").text();
            $(this).find(".cargasOK").each(function(){
                $(this).find(":checked").each(function(){
                   var cla = $(this).attr("class");
                   var nombre = $(".cargasOK label." + cla).first().text();
                   cargas.push(title + "#" + nombre);
                });
            });
        });
        
        $.ajax({

			beforeSend: function(){

			},
			
			url: "functions/actualizarCargas.php",
			type: "POST",


			data: {
    			 "cargas": cargas,
			},

			success: function(data){
			     $(".modificar-content result").html(data);
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
   
   $(".js-perfil-mensajes-trans").click(function(){
        $.ajax({

			beforeSend: function(){

			},
			
			url: "functions/resetearMensajesTransportista.php",
			type: "POST",


			data: {},

			success: function(data){},

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
   
   $(".js-perfil-mensajes-porte").click(function(){
       $.ajax({

			beforeSend: function(){

			},
			
			url: "functions/resetearMensajesPorteador.php",
			type: "POST",


			data: {},

			success: function(data){},

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
   
	function mostrar_contactos_porte(data_t, id){
		if(data_t == ""){
			var modal = 1;
	        jQuery('.overlay.overlay-miperfil').fadeIn( function() { 
	        	jQuery('.js-modal-box-' + modal ).fadeIn().css('display','inline-block');
	        });
	        $(".content-trans-realizar").append("<span class='item-realizar' trans='0'>No he realizado el porte con BlaBlaFurgo</span>");
        	$(".item-realizar").click(function(){
				$(".item-realizar").removeClass("active");
				$(this).addClass("active");
			});
		}else{
			$.ajax({
			
				url: "functions/get-nombres-trans.php",
				type: "POST",
				
				
				data: {
					'data_t': data_t,
				},
				
				success: function(data){
					ids = data_t.split("-");
					data = data.substring(0, data.length - 3);
					data = data.split("-");
					for(var i = 0; i < data.length; i++){
						var completo = data[i].split("+");
						$(".content-trans-realizar").append("<span class='item-realizar' trans='"+ids[i]+"'>"+ completo[0] +" "+ completo[1] +"</span>");
					}
					$(".content-trans-realizar").append("<span class='item-realizar' trans='0'>No he realizado el porte con BlaBlaFurgo</span>");
					var modal = 1;
			        jQuery('.overlay.overlay-miperfil').fadeIn( function() { 
			        	jQuery('.js-modal-box-' + modal ).fadeIn().css('display','inline-block');
			        });
			        $(".item-realizar").click(function(){
						$(".item-realizar").removeClass("active");
						$(this).addClass("active");
					});
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
		}
	}
   
   $(".js-realizar-porte").click(function(){
   		$(".content-trans-realizar").html("");
   		var id_porte = $(this).find(".id-porte-realizar").val();
   		$("#id-porte-hidden").val(id_porte);
   		$.confirm({
            title: false,
            content: 'Deseas dar por realizado este porte?',
            confirmButton: 'Si',
            cancelButton: 'No',
            confirm: function(){
                $.ajax({

        			url: "functions/get-contactos-porte.php",
        			type: "POST",
        
        
        			data: {
            			'id_porte': id_porte,
        			},
        
        			success: function(data){
    					mostrar_contactos_porte(data, id_porte);
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
            }
        });
   });
   
   $(".js-aceptar-realizar-porte").click(function(){
	   var realizado = $(this).closest(".js-modal-realizar").find(".item-realizar.active").attr("trans");
	   var id_porte = $(this).closest(".js-modal-realizar").find("#id-porte-hidden").val();
	   if(realizado == undefined){
	        $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Seleccione un transportista!"}
	        );
	        return;
	    }else if(realizado == "0"){
			 $.ajax({

    			url: "functions/delete-porte.php",
    			type: "POST",
    
    
    			data: {
        			'name': id_porte,
    			},
    
    			success: function(data){
    			     window.location = ("miperfil.php");
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
		}else{
			$(".js-modal-realizar").fadeOut(function(){
				$(".valorar-trans").fadeIn();
			});
			$(".aceptar-valorar").click(function(){
				var normalFill = $("#rateYo").rateYo("option", "rating");
				$.ajax({

	    			url: "functions/valoraciones_porte.php",
	    			type: "POST",
	    
	    
	    			data: {
	        			'name': id_porte,
	        			'trans': realizado,
	        			'valor': normalFill
	    			},
	    
	    			success: function(data){
	    			     window.location = ("miperfil.php");
	    			     console.log(data);
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
		}
   });
   
   function mostrar_contactos_ruta(data_t, id){
		if(data_t == ""){
			var modal = 1;
	        jQuery('.overlay.overlay-miperfil').fadeIn( function() { 
	        	jQuery('.js-modal-box-' + modal ).fadeIn().css('display','inline-block');
	        });
	        $(".content-porteador-realizar").append("<span class='item-realizar' porteador='0'>No he realizado la ruta con BlaBlaFurgo</span>");
        	$(".item-realizar").click(function(){
				$(".item-realizar").removeClass("active");
				$(this).addClass("active");
			});
		}else{
			$.ajax({
			
				url: "functions/get-nombres-porteadores.php",
				type: "POST",
				
				
				data: {
					'data_t': data_t,
				},
				
				success: function(data){
					ids = data_t.split("-");
					data = data.substring(0, data.length - 3);
					data = data.split("-");
					for(var i = 0; i < data.length; i++){
						var completo = data[i].split("+");
						$(".content-porteador-realizar").append("<span class='item-realizar' porteador='"+ids[i]+"'>"+ completo[0] +" "+ completo[1] +"</span>");
					}
					$(".content-porteador-realizar").append("<span class='item-realizar' porteador='0'>No he realizado la ruta con BlaBlaFurgo</span>");
					var modal = 1;
			        jQuery('.overlay.overlay-miperfil').fadeIn( function() { 
			        	jQuery('.js-modal-box-' + modal ).fadeIn().css('display','inline-block');
			        });
			        $(".item-realizar").click(function(){
						$(".item-realizar").removeClass("active");
						$(this).addClass("active");
					});
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
		}
	}
   
   $(".js-realizar-ruta").click(function(){
   		$(".content-porteador-realizar").html("");
   		var id_ruta = $(this).find(".id-ruta-realizar").val();
   		$("#id-ruta-hidden").val(id_ruta);
   		$.confirm({
            title: false,
            content: 'Ha realizado un porte en esta ruta?',
            confirmButton: 'Si',
            cancelButton: 'No',
            confirm: function(){
                $.ajax({

        			url: "functions/get-contactos-ruta.php",
        			type: "POST",
        
        
        			data: {
            			'id_ruta': id_ruta,
        			},
        
        			success: function(data){
    					mostrar_contactos_ruta(data, id_ruta);
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
            }
        });
   });
   
   $(".js-aceptar-realizar-ruta").click(function(){
   		var realizado = $(this).closest(".js-modal-realizar").find(".item-realizar.active").attr("porteador");
   		var id_ruta = $(this).closest(".js-modal-realizar").find("#id-ruta-hidden").val();
		if(realizado == undefined){
			$.alert({
				title:"",
				confirmButton:"Aceptar",
			    content:"Seleccione un cliente!"}
			);
			return;
		}else if(realizado == "0"){
			$.confirm({
	            title: false,
	            content: 'Desea borrar la ruta?',
	            confirmButton: 'Si',
	            cancelButton: 'No',
	            confirm: function(){
	                 $.ajax({

	        			beforeSend: function(){
	        
	        			},
	        			url: "functions/delete-ruta.php",
	        			type: "POST",
	        
	        
	        			data: {
	            			'name': id_ruta,
	        			},
	        
	        			success: function(data){
	        			 console.log(data);
	        			     window.location = ("miperfil.php");
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
	            },
	            cancel: function(){
					window.location = ("miperfil.php");     
				}
	        });
		}else{
			$(".js-modal-realizar").fadeOut(function(){
				$(".valorar-porteador").fadeIn();
			});
			$(".aceptar-valorar").click(function(){
				var normalFill = $("#rateYo").rateYo("option", "rating");
				$.ajax({

	    			url: "functions/valoraciones_ruta.php",
	    			type: "POST",
	    
	    
	    			data: {
	        			'name': id_ruta,
	        			'cliente': realizado,
	        			'valor': normalFill
	    			},
	    
	    			success: function(data){
		    			 $.confirm({
				            title: false,
				            content: 'Desea borrar la ruta?',
				            confirmButton: 'Si',
				            cancelButton: 'No',
				            confirm: function(){
				                 $.ajax({

				        			beforeSend: function(){
				        
				        			},
				        			url: "functions/delete-ruta.php",
				        			type: "POST",
				        
				        
				        			data: {
				            			'name': id_ruta,
				        			},
				        
				        			success: function(data){
				        			 console.log(data);
				        			     window.location = ("miperfil.php");
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
				            },
				            cancel: function(){
								window.location = ("miperfil.php");   
							}
				         });
	    			     console.log(data);
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
		}
   });
   
   $(function(){
	
		$("#rateYo").rateYo({
			rating: 3,
			fullStar: true
		});
		
	});
       
});