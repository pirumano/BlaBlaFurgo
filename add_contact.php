<?php
	
	include_once("consultas.php");
	
	$type = $_POST['type'];
	$id = $_POST['id'];
	$email = $_COOKIE['email'];
	
	conectar();
	
	if($type == "porte"){
		$id_user = sacar_id_user($email);
		$sql = "SELECT contactos FROM portes WHERE ID='$id'";
		$result = mysql_query($sql);
		$contacts = mysql_fetch_array($result);
		
		if($contacts[0] == NULL){
			$sql = "UPDATE portes SET contactos='$id_user-' WHERE ID='$id'";
			mysql_query($sql);
		}else{
			$array_contacts = explode('-', $contacts[0]);
			if(!in_array($id_user, $array_contacts)){
				$contacts = $contacts[0].$id_user.'-';
				$sql = "UPDATE portes SET contactos='$contacts' WHERE ID='$id'";
				mysql_query($sql);	
			}
		}
	}
	if($type == "ruta"){
		$id_user = sacar_id_user($email, "porteador");
		$sql = "SELECT contactos FROM rutas WHERE ID='$id'";
		$result = mysql_query($sql);
		$contacts = mysql_fetch_array($result);
		
		if($contacts[0] == NULL){
			$sql = "UPDATE rutas SET contactos='$id_user-' WHERE ID='$id'";
			mysql_query($sql);
		}else{
			$array_contacts = explode('-', $contacts[0]);
			if(!in_array($id_user, $array_contacts)){
				$contacts = $contacts[0].$id_user.'-';
				$sql = "UPDATE rutas SET contactos='$contacts' WHERE ID='$id'";
				mysql_query($sql);	
			}
		}
	}
?>