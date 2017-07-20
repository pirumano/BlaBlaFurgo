<?php

    require_once('consultas.php');
	conectar();

	$email = $_COOKIE['email'];
    
    class presupuesto_recibido_transportista{
        public $ID;
        public $ruta_id;
        public $autor_oferta;
        public $precio_oferta;
        public $fecha;
        public $descripcion;
    }
    
    $query = "SELECT * FROM ofertas_rutas WHERE autor_ruta = '$email' ORDER BY ID DESC ";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	$total_presupuestos = 0;
	$i = 0;
	
	while($row = mysql_fetch_array($result)) {
    	$presupuestos_recibidos[$i] = new presupuesto_recibido_transportista();
    	
    	$presupuestos_recibidos[$i]->ID 			=  $row['ID'];
    	$presupuestos_recibidos[$i]->ruta_id 		= $row['ruta_id'];
    	$presupuestos_recibidos[$i]->autor_oferta 	= $row['autor_oferta'];
    	$presupuestos_recibidos[$i]->precio_oferta 	= $row['precio_oferta'];
    	$presupuestos_recibidos[$i]->fecha 			= $row['fecha'];
    	$presupuestos_recibidos[$i]->descripcion 	= $row['descripcion'];
    	$presupuestos_recibidos[$i]->estado 		= $row['estado'];
    	
    	$total_presupuestos++;
    	$i++;
	}
