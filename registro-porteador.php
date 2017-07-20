<?php
	require("consultas.php");

	$nombre    = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$email     = $_POST["email"];
	$telefono  = $_POST["telefono"];
	$contra    = $_POST["contra"];

	conectar();

	$repe = email_repetido($email);

	if($repe != 0){
		echo "Este email ya está dado de alta, pruebe con otro";
		return;
	}

	insertar_porteador($nombre, $apellidos, $telefono, $email, $contra);
