<!DOCTYPE html>
<html lang="es">
    <head><!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-E43SZ6L3CQ"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-E43SZ6L3CQ');
		</script>

		<!-- ********************************************************************************************* -->
		
        <title><?php echo NOMBRESITIO;?></title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="description" content="Noticias de Yaracuy"/>
		<meta name="keywords" content="noticias, yaracuy, publicidad"/>
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
		
		<!-- <link rel="stylesheet" type="text/css" href="<?php //echo RUTA_URL?>/public/css/estilosContraloria.css?v=<?php echo rand();?>"/> -->
		
		<!-- <link rel="shortcut icon" type="image/png" href="<?php //echo RUTA_URL;?>/public/images/logo.png"/>	 -->
		<link rel="manifest" href="<?php echo RUTA_URL;?>/public/manifest.json"/>
		
		<!-- CDN FUENTES DE GOOGLE-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Gruppo|Moon+Dance'>

		<!-- CDN ICONOS DE GOOGLE -->
		<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet"/>
    </head>
	<body class="body_1">				
		<header class="header" id="Header">  
			<div>							
				<!-- ICONO HAMBURGUESA"-->				
				<img class="header--menu" id="ComandoMenu" onclick="mostrarMenu()" src="<?php echo RUTA_URL . '/public/iconos/menu/outline_menu_black_24dp.png'?>"/>
				
				<!-- BARRA DE NAVEGACION -->
				<nav class="header__menuResponsive" id="MenuResponsive">
					<div class="header--nav">
						<ul id="MenuContenedor">
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>" rel="noopener noreferrer">Noticias</a></li>
								<!-- <ul class="menuContenedor_3" id="MenuContenedor_3">
									<li><a class="header__li--Enlaces enlace_JS"  href="<?php //echo RUTA_URL . '/Noticias_C/NoticiasGenerales#Marcado_1';?>" rel="noopener noreferrer">Cultura</a></li>
									<li><a class="header__li--Enlaces">Politica</a></li>
								</ul> -->
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Efemeride_C';?>" rel="noopener noreferrer">Efemérides</a></li>
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Agenda_C';?>" rel="noopener noreferrer">Agenda de eventos</a></li>
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Publicidad_C';?>" rel="noopener noreferrer">Publicidad</a></li> <!-- Directorio comercial -->
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Obituario_C';?>" rel="noopener noreferrer">Obituario</a></li>
							<li><a class="header__li--Enlaces" href="https://yaracultura.blogspot.com/" target="_blank" rel="noopener noreferrer">Blog Yaracultura</a></li>
							<hr class="hr_1">
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Contraloria_C';?>" rel="noopener noreferrer">Contraloría social</a></li>
                			<li class="Default_quitarMovil"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/GaleriaArte_C';?>">Galeria de arte regional</a></li>

							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/NA,NA';?>" rel="noopener noreferrer">Abrir sesión</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>" rel="noopener noreferrer">Suscribirse</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/VitrinaMayorista_C';?>" rel="noopener noreferrer">Editorial</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Pod Cast</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Directorio</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Ciudades_C';?>" rel="noopener noreferrer">Agenda</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Archivo</a></li>
							<!-- <hr> -->
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Galeria de arte</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Contacto_C';?>" rel="noopener noreferrer">Contacto</a></li>
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
			<?php
			if(!empty($_SESSION['ID_Suscriptor'])){	?>
				<a href="<?php echo RUTA_URL . '/Login_C/accesoSuscriptor';?>"><img src="<?php echo RUTA_URL . '/public/iconos/login/outline_face_6_black_24dp.png'?>"/></a>				
				<?php
			}	?>
			
			<!-- BOTON VIDEO PROMOCIONAL SAN FELIPE -->
			<!-- <div class="con_portada--titulo Default_pointer" id="Mostrar_Promocion">
				<span class="material-icons-outlined" style="width: 30px" id="CerrarVentana">play_circle</span>
				<label class="Default_pointer" >Calle<br class="Default_quitarEscritorio"> Los Gaiteros </label>
			</div> -->
			<!-- VIDEO PROMOCIONAL SAN FELIPE -->	
			<!-- <div class="con_portada--promocion" id="Miimagen">
				<div id="Promocion">
					<span class="material-icons-outlined publicidad_cont--cerrar Default_pointer" id="Cerrar--modal" onclick="pausar()">cancel</span>
					<div>
						<video class="con_portada--video" id="VideoPromocion" src="<?php echo RUTA_URL?>/public/video/Calle_Los_Gaiteros.mp4" controls loop ></video> 
					</div>
				</div>
			</div>  -->
		</header>
		
		<!-- MEMBRETE DESPLAZANTE -->
		<div class="tapa-logo" id="Tapa_Logo">
			<label class="tapa-logo--font">Noticiero Yaracuy</label>
		</div>
		
		<noscript>
			<p>Bienvenido a NoticieroYaracuy.com</p>
			<p>La tienda online requiere para su funcionamiento el uso de JavaScript, si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
		</noscript>

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->