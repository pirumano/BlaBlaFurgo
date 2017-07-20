<?php
	include("consultas.php");

	$email  = $_COOKIE["pre-email"];

	$checks = $_POST["checks"];

	conectar();

	$vehiculos = array();

	$id_user = sacar_id_user($email);

	foreach ($checks as $item) {
		$vehiculo    = ID_vehiculo($item);
		insertar_en_tabla($id_user, $vehiculo); 
		$vehiculos[] = $vehiculo;
	}

	$array = serialize($vehiculos);

	conectar();
	insertar_vehiculos($array, $email);