<?php
	
	require_once('../consultas.php');
	conectar();

	$idAutor = sacar_id_user($_COOKIE['email'], "transportista");
	$nombre_autor = getNameUserTrans($_COOKIE['email']);
	$apellidos_autor = getApellidoUserTrans($_COOKIE['email']);
	$nombre_total = $nombre_autor . ' ' . $apellidos_autor;
	$pregunta = $_POST['pregunta-nueva'];
	$id_porte = $_POST['id-porte'];
	$tz = 'Europe/Madrid';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($tz));
    $dt->setTimestamp($timestamp);
	$fecha = $dt->format("d/m/Y, G:i");
	
    $propietario = getPropietarioPorte($id_porte);
    
	guardarPreguntaPorte($idAutor, $pregunta, $id_porte, $fecha, $propietario, $nombre_total);
	
	header("Location: ../detalles-porte.php?id=". $id_porte . "&origen=" . $_POST['origen'] . "&destino=" . $_POST['destino']);