<?php

	$data = $_POST['data_t'];
	include_once("../consultas.php");
	conectar();
	
	$array_contacts = explode('-', $data);
	
	foreach($array_contacts as $item){
		$sql = "SELECT nombre, apellidos FROM porteadores WHERE ID='$item'";
		$result = mysql_query($sql);
		$contacts = mysql_fetch_array($result);
		echo $contacts[0];
		echo "+";
		echo $contacts[1];
		echo "-";
	}
?>