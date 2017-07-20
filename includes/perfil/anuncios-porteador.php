<?php include("functions/getAnunciosPorteador.php"); ?>
<?php include("functions/getMensajesPorteador.php"); ?>

<?php $anuncio_first = 0;?>
<?php foreach ($ofertas_envidadas as $single): ?>
	<?php if($single->estado == "aceptado"):?>
		<div class="contacto-aceptado-porteador js-center js-contact-<?php echo $anuncio_first; ?>">
			<div class="titulo-contacto">Informacion Contacto</div>
			<span class="close-contacto js-close-contact">X</span>
			<span class="item-contacto">
				<span>Nombre:</span> <?php echo $info_contacto[$anuncio_first]->nombre; ?>
			</span>
			<span class="item-contacto">
				<span>Email:</span> <?php echo $info_contacto[$anuncio_first]->email; ?>
			</span>
			<span class="item-contacto">
				<span>Telefono:</span> <a href="tel:<?php echo $info_contacto[$anuncio_first]->telefono; ?>"><?php echo $info_contacto[$anuncio_first]->telefono; ?></a>
			</span>
		</div>
	<?php endif;?>
	<?php $anuncio_first++;?>
<?php endforeach; ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="tabla-anuncios-porteador">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tabs clearfix">
                            <div class="col-xs-12 col-sm-6 no-padd no-pad-left no-pad-768 single-tab active">
                                <span class="active js-tab-perfil" name="anuncios-porteador">Anuncios activos (<?php if($anuncios[0]): echo $anuncios[0]->total; else: ?>0<?php endif?>)</span>
                            </div>
                            <div class="col-xs-12 col-sm-6 no-padd no-pad-left no-pad-right no-pad-768 single-tab">
                                <span class="js-tab-perfil js-perfil-mensajes-porte" name="mensajes-porteador">Mensajes (<?php echo $num_mensajes_nuevos;?>)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="datos-tabla">
                            <?php include("includes/perfil/porteador-anuncios.php"); ?>
                            <?php include("includes/perfil/porteador-mensajes.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>