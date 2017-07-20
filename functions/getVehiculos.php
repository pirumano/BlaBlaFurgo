<?php
	include_once("consultas.php");
	
	if(isset($_COOKIE["pre-email"])){
		$email  = $_COOKIE["pre-email"];
	}else{
		$email  = $_COOKIE["email"];
	}
	
	

	conectar();

	$id_user = sacar_id_user($email, "transportista"); //ID user!

	$array_vehiculos = array();
	$array_vehiculos = sacar_vahiculos($id_user);
	
	$array_nombres = array();
	$cargas_finales = array();
	
	$ceros = array();

	for ($i=0; $i < 16 ; $i++) { 
	 	$ceros[$i] = 0;
	}

	$i = 0;

	foreach ($array_vehiculos as $item) {
		$nombre    = sacar_nombre_vehiculo($item);
		$array_nombres[] = $nombre;
		//sacar cargas del vehiculo
		$cargas_vehiculo = cargas_vehiculo_posicion($id_user, $item);

		$array_cargas = unserialize($cargas_vehiculo); //ya tenemos array con las cargas!
		
		$cargas_nuevas = $ceros;

		if ($array_cargas){
			foreach ($array_cargas as $item) {
				$cargas_nuevas[$item] = 1;

			}
		}

		$cargas_finales[$i] = $cargas_nuevas;
		$i++;
	}

	$vehiculos = $array_nombres;

?>