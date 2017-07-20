<?php include('includes/header.php'); ?>
<?php include('includes/header-content.php'); ?>

<div class="registro-container">
    <div class="registro-content">
    
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="registro-porteador clearfix">
                       <div class="datos-porteador-container clearfix">
                            <div class="col-xs-12 col-sm-4">
                                 <div class="datos-porteador">
                                   <label>Nombre</label>
                                   <input class="nombre" type="text" />
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="datos-porteador">
                                   <label>Apellidos</label>
                                   <input class="apellidos" type="text" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="datos-porteador">
                                    <label>E-mail</label>
                                    <input class="email" type="text" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="datos-porteador">
                                    <label>Telefono</label>
                                    <input class="telefono" type="text" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="datos-porteador">
                                    <label>Contraseña</label>
                                   <input class="contra" type="password" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="datos-porteador">
                                   <label>Repite Contraseña</label>
                                   <input class="repite" type="password" />
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-4"></div>                           
                       </div>
                       
                       <button class="aceptar">Aceptar</button>
                       <div class="result fail"></div>
                    </div>

                </div>
            </div>
        </div>
        
       
    </div> <!-- registro-container -->
</div>  <!-- registro-content -->

<div class="no-footer">
	<?php include('includes/footer.php'); ?>
</div>