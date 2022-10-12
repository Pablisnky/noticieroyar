    <!-- EXPLICACION PWA -->
    <!-- <div class="contenedor_98 contenedor_98--inicio" id="Aplicacion_PWA">
        <div>
            <h3 class="footer__h3 footer__h3--inicio">APLICACIÓN</h3>
            <h3 class="footer__h3 footer__h3--inicio">MULTIPLATAFORMA</h3>
        </div>
        <img class="imagen_5 imagen_5--inicio" alt="Logo PWA" src="<?php //echo RUTA_URL;?>/public/images/PWA.png"/>
    </div> -->
    
	<div class="cont_efemerides" id="cont_efemerides">
        <!-- TITULO -->
        <h1 class="h1--principal"><?php echo $Datos['detalleNoticia'][0]['titulo']?></h1> 

        <div style="display: flex; align-items: center; margin-top: 2%"> 
            <!-- IMAGEN -->
            <div style="width: 50%">
                <figure>
                    <img class="cont_efemerides--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['detalleNoticia'][0]['nombre_imagenNoticia'];?>"/> 
                </figure>
            </div>
                
            <!-- RESUMEN -->
            <div style=" width: 40%; margin: auto; text-align: center;">
                <p style="font-size: 1.4em;"><?php echo $Datos['detalleNoticia'][0]['subtitulo']?></p>
            </div>
        </div>

        <!-- CONTENIDO -->
        <div class="cont_portada--texto columnas">
            <p  style="font-size: 1.2em; line-height: 30px;margin-top: 2%"><?php echo $Datos['detalleNoticia'][0]['contenido']?></p>
        </div>

    <!-- BOTONES DEL PANEL FRONTAL -->
    <div class="cont_portada--botones">
        <div>
            <label class="boton boton--corto"><a class="Default_font--white" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
        </div>         
    </div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>