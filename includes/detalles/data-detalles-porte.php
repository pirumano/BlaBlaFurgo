<div class="row">
	<?php include('isLogin.php'); ?>
	<div class="col-xs-12 but-contact-detalles">
		<span class="but-contactar js-show-contact" type="porte" loged=<?php if($login): ?> "loged" <?php else: ?> "no" <?php endif; ?>contact="1">Contactar con usuario</span>
	</div>
	<div class="contacto-aceptado-porteador js-center js-contact-1">
		<div class="titulo-contacto">Informacion Contacto</div>
		<span class="close-contacto js-close-contact">X</span>
		<span class="item-contacto">
			<span>Nombre:</span> <?php echo $contacto->nombre; ?>
		</span>
		<span class="item-contacto">
			<span>Email:</span> <?php echo $contacto->email; ?>
		</span>
		<span class="item-contacto">
			<span>Telefono:</span> <a href="tel:<?php echo $contacto->telefono; ?>"><?php echo $contacto->telefono; ?></a>
		</span>
	</div>
    <div class="col-xs-12">
        <h3 class='title-center'>Información de lugar y fecha</h3>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="left-content">
            <div class="item">
                <span class="container-item">
           <span class="title">Origen:</span><span class="info"><?php echo $origen;?></span>
                <?php if($flexOrigen): ?>
                <span class="flexible">(Flexible)</span>
                <?php endif; ?>
                </span>
            </div>
            <div class="item">
                <span class="container-item">
	                <span class="title">Destino:</span><span class="info"><?php echo $destino; ?></span>
                <?php if($flexDestino): ?>
                <span class="flexible">(Flexible)</span>
                <?php endif; ?>
                </span>
            </div>
            <div class="item">
                <span class="container-item">
           <span class="title">Publicado el:</span><span class="info"><?php echo $f_publicacion; ?></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="right-content">
            <span class="container-item">
	            <span class="title">Fecha de recogida:</span><span class="info"><?php echo $f_recogida; ?></span>
            <?php if($flexRecogida): ?>
            <span class="flexible">(Flexible)</span>
            <?php endif; ?>
            </span>
            <span class="container-item">
	            <span class="title">Fecha de entrega:</span><span class="info"><?php echo $f_entrega; ?></span>
            <?php if($flexEntrega): ?>
            <span class="flexible">(Flexible)</span>
            <?php endif; ?>
            </span>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-12">
        <h3 class='title-center'>Detalles de la carga</h3>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="left-content">
            <span class="container-item">
	            <span class="title">Descripcion del porte:</span><span class="info"><?php echo $descripcion; ?></span>
            </span>
            <span class="container-item">
	            <span class="title">Descripcion de la carga:</span><span class="info"><?php echo $dimensiones; ?></span>
            </span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div class="right-content">
            <span class="container-item">
	            <span class="title">Tipo de Carga: </span><span class="info"><?php echo $carga; ?></span>
            </span>
            <?php if($foto):?>
            <div style="position: relative;">
                <div class="img-detalles-porte" style="background-image: url('uploads/<?php echo $foto; ?>');"></div>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-12">
        <h3 class='title-center'>Detalles del trayecto</h3>
    </div>
    <div class="col-xs-12">
        <div class="left-content">
            <span class="container-item">
       <span class="title">Distancia:</span><span class="info info-distance"></span>
            </span>
            <span class="container-item">
       <span class="title">Tiempo:</span><span class="info info-time"></span>
            </span>
        </div>
    </div>
</div>
<div id="cont-map-porte">
</div>