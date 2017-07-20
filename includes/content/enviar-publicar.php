<div class="row">
    <div class="col-xs-12">
        <div class="env-publi info-buscador">
            <form method="POST" action="includes/main-buscador/publicar-porte.php" enctype="multipart/form-data" onsubmit="return validatePublicarPorte();">
                <input type="hidden" name="dimensiones" class="dimensiones"/>
                <div class="sitios clearfix">
                    <div class="row">   
                        <div class="col-sm-6">  
                            <div class="origen sitio">
                                <label>Origen</label>
                                <input class="origen-input input-auto" type="text" id="epo" placeholder="CP, localidad &oacute; provincia" autocomplete="off" name="origen" />
                                
                                 <div class="flexer">
                                     <label  class="label-flexible">Flexible</label>
                                     <input class="check-publi check-env-origen" name="checkOrigen" type="checkbox" />
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="destino sitio">
                                <label>Destino</label>
                                <input class="destino-input input-auto" type="text" id="epd" placeholder="CP, localidad &oacute; provincia" name="destino"/>
                                
                                <div class="flexer">
                                     <label  class="label-flexible">Flexible</label>
                                     <input class="check-publi check-env-destino" name="checkDestino" type="checkbox" />
                                 </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- sitios -->
                
                <div class="fechas clearfix">
                    <div class="row">
                        <div class="col-sm-6">
                            
                            <div class="recogida">
                                <div class="inputer">
                                    <label>Fecha de Recogida</label>
                                    <input class="input-recogida input-autorrelleno" name="recogida" type="text" placeholder="Elija uno o varios dias" />
                                </div>
                                
                                <div class="flexer">
                                    <label class="label-flexible">Flexible</label>
                                    <input class="check-publi check-env-recogida" name="checkRecogida" type="checkbox" />
                                 </div>
                            </div> <!-- recogida -->
                        </div>
                        <div class="col-sm-6">
                            <div class="entrega">
                                <div class="inputer">
                                    <label class="label-entrega">Fecha de Entrega</label>
                                    <input class="input-entrega input-autorrelleno" name="entrega" type="text" placeholder="Elija uno o varios dias" />
                                    
                                </div>
                                <div class="flexer">
                                    <label class="label-flexible">Flexible</label>
                                    <input class="check-publi check-env-entrega" name="checkEntrega" type="checkbox" />
                                 </div>
                            </div> <!-- entrega -->
                        </div>
                    </div>
                    
            
                    
                     
                </div> <!-- fechas -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tipo-cargas clearfix">
                            <label>Tipo de Carga</label>
                            <select name="tipo-carga">
                                <option selected>Cualquiera</option>
                                <option value="Mudanzas" data-value="2">Mudanzas</option>
                                <option value="Muebles / General" data-value="2">Muebles / General</option>
                                <option value="Objetos Empaquetados" data-value="2">Objetos Empaquetados</option>
                                <option value="Coches / Vehiculos" data-value="2">Coches / Veh&iacute;culos</option>
                                <option value="Motos" data-value="2">Motos</option>
                                <option value="Especialista / Antig&uuml;edades" data-value="2">Especialistas / Antig&uuml;edades</option>
                                <option value="Piezas de Vehiculos" data-value="2">Piezas de Veh&iacute;culos</option>
                                <option value="Mercancias" data-value="1">Mercanc&iacute;as</option>
                                <option value="Piano" data-value="2">Piano</option>
                                <option value="Barcos" data-value="2">Barcos</option>
                                <option value="Industrial" data-value="2">Industrial</option>
                                <option value="Mascotas / Animales" data-value="4">Mascotas / Animales</option>
                                <option value="Liquidos" data-value="3">L&iacute;quidos</option>
                                <option value="Cuidado Especial" data-value="2">Cuidado Especial</option>
                                <option value="Refrigerados" data-value="2">Refrigerados</option>
                                <option value="Otra" data-value="5">Otra</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xs-12">
                        <div class="detalles-carga clearfix">
                            <div class="especificacion">
                                <?php include('includes/var/especificacion-carga-1.php'); ?>
                                <?php include('includes/var/especificacion-carga-2.php'); ?>
                                <?php include('includes/var/especificacion-carga-3.php'); ?>
                                <?php include('includes/var/especificacion-carga-4.php'); ?>
                                <?php include('includes/var/especificacion-carga-5.php'); ?>
                                
                                <?php include('includes/var/especificacion-fake.php'); ?>
                            </div>
                            <div class="cont-img clearfix">
                                <input type="file" name="foto-porte"/>
                                <img src="assets/images/photo-example.png" />
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="despre clearfix">
                    <div class="descripcion clearfix">
                        <label>Descripci&oacute;n</label>
                        <textarea class="text-desc" onkeyup="javascript:countChar(this)" maxlength="500" name="descrip"></textarea>
                        <span class="count"><span class="number-count">0</span> / <span>500 Caracteres</span></span>
                    </div>
                </div>
                
                <div class="boton-publicar clearfix">
                    <button type="submit" class="publicar-porte">Publicar Porte</button>
                </div>
            </form>
        </div> <!-- env-publi info-buscador -->
    </div>  <!-- col-xs-12 -->
</div>  <!-- row -->