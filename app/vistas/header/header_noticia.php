<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo NOMBRESITIO;?></title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="description" content="Noticias de Yaracuy"/>
		<meta name="keywords" content="noticias, yaracuy, publicidad"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
		
		<!-- <link rel="shortcut icon" type="image/png" href="<?php //echo RUTA_URL;?>/public/images/logo.png"/-->
		
		<!-- CDN FUENTES DE GOOGLE-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Gruppo'>

		<!-- CDN ICONOS DE GOOGLE -->
		<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet"/>

    </head>
    <body>				
		<header class="header" id="Header">
			<div>
				<!-- ICONO HAMBURGUESA -->
				<label id="ComandoMenu" onclick="mostrarMenu()"><span class="material-icons-outlined header--menu" id="Span_6">menu</span></label>
				
				<!-- BARRA DE NAVEGACION -->
				<nav class="header__menuResponsive" id="MenuResponsive" >
					<div class="header--nav">
						<ul id="MenuContenedor">
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Inicio_C';?>" rel="noopener noreferrer">Inicio</a></li>
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>" rel="noopener noreferrer">Noticias</a></li>
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Efemeride_C';?>" rel="noopener noreferrer">Efem??rides</a></li>
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Agenda_C';?>" rel="noopener noreferrer">Agenda de eventos</a></li>
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Publicidad_C';?>" rel="noopener noreferrer">Publicidad</a></li> <!-- Directorio comercial -->
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Obituario_C';?>" rel="noopener noreferrer">Obituario</a></li>
							<li><a class="header__li--Enlaces" href="https://yaracultura.blogspot.com/" target="_blank" rel="noopener noreferrer">Blog Yaracultura</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/NA,NA';?>" rel="noopener noreferrer">Abrir sesi??n</a></li>
							
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Contraloria_C';?>" rel="noopener noreferrer">Contraloria social</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>" rel="noopener noreferrer">Suscribirse</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/VitrinaMayorista_C';?>">Editorial</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Pod Cast</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Directorio</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Ciudades_C';?>" rel="noopener noreferrer">Agenda</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Archivo</a></li>
							<!-- <hr> -->
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Galeria de arte</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Contraloria social</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Efemerides</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>">Turismo</a></li>
							<!-- <hr> -->
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Nuestro ADN</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">LOGOS REDES SOCIALES</a></li>
						</ul>
					</div>
				</nav>
			</div>

			<!-- MEMBRETE FIJO -->
			<label class="header__titulo">Noticiero Yaracuy</label>

			<!-- FECHA -->
			<label class="header__fecha">San Felipe, <?php echo date('d');?> de <?php echo date('M');?></label>
			
			<!-- LOGIN -->
			<!-- <a href="<?php //echo RUTA_URL . '/Login_C';?>">Entrar</a> -->
		</header>
		
		<!-- MEMBRETE DESPLAZANTE -->
		<div class="tapa-logo" id="Tapa_Logo">
			<label class="tapa-logo--font">Noticiero Yaracuy</label>
		</div>

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->