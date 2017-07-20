<div class="enviar-buscar info-buscador">
	<form method="get" action="buscar-rutas.php">
    	<div class="sitios clearfix">
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="origen">
		    			<label>Origen</label>
		    			<input class="origen-input input-auto" name="origen" id="ebo" type="text" placeholder="CP, localidad &oacute; provincia" />
		    		</div>
    			</div>
    			<div class="col-sm-6">
    				<div class="destino">
		    			<label>Destino</label>
		    			<input class="destino-input input-auto" name="destino" id="ebd" type="text" placeholder="CP, localidad &oacute; provincia" />
		    		</div>
    			</div>
    		</div>
    		
    		
    	</div>
    	
    	<div class="fechas clearfix">
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="recogida">
		    		  	<div class="inputer">
		    		      	<label>Fecha de Recogida</label>
		    			  	<input class="input-recogida" name="recogida" type="text" placeholder="Elija uno o varios dias" />
		    	      	</div>
		    	    </div> <!-- recogida -->
    			</div>
    			<div class="col-sm-6">
    				
    				<div class="entrega">
		    		  	<div class="inputer">
		    		      	<label class="label-entrega">Fecha de Entrega</label>
		    			  	<input class="input-entrega" name="entrega" type="text" placeholder="Elija uno o varios dias" />
		    	      	</div>
		    	    </div> <!-- entrega -->
    			</div>
    		</div>
    		
    
    	    
    	     
    	</div> <!-- fechas -->
    	
    	<div class="tipo-cargas clearfix">
    		<label>Tipo de Carga</label>
    		<select name="carga">
    			<option selected>Cualquiera</option>
    			<option value="2">Muebles / General</option>
    			<option value="2">Objetos Empaquetados</option>
    			<option value="2">Coches / Veh&iacute;culos</option>
    			<option value="2">Motos</option>
    			<option value="2">Especialistas / Antig&uuml;edades</option>
    			<option value="2">Piezas de Veh&iacute;culos</option>
    			<option value="1">Mercanc&iacute;as</option>
    			<option value="2">Piano</option>
    			<option value="2">Barcos</option>
    			<option value="2">Industrial</option>
    			<option value="4">Mascotas</option>
    			<option value="3">L&iacute;quidos</option>
    			<option value="2">Cuidado Especial</option>
    			<option value="2">Refrigerados</option>
    			<option value="5">Otra</option>
    		</select>
    	</div>                                    
    	
    	<div class="boton-publicar clearfix">
    		<button class="filtrar-rutas">Filtrar Rutas</button>
    		<span>Al hacer click en "Buscar Transporte", est&aacute;s indicando que has le&iacute;do y est&aacute;s de acuerdo con el <a href="">Contrato de Usuario</a></span>
    	</div>
	</form>
</div>