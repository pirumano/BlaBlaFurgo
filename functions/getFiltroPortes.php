<?php
    
    include_once("consultas.php");
    conectar();
    
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $entrega = $_GET['entrega'];
    $recogida = $_GET['recogida'];
    $carga = $_GET['carga'];

    if($carga == 'Cualquiera')
        $carga = "";
    
    class porte_filtro{
        public $origen;
    	public $destino;
    	public $carga_id;
    	public $f_entrega;
    	public $f_recogida;
    	public $precio;
    	public $descripcion;
    	public $f_publicacion;
    	public $distancia;
    	public $total;
    }
    
    $query  = "SELECT * FROM portes WHERE origen LIKE '%$origen%' AND destino LIKE '%$destino%' AND f_entrega LIKE '%$entrega%' AND f_recogida LIKE '%$recogida%' AND carga_id LIKE '%$carga%' ORDER BY id DESC";
    
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	$i = 0;
	
	while($row = mysql_fetch_array($result)) {
	
		$porteFiltro[$i] = new porte_filtro();
		
		$porteFiltro[$i]->id = $row['ID'];
		
		if ($row['cliente'] == NULL){
			$row['cliente'] = "No Especificado";
		}
		$porteFiltro[$i]->cliente = $row['cliente'];

		if ($row['origen'] == NULL){
			$row['origen'] = "No Especificado";
		}
		$porteFiltro[$i]->origen = $row['origen'];
		
		if ($row['destino'] == NULL){
			$row['destino'] = "No Especificado";
		}
		$porteFiltro[$i]->destino = $row['destino'];

		if ($row['carga_id'] == NULL){
			$row['carga_id'] = "No Especificado";
		}
		$porteFiltro[$i]->carga_id = $row['carga_id'];

		if ($row['f_entrega'] == NULL){
			$row['f_entrega'] = "No Especificado";
		}
		$porteFiltro[$i]->f_entrega = $row['f_entrega'];

		if ($row['f_recogida'] == NULL){
			$row['f_recogida'] = "No Especificado";
		}
		$porteFiltro[$i]->f_recogida = $row['f_recogida'];

		if ($row['flexible_origen'] == NULL){
			$row['flexible_origen'] = "No Especificado";
		}
		$porteFiltro[$i]->flexible_origen = $row['flexible_origen'];

		if ($row['flexible_destino'] == NULL){
			$row['flexible_destino'] = "No Especificado";
		}
		$porteFiltro[$i]->flexible_destino = $row['flexible_destino'];

		if ($row['flexible_recogida'] == NULL){
			$row['flexible_recogida'] = "No Especificado";
		}
		$porteFiltro[$i]->flexible_recogida = $row['flexible_recogida'];

		if ($row['flexible_entrega'] == NULL){
			$row['flexible_entrega'] = "No Especificado";
		}
		$porteFiltro[$i]->flexible_entrega = $row['flexible_entrega'];

		if ($row['precio'] == NULL){
			$row['precio'] = "No Especificado";
		}
		$porteFiltro[$i]->precio = $row['precio'];

		if ($row['descripcion'] == NULL){
			$row['descripcion'] = "No Especificado";
		}
		$porteFiltro[$i]->descripcion = $row['descripcion'];

		if ($row['f_publicacion'] == NULL){
			$row['f_publicacion'] = "No Especificado";
		}
		$porteFiltro[$i]->f_publicacion = $row['f_publicacion'];

		if ($row['distancia'] == NULL){
			$row['distancia'] = "No Especificado";
		}
		$porteFiltro[$i]->distancia = $row['distancia'];

		$i++;
    }    
    
?>
