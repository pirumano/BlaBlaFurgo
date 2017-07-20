<?php

    require_once("consultas.php");

    conectar();

    function getInfoRuta($id){
        $query = "SELECT * FROM rutas WHERE id = '$id' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$ruta = mysql_fetch_array($result);

		return $ruta;
    }
    
    function getInfoTransportista($email){
	    $query2 = "SELECT * FROM transportistas WHERE email = '$email'";
    	$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
    	$info = mysql_fetch_array($result2);
    	
    	$info_contacto->nombre = $info['nombre'];
    	$info_contacto->email = $email;
    	$info_contacto->telefono = $info['movil'];
    	
    	return $info_contacto;
    }
    
    function getImageVehiculo($item){
	    switch($item){
		    case "3,5 - 7,5 Toneladas":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/3.5t-7.5t.png'/>";
		    case "7,5 - 18 Toneladas":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/7.5t-18t.png'/>";
		    case "18 - 25 Toneladas":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/18t-25t.png'/>";
		    case "25 - 40 Toneladas":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/25t-40t.png'/>";
		    case "Mas de 40 Toneladas":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/40t.png'/>";
		    case "Transportista Coches":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/portacoches.png'/>";
		    case "Monovolumen":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/monovolumen.png'/>";
		    case "Solo Cabeza Tractora":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/tractor.png'/>";
		    case "Furgoneta":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/furgoneta.png'/>";
		    case "Cisterna":
		    	return "<img class='logo-vehiculo' src='assets/images/vehiculos/cisterna.png'/>";
	    }
    }