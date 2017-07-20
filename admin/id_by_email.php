<?php
	
	include('../consultas.php');
	conectar();
	
	$id = get_id_by_email($_POST['email'], 'transportista');
	
	echo $id;