<?php include("get_todo_perfil.php"); ?>
<form method="POST" action="includes/perfil/updateTransInfo.php" enctype="multipart/form-data" onsubmit="return validatePerfilTrans();">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="datos-perfil-transportista clearfix">              
                <div class="col-xs-12 col-sm-3">
                    <div class="cont-imagen">
                        <div class="cont-img">
                            <?php if($datos_trans->foto):?>
                               <img src="uploads/<?php echo $datos_trans->foto?>" />
                            <?php else:?>
                               <img src="assets/images/profile.png" />
                            <?php endif;?>  
                        </div>
                        <div class="changer">
                            <div class="fake-file lefted clearfix">
                                <?php if($datos_trans->foto):?>
                                    <input type="hidden" class="hay-foto" name="hay-foto" value="1">
                                <?php else:?>
                                    <input type="hidden" class="hay-foto" name="hay-foto" value="0">
                                <?php endif;?>
                                <input type="file" name="foto-perfil-trans"/>
                                <span class="left">Cambiar</span>
                                <span class="righted deleter">Quitar</span>
                            </div>
                            
                        </div>        
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-9">
                    <div class="cont-datos clearfix">
                        <div class="informacion clearfix">
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="dato">
                                    <label>Nombre del Negocio</label>
                                    <input type="text" name="negocio" value="<?php echo $datos_trans->negocio; ?>" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="dato">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" value="<?php echo $datos_trans->nombre; ?>" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="dato">
                                    <label>Apellidos</label>
                                    <input type="text" name="apellidos" value="<?php echo $datos_trans->apellidos; ?>"/>
                                </div>
                            </div>

                            <!-- <div class="clearfix"></div> -->
                            
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                            	<div class="dato">
	                                <label>C&oacute;digo postal</label>
	                                <input type="text" name="cp" value="<?php echo $datos_trans->cp; ?>" />
	                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                            	<div class="dato">
	                                <label>Direcci&oacute;n</label>
	                                <input type="text" name="direccion" value="<?php echo $datos_trans->direccion; ?>" />
	                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                            	<div class="dato">
	                                <label>Ciudad</label>
	                                <input type="text" name="ciudad" value="<?php echo $datos_trans->ciudad; ?>" />
	                            </div>
                            </div>
                            <!-- <div class="clearfix"></div> -->
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                            	<div class="dato">
	                                <label>Provincia</label>
	                                <input type="text" name="provincia" value="<?php echo $datos_trans->provincia; ?>" />
	                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                            	<div class="dato">
	                                <label>Pa&iacute;s</label>
	                                <input type="text" name="pais" value="<?php echo $datos_trans->pais; ?>" />
	                            </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                            	<div class="dato">
	                                <label>N&uacute;mero de tel&eacute;fono</label>
	                                <input type="text" name="telefono" value="<?php echo $datos_trans->movil; ?>"/>
	                            </div>
                            </div>
                            <!-- <div class="clearfix"></div> -->
							<div class="col-xs-12 col-sm-6 col-lg-4">
								<div class="dato">
	                                <label>E-mail</label>
	                                <input type="text" name="email" value="<?php echo $datos_trans->email; ?>" readonly="readonly"/>
	                            </div>
							</div>
							<div class="col-xs-12 col-sm-6 col-lg-4">
								<div class="dato">
	                                <label>Contrase&ntilde;a</label>
	                                <input type="password" name="contra" value="<?php echo $datos_trans->pass; ?>"/>
	                            </div>
							</div>
							<div class="col-xs-12 col-sm-6 col-lg-4">
								<div class="dato">
	                                <label>Repetir Contrase&ntilde;a</label>
	                                <input type="password" name="repecontra" value="<?php echo $datos_trans->pass; ?>"/>
	                            </div>
							</div>
							<div class="col-xs-12 col-sm-6 col-lg-4">
								<div class="dato">
	                                <label>CIF</label>
	                                <input type="text" name="cif" value="<?php echo $datos_trans->cif; ?>"/>
	                            </div>
							</div>
							<!-- <div class="clearfix"></div> -->
							<div class="col-xs-12">
								<div class="dato cont-description">
	                                <label>Sobre m&iacute;</label>
	                                <textarea name="sobre"><?php echo $datos_trans->descripcion;?></textarea>
	                            </div>
							</div>
                            
                            <div class="col-xs-12">
                            	<button type="submit" class="info-trans guardar-perfil">Guardar datos personales</button>
                            </div>
                            <div class="result-info">
                                <?php if(isset($_GET['p'])):?>
                                   <?php if($_GET['p']):?>
                                       <span>Datos personales actualizados correctamente!</span>
                                   <?php else:?>
                                       <span class="fail">Error al actualizar los datos, int&eacute;ntelo de nuevo por favor!</span>
                                   <?php endif;?>
                                <?php endif; ?>
                            </div>
                        </div>  <!-- informacion -->
                    </form>
                        
                        <div class="vehiculos-perfil clearfix"> 
                            <div class="mis">
                            	<div class="col-xs-12">
                            		<label>Mis Veh&iacute;culos</label>
                            	</div>
                                
                                <?php include("functions/todosVehiculos.php"); ?>
                                <div class="col-xs-12">
                                	<select>
	                                     <?php $i = 1;?>
	                                     <option value="0" disabled selected>Seleccionar un Vehiculo</option>
	                                     <?php foreach ($todosVehiculos as $single): ?>
	                                        <?php $i = $i + 1; ?>
	                                            <option value="<?php echo $i; ?>"><?php echo $single; ?></option>
	                                        <?php endforeach; ?>
	                                </select>
	                                <button class="add-vehicle">Agregar Vehiculo</button>
                                </div>
                                <div class="col-xs-12">
                                	
                                </div>
                                
                            </div>
                            <?php include("functions/getVehiculos.php"); ?>
                            <div class="vehi-add">
                                <ul class="lista-agregados">
                                	
                                    <?php foreach ($vehiculos as $single): ?>
	                                         <li><div><span class="item-vehiculo"><?php echo $single; ?></span><span class='cerrar'>X</span></div></li>
                                    <?php endforeach; ?>
                                    
                                </ul>
                            </div>
                            <div class="col-xs-12">
                            	<button class="vehiculos-trans guardar-perfil">Guardar vehiculos</button>

                            </div>
                            <div class="col-xs-12">
	                            <form class="form-modificar" method="POST" action="modificarCargas.php">
	                            		<button class="cargas-modificar">Modificar cargas</button>
	                            </form>
                            </div>
                            <div class="result-vehiculos"></div>
                            <div class="result-recordar"></div>
                        </div>
                        
                    </div>  <!-- cont-datos -->
                </div>
                
            </div>
        </div>
    </div>
</div>
