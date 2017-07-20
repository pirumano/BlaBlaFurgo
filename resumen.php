<?php
	
	include_once("consultas.php");
	conectar();
	
			
	$query = "SELECT * FROM porteadores WHERE presupuesto_resumen = 1 ";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	while($row = mysql_fetch_array($result)) {
		$mail = $row['email'];
		$query2 = "SELECT * FROM ofertas_portes WHERE autor_porte = '$mail' ";
		$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
		$body = "";
		while($row2 = mysql_fetch_array($result2)) {
			$body .= "Presupuesto recibido en el porte de '" . getOrigenPorte($row2['porte_id']) . " || " . getDestinoPorte($row2['porte_id']) . "', oferta: " . get_oferta_porte($row2['ID']) . "\n\r";
		}
		if($body){
			send_mail("Resumen de presupuestos", $body, $mail);
		}
	}
	
	
	
	$query = "SELECT * FROM transportistas WHERE email_resumen = 1 ";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	while($row = mysql_fetch_array($result)) {
		$mail = $row['email'];
		$query2 = "SELECT * FROM ofertas_rutas WHERE autor_ruta = '$mail' ";
		$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
		$body = "";
		while($row2 = mysql_fetch_array($result2)) {
			$body .= "Presupuesto recibido en la ruta de '" . getOrigenRuta($row2['ruta_id']) . " || " . getDestinoRuta($row2['ruta_id']) . "', oferta: " . get_oferta_ruta($row2['ID']) . ".<br>";
		}
		if($body){
			send_mail("Resumen de presupuestos", $body, $mail);
		}
	}