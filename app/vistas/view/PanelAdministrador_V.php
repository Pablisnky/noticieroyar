<!-- MENU LATERAL -->
<?php
if($_SESSION["ID_Periodista"] == 1){  ?>

    <div class="cont_panel--menu"  id="MenuResponsive">
        <h2 class="h_2 bordeAlerta"><?php echo $_SESSION["nombreSuscriptor"] . ' '  . $_SESSION["apellidoSuscriptor"];  ?></h2>
        
        <ul class="cont_panel--ul">
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/agregar_noticia">Agregar noticia</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/portadas" rel="noopener noreferrer">Noticias en portada</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/Not_Generales" rel="noopener noreferrer">Noticias generales</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/yaracuyEnVdeo">Yaracuy en video</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/efemerides">Efemerides</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/agenda">Agenda</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/obituario">Obituario</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/publicidad">Anuncios</a></li>
            <!-- <li><a class="cont_panel--li" href="<?php //echo RUTA_URL?>/Panel_C/coleccion">Colecciones</a></li> -->
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/galeria">Galeria de arte</a></li>
            <li><hr style="margin: 2%; width: 60%"></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/CerrarSesion_C">Sitio web</a></li>
        </ul>
        
        <!-- MEMBRETE DESPLAZANTE -->
        <div class="tapa-logo" id="Tapa_Logo">
            <label class="tapa-logo--font">Noticiero Yaracuy</label>
        </div>
    </div>
    <?php
}
else{   ?>
    <div class="cont_panel--menu"  id="MenuResponsive">
        <h2 class="h_2 bordeAlerta"><?php echo $_SESSION["nombreSuscriptor"] . ' '  . $_SESSION["apellidoSuscriptor"];  ?></h2>
        
                
        <ul class="cont_panel--ul">
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/agregar_noticia">Agregar noticia</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/portadas" rel="noopener noreferrer">Noticias en portada</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/Not_Generales" rel="noopener noreferrer">Noticias generales</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/agenda">Agenda de eventos</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/publicidad">Publicidad</a></li>
            <li><hr style="margin: 2%; width: 60%"></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/CerrarSesion_C">Sitio web</a></li>
        </ul>
        
        <!-- MEMBRETE DESPLAZANTE -->
        <div class="tapa-logo" id="Tapa_Logo">
            <label class="tapa-logo--font">Noticiero Yaracuy</label>
        </div>
    </div>
    <?php
}   ?>