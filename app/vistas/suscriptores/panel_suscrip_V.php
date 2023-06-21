<!-- MENU LATERAL -->

<div class="cont_panel--menu" id="MenuResponsive">
    <div class="cont_panel--div-1">
        <h1 class="cont_panel--h"><?php //echo $Datos["nombre"] . " ". $Datos["apellido"]?></h1>
    </div>          
    
    <ul class="cont_panel--ul">
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/Suscriptor_C/accesoSuscriptor/<?php echo 
            $_SESSION['ID_Suscriptor']?>">Inicio</a></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/Panel_Artista_C/index/<?php echo 
            $_SESSION['ID_Suscriptor']?>" rel="noopener noreferrer">Obras de arte</a></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/Panel_Denuncias_C/index/<?php echo 
            $_SESSION['ID_Suscriptor']?>" rel="noopener noreferrer">Denuncias</a></li>
        <li><a class="cont_panel--li" href="#" rel="noopener noreferrer">Noticias</a></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/Panel_Clasificados_C/Productos/<?php echo 
            $_SESSION['ID_Suscriptor']?>" rel="noopener noreferrer">Clasificados</a></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/Suscriptor_C/perfil_suscriptor/<?php echo $_SESSION['ID_Suscriptor']?>" rel="noopener noreferrer">Perfil</a></li>

        <li><hr class="hr--panel"></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/CerrarSesion_C" rel="noopener noreferrer">Cerrar sesión</a></li>
    </ul>

    <!-- MEMBRETE DESPLAZANTE -->
    <div class="tapa-logo" id="Tapa_Logo">
        <label class="tapa-logo--font">Noticiero Yaracuy</label>
    </div>
</div>