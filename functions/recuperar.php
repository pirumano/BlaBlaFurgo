<?php

	$email = $_POST['email'];
	
	include_once("../consultas.php");
	conectar();
	
	$tran = $_POST['tran'];
	
	if($tran == "si"){
		$tipo = "transportista";
	}else{
		$tipo = "porteador";
	}
	
	$pass = get_pass($email, $tipo);

	if($pass == ""){
		return;
	}
	
	send_mail("Recuperacion password", "Aqui tiene su password: '" . $pass . "  '.\n\r\n\r MIPORTE", $email);