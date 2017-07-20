<?php $title="Buscar portes"; ?>
<?php include("includes/header.php"); ?>
<?php include('includes/header-content.php'); ?>
<?php include('functions/getFiltroPortes.php'); ?>

<span class="title-miperfil">
	<span class="mi">Filtrado</span>
	<span class="per">Por</span><span class="fil">tes</span>
</span>

<div class="main-filtros">
    <?php if(!($porteFiltro)):?>
        <span class="no-coincidencias">No se encontraron coincidencias</span>
    <?php else:?>
        <div class="lista-portes lista-filtros">
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
                    <?php foreach($porteFiltro as $item):?>
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
                </div>
            </div>
        </div>
    <?php endif;?>
</div>

<div class="filtro-como-container">
    <div class="filtro-como-content">
        <div class="info-medium clearfix">
        		
        	<div class="como-enviar">
        		<a href="comoenviar.php"><span>C&oacute;mo enviar con </span><img src="assets/images/logo.png" /></a>
        	</div>
        	
        	<div class="contacto clearfix">
        		<span class="text">Cont&aacute;ctenos</span>
        		<span class="telefono">Tel: +34 955 116 820</span>
        		<a href="">e-mail: info@miporte.es</a>
        	</div>
        	
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>