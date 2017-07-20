<?php
	include('../../consultas.php');

	$email = $_COOKIE['email'];

	$vehiculos = $_POST['vehiculos'];

	conectar();
	$id_user = sacar_id_user($email);

	//miro primero si tengo que eliminar algún vehiculo!!

	$array_vehiculos_recibidos = [];
	foreach ($vehiculos as $key ) {

		$array_vehiculos_recibidos[] = ID_vehiculo($key);

	}

	$mis_vehiculos = mis_vehiculos($id_user);

	$diferencia = array_diff($mis_vehiculos, $array_vehiculos_recibidos);

	foreach ($diferencia as $key) {
		eliminar_vehiculo($id_user,$key);
	}
	
	/*
	echo "</br>Lo que tengo en la base de datos: "; 
	print_r($mis_vehiculos);
	echo "</br>";
	print_r($array_vehiculos_recibidos);
	echo "</br>";
	*/

	foreach ($vehiculos as $key) {
		
		$id_vehiculo = ID_vehiculo($key);
		$existe      = existe_vehiculo($id_user, $id_vehiculo);
		
		//echo "EXISTE: |".$existe."|</br>";
		if($existe == 0){
			insertar_en_tabla($id_user, $id_vehiculo);
		}
	}
	
	echo "Los vehiculos han sido actualizados";

?>