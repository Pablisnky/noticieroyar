<!-- MENU LATERAL -->

<div class="cont_panel--menu" id="MenuResponsive">
    <div class="cont_panel--div-1"> 
        <h1 class="cont_panel--h"><?php echo $Datos["nombre"] . " ". $Datos["apellido"]?></h1>
    </div>          
    
    <ul class="cont_panel--ul">
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/CuentaComerciante_C/dashboard">Inicio</a></li>
        <li><a class="cont_panel--li" href="#">Comentarios</a></li>
        <li><a class="cont_panel--li" href="#" rel="noopener noreferrer">Denuncias</a></li>
        <li><a class="cont_panel--li" href="#" rel="noopener noreferrer">Noticias</a></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/CuentaComerciante_C/Productos" rel="noopener noreferrer">Clasificados</a></li>

        <li><hr class="hr--panel"></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/CerrarSesion_C" rel="noopener noreferrer">Cerrar sesión</a></li>
    </ul>
    
    <!-- MEMBRETE DESPLAZANTE -->
    <div class="tapa-logo" id="Tapa_Logo">
        <label class="tapa-logo--font">Noticiero Yaracuy</label>
    </div>
</div>
		
