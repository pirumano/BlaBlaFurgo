$(document).ready(function(){
   $(".list-info .tabs2 span").click(function(){
      if(!($(this).hasClass("current"))){
          var show = $(this).attr("class");
          $(".list-info .tabs2 span").removeClass("current");
          $(this).addClass("current");
          if(show == "tab-transportes"){
              $(".lista-portes").fadeOut(function(){
                 $(".lista-transportes").css("display", "block");
                 $(".btn-more-portes").css("display", "none");
                 $(".btn-more-trans").css("display", "block");
              });
          }else{
              $(".lista-transportes").fadeOut(function(){
                 $(".lista-portes").css("display", "block");
                 $(".btn-more-portes").css("display", "block");
                 $(".btn-more-trans").css("display", "none");
              });
          }
      } 
   });
   
   $(".list-info .radios input:radio").on("change", function(){
       $(".list-info .radios input:radio").prop("checked", false);
       $(this).prop("checked", true);
       var nombre = $(this).attr("name");
       var activo = $(".list-info .tabs2 span.current").text();
       if(activo = "Portes"){
           if(nombre == "todos"){
                $(".lista-portes .cont-portes").addClass("current");
           }else{
                $(".lista-portes .cont-portes").removeClass("current");
                $(".lista-portes ."+nombre).addClass("current");               
           }

       }
       
       if(activo = "Transportes"){
           if(nombre == "todos"){
                $(".lista-transportes .cont-transportes").addClass("current");
           }else{
                $(".lista-transportes .cont-transportes").removeClass("current");
                $(".lista-transportes ."+nombre).addClass("current");               
           }
       }
       
   });
   
   $(".js-pregunta").click(function(){
       var data = $(this).attr("data-pregunta");
       $(".cont-respuesta").not(".js-data-"+data).slideUp();
       $(".js-data-"+data).slideToggle();
   });
   
   $(".more-portes").click(function(){
	  var offset = $(".items-portes .cont-portes.current li").length;
	  
	  $.ajax({

			beforeSend: function(){

			},
			url: "functions/getTodoPortes.php",
			type: "POST",


			data: {
    			'offset': offset,
    			'ajax': "1",
			},

			success: function(data){
				if(data)
					$(".items-portes .cont-portes.current").append(data);
				else
					$(".more-portes").html('No hay mas portes');
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
   
   $(".more-trans").click(function(){
	  var offset = $(".items-transportes .cont-transportes.current li").length;
	  
	  $.ajax({

			beforeSend: function(){

			},
			url: "functions/getTodoRutas.php",
			type: "POST",


			data: {
    			'offset': offset,
    			'ajax': "1",
			},

			success: function(data){
				if(data)
					$(".items-transportes .cont-transportes.current").append(data);
				else
					$(".more-trans").html('No hay mas transportes');
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