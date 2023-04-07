<!-- Cargada desde CuentaComerciante_C/Productos -->

<section class="sectionModal sectionModal--sinProducto">

    <!-- ICONO CERRAR -->   
    <img class="cont_modal--cerrar  Default_pointer" style="width: 1em; z-index:2" id="Cerrar" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>" onclick="history.go(-1); return false;"/>

    <?php 
    if($Datos == 'SinDatosComerciales'){   ?>
        <div class="contenedor_24 contenedor_24--widt">
            <h1 class="h1_1 h1_1--fontZise bandaAlerta">Añada sus datos comerciales.</h1>
            <br>
            <form action="../CuentaComerciante_C/recibeNombreComercial" method="POST"  autocomplete="off" onsubmit="return validarNombreCOmercial()">

                <label class="login_cont--label default_bold">Nombre comercial</label>
                <input class="login_cont--input borde--input" type="text" name="nombreComercial"/>
                
                <label class="login_cont--label default_bold">Telefono</label>
                <input class="login_cont--input borde--input" type="text" name="telefono"/>

                <label class="login_cont--label default_bold">Formas de pago</label>
                <div class="contInputRadio contInputRadio--SinProductos"> 
                    <div class="contInputRadio--SinProductos-float-L">
                        <input class="diaSemanaMan_JS" type="checkbox" name="tranferencia" id="Tranferencia" value="Tranferencia"/>
                        <label class="contInputRadio__label" for="Tranferencia">Tranferencia bancaria</label>
                        <br class="br_1"/>
                        <input class="diaSemanaMan_JS" type="checkbox" name="pago_movil" id="Pago_movil" value="Pago_movil"/>
                        <label class="contInputRadio__label" for="Pago_movil">Pago movil</label>
                        <br class="br_1"/>
                        <input class="diaSemanaMan_JS" type="checkbox" name="reserve" id="Reserve" value="Reserve"/>
                        <label class="contInputRadio__label" for="Reserve">Reserve</label>
                        <br class="br_1"/>
                        <input class="diaSemanaMan_JS" type="checkbox" name="paypal" id="Paypal" value="Paypal"/>
                        <label class="contInputRadio__label" for="Paypal">Paypal</label>
                    </div>
                    <div class="contInputRadio--SinProductos-float-R">
                        <input class="diaSemanaMan_JS" type="checkbox" name="zelle" id="Zelle" value="Zelle"/>
                        <label class="contInputRadio__label" for="Zelle">Zelle</label>  
                        <br class="br_1"/>  
                        <input class="diaSemanaMan_JS" type="checkbox" name="efectivo_Bs" id="Efectivo_Bs" value="efectivo_Bs"/>
                        <label class="contInputRadio__label" for="Efectivo_Bs">En destino (efectivo Bs.)</label>  
                        <br class="br_1"/>  
                        <input class="diaSemanaMan_JS" type="checkbox" name="efectivo_dol" id="Efectivo_Dol" value="efectivo_dol"/>
                        <label class="contInputRadio__label" for="Efectivo_$">En destino (efectivo $)</label>  
                        <br class="br_1"/>  
                        <input class="diaSemanaMan_JS" type="checkbox" name="acordado" id="Acordado" value="acordado"/>
                        <label class="contInputRadio__label" for="Acordado">Acordado con vendedor</label> 
                    </div> 
                </div>                

                <label class="login_cont--label default_bold">Municipio</label>
                <select class="select_2 select_2--SinProductos borde_1" id="Municipio" name="municipio" onchange="SeleccionarParroquia(this.form)">
                    <option></option>
                    <option>Aristides Bastidas</option>
                    <option>Bolivar</option>
                    <option>Bruzual</option>
                    <option>Cocorote</option>
                    <option>Independencia</option>
                    <option>Jose Antonio Paez</option>
                    <option>La Trinidad</option>
                    <option>Manuel Monge</option>
                    <option>Nirgua</option>
                    <option>Peña</option>
                    <option>San Felipe</option>
                    <option>Sucre</option>
                    <option>Urachiche</option>
                    <option>Veroes</option>
                </select>
                
                <label class="login_cont--label default_bold">Parroquia</label>
                <select class="select_2 select_2--SinProductos borde_1" id="Parroquia" name="parroquia">
                    <option></option>
                </select>
                
                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <div class="contBoton">  
                    <input class="boton" type="submit" value="Enviar"/>
                </div>  
            </form>
        </div>
        <?php
    }  
    // else if($Datos == 'SinProductos'){ ?>
        <!-- <div class="contenedor_24 contenedor_24--widt">
            <h1 class="h1_1 h1_1--fontZise bandaAlerta">Aun no tienes cargado ningun producto.</h1>
            <br>
            <a class="boton boton--largo" style="margin: auto;" href="<?php echo RUTA_URL . '/CuentaComerciante_C/Publicar/';?>">Cargar producto</a>
        </div> -->
        <?php
    // }   ?>
</section>


<script src="<?php echo RUTA_URL . '/public/javascript/parroquias.js?v=' . rand();?>"></script>  