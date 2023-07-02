<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php //echo NOMBRESITIO;?></title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		        
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/estilosNoticieroYaracuy.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/MediaQuery_EstilosNoticieroYaracuy_350.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_370.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/MediaQuery_EstilosNoticieroYaracuy_800.css?v=<?php echo rand();?>"/>
		
		<!-- CDN FUENTES DE GOOGLE-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Gruppo'>        
    </head>
    <body>		
		<header class="header" id="Header">
			<!-- ICONO HAMBURGUESA"-->				
			<img class="header--menu Default_quitarEscritorio" id="ComandoMenu" onclick="mostrarMenu()" src="<?php echo RUTA_URL . '/public/iconos/menu/outline_menu_black_24dp.png'?>"/>	
			
			<!-- MEMBRETE FIJO -->
			<label class="header__titulo--Panelperiodista">Noticiero Yaracuy</label>	
			
			<!-- FECHA Y CARITA -->
			<div class="cont_header--loginFecha Default_quitarMovil">
				<!-- <div style="margin-right: 15px;">
					<label class="header__fecha Default_pointer" onclick="cerrarSecion()"></label>
				</div> -->
				<div>
					<?php
					if(!empty($_SESSION['ID_Periodista'])){	?>
						<label class="Default_pointer"><img class="Default_login" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_face_6_black_24dp.png'?>" onclick="cerrarSecion()"/></label>						
						<?php
					}	?>
				</div>
			</div>
		</header>
		
   <!-- No se cierrra la etiqueta <body> porque se cierra es el footer -->