<?php 
	include('consultas.php');
	
	$negocio   = $_POST['negocio'];
	$nombre    = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$cp        = $_POST['cp'];
	$direccion = $_POST['direccion'];
	$cif	   = $_POST['cif'];
	$ciudad    = $_POST['ciudad'];
	$provincia = $_POST['provincia'];
	$pais      = $_POST['pais'];
	$movil     = $_POST['movil'];
	$email     = $_POST['email'];
	$pass      = $_POST['pass'];
	$pass2     = $_POST['pass2'];

	conectar();

	$repe = email_repetido_porteadores($email);
	if($repe != 0){
		echo "Este email ya está siendo usado. Pruebe con otro.";
		return;
	}

	
	setcookie("pre-email", $email , time() + 3600);
    setcookie("pre-user" , $nombre, time() + 3600);
	setcookie("pre-tipo_usuario", "transportista", time() + 3600);

	if($repe == 0){
		$sql    = "INSERT INTO transportistas (negocio, nombre, apellidos, cp, direccion, ciudad, provincia, pais, movil, email, pass, descripcion, cif, verificacion, registro_ok) 
		VALUES ('$negocio', '$nombre', '$apellidos', '$cp', '$direccion','$ciudad', '$provincia', '$pais', '$movil', '$email' , '$pass' , '$descripcion', '$cif', '1', '1')";
		
		$result = mysql_query($sql);
	}