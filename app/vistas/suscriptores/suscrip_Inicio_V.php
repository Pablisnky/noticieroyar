<!-- MENU LATERAL -->
<div class="cont_panel--menu">
    <div class="cont_panel--div-1"> 
        <h1 class="ContenedorTitulo--h2_1"><?php echo $Datos['nombre'] . " ". $Datos['apellido']?></h1>
    </div>
    <ul class="cont_panel--ul">
        <li><a class="cont_panel--li" href="#">Comentarios</a></li>
        <li><a class="cont_panel--li" href="#" rel="noopener noreferrer">Denuncias</a></li>
        <li><a class="cont_panel--li" href="#" rel="noopener noreferrer">Noticias guardadas</a></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL?>/Inicio_C" rel="noopener noreferrer">Inicio</a></li>

        <li><hr style="margin: 2%"></li>
        <li><a class="cont_panel--li" href="<?php echo RUTA_URL;?>/CerrarSesion_C">Cerrar sesión</a></li>
    </ul>
</div>
    
<div  style="margin-top: 7%; margin-left: 20%;"> 
    <p>Aqui encontraras los registros de tu actividad dentro de la plataforma:</p>
    <ul>
        <li>Denuncias realizadas</li>
        <li>Comentarios emitidos</li>
        <li>Noticias guardadas</li>
        <li>Contratar servicio de directorio y publicidad</li>
    </ul>
    <p>entre otras funcionalidades que iremos anexado progresivamente</p>
</div>
     