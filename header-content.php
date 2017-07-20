<div class="header-container clearfix">
	<div class="header-content clearfix">
	
		<div class="datos-container">
			<div>
				<a href="http://www.miporte.es/index.php"><div class="img"></div></a>
			</div>
		</div>
		
		<div class="nav-container">
			<div class="menu">
				<ul class="clearfix menu-principal">
				    <?php include('isLogin.php'); ?>
				    <?php if($login): ?>
				        <li class="entrar-usuario js-submenupadre">
				            <a href="" class="entrar">Bienvenido <?php echo $login; ?>!</a>
				            <div class="submenu-bienvenido js-submenu">
				                <span class="li-submenu">Ver algo</span>
				                <span class="li-submenu cerrar-sesion js-cerrar-sesion">Cerrar Sesi&oacute;n</span>
				            </div>
				        </li>
				        <li class="miperfil"><a href="miperfil.php" class="miperfil">Mi Perfil</a></li>
				    <?php else: ?>
				        <li class="entrar-usuario js-modal-trigger" data-modal="1"><a href="" class="entrar">Iniciar Sesi&oacute;n</a></li>
				        <li class="registrate"><a href="registrate.php" class="registro">Reg&iacute;strate</a></li>
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
			<div class="cont-modal">
				<form action="loggin.php" method="POST">
					<span>Email</span>
					<input type="email" name="email" placeholder="Login" />
					<span>Contrase&ntilde;a</span>
					<input type="pass" name="pass" placeholder="password" />
					<button>Iniciar</button>
					<div class="result"></div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="modal-wrapper modal-login2">
		<div class="modal js-modal-box-2 js-modal-login2">
			<div class="close-modal-fixed js-modal-close">Cerrar</div>
			<div class="cont-modal">
    			<span class="info">Para poder publicar rutas debes estar logueado</span>
				<span>Email</span>
				<input type="email" placeholder="Login" />
				<span>Contrase&ntilde;a</span>
				<input type="password" placeholder="password" />
				<button>Entrar</button>
				<div class="reg-text">
    				<span class="info">Si no est&aacute;s registrado, <a class="registro" href="registrate.php">Reg&iacute;strate</a></span>
				</div>
				<div class="result"></div>
			</div>
		</div>
	</div>
	
	
</div>