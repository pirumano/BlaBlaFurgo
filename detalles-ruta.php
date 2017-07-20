<?php $title="Detalles ruta"; ?>
<?php include("includes/header.php"); ?>
<?php include('includes/header-content.php'); ?>

<?php include('functions/getInfoRuta.php')?>
<?php include('includes/detalles/infoRuta.php'); ?>

<div class="container container-detalles">
    <div class="row">
        <div class="col-xs-12">
            <div class="ruta-detalles-container">
                <div class="ruta-detalles-content">
                    <span class="title-miperfil">
	                    <span class="mi">Detalles</span>
	                    <span class="per">Ru</span><span class="fil">ta</span>
	                    <a href="perfil-publico-trans.php?id=<?php echo $id_cliente_ruta; ?>"><span class="mi"><?php echo get_nombre_by_id($id_cliente_ruta, "transportista"); ?></span></a>
                    </span>
                    <div class="main-container">
                        <div class="main-content clearfix">
                            <?php include("includes/detalles/data-detalles-ruta.php"); ?>
                            <?php include('includes/detalles/preguntasRuta.php'); ?>
                        </div>
                        <!-- main-content -->
                    </div>
                    <!-- main-container -->
                </div>
                <!-- detalles-content -->
            </div>
            <!-- detalles-container -->
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>