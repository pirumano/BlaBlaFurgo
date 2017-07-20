<div class="lista-portes">
<?php include("functions/getTodoPortes.php"); ?>

    <div class="leyenda">
        <span>Origen</span>
        <span>Destino</span>
        <span>Tipo de carga</span>
        <span>Fecha de recogida</span>
        <span>Fecha de entrega</span>
        <span>Descripcion</span>
    </div>

    <div class="items-portes">
        <div class="cont-portes miporte current">
        	<?php if($portesTodos) :?>
		        <?php foreach($portesTodos as $item):?>
		            <li class="item-porte">
		                <form action="detalles-porte.php" method="get" onclick="submit(); ">
		                    <input type="hidden" value="<?php echo $item->id; ?>" name="id" />
		                    <span class="origen"><?php echo $item->origen; ?></span>
		                    <input type="hidden" value="<?php echo $item->origen; ?>" name="origen" />
		                    <span class="destino"><?php echo $item->destino; ?></span>
		                    <input type="hidden" value="<?php echo $item->destino; ?>" name="destino" />
		                    <span class="carga"><?php echo $item->carga_id; ?></span>
		                    <span class="recogida"><?php echo $item->f_recogida; ?></span>                       
		                    <span class="entrega"><?php echo $item->f_entrega; ?></span>                 
		                    <span class="descripcion"><?php echo $item->descripcion; ?></span>
		                </form>
		            </li>
		        <?php endforeach; ?>
		    <?php else:?>
		    	<div class="lista-vacia">Actualmente no hay portes activos!</div>
            <?php endif;?>
        </div>
    </div>
    
</div>

<div class="btn-more btn-more-portes">
	<span class="more-portes">Cargas mas portes</span>
</div>