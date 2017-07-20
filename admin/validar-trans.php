<html>
	<head>
		<meta name="robots" content="noindex">
	</head>
	<body>
	<?php
		include("../datos.php");
		include("../consultas.php");
		
		conectar();
		
		
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			$query = "SELECT verificacion FROM transportistas WHERE ID = '$id' ";
			$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
			$verificado = mysql_fetch_array($result);
			$actual = $verificado[0];
			
			if(!$actual){
				echo 'No se ha validado este transportista, porque dicho transportista no ha validado aun su cuenta de email';
			}else{
				$sql = "UPDATE transportistas SET verificacion='1' WHERE ID='$id'";
				$result = mysql_query($sql);
				echo 'Transportista validado!';	
			}
		}else{
			header('Location: ' . $index. '');
		}
	?>
	</body>
</html>