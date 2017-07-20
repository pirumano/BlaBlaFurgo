<?php include("includes/header.php"); ?>
<?php include('includes/header-content.php'); ?>

<div class="container">
    <div class="home-container">
        <div class="home-content">    
            <div class="row">
                <div class="tabs clearfix">
                    <div class="col-md-6">
                        <span class="enviar current">Quiero Enviar</span>
                    </div>
                    <div class="col-md-6">
                        <span class="transporte">Soy Transportista</span>
                    </div>
                </div>
            </div> <!-- row -->
            
            <div class="row">
                <div class="col-xs-12">
                    <div class="main-buscador clearfix">
                            <div class="radios clearfix">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="publicar main">
                                            <div class="fake-div">
                                                <input id="input-publicar" type="radio" name="publicar-radio" checked/>
                                                <label for="input-publicar" class="lab-publi">Publicar Porte</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="buscar main">
                                            <div class="fake-div">
                                                <input id="input-buscar" type="radio" name="buscar-radio" />
                                                <label class="lab-buscar" for="input-buscar">Rutas Publicadas</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div><!-- row -->
                            </div>
                        <?php include('includes/content/enviar-publicar.php'); ?>
                        <?php include('includes/content/transportar-publicar.php'); ?>
                        <?php include('includes/content/enviar-buscar.php'); ?>
                        <?php include('includes/content/transportar-buscar.php'); ?>
                    </div> <!-- main-buscador -->
                </div>
            </div> <!-- row -->
            
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
            <div class="list-info">
                <div class="tabs2 clearfix">
                    <div class="col-md-6 no-pad-left no-pad-right">
                        <span class="tab-portes current">Portes Publicados</span>
                    </div>
                    <div class="col-md-6 no-pad-left no-pad-right">
                        <span class="tab-transportes">Rutas Publicadas</span>
                    </div>
                </div>
                
                <div class="main-list clearfix">
                     <?php include("includes/content/lista-portes.php"); ?>
                     <?php include("includes/content/lista-transportes.php"); ?>
                </div>
            </div><!-- list-info -->
            
        </div> <!-- home-content -->
    </div> <!-- home-container -->
</div>

<?php include('includes/footer.php'); ?>