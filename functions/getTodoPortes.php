<?php

	if(isset($_POST['ajax'])){
		require_once('../consultas.php');	
	}
	
	conectar();

    class anuncio_activo{
        public $id;
    	public $cliente;
        public $origen;
    	public $destino;
    	public $carga_id;
    	public $dimensiones;
    	public $f_entrega;
    	public $f_recogida;
        public $flexible_origen;
        public $flexible_destino;
        public $flexible_recogida;
        public $flexible_entrega;
    	public $descripcion;
    	public $f_publicacion;
    	public $total;
    }
    
    if(isset($_POST['offset'])){
	    $offset = $_POST['offset'];
    }else{
	    $offset = '0';
    }

    $portesTodos = getTodoPortes(10, $offset);
    
    if(isset($_POST['ajax'])){
    	$result = "";
    	if($portesTodos){
		    foreach($portesTodos as $item):
		        $result .= '<li class="item-porte">
		            <form action="detalles-porte.php" method="get" onclick="submit(); ">';
		                $result .= '<input type="hidden" value="' . $item->id . '" name="id" />';
		                $result .= '<span class="origen">' . $item->origen . '</span>';
		                $result .= '<input type="hidden" value="' . $item->origen . '" name="origen" />';
		                $result .= '<span class="destino">' . $item->destino . '</span>';
		                $result .= '<input type="hidden" value="' . $item->destino . '" name="destino" />';
		                $result .= '<span class="carga">' . $item->carga_id . '</span>';
		                $result .= '<span class="recogida">' . $item->f_recogida . '</span>';                       
		                $result .= '<span class="entrega">' . $item->f_entrega . '</span>';                 
		                $result .= '<span class="descripcion">' . $item->descripcion . '</span>
		            </form>
		        </li>';
	         endforeach;
         }
         
         echo $result;
    }
?>