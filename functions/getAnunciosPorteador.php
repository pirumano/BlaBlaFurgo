<?php

	//include('../consultas.php');

    conectar();

    $email = $_COOKIE['email'];

    //$id_porteador = id_porteador($email);

    class anuncio_activo{
        public $id;
    	public $origen;
    	public $destino;
    	public $carga_id;
    	public $f_entrega;
    	public $f_recogida;
    	public $presu_mas_bajo;
    	public $num_presupuesto;
    	public $descripcion;
    	public $f_publicacion;
    	public $total;
    }
    
    if(isset($_GET['id'])){
    	$email = get_email_by_id($_GET['id'], 'porteador');
    }

    $anuncios = sacar_anuncios_portes($email);