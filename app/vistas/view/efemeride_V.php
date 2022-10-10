    <!-- EXPLICACION PWA -->
    <!-- <div class="contenedor_98 contenedor_98--inicio" id="Aplicacion_PWA">
        <div>
            <h3 class="footer__h3 footer__h3--inicio">APLICACIÓN</h3>
            <h3 class="footer__h3 footer__h3--inicio">MULTIPLATAFORMA</h3>
        </div>
        <img class="imagen_5 imagen_5--inicio" alt="Logo PWA" src="<?php echo RUTA_URL;?>/public/images/PWA.png"/>
    </div> -->
    
	<div class="cont_portada" id="Cont_Portada">
        <h1 class="H1--efemeride">Efemeride</h1>
        <?php
        foreach($Datos['efemerideHoy'] as $Key) :  ?>
            <div class="cont_portada--noticia" id="cont_Portada_JS">
                <!-- IMAGEN NOTICIA  -->
                <div class="cont_portada--imagen">                        
                    <figure>
                        <img class="imagen--portada" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['Nombre_imagen'];?>"/> 
                    </figure>
                </div>

                <!-- TITULO -->
                <div class="cont_portada--titular">                   
                    <h2 class="titular--texto"><?php echo $Key['titulo'];?></h2>
                </div>
                
                <!-- CONTENIDO -->
                <div class="cont_efemerides--texto columnas">
                    <p class="subtitulo"><?php echo $Key['contenido'];?></p>
                </div>
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