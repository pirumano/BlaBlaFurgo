<?php

    require_once("consultas.php");

    conectar();

    function getInfoPorte($id){
        $query = "SELECT * FROM portes WHERE id = '$id' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$porte = mysql_fetch_array($result);

		return $porte;
    }
    
    function getInfoPorteador($email){
	    $query2 = "SELECT * FROM porteadores WHERE email = '$email'";
    	$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
    	$info = mysql_fetch_array($result2);
    	
    	$info_contacto->nombre = $info['nombre'];
    	$info_contacto->email = $email;
    	$info_contacto->telefono = $info['tlf'];
    	
    	return $info_contacto;
    }