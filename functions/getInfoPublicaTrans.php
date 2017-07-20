<?php
	
	$id = $_GET['id'];
	
	$data = getInfoPublicaTrans($id);
	$pagos_array = sacar_metodos_pagos(get_email_by_id($id, 'transportista'));
	
	$pagos_id = unserialize($pagos_array);
		
	$i = 0;
	
	if($pagos_id){
		foreach($pagos_id as $item){
			$pagos[$i] = nombre_pago_by_id($item);
			$i++;
		}
	}
	
	
	$vehiculos_array = mis_vehiculos($id);
	
	$i = 0;
	foreach($vehiculos_array as $item){
		$vehiculos[$i] = getNombreVehiculo($item);
		$i++;
	}
	
	if($data[0] == "")
		$data[0] = 'No Especificado';
	$info[0] = $data[0];
	
	if($data[1] == "")
		$data[1] = 'No Especificado';
	$info[1] = $data[1];
	
	if($data[2] == "")
		$data[2] = 'No Especificado';
	$info[2] = $data[2];
	
	if($data[3] == "")
		$data[3] = 'No Especificado';
	$info[3] = $data[3];
	
	