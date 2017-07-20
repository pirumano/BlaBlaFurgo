<?php
    
    require_once("../consultas.php");
    conectar();
    
    $email = $_COOKIE['email'];
    $id_user = sacar_id_user($email, "transportista");
    
    $sql = "UPDATE preguntasRutas SET estado='1' WHERE propietario_ruta='$email'";
   	$result = mysql_query($sql);
   	
   	$sql = "UPDATE respuestasPortes SET estado='1' WHERE user_respondido='$id_user'";
   	$result = mysql_query($sql);
   		
    
    