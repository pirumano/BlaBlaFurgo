<?php

	$id_porte = $_POST['id-porte'];

	class preguntas_portes{
	    public $id;
		public $autor;
		public $pregunta;
		public $fecha;
		public $id_porte;
	}

	sacarPreguntasPortes($id_porte);
