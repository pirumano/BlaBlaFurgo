<div class="transportar-buscar info-buscador">
	<form method="get" action="buscar-portes.php">
    	<div class="sitios clearfix">
            <div class="row">
                <div class="col-sm-6">
                    <div class="origen">
                        <label>Origen</label>
                        <input class="origen-input input-auto" name="origen" id="tbo" type="text" placeholder="CP, localidad &oacute; provincia" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="destino">
                        <label>Destino</label>
                        <input class="destino-input input-auto" name="destino" id="tbd" type="text" placeholder="CP, localidad &oacute; provincia" />
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
		    			<option value="Mudanzas">Mudanzas</option>
		    			<option value="Muebles / General">Muebles / General</option>
		    			<option value="Objetos Empaquetados">Objetos Empaquetados</option>
		    			<option value="Coches / Vehiculos">Coches / Veh&iacute;culos</option>
		    			<option value="Motos">Motos</option>
		    			<option value="Especialista / Antig&uuml;edades">Especialistas / Antig&uuml;edades</option>
		    			<option value="Piezas de Vehiculos">Piezas de Veh&iacute;culos</option>
		    			<option value="Mercancias">Mercanc&iacute;as</option>
		    			<option value="Piano">Piano</option>
		    			<option value="Barcos">Barcos</option>
		    			<option value="Industrial">Industrial</option>
		    			<option value="Mascotas / Animales">Mascotas / Animales</option>
		    			<option value="Liquidos" >L&iacute;quidos</option>
		    			<option value="Cuidado Especial">Cuidado Especial</option>
		    			<option value="Refrigerados">Refrigerados</option>
		    			<option value="Otra">Otra</option>
    		</select>
    	</div>
    	
    	<div class="boton-publicar clearfix">
    		<button class="buscar-porte">Buscar Porte</button>
    		<span>Al hacer click en "Buscar Porte", est&aacute;s indicando que has le&iacute;do y est&aacute;s de acuerdo con el <a href="">Contrato de Usuario</a></span>
    	</div>
	</form>
</div>