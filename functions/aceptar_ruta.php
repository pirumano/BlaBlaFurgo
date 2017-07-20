<?php
	
	include_once("../consultas.php");
	conectar();
	
	$id = $_POST['id'];
	
	$sql = "UPDATE ofertas_rutas SET estado='aceptado' WHERE ID='$id'";
   	$result = mysql_query($sql);
   	
   	$id_ruta = get_id_ruta_by_id_presu_ruta($id);
   	$origen = getOrigenRuta($id_ruta);
   	$destino = getDestinoRuta($id_ruta);
   	$autor_oferta = get_autor_oferta_presu_ruta_by_id($id);
   	$mail = get_email_by_id($autor_oferta, "porteador");
   	
   	send_mail("Presupuesto aceptado", "Te han aceptado un presupuesto en la ruta: " . $origen . " | " . $destino . ". Entra en www.miporte.es para contactar!", $mail);
   	
   	header("Location: ../miperfil.php");
