<div class="container-mensajes">
   <label class="title-big">Preguntas</label>
   <div class="content-mensajes">
       <?php $preguntas = sacarPreguntasRutas($id); ?>
       <?php if($preguntas):?>
           <?php $count = 0;?>
           <?php $total = count($preguntas);?>
           <?php foreach($preguntas as $single): ?>
               <?php $count++;?>
               <div class="title-pregunta">
                   <span>Pregunta enviada por <a href="perfil-publico-cliente.php?id=<?php echo $single->autor;?>"><?php echo $single->nombre_autor; ?></a>. </span>
                   <span><?php echo $single->fecha;?></span>
               </div>
               <span class="pregunta title js-pregunta <?php if($id_cliente_ruta == $id_user): ?>clickable<?php endif;?>" data-pregunta="<?php echo $count;?>" <?php if($count == $total): ?>style="border-bottom: none;"<?php endif;?>><?php echo $single->pregunta; ?></span>
               <?php if($id_cliente_ruta == $id_user):?>
	               <form class="cont-respuesta js-data-<?php echo $count;?>" action="functions/sendRespuestaRuta.php" method="POST">
	                   <input type="hidden" name="id-pregunta" value="<?php echo $single->id;?>"/>
	                   <input type="hidden" name="origen" value="<?php echo $origen; ?>" />
	                   <input type="hidden" name="destino" value="<?php echo $destino; ?>" />
	                   <input type="hidden" name="id-ruta" value="<?php echo $id?>" />
	                   <input type="hidden" name="user_pregunta" value="<?php echo $single->autor; ?>" />
                       <input type="text" name="respuesta" placeholder="Escriba su respuesta" class="respuesta" /><button>Responder</button>
                   </form>
               <?php endif; ?>
               
               <?php $respuestas = sacarRespuestasRuta($single->id);?>
	           <?php if($respuestas):?>
	               <?php foreach($respuestas as $single): ?>
    	               <div class="cont-respuestas-hechas title-pregunta">
        	               <span class="title-respuesta">Respuesta:</span>
        	               <span><?php echo $single->fecha;?></span>
        	               <span class="respuesta-hecha"><?php echo $single->respuesta;?></span>
    	               </div>
	               <?php endforeach;?>
	           <?php endif;?>
               
           <?php endforeach; ?>
       <?php else:?>
           <span class="pregunta title">No hay preguntas</span>
       <?php endif;?>
   </div>
   <?php if($id_cliente_ruta == $id_user):?>
       <?php if($total != 0):?>
           <span class="title">Para responder una pregunta, pulse sobre ella.</a></span>
       <?php endif; ?>
   <?php else: ?>
       <?php if( ($id_user != "") && ($tipo_user == "porteador") && ($verificado)):?>
       
           <form action="functions/sendPreguntaRuta.php" method="POST">
               <textarea name="pregunta-nueva" class="text-pregunta" placeholder="Escribe aqui tu pregunta"></textarea>
               <input type="hidden" name="origen" value="<?php echo $origen; ?>" />
               <input type="hidden" name="destino" value="<?php echo $destino; ?>" />
               <input type="hidden" name="id-ruta" value="<?php echo $id?>" />
               <button type="submit" class="send-pregunta">Enviar</button>
           </form>
           
       <?php else:?>
       
           <span class="title">Para poder enviar preguntas en esta ruta, debes iniciar sesion con una cuenta de cliente, no como transportista! (si ya iniciaste sesion como cliente verifica tu cuenta, para ello entra en tu correo!). <a href="registrate.php">Si aun no tienes cuenta registrate gratis.</a></span>
       <?php endif;?>
   <?php endif; ?>
</div>