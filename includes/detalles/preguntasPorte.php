<div class="row">
    <div class="col-xs-12">
        <div class="container-mensajes clearfix">
            <div class="">
                <label class="title-big">Preguntas</label>
            </div>
            <div class="">
                <div class="content-mensajes">
                    <?php $preguntas = sacarPreguntasPortes($id); ?>
                    <?php if($preguntas):?>
	                    <?php $count = 0;?>
	                    <?php $total = count($preguntas);?>
	                    <?php foreach($preguntas as $single): ?>
		                    <?php $count++;?>
		                    <div class="col-xs-12">
		                        <div class="title-pregunta">
		                            <span>Pregunta enviada por <a href="perfil-publico-trans.php?id=<?php echo $single->autor; ?>"><?php echo $single->nombre_autor; ?></a>. </span>
		                            <span><?php echo $single->fecha;?></span>
		                        </div>
		                    </div>
		                    <div class="col-xs-12">
		                        <span class="pregunta title js-pregunta <?php if($id_cliente_porte == $id_user): ?>clickable<?php endif;?>" data-pregunta="<?php echo $count;?>" <?php if($count==$total): ?><?php endif;?>><?php echo $single->pregunta; ?></span>
		                    </div>
		                    <?php if($id_cliente_porte == $id_user):?>		                
			                    <div class="col-xs-12">
			                        <form class="cont-respuesta js-data-<?php echo $count;?>" action="functions/sendRespuestaPorte.php" method="POST">
			                            <input type="hidden" name="id-pregunta" value="<?php echo $single->id;?>" />
			                            <input type="hidden" name="origen" value="<?php echo $origen; ?>" />
			                            <input type="hidden" name="destino" value="<?php echo $destino; ?>" />
			                            <input type="hidden" name="id-porte" value="<?php echo $id?>" />
			                            <input type="hidden" name="user_pregunta" value="<?php echo $single->autor; ?>" />
			                            <input type="text" name="respuesta" placeholder="Escriba su respuesta" class="respuesta" />
			                            <button>Responder</button>
			                        </form>
			                    </div>
		                    <?php endif; ?>
		                    <?php $respuestas = sacarRespuestasPorte($single->id);?>
		                    <?php if($respuestas):?>
			                    <?php foreach($respuestas as $single): ?>
				                    <div class="col-xs-12">
				                        <div class="cont-respuestas-hechas title-pregunta">
				                            <span class="title-respuesta">Respuesta:</span>
				                            <span><?php echo $single->fecha;?></span>
				                            <span class="respuesta-hecha"><?php echo $single->respuesta;?></span>
				                        </div>
				                    </div>
			                    <?php endforeach;?>
		                    <?php endif;?>
	                    <?php endforeach; ?>
                    <?php else:?>
                    <div class="">
                        <span class="pregunta title">No hay preguntas</span>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <?php if($id_cliente_porte == $id_user):?>
            <?php if($total != 0):?>
            <div class="col-xs-12">
                <span class="title">Para responder una pregunta, pulse sobre ella.</a></span>
            </div>
            <?php endif; ?>
            <?php else: ?>
            <?php if( ($id_user != "") && ($tipo_user == "transportista") && ($verificado)):?>
            <div class="col-xs-12">
                <form action="functions/sendPreguntaPorte.php" method="POST">
                    <textarea name="pregunta-nueva" class="text-pregunta" placeholder="Escribe aqui tu pregunta"></textarea>
                    <input type="hidden" name="origen" value="<?php echo $origen; ?>" />
                    <input type="hidden" name="destino" value="<?php echo $destino; ?>" />
                    <input type="hidden" name="id-porte" value="<?php echo $id?>" />
                    <button type="submit" class="send-pregunta">Enviar</button>
                </form>
            </div>
            <?php else:?>
            <div class="col-xs-12">
                <span class="title">Para poder enviar preguntas en este porte, debes iniciar sesion con una cuenta de transportista. <a href="registrate.php">Si aun no tienes cuenta registrate gratis.</a></span>
            </div>
            <?php endif;?>
            <?php endif; ?>
        </div>
    </div>
</div>