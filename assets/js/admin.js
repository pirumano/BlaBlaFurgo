$(document).ready(function(){
	$('.get-email .ok').click(function(){
		var email = $(".get-email .email").val();
		
		$.ajax({

			beforeSend: function(){
	
			},
			url: "id_by_email.php",
			type: "POST",
	
			data: {
				'email': email,
			},
	
			success: function(data){
			     $(".get-email .id").html(data);
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