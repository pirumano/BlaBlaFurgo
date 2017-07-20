<?php

    $id = $_GET['id'];
    
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    
    $ruta = getInfoRuta($id);
    $contacto = getInfoTransportista($ruta['transportista']);
    
    $transportista = $ruta['transportista'];
    
    $f_recogida = $ruta['f_recogida'];
    if($f_recogida == "")
        $f_recogida = 'No Especificado';
        
    $f_entrega = $ruta['f_entrega'];
    if($f_entrega == "")
        $f_entrega = 'No Especificado';
        
    $flexOrigen = $ruta['flexible_origen'];
    $flexDestino = $ruta['flexible_destino'];
    $flexRecogida = $ruta['flexible_recogida'];
    $flexEntrega = $ruta['flexible_entrega'];
   
    $presu_min = $ruta['presupuesto_min'];
    if($presu_min == "")
        $presu_min = 'No Especificado';
        
    $descripcion = $ruta['descripcion'];
    if($descripcion == "")
        $descripcion = 'No Especificado';
    
    $vehiculosDB = $ruta['vehiculos'];
    if($vehiculosDB == ""){
        $vehiculos = 'No Especificado';
    }else{
        $vehiculos = "";
        $vehiculosDB = unserialize($vehiculosDB);
        $count = count($vehiculosDB);
        
        if($vehiculosDB == ""){
	        $vehiculos = "No especificado";
        }else{
	       foreach($vehiculosDB as $single){
		       $vehiculos .= getImageVehiculo($single);
		   } 
        }
             
    }
    
    $cargasDB = $ruta['cargas'];
    if($cargasDB == ""){
        $cargas = 'No Especificado';
    }else{
        $cargas = "";
        $cargasDB = unserialize($cargasDB);
        $count = count($cargasDB);
        $i = 1;
        foreach($cargasDB as $single){
            $cargas .= $single;
            if($count != $i)
                $cargas .= ", ";
            $i++;
        }
    } 
        
    $f_publicacion = $ruta['f_publicacion'];
    if($f_publicacion == "")
        $f_publicacion = 'No Especificado';
        
    $num_presupuestos = $ruta['num_presupuesto'];
    $presupuesto_bajo = $ruta['presupuesto_bajo'];
        
    $fianza = sacarFianza($transportista);
    
    $id_cliente_ruta = sacar_id_user($transportista);
    
    if(isset($_COOKIE['email'])){
        $email_user = $_COOKIE['email'];
        $tipo_user = $_COOKIE['tipo_usuario'];
        $id_user = sacar_id_user($email_user, $tipo_user);
        $verificado = getVerificado($email_user, $tipo_user);
    }