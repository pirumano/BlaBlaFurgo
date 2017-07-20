<div class="lista-transportes">
<?php include("functions/getTodoRutas.php"); ?>
    <div class="leyenda">
        <span>Origen</span>
        <span>Destino</span>
        <span>Fecha de recogida</span>
        <span>Fecha de entrega</span>
        <span>Precio Min.</span>
        <span>Descripcion</span>
    </div>
    
    <div class="items-transportes">
        <div class="cont-transportes miporte current">
        	<?php if($rutasTodos): ?>
	            <?php foreach($rutasTodos as $item):?>
	            <li class="item-ruta">
	                <form action="detalles-ruta.php" method="get" onclick="submit();">
	                    <input type="hidden" value="<?php echo $item->id; ?>" name="id" />
	                    <span class="origen"><?php echo $item->origen; ?></span>
	                    <input type="hidden" value="<?php echo $item->origen; ?>" name="origen" />
	                    <span class="destino"><?php echo $item->destino; ?></span>
	                    <input type="hidden" value="<?php echo $item->destino; ?>" name="destino" />
	                    <span class="recogida"><?php echo $item->f_recogida; ?></span>
	                    <span class="entrega"><?php echo $item->f_entrega; ?></span>
	                    <span class="km"><?php echo $item->presupuesto_min; ?></span>
	                    <span class="descripcion"><?php echo $item->descripcion; ?></span>
	                </form>
	            </li>
	            <?php endforeach; ?>
	        <?php else: ?>
	        	<div class="lista-vacia">Actualmente no hay rutas activas!</div>
	        <?php endif;?>
        </div>
        
        <div class="cont-transportes shiply">
            shiply RUTAS
        </div>
        
        <div class="cont-transportes anyvan">
            anyvan RUTAS
        </div>
        
        <div class="cont-transportes llevalo">
            llevalo RUTAS
        </div>
    </div>
    
</div>

<div class="btn-more btn-more-trans">
	<span class="more-trans">Cargas mas transportes</span>
</div>