<?php
	
	require_once('../consultas.php');
	conectar();
	
	$idAutor = sacar_id_user($_COOKIE['email'], "porteador");
	$nombre_autor = getNameUserPort($_COOKIE['email']);
	$apellidos_autor = getApellidoUserPort($_COOKIE['email']);
	$nombre_total = $nombre_autor . ' ' . $apellidos_autor;
	$pregunta = $_POST['pregunta-nueva'];
	$id_ruta = $_POST['id-ruta'];
	$tz = 'Europe/Madrid';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($tz));
    $dt->setTimestamp($timestamp);
	$fecha = $dt->format("d/m/Y, G:i");
	
    $propietario = getPropietarioRuta($id_ruta);
    
	guardarPreguntaRuta($idAutor, $pregunta, $id_ruta, $fecha, $propietario, $nombre_total);
	
	header("Location: ../detalles-ruta.php?id=". $id_ruta . "&origen=" . $_POST['origen'] . "&destino=" . $_POST['destino']);
