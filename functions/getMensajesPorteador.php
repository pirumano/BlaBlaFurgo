<?php

    require_once("consultas.php");
    conectar();
    
    $email = $_COOKIE['email'];
    $id_user = sacar_id_user($email, "porteador");
    
    $num_mensajes_nuevos = getNumeroMensajesNuevosPorteador($email, $id_user);
    
    class preguntaPorte{
        public $tipo;
        public $id;
        public $autor;
        public $id_porte;
        public $pregunta;
        public $fecha;
        public $origen;
        public $destino;
    }
    
    class respuestaRuta{
        public $tipo;
        public $id;
        public $id_ruta;
        public $respuesta;
        public $fecha;
        public $id_pregunta;
        public $origen;
        public $destino;
    }
    
    $preguntasNuevas = getPreguntasNuevasPorteador($email);
    $respuestasNuevas = getRespuestasNuevasPorteador($id_user);
    
    $preguntasLeidas = getPreguntasLeidasPorteador($email);
    $respuestasLeidas = getRespuestasLeidasPorteador($id_user);