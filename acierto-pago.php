<?php 
	include("includes/header.php");
	include('includes/header-content.php');

	require_once('includes/perfil/redsysHMAC256_API_PHP_5.2.0/apiRedsys.php');
	
	$miObj = new RedsysAPI;
	
	$version = $_GET['Ds_SignatureVersion'];
	$params = $_GET['Ds_MerchantParameters'];
	$signatureRecibida = $_GET['Ds_Signature'];
	
	$decodec = $miObj->decodeMerchantParameters($params);
	$codigoRespuesta = $miObj->getParameter('Ds_Response');
	$claveModuloAdmin = $clave;
	$signatureCalculada = $miObj->createMerchantSignatureNotif($claveModuloAdmin, $params);

	$order_presu = $miObj->getParameter('Ds_Order');
	$cantidad = $miObj->getParameter('Ds_Amount');
	$id_presu = substr($order_presu, 4);
	$id_presu = substr($id_presu, 0, -5);
	
?>

<div class="container cont-pago">
<?php if ($signatureCalculada === $signatureRecibida): ?>
		<?php 
			include_once("consultas.php");
			conectar();
			
			$id_porte = get_id_porte_by_id_presu_porte($id_presu);
			$origen = getOrigenPorte($id_porte);
			$destino = getDestinoPorte($id_porte);
			$mail = getPropietarioPorte($id_porte);
			$precio = get_oferta_porte($id_presu);
			$id_autor = get_autor_oferta_presu_porte_by_id($id_presu);
			$mail_autor = get_email_by_id($id_autor, "transportista");
			
			$body = "Pago realizado por: " . $mail . ", la cantidad de: " . ($cantidad / 100) . ", en el porte de: " . $origen . " | " . $destino . ", id del porte: " . $id_porte . ", transportista pagado: " . $mail_autor;
			
			send_mail("Pago realizado", $body, "notificaciones@miporte.es");
			send_mail("Pago realizado", "Ha pagado con exito: " . ($cantidad / 100) . "euros, en el porte de: " . $origen . " | " . $destino, $mail);
			send_mail("Pago realizado", "Han pagado tu presupuesto, en el porte de: " . $origen . " | " . $destino, $mail_autor . '. ID del porte: ' . $id_porte);
			pagado_presupuesto($id_presu, "porte");
		?>
		<div class="col-xs-12">
			<span class="no-coincidencias ok">Su pago se ha realizado con exito!</span>
		</div>
<?php else: ?>
		<div class="col-xs-12">
			<span class="fail no-coincidencias">Ha ocurrido un error! Intente hacer el pago de nuevo o contacte con nosotros en <a href="mailto:info@miporte.es">info@miporte.es</a></span>
		</div>
<?php endif; ?>
</div>


<div class="no-footer">
	<?php include('includes/footer.php'); ?>
</div>
