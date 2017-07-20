<div class="trans-publi info-buscador">
    <div class="sitios clearfix">
        <div class="row">
            <div class="col-sm-6">
                <div class="origen sitio">
                    <label>Origen</label>
                    <input class="origen-input input-auto" id="tpo" type="text" placeholder="CP, localidad &oacute; provincia" />
                    <div class="flexer">
                        <label class="label-flexible">Flexible</label>
                        <input class="check-publi check-trans-origen" type="checkbox" />
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="destino sitio">
                    <label>Destino</label>
                    <input class="destino-input input-auto" id="tpd" type="text" placeholder="CP, localidad &oacute; provincia" />
                    <div class="flexer">
                        <label class="label-flexible">Flexible</label>
                        <input class="check-publi check-trans-destino" type="checkbox" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fechas clearfix">
        <div class="row">
            <div class="col-sm-6">
                <div class="recogida">
                    <div class="inputer">
                        <label class="label-flexible">Fecha de Recogida</label>
                        <input class="input-recogida" name="recogida" type="text" placeholder="Elija uno o varios dias" />
                    </div>
                    <div class="flexer">
                        <label>Flexible</label>
                        <input class="check-publi check-trans-recogida" type="checkbox" />
                    </div>
                </div>
                <!-- recogida -->
            </div>
            <div class="col-sm-6">
                <div class="entrega">
                    <div class="inputer">
                        <label class="label-entrega">Fecha de Entrega</label>
                        <input class="input-entrega" name="entrega" type="text" placeholder="Elija uno o varios dias" />
                    </div>
                    <div class="flexer">
                        <label class="label-flexible">Flexible</label>
                        <input class="check-publi check-trans-entrega" type="checkbox" />
                    </div>
                </div>
                <!-- entrega -->
            </div>
        </div>
    </div>
    <!-- fechas -->
    <div class="row">
        <div class="col-xs-12">
            <div class="vehiculo clearfix">
                <div class="mis">
                    <label>Mis Veh&iacute;culos</label>
                    <?php include("functions/getVehiculos.php"); ?>
                    <select>
                        <?php $i = 1;?>
                        <option value="0" disabled selected>Seleccionar un Vehículo</option>
                        <?php foreach ($vehiculos as $single): ?>
	                        <?php $i = $i + 1; ?>
	                        <option value="<?php echo $i; ?>"><?php echo $single; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="add-vehicle">Agregar Vehiculo</button>
                <div class="vehi-add">
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="presu clearfix">
                <label>Presupuesto minimo</label>
                <input class="input-presu" type="text" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="descripcion clearfix">
                <label>Descripci&oacute;n Vehículo y Trayecto</label>
                <textarea class="text-desc" onkeyup="javascript:countChar(this)" maxlength="500"></textarea>
                <span class="count"><span class="number-count">0</span> / <span>500 Caracteres</span></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="boton-publicar clearfix">
                <button class="publicar-ruta">Publicar Ruta</button>
            </div>
        </div>
    </div>
    <div class="resultTP"></div>
</div>