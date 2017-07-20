<?php
    
    require_once("../consultas.php");
    conectar();
    
    $email = $_COOKIE['email'];
    $id_user = sacar_id_user($email, "porteador");
    
    $sql = "UPDATE preguntasPortes SET estado='1' WHERE propietario_porte='$email'";
   	$result = mysql_query($sql);
   	
   	$sql = "UPDATE respuestasRutas SET estado='1' WHERE user_respondido='$id_user'";
   	$result = mysql_query($sql);