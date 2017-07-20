<?php

	$id_porte = $_POST['id-porte'];

	class preguntas_rutas{
	    public $id;
		public $autor;
		public $pregunta;
		public $fecha;
		public $id_ruta;
	}

	sacarPreguntasRutas($id_porte);
