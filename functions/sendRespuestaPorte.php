<?php

    require_once('../consultas.php');
    conectar();
    
	$user_respondido = $_POST['user_pregunta'];
	$idPregunta = $_POST['id-pregunta'];
	$respuesta = $_POST['respuesta'];
	$id_porte = $_POST['id-porte'];
	$tz = 'Europe/Madrid';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($tz));
    $dt->setTimestamp($timestamp);
	$fecha = $dt->format("d/m/Y, G:i");
	
	$mail = get_email_by_id($user_respondido, "transportista");
	
	guardarRespuestaPorte($idPregunta, $respuesta, $id_porte, $fecha, $user_respondido);
    
    header("Location: ../detalles-porte.php?id=". $id_porte . "&origen=" . $_POST['origen'] . "&destino=" . $_POST['destino']);