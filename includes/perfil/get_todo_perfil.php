<?php
	//include('../../consultas.php');

	$email = $_COOKIE["email"];

	conectar();

	$datos            = sacar_info_transportista($email);
	$metodos_pago     = sacar_metodos_pagos($email);
	$id_transportista = sacar_id_user($email);

	class info_perfil_transportista{
	    public $id;
        public $negocio;
        public $nombre;
        public $apellidos;
        public $cp;
        public $direccion;
        public $ciudad;
        public $provincia;
        public $pais;
        public $movil;
        public $email;
        public $pass;
        public $descripcion;
        public $verificacion;
        public $completo;
        public $metodo_pago;
        public $fianza;
        public $foto;
        public $cif;
    }

    class metodo_pago{
    	public $efectivo;
        public $cheque;
        public $visa;
        public $mastercard;
        public $paypal;
        public $american;
        public $transferencia;
    }


	class vehiculos{
        public $tonelada3;
        public $tonelada7;
        public $tonelada18;
        public $tonelada25;
        public $tonelada40;
        public $coche;
        public $rigido;
        public $articulado;
        public $lona;
        public $barcos;
        public $mascotas;
        public $basculante;
        public $estandar;
        public $plataforma;
        public $baja;
        public $doble;
        public $extensible;
        public $tractora;
        public $refrigerado;
        public $especial;
        public $volteo;
        public $desmontable;
        public $furgoneta;
        public $otros;
        public $cisterna;
        public $hibrido;
    }

    
    $datos_trans = new info_perfil_transportista();
    

    $datos_trans->id                  = $id_transportista;
    $datos_trans->negocio             = $datos[1];
    $datos_trans->nombre              = $datos[2];
    $datos_trans->apellidos           = $datos[3];
    $datos_trans->cp                  = $datos[4];
    $datos_trans->direccion           = $datos[5];
    $datos_trans->ciudad              = $datos[6];
    $datos_trans->provincia           = $datos[7];
    $datos_trans->pais                = $datos[8];
    $datos_trans->movil               = $datos[9];
    $datos_trans->email               = $datos[10];
    $datos_trans->pass                = $datos[11];
    $datos_trans->descripcion         = $datos[12];
    $datos_trans->verificacion        = $datos[13];
    $datos_trans->fianza  	          = $datos[16];
    $datos_trans->presupuestoSingle   = $datos[17];
    $datos_trans->presupuestoResumen  = $datos[18];
    $datos_trans->reenvioPreguntas    = $datos[19];
    $datos_trans->foto                = $datos[20];
    $datos_trans->cif				  = $datos[24];

    $pagos_transportista = new metodo_pago();

    $string_datos = unserialize($metodos_pago);

    //inicializamos array
    foreach (range(0,7) as $value) {
    	$pagos_array[$value] = 0;
    }

    if($string_datos){
	    foreach ($string_datos as $metodo ) {
	    	$pagos_array[$metodo] = 1;
	    }
    }
    

    $todos_vehiculos = sacar_vehiculos_transportista($id_transportista);

    foreach (range(0,26) as $value) {
    	$vahiculos_array[$value] = 0;
    }
    
    if($todos_vehiculos){
	    foreach ($todos_vehiculos as $vehiculo ) {
	    	$vahiculos_array[$vehiculo] = 1;
	    }
    }
    

    //echo "</br>";
    //var_dump($vahiculos_array);

?>