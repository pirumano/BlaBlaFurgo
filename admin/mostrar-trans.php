<html>
	<head>
		<meta name="robots" content="noindex">
	</head>
	<body>
		
		<div class="get-email">
			<div>
				LISTADO TRANSPORTISTAS
				<hr>
			</div>
			
			<div class="trans">
				<?php
					include_once("../consultas.php");
					conectar();
				
					$query  = "SELECT * FROM transportistas ORDER BY ID DESC";
					$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
					$i = 0;
					while($row = mysql_fetch_array($result)) {
						echo "<b>ID: </b>";
						echo $row[0];
						echo ", <b>Negocio:</b> ";
						echo $row[1];
						echo ", <b>Nombre:</b> ";
						echo $row[2];
						echo ", <b>Apellidos:</b> ";
						echo $row[3];
						echo ", <b>CP:</b> ";
						echo $row[4];
						echo ", <b>direccion:</b> ";
						echo $row[5];
						echo ", <b>ciudad:</b> ";
						echo $row[6];
						echo ", <b>provincia:</b> ";
						echo $row[7];
						echo ", <b>pass:</b> ";
						echo $row[8];
						echo ", <b>movil:</b> ";
						echo $row[9];
						echo ", <b>email:</b> ";
						echo $row[10];
						echo ", <b>pass:</b> ";
						echo $row[11];
						echo ", <b>descripcion:</b> ";
						echo $row[12];
						echo ", <b>verificacion (0->sin verificar nada, 1->verificacion total, 2-> verificacion solo email):</b> ";
						echo $row[13];
						echo ", <b>metodo_pago:</b> ";
						$metodos = unserialize($row[15]);
						foreach($metodos as $pago){
							echo nombre_pago_by_id($pago);
							echo ", ";
						}
						
						echo "<b>fianza:</b> ";
						echo $row[16];
						echo ", <b>mandar email por presupuestos(1-> si, 0-> no):</b> ";
						echo $row[17];
						echo ", <b>mandar email de resumen de presupuestos(1-> si, 0-> no):</b> ";
						echo $row[18];
						echo ", <b>mandar email por preguntas(1-> si, 0-> no):</b> ";
						echo $row[19];
						echo ", <b>cobertura:</b> ";
						echo $row[21];
						echo ", <b>registro_ok:</b> ";
						echo $row[23];
						echo "<br><br><hr>";
					}
				?>
			</div>
		</div>
		
	</body>
</html>