<?php

	if(!isset($_GET['id'])){
		header('Location: index.php');
	}else{
		$id_user = $_GET['id'];
	}
	
?>
<?php $title="Perfil publico transportista"; ?>
<?php include('includes/header.php'); ?>
<?php include('includes/header-content.php'); ?>
<?php include("functions/getAnunciosTransportista.php"); ?>

<div class="publico-container">
	<div class="publico-content clearfix">
	
		<?php include('includes/perfil/content-publico-trans.php'); ?>
	
	</div> <!-- publico-container -->
</div>	<!-- publico-content -->




<?php include('includes/footer.php'); ?>