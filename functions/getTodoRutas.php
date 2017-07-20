<?php

	if(isset($_POST['ajax'])){
		require_once('../consultas.php');	
	}
	
	conectar();

    class ruta_activa{
        public $id;
    	public $transportista;
        public $origen;
    	public $destino;
    	public $f_recogida;
        public $f_entrega;
        public $flexible_origen;
        public $flexible_destino;
        public $flexible_recogida;
        public $flexible_entrega;
    	public $presupuesto_km;
    	public $km_minimo;
    	public $descripcion;
    	public $vehiculos;
    	public $f_publicacion;
    }
    
    if(isset($_POST['offset'])){
	    $offset = $_POST['offset'];
    }else{
	    $offset = '0';
    }

    $rutasTodos = getTodoRutas(10, $offset);
    
    if(isset($_POST['ajax'])){
    	$result = "";
    	if($rutasTodos){
		    foreach($rutasTodos as $item):
	            $result.= '<li class="item-ruta">
	                <form action="detalles-ruta.php" method="get" onclick="submit();">';
	                    $result .= '<input type="hidden" value="' . $item->id . '" name="id" />';
	                    $result .= '<span class="origen">' . $item->origen . '</span>';
	                    $result .= '<input type="hidden" value="' . $item->origen . '" name="origen" />';
	                    $result .= '<span class="destino">' . $item->destino. '</span>';
	                    $result .= '<input type="hidden" value="' . $item->destino . '" name="destino" />';
	                    $result .= '<span class="recogida">' . $item->f_recogida . '</span>';
	                    $result .= '<span class="entrega">' . $item->f_entrega . '</span>';
	                    $result .= '<span class="km">' . $item->presu_minimo . '</span>';
	                    $result .= '<span class="descripcion">' . $item->descripcion . '</span>
	                </form>
	            </li>';
	         endforeach;
	     }
	     
	     echo $result;
	 }
?>