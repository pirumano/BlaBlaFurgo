<?php
	
	if(!isset($_COOKIE['pre-email'])){
		header('Location: index.php');
	}
	
?>

<?php include('includes/header.php'); ?>
<?php include('includes/header-content.php'); ?>

<div class="registro-container">
	<div class="registro-content clearfix">
	   
	   <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="registro-transportista">
                    	<div class="col-xs-12 col-sm-4">
                            <div class="resumen">
                                <?php include('includes/registro/pasos.php'); ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <div class="info">
                                <span>Regístrese para ser transportista de BlaBlaFurgo</span> 
                                <?php include('includes/registro/paso2.php'); ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
	   
	</div> <!-- registro-container -->
</div>	<!-- registro-content -->


<?php include('includes/footer.php'); ?>