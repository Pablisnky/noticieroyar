    <!-- EXPLICACION PWA -->
    <!-- <div class="contenedor_98 contenedor_98--inicio" id="Aplicacion_PWA">
        <div>
            <h3 class="footer__h3 footer__h3--inicio">APLICACIÓN</h3>
            <h3 class="footer__h3 footer__h3--inicio">MULTIPLATAFORMA</h3>
        </div>
        <img class="imagen_5 imagen_5--inicio" alt="Logo PWA" src="<?php //echo RUTA_URL;?>/public/images/PWA.png"/>
    </div> -->
    
	<div class="cont_efemerides" id="cont_efemerides">
        <h1 class="h1--principal">Efemeride</h1>
        <?php
        foreach($Datos['efemerideHoy'] as $Key) :  ?>

                <!-- IMAGEN -->
                <div class="">                        
                    <figure>
                        <img class="cont_efemerides--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['Nombre_imagen'];?>"/> 
                    </figure>
                </div>

                <!-- TITULO -->
                <div class="">                   
                    <h2 class="h2--efemerides"><?php echo $Key['titulo'];?></h2>
                </div>
                
                <!-- CONTENIDO -->
                <div class="cont_efemerides--contenido">
                    <p class="p--efemerides"><?php echo $Key['contenido'];?></p>
                </div>
            <?php
        endforeach; ?>
	</div>  

    <!-- BOTONES DEL PANEL FRONTAL -->
    <div class="cont_portada--botones">
        <div>
            <label class="boton boton--corto"><a class="Default_font--white" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
        </div>         
    </div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>