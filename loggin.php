<?php
	
	include('consultas.php');

	$email = $_POST['mail'];
	$pass  = $_POST['pass'];
	$tran  = $_POST['tran'];
	$recor = $_POST['record'];

	conectar();

	if($tran == "si"){
		$query = "SELECT pass FROM transportistas WHERE email = '$email'";

		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$pass_user = mysql_fetch_array($result);
		$tipo_usuario = "transportista";
		$name = getNameUserTrans($email);

		$verificacion = verificar_transportista($email);

	}else{
		$query = "SELECT pass FROM porteadores WHERE email = '$email'";
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$pass_user = mysql_fetch_array($result);	
		$tipo_usuario = "porteador";
		$name = getNameUserPort($email);

		$verificacion = verificar_porteador($email);
	}

	if($pass == $pass_user[0]){

		if($verificacion != 1 ){
			$result = 2;
			echo $result;
			return;
		}
		
		$result = 1;
		
		if($recor){
    		setcookie("user", $name, time()+31536000);
    		setcookie("email", $email, time()+31536000);
    		setcookie("tipo_usuario", $tipo_usuario, time()+31536000);
		}else{
    		setcookie("user", $name, time()+3600);
    		setcookie("email", $email, time()+3600);
    		setcookie("tipo_usuario", $tipo_usuario, time()+3600);
		}
		
	}else{
		$result = 0;
	}
	
	echo $result;
?>