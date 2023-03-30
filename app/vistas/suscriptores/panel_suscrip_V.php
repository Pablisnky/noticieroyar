
<div class="cont_panel--menu cont_panel--suscrip">
    <div class="cont_panel--div-1"> 
        <h1 class="ContenedorTitulo--h2_1"><?php echo $Datos["nombre"] . " ". $Datos["apellido"]?></h1>
        <h2 class=""><?php echo $Datos["Pseudonimmo"]?></h2>
        <h3 class=""><?php echo $Datos["telefono"]?></h2>
    </div>          
    
    <ul class="cont_panel--ul">
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/Suscriptor_C/dashboard">Inicio</a></li>
        <li><a class="cont_panel--li" href="#">Comentarios</a></li>
        <li><a class="cont_panel--li" href="#" rel="noopener noreferrer">Denuncias</a></li>
        <li><a class="cont_panel--li" href="#" rel="noopener noreferrer">Noticias guardadas</a></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/CuentaComerciante_C/Productos" rel="noopener noreferrer">Clasificados</a></li>

        <li><hr style="margin: 2%"></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/CerrarSesion_C" rel="noopener noreferrer">Cerrar sesión</a></li>
    </ul>
</div>
     