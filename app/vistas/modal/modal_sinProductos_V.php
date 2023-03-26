
<!-- Cargada desde CuentaCOmerciante_C/Productos -->

<section class="sectionModal">
    <!-- ICONO CERRAR -->        
    <img class="Default_pointer" style="width: 2em;" id="CerrarVentana" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>" onclick="history.go(-1); return false;"/>

    <div class="contenedor_24 contenedor_24--Width-90">
        <h1 class="h1_1 h1_4 bandaAlerta">No hay productos cargados en tu cuenta.</h1>
        <br>
        <br><br>
        <a class="label_21 boton boton--largo" href="<?php echo RUTA_URL . '/CuentaComerciante_C/Publicar/';?>">Cargar producto</a>
    </div>
</section>