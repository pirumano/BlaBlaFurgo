<?php

	require_once('../consultas.php');
	conectar();

	$id_user = sacar_id_user($_COOKIE['email'], "porteador");
	$id_porte = $_POST['name'];
	$email_porte = sacar_user_porte($id_porte);
	
	if($_COOKIE['email'] == $email_porte){
	    deletePorte($id_porte);
	}else{
		echo "<script>$.alert('Error de borrado!')</script>";
		echo "<h1>NO SE PUDO BORRAR, INTENTELO DE NUEVO!!</h1>" ;
	}
	
	