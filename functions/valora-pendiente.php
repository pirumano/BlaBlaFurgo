<?php

	include_once("../consultas.php");
	conectar();
	
	$iduser = $_POST['iduser'];
	$idanuncio = $_POST['idanuncio'];
	$tipouser = $_POST['tipouser'];
	$valor_set = $_POST['normalFill'];
	$email = $_COOKIE['email']; 
	
	if($tipouser == "porteador"){
		$sql = "SELECT valoracion FROM transportistas WHERE ID='$iduser'";
		$result = mysql_query($sql);
		$valor = mysql_fetch_array($result);
		$valor_ok = $valor[0];
		
		if($valor_ok != "0"){
			$valor_set = intval($valor_set);
			$valor_ok = intval($valor_ok);
			$valor_set = ((float)$valor_ok + (float)$valor_set) / (float)2.0;
		}
		
		$sql = "UPDATE transportistas SET valoracion='$valor_set' WHERE ID='$iduser'";
		mysql_query($sql);
		
		$mi_id = sacar_id_user($email, "porteador");
		$sql = "SELECT valoracionespendientes FROM porteadores WHERE ID='$mi_id'";
		$result = mysql_query($sql);
		$contacts = mysql_fetch_array($result);
		
		$quitar = $iduser.'/'.$idanuncio;
		
		$length = strlen($quitar);
	
		$index = strpos($contacts[0], $quitar);
		$token = substr($contacts[0], 0, $index);
		$token2 = substr($contacts[0], $index + $length + 1, strlen($contacts[0]));
		
		$new_contact = $token.$token2;
		
		if($new_contact == ""){
			$new_contact = "0";
		}
		
		echo $new_contact;
		
		$sql = "UPDATE porteadores SET valoracionespendientes='$new_contact' WHERE ID='$mi_id'";
		mysql_query($sql);
		
		$sql = "SELECT valoracionespendientes FROM porteadores WHERE ID='$mi_id'";
		$result = mysql_query($sql);
		$contacts = mysql_fetch_array($result);
		echo $contacts[0]; // no borrar
	}else{
		$sql = "SELECT valoracion FROM porteadores WHERE ID='$iduser'";
		$result = mysql_query($sql);
		$valor = mysql_fetch_array($result);
		$valor_ok = $valor[0];
		
		if($valor_ok != "0"){
			$valor_set = intval($valor_set);
			$valor_ok = intval($valor_ok);
			$valor_set = ((float)$valor_ok + (float)$valor_set) / (float)2.0;
		}
		
		$sql = "UPDATE porteadores SET valoracion='$valor_set' WHERE ID='$iduser'";
		mysql_query($sql);
		
		$mi_id = sacar_id_user($email, "transportista");
		$sql = "SELECT valoracionespendientes FROM transportistas WHERE ID='$mi_id'";
		$result = mysql_query($sql);
		$contacts = mysql_fetch_array($result);
		
		$quitar = $iduser.'/'.$idanuncio;
		
		$length = strlen($quitar);
	
		$index = strpos($contacts[0], $quitar);
		$token = substr($contacts[0], 0, $index);
		$token2 = substr($contacts[0], $index + $length + 1, strlen($contacts[0]));
		
		$new_contact = $token.$token2;
		
		if($new_contact == ""){
			$new_contact = "0";
		}
		
		echo $new_contact;
		
		$sql = "UPDATE transportistas SET valoracionespendientes='$new_contact' WHERE ID='$mi_id'";
		mysql_query($sql);
		
		$sql = "SELECT valoracionespendientes FROM transportistas WHERE ID='$mi_id'";
		$result = mysql_query($sql);
		$contacts = mysql_fetch_array($result);
		echo $contacts[0]; // no borrar
	}
	
	
	
?>