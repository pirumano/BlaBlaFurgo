<?php
    
    $id = $_GET['id'];
    
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    
    $porte = getInfoPorte($id);
    $contacto = getInfoPorteador($porte['cliente']);
    
    $cliente = $porte['cliente'];
    $carga = $porte['carga_id'];
    if($carga == "")
        $carga  = "No Especificado";
        
    $dimensiones = $porte['dimensiones'];
    if($dimensiones == "")
        $dimensiones  = "No Especificado";
    
    $f_recogida = $porte['f_recogida'];
    if($f_recogida == "")
        $f_recogida  = "No Especificado";
        
    $f_entrega = $porte['f_entrega'];
    if($f_entrega == "")
        $f_entrega  = "No Especificado";
        
    $precio = $porte['precio'];
    if($precio == "")
        $precio  = "No Especificado";
        
    $descripcion = $porte['descripcion'];
    if($descripcion == "")
        $descripcion  = "No Especificado";
        
    $f_publicacion = $porte['f_publicacion'];
    if($f_publicacion == "")
        $f_publicacion  = "No Especificado";
        
    $distancia = $porte['distancia'];
    if($distancia == "")
        $distancia  = "No Especificado";
        
    $flexOrigen = $porte['flexOrigen'];
    $flexDestino = $porte['flexDestino'];
    $flexRecogida = $porte['flexRecogida'];
    $flexEntrega = $porte['flexEntrega'];
    $foto = $porte['foto'];
    $num_presupuesto = $porte['num_presupuesto'];
    $presupuesto_bajo = $porte['presupuesto_bajo'];

    $id_cliente_porte = sacar_id_porteador($cliente);
    
    if(isset($_COOKIE['email'])){
        $email_user = $_COOKIE['email'];
        $tipo_user = $_COOKIE['tipo_usuario'];
        $id_user = sacar_id_user($email_user, $tipo_user);
        $verificado = getVerificado($email_user, $tipo_user);
    }
