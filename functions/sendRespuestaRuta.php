<?php

    require_once('../consultas.php');
    conectar();
    
	$user_respondido = $_POST['user_pregunta'];
	$idPregunta = $_POST['id-pregunta'];
	$respuesta = $_POST['respuesta'];
	$id_ruta = $_POST['id-ruta'];
	$tz = 'Europe/Madrid';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($tz));
    $dt->setTimestamp($timestamp);
	$fecha = $dt->format("d/m/Y, G:i");
	
	$mail = get_email_by_id($user_respondido, "porteador");
	
	guardarRespuestaRuta($idPregunta, $respuesta, $id_ruta, $fecha, $user_respondido);
    
    header("Location: ../detalles-ruta.php?id=". $id_ruta . "&origen=" . $_POST['origen'] . "&destino=" . $_POST['destino']);