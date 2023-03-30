<!-- Cargada desde CuentaComerciante_C/Productos -->

<section class="sectionModal">

    <!-- ICONO CERRAR -->   
    <img class="cont_modal--cerrar  Default_pointer" style="width: 1em; z-index:2" id="Cerrar" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>" onclick="history.go(-1); return false;"/>

    <?php 
    if($Datos == 'SinDatosComerciales'){   ?>
        <div class="contenedor_24 contenedor_24--widt">
            <h1 class="h1_1 h1_1--fontZise bandaAlerta">Añada sus datos comerciales.</h1>
            <br>
            <form action="../CuentaComerciante_C/recibeNombreComercial" method="POST"  autocomplete="off" onsubmit="return validarNombreCOmercial()">
                <input class="input_4" type="text" name="nombreComercial" placeholder="Nombre comercial"/>
                <input class="input_4" type="text" name="telefono" placeholder="Telefono"/>
                
                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <div class="contBoton">  
                    <input class="boton" type="submit" value="Iniciar"/>
                </div>  
                <!-- <a class="boton boton--largo" style="margin: auto;" href="<?php //echo RUTA_URL . '/CuentaComerciante_C/Publicar/';?>">Cargar producto</a> -->
            </form>
        </div>
        <?php
    }  
    else if($Datos == 'SinProductos'){ ?>
        <div class="contenedor_24 contenedor_24--widt">
            <h1 class="h1_1 h1_1--fontZise bandaAlerta">Aun no tienes cargado ningun producto.</h1>
            <br>
            <a class="boton boton--largo" style="margin: auto;" href="<?php echo RUTA_URL . '/CuentaComerciante_C/Publicar/';?>">Cargar producto</a>
        </div>
        <?php
    }   ?>
</section>