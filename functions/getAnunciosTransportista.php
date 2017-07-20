<?php

	//include('../consultas.php');

    conectar();

    $email = $_COOKIE['email'];

    class rutas_activas{
        public $id;
        public $total;
    	public $transportista;
    	public $origen;
    	public $destino;
    	public $f_recogida;
    	public $f_entrega;
    	public $presupuesto;
    	public $descripcion;
    	public $vehiculos;
    	public $f_publicacion;
        public $num_presupuestos;
        public $presupuesto_bajo;
    }
    
    if(isset($_GET['id'])){
    	$email = get_email_by_id($_GET['id'], 'transportista');
    }

    $anuncios_trans = sacar_rutas_trans($email);
    