<?php

    require_once("consultas.php");
    conectar();
    
    $email = $_COOKIE['email'];
    $id_user = sacar_id_user($email, "transportista");
    
    $num_mensajes_nuevos = getNumeroMensajesNuevosTransportista($email, $id_user);
    
    class preguntaRuta{
        public $tipo;
        public $id;
        public $autor;
        public $id_ruta;
        public $pregunta;
        public $fecha;
        public $origen;
        public $destino;
    }
    
    class respuestaPorte{
        public $tipo;
        public $id;
        public $id_porte;
        public $respuesta;
        public $fecha;
        public $id_pregunta;
        public $origen;
        public $destino;
    }
    
    $preguntasNuevas = getPreguntasNuevasTransportista($email);
    $respuestasNuevas = getRespuestasNuevasTransportista($id_user);
    
    $preguntasLeidas = getPreguntasLeidasTransportista($email);
    $respuestasLeidas = getRespuestasLeidasTransportista($id_user);