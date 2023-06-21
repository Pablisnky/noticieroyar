<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php //echo NOMBRESITIO;?></title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="description" content="Noticias de Yaracuy"/>
		<meta name="keywords" content="noticias, yaracuy, publicidad"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="MobileOptimized" content="width"/>
		<meta name="HandheldFriendly" content="true"/>
		<!-- <meta http-equiv="Expires" content="0">  -->
		<!-- <meta http-equiv="Last-Modified" content="0"> -->
		<!-- <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 		<meta http-equiv="Pragma" content="no-cache"> -->

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/estilosNoticieroYaracuy.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_350.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_370.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_800.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/EstilosGiroTarjeta.css?v=<?php echo rand();?>"/>
				
		<!-- CDN FUENTES DE GOOGLE-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Gruppo'/>
    </head>
    <body>				
		<header class="header" id="Header">
			<!-- ICONO HAMBURGUESA"-->				
			<img class="header--menu Default_quitarEscritorio" id="ComandoMenu" onclick="mostrarMenu()" src="<?php echo RUTA_URL . '/public/iconos/menu/outline_menu_black_24dp.png'?>"/>

			<!-- MEMBRETE FIJO -->
			<label class="header__titulo">Noticiero Yaracuy</label>
			
			<!-- FECHA Y CARITA -->
			<div class="cont_header--loginFecha Default_quitarMovil">
				<div>
					<?php
					if(!empty($_SESSION['ID_Suscriptor'])){	?>
						<label class="Default_pointer"><img class="Default_login" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_face_6_black_24dp.png'?>" onclick="cerrarSecion()"/></label>						
						<?php
					}	?>
				</div>
			</div>
		</header>
		
		<!-- No se cierrra la etiqueta <body> porque se cierra es el footer -->