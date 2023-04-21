<?php    
    $ID_Suscriptor = $Datos['Producto']['ID_Suscriptor'];
    $Producto = $Datos['Producto']['producto'];
    $Opcion = $Datos['Producto']['opcion'];
    $PrecioBolivar = $Datos['Producto']['precioBolivar'];
    $PrecioDolar = $Datos['Producto']['precioDolar'];
    $ID_Producto = $Datos['Producto']['ID_Producto'];
    $Existencia = $Datos['Producto']['cantidad']; 
    $NombreSuscriptor = $Datos['nombreSuscriptor'];
    $ApellidoSuscriptor = $Datos['apellidoSuscriptor'];
    $TelefonoSuscriptor = $Datos['telefonoSuscriptor']; 
    $MunicipioSuscriptor = $Datos['municipioSuscriptor']; 
    $ParroquiaSuscriptor = $Datos['parroquiaSuscriptor']; 
    $PseudonimoSuscripto = $Datos['pseudonimoSuscripto']; 
    $Nuevo = $Datos['Producto']['nuevo']; 
    $Bandera = $Datos['Bandera']; 
?>
    <!-- SE CARGA EL PRELOADER -->
    <!-- <section class="preloder_tapa--total">
        <div class='preloder preloaderCentrar'></div>
    </section> -->

    <!-- ICONO REGRESAR -->    
    <?php
    if($Bandera == 'Desde_Clasificados'){   ?>
        <img class="cont_modal--cerrar  Default_pointer" style="width: 1em; position:fixed; z-index:10" id="Cerrar" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>" onclick="cerrarVentana()"/>    <?php
    }
    else{   ?>
        <img class="cont_modal--cerrar  Default_pointer" style="width: 1em; position:fixed; z-index:10" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>" onclick="cerrarVentana()"/>
        <?php
    }   ?>
    
    <section>
        <!-- MEMBRETE FIJO -->  
        <header>      
            <a class="header__titulo--detalleProducto" href="<?php echo RUTA_URL . '/Inicio_C';?>">www.NoticieroYaracuy.com</a> 
            <label class="header__subtitulo--detalleProducto">Clasificados</label>
        </header>

        <div class="contenedor_122"> 
            <div class="contGridUna">

                <!-- IMAGEN PRINCIPAL--> 
                <div class="Imagen_Principal" id="Imagen_Principal">
                    <img class="imagen_9" alt="Imagen no disponible" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $Datos['Imagenes']['nombre_img'];?>"> 
                </div>

                <!-- IMAGENES MINIATURAS -->                           
                <div class="contenedor_125">
                    <?php
                    foreach($Datos['ImagenesSec'] as $Row) : ?> 
                        <img class="imagen--miniaturas borde_1 borde_2" id="Imagen_<?php echo $Contador ?>" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $Row['nombre_img'];?>" onclick="Llamar_VerMiniatura('<?php echo $Row['ID_Imagen'] ?>')"/>
                        <?php
                    endforeach;
                    ?>
                </div>

                <div class="cont_detalle_Producto--precio">
                    <h1 class="h1_1 h1_1--margin font--bold"><?php echo $Producto?></h1>
                    <h3 class="h1_11 font--center"><?php echo $Opcion?></h3>
                </div>

                <div class="cont_precio">
                    <label class="label_22 borde_1">$ <?php echo $PrecioDolar?>
                        <small class="small_2">Bs. <?php echo $PrecioBolivar?></small>
                    </label>
                </div>    
            </div>

            <!-- INFORMACION DE CONTACTO DEL VENDEDOR -->
            <div class="contGridUna">
                <div class="cont_detalle_Producto--informacion">
                    <p class="cont_detalle_Producto--p"><b>Ofertado por:</b> <?php echo $PseudonimoSuscripto?></p>
                    <div class="cont_detalle_Producto--suscriptor">
                        <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/ubicacion/outline_place_black_24dp.png'?>"/>
                        <label><?php echo $ParroquiaSuscriptor?> - <?php echo $MunicipioSuscriptor?></label>
                    </div>
                    <div class="cont_detalle_Producto--suscriptor">
                        <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_perm_identity_black_24dp.png'?>"/>
                        <label><?php echo $NombreSuscriptor?> <?php echo $ApellidoSuscriptor?></label>
                    </div>
                    <div class="cont_detalle_Producto--suscriptor">
                        <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/telefono/outline_phone_iphone_black_24dp.png'?>"/>
                        <label><?php echo $TelefonoSuscriptor?></label>
                    </div>
                    <?php
                    if($Bandera == 'Desde_Clasificados'){   ?>
                        <a class="cont_detalle_Producto--p" href="<?php echo RUTA_URL . '/Catalogos_C/index/' . $ID_Suscriptor . ',' . $PseudonimoSuscripto;?>">Ver catalogo de vendedor</a>
                        <?php
                    }   ?>
                </div>

                <div class="contenedor_15 borde_1">
        
                    <!-- FORMAS DE ENVIO Y ENTREGA-->
                    <div class="">
                        <h3 class="h3_4">Formas de envio y entrega</h3>  
                        <div class="contenedor_161">
                            <p class="p_19">Acordado con vendedor</p>
                            <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                        </div>
                    </div>

                    <!-- METODOS DE PAGO -->
                    <div class="">
                        <h3 class="h3_4">Metodos de pago aceptados</h3>    
                        <?php

                        // TRANSFERENCIA BANCARIAS
                        if($Datos['formasPago']['transferencia'] == 1){     ?>     
                            <div class="contenedor_161 contenedor_161--fijo">
                                <p class="p_19">Tranferencia bancaria</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                            </div> 
                            <?php
                        }
                        else{   ?>     
                            <div class="contenedor_161 contenedor_161--fijo">
                                <p class="p_19">Tranferencia bancaria</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                            </div> 
                            <?php
                        }

                        // PAGO MOVIL
                        if($Datos['formasPago']['pago_movil'] == 1){  ?>
                            <div class="contenedor_161">
                                <p class="p_19">Pago movil</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                            </div>
                            <?php
                        }
                        else{?>     
                            <div class="contenedor_161">
                                <p class="p_19">Pago movil</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                            </div> 
                            <?php
                        } 
                        
                        // RESERVE 
                        // $VerificarReserve = 1;//Se declara para que este definida.
                        // foreach($Datos['tiendas_reserve'] as $row) :
                        //     $ID_TiendaConReserve = $row['ID_Tienda'];
                        //     if($ID_TiendaConReserve == $ID_Tienda){  
                        //         $VerificarReserve = 'Reserve_' . $ID_Tienda; ?>
                                <!-- <div class="contenedor_161">
                                    <p class="p_19">Reserve</p>
                                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                                </div>   -->
                                <?php
                        //     }
                        // endforeach;
                        // if($VerificarReserve != 'Reserve_' . $ID_Tienda){  ?>
                            <!-- <div class="contenedor_161">
                                <p class="p_19">Reserve</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                            </div>  -->
                            <?php 
                        // }
                        
                        // PAYPAL 
                        if($Datos['formasPago']['paypal'] == 1){   ?>
                            <div class="contenedor_161">
                                <p class="p_19">Paypal</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                            </div>  
                            <?php
                        }
                        else{  ?>
                            <div class="contenedor_161">
                                <p class="p_19">Paypal</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                            </div>  
                            <?php
                        }
                        
                        // ZELLE 
                        if($Datos['formasPago']['zelle'] == 1){   ?>
                            <div class="contenedor_161">
                                <p class="p_19">Zelle</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                            </div>  
                                <?php
                        }
                        else{  ?>
                            <div class="contenedor_161">
                                <p class="p_19">Zelle</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                            </div>  
                            <?php
                        }

                        // CRIPTOMONEDA
                        if($Datos['formasPago']['criptomoneda'] == 1){  ?>
                            <div class="contenedor_161">
                                <p class="p_19">Criptomoneda</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                            </div>
                                <?php
                        }
                        else{  ?>
                            <div class="contenedor_161">
                                <p class="p_19">Criptomoneda</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                            </div> 
                            <?php 
                        }    
                                
                        // EFECTIVO BOLIVAR
                        if($Datos['formasPago']['efectivo_Bs'] == 1){  ?>
                            <div class="contenedor_161">
                                <p class="p_19">En destino (efectivo Bs.)</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                            </div>
                                <?php
                        }
                        else{  ?>
                            <div class="contenedor_161">
                                <p class="p_19">En destino (efectivo Bs.)</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                            </div> 
                            <?php 
                        }    

                        // EFECTIVO DOLAR
                        if($Datos['formasPago']['efectivo_Dol'] == 1){  ?>
                            <div class="contenedor_161">
                                <p class="p_19">En destino (efectivo $)</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                            </div>
                            <?php
                        }
                        else{  ?>
                            <div class="contenedor_161">
                                <p class="p_19">En destino (efectivo $)</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                            </div>  
                                <?php
                        }
                                
                        // ACORDADO EN TIENDA
                        if($Datos['formasPago']['acordado'] == 1){   ?>
                            <div class="contenedor_161">
                                <p class="p_19">Acordado con vendedor</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                            </div>
                                <?php
                        }
                        else{  ?>
                            <div class="contenedor_161">
                                <p class="p_19">Acordado con vendedor</p>
                                <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                            </div>  
                                <?php
                            } ?>
                    </div>
                </div>
                                
                <!-- COMPARTIR REDES SOCIALES -->
                <div class="detalle_cont--redesSociales">

                    <!-- FACEBOOK -->
                    <div class="detalle_cont--red">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Clasificados_C/productoAmpliado/<?php echo $ID_Producto;?>&text=<?php echo $Producto;?>" target="_blank"><img class="detalle_cont--redesSociales-facebook; icono--face" alt="facebook" src="<?php echo RUTA_URL?>/public/images/facebook.png"/></a>
                    </div>        

                    <!-- WHATSAPP -->
                    <div class="whatsapp detalle_cont--red">
                        <?php 
                            $Titulo = $Producto;         
                        ?>
                        <a href="whatsapp://send?text=<?php echo $Titulo?>&nbsp;<?php echo RUTA_URL?>/Clasificados_C/productoAmpliado/<?php echo $ID_Producto;?>" data-action="share/whatsapp/share"><img class="detalle_cont--redesSociales-Whatsapp icono--what" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/></a>
                    </div>            
                </div> 
            </div>
        </div>
    </section>

    <!-- CINTILLO  -->
    <p class="contenedor_34--p" id="Contenedor_34--p">Cambio oficial BCV: 1 $ = <?php echo number_format($Datos['dolarHoy'], 2, ",", ".");?> Bs.</p>
    
<script src="<?php echo RUTA_URL.'/public/javascript/A_descr_Producto.js?v=' . rand();?>"></script>
    
<script>
    //Aqui tambien se pudo usar una funcion IIEEF
    // window.onload = function (){
    //     if(document.readyState == "complete"){
    //         document.querySelector(".preloder_tapa--total").style.display = "none"
    //     }
    //     if(AlContenedor === "undefined"){
    //         console.log("AlContenedor", AlContenedor)
    //     }
    //     else{
    //         console.log("AlContenedor no definido aún")
    //     }
    // }

    // function cerrarAgregar(){   
    //     // activarBotonAgregar()Se encuentra en vitrina_V.php debido a que los manejadores de envto de opciones_V.php dependen de vitrina_V.php por ser una ventna abierta con ajax
    //     window.opener.activarBotonAgregar('<?php //echo $ID_LabelAgregar?>') 
    //     // window.opener.location.reload();        
    //     window.close()
    // }

    function cerrarVentana(){     
        window.close()
    }
</script>