<!-- Cargada desde Panel_Clasificados_C/Productos -->

<section class="sectionModal sectionModal--sinProducto">

    <!-- ICONO CERRAR -->   
    <img class="cont_modal--cerrar  Default_pointer" style="width: 1em; z-index:2" id="Cerrar" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>" onclick="history.go(-1); return false;"/>

    <div class="contenedor_24 contenedor_24--widt">
        <h1 class="h1_1 h1_1--fontZise bandaAlerta">Añada sus datos comerciales.</h1>
        <br>

        <div class="contBoton">
            <a class="boton" href="<?php echo RUTA_URL . '/Suscriptor_C/perfil_dashboard/' . $Datos['ID_Suscriptor']?>">Completar perfil</a>
        </div>
    </div>
</section>