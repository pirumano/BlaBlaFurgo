<?php
	include_once("../consultas.php");
	conectar();

	$id_ruta = $_POST['name'];
	$id_cliente = $_POST['cliente'];
	$valor_set = $_POST['valor'];
	
	$sql = "SELECT valoracion FROM porteadores WHERE ID='$id_cliente'";
	$result = mysql_query($sql);
	$valor = mysql_fetch_array($result);
	$valor_ok = $valor[0];
	
	if($valor_ok != "0"){
		$valor_set = intval($valor_set);
		$valor_ok = intval($valor_ok);
		$valor_set = ((float)$valor_ok + (float)$valor_set) / (float)2.0;
	}
	
	$sql = "UPDATE porteadores SET valoracion='$valor_set' WHERE ID='$id_cliente'";
	mysql_query($sql);
	
	$sql = "SELECT contactos FROM rutas WHERE ID='$id_ruta'";
	$result = mysql_query($sql);
	$contacts = mysql_fetch_array($result);
	
	$length = strlen($id_cliente);
	
	$index = strpos($contacts[0], $id_cliente);
	$token = substr($contacts[0], 0, $index);
	$token2 = substr($contacts[0], $index + $length + 1, strlen($contacts[0]));
	
	$new_contact = $token.$token2;
	
	$sql = "UPDATE rutas SET contactos='$new_contact' WHERE ID='$id_ruta'";
	mysql_query($sql);
	
	
	$email = $_COOKIE['email'];
	$id_user = sacar_id_user($email);
	
	$sql = "SELECT valoracionespendientes FROM porteadores WHERE ID='$id_cliente'";
	$result = mysql_query($sql);
	$contacts = mysql_fetch_array($result);
	
	if($contacts[0] == "0"){
		$sql = "UPDATE porteadores SET valoracionespendientes='$id_user/$id_ruta-' WHERE ID='$id_cliente'";
		mysql_query($sql);
	}else{
		$contacts = $contacts[0].$id_user.'/'.$id_ruta."-";
		$sql = "UPDATE porteadores SET valoracionespendientes='$contacts' WHERE ID='$id_cliente'";
		mysql_query($sql);	
	}
?>