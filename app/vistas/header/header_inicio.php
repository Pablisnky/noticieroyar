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
		
        <title>NoticieroYaracuy</title>

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
				
		<!-- MANIFEST PWA -->
		<link rel="manifest" href="<?php echo RUTA_URL;?>/public/manifest.json"/>
		
		<!-- CDN FUENTES DE GOOGLE-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Gruppo|Moon+Dance'>
    </head>
	<body class="body_1">				
		<header class="header" id="Header">
			
			<!-- ICONO HAMBURGUESA"-->		
			<div>									
				<img class="header--menu" id="ComandoMenu" onclick="mostrarMenu()" src="<?php echo RUTA_URL . '/public/iconos/menu/outline_menu_black_24dp.png'?>"/>
			</div>
				
			<!-- BARRA DE NAVEGACION -->
			<div>
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
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Clasificados_C';?>" rel="noopener noreferrer">Clasificados</a></li> 
							<!-- Directorio comercial -->
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Obituario_C';?>" rel="noopener noreferrer">Obituario</a></li>
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>" rel="noopener noreferrer">Tarifas</a></li>
							<hr class="hr_1">

							<li><a class="header__li--Enlaces" href="https://yaracultura.blogspot.com/" target="_blank" rel="noopener noreferrer">Blog Yaracultura</a></li>
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Contraloria_C';?>" rel="noopener noreferrer">Contraloría social</a></li>
                			<li class="Default_quitarMovil"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/GaleriaArte_C';?>">Galeria de arte regional</a></li>
							<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/PodCast_C';?>" rel="noopener noreferrer">PodCast</a></li>
							<li class=""><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/SinID_Noticia,SinBandera';?>" rel="noopener noreferrer">Iniciar sesión</a></li>




							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>" rel="noopener noreferrer">Suscribirse</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/VitrinaMayorista_C';?>" rel="noopener noreferrer">Editorial</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Pod Cast</a></li>
							<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Directorio</a></li>
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

			<!-- BOTONES DE CLASIFICADOS Y EVENTOS -->
			<div class="cont_botones_destacados">
				<div>
					<label class="boton boton--corto"><a class="Default_font--white boton_a" href="<?php echo RUTA_URL . '/Agenda_C';?>">Eventos</a></label> 
				</div>        
				<div>
					<label class="boton boton--corto"><a class="Default_font--white boton_a"" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
				</div>         
				<div>
					<label class="boton boton--corto"><a class="Default_font--white boton_a"" href="<?php echo RUTA_URL . '/Clasificados_C';?>">Clasificados</a></label> 
				</div>          
				<div>
					<label class="boton boton--corto"><a class="Default_font--white boton_a"" href="<?php echo RUTA_URL . '/GaleriaArte_C';?>">Galeria de arte</a></label> 
				</div>      
			</div> 

			<!-- MEMBRETE FIJO -->
			<div class="cont_header_membrete">
				<label class="header__titulo">Noticiero Yaracuy</label>
			</div>

			<!-- FECHA Y CARITA -->
			<div>
				<label class="header__fecha">San Felipe, <?php echo date('d');?> de <?php echo date('M');?></label>

				<?php
				if(!empty($_SESSION['ID_Suscriptor'])){	?>
					<a href="<?php echo RUTA_URL . '/Suscriptor_C/accesoSuscriptor/' . $_SESSION['ID_Suscriptor'];?>"><img src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_face_6_black_24dp.png'?>"/></a>				
					<?php
				}	?>
			</div>
			    
			<!-- BOTON VIDEO PROMOCIONAL -->
			<!-- <div class="con_portada--titulo Default_pointer" id="Mostrar_Promocion">
				<img style="width: 2.5em" id="CerrarVentana" src="<?php //echo RUTA_URL . '/public/iconos/video/outline_videocam_black_24dp.png'?>"/> 
				<label class="Default_pointer" >Turismo<br class="Default_quitarEscritorio"> en Yaracuy </label>
			</div> -->
			<!-- VIDEO PROMOCIONAL -->	
			<!-- <div class="con_portada--promocion" id="Miimagen">
				<div id="Promocion">
					<!-- ICONO CERRAR VIDEO -->
					<!-- <img class=" publicidad_cont--cerrar Default_pointer" style="width: 1em;" id="Cerrar--modal" onclick="pausar()" src="<?php //echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"/>
					<div>
						<video class="con_portada--video" id="VideoPromocion" src="<?php //echo RUTA_URL?>/public/video/TurismoYaracuy.mp4" controls loop ></video> 
					</div>
				</div>
			</div>   -->
		</header>
				
		<!-- MEMBRETE DESPLAZANTE -->
		<div class="tapa-logo" id="Tapa_Logo">
			<label class="tapa-logo--font">Noticiero Yaracuy</label>
			
			<figure class="tapa-logo--mapa Default_pointer">
				<img id="Abrir" src="<?php echo RUTA_URL . '/public/images/Mapa-Venezuela-yaracuy.png'?>"/>
			</figure>
		</div>
		
		<!-- FULLSCREEM -->
		<div class="Default_ocultar" id="Miimagen">	
			<!-- ICONO CERRAR -->
			<a href="<?php echo RUTA_URL ;?>/Inicio_C"><img class="cont_modal--cerrar Default_pointer" style="width: 1em;" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"/></a>

			<!-- AUDIO -->
			<!-- <audio autoplay src="<?php //echo RUTA_URL . '/public/audio/TeofiloDominguez-Esterlina.mp3';?>" loop></audio> -->
			
			<div class="fullscreem--inicio--texto">
				<h1 class="fullscreem--inicio--h1">Poema Yaracuy</h3>
				<h3 class="fullscreem--inicio--h3">Poeta yaracuyano Jose Parra</h1>
				<h2 style="color:white">I</h2>
				<p style="color:white">Esta es mi tierra. Yaracuy la nombran.<br>
				Yaracuy es río y es la hazaña<br>
				Y el nombre de su selva<br>
				Y su montaña preso en las aguas<br>
				Que su plano alfombran.</p>

				<h2 style="color:white">II</h2>
				<p style="color:white">Su luz, su magia, su verdor asombran<br>
				Y a orillas de las espumas que la bañan<br>
				De su seno de miel surge la caña<br>
				Para endulzar los labios que la nombran.</p>

				<h2 style="color:white">III</h2>
				<p style="color:white">Es tierra oscura… mas si en paz florece<br>
				Y en el vaivén del corazón nos crece<br>
				El cobre de su glóbulo aborigen.</p>

				<h2 style="color:white">IV</h2>
				<p style="color:white">Vemos entonces sus azules sendas<br>
				Y hasta oímos la voz de sus leyendas<br>
				Llenándonos la noche del origen.</p>
			</div>
			<div class="fullscreem--inicio--mapa">
				<figure>
					<img src="<?php echo RUTA_URL . '/public/images/Mapa-Venezuela-yaracuy.png'?>"/>
				</figure>
			</div>
		</div>
		
		<noscript>
			<p>Bienvenido a NoticieroYaracuy.com</p>
			<p>La tienda online requiere para su funcionamiento el uso de JavaScript, si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
		</noscript>

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->