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
			
			$id_ruta = get_id_ruta_by_id_presu_ruta($id_presu);
			$origen = getOrigenRuta($id_ruta);
			$destino = getDestinoRuta($id_ruta);
			$mail_ruta = getPropietarioRuta($id_ruta);
			$precio = get_oferta_ruta($id_presu);
			$id_autor = get_autor_oferta_presu_ruta_by_id($id_presu);
			$mail_autor = get_email_by_id($id_autor, "porteador");
			
			$body = "Pago realizado por: " . $mail . ", la cantidad de: " . ($cantidad / 100) . ", en la ruta de: " . $origen . " | " . $destino . ", id de la ruta: " . $id_ruta . ", transportista pagado: " . $mail_autor;
			
			send_mail("Pago realizado", $body, "notificaciones@miporte.es");
			send_mail("Pago realizado", "Ha pagado con exito: " . ($cantidad / 100) . "euros, en la ruta de: " . $origen . " | " . $destino, $mail_autor);
			send_mail("Pago realizado", "Han pagado el presupuesto de su ruta de: " . $origen . " | " . $destino, $mail_ruta . '. ID de la ruta: ' . $id_ruta);
			pagado_presupuesto($id_presu, "ruta");
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
