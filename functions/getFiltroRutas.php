<?php
    
    include_once("consultas.php");
    conectar();
    
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $entrega = $_GET['entrega'];
    $recogida = $_GET['recogida'];
    $carga = $_GET['carga'];
    
    if($carga == "Cualquiera")
        $carga = "";
    
    class rutasFiltro{
        public $id;
        public $total;
    	public $transportista;
    	public $origen;
    	public $destino;
    	public $f_recogida;
    	public $f_entrega;
    	public $presupuesto;
    	public $km_minimos;
    	public $descripcion;
    	public $vehiculos;
    	public $f_publicacion;
        public $num_presupuestos;
        public $presupuesto_bajo;
    }
    
    $query  = "SELECT * FROM rutas WHERE origen LIKE '%$origen%' AND destino LIKE '%$destino%' AND f_entrega LIKE '%$entrega%' AND f_recogida LIKE '%$recogida%' ORDER BY id DESC";
    
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	$i = 0;
	
	while($row = mysql_fetch_array($result)) {
    	$rutasFiltro[$i] = new rutasFiltro();
    	
    	$rutasFiltro[$i]->id = $row['ID'];
			
		if ($row['transportista'] == NULL){
			$row['transportista'] = "No Especificado";
		}
		$rutasFiltro[$i]->transportista = $row['transportista'];

		if ($row['origen'] == NULL){
			$row['origen'] = "No Especificado";
		}
		$rutasFiltro[$i]->origen = $row['origen'];
		
		if ($row['destino'] == NULL){
			$row['destino'] = "No Especificado";
		}
		$rutasFiltro[$i]->destino = $row['destino'];

		if ($row['f_recogida'] == NULL){
			$row['f_recogida'] = "No Especificado";
		}
		$rutasFiltro[$i]->f_recogida = $row['f_recogida'];

		if ($row['f_entrega'] == NULL){
			$row['f_entrega'] = "No Especificado";
		}
		$rutasFiltro[$i]->f_entrega = $row['f_entrega'];

		if ($row['presupuesto'] == NULL){
			$row['presupuesto'] = "No Especificado";
		}
		$rutasFiltro[$i]->presupuesto = $row['presupuesto'];
		
		if ($row['km_minimos'] == NULL){
			$row['km_minimos'] = "No Especificado";
		}
		$rutasFiltro[$i]->km_minimos = $row['km_minimos'];

		if ($row['descripcion'] == NULL){
			$row['descripcion'] = "No Especificado";
		}
		$rutasFiltro[$i]->descripcion = $row['descripcion'];

		if ($row['vehiculos'] == NULL){
			$row['vehiculos'] = "No Especificado";
		}
		$array_vehiculos = unserialize($row['vehiculos']);


		if(($array_vehiculos)){
			$concatenar = "";
			foreach ($array_vehiculos as $key){
			    $segunda = $concatenar.$key.",";
			    $concatenar = $segunda;
			}
			$rutasFiltro[$i]->vehiculos = $concatenar;
		}

		if ($row['f_publicacion'] == NULL){
			$row['f_publicacion'] = "No Especificado";
		}
		$rutasFiltro[$i]->f_publicacion = $row['f_publicacion'];

		if ($row['num_presupuesto'] == NULL){
			$row['num_presupuesto'] = "No Especificado";
		}
		$rutasFiltro[$i]->num_presupuestos = $row['num_presupuesto'];

		if ($row['presupuesto_bajo'] == NULL){
			$row['presupuesto_bajo'] = "No hay presupuestos hechos";
		}
		$rutasFiltro[$i]->presupuesto_bajo = $row['presupuesto_bajo'];

		$i++;
	}
    
    
?>
