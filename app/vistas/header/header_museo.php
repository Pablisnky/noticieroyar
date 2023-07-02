<!DOCTYPE html>
<html lang="es">
    <head>
        <title>NoticieroYaracuy</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="description" content="Museo Carmelo Fernandez"/>
		<meta name="keywords" content="Museo Carmelo Fernandez, museo, San Felipe, Yaracuy, cultura"/>
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
				
		<!-- CDN FUENTES DE GOOGLE-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Gruppo|Moon+Dance|Roboto'>
		

		<style>    
			.mostrar_MenuSec{
				margin-top: 35%!important;
				opacity: 1; 
			}
			.rotarArriba{
				transform: rotate(180deg);/*gira el texto para que se lea de abajo hacia arriba*/
				transition: all 0.4s;
			} 
		</style>

		<!-- estilos parametrizados -->
		<?php
			// if(!empty($Datos['bandera'])){/*Cuando se llama el header_museo desde el metodo salaExposicion() */
			// 	$background_header = 'transparent';
			// }
			// else if(!empty($Datos['bandera']) == 1){
			// 	$background_header = 'rgba(80, 73, 73, 0.8)';
			// }
			// else{
			// 	// echo "NO ESTA DECLARADA";
			// }
		?>
		<style>
			/* Se parameretriza la clase CSS segun el valor de la bandera */
			/* .Param_header{
				background-color: <?php //echo $background_header?>;
			} */
		</style>
    </head>
    <body class="body--inicio">			
		<header class="header header--museo Param_header" id="Header">
			
			<!-- ICONO HAMBURGUESA -->	
			<div style="margin-right: 20%;"> 
				<img class="header--menu " id="ComandoMenu" onclick="mostrarMenu()" src="<?php echo RUTA_URL . '/public/iconos/menu/outline_menu_white_24dp.png'?>"/>
			</div>
			
			<!-- BARRA DE NAVEGACION -->
			<div>
				<nav class="header__menuResponsive" id="MenuResponsive" >
					<div class="header--scroll-snap">
						<div class="header--nav">
							<ul id="MenuContenedor">
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Inicio_C';?>" rel="noopener noreferrer">Inicio</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>" rel="noopener noreferrer">Noticias</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/YaracuyEnVideo_C';?>" rel="noopener noreferrer">Yaracuy en videos</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Efemeride_C';?>" rel="noopener noreferrer">Efemérides</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Agenda_C';?>" rel="noopener noreferrer">Agenda de eventos</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Clasificados_C';?>" rel="noopener noreferrer">Clasificados</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Publicidad_C';?>" rel="noopener noreferrer">Directorio comercial</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Obituario_C';?>" rel="noopener noreferrer">Obituario</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>" rel="noopener noreferrer">Tarifas</a></li>
								<li><a class="header__li--Enlaces" href="https://yaracultura.blogspot.com/" target="_blank" rel="noopener noreferrer">Blog Yaracultura</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Contraloria_C';?>" rel="noopener noreferrer">Contraloría social</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/GaleriaArte_C';?>">Galeria de arte</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/NA,NA';?>" rel="noopener noreferrer">Abrir sesión</a></li>
								<li><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/PodCast_C';?>" rel="noopener noreferrer">PodCast</a></li>
								<li class=""><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/SinID_Noticia,SinBandera';?>" rel="noopener noreferrer">Iniciar sesión</a></li>
								
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Contraloria_C';?>" rel="noopener noreferrer">Contraloria social</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>" rel="noopener noreferrer">Suscribirse</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/VitrinaMayorista_C';?>">Editorial</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Pod Cast</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Directorio</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Ciudades_C';?>" rel="noopener noreferrer">Agenda</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Archivo</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Galeria de arte</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Contraloria social</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Efemerides</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>">Turismo</a></li>
								<!-- <hr> -->
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">Nuestro ADN</a></li>
								<li class="Default_ocultar"><a class="header__li--Enlaces" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>" rel="noopener noreferrer">LOGOS REDES SOCIALES</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>

			<!-- MEMBRETE FIJO -->
			<div>
				<label class="header__titulo" style="color: white; margin-top: -2%" id="MembreteFitjo">Museo Carmelo Fernandez</label>
            	<small class="small_3">San Felipe - Yaracuy</small>
			</div>

			<!-- SIGUENOS REDES SOCIALES -->
            <!-- <div class="" style="display:flex; background-color:red; width: 10%"> -->
                <!-- FACEBOOK -->
                <!-- <div class="">
                    <img class="" alt="facebook" src="<?php echo RUTA_URL?>/public/images/facebook.png"/>
                </div>         -->
                
                <!-- TWITTER -->
                <!-- <div class="">
					<img class="" alt="twitter" src="<?php echo RUTA_URL?>/public/images/twitter.png"/>
                </div>      -->
                
                <!-- E-MAIL -->
                <!-- <div class="">
					<img style="" alt="correo" src="<?php echo RUTA_URL . '/public/iconos/correo/outline_email_black_24dp.png'?>"/>
                </div>     -->
                
                <!-- INSTAGRAM -->
                <!-- <div class=" ">
					<img class="" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/>
                </div>     -->
                <!-- <div>
                    <p style="text-align: center; font-size: 0.7em">visita nuestras redes sociales</p>
                </div> -->
            <!-- </div> -->
			
			<!-- ICONO SUB MENU -->
			<div style="margin-left: 20%;" onclick="Expandir_SubMenu()">
				<img class=" Default_pointer" src="<?php echo RUTA_URL . '/public/iconos/menu/outline_more_vert_white_24dp.png'?>" id="IconoExpandir"/>
			</div>

			<!-- MENU SECUNDARIO --> 
			<div class="cont_museo--menuSecundario borde_1" id="MenuSecundario">  
				<a class="MenuSec_JS" style="color: black; display: block; margin-bottom: 5%; font-family:'Moon Dance', cursive; font-size: 2vw; text-align: center;" href="<?php echo RUTA_URL . '/Museo_C';?>">Museo Carmelo Fernandez</a> 

				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style=" margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/museo/outline_attractions_black_24dp.png'?>"/> -->
					<a class=" Default_font--black cont_museo--label" href="#Sala_1" onclick="cambiaColor('Sala_1')">Sala 1</a>
				</div>

				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/pintor/outline_palette_black_24dp.png'?>"/> -->
					<a class=" Default_font--black cont_museo--label" href="#Sala_2" onclick="cambiaColor('Sala_2')">Sala 2</a>
				</div>
						
				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_perm_identity_black_24dp.png'?>"/> -->
					<a class=" Default_font--black cont_museo--label" href="#Sala_3" onclick="cambiaColor('Sala_3')">Sala 3</a>
				</div>

				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/listado/outline_fact_check_black_24dp.png'?>"/> -->
					<a class=" Default_font--black cont_museo--label" href="#Sala_4" onclick="cambiaColor('Sala_4')">Sala 4</a>
				</div>              

				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/telefono/outline_phone_iphone_black_24dp.png'?>"/> -->
					<a class=" Default_font--black cont_museo--label" href="#">Artista emergente</a>
				</div>             

				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/telefono/outline_phone_iphone_black_24dp.png'?>"/> -->
					<a class=" Default_font--black cont_museo--label" href="#">Colección institucional</a>
				</div>           

				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/telefono/outline_phone_iphone_black_24dp.png'?>"/> -->
					<a class=" Default_font--black cont_museo--label" href="#">Patio central</a>
				</div>            

				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/telefono/outline_phone_iphone_black_24dp.png'?>"/> -->
					<a class=" Default_font--black cont_museo--label" href="#">Exposición espacio exterior</a>
				</div>            

				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/telefono/outline_phone_iphone_black_24dp.png'?>"/> -->
					<a class=" Default_font--black cont_museo--label" href="#">Calendario de eventos</a>
				</div>         
				<hr class="hr_3" style="margin-left: 5%;">
				<div class="cont_detalle_Producto--suscriptor">
					<!-- <img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/telefono/outline_phone_iphone_black_24dp.png'?>"/> -->
					<a class="Default_font--black cont_museo--label" href="<?php echo RUTA_URL . '/GaleriaArte_C';?>">Galeria de arte</a>
				</div>          
			</div>
		</header>
		
		<!-- MEMBRETE DESPLAZANTE -->
		<div class="tapa-logo" id="Tapa_Logo">
			<!-- NUESTRO ADN-->			            
			<a class="tapa-logo--ADN--font Default_quitarMovil" href="<?php echo RUTA_URL . '/Menu_C/nuestroADN';?>">
				<div class="tapa-logo--ADN">
					<img style="width: 2em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_groups_white_24dp.png'?>" rel="noopener noreferrer"/>Nuestro ADN
				</div>
			</a>
			
			<div style="position: absolute; bottom: 0pt">

				<!-- MEMBRETE DESPLAZANTE -->
				<span class="tapa-logo--font">Noticiero Yaracuy</span>
				
				<!-- MAPA -->
				<figure class="tapa-logo--mapa Default_pointer">
					<img id="Abrir" src="<?php echo RUTA_URL . '/public/images/Mapa-Venezuela-yaracuy.png'?>"/>
				</figure>
			</div>

			<!--CARITA FUERA DE HEADER-->
			<div class="carita">
				<!-- CARITA -->
				<?php
				if(!empty($_SESSION['ID_Suscriptor'])){	?>     
					<a class="tapa-logo--ADN--font Default_quitarMovil" href="<?php echo RUTA_URL . '/Suscriptor_C/accesoSuscriptor/' . $_SESSION['ID_Suscriptor'];?>;?>">
						<div class="tapa-logo--ADN">
							<img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_account_circle_white_24dp.png'?>" rel="noopener noreferrer"/>Sesión 
						</div>
					</a>
					
					<a class="carita--texto Default_quitarEscritorio" href="<?php echo RUTA_URL . '/Suscriptor_C/accesoSuscriptor/' . $_SESSION['ID_Suscriptor'];?>">Sesión <img class="Default_login--movil"  style=" margin-right: 10px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_account_circle_white_24dp.png'?>"/>Sesión</a>				
					<?php
				}	
				else if(empty($_SESSION['ID_Suscriptor']) AND empty($_SESSION['ID_Periodista'])){	?>     
					<a class="tapa-logo--ADN--font Default_quitarMovil" href="<?php echo RUTA_URL . '/Login_C/index/SinID_Noticia,SinBandera';?>">
						<div class="tapa-logo--ADN">
							<img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_no_accounts_white_24dp.png'?>" rel="noopener noreferrer"/>Sesión 
						</div>
					</a>
					
					<a class="carita--texto Default_quitarEscritorio" href="<?php echo RUTA_URL . '/Login_C/index/SinID_Noticia,SinBandera';?>" rel="noopener noreferrer"><img class="Default_logout--movil" style=" margin-right: 10px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_no_accounts_white_24dp.png'?>"/> Sesión</a>
					<?php
				}				
				else if(!empty($_SESSION['ID_Periodista'])){	?>
									
					<a class="tapa-logo--ADN--font Default_quitarMovil" href="<?php echo RUTA_URL . '/Panel_C/portadas';?>">
						<div class="tapa-logo--ADN">
							<img style="margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_account_circle_white_24dp.png'?>" rel="noopener noreferrer"/>Sesión 
						</div>
					</a>

					<a class="carita--texto Default_quitarEscritorio" href="<?php echo RUTA_URL . '/Panel_C/portadas'?>"><img class="Default_login--movil" style=" margin-right: 10px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_account_circle_white_24dp.png'?>"/> Sesión</a>				
					<?php
				}	
					?>

				<!-- NUESTRO ADN-->			            
				<a class="Default_quitarEscritorio" style=" color: white; " href="<?php echo RUTA_URL . '/Menu_C/nuestroADN';?>">
					<div class="tapa-logo--ADN" style="margin-left: -10px; margin-top: 12px">
						<img style="width: 2em; margin-lef:0px; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_groups_white_24dp.png'?>" rel="noopener noreferrer"/>Nuestro ADN
					</div>
				</a>
			</div>
		</div>
		
		<!-- FULLSCREEM -->
		<div class="Default_ocultar" id="Miimagen">			
			<!-- ICONO CERRAR -->
			<a href="<?php echo RUTA_URL;?>/Noticias_C/NoticiasGenerales"><img class="cont_modal--cerrar Default_pointer" style="width: 1em;" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"/></a>

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