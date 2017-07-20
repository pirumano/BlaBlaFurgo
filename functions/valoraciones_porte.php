<?php
	include_once("../consultas.php");
	conectar();

	$id_porte = $_POST['name'];
	$id_trans = $_POST['trans'];
	$valor_set = $_POST['valor'];
	
	$sql = "SELECT valoracion FROM transportistas WHERE ID='$id_trans'";
	$result = mysql_query($sql);
	$valor = mysql_fetch_array($result);
	$valor_ok = $valor[0];
	
	if($valor_ok != "0"){
		$valor_set = intval($valor_set);
		$valor_ok = intval($valor_ok);
		$valor_set = ((float)$valor_ok + (float)$valor_set) / (float)2.0;
	}
	
	$sql = "UPDATE transportistas SET valoracion='$valor_set' WHERE ID='$id_trans'";
	mysql_query($sql);
	
	
	$email = $_COOKIE['email'];
	$id_user = sacar_id_user($email, "porteador");
	
	$sql = "SELECT valoracionespendientes FROM transportistas WHERE ID='$id_trans'";
	$result = mysql_query($sql);
	$contacts = mysql_fetch_array($result);
	
	if($contacts[0] == "0"){
		$sql = "UPDATE transportistas SET valoracionespendientes='$id_user/$id_porte-' WHERE ID='$id_trans'";
		mysql_query($sql);
	}else{
		$dataContacts = $contacts[0].$id_user."/".$id_porte."-";
		echo $dataContacts;
		$sql = "UPDATE transportistas SET valoracionespendientes='$dataContacts' WHERE ID='$id_trans'";
		mysql_query($sql);	
	}
	
	deletePorte($id_porte);
	
?>