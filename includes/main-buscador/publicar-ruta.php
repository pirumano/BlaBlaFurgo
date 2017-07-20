<?php
	include("../../consultas.php");


	$email = $_COOKIE['email'];

	$origen        = $_POST['origen'];
	$destino       = $_POST['destino'];
	$recogida      = $_POST['recogida'];
	$entrega       = $_POST['entrega'];
	$descrip       = $_POST['descrip'];
	$vehiculos     = $_POST['vehiculos'];
	$presu         = $_POST['presu'];
	$checkOrigen   = $_POST['checkOrigen'];
	$checkDestino  = $_POST['checkDestino'];
	$checkRecogida = $_POST['checkRecogida'];
	$checkEntrega  = $_POST['checkEntrega'];

	conectar();

	$f_publicacion = date("d")."/".date("m")."/".date("Y");
	
	$id_user = sacar_id_user($email);

	$array_cargas = [];
	if($vehiculos){
    	foreach ($vehiculos as $key) {
    		$id_vehiculo = ID_vehiculo($key);
    		$cargas = sacamos_cargas($id_user, $id_vehiculo);
    
    		$mensaje = "CARGAS: ".$cargas;
    		$cargas = unserialize($cargas); //array
    		$array_cargas = array_merge($array_cargas, $cargas); //concatenamos arrays en caso de tener más de un vehículo
    		
    	}
    }

	$cargas = array_unique($array_cargas); 

	$nombre_cargas = [];
	if($cargas){
    	foreach ($cargas as $key) {
    		$nombre_cargas[] = nombre_carga($key);
    	}
	}
	$cargas = serialize($nombre_cargas); 
	$vehiculos = serialize($vehiculos);
	
	$sql = "INSERT INTO rutas (transportista, origen, destino, f_recogida, f_entrega, flexible_origen, 	flexible_destino, flexible_recogida, flexible_entrega, presupuesto_min, descripcion, vehiculos, cargas, f_publicacion) 
	VALUES ('$email', '$origen', '$destino','$recogida', '$entrega','$checkOrigen', '$checkDestino','$checkRecogida','$checkEntrega', '$presu','$descrip' ,'$vehiculos', '$cargas','$f_publicacion')";
	
	mysql_query($sql) or die('Consulta fallida: ' . mysql_error()) ;
