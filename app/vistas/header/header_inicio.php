<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo NOMBRESITIO;?></title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="description" content="Ventas por internet a pedido"/>
		<meta name="keywords" content="pedido, despacho, compra"/>
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
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_800.css?v=<?php echo rand();?>"/>
		
		<!-- <link rel="shortcut icon" type="image/png" href="<?php //echo RUTA_URL;?>/public/images/logo.png"/>	 -->
		<link rel="manifest" href="<?php echo RUTA_URL;?>/public/manifest.json"/>
		
		<!-- CDN FUENTES DE GOOGLE-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Gruppo'>

		<!-- CDN ICONOS DE GOOGLE -->
		<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet"/>

    </head>
    <body style="overflow-y: hidden; overflow-x: hidden;">				
		<header class="header--inicio" id="Header">
			
			<!-- ICONO HAMBURGUESA"-->
			<label class="comandoMenu_2" id="ComandoMenu" onclick="mostrarMenu()"><span class="material-icons-outlined header--menu" id="Span_6">menu</span></label>
			
			<!-- BARRA DE NAVEGACION -->
			<nav id="MenuResponsive" class="header__menuResponsive header__menuResponsive--inicio"">
				<ul id="MenuContenedor">
					<li class="Default--quitar"><a class="a_3A" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>" rel="noopener noreferrer"><i class="fas fa-address-card icono_1 icono_6"></i>Suscribirse</a></li>
					<li class="Default--quitar"><a class="a_3A" href="<?php echo RUTA_URL . '/VitrinaMayorista_C';?>" rel="noopener noreferrer"><i class="fas fa-truck-moving icono_1 icono_6"></i>Editorial</a></li>
					<li class="Default--quitar"><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer"><i class="fas fa-user-check icono_1 icono_6"></i>Eventos</a></li>
					<li class="Default--quitar"><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer"><i class="fas fa-user-check icono_1 icono_6"></i>Pod Cast</a></li>
					<li class="Default--quitar"><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer"><i class="fas fa-user-check icono_1 icono_6"></i>Directorio</a></li>
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/Ciudades_C';?>" rel="noopener noreferrer" rel="noopener noreferrer"><i class="fas fa-shopping-basket icono_1 icono_6"></i>Obiturio</a></li>
					<li class="Default--quitar"><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer"><i class="fas fa-user-check icono_1 icono_6"></i>Archivo</a></li>
					<hr>
					<li><a class="a_3A" href="https://yaracultura.blogspot.com/" target="_blank" rel="noopener noreferrer"><i class="fas fa-user-check icono_1 icono_6"></i>Blog Yaracultura</a></li>
					<li class="Default--quitar"><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer"><i class="fas fa-user-check icono_1 icono_6"></i>Galeria de arte</a></li>
					<li class="Default--quitar"><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?> rel="noopener noreferrer"><i class="fas fa-user-check icono_1 icono_6"></i>Contraloria social</a></li>
					<li><a class="a_3A"" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>"><i class="fas fa-user-check icono_1 icono_6" rel="noopener noreferrer"></i>Efemerides</a></li>
					<li class="Default--quitar"><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?> rel="noopener noreferrer"><i class="fas fa-user-check icono_1 icono_6"></i>Turismo</a></li>
					<hr>
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>"><i class="fas fa-user-check icono_1 icono_6" rel="noopener noreferrer"></i>Nuestro ADN</a></li>
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>"><i class="fas fa-user-check icono_1 icono_6" rel="noopener noreferrer"></i>LOGOS REDES SOCIALES</a></li>
				</ul>
			</nav>

			<!-- MEMBRETE DESPLAZANTE -->
			<div class="tapa-logo" id="Tapa_Logo">
				<label class="Default_font--white">Noticiero Yaracuy</label>
			</div>

		</header>

		<!-- MEMBRETE FIJO-->
		<div class="contenedor_111">
			<label class="header__titulo"/>Noticiero Yaracuy</label>
			<!-- <br> -->
			<small style="font-size: 0.8em;">San Felipe, <?php echo date('d');?> de <?php echo date('M');?></samall>
		</div>
		
		<!-- DIV USADO PARA TAPAR EL BODY MIENTRAS ESTA EL MENU RESPONSIVE -->
		<div class="tapa" id="Tapa">
		</div>

		<noscript>
			<p>Bienvenido a NoticieroYaracuy.com</p>
			<p>La tienda online requiere para su funcionamiento el uso de JavaScript, si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
		</noscript>

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->