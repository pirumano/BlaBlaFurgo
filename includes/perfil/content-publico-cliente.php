<?php
	
	include_once("../consultas.php");
	conectar();

	$id_cli = $_GET['id'];
	
	$sql = "SELECT valoracion FROM porteadores WHERE ID='$id_cli'";
	$result = mysql_query($sql);
	$valor = mysql_fetch_array($result);
	$valor_ok = $valor[0];
?>


<div class="container">
	<div class="row">
		<div class="title-miperfil">
			<span class="mi">Perfil</span> <span class="per"><?php echo get_nombre_by_id($id_user); ?></span>
		</div>
	</div>
	
	<?php if($valor_ok != "0"):?>
	
		<input type="hidden" id="valorok" value="<?php echo $valor_ok; ?>" />
		<div class="row">
			<div class="content-valorar-publico">
				<span>Valoracion del porteador</span>
				<div id="rateYo2"></div>
			</div>
		</div>
		
	<?php else: ?>
		
		<div class="row">
			<div class="content-valorar-publico">
				<span>Sin valoraciones</span>
			</div>
		</div>
		
	<?php endif; ?>
	
	<div class="row">
		<div class="tabla-anuncios-porteador">
		    <div class="tabs clearfix">
		        <span class="active js-tab-perfil" name="anuncios-porteador">Anuncios activos (<?php if($anuncios[0]): echo $anuncios[0]->total; else: ?>0<?php endif?>)</span>
		    </div>
		    <div class="datos-tabla">
		    	<?php $no_realizar = 1; ?>
		        <?php include("includes/perfil/porteador-anuncios.php"); ?>
		    </div>
		</div>
	</div>
</div>

<script>

	var rate = $("#valorok").val();

	$(function(){
	
		$("#rateYo2").rateYo({
			rating: rate,
			fullStar: true,
			readOnly: true
		});
		
	});

</script>
