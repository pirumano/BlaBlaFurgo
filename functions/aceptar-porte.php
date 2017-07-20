<?php
	
	include_once("../consultas.php");
	conectar();
	
	$id = $_POST['id'];
	
	$sql = "UPDATE ofertas_portes SET estado='aceptado' WHERE ID='$id'";
   	$result = mysql_query($sql);
   	
   	$id_porte = get_id_porte_by_id_presu_porte($id);
   	$origen = getOrigenPorte($id_porte);
   	$destino = getDestinoPorte($id_porte);
   	$autor_oferta = get_autor_oferta_presu_porte_by_id($id);
   	$mail = get_email_by_id($autor_oferta, "transportista");
   	
   	send_mail("Presupuesto aceptado", "Te han aceptado un presupuesto en el porte: " . $origen . " | " . $destino . ". Entra en www.miporte.es para contactar!", $mail);
   	
   	header("Location: ../miperfil.php");