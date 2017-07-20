<form action="paso3-action.php" method="POST" enctype="multipart/form-data">
    <div class="paso3">
        <div class="resultT"></div>
        <div class="main-content">
            <?php include("functions/getVehiculos.php"); ?>
            <div class="misvehiculos">
                <div class="res"></div>
                
                <?php $i = 0;?>
                <?php foreach ($vehiculos as $single): ?>
                    <?php $i = $i + 1; ?>
                    <div class="vehiculo-cargas">
                        <input type="hidden" name="haymas" value="<?php echo $i?>" />
                        <input type="hidden" name="vehiculo-<?php echo $i; ?>" value="<?php echo $single; ?>" />
                        <label name="title-<?php echo $i?>" class="title"><?php echo $single; ?></label>
                        
                        <div class="cargasOK">
                            <label class="muebles">Muebles / General</label>
                            <input class="muebles" name="muebles-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="muebles" value="Muebles / General" />
                            
                            <label class="objetos">Objetos Empaquetados</label>
                            <input class="objetos" name="objetos-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="objetos" value="Objetos Empaquetados" />
                            
                            <label class="coches">Coches / Vehiculos</label>
                            <input class="coches" name="coches-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="coches" value="Coches / Vehiculos" />
                            
                            <label class="motos">Motos</label>
                            <input class="motos" name="motos-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="motos" value="Motos" />
                            
                            <label class="especial">Especialistas / Antiguedades</label>
                            <input class="especial" name="especial-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="especial" value="Especialistas / Antiguedades" />
                            
                            <label class="piezas">Piezas Mecanicas</label>
                            <input class="piezas" name="piezas-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="piezas" value="Piezas Mecanicas" />
                            
                            <label class="merca">Mercancias</label>
                            <input class="merca" name="merca-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="merca" value="Mercancias" />
                            
                            <label class="piano">Piano</label>
                            <input class="piano" name="piano-<?php echo $i?>"type="checkbox" />
                            <input type="hidden" name="piano" value="Piano" />
                            
                            <label class="barco">Barcos</label>
                            <input class="barco" name="barco-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="barco" value="Barcos" />
                            
                            <label class="industrial">Industrial</label>
                            <input class="industrial" name="industrial-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="industrial" value="Industrial" />
                            
                            <label class="mascota">Mascotas / Animales</label>
                            <input class="mascota" name="mascota-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="mascota" value="Mascotas / Animales" />
                            
                            <label class="cuidado">Cuidado Especial</label>
                            <input class="cuidado" name="cuidado-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="cuidado" value="Cuidado Especial" />
                            
                            <label class="refrigerado">Refrigerados</label>
                            <input class="refrigerado" name="refrigerado-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="refrigerado" value="Refrigerados" />
                            
                            <label class="liquido">Liquidos</label>
                            <input class="liquido" name="liquidos-<?php echo $i?>" type="checkbox" />
                            <input type="hidden" name="liquidos" value="Liquidos" />
                            
                        </div> <!-- cargasOK -->
                        
                    </div>
                <?php endforeach;?>
               <input type="hidden" name="total" value="<?php echo $i; ?>" />
            </div>
            
        </div> <!-- main-content -->
        
        <div class="botonera">
            <button type="submit" class="next">Siguiente</button>
        </div>
    </div>
</form>