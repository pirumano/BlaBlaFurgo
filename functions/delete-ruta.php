<?php
    
    require_once('../consultas.php');
	conectar();

	$id_user = sacar_id_user($_COOKIE['email'], "transportista");
	$id_ruta = $_POST['name'];
	$email_ruta = sacar_user_ruta($id_ruta);
	
	if($_COOKIE['email'] == $email_ruta){
	    deleteRuta($id_ruta);
	}else{
		echo "<script>$.alert('Error de borrado!')</script>";
		echo "<h1>NO SE PUDO BORRAR, INTENTELO DE NUEVO!!</h1>" ;
	}