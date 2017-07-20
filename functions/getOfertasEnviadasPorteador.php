<?php

    require_once('consultas.php');
	conectar();

	$id_user = sacar_id_user($_COOKIE['email'], "porteador");
	
    class oferta_ruta{
        public $ID;
        public $ruta_id;
        public $autor_ruta;
        public $precio_oferta;
        public $fecha;
    }
    
    class info_autor_oferta{
		public $nombre;
		public $email;
		public $telefono;
	}
    
    $query = "SELECT * FROM ofertas_rutas WHERE autor_oferta = '$id_user' ORDER BY ID DESC";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	
	$total_ofertas = 0;
	$i = 0;
	
	while($row = mysql_fetch_array($result)) {
    	$ofertas_envidadas[$i] = new oferta_ruta();
    	$info_contacto[$i] = new info_autor_oferta();
    	
    	$ofertas_envidadas[$i]->ID =  $row['ID'];
    	$ofertas_envidadas[$i]->ruta_id = $row['ruta_id'];
    	$ofertas_envidadas[$i]->autor_ruta = $row['autor_ruta'];
    	$ofertas_envidadas[$i]->precio_oferta = $row['precio_oferta'];
    	$ofertas_envidadas[$i]->fecha = $row['fecha'];
    	$ofertas_envidadas[$i]->estado = $row['estado'];
    	
    	$autor = $row['autor_ruta'];
    	
    	$query2 = "SELECT * FROM transportistas WHERE email = '$autor'";
    	$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
    	$info = mysql_fetch_array($result2);
    	
    	$info_contacto[$i]->nombre = $info['nombre'];
    	$info_contacto[$i]->email = $autor;
    	$info_contacto[$i]->telefono = $info['movil'];
    	
    	$total_ofertas++;
    	$i++;
	}
	
	