function GetCookie(name) {
    var arg=name+"=";
    var alen=arg.length;
    var clen=document.cookie.length;
    var i=0;
 
    while (i<clen) {
        var j=i+alen;
 
        if (document.cookie.substring(i,j)==arg)
            return "1";
        i=document.cookie.indexOf(" ",i)+1;
        if (i==0)
            break;
    }
 
    return null;
}

function getCookieValue(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	vars[key] = value;
	});
	return vars;
}
 
function aceptar_cookies(){
    var expire=new Date();
    expire=new Date(expire.getTime()+7776000000);
    document.cookie="cookies_surestao=aceptada; expires="+expire;
 
    var visit=GetCookie("cookies_surestao");
 
    if (visit == 1){
        popbox3();
    }
}
 
$(function() {
    var visit=GetCookie("cookies_surestao");
    if (visit==1){ popbox3(); }
});
 
function popbox3() {
    $('#overbox3').toggle();
}


function countChar(val){
	var len = val.value.length;
	$(".main-buscador .descripcion .count .number-count").html(len);
	if (len >= 500) {
	      val.value = val.value.substring(0, 500);
	} 
};

function checkLogin(){
     var userOK = 0;
     var transOK = 0;
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
             	console.log(cookieTokens[0]);
             	console.log(cookieTokens[1]);
                if(cookieTokens[1] == "transportista" || cookieTokens[1] == "transportista;"){
                    transOK = 1;
                }
             }
         }
     }

     console.log(userOK);
     console.log(transOK);
     
     return (userOK && transOK);
}

function scheduler1(){
   $(".vehiculo .cerrar").click(function(){
	   $(this).parent().parent().remove();
   });
}

function scrollMenu(){
	var wid = $(window).innerWidth();	
	
	if(wid > 991){
		$('.js-main-menu').css('display', 'block');
		$(".js-main-menu").removeClass('responsive-active');
	}else{
		if(!($('.js-main-menu').hasClass('responsive-active'))){
			$('.js-main-menu').css('display', 'none');
		}
		
	}
}

$(window).resize(function(){
    scrollMenu();
});

