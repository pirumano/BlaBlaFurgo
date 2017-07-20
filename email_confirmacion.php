<?php
	include('consultas.php');

	$id   = $_GET['id'];
	$tipo = $_GET['tipo'];

	conectar();

	if($tipo == "transportista"){
		activar_usuario($id);
	}elseif($tipo == "porteador"){
		activar_porteador($id);
	}

	header('Location: index.php');

?>