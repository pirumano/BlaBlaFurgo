<html>
	<head>
		<meta name="robots" content="noindex">
	</head>
	<body>
	<?php
		include("../datos.php");
		include("../consultas.php");
		
		conectar();
		
		
		
		if(isset($_GET['id'])):?>
			<?php $id = $_GET['id']; ?>
			<div class="get-email">
				<div>
					PORTEADOR
					<hr>
				</div>
				
				<div class="trans">
					<?php
					include_once("../consultas.php");
					conectar();
				
					$query  = "SELECT * FROM porteadores WHERE ID = '$id'";
					$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
					$i = 0;
					while($row = mysql_fetch_array($result)) {
						echo "<b>ID: </b>";
						echo $row[0];
						echo ", <b>Nombre:</b> ";
						echo $row[1];
						echo ", <b>Apellidos:</b> ";
						echo $row[2];
						echo ", <b>email:</b> ";
						echo $row[3];
						echo ", <b>tlf:</b> ";
						echo $row[4];
						echo ", <b>pass:</b> ";
						echo $row[5];
						echo ", <b>verificacion(0-> no, 1-> si):</b> ";
						echo $row[6];
						echo ", <b>email por presupuesto(0-> no, 1-> si):</b> ";
						echo $row[7];
						echo ", <b>email resumen presupuestos(0->no, 1-> si):</b> ";
						echo $row[8];
						echo ", <b>email por preguntas(0->no, 1-> si):</b> ";
						echo $row[9];
						echo "<br><br><hr>";
					}
				?>
				</div>
			</div>			
		<?php else: ?> 
			<?php echo "recuerda poner -> ?id=numero" ?>
		<?php endif;?>
	</body>
</html>