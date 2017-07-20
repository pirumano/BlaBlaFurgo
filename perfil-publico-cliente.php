<?php

	if(!isset($_GET['id'])){
		header('Location: index.php');
	}else{
		$id_user = $_GET['id'];
	}
	
?>

<?php $title="Perfil publico porteador"; ?>
<?php include('includes/header.php'); ?>
<?php include('includes/header-content.php'); ?>
<?php include("functions/getAnunciosPorteador.php"); ?>

<?php
	include_once("../consultas.php");
	conectar();

	$sql = "SELECT valoracion FROM transportistas WHERE ID='$id_trans'";
	$result = mysql_query($sql);
	$valor = mysql_fetch_array($result);
	$valor_ok = $valor[0];
?>

<div class="publico-container">
	<div class="publico-content clearfix">
		<?php include('includes/perfil/content-publico-cliente.php'); ?>
	
	</div> <!-- registro-container -->
</div>	<!-- registro-content -->


<?php include('includes/footer.php'); ?>