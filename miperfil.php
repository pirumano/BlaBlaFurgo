<?php
	if(!isset($_COOKIE['email'])){
		header('Location: index.php');
	}
	
	$estoyPerfil = 1;
?>
<?php $title="Mi perfil"; ?>
<?php include("includes/header.php"); ?>
<?php include('includes/header-content.php'); ?>

<div class="perfil-container">
	<div class="perfil-content">
    	<span class="title-miperfil">
        	<span class="mi">Mi</span>
        	<span class="per">Per</span><span class="fil">fil</span>
    	</span>
        <?php if($_COOKIE['tipo_usuario'] == "porteador"): ?>
            <?php include ("includes/perfil/datos-perfil-porteador.php"); ?>
            <?php include ("includes/perfil/anuncios-porteador.php"); ?>   
        <?php endif; ?>
        
        <?php if($_COOKIE['tipo_usuario'] == "transportista"): ?>
            <?php include ("includes/perfil/datos-perfil-transportista.php"); ?>
            <?php include ("includes/perfil/anuncios-transportista.php"); ?>
        <?php endif; ?>
        
        <div class="container">
        	<div class="row">
        		<div class="info-medium clearfix">
	                <div class="col-xs-12 col-sm-6">
	                    <div class="como-enviar">
	                        <a href="comoenviar.php"><span>C&oacute;mo enviar con </span><img src="assets/images/logo.png" /></a>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-6">
	                    <div class="contacto clearfix">
	                        <span class="text">Cont&aacute;ctenos</span>
	                        <span class="telefono">Tel: +34 91 434 34 34</span>
	                        <a href="">e-mail: info@blablafurgo.es</a>
	                    </div>
	                </div>               
	            </div>
        	</div>
        </div>
        

	</div> <!-- perfil-container -->
</div>	<!-- perfil-content -->


<?php include('includes/footer.php'); ?>
