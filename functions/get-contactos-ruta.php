<?php

	$id_ruta = $_POST['id_ruta'];
	include_once("../consultas.php");
	conectar();

	$sql = "SELECT contactos FROM rutas WHERE ID='$id_ruta'";
	$result = mysql_query($sql);
	$contacts = mysql_fetch_array($result);
	
	echo $contacts[0];
	
?>