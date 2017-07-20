<!DOCTYPE html>
<html>
	<?php include("datos.php")?>
	<head>
		
		<?php if(isset($title)):?>
			<title><?php echo $title;?></title>
		<?php else:?>
			<title>BlaBlaFurgo | El buscador de transportes baratos</title>
		<?php endif;?>
		
		<!-- META's -->
	    <meta charset="UTF-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	    <meta name="description" content="Buscador de transportes baratos">
	    <link rel="shortcut icon" type="image/x-icon" href="assets/images/faviconMIP.ico" />
	    
	    <?php if($noindex):?>
	    	<meta name="robots" content="noindex">
	    <?php endif;?>
			
		<!-- CDN's -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		
		<!-- CSS's -->
		<link rel="stylesheet" type="text/css" href="assets/css/jquery-confirm.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/style2.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/style3.css" />
		
		
	</head>
	<body>
	<input id="reloadValue" type="hidden" name="reloadValue" value="" />