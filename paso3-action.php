<?php

	include("consultas.php");
	
	$cargas = array();
	
	$total = $_POST['total'];
	$mueblesLabel = $_POST['muebles'];
	$objetosLabel = $_POST['objetos'];
	$cochesLabel = $_POST['coches'];
	$motosLabel = $_POST['motos'];
	$especialLabel = $_POST['especial'];
	$piezasLabel = $_POST['piezas'];
	$pianoLabel = $_POST['piano'];
	$mercaLabel = $_POST['merca'];
	$barcoLabel = $_POST['barco'];
	$industrialLabel = $_POST['industrial'];
	$mascotaLabel = $_POST['mascota'];
	$liquidosLabel = $_POST['liquidos'];
	$cuidadoLabel = $_POST['cuidado'];
	$refrigeradoLabel = $_POST['refrigerado'];
	$otraLabel = $_POST['otra'];
	
	for($i = 1; $i <= $total; $i++){
    	$vehiculo = $_POST['vehiculo-'.$i];
    	
    	$muebles = $_POST['muebles-'.$i];
    	if(isset($muebles)){
        	array_push($cargas, $vehiculo."#".$mueblesLabel);
    	}
    	
    	$objetos = $_POST['objetos-'.$i];
    	if(isset($objetos)){
        	array_push($cargas, $vehiculo."#".$objetosLabel);
    	}
    	
    	$coches = $_POST['coches-'.$i];
    	if(isset($coches)){
        	array_push($cargas, $vehiculo."#".$cochesLabel);
    	}
    	
    	$motos = $_POST['motos-'.$i];
    	if(isset($motos)){
        	array_push($cargas, $vehiculo."#".$motosLabel);
    	}
    	
    	$especial = $_POST['especial-'.$i];
    	if(isset($especial)){
        	array_push($cargas, $vehiculo."#".$especialLabel);
    	}
    	
    	$piezas = $_POST['piezas-'.$i];
    	if(isset($piezas)){
        	array_push($cargas, $vehiculo."#".$piezasLabel);
    	}
    	
    	$merca = $_POST['merca-'.$i];
    	if(isset($merca)){
        	array_push($cargas, $vehiculo."#".$mercaLabel);
    	}
    	
    	$piano = $_POST['piano-'.$i];
    	if(isset($piano)){
        	array_push($cargas, $vehiculo."#".$pianoLabel);
    	}
    	
    	$barco = $_POST['barco-'.$i];
    	if(isset($barco)){
        	array_push($cargas, $vehiculo."#".$barcoLabel);
    	}
    	
    	$industrial = $_POST['industrial-'.$i];
    	if(isset($industrial)){
        	array_push($cargas, $vehiculo."#".$industrialLabel);
    	}
    	
    	$mascota = $_POST['mascota-'.$i];
    	if(isset($mascota)){
        	array_push($cargas, $vehiculo."#".$mascotaLabel);
    	}
    	
    	$liquidos = $_POST['liquidos-'.$i];
    	if(isset($liquidos)){
        	array_push($cargas, $vehiculo."#".$liquidosLabel);
    	}
    	
    	$cuidado = $_POST['cuidado-'.$i];
    	if(isset($cuidado)){
        	array_push($cargas, $vehiculo."#".$cuidadoLabel);
    	}
    	
    	$refrigerado = $_POST['refrigerado-'.$i];
    	if(isset($refrigerado)){
        	array_push($cargas, $vehiculo."#".$refrigeradoLabel);
    	}
    	
	}
	
	conectar();

	$id_user = sacar_id_user($email);

	foreach ($cargas as $item) {

		list($vehiculo, $carga) = split("#", $item, 2);

		$id_vehiculo = id_vehiculo1($vehiculo);
		$id_carga    = id_carga($carga);


		$array_cargas = sacar_cargas($id_user, $id_vehiculo, $id_carga); 
		meter_cargas($id_user, $id_vehiculo, $array_cargas);
	}
	
	setcookie('pre-email', '', time() - 3600);
	setcookie('pre-user', '', time() - 3600);
	setcookie('pre-tipo_usuario', '', time() - 3600);
	
	header("Location: registroTrans4.php");