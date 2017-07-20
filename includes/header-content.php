<div class="header-container clearfix">
	<div class="header-content clearfix">
	
		<div class="datos-container relatived">
			<div>
				<a href="<?php echo $index?>"><div class="img"></div></a>
			</div>
			<span class="js-trigger-menu ion-navicon-round menu shoot-menu"></span>
		</div>
		
		<div class="nav-container js-main-menu">
			<div class="menu">
				<ul class="clearfix menu-principal">
				    <?php include('isLogin.php'); ?>
				    <?php if($login): ?>
				        <li class="entrar-usuario js-submenupadre clearfix">
				            <a href="" class="entrar">Bienvenido <?php echo $login; ?>!</a>
				        </li>
				        <div class="submenu-bienvenido js-submenu ts ts-ease-out ts-slow clearfix">
			                <span class="li-submenu cerrar-sesion js-cerrar-sesion">Cerrar Sesi&oacute;n</span>
			            </div>
				        <li class="miperfil clearfix"><a href="miperfil.php" class="miperfil">Mi Perfil</a></li>
				        <?php if($pendientes != "0"): ?>
				        	<li class="chat clearfix"><a href="pendientes.php" class="chat">Valoraciones pendientes</a></li>
				        <?php endif; ?>
				    <?php else: ?>
				        <li class="entrar-usuario js-modal-trigger clearfix" data-modal="1"><a href="" class="entrar">Iniciar Sesi&oacute;n</a></li>
				        <li class="registrate clearfix"><a href="registrate.php" class="registro">Reg&iacute;strate</a></li>
				    <?php endif; ?>
				</ul>
			</div>
		</div>
		
	</div> <!-- nav-content -->
</div> <!-- nav-container -->

<div class="overlay">

	<div class="modal-wrapper modal-login">
		<div class="modal js-modal-box-1 js-modal-login">
			<div class="close-modal-fixed js-modal-close">Cerrar</div>
			<div class="cont-modal cont-modal-recu">
				<span>Email</span>
				<input type="email" name="email" placeholder="Login" value="" />
				<span>&iquest;Eres transportista?</span>
				<div>
					<div class="si si-no">
    					<span class="si">SI</span>
    					<input class="si-rec" name="rec" type="radio" value="si">
					</div>
					<div class="no si-no">
    					<span class="no">NO</span>
    					<input class="no-rec" name="rec" type="radio" value="no">
					</div>
				</div>
				<button class="send-recuperar">Enviar</button>
			</div>
			<div class="cont-modal cont-modal-main">
				<!-- <form action="loggin.php" method="POST"> -->
					<span>Email</span>
					<input type="email" name="email" placeholder="Login" value="" />
					<span>Contrase&ntilde;a</span>
					<input type="password" name="pass" placeholder="password" value="" />
					<div class="cont-record">
					   <label>Recordarme</label>
					   <input class="recordarme" type="checkbox">
					</div>
					<span>&iquest;Eres transportista?</span>
					<div class="si si-no">
    					<span class="si">SI</span>
    					<input class="si" type="radio" value="si">
					</div>
					<div class="no si-no">
    					<span class="no">NO</span>
    					<input class="no" type="radio" value="no">
					</div>
					<button class="but-log">Iniciar</button>
					<div class="result"></div>
					<div class="reg-text">
    				    <span class="info">Si no est&aacute;s registrado, <a class="registro" href="registrate.php">Reg&iacute;strate Gratis.</a></span>
    				</div>
				<!-- </form> -->
			</div>
		</div>
	</div>
	
	<div class="modal-wrapper modal-login2">
		<div class="modal js-modal-box-2 js-modal-login2">
			<div class="close-modal-fixed js-modal-close">Cerrar</div>
			<div class="cont-modal cont-modal-recu">
				<span>Email</span>
				<input type="email" name="email" placeholder="Login" value="" />
				<button class="send-recuperar">Enviar</button>
			</div>
			<div class="cont-modal cont-modal-main">
    			<span class="info">Para poder publicar rutas debes tener una cuenta como Transportista e iniciar sesi&oacute;n</span>
				<span>Email</span>
				<input type="email" name="email" placeholder="Login" />
				<span>Contrase&ntilde;a</span>
				<input type="password" name="pass" placeholder="password" />
				<span>&iquest;Eres transportista?</span>
				<div class="si si-no">
					<span class="si">SI</span>
					<input class="si" type="radio" value="si">
				</div>
				<div class="no si-no">
					<span class="no">NO</span>
					<input class="no" type="radio" value="no">
				</div>
				<button class="but-log">Entrar</button>
				<div class="reg-text">
    				<span class="info">Si no est&aacute;s registrado, <a class="registro" href="registrate.php">Reg&iacute;strate Gratis</a></span>
				</div>
				<div class="result"></div>
			</div>
		</div>
	</div>
	
	<div class="modal-wrapper modal-login3">
		<div class="modal js-modal-box-3 js-modal-login3">
			<div class="close-modal-fixed js-modal-close">Cerrar</div>
			<div class="cont-modal cont-modal-recu">
				<span>Email</span>
				<input type="email" name="email" placeholder="Login" value="" />
				<button class="send-recuperar">Enviar</button>
			</div>
			<div class="cont-modal cont-modal-main">
    			<span class="info">Para poder publicar portes debes iniciar sesi&oacute;n</span>
    			<div class="reg-text">
    				<span class="info">Si no est&aacute;s registrado, <a class="registro" href="registrate.php">Reg&iacute;strate Gratis,</a> e intenta de nuevo publicar tu porte.</span>
				</div>
				<span>Email</span>
				<input type="email" name="email" placeholder="Login" value="" />
				<span>Contrase&ntilde;a</span>
				<input type="password" name="pass" placeholder="password" value="" />
				<span>&iquest;Eres transportista?</span>
				<div class="si si-no">
					<span class="si">SI</span>
					<input class="si" type="radio" value="si">
				</div>
				<div class="no si-no">
					<span class="no">NO</span>
					<input class="no" type="radio" value="no">
				</div>
				<button class="but-log">Iniciar</button>
				<div class="result"></div>
			</div>
		</div>
	</div>
</div>