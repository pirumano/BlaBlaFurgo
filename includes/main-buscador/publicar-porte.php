<?php
    
    include("../../consultas.php");

    conectar();

	$email = $_COOKIE['email'];
	
	$tipo = $_COOKIE['tipo_usuario'];
    
    if($tipo == "porteador")
        $verificado = VerificadoPorteador($email);
    elseif($tipo == "transportista")
        $verificado = getVerificadoTransportista($email);
    else
        $verificado = "0";
        
    if($verificado != "1"){
        ?>
        <script>
            alert('Entre en su correo y verifique su cuenta de miPorte para poder publicar. Gracias');
            history.go(-1);
        </script>
        <?php
        return;
    }
	
	$origen   = $_POST['origen'];
	$destino  = $_POST['destino'];
	$recogida = $_POST['recogida'];
	$entrega  = $_POST['entrega'];
	$descrip  = $_POST['descrip'];
	$checkOrigen   = $_POST['checkOrigen'];
	$checkDestino  = $_POST['checkDestino'];
	$checkRecogida = $_POST['checkRecogida'];
	$checkEntrega  = $_POST['checkEntrega'];
	$dimensiones = $_POST['dimensiones'];
	$carga = $_POST['tipo-carga'];
	if($carga == "Cualquiera")
		$carga = "No Especificado";

	$f_publicacion = date("d")."/".date("m")."/".date("Y");
	
	if(isset($checkOrigen)){
    	$checkOrigen = 1;
	}else{
    	$checkOrigen = 0;
	}
	
	if(isset($checkDestino)){
    	$checkDestino = 1;
	}else{
    	$checkDestino = 0;
	}
	
	if(isset($checkRecogida)){
    	$checkRecogida = 1;
	}else{
    	$checkRecogida = 0;
	}
	
	if(isset($checkEntrega)){
    	$checkEntrega = 1;
	}else{
    	$checkEntrega = 0;
	}
	   
    $random = time();
    $uploads_dir = '../../uploads/';
    $error = $_FILES["foto-porte"]["error"];
    
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["foto-porte"]["tmp_name"];
        $name = $random . $_FILES["foto-porte"]["name"];
        $route = $uploads_dir . $name;
        move_uploaded_file($tmp_name, "$route");
    }    

	$sql = "INSERT INTO portes (cliente, origen, destino, carga_id, dimensiones, f_entrega, f_recogida, flexible_origen, flexible_destino, flexible_recogida, flexible_entrega, descripcion, f_publicacion, foto) 
		VALUES ('$email', '$origen', '$destino', '$carga', '$dimensiones', '$entrega','$recogida', '$checkOrigen', '$checkDestino', '$checkRecogida', '$checkEntrega', '$descrip', '$f_publicacion', '$name')";
		
	mysql_query($sql) or header("Location: ../../index.php"); ;
	
	header("Location: ../../index.php");
