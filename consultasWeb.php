<?php
	echo "<b>PROBANDO PROGRAMA PARA TRAER DATOS DE BLA BLA CAR</b></br></br></br></br></br>";
	$origen  = $_POST['origen'];
	$destino = $_POST['destino'];

	$opciones = array(
	  'http'=>array(
	    'method'=>"GET",
	    'header'=>"Accept-language: en\r\n" .
	              "Cookie: foo=bar\r\n"
	  )
	);

	$contexto = stream_context_create($opciones);

	// Abre el fichero usando las cabeceras HTTP establecidas arriba

	//$origen = 'madrid';
	//$destino = 'malaga';

	$urlBBC = 'https://www.blablacar.es/coche-compartido/'.$origen.'/'.$destino.'/#?fn=Madrid&fc=40.416775|-3.70379&fcc=ES&tn=Barcelona&tc=41.385064|2.173403&tcc=ES&sort=trip_date&order=asc&limit=10&page=1';


	$fichero = file_get_contents($urlBBC, false, $contexto);

	$parser = 'class="user span';

	$users = explode($parser, $fichero);

	echo "USUARIO UNO: </BR>";
	echo $users[1];
	echo '</br><b>___________////////////////////////////////////////////////___________</b></br>';
	echo "USUARIO DOS: </BR>";
	echo $users[2];
	echo '</br><b>___________////////////////////////////////////////////////___________</b></br>';
	echo "USUARIO TRES: </BR>";
	echo $users[3];

?>