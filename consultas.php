<?php

	function pagado_presupuesto($id, $tipo){
		if($tipo == "porte"){
			$sql = "UPDATE ofertas_portes SET estado='pagado' WHERE ID='$id'";
		}
		if($tipo == "ruta"){
			$sql = "UPDATE ofertas_rutas SET estado='pagado' WHERE ID='$id'";
		}
		
   		$result = mysql_query($sql);
	}

	function get_oferta_porte($id){
		$query = "SELECT precio_oferta FROM ofertas_portes WHERE ID = '$id' ";
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}
	
	function get_oferta_ruta($id){
		$query = "SELECT precio_oferta FROM ofertas_rutas WHERE ID = '$id' ";
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}
	
	function get_id_porte_by_id_presu_porte($id){
		$query = "SELECT porte_id FROM ofertas_portes WHERE ID = '$id' ";
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}
	
	function get_id_ruta_by_id_presu_ruta($id){
		$query = "SELECT ruta_id FROM ofertas_rutas WHERE ID = '$id' ";
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}
	
	function get_autor_oferta_presu_porte_by_id($id){
		$query = "SELECT autor_oferta FROM ofertas_portes WHERE ID = '$id' ";
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}
	
	function get_autor_oferta_presu_ruta_by_id($id){
		$query = "SELECT autor_oferta FROM ofertas_rutas WHERE ID = '$id' ";
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}

	function send_mail($subject, $message, $to){
		
		$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Lifeflowers</title>
</head>

<body style="background:#efeff1; padding:0; margin:0;">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table width="600"  cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="600" align="center" valign="middle" style="0 0 30px 0">
                        <table width="600" align="center" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="600" bgcolor="#96CE30" height="70" align="center" valign="middle" style="padding:0 0 0 20px;"><a href="http://www.webmefive.com/proyects/miporteDeploy/" style="padding:0 0 0 0px; text-decoration:none; color: #fff; font-size:20px;">NUEVO MENSAJE RECIBIDO</a></td>
                            </tr>

                            <tr>
                                <td align="left"  valign="middle">
                                    <table width="600" bgcolor="#BAEAFB" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td align="center" valign="middle" width="600" height="68"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" width="600" height="22"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="bottom" width="454">
                                                <table align="center"  cellpadding="0" cellspacing="0" border="0" width="454">
                                                    <tr>
                                                        <td align="center" width="454" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:18px; line-height:21px; color:red; font-weight:normal; padding:0; margin:0;">
                                                        '. $message .'
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" bgcolor="#BAEAFB" width="600" height="60"></td>
                                        </tr>
                                        <tr>
                                            <td width="600" height="80" align="center" valign="middle"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td width="600"  bgcolor="#96CE30" align="center" valign="middle">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td height="45" width="600" align="center" valign="bottom" style="color: #fff;">Has recibido esta notificacion porque esta direccion de email esta asociada a una cuenta de miporte. Si no deseas recibir este tipo de emails, por favor modifica tus preferencias en Mi Perfil. Miporte SC - Guatemala 2, 41720 Los Palacios y Villafranca (Sevilla), España</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
  
</body>
</html>';
	
	
		require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
		    
		try {
		    $mandrill = new Mandrill('_u1QzQJjhP-5iN4j4HzGdw');
		    $message = array(
		        'html' => $html,
		        'text' => 'Contenido del mensaje',
		        'subject' => $subject,
		        'from_email' => 'notificaciones@miporte.es',
		        'from_name' => 'miPorte',
		        'to' => array(
		            array(
		                'email' => $to,
		                'type' => 'to'
		            )
		        ),
		        'headers' => array('Reply-To' => 'NO-REPLY'),
		        'important' => false,
		        'track_opens' => null,
		        'track_clicks' => null,
		        'auto_text' => null,
		        'auto_html' => null,
		        'inline_css' => null,
		        'url_strip_qs' => null,
		        'preserve_recipients' => null,
		        'view_content_link' => null,
		        'bcc_address' => 'message.bcc_address@example.com',
		        'tracking_domain' => null,
		        'signing_domain' => null,
		        'return_path_domain' => null,
		        'merge' => true,
		        'merge_language' => 'mailchimp'
		    );
		    $async = false;
		    $send_at = '2010-12-12 10:12:11';
		    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
		} catch(Mandrill_Error $e) {
		    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		    throw $e;
		}
	}
	
	function notification_presu($email, $tipo="transportista"){
		if($tipo == "porteador"){
			$query = "SELECT presupuesto_single FROM porteadores WHERE email = '$email' ";
		}
		if($tipo == "transportista"){
			$query = "SELECT email_presupuesto FROM transportistas WHERE email = '$email' ";
		}
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}
	
	function notification_mensaje($email, $tipo="transportista"){
		if($tipo == "porteador"){
			$query = "SELECT reenvio_preguntas FROM porteadores WHERE email = '$email' ";
		}
		if($tipo == "transportista"){
			$query = "SELECT email_preguntas FROM transportistas WHERE email = '$email' ";
		}
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}

	function conectar(){
		$link = mysql_connect('localhost', 'port_user', 'port_user');
		mysql_select_db('porteando');
    }

    function getInfoPublicaTrans($id){
	    $query  = "SELECT * FROM transportistas WHERE ID = '$id' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$i = 0;
		
		while($row = mysql_fetch_array($result)) {
			$data[0] = $row['descripcion'];
			$data[1] = $row['fianza'];
			$data[2] = $row['cobertura'];
			$data[3] = $row['trabajos'];
		}
		
		return $data;
    }
    
    function get_pass($email, $tipo="transportista"){
	    if($tipo == "porteador"){
			$query = "SELECT pass FROM porteadores WHERE email = '$email' ";
		}
		if($tipo == "transportista"){
			$query = "SELECT pass FROM transportistas WHERE email = '$email' ";
		}
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
    }

	function email_repetido($email){
		
		$query = "SELECT * FROM porteadores WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$existe = mysql_num_rows($result);
		
		return $existe;
	}

	function email_repetido_porteadores($email){
		$query = "SELECT * FROM transportistas WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$existe = mysql_num_rows($result);
		
		return $existe;
	}

	function getNombreVehiculo($vehiculo){
		$query = "SELECT vehiculo FROM vehiculos WHERE ID = '$vehiculo' ";
		
		$result = mysql_query($query); /*or die('Consulta fallida: ' . mysql_error());*/
		$data = mysql_fetch_array($result);

		return $data[0];
	}

	function insertar_porteador($nombre, $apellidos, $telefono, $email, $pass){
		$sql    = "INSERT INTO porteadores (nombre, apellidos, email, tlf, pass, verificacion) 
		VALUES ('$nombre', '$apellidos','$email', '$telefono', '$pass', '1')";
		
		$result = mysql_query($sql);
	}

	function ID_vehiculo($vehiculo){
		$query = "SELECT ID FROM vehiculos WHERE vehiculo = '$vehiculo' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$vehiculo = mysql_fetch_array($result);

		return $vehiculo[0];
	}

	function insertar_vehiculos($vehiculos, $email){
		
   		$sql = "UPDATE transportistas SET vehiculos='$vehiculos' WHERE email='$email'";
   		$result = mysql_query($sql);
   		
	}

	function ID_pago($pago){

   		$query = "SELECT ID FROM pagos WHERE tipo = '$pago' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$vehiculo = mysql_fetch_array($result);

		return $vehiculo[0];
	}

	function VerificadoPorteador($email){
    	$query = "SELECT verificacion FROM porteadores WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}

	function getVerificadoTransportista($email){
    	$query = "SELECT verificacion FROM transportistas WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}
	
	function getVerificado($email, $tipo){
	    if($tipo == "transportista"){
    	   $query = "SELECT verificacion FROM transportistas WHERE email = '$email' ";
        }elseif($tipo == "porteador"){
           $query = "SELECT verificacion FROM porteadores WHERE email = '$email' ";
        }else{
            return 0;
        }
        
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);


		return $verificado[0];
	}
	
	function insertar_pagos($pagos, $email){
		
   		$sql = "UPDATE transportistas SET metodo_pago='$pagos' WHERE email='$email'";
   		$result = mysql_query($sql);
   		
	}

	function insertar_en_tabla($id_user, $vehiculo){
		$inicializar = "a:0:{}";

		$sql    = "INSERT INTO vehiculos_cargas (id_user, id_vehiculo, cargas) VALUES ('$id_user','$vehiculo' ,'$inicializar')";
		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
	}

	function sacar_id_user($email, $tipo = "transportista"){
        if($tipo == "transportista")
		  $query = "SELECT ID FROM transportistas WHERE email = '$email' ";
        if($tipo == "porteador")
            $query = "SELECT ID FROM porteadores WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$id = mysql_fetch_array($result);

		return $id[0];
	}

	function sacar_id_porteador($email){

		$query = "SELECT ID FROM porteadores WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$id = mysql_fetch_array($result);

		return $id[0];
	}
	
	function get_email_by_id($id, $tipo="transportista"){
		if($tipo == "transportista"){
    	   $query = "SELECT email FROM transportistas WHERE ID = '$id' ";
        }elseif($tipo == "porteador"){
           $query = "SELECT email FROM porteadores WHERE ID = '$id' ";
        }else{
            return 0;
        }
        
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);


		return $verificado[0];
	}
	
	function get_id_by_email($email, $tipo="transportista"){
		if($tipo == "transportista"){
    	   $query = "SELECT ID FROM transportistas WHERE email = '$email' ";
        }elseif($tipo == "porteador"){
           $query = "SELECT ID FROM porteadores WHERE email = '$email' ";
        }else{
            return 0;
        }
        
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificado = mysql_fetch_array($result);

		return $verificado[0];
	}


	function sacar_vahiculos($id_user){
		$query = "SELECT id_vehiculo FROM vehiculos_cargas WHERE id_user = '$id_user' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$test_array = array();

		for ($i = 0; $i < mysql_num_rows($result); $i++) { 
			$section = mysql_result($result, $i);
			$test_array[] = $section;
		}

		return $test_array;
	}

	function sacar_nombre_vehiculo($id_vehiculo){
		$query = "SELECT vehiculo FROM vehiculos WHERE ID = '$id_vehiculo' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$vehiculos = mysql_fetch_array($result);

		return $vehiculos[0];
	}

	function id_vehiculo1($vehiculo){
		$query = "SELECT ID FROM vehiculos WHERE vehiculo = '$vehiculo' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$vehiculo = mysql_fetch_array($result);

		return $vehiculo[0];
	}


	function id_carga($carga){
		$query = "SELECT ID FROM cargas WHERE carga = '$carga' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$carga = mysql_fetch_array($result);

		return $carga[0];
	}

	function sacar_cargas($id_user, $id_vehiculo, $id_carga){
		
		$sql = "SELECT cargas FROM vehiculos_cargas WHERE id_user='$id_user' AND id_vehiculo='$id_vehiculo'  "; 
		$result   = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
		$consulta = mysql_fetch_array($result);
		$consulta = $consulta[0];
	
		$consulta = unserialize($consulta);
		$consulta[] = $id_carga;

		$consulta = serialize($consulta);
		
		return $consulta;

	}
	
	function sacar_user_ruta($id){
    	$query = "SELECT transportista FROM rutas WHERE ID = '$id' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$name = mysql_fetch_array($result);

		return $name[0];
	}
	
	function sacar_user_porte($id){
		$query = "SELECT cliente FROM portes WHERE ID = '$id' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$name = mysql_fetch_array($result);

		return $name[0];
	}

	function meter_cargas($id_user, $id_vehiculo, $array_cargas){
		$sql = "UPDATE vehiculos_cargas SET cargas='$array_cargas' WHERE id_user='$id_user' AND id_vehiculo='$id_vehiculo'  ";
   		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error()) ;
	}

	function meter_fianza($id_user , $fianza){
		$sql = "UPDATE transportistas SET fianza='$fianza' WHERE ID='$id_user' ";
   		$result = mysql_query($sql) or die('El porcentaje de la fianza no ha sido guardado. Intentalo de nuevo.') ;

	}
	
	function get_nombre_by_id($id, $tipo="transportista"){
		if($tipo == "transportista"){
			$query = "SELECT nombre FROM transportistas WHERE ID = '$id' ";
		}else{
			$query = "SELECT nombre FROM porteadores WHERE ID = '$id' ";
		}	
			
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$name = mysql_fetch_array($result);

		return $name[0];
	}

	function getNameUserTrans($email){
		$query = "SELECT nombre FROM transportistas WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$name = mysql_fetch_array($result);

		return $name[0];
	}
	
	function getApellidoUserTrans($email){
		$query = "SELECT apellidos FROM transportistas WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$name = mysql_fetch_array($result);

		return $name[0];
	}
	
	function getNameUserPort($email){
		$query = "SELECT nombre FROM porteadores WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$name = mysql_fetch_array($result);

		return $name[0];
	}
	
	function getApellidoUserPort($email){
		$query = "SELECT apellidos FROM porteadores WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$name = mysql_fetch_array($result);

		return $name[0];
	}

	function sacar_datos_porteador_perfil($email){
		$query  = "SELECT nombre, apellidos, email, tlf, pass, presupuesto_single, presupuesto_resumen, reenvio_preguntas, foto FROM porteadores WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$datos = mysql_fetch_array($result);

		return $datos;
	}

	function refrescar_info_porteador($nombre,$apellidos,$email,$tlf,$pass,$presupuesto_single, $presupuesto_resumen, $reenvio_preguntas,$foto){
		$sql = "UPDATE porteadores SET nombre='$nombre' , apellidos='$apellidos' , tlf='$tlf' , pass='$pass' , presupuesto_single='$presupuesto_single' , presupuesto_resumen='$presupuesto_resumen' , reenvio_preguntas='$reenvio_preguntas', foto='$foto' WHERE email='$email' ";
   		$result = mysql_query($sql) or header("Location: ../../miperfil.php?p=0");
   		
	}
	
	function refrescar_info_porteador_nofoto($nombre,$apellidos,$email,$tlf,$pass,$presupuesto_single, $presupuesto_resumen, $reenvio_preguntas){
		$sql = "UPDATE porteadores SET nombre='$nombre' , apellidos='$apellidos' , tlf='$tlf' , pass='$pass' , presupuesto_single='$presupuesto_single' , presupuesto_resumen='$presupuesto_resumen' , reenvio_preguntas='$reenvio_preguntas' WHERE email='$email' ";
   		$result = mysql_query($sql) or header("Location: ../../miperfil.php?p=0");
   		
	}

	function id_porteador($email){
		$query  = "SELECT ID FROM porteadores WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$id = mysql_fetch_array($result);

		return $id[0];
	}

	function sacar_anuncios_portes($email){
	
		$query  = "SELECT ID, origen, destino, carga_id, f_entrega, f_recogida, descripcion, f_publicacion, presupuesto_bajo, num_presupuesto FROM portes WHERE cliente = '$email' ORDER BY id DESC ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$i = 0;
		while($row = mysql_fetch_array($result)) {
		
			$anuncio[$i] = new anuncio_activo();
			
			$anuncio[$i]->id = $row['ID'];
			
			if ($row['origen'] == NULL){
				$row['origen'] = "No Especificado";
			}
			$anuncio[$i]->origen = $row['origen'];
			
			if ($row['destino'] == NULL){
				$row['destino'] = "No Especificado";
			}
			$anuncio[$i]->destino = $row['destino'];

			if ($row['carga_id'] == NULL){
				$row['carga_id'] = "No Especificado";
			}
			$anuncio[$i]->carga_id = $row['carga_id'];

			if ($row['f_entrega'] == NULL){
				$row['f_entrega'] = "No Especificado";
			}
			$anuncio[$i]->f_entrega = $row['f_entrega'];

			if ($row['f_recogida'] == NULL){
				$row['f_recogida'] = "No Especificado";
			}
			$anuncio[$i]->f_recogida = $row['f_recogida'];

			if ($row['presupuesto_bajo'] == NULL){
				$row['presupuesto_bajo'] = "No hay presupuestos";
			}
			$anuncio[$i]->presu_mas_bajo = $row['presupuesto_bajo'];

			if ($row['descripcion'] == NULL){
				$row['descripcion'] = "No Especificado";
			}
			$anuncio[$i]->descripcion = $row['descripcion'];

			if ($row['f_publicacion'] == NULL){
				$row['f_publicacion'] = "No Especificado";
			}
			$anuncio[$i]->f_publicacion = $row['f_publicacion'];
			
			if ($row['num_presupuesto'] == NULL){
				$row['num_presupuesto'] = "0";
			}
			
			$anuncio[$i]->num_presupuesto = $row['num_presupuesto'];

			$i++;

		}
		
		if($anuncio[0]){
			$anuncio[0]->total = $i;
		}
		
		return $anuncio;
		
	}

	function sacar_info_transportista($email){
		$query  = "SELECT * FROM transportistas WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$datos = mysql_fetch_array($result);

		return $datos;
	}

	function sacar_metodos_pagos($email){
		$query  = "SELECT metodo_pago FROM transportistas WHERE email = '$email' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$pagos = mysql_fetch_array($result);

		return $pagos[0];

	}
	
	function nombre_pago_by_id($id){
		$query  = "SELECT tipo FROM pagos WHERE ID = '$id' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$pagos = mysql_fetch_array($result);

		return $pagos[0];
	}

	function sacar_vehiculos_transportista($id){
		$query  = "SELECT id_vehiculo FROM vehiculos_cargas WHERE id_user = '$id' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$vehiculos = mysql_fetch_array($result);

		return $vehiculos;
	}

	function todosVehiculos(){
		$query  = "SELECT vehiculo FROM vehiculos";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$array = array();

		for ($i = 0; $i < mysql_num_rows($result); $i++) { 
			$vehiculo = mysql_result($result, $i); 
			$array[] = $vehiculo;
		}
		return $array;
	}

	function getTodoPortes($limit, $offset){

		$query  = "SELECT id, cliente, origen, destino, carga_id, dimensiones, f_entrega, f_recogida, flexible_origen, flexible_destino, flexible_recogida, flexible_entrega, descripcion, f_publicacion FROM portes ORDER BY id DESC LIMIT $limit OFFSET $offset";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$i = 0;
		while($row = mysql_fetch_array($result)) {
		
			$porte[$i] = new anuncio_activo();
			
			$porte[$i]->id = $row['id'];
			
			if ($row['cliente'] == NULL){
				$row['cliente'] = "No Especificado";
			}
			$porte[$i]->cliente = $row['cliente'];

			if ($row['origen'] == NULL){
				$row['origen'] = "No Especificado";
			}
			$porte[$i]->origen = $row['origen'];
			
			if ($row['destino'] == NULL){
				$row['destino'] = "No Especificado";
			}
			$porte[$i]->destino = $row['destino'];

			if ($row['carga_id'] == NULL){
				$row['carga_id'] = "No Especificado";
			}
			$porte[$i]->carga_id = $row['carga_id'];

			if ($row['dimensiones'] == NULL){
				$row['dimensiones'] = "No Especificado";
			}
			$porte[$i]->dimensiones = $row['dimensiones'];

			if ($row['f_entrega'] == NULL){
				$row['f_entrega'] = "No Especificado";
			}
			$porte[$i]->f_entrega = $row['f_entrega'];

			if ($row['f_recogida'] == NULL){
				$row['f_recogida'] = "No Especificado";
			}
			$porte[$i]->f_recogida = $row['f_recogida'];

			if ($row['flexible_origen'] == NULL){
				$row['flexible_origen'] = "No Especificado";
			}
			$porte[$i]->flexible_origen = $row['flexible_origen'];

			if ($row['flexible_destino'] == NULL){
				$row['flexible_destino'] = "No Especificado";
			}
			$porte[$i]->flexible_destino = $row['flexible_destino'];

			if ($row['flexible_recogida'] == NULL){
				$row['flexible_recogida'] = "No Especificado";
			}
			$porte[$i]->flexible_recogida = $row['flexible_recogida'];

			if ($row['flexible_entrega'] == NULL){
				$row['flexible_entrega'] = "No Especificado";
			}
			$porte[$i]->flexible_entrega = $row['flexible_entrega'];

			if ($row['precio'] == NULL){
				$row['precio'] = "No Especificado";
			}
			$porte[$i]->precio = $row['precio'];

			if ($row['descripcion'] == NULL){
				$row['descripcion'] = "No Especificado";
			}
			$porte[$i]->descripcion = $row['descripcion'];

			if ($row['f_publicacion'] == NULL){
				$row['f_publicacion'] = "No Especificado";
			}
			$porte[$i]->f_publicacion = $row['f_publicacion'];

			if ($row['distancia'] == NULL){
				$row['distancia'] = "No Especificado";
			}
			$porte[$i]->distancia = $row['distancia'];

			$i++;

		}

		
		//$porte[0]->total = $i;

		return $porte;
	}


	function sacarFianza($transportista){
		$query = "SELECT fianza FROM transportistas WHERE email = '$transportista' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$fianza = mysql_fetch_array($result);

		return $fianza[0];

	}
	
	function sacarFianza_id($transportista){
		$query = "SELECT fianza FROM transportistas WHERE ID = '$transportista' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$fianza = mysql_fetch_array($result);

		return $fianza[0];

	}


	function getTodoRutas($limit, $offset){
		$query  = "SELECT id, transportista, origen, destino, f_recogida, f_entrega, flexible_origen, flexible_destino, flexible_recogida, flexible_entrega, presupuesto_min, descripcion, vehiculos, f_publicacion FROM rutas ORDER BY id DESC LIMIT $limit OFFSET $offset";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$i = 0;
		while($row = mysql_fetch_array($result)) {
		
			$ruta[$i] = new ruta_activa();

			$ruta[$i]->id = $row['id'];
			
			if ($row['transportista'] == NULL){
				$row['transportista'] = "No Especificado";
			}
			$ruta[$i]->transportista = $row['transportista'];
			$transportista = $row['transportista'];

			if ($row['origen'] == NULL){
				$row['origen'] = "No Especificado";
			}
			$ruta[$i]->origen = $row['origen'];
			
			if ($row['destino'] == NULL){
				$row['destino'] = "No Especificado";
			}
			$ruta[$i]->destino = $row['destino'];

			if ($row['f_recogida'] == NULL){
				$row['f_recogida'] = "No Especificado";
			}
			$ruta[$i]->f_recogida = $row['f_recogida'];

			if ($row['f_entrega'] == NULL){
				$row['f_entrega'] = "No Especificado";
			}
			$ruta[$i]->f_entrega = $row['f_entrega'];
			
			if ($row['flexible_origen'] == NULL){
				$row['flexible_origen'] = "No Especificado";
			}
			$ruta[$i]->flexible_origen = $row['flexible_origen'];

			if ($row['flexible_destino'] == NULL){
				$row['flexible_destino'] = "No Especificado";
			}
			$ruta[$i]->flexible_destino = $row['flexible_destino'];

			if ($row['flexible_recogida'] == NULL){
				$row['flexible_recogida'] = "No Especificado";
			}
			$ruta[$i]->flexible_recogida = $row['flexible_recogida'];

			if ($row['flexible_entrega'] == NULL){
				$row['flexible_entrega'] = "No Especificado";
			}
			$ruta[$i]->flexible_entrega = $row['flexible_entrega'];

			if ($row['presupuesto_min'] == NULL){
				$row['presupuesto_min'] = "No Especificado";
			}
			$ruta[$i]->presupuesto_min = $row['presupuesto_min'];

			if ($row['descripcion'] == NULL){
				$row['descripcion'] = "No Especificado";
			}
			$ruta[$i]->descripcion = $row['descripcion'];

			if ($row['vehiculos'] == NULL){
				$row['vehiculos'] = "No Especificado";
			}
			//$ruta[$i]->vehiculos = $row['vehiculos'];
			//mirarlo en un futuro!
			$array_vehiculos = unserialize($row['vehiculos']);

			
			if($array_vehiculos){
    			$concatenar = "";
    			foreach ($array_vehiculos as $key){
				    $segunda = $concatenar.$key.",";
				    $concatenar = $segunda;
				}
				$ruta[$i]->vehiculos = $concatenar;
			}

			$ruta[$i]->fianza = sacarFianza($transportista);


			if ($row['f_publicacion'] == NULL){
				$row['f_publicacion'] = "No Especificado";
			}
			$ruta[$i]->f_publicacion = $row['f_publicacion'];

			$i++;

		}

		return $ruta;
	}

	function actualizar_datos($email,$negocio,$nombre,$apellidos,$cp,$direccion,$ciudad,$provincia,$pais,$telefono,$contra,$presupuestoSingle,$presupuestoResumen,$reenvioPreguntas,$sobremi,$fianza,$foto,$cif){

		$sql    = "UPDATE transportistas SET negocio='$negocio', nombre='$nombre', apellidos='$apellidos', cp='$cp', direccion='$direccion', ciudad='$ciudad', provincia='$provincia', pais='$pais', movil='$telefono', pass='$contra', descripcion='$sobremi', fianza='$fianza', email_presupuesto='$presupuestoSingle', email_resumen='$presupuestoResumen', email_preguntas='$reenvioPreguntas', foto='$foto', cif='$cif' WHERE email='$email' ";
   		$result = mysql_query($sql) or header("Location: ../../miperfil.php?p=0");;
	}

	function existe_vehiculo($id_user, $id_vehiculo){
		$sql = "SELECT ID FROM vehiculos_cargas WHERE id_user='$id_user' AND id_vehiculo='$id_vehiculo'  "; 
		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());


		$datos = mysql_fetch_array($result);

		if ($datos[0] != ""){
			$existe = 1;
			//echo "EXISTE</BR>";
		}else{
			$existe = 0;
			//echo "NO EXISTE</BR>";
			//metemos en la tabla
		}

		return $existe;
	}
	
	function actualizar_datos_nofoto($email,$negocio,$nombre,$apellidos,$cp,$direccion,$ciudad,$provincia,$pais,$telefono,$contra,$presupuestoSingle,$presupuestoResumen,$reenvioPreguntas,$sobremi,$fianza,$cif){

		$sql    = "UPDATE transportistas SET negocio='$negocio', nombre='$nombre', apellidos='$apellidos', cp='$cp', direccion='$direccion', ciudad='$ciudad', provincia='$provincia', pais='$pais', movil='$telefono', pass='$contra', descripcion='$sobremi', fianza='$fianza', email_presupuesto='$presupuestoSingle', email_resumen='$presupuestoResumen', email_preguntas='$reenvioPreguntas', cif='$cif' WHERE email='$email' ";
   		$result = mysql_query($sql) or header("Location: ../../miperfil.php?p=0");;
	}

	function mis_vehiculos($id_user){
		$query  = "SELECT id_vehiculo FROM vehiculos_cargas WHERE id_user = '$id_user' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$vehiculos = [];
		while($row = mysql_fetch_array($result)) {
			//echo "hola: ".$row[0]."</br>";
			$vehiculos[] = $row[0];
		}

		return $vehiculos;
	}

	function eliminar_vehiculo($id_user,$key){
		$query  = "DELETE from vehiculos_cargas WHERE id_user = '$id_user' AND id_vehiculo='$key' "; 
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		//echo "Vehiculo eliminado</br>";
	}


	/*
	function actualizar_vehiculos($id_user, $id_vehiculo){
		$sql    = "UPDATE vehiculos_cargas SET negocio='$negocio', nombre='$nombre', apellidos='$apellidos', cp='$cp', direccion='$direccion', ciudad='$ciudad', provincia='$provincia', pais='$pais', movil='$telefono', pass='$contra', descripcion='$sobremi', fianza='$fianza', email_presupuesto='$presupuestoSingle', email_resumen='$presupuestoResumen', email_preguntas='$reenvioPreguntas' WHERE email='$email' ";
   		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
	}
	*/

	function sacar_rutas($limit){
		$query  = "SELECT ID, transportista, origen, destino, f_recogida, f_entrega, km_minimos, descripcion, vehiculos, f_publicacion, num_presupuesto, presupuesto_bajo FROM rutas ORDER BY id DESC limit $limit ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$i = 0;
		while($row = mysql_fetch_array($result)) {
		
			$ruta[$i] = new rutas_activas();
			
			$ruta[$i]->id = $row['ID'];
			
			if ($row['transportista'] == NULL){
				$row['transportista'] = "No Especificado";
			}
			$ruta[$i]->transportista = $row['transportista'];

			if ($row['origen'] == NULL){
				$row['origen'] = "No Especificado";
			}
			$ruta[$i]->origen = $row['origen'];
			
			if ($row['destino'] == NULL){
				$row['destino'] = "No Especificado";
			}
			$ruta[$i]->destino = $row['destino'];

			if ($row['f_recogida'] == NULL){
				$row['f_recogida'] = "No Especificado";
			}
			$ruta[$i]->f_recogida = $row['f_recogida'];

			if ($row['f_entrega'] == NULL){
				$row['f_entrega'] = "No Especificado";
			}
			$ruta[$i]->f_entrega = $row['f_entrega'];

			if ($row['presupuesto'] == NULL){
				$row['presupuesto'] = "No Especificado";
			}
			$ruta[$i]->presupuesto = $row['presupuesto'];
			
			if ($row['km_minimos'] == NULL){
				$row['km_minimos'] = "No Especificado";
			}
			$ruta[$i]->km_minimos = $row['km_minimos'];

			if ($row['descripcion'] == NULL){
				$row['descripcion'] = "No Especificado";
			}
			$ruta[$i]->descripcion = $row['descripcion'];

			if ($row['vehiculos'] == NULL){
				$row['vehiculos'] = "No Especificado";
			}
			$array_vehiculos = unserialize($row['vehiculos']);


			if(isset($array_vehiculos)){
    			$concatenar = "";
    			foreach ($array_vehiculos as $key){
				    $segunda = $concatenar.$key.",";
				    $concatenar = $segunda;
				}
				$ruta[$i]->vehiculos = $concatenar;
			}

			if ($row['f_publicacion'] == NULL){
				$row['f_publicacion'] = "No Especificado";
			}
			$ruta[$i]->f_publicacion = $row['f_publicacion'];

			if ($row['num_presupuesto'] == NULL){
				$row['num_presupuesto'] = "No Especificado";
			}
			$ruta[$i]->num_presupuestos = $row['num_presupuesto'];

			if ($row['presupuesto_bajo'] == NULL){
				$row['presupuesto_bajo'] = "No hay presupuestos hechos";
			}
			$ruta[$i]->presupuesto_bajo = $row['presupuesto_bajo'];

			$i++;

		}
		
		if($ruta[0]){
			$ruta[0]->total = $i;
		}else{
			$ruta[0] = 0;
		}
		

		return $ruta;
	}
	
	function sacar_rutas_trans($email){
		$query  = "SELECT ID, transportista, origen, destino, f_recogida, f_entrega, presupuesto_min, descripcion, vehiculos, f_publicacion, num_presupuesto, presupuesto_bajo FROM rutas WHERE transportista = '$email' ORDER BY id DESC";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$i = 0;
		while($row = mysql_fetch_array($result)) {
		
			$ruta[$i] = new rutas_activas();
			
			$ruta[$i]->id = $row['ID'];
			
			if ($row['transportista'] == NULL){
				$row['transportista'] = "No Especificado";
			}
			$ruta[$i]->transportista = $row['transportista'];

			if ($row['origen'] == NULL){
				$row['origen'] = "No Especificado";
			}
			$ruta[$i]->origen = $row['origen'];
			
			if ($row['destino'] == NULL){
				$row['destino'] = "No Especificado";
			}
			$ruta[$i]->destino = $row['destino'];

			if ($row['f_recogida'] == NULL){
				$row['f_recogida'] = "No Especificado";
			}
			$ruta[$i]->f_recogida = $row['f_recogida'];

			if ($row['f_entrega'] == NULL){
				$row['f_entrega'] = "No Especificado";
			}
			$ruta[$i]->f_entrega = $row['f_entrega'];

			if ($row['presupuesto_min'] == NULL){
				$row['presupuesto_min'] = "No Especificado";
			}
			$ruta[$i]->presupuesto_min = $row['presupuesto'];

			if ($row['descripcion'] == NULL){
				$row['descripcion'] = "No Especificado";
			}
			$ruta[$i]->descripcion = $row['descripcion'];

			if ($row['vehiculos'] == NULL){
				$row['vehiculos'] = "No Especificado";
			}
			$array_vehiculos = unserialize($row['vehiculos']);


			if(isset($array_vehiculos)){
    			$concatenar = "";
    			foreach ($array_vehiculos as $key){
				    $segunda = $concatenar.$key.",";
				    $concatenar = $segunda;
				}
				$ruta[$i]->vehiculos = $concatenar;
			}

			if ($row['f_publicacion'] == NULL){
				$row['f_publicacion'] = "No Especificado";
			}
			$ruta[$i]->f_publicacion = $row['f_publicacion'];

			if ($row['num_presupuesto'] == NULL){
				$row['num_presupuesto'] = "No Especificado";
			}
			$ruta[$i]->num_presupuestos = $row['num_presupuesto'];

			if ($row['presupuesto_bajo'] == NULL){
				$row['presupuesto_bajo'] = "No hay presupuestos hechos";
			}
			$ruta[$i]->presupuesto_bajo = $row['presupuesto_bajo'];

			$i++;

		}
		
		if($ruta[0]){
			$ruta[0]->total = $i;
		}
			

		return $ruta;
	}

	function sacamos_cargas($id_user, $id_vehiculo){

		$query  = "SELECT cargas FROM vehiculos_cargas WHERE id_user = '$id_user' AND id_vehiculo = '$id_vehiculo' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		
		$carga = mysql_fetch_array($result);

		return $carga[0];
	}

	function nombre_carga($id_carga){
		$query  = "SELECT carga FROM cargas WHERE ID = '$id_carga' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		
		$carga = mysql_fetch_array($result);

		return $carga[0];
	}

	function mandar_email($email, $id_user, $tipo){
		if($tipo == "transportista"){
			$link = "http://www.miporte.es/email_confirmacion.php?id=".$id_user."&tipo=".$tipo;
			$contenido = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Lifeflowers</title>
</head>

<body style="background:#efeff1; padding:0; margin:0;">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table width="600"  cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="600" align="center" valign="middle" style="0 0 30px 0">
                        <table width="600" align="center" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" height="30" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:14px; color:#353535; font-weight:normal; padding:8px 0 0 0; margin:0;">
                                    No puedes ver correctamente este email? <a href="'.$link.'" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:14px; color:#fd4d4d; font-weight:normal; padding:0; margin:0; text-decoration:none;">Abrir en el navegador.</a>
                                </td>
                            </tr>
                            <tr>
                              <td width="600" bgcolor="#96CE30" height="70" align="left" valign="middle" style="padding:0 0 0 20px;"><a href="http://www.webmefive.com/proyects/miporteDeploy/" style="padding:0 0 0 0px; text-decoration:none; color: #fff;">BIENVENIDO A MIPORTE</a></td>
                            </tr>

                            <tr>
                                <td align="left"  valign="middle">
                                    <table width="600" bgcolor="#BAEAFB" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td align="center" valign="middle" width="600" height="68"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:18px; line-height:20px; color:#fff; font-weight:normal; padding:0; margin:0;">Gracias por registrarte en www.miporte.es para completar el registro, pulsa en el enlace de abajo de VALIDAR MI CUENTA y ademas solamente debe de enviar algun documento acreditativo de su situacion como transportista y desde este momento podra comenzar a mandar sus presupuestos y a buscar cargas en la web.<br><br></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" width="600" height="22"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="bottom" width="454">
                                                <table align="center"  cellpadding="0" cellspacing="0" border="0" width="454">
                                                    <tr>
                                                        <td align="center" width="454" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:18px; line-height:21px; color:red; font-weight:normal; padding:0; margin:0;">
                                                        Entre los documentos validos puede enviar:<br>
                                                        -Copia de la dada de alta como autonomo o CIF<br>
                                                        -Copia del seguro de mercancias<br>
                                                        -Copia de la tarjeta de transportes<br>
                                                        -Lo puede enviar al email: documentos@miporte.es<br><br>
                                                        Esperamos que empiece a presupuestar muy pronto!<br><br>
                                                        El equipo de miPorte
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" bgcolor="#BAEAFB" width="600" height="60"></td>
                                        </tr>
                                        <tr>
                                            <td width="600" align="center" valign="middle">
                                                <table cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td width="300"    align="center" valign="middle">
                                                            <table cellpadding="0" cellspacing="0" border="0">
                                                                <tr>
                                                                    <td align="center" bgcolor="#fd4d4d" height="55" width="300" valign="middle">
                                                                        <a href="'.$link.'" style="font-family:Arial, Helvetica, sans-serif; font-size:24px; line-height:52px; color:#ffffff; font-weight:bold; padding:0; margin:0; width:300px; height:55px;text-align:center; background:#fd4d4d; display:block; text-decoration:none;">VALIDAR MI CUENTA</a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="600" height="80" align="center" valign="middle"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td width="600"  bgcolor="#96CE30" align="center" valign="middle">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td height="45" width="600" align="center" valign="bottom" style="color: #fff;">Has recibido esta notificacion porque esta direccion de email esta asociada a una cuenta de miporte. Miporte SC - Guatemala 2, 41720 Los Palacios y Villafranca (Sevilla), España</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
  
</body>
</html>';
		}elseif ($tipo == "porteador") {
			$link = "http://www.miporte.es/email_confirmacion.php?id=".$id_user."&tipo=".$tipo;
			$contenido = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Lifeflowers</title>
</head>

<body style="background:#efeff1; padding:0; margin:0;">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table width="600"  cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="600" align="center" valign="middle" style="0 0 30px 0">
                        <table width="600" align="center" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" height="30" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:14px; color:#353535; font-weight:normal; padding:8px 0 0 0; margin:0;">
                                    No puedes ver correctamente este email? <a href="'.$link.'" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:14px; color:#fd4d4d; font-weight:normal; padding:0; margin:0; text-decoration:none;">Abrir en el navegador.</a>
                                </td>
                            </tr>
                            <tr>
                              <td width="600" bgcolor="#96CE30" height="70" align="left" valign="middle" style="padding:0 0 0 20px;"><a href="http://www.webmefive.com/proyects/miporteDeploy/" style="padding:0 0 0 0px; text-decoration:none; color: #fff;">BIENVENIDO A MIPORTE</a></td>
                            </tr>

                            <tr>
                                <td align="left"  valign="middle">
                                    <table width="600" bgcolor="#BAEAFB" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td align="center" valign="middle" width="600" height="68"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:18px; line-height:20px; color:#fff; font-weight:normal; padding:0; margin:0;">Gracias por registrarte en www.miporte.es para completar el registro, pulsa en el enlace de abajo de VALIDAR MI CUENTA.<br><br></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" width="600" height="22"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="middle" bgcolor="#BAEAFB" width="600" height="60"></td>
                                        </tr>
                                        <tr>
                                            <td width="600" align="center" valign="middle">
                                                <table cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td width="300"    align="center" valign="middle">
                                                            <table cellpadding="0" cellspacing="0" border="0">
                                                                <tr>
                                                                    <td align="center" bgcolor="#fd4d4d" height="55" width="300" valign="middle">
                                                                        <a href="'.$link.'" style="font-family:Arial, Helvetica, sans-serif; font-size:24px; line-height:52px; color:#ffffff; font-weight:bold; padding:0; margin:0; width:300px; height:55px;text-align:center; background:#fd4d4d; display:block; text-decoration:none;">VALIDAR MI CUENTA</a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="600" height="80" align="center" valign="middle"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td width="600"  bgcolor="#96CE30" align="center" valign="middle">
                                    <table width="600" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td height="45" width="600" align="center" valign="bottom" style="color: #fff;">Has recibido esta notificacion porque esta direccion de email esta asociada a una cuenta de miporte. Miporte SC - Guatemala 2, 41720 Los Palacios y Villafranca (Sevilla), España</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
  
</body>
</html>';
		}
		
		require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
		    
		try {
		    $mandrill = new Mandrill('_u1QzQJjhP-5iN4j4HzGdw');
		    $message = array(
		        'html' => $contenido,
		        'text' => 'Contenido del mensaje',
		        'subject' => "Confirmacion cuenta",
		        'from_email' => 'notificaciones@miporte.es',
		        'from_name' => 'miPorte',
		        'to' => array(
		            array(
		                'email' => $email,
		                'type' => 'to'
		            )
		        ),
		        'headers' => array('Reply-To' => 'NO-REPLY'),
		        'important' => false,
		        'track_opens' => null,
		        'track_clicks' => null,
		        'auto_text' => null,
		        'auto_html' => null,
		        'inline_css' => null,
		        'url_strip_qs' => null,
		        'preserve_recipients' => null,
		        'view_content_link' => null,
		        'bcc_address' => 'message.bcc_address@example.com',
		        'tracking_domain' => null,
		        'signing_domain' => null,
		        'return_path_domain' => null,
		        'merge' => true,
		        'merge_language' => 'mailchimp'
		    );
		    $async = false;
		    $send_at = '2010-12-12 10:12:11';
		    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
		} catch(Mandrill_Error $e) {
		    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		    throw $e;
		}
		
		/*
$fromaddress = "miporte.es";
		$fromname = "MIPORTE.es";
	
		$headers  = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "X-Priority: 3\n";
		$headers .= "X-MSMail-Priority: Normal\n";
		$headers .= "X-Mailer: php\n";
		$headers .= "From: \"".$fromname."\" <".$fromaddress.">\n";
*/

		//$envio = mail($email, "Email de confirmacion", $contenido, $headers);
		
	}

	function activar_usuario($id){
		$validar = 2;
		$sql = "UPDATE transportistas SET verificacion='2' WHERE ID='$id' ";
   		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
	}

	function activar_porteador($id){
		$validar = 1;
		$sql = "UPDATE porteadores SET verificacion='1' WHERE ID='$id' ";
   		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
	}

	function verificar_transportista($email){
	
		$query = "SELECT verificacion FROM transportistas WHERE email = '$email' ";
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		
		$verificacion = mysql_fetch_array($result);

		return $verificacion[0];
	}

	function verificar_porteador($email){
		$query = "SELECT verificacion FROM porteadores WHERE email = '$email' ";
		
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$verificacion = mysql_fetch_array($result);

		return $verificacion[0];
	}

	function guardarPreguntaPorte($idAutor, $pregunta, $id_porte, $fecha, $propietario, $nombre){
		$estado = 0;

		$sql  = "INSERT INTO preguntasPortes (autor, pregunta, id_porte, fecha, estado, propietario_porte, nombre_autor) 
		VALUES ('$idAutor', '$pregunta','$id_porte', '$fecha', '$estado', '$propietario', '$nombre' )" ;
		
		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());

	}
	
	function guardarPreguntaRuta($idAutor, $pregunta, $id_ruta, $fecha, $propietario, $nombre){
		$estado = 0;

		$sql  = "INSERT INTO preguntasRutas (autor, pregunta, id_ruta, fecha, estado, propietario_ruta, nombre_autor) 
		VALUES ('$idAutor', '$pregunta','$id_ruta', '$fecha', '$estado', '$propietario', '$nombre')" ;
		
		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());

	}
	
	function guardarRespuestaPorte($idPregunta, $respuesta, $id_porte, $fecha, $autor){
		$estado = 0;
		
		$sql  = "INSERT INTO respuestasPortes (id_pregunta, respuesta, id_porte, fecha, estado, user_respondido) 
		VALUES ('$idPregunta', '$respuesta','$id_porte', '$fecha', '$estado', '$autor' )" ;
		
		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
		
	}
	
	function guardarRespuestaRuta($idPregunta, $respuesta, $id_ruta, $fecha, $autor){
		$estado = 0;
		
		$sql  = "INSERT INTO respuestasRutas (id_pregunta, respuesta, id_ruta, fecha, estado, user_respondido) 
		VALUES ('$idPregunta', '$respuesta','$id_ruta', '$fecha', '$estado', '$autor' )" ;
		
		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
		
	}
	
	function sacarPreguntasPortes($id_porte){

		class preguntas_portes{
		    public $id;
			public $autor;
			public $pregunta;
			public $fecha;
			public $id_porte;
			public $nombre_autor;
		}

		$query = "SELECT id, autor, id_porte, pregunta, nombre_autor, fecha FROM preguntasPortes WHERE id_porte = '$id_porte' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$i = 0;
		
		while($row = mysql_fetch_array($result)) {
				
			$preguntas_portes_array[$i] = new preguntas_portes();

			$preguntas_portes_array[$i]->id       		 = $row['id'];
			$preguntas_portes_array[$i]->autor    		 = $row['autor'];
			$preguntas_portes_array[$i]->id_porte 		 = $row['id_porte'];
			$preguntas_portes_array[$i]->pregunta 		 = $row['pregunta'];
			$preguntas_portes_array[$i]->fecha    		 = $row['fecha'];
			$preguntas_portes_array[$i]->nombre_autor    = $row['nombre_autor'];
			
			$i++;

		}

		return $preguntas_portes_array;
	}
	
	function sacarPreguntasRutas($id_ruta){

		class preguntas_rutas{
		    public $id;
			public $autor;
			public $pregunta;
			public $fecha;
			public $id_porte;
			public $nombre_autor;
		}

		$query = "SELECT id, autor, id_ruta, pregunta, nombre_autor, fecha FROM preguntasRutas WHERE id_ruta = '$id_ruta' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$i = 0;
		
		while($row = mysql_fetch_array($result)) {
				
			$preguntas_rutas_array[$i] = new preguntas_rutas();

			$preguntas_rutas_array[$i]->id       		= $row['id'];
			$preguntas_rutas_array[$i]->autor    		= $row['autor'];
			$preguntas_rutas_array[$i]->id_porte 		= $row['id_ruta'];
			$preguntas_rutas_array[$i]->pregunta 		= $row['pregunta'];
			$preguntas_rutas_array[$i]->fecha    		= $row['fecha'];
			$preguntas_rutas_array[$i]->nombre_autor    = $row['nombre_autor'];
			
			$i++;

		}

		return $preguntas_rutas_array;
	}
	
	class respuesta_portes{
	    public $id;
	    public $id_porte;
	    public $respuesta;
	    public $fecha;
		public $id_pregunta;
		public $estado;
		public $user_respondido;
	}
	
	function sacarRespuestasPorte($idPregunta){

		$query = "SELECT id, id_porte, respuesta, fecha, id_pregunta, estado, user_respondido FROM respuestasPortes WHERE id_pregunta = '$idPregunta' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$i = 0;
		
		while($row = mysql_fetch_array($result)) {
				
			$respuesta_portes_array[$i] = new respuesta_portes();

			$respuesta_portes_array[$i]->id       = $row['id'];
			$respuesta_portes_array[$i]->id_porte = $row['id_porte'];
			$respuesta_portes_array[$i]->respuesta  = $row['respuesta'];
			$respuesta_portes_array[$i]->fecha    = $row['fecha'];
			$respuesta_portes_array[$i]->id_pregunta = $row['id_pregunta'];
			$respuesta_portes_array[$i]->estado    = $row['estado'];
			$respuesta_portes_array[$i]->user_respondido    = $row['user_respondido'];
			
			$i++;

		}

		return $respuesta_portes_array;
	}
	
	class respuesta_rutas{
	    public $id;
	    public $id_ruta;
	    public $respuesta;
	    public $fecha;
		public $id_pregunta;
		public $estado;
		public $user_respondido;
	}
	
	function sacarRespuestasRuta($idPregunta){

		$query = "SELECT id, id_ruta, respuesta, fecha, id_pregunta, estado, user_respondido FROM respuestasRutas WHERE id_pregunta = '$idPregunta' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$i = 0;
		
		while($row = mysql_fetch_array($result)) {
				
			$respuesta_rutas_array[$i] = new respuesta_rutas();

			$respuesta_rutas_array[$i]->id       = $row['id'];
			$respuesta_rutas_array[$i]->id_porte = $row['id_ruta'];
			$respuesta_rutas_array[$i]->respuesta  = $row['respuesta'];
			$respuesta_rutas_array[$i]->fecha    = $row['fecha'];
			$respuesta_rutas_array[$i]->id_pregunta = $row['id_pregunta'];
			$respuesta_rutas_array[$i]->estado    = $row['estado'];
			$respuesta_rutas_array[$i]->user_respondido    = $row['user_respondido'];
			
			$i++;

		}

		return $respuesta_rutas_array;
	}
	
	function getPropietarioPorte($idPorte){
	
        $query = "SELECT cliente FROM portes WHERE ID = '$idPorte' ";
        
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        
        $prop = mysql_fetch_array($result);

		return $prop[0];
	}
	
	function getPropietarioRuta($idRuta){
	
        $query = "SELECT transportista FROM rutas WHERE ID = '$idRuta' ";
        
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        
        $prop = mysql_fetch_array($result);

		return $prop[0];
	}
	
	function getOrigenPorte($id){
    	$query = "SELECT origen FROM portes WHERE ID = '$id' ";
    	
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	$prop = mysql_fetch_array($result);
    	
    	return $prop[0];
	}
	
	function getDestinoPorte($id){
    	$query = "SELECT destino FROM portes WHERE ID = '$id' ";
    	
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	$prop = mysql_fetch_array($result);
    	
    	return $prop[0];
	}
	
	function getOrigenRuta($id){
    	$query = "SELECT origen FROM rutas WHERE ID = '$id' ";
    	
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	$prop = mysql_fetch_array($result);
    	
    	return $prop[0];
	}
	
	function getDestinoRuta($id){
    	$query = "SELECT destino FROM rutas WHERE ID = '$id' ";
    	
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	$prop = mysql_fetch_array($result);
    	
    	return $prop[0];
	}
	
	function getNumeroMensajesNuevosPorteador($email, $id_user){
	   
	    $i = 0;
	   
    	$query = "SELECT * FROM preguntasPortes WHERE propietario_porte = '$email' AND estado = '0' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	while($row = mysql_fetch_array($result)) {
        	$i++;
    	}
    	
    	$query = "SELECT * FROM respuestasRutas WHERE user_respondido = '$id_user' AND estado = '0' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	while($row = mysql_fetch_array($result)) {
        	$i++;
    	}
    	
    	return $i;
	}
	
	function getNumeroMensajesNuevosTransportista($email, $id_user){
	   
	    $i = 0;
	   
    	$query = "SELECT * FROM preguntasRutas WHERE propietario_ruta = '$email' AND estado = '0' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	while($row = mysql_fetch_array($result)) {
        	$i++;
    	}
    	
    	$query = "SELECT * FROM respuestasPortes WHERE user_respondido = '$id_user' AND estado = '0' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	while($row = mysql_fetch_array($result)) {
        	$i++;
    	}
    	
    	return $i;
	}
	
	function getPreguntasNuevasPorteador($email){
	
    	$query = "SELECT * FROM preguntasPortes WHERE propietario_porte = '$email' AND estado = '0'";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	$i = 0;
    	
    	while($row = mysql_fetch_array($result)) {
    	
        	$mensajes[$i] = new preguntaPorte();
        	
        	$mensajes[$i]->tipo = 'pregunta';
        	$mensajes[$i]->id = $row['ID'];
        	$mensajes[$i]->autor = $row['autor'];
        	$mensajes[$i]->id_porte = $row['id_porte'];
        	$mensajes[$i]->pregunta = $row['pregunta'];
        	$mensajes[$i]->fecha = $row['fecha'];
        	$mensajes[$i]->origen = getOrigenPorte($row['id_porte']);
        	$mensajes[$i]->destino = getDestinoPorte($row['id_porte']);
        	
        	$i++;
    	}
    	
    	return $mensajes;
	}
	
	function getPreguntasNuevasTransportista($email){
	
    	$query = "SELECT * FROM preguntasRutas WHERE propietario_ruta = '$email' AND estado = '0'";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	$i = 0;
    	
    	while($row = mysql_fetch_array($result)) {
    	
        	$mensajes[$i] = new preguntaRuta();
        	
        	$mensajes[$i]->tipo = 'pregunta';
        	$mensajes[$i]->id = $row['ID'];
        	$mensajes[$i]->autor = $row['autor'];
        	$mensajes[$i]->id_ruta = $row['id_ruta'];
        	$mensajes[$i]->pregunta = $row['pregunta'];
        	$mensajes[$i]->fecha = $row['fecha'];
        	$mensajes[$i]->origen = getOrigenRuta($row['id_ruta']);
        	$mensajes[$i]->destino = getDestinoRuta($row['id_ruta']);
        	
        	$i++;
    	}
    	
    	return $mensajes;
	}

	function getRespuestasNuevasPorteador($id_user){
	
	    $query = "SELECT * FROM respuestasRutas WHERE user_respondido = '$id_user' AND estado = '0' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	$i = 0;
    	
    	while($row = mysql_fetch_array($result)) {
        	$mensajes[$i] = new respuestaRuta();
        	
        	$mensajes[$i]->tipo = 'respuesta';
        	$mensajes[$i]->id = $row['ID'];
        	$mensajes[$i]->id_ruta = $row['id_ruta'];
        	$mensajes[$i]->respuesta = $row['respuesta'];
        	$mensajes[$i]->fecha = $row['fecha'];
        	$mensajes[$i]->id_pregunta = $row['id_pregunta'];
        	$mensajes[$i]->origen = getOrigenRuta($row['id_ruta']);
        	$mensajes[$i]->destino = getDestinoRuta($row['id_ruta']);
        	
        	$i++;
    	}
	
    	return $mensajes;
    	
	}
	
	function getRespuestasNuevasTransportista($id_user){
	
	    $query = "SELECT * FROM respuestasPortes WHERE user_respondido = '$id_user' AND estado = '0' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	$i = 0;
    	
    	while($row = mysql_fetch_array($result)) {
        	$mensajes[$i] = new respuestaPorte();
        	
        	$mensajes[$i]->tipo = 'respuesta';
        	$mensajes[$i]->id = $row['ID'];
        	$mensajes[$i]->id_porte = $row['id_porte'];
        	$mensajes[$i]->respuesta = $row['respuesta'];
        	$mensajes[$i]->fecha = $row['fecha'];
        	$mensajes[$i]->id_pregunta = $row['id_pregunta'];
        	$mensajes[$i]->origen = getOrigenPorte($row['id_porte']);
        	$mensajes[$i]->destino = getDestinoPorte($row['id_porte']);
        	
        	$i++;
    	}
	
    	return $mensajes;
    	
	}
	
	function getPreguntasLeidasPorteador($email){
    	$query = "SELECT * FROM preguntasPortes WHERE propietario_porte = '$email' AND estado = '1'";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	$i = 0;
    	
    	while($row = mysql_fetch_array($result)) {
    	
        	$mensajes[$i] = new preguntaPorte();
        	
        	$mensajes[$i]->tipo = 'pregunta';
        	$mensajes[$i]->id = $row['ID'];
        	$mensajes[$i]->autor = $row['autor'];
        	$mensajes[$i]->id_porte = $row['id_porte'];
        	$mensajes[$i]->pregunta = $row['pregunta'];
        	$mensajes[$i]->fecha = $row['fecha'];
        	$mensajes[$i]->origen = getOrigenPorte($row['id_porte']);
        	$mensajes[$i]->destino = getDestinoPorte($row['id_porte']);
        	$i++;
    	}
    	
    	return $mensajes;
	}
	
	function getPreguntasLeidasTransportista($email){
    	$query = "SELECT * FROM preguntasRutas WHERE propietario_ruta = '$email' AND estado = '1'";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	$i = 0;
    	
    	while($row = mysql_fetch_array($result)) {
    	
        	$mensajes[$i] = new preguntaRuta();
        	
        	$mensajes[$i]->tipo = 'pregunta';
        	$mensajes[$i]->id = $row['ID'];
        	$mensajes[$i]->autor = $row['autor'];
        	$mensajes[$i]->id_ruta = $row['id_ruta'];
        	$mensajes[$i]->pregunta = $row['pregunta'];
        	$mensajes[$i]->fecha = $row['fecha'];
        	$mensajes[$i]->origen = getOrigenRuta($row['id_ruta']);
        	$mensajes[$i]->destino = getDestinoRuta($row['id_ruta']);
        	$i++;
    	}
    	
    	return $mensajes;
	}
	
	function getRespuestasLeidasPorteador($id_user){
	
	    $query = "SELECT * FROM respuestasRutas WHERE user_respondido = '$id_user' AND estado = '1' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	$i = 0;
    	
    	while($row = mysql_fetch_array($result)) {
        	$mensajes[$i] = new respuestaRuta();
        	
        	$mensajes[$i]->tipo = 'respuesta';
        	$mensajes[$i]->id = $row['ID'];
        	$mensajes[$i]->id_ruta = $row['id_ruta'];
        	$mensajes[$i]->respuesta = $row['respuesta'];
        	$mensajes[$i]->fecha = $row['fecha'];
        	$mensajes[$i]->id_pregunta = $row['id_pregunta'];
        	$mensajes[$i]->origen = getOrigenRuta($row['id_ruta']);
        	$mensajes[$i]->destino = getDestinoRuta($row['id_ruta']);
        	$i++;
    	}
	
    	return $mensajes;
    	
	}
	
	function getRespuestasLeidasTransportista($id_user){
	
	    $query = "SELECT * FROM respuestasPortes WHERE user_respondido = '$id_user' AND estado = '1' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    	
    	$i = 0;
    	
    	while($row = mysql_fetch_array($result)) {
        	$mensajes[$i] = new respuestaPorte();
        	
        	$mensajes[$i]->tipo = 'respuesta';
        	$mensajes[$i]->id = $row['ID'];
        	$mensajes[$i]->id_porte = $row['id_porte'];
        	$mensajes[$i]->respuesta = $row['respuesta'];
        	$mensajes[$i]->fecha = $row['fecha'];
        	$mensajes[$i]->id_pregunta = $row['id_pregunta'];
        	$mensajes[$i]->origen = getOrigenPorte($row['id_porte']);
        	$mensajes[$i]->destino = getDestinoPorte($row['id_porte']);
        	$i++;
    	}
	
    	return $mensajes;
    	
	}
	
	class presupuesto{
	    public $id;
		public $precio_oferta;
		public $fecha;
		public $nombre_autor_oferta;
		public $autor_oferta;
	}
	
	function sacarPresupuestosPortes($id){

		$query = "SELECT ID, precio_oferta, fecha, nombre_autor_oferta, autor_oferta FROM ofertas_portes WHERE porte_id = '$id' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$i = 0;
		
		while($row = mysql_fetch_array($result)) {
				
			$presupuestos_portes[$i] = new presupuesto();

			$presupuestos_portes[$i]->id            			  = $row['ID'];
			$presupuestos_portes[$i]->precio_oferta 			  = $row['precio_oferta'];
			$presupuestos_portes[$i]->fecha         			  = $row['fecha'];
			$presupuestos_portes[$i]->nombre_autor_oferta         = $row['nombre_autor_oferta'];
			$presupuestos_portes[$i]->autor_oferta         		  = $row['autor_oferta'];
			
			$i++;

		}

		return $presupuestos_portes;	
 
    }
	
	function sacarPresupuestosRutas($id){
    	$query = "SELECT ID, precio_oferta, nombre_autor_oferta, descripcion, autor_oferta, fecha FROM ofertas_rutas WHERE ruta_id = '$id' ";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

		$i = 0;
		
		while($row = mysql_fetch_array($result)) {
				
			$presupuestos_rutas[$i] = new presupuesto();

			$presupuestos_rutas[$i]->id            		 = $row['ID'];
			$presupuestos_rutas[$i]->precio_oferta 		 = $row['precio_oferta'];
			$presupuestos_rutas[$i]->fecha         		 = $row['fecha'];
			$presupuestos_rutas[$i]->nombre         	 = $row['nombre_autor_oferta'];
			$presupuestos_rutas[$i]->descripcion         = $row['descripcion'];
			$presupuestos_rutas[$i]->autor         		 = $row['autor_oferta'];
			
			$i++;

		}

		return $presupuestos_rutas;
	}
	
	function guardarPresupuestoPorte($id_porte, $propietario, $idAutor, $presu, $fecha, $estado, $nombre){
    	$sql  = "INSERT INTO ofertas_portes (porte_id, autor_porte, autor_oferta, precio_oferta, fecha, estado, nombre_autor_oferta) 
		VALUES ('$id_porte', '$propietario','$idAutor', '$presu', '$fecha', '$estado', '$nombre')" ;
		
		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
	}
	
	function guardarPresupuestoRuta($id_ruta, $propietario, $idAutor, $nombre_autor, $presu, $descripcion, $fecha, $estado){
    	$sql  = "INSERT INTO ofertas_rutas (ruta_id, autor_ruta, autor_oferta, nombre_autor_oferta, precio_oferta, descripcion, fecha, estado) 
		VALUES ('$id_ruta', '$propietario','$idAutor', '$nombre_autor', '$presu', '$descripcion', '$fecha', '$estado' )" ;
		
		$result = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
	}
	
	function sumarPresupuestoPorte($id, $presu){
	
	    //sumar numero de presupuesto en mas uno
    	$query = "SELECT num_presupuesto FROM portes WHERE ID = '$id' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		
		$verificacion = mysql_fetch_array($result);
    	
    	$num = $verificacion[0];
    	
    	$num++;
    	
    	$sql = "UPDATE portes SET num_presupuesto='$num' WHERE ID='$id'";
   		$result = mysql_query($sql);
   		
   		
   		//cambiar presupuesto mas bajo
   		$query = "SELECT presupuesto_bajo FROM portes WHERE ID = '$id' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		
		$verificacion = mysql_fetch_array($result);
    	
    	$bajo = $verificacion[0];
   		
   		if($bajo == 0){
       		$sql = "UPDATE portes SET presupuesto_bajo='$presu' WHERE ID='$id'";
       		$result = mysql_query($sql);
       		
       		return;
   		}
   		
   		if($bajo > $presu){
       		$sql = "UPDATE portes SET presupuesto_bajo='$presu' WHERE ID='$id'";
       		$result = mysql_query($sql);
   		}
   		
	}
	
	function sumarPresupuestoRuta($id, $presu){
	
	    //sumar numero de presupuesto en mas uno
    	$query = "SELECT num_presupuesto FROM rutas WHERE ID = '$id' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		
		$verificacion = mysql_fetch_array($result);
    	
    	$num = $verificacion[0];
    	
    	$num++;
    	
    	$sql = "UPDATE rutas SET num_presupuesto='$num' WHERE ID='$id'";
   		$result = mysql_query($sql);
   		
   		
   		//cambiar presupuesto mas bajo
   		$query = "SELECT presupuesto_bajo FROM rutas WHERE ID = '$id' ";
    	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		
		$verificacion = mysql_fetch_array($result);
    	
    	$bajo = $verificacion[0];
   		
   		if($bajo == 0){
       		$sql = "UPDATE rutas SET presupuesto_bajo='$presu' WHERE ID='$id'";
       		$result = mysql_query($sql);
       		
       		return;
   		}
   		
   		if($bajo > $presu){
       		$sql = "UPDATE rutas SET presupuesto_bajo='$presu' WHERE ID='$id'";
       		$result = mysql_query($sql);
   		}
   		
	}
	
	function getRespuestaRutaByPregunta($id){
		$query = "SELECT * FROM respuestasRutas WHERE id_pregunta = '$id' ";
		
		$result = mysql_query($query);
		$respuesta = mysql_fetch_array($result);

		return $respuesta;
	}
	
	function getPreguntaPorteByRespuesta($id){
		$query = "SELECT * FROM preguntasPortes WHERE ID = '$id' ";
		
		$result = mysql_query($query);
		$pregunta = mysql_fetch_array($result);

		return $pregunta;
	}
	
	function getRespuestaPorteByPregunta($id){
		$query = "SELECT * FROM respuestasPortes WHERE id_pregunta = '$id' ";
		
		$result = mysql_query($query);
		$respuesta = mysql_fetch_array($result);

		return $respuesta;
	}
	
	function getPreguntaRutaByRespuesta($id){
		$query = "SELECT * FROM preguntasRutas WHERE ID = '$id' ";
		
		$result = mysql_query($query);
		$pregunta = mysql_fetch_array($result);

		return $pregunta;
	}
	
	function deletePorte($id){
	   $query  = "DELETE from portes WHERE ID = '$id' "; 
	   $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	   
	   $query  = "DELETE from ofertas_portes WHERE porte_id = '$id' "; 
	   $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	   
	   $query  = "DELETE from preguntasPortes WHERE id_porte = '$id' "; 
	   $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	   
	   $query  = "DELETE from respuestasPortes WHERE id_porte = '$id' "; 
	   $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	}
	
	function deleteRuta($id){
        $query  = "DELETE from rutas WHERE ID = '$id' "; 
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        
        $query  = "DELETE from ofertas_rutas WHERE ruta_id = '$id' "; 
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        
        $query  = "DELETE from preguntasRutas WHERE id_ruta = '$id' "; 
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        
        $query  = "DELETE from respuestasRutas WHERE id_ruta = '$id' "; 
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	}

	function cargas_vehiculo_posicion($id_user, $id_vehiculo){
		
		$sql = "SELECT cargas FROM vehiculos_cargas WHERE id_user='$id_user' AND id_vehiculo='$id_vehiculo'  "; 
		$result   = mysql_query($sql) or die('Consulta fallida: ' . mysql_error());
		$consulta = mysql_fetch_array($result);
		$consulta = $consulta[0];
	
		
		return $consulta;
	}
?>