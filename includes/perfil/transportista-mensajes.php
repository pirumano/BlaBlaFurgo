<div class="mensajes-transportista tabla-transportista">
	<?php if($preguntasNuevas != "" || $respuestasNuevas != "" || $preguntasLeidas != "" || $respuestasLeidas != ""): ?>
	    <div class="leyenda">
	        <span>Tipo</span>
	        <span>Fecha</span>
	        <span>Mensaje</span>
	        <span>Origen (Anuncio)</span>
	        <span>Destino (Anuncio)</span>
	        <span class="es-nuevo">Nuevo</span>
	    </div>
	    
	  <!--
	  $preguntasNuevas
	    $respuestasNuevas    
	    $preguntasLeidas    
	    $respuestasLeidas
	-->
	    <?php if($preguntasNuevas):?>
	        <?php foreach($preguntasNuevas as $item):?>
	            <li class="item-anuncio item-mensaje-transportista mensaje-nuevo">
	                <span><?php echo $item->tipo;?></span>
	                <span><?php echo $item->fecha;?></span>
	                <span><?php echo $item->pregunta;?></span>
	                <span><?php echo $item->origen;?></span>
	                <span><?php echo $item->destino;?></span>
	                <span class="es-nuevo">SI</span>
	                <span>
	                    <form action="detalles-ruta.php" method="get" onclick="submit(); " target="_blank">
	                        <input type="hidden" value="<?php echo $item->id_ruta; ?>" name="id" />
	                        <input type="hidden" value="<?php echo $item->origen; ?>" name="origen" />
	                        <input type="hidden" value="<?php echo $item->destino; ?>" name="destino" />
	                        <button type="submit">Ir al anuncio</button>
	                    </form>
	                </span>
	            </li>
	        <?php endforeach;?>
	    <?php endif;?>
	    
	    <?php if($respuestasNuevas):?>
	        <?php foreach($respuestasNuevas as $item):?>
	            <li class="item-anuncio item-mensaje-transportista mensaje-nuevo">
	                <span><?php echo $item->tipo;?></span>
	                <span><?php echo $item->fecha;?></span>
	                <span><?php echo $item->respuesta;?></span>
	                <span><?php echo $item->origen;?></span>
	                <span><?php echo $item->destino;?></span>
	                <span class="es-nuevo">SI</span>
	                <span>
	                    <form action="detalles-porte.php" method="get" onclick="submit(); " target="_blank">
	                        <input type="hidden" value="<?php echo $item->id_porte; ?>" name="id" />
	                        <input type="hidden" value="<?php echo $item->origen; ?>" name="origen" />
	                        <input type="hidden" value="<?php echo $item->destino; ?>" name="destino" />
	                        <button type="submit">Ir al anuncio</button>
	                    </form>
	                </span>	            
	                
	                <?php $pregunta = getPreguntaPorteByRespuesta($item->id_pregunta);?>
	                
	                <?php if($pregunta):?>
	                	<span>MI PREGUNTA</span>
		                <span><?php echo $pregunta['fecha'];?></span>
		                <span><?php echo $pregunta['pregunta'];?></span>
	                <?php endif;?>
	            
	            
	            </li>
	            
	        <?php endforeach;?>
	    <?php endif;?>
	    
	    <?php if($preguntasLeidas):?>
	        <?php foreach($preguntasLeidas as $item):?>
	            <li class="item-anuncio item-mensaje-transportista">
	                <span><?php echo $item->tipo;?></span>
	                <span><?php echo $item->fecha;?></span>
	                <span><?php echo $item->pregunta;?></span>
	                <span><?php echo $item->origen;?></span>
	                <span><?php echo $item->destino;?></span>
	                <span class="es-nuevo">NO</span>
	                <span>
	                    <form action="detalles-ruta.php" method="get" onclick="submit(); " target="_blank">
	                        <input type="hidden" value="<?php echo $item->id_ruta; ?>" name="id" />
	                        <input type="hidden" value="<?php echo $item->origen; ?>" name="origen" />
	                        <input type="hidden" value="<?php echo $item->destino; ?>" name="destino" />
	                        <button type="submit">Ir al anuncio</button>
	                    </form>
	                </span>
	            
				
				<?php $respuesta = getRespuestaRutaByPregunta($item->id);?>
				
				<?php if($respuesta):?>
				
					<span>MI RESPUESTA</span>
	                <span><?php echo $respuesta['fecha'];?></span>
	                <span><?php echo $respuesta['respuesta'];?></span>
	                
	            <?php endif;?>
			</li>            
	            
	        <?php endforeach;?>
	    <?php endif;?>
	    
	    <?php if($respuestasLeidas):?>
	        <?php foreach($respuestasLeidas as $item):?>
	            <li class="item-anuncio item-mensaje-transportista">
	                <span><?php echo $item->tipo;?></span>
	                <span><?php echo $item->fecha;?></span>
	                <span><?php echo $item->respuesta;?></span>
	                <span><?php echo $item->origen;?></span>
	                <span><?php echo $item->destino;?></span>
	                <span class="es-nuevo">NO</span>
	                <span>
	                    <form action="detalles-porte.php" method="get" onclick="submit(); " target="_blank">
	                        <input type="hidden" value="<?php echo $item->id_porte; ?>" name="id" />
	                        <input type="hidden" value="<?php echo $item->origen; ?>" name="origen" />
	                        <input type="hidden" value="<?php echo $item->destino; ?>" name="destino" />
	                        <button type="submit">Ir al anuncio</button>
	                    </form>
	                </span>
	                
	                <?php $pregunta = getPreguntaPorteByRespuesta($item->id_pregunta);?>
	                
	                <?php if($pregunta):?>
	                	<span>MI PREGUNTA</span>
		                <span><?php echo $pregunta['fecha'];?></span>
		                <span><?php echo $pregunta['pregunta'];?></span>
	                <?php endif;?>
	                
	            </li>
	        <?php endforeach;?>
	    <?php endif;?>
	<?php else: ?>
		<span class="no-hay">No hay mensajes!</span>
	<?php endif;?>
</div>