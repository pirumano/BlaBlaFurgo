<?php
	if(!isset($_COOKIE['email'])){
		header('Location: index.php');
	}
?>
<?php $title="Modificar cargas"; ?>
<?php include("includes/header.php"); ?>
<?php include('includes/header-content.php'); ?>

<?php include("functions/getVehiculos.php"); ?>
<?php $id_user = sacar_id_user($_COOKIE['email'], 'transportista'); ?>

<div class="modificar-container">
    <div class="modificar-content">
        <span class="title-miperfil">
                <span class="mi">Modificar</span>
        <span class="per">car</span><span class="fil">gas</span>
        </span>
        <form action="functions/modificar_cargas.php" method="POST">
            <div class="row">
                <div class="col-xs-12">
                    <div class="lista-vehiculos">
                        <?php $i = 0;?>
                        <?php foreach($vehiculos as $single): ?>
                            <?php $cargas = $cargas_finales[$i]; ?>
                            <input type="hidden" name="vehicle-<?php echo $i;?>" value="<?php echo $single; ?>" />
    	                    <div class="item-vehiculo">
    	                        <div class="col-xs-12">
    	                            <label class="title">
    	                                <?php echo $single; ?>
    	                            </label>
    	                        </div>
    	                        <div class="col-xs-12">
    	                            <div class="cargasOK clearfix">
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="muebles">Muebles / General</label>
    	                                    <input class="muebles" name="muebles-<?php echo $i; ?>" type="checkbox" <?php if($cargas[1]): ?> checked <?php endif; ?> />
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="objetos">Objetos Empaquetados</label>
    	                                    <input class="objetos" name="objetos-<?php echo $i; ?>" type="checkbox" <?php if($cargas[2]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="coches">Coches</label>
    	                                    <input class="coches" name="coches-<?php echo $i; ?>" type="checkbox" <?php if($cargas[3]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="motos">Motos</label>
    	                                    <input class="motos" name="motos-<?php echo $i; ?>" type="checkbox" <?php if($cargas[4]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="especial">Especialistas / Antiguedades</label>
    	                                    <input class="especial" name="especial-<?php echo $i; ?>" type="checkbox" <?php if($cargas[5]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="piezas">Piezas Mecanicas</label>
    	                                    <input class="piezas" name="piezas-<?php echo $i; ?>" type="checkbox" <?php if($cargas[6]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="merca">Mercancias</label>
    	                                    <input class="merca" name="merca-<?php echo $i; ?>" type="checkbox" <?php if($cargas[7]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="piano">Piano</label>
    	                                    <input class="piano" name="piano-<?php echo $i; ?>" type="checkbox" <?php if($cargas[8]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="barco">Barcos</label>
    	                                    <input class="barco" name="barco-<?php echo $i; ?>" type="checkbox" <?php if($cargas[9]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="industrial">Industrial</label>
    	                                    <input class="industrial" name="industrial-<?php echo $i; ?>" type="checkbox" <?php if($cargas[10]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="mascota">Mascotas / Animales</label>
    	                                    <input class="mascota" name="mascota-<?php echo $i; ?>" type="checkbox" <?php if($cargas[11]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="cuidado">Cuidado Especial</label>
    	                                    <input class="cuidado" name="cuidado-<?php echo $i; ?>" type="checkbox" <?php if($cargas[12]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="refrigerado">Refrigerados</label>
    	                                    <input class="refrigerado" name="refrigerado-<?php echo $i; ?>" type="checkbox" <?php if($cargas[13]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                                <div class="col-xs-12 col-sm-6 col-md-4">
    	                                    <label class="liquido">Liquidos</label>
    	                                    <input class="liquido" name="liquido-<?php echo $i; ?>" type="checkbox" <?php if($cargas[15]): ?> checked <?php endif; ?>/>
    	                                </div>
    	                            </div><!-- cargasOK -->
    	                            <hr>
    	                        </div>
    	                    </div> <!-- item-vehiculo -->
    	                   <?php $i++; ?>
                        <?php endforeach;?>
                        <input type="hidden" name="number-vehiculos" value="<?php echo $i; ?>"/>
                        <button class="button-cargas">Guardar Cargas</button>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </form>
    </div><!-- content -->
</div><!-- container -->

<div class="no-footer">
	<?php include('includes/footer.php'); ?>
</div>
