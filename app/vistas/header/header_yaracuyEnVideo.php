<!DOCTYPE html>
<html lang="es">
    <head>
        <title>NoticieroYaracuy</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
        <!-- Browser Color - Chrome, Firefox OS, Opera -->
        <meta name="theme-color" content="black"> 
        <!-- Browser Color - Windows Phone -->
        <meta name="msapplication-navbutton-color" content="black"> 
        <!-- Browser Color - iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- ETIQUETAS OPEN-GRAPH para ayudar a la red social de turno a identificar mejor qué hay en un recurso de nuestra web que alguien está compartiendo -->
		<meta property="og:title" content="www.noticieroyaracuy.com"/>
		<meta property="og:description" content="Yaracuy en video"/>
		<meta property="og:type" content="website"/>
		<meta property="og:site_name" content="NoticieroYaracuy"/>
		<meta property="fb:app_id" content="928977633900253"/>
		<meta property="og:image:alt" content="Imagen descriptiva del video"/>
		<meta property="og:url" content="<?php echo RUTA_URL?>/YaracuyEnVideo_C/redesSociales/<?php echo $Datos['yaracuyVideo']['ID_YaracuyEnVideo'];?>"/>
		<meta property="og:image:secure_url" itemprop="image" content="<?php echo RUTA_URL?>/public/video/video.png"/>
		<meta property="og:image:width" content="1200"/>
		<meta property="og:image:height" content="630"/>
		<meta property="og:locale:alternate" content="es_ES"/>
		
		<!--ETIQUETAS META TWITTER --> 
		<meta name="twitter:card" content="summary_large_image">
		<meta name='twitter:image' content='<?php echo RUTA_URL?>/public/video/video.png'>
		        
		<!-- WHATSAPP -->
		<!-- Fotos mayores a 300 kb no seran mostradas en la miniatura al compartir la noticia -->

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/estilosNoticieroYaracuy.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_350.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_370.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosNoticieroYaracuy_800.css?v=<?php echo rand();?>"/>
				
		<!-- CDN FUENTES DE GOOGLE-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Gruppo'>
    </head>
    <body>		

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->