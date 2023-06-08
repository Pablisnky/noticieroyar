<!-- MENU LATERAL -->
<?php
if($_SESSION["ID_Periodista"] == 1){  ?>

    <div class="cont_panel--menu"  id="MenuResponsive">
        <a class="h_2 bordeAlerta" href="<?php echo RUTA_URL?>/Panel_C/perfilPeriodista/<?php echo $_SESSION['ID_Periodista']?>"><?php echo $_SESSION["nombreSuscriptor"] . ' '  . $_SESSION["apellidoSuscriptor"];?></a>
        
        <ul class="cont_panel--ul">
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/agregar_noticia">Agregar noticia</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/portadas" rel="noopener noreferrer">Noticias en portada</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/Not_Generales" rel="noopener noreferrer">Noticias generales</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/yaracuyEnVdeo">Yaracuy en video</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/efemerides">Efemerides</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL . '/Panel_C/agenda/' . $_SESSION["ID_Periodista"]?>">Agenda</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/obituario">Obituario</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/publicidad">Publicidad</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/galeria">Galeria de arte</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/Inicio_C">Sitio web</a></li>
            <li><hr style="margin: 2%; width: 60%"></li>
            <li><label class="cont_panel--li Default_pointer" onclick="cerrarSecion()">Cerrar sesión</label></li>
        </ul>
        
        <!-- MEMBRETE DESPLAZANTE -->
        <!-- <div class="tapa-logo " id="Tapa_Logo">
            <label class="tapa-logo--font Default_quitarMovil">Noticiero Yaracuy</label>
        </div> -->
    </div>
    <?php
}
else{   ?>
    <div class="cont_panel--menu"  id="MenuResponsive">
        <a class="h_2 bordeAlerta" href="<?php echo RUTA_URL?>/Panel_C/perfilPeriodista/<?php echo $_SESSION['ID_Periodista']?>"><?php echo $_SESSION["nombreSuscriptor"] . ' '  . $_SESSION["apellidoSuscriptor"];?></a>
        
                
        <ul class="cont_panel--ul">
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/agregar_noticia">Agregar noticia</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/portadas" rel="noopener noreferrer">Noticias en portada</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/Not_Generales" rel="noopener noreferrer">Noticias generales</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL . '/Panel_C/agenda/' . $_SESSION["ID_Periodista"]?>">Agenda de eventos</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Panel_C/publicidad">Publicidad</a></li>
            <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/Inicio_C">Sitio web</a></li>
            <li><hr style="margin: 2%; width: 60%"></li>
            <li><p class="cont_panel--li Default_pointer" onclick = "cerrarSecion()">Cerrar sesión</p></li>
        </ul>
    </div>
    <?php
}   ?>