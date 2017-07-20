<?php
	//include("../../consultas.php");
	
	$email = $_COOKIE["email"];

	conectar();

	$datos = sacar_datos_porteador_perfil($email);

	class info_perfil_porteador{
        public $nombre;
        public $apellidos;
        public $email;
        public $tlf;
        public $pass;
        public $presupuestoSingle;
        public $presupuestoResumen;
        public $reenvioPreguntas;
        public $foto;
    }
    
    $result = new info_perfil_porteador();

    $result->nombre             = $datos[0];
    $result->apellidos          = $datos[1];
    $result->email              = $datos[2];
    $result->tlf                = $datos[3];
    $result->pass               = $datos[4];
    $result->presupuestoSingle  = $datos[5];
    $result->presupuestoResumen = $datos[6];
    $result->reenvioPreguntas   = $datos[7];
    $result->foto               = $datos[8];
?>