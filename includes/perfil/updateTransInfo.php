<?php

	include('../../consultas.php');

	$email = $_COOKIE['email'];

	$negocio            = $_POST['negocio'];
	$nombre             = $_POST['nombre'];
	$apellidos          = $_POST['apellidos'];
	$cp                 = $_POST['cp'];
	$direccion          = $_POST['direccion'];
	$ciudad             = $_POST['ciudad'];
	$provincia          = $_POST['provincia'];
	$pais               = $_POST['pais'];
	$telefono           = $_POST['telefono'];
	$contra             = $_POST['contra'];
	$presupuestoSingle  = $_POST['presupuestoSingle'];
	$presupuestoResumen = $_POST['presupuestoResumen'];
	$reenvioPreguntas   = $_POST['reenvioPreguntas'];
	$sobremi            = $_POST['sobre'];
	$fianza             = $_POST['fianza'];
	$cif				= $_POST['cif'];

	$fianza = $fianza . "%";

	if(isset($presupuestoSingle)){
    	$presupuestoSingle = 1;
	}else{
    	$presupuestoSingle = 0;
	}
	
	if(isset($presupuestoResumen)){
    	$presupuestoResumen = 1;
	}else{
    	$presupuestoResumen = 0;
	}
	
	if(isset($reenvioPreguntas)){
    	$reenvioPreguntas = 1;
	}else{
    	$reenvioPreguntas = 0;
	}
	
	$hay = $_POST['hay-foto'];
	
	if(!($hay)){
    	$random = time();
        $uploads_dir = '../../uploads/';
        $error = $_FILES["foto-perfil-trans"]["error"];
        $name = NULL;
        
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["foto-perfil-trans"]["tmp_name"];
            $name = $random . $_FILES["foto-perfil-trans"]["name"];
            $route = $uploads_dir . $name;
            move_uploaded_file($tmp_name, "$route");
        }
	}
	

	conectar();
	
	if(!$hay){
    	actualizar_datos($email,$negocio,$nombre,$apellidos,$cp,$direccion,$ciudad,$provincia,$pais,$telefono,$contra,$presupuestoSingle,$presupuestoResumen,$reenvioPreguntas,$sobremi,$fianza,$name,$cif);
	}else{
    	actualizar_datos_nofoto($email,$negocio,$nombre,$apellidos,$cp,$direccion,$ciudad,$provincia,$pais,$telefono,$contra,$presupuestoSingle,$presupuestoResumen,$reenvioPreguntas,$sobremi,$fianza,$cif);
	}
	
	
	header("Location: ../../miperfil.php?p=1");
?>