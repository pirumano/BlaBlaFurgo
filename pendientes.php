<?php include("includes/header.php"); ?>
<?php include('includes/header-content.php'); ?>

<?php include("functions/getPendientes.php"); ?>

<div class="perfil-container">
	<div class="perfil-content">
    	<span class="title-miperfil">
        	<span class="mi">Valora</span><span class="per">cion</span>
        	<span class="fil">Pendiente</span>
    	</span>
    	
    	
		<div class="container">
			<div class="row">
				<div class="col-xs-12 data-pendiente">
					<div class="cont-modal cont-modal-main js-modal-realizar">
						<input id="id-ruta-hidden" type="hidden">
							<?php $tokens = explode("-", $pendientes); ?>
							<?php foreach($tokens as $item): ?>
								<?php if($item != ""): ?>
									<?php
					    				$cachos = explode("/", $item);
					    				$id_user = $cachos[0];
					    				$id_anuncio = $cachos[1];
					    				if($_COOKIE['tipo_usuario'] == "porteador"){
						    				$name = get_nombre_by_id($id_user, "transportista");
					    					$origen = getOrigenRuta($id_anuncio);
					    					$destino = getDestinoRuta($id_anuncio);
					    				}else{
						    				$name = get_nombre_by_id($id_user, "porteador");
					    					$origen = getOrigenPorte($id_anuncio);
					    					$destino = getDestinoPorte($id_anuncio);
					    				}
					    				
					    			?>
			    			
									<div class="content-porteador-realizar">
										<span class="item-realizar"><b>Nombre:</b> <?php echo $name; ?>.</span>
										<?php if($origen != ""): ?>
											<span class="item-realizar"><b>Origen Anuncio:</b> <?php echo $origen; ?>.</span>
										<?php endif; ?>
										<?php if($destino != ""): ?>
											<span class="item-realizar"><b>Destino Anuncio:</b> <?php echo $destino; ?>.</span>
										<?php endif; ?>
									</div>
									<div class="valorar-usuario">
										<span class="title-valorar">VALORE AL CLIENTE</span>
										<div id="rateYo"></div>
										<input type="hidden" id="iduser" value="<?php echo $id_user; ?>" />
										<input type="hidden" id="idanuncio" value="<?php echo $id_anuncio; ?>" />
										<input type="hidden" id="tipouser" value="<?php echo $_COOKIE['tipo_usuario']; ?>" />
										<button class="aceptar-realizar js-valoracion-pendiente">Aceptar</button>
									</div>
								<?php endif; ?>
								<?php break; ?>
							<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
        
    </div> <!-- home-content -->
</div> <!-- home-container -->

<?php include('includes/footer.php'); ?>