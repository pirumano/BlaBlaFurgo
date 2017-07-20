<?php
	$user = $_COOKIE["user"];
	if($user != ""){
		$login = 1;
		$name  = $user;
	} else {
		$login = 0;
	}
	
	echo $login;
?>