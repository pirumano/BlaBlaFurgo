<?php $title="Detalles porte"; ?>
<?php include("includes/header.php"); ?>
<?php include('includes/header-content.php'); ?>
<?php include('functions/getInfoPorte.php'); ?>
<?php include('includes/detalles/infoPorte.php'); ?>
<div class="container container-detalles">
    <div class="row">
        <div class="col-xs-12">
            <div class="porte-detalles-container">
                <div class="porte-detalles-content">
                    <span class="title-miperfil">
	                    <span class="mi">Detalles</span>
	                    <span class="per">Por</span><span class="fil">te</span>
	                    <a href="perfil-publico-cliente.php?id=<?php echo $id_cliente_porte; ?>"><span class="mi"><?php echo get_nombre_by_id($id_cliente_porte, "porteador"); ?></span></a>
                    </span>
                    <div class="main-container">
                        <div class="main-content clearfix">
                            <?php include("includes/detalles/data-detalles-porte.php"); ?>
                            <?php include('includes/detalles/preguntasPorte.php'); ?>
                        </div><!-- main-container -->
                    </div><!-- main-content -->
                    
                </div><!-- porte-detalles-container -->
            </div><!-- porte-detalles-content -->
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>