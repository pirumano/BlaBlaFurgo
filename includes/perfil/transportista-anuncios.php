<div class="anuncios-transportista tabla-transportista">
	<?php if($anuncios_trans != ""): ?>
	    <div class="leyenda clearfix">
	    		<span>Origen</span>
	    		<span>Destino</span>
	    		<span>Vehiculos</span>
	    		<span>Fecha de recogida</span>
	    		<span>Fecha de entrega</span>
	    		<span>Descripcion</span>
	    		<span>Fecha publicacion</span>	        
	    </div>
	    
	    <?php foreach ($anuncios_trans as $single): ?>
	    <li class="item-anuncio clearfix">
	    			<span><?php echo $single->origen; ?></span>
	    			<span><?php echo $single->destino; ?></span>
	    			<span>
			            <?php if($single->vehiculos): ?>
			                <?php echo $single->vehiculos; ?>
			            <?php else: ?>
			                No Especificado
			            <?php endif; ?>
			        </span>
	            	<span><?php echo $single->f_entrega; ?></span>
	            	<span><?php echo $single->f_recogida; ?></span>
	            	<span><?php echo $single->descripcion; ?></span>
	            	<span><?php echo $single->f_publicacion; ?></span>
	            	<?php if(!isset($no_realizar)):?>
		            	<span class="width-9 js-realizar-ruta">
		                    <input class="id-ruta-realizar" type="hidden" value="<?php echo $single->id; ?>" />
		                    <button type="submit">Realizado</button>
			            </span>
			        <?php endif; ?>
	            	<span class="width-9">
	            
			            <form action="detalles-ruta.php" method="get" onclick="submit(); " target="_blank">
			                <input type="hidden" value="<?php echo $single->id; ?>" name="id" />
				            <input type="hidden" value="<?php echo $single->origen; ?>" name="origen" />
				            <input type="hidden" value="<?php echo $single->destino; ?>" name="destino" />
			                <button type="submit">Ver</button>
			            </form>
			            <?php if(isset($estoyPerfil)): ?>
			            	<i class="ion-close-round deleter-anuncio deleter-ruta">
        	            		<input type="hidden" value="<?php echo $single->id; ?>" />
                    		</i>
			            <?php endif; ?>
		            
		            </span>
	    </li>
	    <?php endforeach;?>
    <?php else: ?>
    	<span class="no-hay">No hay anuncios activos!</span>
    <?php endif; ?>
    
</div>

<div class="overlay overlay-miperfil">

	<div class="modal-wrapper modal-login">
		<div class="modal js-modal-box-1 js-modal-login">
			<div class="close-modal-fixed js-modal-close">Cerrar</div>
			<div class="cont-modal cont-modal-main js-modal-realizar">
				<input id="id-ruta-hidden" type="hidden">
				<span class="title-realizar">Elige el cliente para el que realizaste porte:</span>
				<div class="content-porteador-realizar">
				</div>
				<button class="aceptar-realizar js-aceptar-realizar-ruta">Aceptar</button>
				<div class="result"></div>
			</div>
			<div class="valorar-porteador">
				<span class="title-valorar">Valore al cliente</span>
				<div id="rateYo"></div>
				<button class="aceptar-valorar js-aceptar-valorar-ruta">Aceptar</button>
			</div>
		</div>
	</div>
	
</div>