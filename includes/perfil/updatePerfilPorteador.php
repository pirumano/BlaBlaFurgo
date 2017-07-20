<?php
	
	$email = $_COOKIE["email"];
	$nombre    = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$email     = $_POST['email'];
	$tlf       = $_POST['telefono'];
	$pass      = $_POST['contra'];
	$presupuesto_single  = $_POST['presupuestoSingle'];
	$presupuesto_resumen = $_POST['presupuestoResumen'];
	$reenvio_preguntas   = $_POST['reenvioPreguntas'];
	
	if(isset($presupuesto_single)){
    	$presupuesto_single = 1;
	}else{
    	$presupuesto_single = 0;
	}
	
	if(isset($presupuesto_resumen)){
    	$presupuesto_resumen = 1;
	}else{
    	$presupuesto_resumen = 0;
	}
	
	if(isset($reenvio_preguntas)){
    	$reenvio_preguntas = 1;
	}else{
    	$reenvio_preguntas = 0;
	}
	
	$hay = $_POST['hay-foto'];
	
	if(!($hay)){
    	$random = time();
    	$uploads_dir = '../../uploads/';
    	$error = $_FILES["foto-perfil-porteador"]["error"];
    
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["foto-perfil-porteador"]["tmp_name"];
            $name = $random . $_FILES["foto-perfil-porteador"]["name"];
            $route = $uploads_dir . $name;
            move_uploaded_file($tmp_name, "$route");
        } 
	}
	
	
	
	
	include("../../consultas.php");

	conectar();

	if(!$hay){
	   refrescar_info_porteador($nombre, $apellidos, $email, $tlf, $pass, $presupuesto_single, $presupuesto_resumen, $reenvio_preguntas,$name);
    }else{
        refrescar_info_porteador_nofoto($nombre, $apellidos, $email, $tlf, $pass, $presupuesto_single, $presupuesto_resumen, $reenvio_preguntas);
    }

	header("Location: ../../miperfil.php?p=1");
?>