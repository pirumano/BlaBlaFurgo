<?php

	$id_porte = $_POST['id_porte'];
	include_once("../consultas.php");
	conectar();

	$sql = "SELECT contactos FROM portes WHERE ID='$id_porte'";
	$result = mysql_query($sql);
	$contacts = mysql_fetch_array($result);
	
	echo $contacts[0];
	
?>