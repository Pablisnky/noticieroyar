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
		<!-- <meta http-equiv="expires" content="12 de julio de 2020 16:00:00 GMT"/> -->

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/estilosNoticieroYaracuy.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_350.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_370.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_800.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/EstilosGiroTarjeta.css?v=<?php echo rand();?>"/>
		
		<!-- CDN FUENTES DE GOOGLE -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
    </head>
    <body class="">	
		<header class="">
			<div>					
                <!-- ICONO HAMBURGUESA -->
				<img class="header--menu" id="ComandoMenu" onclick="mostrarMenu()" src="<?php echo RUTA_URL . '/public/iconos/menu/outline_menu_black_24dp.png'?>"/>
                <!-- <label id="ComandoMenu" class="comandoMenu_2 comandoMenu_Inicio borde_1" onclick="mostrarMenu()"><span id="Span_6"><span class="material-icons-outlined icono_3 span_15Inicio">menu</span></span></label> -->
                            
                <!-- BARRA DE NAVEGACION header__menuResponsive--tienda-->
                <nav class="header__menuResponsive" id="MenuResponsive">
					<div class="header--nav">
                        <ul id="MenuContenedor">
                            <li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/CuentaComerciante_C';?>">Inicio</a></li>
                            <li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/CuentaComerciante_C/Productos/';?>">Productos</a></li>
                            <li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/CuentaComerciante_C/Publicar/';?>">Cargar producto</a></li>
                            <li><a class="header__li--Enlaces a_4" href="<?php echo RUTA_URL . '/CerrarSesion_C';?>">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
		</header>	

		<!-- div utilizado para tapar el body mientras esta el menu responsive --> 
		<!-- <div class="tapa" id="Tapa">
		</div> -->

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->