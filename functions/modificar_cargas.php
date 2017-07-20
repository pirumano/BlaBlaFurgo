<?php

    if(isset($_COOKIE["pre-email"])){
        $email  = $_COOKIE["pre-email"];
    }else{
        $email  = $_COOKIE["email"];
    }
    
    require_once('../consultas.php');
    conectar();
    
    $id_user = sacar_id_user($email);

    $num = $_POST['number-vehiculos'];

    for($i = 0; $i < $num; $i++){
        $vehicle = $_POST["vehicle-" . $i];
        
        $cargas[0] = 0;
        
        if($_POST["muebles-" . $i]){
            $cargas[1] = 1;
        }else{
            $cargas[1] = 0;
        }

        if($_POST["objetos-" . $i]){
            $cargas[2] = 1;
        }else{
            $cargas[2] = 0;
        }
        
        if($_POST["coches-" . $i]){
            $cargas[3] = 1;
        }else{
            $cargas[3] = 0;
        }
        
        if($_POST["motos-" . $i]){
            $cargas[4] = 1;
        }else{
            $cargas[4] = 0;
        }
        
        if($_POST["especial-" . $i]){
            $cargas[5] = 1;
        }else{
            $cargas[5] = 0;
        }
        
        if($_POST["piezas-" . $i]){
            $cargas[6] = 1;
        }else{
            $cargas[6] = 0;
        }
        
        if($_POST["merca-" . $i]){
            $cargas[7] = 1;
        }else{
            $cargas[7] = 0;
        }
        
        if($_POST["piano-" . $i]){
            $cargas[8] = 1;
        }else{
            $cargas[8] = 0;
        }
        
        if($_POST["barco-" . $i]){
            $cargas[9] = 1;
        }else{
            $cargas[9] = 0;
        }
        
        if($_POST["industrial-" . $i]){
            $cargas[10] = 1;
        }else{
            $cargas[10] = 0;
        }
        
        if($_POST["mascota-" . $i]){
            $cargas[11] = 1;
        }else{
            $cargas[11] = 0;
        }
        
        if($_POST["cuidado-" . $i]){
            $cargas[12] = 1;
        }else{
            $cargas[12] = 0;
        }
        
        if($_POST["refrigerado-" . $i]){
            $cargas[13] = 1;
        }else{
            $cargas[13] = 0;
        }
        
        if($_POST["otra-" . $i]){
            $cargas[14] = 1;
        }else{
            $cargas[14] = 0;
        }
        
        if($_POST["liquido-" . $i]){
            $cargas[15] = 1;
        }else{
            $cargas[15] = 0;
        }

        $cargas_actualizadas = array();
        
        for ($j=1; $j < 16 ; $j++) { 
            if ($cargas[$j] == 1){
                $cargas_actualizadas[] = $j;
            }
        }

        $cargas_string = serialize($cargas_actualizadas);

        $id_vehiculo  = ID_vehiculo($vehicle);
        meter_cargas($id_user, $id_vehiculo, $cargas_string);
    }
    
    header("Location: ../modificarCargas.php");
    