<?php include("get_perfil_porteador.php"); ?>
<form method="POST" action="includes/perfil/updatePerfilPorteador.php" enctype="multipart/form-data" onsubmit="return validatePerfilPorteador();">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="datos-perfil-porteador clearfix">
                    <div class="col-xs-12 col-sm-3">
                        <div class="cont-imagen">
                            <div class="cont-img">
                                <?php if($result->foto):?>
                                <img src="uploads/<?php echo $result->foto?>" />
                                <?php else:?>
                                <img src="assets/images/profile.png" />
                                <?php endif;?>
                            </div>
                            <div class="changer">
                                <div class="fake-file clearfix">
                                    <?php if($result->foto):?>
                                    <input type="hidden" class="hay-foto" name="hay-foto" value="1">
                                    <?php else:?>
                                    <input type="hidden" class="hay-foto" name="hay-foto" value="0">
                                    <?php endif;?>
                                    <input type="file" name="foto-perfil-porteador" />
                                    <span class="col-xs-12 col-sm-6">Cambiar</span>
                                </div>
                                <span class="col-xs-12 col-sm-6 deleter">Quitar</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="cont-datos">
                            <div class="informacion clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="dato">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" value="<?php echo $result->nombre; ?>" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="dato">
                                        <label>Apellidos</label>
                                        <input type="text" name="apellidos" value="<?php echo $result->apellidos; ?>" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="dato">
                                        <label>E-mail</label>
                                        <input type="text" name="email" value="<?php echo $result->email; ?>" readonly="readonly" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="dato">
                                        <label>N&uacute;mero de tel&eacute;fono</label>
                                        <input type="text" name="telefono" value="<?php echo $result->tlf; ?>" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="dato">
                                        <label>Contrase&ntilde;a</label>
                                        <input type="password" name="contra" value="<?php echo $result->pass; ?>" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="dato">
                                        <label>Repetir Contrase&ntilde;a</label>
                                        <input type="password" name="repecontra" value="<?php echo $result->pass; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cont-datos -->
                    </div>
                    <button type="submit">Guardar</button>
                    <div class="result">
                        <?php if(isset($_GET['p'])):?>
                        <?php if($_GET['p']):?>
                        <span>Datos actualizados correctamente!</span>
                        <?php else:?>
                        <span class="fail">Error al actualizar los datos, int&eacute;ntelo de nuevo por favor!</span>
                        <?php endif;?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- datos-perfil -->
            </div>
        </div>
    </div>
</form>