$(document).ready(function(){
	$(window).keydown(function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
			return false;
		}
	});

	function changeView(){
		$(".info-buscador").fadeOut();
		if($(".tabs .enviar").hasClass("current")){
			if($(".main-buscador #input-publicar").is(':checked')){
				$(".main-buscador .env-publi").delay(300).fadeIn();
			}else if($(".main-buscador #input-buscar").is(':checked')){
				$(".main-buscador .enviar-buscar").delay(300).fadeIn();
			}
			$(".lab-publi").html("Publicar Porte");
			$(".lab-buscar").html("Rutas Publicadas");
		}else if($(".tabs .transporte").hasClass("current")){
			if($(".main-buscador #input-publicar").is(':checked')){
				$(".main-buscador .trans-publi").delay(300).fadeIn();
			}else if($(".main-buscador #input-buscar").is(':checked')){
				$(".main-buscador .transportar-buscar").delay(300).fadeIn();
			}
			$(".lab-publi").html("Publicar Ruta");
			$(".lab-buscar").html("Buscar Porte");
		}
	}

	$(".main-buscador input:radio").on("change", function(){
		if($(this).attr('name') == 'buscar-radio'){
			$("input[name='publicar-radio']").prop("checked", false);
		}else if($(this).attr('name') == 'publicar-radio'){
    		if($(".home-content .tabs .current").text() == "Soy Transportista"){
    			console.log("pulso");
        		var login = checkLogin();
        		if(!login){
            		jQuery('.overlay').fadeIn( function() { 
                		jQuery('.js-modal-login2').fadeIn().css('display','inline-block'); 
                    });
                    $("input[name='publicar-radio']").prop("checked", false);
            		return;
        		}else{
            		$("input[name='publicar-radio']").prop("checked", true);
        		}
    		}
			$("input[name='buscar-radio']").prop("checked", false);
		}
		changeView();
	});
	
	$(".home-content .tabs span").click(function(){
		if(!($(this).hasClass("current"))){
			if($(this).hasClass("enviar")){
				$(this).addClass("current");
				$(".tabs .transporte").removeClass("current");
			}else if($(this).hasClass("transporte")){
				$(this).addClass("current");
				$(".tabs .enviar").removeClass("current");
				$("input[name='publicar-radio']").prop("checked", false);
				$("input[name='buscar-radio']").prop("checked", true);
			}
			changeView();
		}
	});
	
	$(".main-buscador .tipo-cargas").on("change", function(){
		var value = ($(this).find(":selected").attr("data-value"));
		$(".main-buscador .especificacion").find("div.active").slideUp(function(){
			$(".main-buscador .especificacion").find("div.active").removeClass("active");
			$(".main-buscador .especificacion-carga-"+ value).slideDown(function(){
				$(".main-buscador .especificacion-carga-"+value).addClass("active");
			});
		});
	});
	
	$(".main-buscador .detalles-carga .cont-img input").on("change", function(){
		file = $(this).prop('files')[0];
		fr = new FileReader();
		fr.onload = function(e){
			$(".main-buscador .detalles-carga .cont-img img").attr("src", e.target.result);
		}
		fr.readAsDataURL($(this).prop('files')[0]);
	});
	
	$(".main-buscador .especificaciones input").on("change", function(){
		file = $(this).prop('files')[0];
		fr = new FileReader();
		fr.onload = function(e){
			$(".main-buscador .especificaciones .cont-img img").attr("src", e.target.result);
		}
		fr.readAsDataURL($(this).prop('files')[0]);
	});
    
	$.datepicker.regional['es'] = {
		prevText: '<--',
		nextText: '-->',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);
    
    $(".input-recogida").multiDatesPicker();
    $(".input-entrega").multiDatesPicker();
    
    $(".vehiculo .add-vehicle").click(function(){
   		var value = $(".vehiculo select").find(":selected").attr("value");
   		var vehiculo = $(".vehiculo select").find(":selected").text();
   		var exists = $(".vehiculo ul #"+value).length;
   		if((value != 0) && (!exists)){
	   		$(".vehiculo ul").append("<li id='"+ value +"'><div><span>" + vehiculo + "</span><span class='cerrar'>X</span></div></li>");
	   		scheduler1();
   		}
   		
   		$(".vehiculo select").prop("selectedIndex",0);
    });
	
    jQuery('.js-modal-trigger').click( function(event) {
        event.preventDefault();
        var modal = jQuery(this).attr('data-modal');
        jQuery('.overlay').fadeIn( function() { 
            jQuery('.js-modal-box-' + modal ).fadeIn().css('display','inline-block'); 
        });
    });
    

    jQuery('.js-modal-close').click( function(event) {
        event.preventDefault();
        jQuery('.overlay').fadeOut( function() { 
            jQuery('.modal').fadeOut().css('display', 'none'); 
        });
    });

	
	$(".modal input:radio").on("change", function(){
    	if($(this).attr('class') == 'si')
    	   $(".modal input:radio.no").prop("checked", false);
        else
            $(".modal input:radio.si").prop("checked", false);
	});
	
	
	$(".modal-login button.but-log").click(function(){
	
	    var record = 0;
	    if($(".modal-login .recordarme").is(":checked"))
	       var record = 1;
	
    	var mail = $(this).parent().find("input[type='email']").val();
    	var pass = $(this).parent().find("input[type='password']").val();
    	var tran = "fallo";
    	if($(".modal-login input.si").is(":checked"))
        	tran = "si";
        if($(".modal-login input.no").is(":checked"))
    	   tran = "no";
    	   
        if(tran == "fallo"){
	        $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Selecciona si eres transportista o no!"}
	        );
            return;
        }
    	   
    	   
    	if(mail == "" || pass == ""){
        	$(".modal-login .result").html("Rellene todos los campos");
        	return;
    	}
    	    	
    	$.ajax({

			beforeSend: function(){

			},
			url: "loggin.php",
			type: "POST",


			data: {
				"mail": mail,
				"pass": pass,
				"tran": tran,
				"record": record,
			},

			success: function(data){
			
    			if(data == 1){
        			window.location="index.php";
    			} else {
        			$(".modal-login .result").html("Contrase&#241;a Incorrecta!");
    			}

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
	
	$(".modal-login2 button.but-log").click(function(){
	
    	var mail = $(this).parent().find("input[type='email']").val();
    	var pass = $(this).parent().find("input[type='password']").val();
        var tran = "fallo";
    	if($(".modal-login2 input.si").is(":checked"))
        	tran = "si";
        if($(".modal-login2 input.no").is(":checked")){
            $(".modal-login2 .result").html("Debe ser transportisa para publicar rutas!");
            return;
        }
    	   
        if(tran == "fallo"){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Selecciona si eres transportista o no!"}
	        );
            return;
        } 
    	
    	if(mail == "" || pass == ""){
        	$(".modal-login2 .result").html("Rellene todos los campos");
        	return;
    	}
    	
    	$.ajax({

			beforeSend: function(){

			},
			url: "loggin.php",
			type: "POST",


			data: {
				"mail": mail,
				"pass": pass,
				"tran": tran,
			},

			success: function(data){
    			if(data == 1){
        			window.location="index.php";
    			} else {
        			$(".modal-login2 .result").html("Contrase&#241;a Incorrecta!");
    			}
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
	
	$(".modal-login3 button.but-log").click(function(){
	
    	var mail = $(this).parent().find("input[type='email']").val();
    	var pass = $(this).parent().find("input[type='password']").val();
        var tran = "fallo";
    	if($(".modal-login3 input.si").is(":checked")){
        	$(".modal-login3 .result").html("Debe ser porteador para publicar portes!");
        	return;
    	}
        if($(".modal-login3 input.no").is(":checked")){
            tran = "no";
        }
    	   
        if(tran == "fallo"){
            $.alert({
	        	title:"",
	        	confirmButton:"Aceptar",
		        content:"Selecciona si eres transportista o no!"}
	        );
            return;
        } 
    	
    	if(mail == "" || pass == ""){
        	$(".modal-login3 .result").html("Rellene todos los campos");
        	return;
    	}
    	
    	$.ajax({

			beforeSend: function(){

			},
			url: "loggin.php",
			type: "POST",


			data: {
				"mail": mail,
				"pass": pass,
				"tran": tran,
			},

			success: function(data){
    			if(data == 1){
        			window.location="index.php";
    			}else{
        			$(".modal-login3 .result").html("Contrase&#241;a Incorrecta!");
    			}
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
	
	$(".js-submenu").outerWidth($(".menu-principal li").outerWidth());
	
	$(".js-submenupadre").mouseover(function(){
    	$(".js-submenu").addClass("active");
	});
	
	$(".js-submenupadre").mouseout(function(){
    	$(".js-submenu").removeClass("active");
	});
	
	$(".js-submenu").mouseover(function(){
    	$(".js-submenu").addClass("active");
	});
	
	$(".js-submenu").mouseout(function(){
    	$(".js-submenu").removeClass("active");
	});
	
	
	$(".js-cerrar-sesion").click(function(){
        document.cookie = "user" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        document.cookie = "email" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        document.cookie = "tipo_usuario" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        window.location="index.php";
	});
	
	$(".js-hay-vehiculos").html($(".js-hay-vehiculos").text().slice(0, -1));
	$(".js-hay-vehiculos").append(".");
	
	$(".send-pregunta").click(function(event){
    	if($(".text-pregunta").val() == "")
    	   event.preventDefault();
    	
	});
	
	$(".js-trigger-menu").click(function(){
		$(".js-main-menu").toggleClass('responsive-active');
		$('.js-main-menu').slideToggle();
	});
	
	$(document).ready(function(){
        var d = new Date();
        d = d.getTime();
        if (jQuery('#reloadValue').val().length == 0){
            jQuery('#reloadValue').val(d);
            jQuery('body').show();
        }else{
            jQuery('#reloadValue').val('');
            location.reload();
        }
    });
    
    $(".js-center").each(function(){
       if($(window).width() > 450){
		   var wid = $(this).width();
		   $(this).css("margin-left", "-" + wid / 2 + "px");
	   }
    });
    
    $(".js-show-contact").click(function(){
			if($(this).attr("loged") == "loged"){
				var type = $(this).attr("type");
				var cook = getCookieValue("tipo_usuario");
				if((type == "porte") && (cook != "transportista")){
					$.alert({
				    	title:"",
				    	confirmButton:"Aceptar",
				        content:"Debes iniciar sesion con cuenta de transportista para ver esta informacion!"}
				    );
				    
				    return;
				}else if((type == "ruta") && (cook != "porteador")){
					$.alert({
				    	title:"",
				    	confirmButton:"Aceptar",
				        content:"Debes iniciar sesion con cuenta de porteador para ver esta informacion!"}
				    );
				    
				    return;
				}
				$(".contacto-aceptado-porteador").css("display", "none");
		    	var id = $(this).attr("contact");
		    	$(".js-contact-" + id).css("display", "block");
		    	var first = getUrlVars()["id"];
		    	
		    	$.ajax({
	        
		        	url: "add_contact.php",
		        	type: "POST",
		        
		        
		        	data: {
		        		"type": type,
		        		"id": first,
		        	},
		        
		        	success: function(data){
		        	
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
				$.alert({
			    	title:"",
			    	confirmButton:"Aceptar",
			        content:"Debes iniciar sesion para ver esta informacion!"}
			    );
			}
    });
    
    $(".js-close-contact").click(function(){
	    $(this).closest(".contacto-aceptado-porteador").css("display", "none");
    });
    
    $(".js-show-contact-2").click(function(){
    	$(".contacto-aceptado-transportista").css("display", "none");
    	var id = $(this).attr("contact");
    	$(".js-contact-" + id).css("display", "block");
    });
    
    $(".js-close-contact-2").click(function(){
	    $(this).closest(".contacto-aceptado-transportista").css("display", "none");
    });
    
    $(".js-valoracion-pendiente").click(function(){
	    var iduser = $(this).closest(".valorar-usuario").find("#iduser").val();
	    var idanuncio = $(this).closest(".valorar-usuario").find("#idanuncio").val();
	    var tipouser = $(this).closest(".valorar-usuario").find("#tipouser").val();
	    var normalFill = $("#rateYo").rateYo("option", "rating");
	    
	    console.log(iduser, idanuncio, tipouser, normalFill);
	    
	    $.ajax({
	        
        	url: "functions/valora-pendiente.php",
        	type: "POST",
        
        
        	data: {
        		"iduser": iduser,
        		"idanuncio": idanuncio,
        		"tipouser": tipouser,
        		"normalFill": normalFill,
        	},
        
        	success: function(data){
        		console.log(data);
        		if(data == 0){
	        		window.location = "index.php";
        		}else{
	        		window.location = "pendientes.php";
        		}
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
    
});

$(window).on('resize', function(){
    $(".js-submenu").outerWidth($(".menu-principal li").outerWidth());
});

$(window).on("load", function() {

});