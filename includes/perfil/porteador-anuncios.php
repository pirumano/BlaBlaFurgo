<div class="anuncios-porteador tabla-porteador">
    <?php if($anuncios != ""): ?>
	    <div class="leyenda">
	        <span>Origen</span>
	        <span>Destino</span>
	        <span>Tipo de carga</span>
	        <span>Fecha de recogida</span>
	        <span>Fecha de entrega</span>
	        <span>Descripcion</span>
	        <span>Fecha publicacion</span>
	    </div>
	
	    <?php foreach ($anuncios as $single): ?>
	    <li class="item-anuncio">
	            <span><?php echo $single->origen; ?></span>
	            <span><?php echo $single->destino; ?></span>
	            <span><?php echo $single->carga_id; ?></span>
	            <span><?php echo $single->f_entrega; ?></span>
	            <span><?php echo $single->f_recogida; ?></span>
	            <span><?php echo $single->descripcion; ?></span>
	            <span><?php echo $single->f_publicacion; ?></span>
	            <?php if(!isset($no_realizar)):?>
		            <span class="js-realizar-porte">
	                    <input class="id-porte-realizar" type="hidden" value="<?php echo $single->id; ?>" />
	                    <button type="submit">Realizado</button>
		            </span>
	            <?php endif; ?>
	            <span>
		            <form action="detalles-porte.php" method="get" onclick="submit(); " target="_blank">
	                    <input type="hidden" value="<?php echo $single->id; ?>" name="id" />
	                    <input type="hidden" value="<?php echo $single->origen; ?>" name="origen" />
	                    <input type="hidden" value="<?php echo $single->destino; ?>" name="destino" />
	                    <button type="submit">Ir al anuncio</button>
	                </form>
	            </span>
	            <?php if(isset($estoyPerfil)): ?>
	            		<i class="ion-close-round deleter-anuncio deleter-porte">
    	            		<input type="hidden" value="<?php echo $single->id; ?>" />
	            		</i>
	            <?php endif; ?>
	    </li>
	    <?php endforeach;?>
	<?php else: ?>
		<span class="no-hay">No hay anuncios activos!</span>
	<?php endif;?>
</div>

<div class="overlay overlay-miperfil">

	<div class="modal-wrapper modal-login">
		<div class="modal js-modal-box-1 js-modal-login">
			<div class="close-modal-fixed js-modal-close">Cerrar</div>
			<div class="cont-modal cont-modal-main js-modal-realizar">
				<input id="id-porte-hidden" type="hidden">
				<span class="title-realizar">Elige el transportista con el que realizaste el porte:</span>
				<div class="content-trans-realizar">
				</div>
				<button class="aceptar-realizar js-aceptar-realizar-porte">Aceptar</button>
				<div class="result"></div>
			</div>
			<div class="valorar-trans">
				<span class="title-valorar">Valore al transportista</span>
				<div id="rateYo"></div>
				<button class="aceptar-valorar js-aceptar-valorar-porte">Aceptar</button>
			</div>
		</div>
	</div>
	
</div>