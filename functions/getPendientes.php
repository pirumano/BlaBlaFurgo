<?php
	
	include_once("../consultas.php");
	conectar();
	
	$email = $_COOKIE['email'];	
	$tipo = $_COOKIE['tipo_usuario'];
	
	if($tipo == "porteador"){
		$id_user = sacar_id_user($email, "porteador");
		$sql = "SELECT valoracionespendientes FROM porteadores WHERE ID='$id_user'";
		$result = mysql_query($sql);
		$contacts = mysql_fetch_array($result);
		$pendientes = $contacts[0];
	}elseif($tipo == "transportista"){
		$id_user = sacar_id_user($email, "transportista");
		$sql = "SELECT valoracionespendientes FROM transportistas WHERE ID='$id_user'";
		$result = mysql_query($sql);
		$contacts = mysql_fetch_array($result);
		$pendientes = $contacts[0];
	}
?>