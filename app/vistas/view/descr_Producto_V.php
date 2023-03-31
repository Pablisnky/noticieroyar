<?php    
    // $Datos proviene de Opciones_C/productoAmpliado
    $ID_Suscriptor = $Datos['ID_Suscriptor'];
    $Producto = $Datos['Producto'];
    $Opcion = $Datos['Opcion'];
    $PrecioBolivar = $Datos['PrecioBolivar'];
    $PrecioDolar = $Datos['PrecioDolar'];
    $ID_Producto = $Datos['ID_Producto'];
    $ID_LabelAgregar = $Datos['ID_EtiquetaAgregar'];
    $Existencia = $Datos['Existencia']; 
    $NombreSuscriptor = $Datos['Suscriptor']['nombreSuscriptor'];
    $ApellidoSuscriptor = $Datos['Suscriptor']['apellidoSuscriptor'];
    $TelefonoSuscriptor = $Datos['Suscriptor']['telefonoSuscriptor']; 
    $MunicipioSuscriptor = $Datos['Suscriptor']['municipioSuscriptor']; 
    $PseudonimoSuscripto = $Datos['Suscriptor']['pseudonimoSuscripto']; 
    $Nuevo = $Datos['Nuevo'];
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
        <img class="cont_modal--cerrar  Default_pointer" style="width: 1em; position:fixed; z-index:10" id="Cerrar" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"  onclick="history.go(-1); return false;"/>
        <?php
    }   ?>
    
    <section>
        <div class="contenedor_122"> 
            <!-- <br class="mostrar-movil"><br class="mostrar-movil"> -->
            <div class="contGridUna">

                <!-- IMAGEN PRINCIPAL -->
                <!-- <div class="contenedor_122--imagen" id="Contenedor_124">  -->
                    <img class="imagen_9 imagen_10" id="ImagenTemporal" alt="Imagen no disponible" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $Datos['Imagenes']['0']['nombre_img'];?>">           
                <!-- </div> -->
                
                 <!-- IMAGENES MINIATURAS onclick="verMiniatura('Imagen_<?php //echo $Contador ?>')"-->
                 <div class="contenedor_125">   
                    <?php                
                    // if($Datos['Imagenes'] != Array()){      
                    //     $Contador = 1;   
                        //$Datos proviene de Opciones_C/productoAmpliado                  
                        // foreach($Datos['Imagenes'] as $key) :   ?>
                            <img class="imagen_11 borde_1 borde_2" id="Imagen_<?php echo $Contador ?>" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $Datos['Imagenes']['0']['nombre_img'];?>" />
                            <?php
                            // echo  $Contador;
                    //         $Contador ++;
                    //     endforeach;
                    // }
                    ?>  
                </div>
                <!-- <br class="mostrar-movil"> -->

                <h1 class="h1_1 h1_1--margin font--bold"><?php echo $Producto?></h1>
                <h3 class="h1_11 font--center"><?php echo $Opcion?></h3>

                <div class="cont_precio">
                    <label class="label_22 borde_1">Bs. <?php echo $PrecioBolivar?>
                        <br>
                        <small class="small_2">$ <?php echo $PrecioDolar?></small>
                    </label>
                </div>    
                <!-- <p class="contOpciones--nuevo"><?php //echo $Nuevo;?></p> -->
            </div>
            <!-- <br class="mostrar-movil"> -->

            <div class="contGridUna">

                <!-- INFORMACION DE CONTACTO DEL VENDEDOR -->
                <div class="cont_detalle_Producto--informacion">
                    <p class="cont_detalle_Producto--p"><b>Ofertado por:</b> <?php echo $PseudonimoSuscripto?></p>
                    <div class="cont_detalle_Producto--suscriptor">
                        <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/ubicacion/outline_place_black_24dp.png'?>"/>
                        <label><?php echo $MunicipioSuscriptor?></label>
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
                    <!-- REPUTACION -->
                    <div class="contenedor_17">                        
                        <div>
                            <h3 class="h3_4">Reputación <span class="span_1">(Ultimos 3 meses)</span> </h3>
                        </div>
                        <div style="width: 50%; margin: 2% auto;">
                            <p class="p_2 p_18">Clientes satisfechos</p>
                                <?php
                                // if($Datos['tiendas_despachos'] == Array()){?>
                                    <label>Aún no califica</label>    <?php
                                // }
                                // else if(($Datos['tiendas_satisfaccion'][0]['ID_Tienda'] != $ID_Tienda)){    ?>
                                    <!-- <label>Aún no califica</label> -->   <?php 
                                // }
                                // else{
                                    // foreach($Datos['tiendas_satisfaccion'] as $Row) :
                                        // $ID_TiendaSatisfaccion = $Row['ID_Tienda'];
                                        // $PorcentajeSatisfaccion = $Row['Satisfaccion'];
                                        // if($ID_TiendaSatisfaccion == $ID_Tienda){ ?>              
                                            <!-- <label><?php //echo $PorcentajeSatisfaccion?> %</label> -->
                                            <?php
                                //         }
                                //     endforeach; 
                                // }   ?>
                        </div>
                        <div style="width:50%; margin: 2% auto;">
                            <p class="p_2 p_18">Pedidos entregados</p>
                            <?php 
                                // if($Datos['tiendas_despachos'] == Array()){?>
                                    <label>0</label>    
                                    <?php
                                // }
                                // else if($Datos['tiendas_satisfaccion'][0]['ID_Tienda'] != $ID_Tienda){?>
                                    <!-- <label>0</label>     -->
                                     <?php
                                // }
                                // else{
                                //     foreach($Datos['tiendas_despachos'] as $row) :
                                //         $ID_TiendaConDespachos = $row['ID_Tienda'];
                                //         $CantidadDespachos = $row['Despachos'];
                                //         if($ID_TiendaConDespachos == $ID_Tienda){   ?>                            
                                            <!-- <label><?php //echo $CantidadDespachos?></label> -->
                                            <?php
                                //         }
                                //     endforeach;
                                // }  ?>
                        </div>
                    </div>
        
                    <!-- FORMAS DE ENVIO Y ENTREGA-->
                    <div class="contenedor_17">
                        <h3 class="h3_4">Formas de envio y entrega</h3>    
                        <!-- <div class="contenedor_161">
                            <p class="p_19">Compra en línea, recoje en tienda</p>
                            <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                        </div>      -->
                        <!-- <div class="contenedor_161">
                            <p class="p_19">Despacho a domicilio</p>
                            <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                        </div>  -->
                        <div class="contenedor_161">
                            <p class="p_19">Acordado con vendedor</p>
                            <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                        </div>
                    </div>

                    <!-- METODOS DE PAGO -->
                    <div class="contenedor_163">
                        <h3 class="h3_4 h3_4--fijo">Metodos de pago aceptados</h3>    
                        <?php
                        // TRANSFERENCIA BANCARIAS
                        // $VerificarTransferencia = 1; //Se declara para que este definida.
                        // foreach($Datos['tiendas_transferencias'] as $row) :
                        //     $ID_TiendaConTransferencia = $row['ID_Tienda'];
                        //     if($ID_TiendaConTransferencia == $ID_Tienda){   
                        //         $VerificarTransferencia = 'Transferencia_' . $ID_Tienda;   ?>     
                                <div class="contenedor_161 contenedor_161--fijo">
                                    <p class="p_19">Tranferencia bancaria</p>
                                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                                </div> 
                                <?php
                            // }
                        // endforeach;
                        // if($VerificarTransferencia != 'Transferencia_' . $ID_Tienda){?>     
                            <!-- <div class="contenedor_161 contenedor_161--fijo">
                                <p class="p_19">Tranferencia bancaria</p><i class="fas fa-minus"></i>
                            </div>  -->
                            <?php
                        // }

                        // PAGO MOVIL
                        // $VerificarPagoMovil = 1;//Se declara para que este definida.
                        // foreach($Datos['tiendas_pagomovil'] as $row) :
                        //     $ID_TiendaConPagoMovil = $row['ID_Tienda'];
                        //     if($ID_TiendaConPagoMovil == $ID_Tienda){ 
                        //         $VerificarPagoMovil = 'PagoMovil_' . $ID_Tienda;  ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Pago movil</p>
                                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                                </div>
                                <?php
                        //     }
                        // endforeach;
                        // if($VerificarPagoMovil != 'PagoMovil_' . $ID_Tienda){?>     
                            <!-- <div class="contenedor_161">
                                <p class="p_19">Pago movil</p><i class="fas fa-minus"></i>
                            </div>  -->
                            <?php
                        // } 
                        
                        // RESERVE 
                        // $VerificarReserve = 1;//Se declara para que este definida.
                        // foreach($Datos['tiendas_reserve'] as $row) :
                        //     $ID_TiendaConReserve = $row['ID_Tienda'];
                        //     if($ID_TiendaConReserve == $ID_Tienda){  
                        //         $VerificarReserve = 'Reserve_' . $ID_Tienda; ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Reserve</p>
                                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                                </div>  
                                <?php
                        //     }
                        // endforeach;
                        // if($VerificarReserve != 'Reserve_' . $ID_Tienda){  ?>
                            <!-- <div class="contenedor_161">
                                <p class="p_19">Reserve</p><i class="fas fa-minus"></i>
                            </div>  -->
                            <?php 
                        // }
                        
                        // PAYPAL 
                        // $VerificarPaypal = 1;//Se declara para que este definida.
                        // foreach($Datos['tiendas_paypal'] as $row) :
                        //     $ID_TiendaConPaypal = $row['ID_Tienda'];
                        //     if($ID_TiendaConPaypal == $ID_Tienda){  
                        //         $VerificarPaypal = 'Paypal_' . $ID_Tienda; ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Paypal</p>
                                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                                </div>  
                                <?php
                            // }
                        // endforeach;
                        // if($VerificarPaypal != 'Paypal_' . $ID_Tienda){  ?>
                            <!-- <div class="contenedor_161">
                                <p class="p_19">Paypal</p><i class="fas fa-minus"></i>
                            </div>   -->
                            <?php
                        // }
                        
                        // ZELLE 
                        // $VerificarZelle = 1;//Se declara para que este definida.
                        // foreach($Datos['tiendas_zelle'] as $row) :
                        //     $ID_TiendaConZelle = $row['ID_Tienda'];
                        //     if($ID_TiendaConZelle == $ID_Tienda){  
                        //         $VerificarZelle = 'Zelle_' . $ID_Tienda; ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Zelle</p>
                                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                                </div>  
                                <?php
                        //     }
                        // endforeach;
                        // if($VerificarZelle != 'Zelle_' . $ID_Tienda){  ?>
                            <!-- <div class="contenedor_161">
                                <p class="p_19">Zelle</p><i class="fas fa-minus"></i>
                            </div>   -->
                            <?php
                        // }
                            
                        // EFECTIVO BOLIVAR
                        // foreach($Datos['tiendasOtrosPagos'] as $row) :
                        //     $ID_TiendaConPagoBolivar = $row['ID_Tienda'];
                        //     $PagoBolivar = $row['efectivoBolivar'];
                        //     if($ID_TiendaConPagoBolivar ==  $ID_Tienda && $PagoBolivar == 1){  
                        //         $VerificaPagoBolivar = true ?>
                                <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo Bs.)</p>
                                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_close_black_24dp.png'?>"/>
                                </div>
                                <?php
                            // }
                            // else if($ID_TiendaConPagoBolivar == $ID_Tienda && $PagoBolivar == 0){  ?>
                                <!-- <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo Bs.)</p><i class="fas fa-minus"></i>
                                </div> --> 
                                <?php 
                            // }
                        // endforeach;     
                                
                        // EFECTIVO DOLAR
                        // foreach($Datos['tiendasOtrosPagos'] as $row) :
                        //     $ID_TiendaConPagoDolar = $row['ID_Tienda'];
                        //     $PagoDolar = $row['efectivoDolar'];
                        //     if($ID_TiendaConPagoDolar == $ID_Tienda && $PagoDolar == 1){  ?>
                                <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo $)</p>
                                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/check/outline_done_black_24dp.png'?>"/>
                                </div>
                                <?php
                            // }
                            // else if($ID_TiendaConPagoDolar == $ID_Tienda && $PagoDolar == 0){  ?>
                                <!-- <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo $)</p><i class="fas fa-minus"></i>
                                </div>   -->
                                <?php
                        //     }
                        // endforeach; 
                                
                        // ACORDADO EN TIENDA
                        // foreach($Datos['tiendasOtrosPagos'] as $row_2) :
                        //     $ID_TiendaConPagoAcordado = $row_2['ID_Tienda'];
                        //     $PagoAcordado = $row_2['acordado'];
                        //     if($ID_TiendaConPagoAcordado == $ID_Tienda && $PagoAcordado == 1){   ?>
                                <!-- <div class="contenedor_161">
                                    <p class="p_19">Acordado con tienda</p><i class="fas fa-check"></i>
                                </div> -->
                                <?php
                            // }
                            // else if($ID_TiendaConPagoAcordado == $ID_Tienda && $PagoAcordado == 0){  ?>
                                <!-- <div class="contenedor_161">
                                    <p class="p_19">Acordado con tienda</p><i class="fas fa-minus"></i>
                                </div>   -->
                                <?php
                        //     }
                        // endforeach; ?>
                    </div>
                </div>
                                
                <!-- COMPARTIR REDES SOCIALES -->
                <div class="detalle_cont--redesSociales">

                    <!-- FACEBOOK -->
                    <div class="detalle_cont--red">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Clasificados_C/productoAmpliado/<?php echo $Datos['ID_Producto'];?>&text=<?php echo $Producto;?>" target="_blank"><img class="detalle_cont--redesSociales-facebook; icono--face" alt="facebook" src="<?php echo RUTA_URL?>/public/images/facebook.png"/></a>
                    </div>        

                    <!-- WHATSAPP -->
                    <div class="whatsapp detalle_cont--red">
                        <?php 
                            $Titulo = $Producto;         
                        ?>
                        <a href="whatsapp://send?text=<?php echo $Titulo?>&nbsp;<?php echo RUTA_URL?>/Clasificados_C/productoAmpliado/<?php echo $Datos['ID_Producto'];?>" data-action="share/whatsapp/share"><img class="detalle_cont--redesSociales-Whatsapp icono--what" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/></a>
                    </div>            
                </div> 
            </div>
        </div>
    </section>

    <!-- IMAGEN AMPLIADA -->
    <section class="Default_ocultar" >
        <div class="contenedor_122"> 
            <div class="contenedor_123">
                <div class="contenedor_124" id="Contenedor_124"> 
                    <!-- $Datos proviene de Opciones_C/imagenAmpliado -->
                    <img class="imagen_9 imagen_10" id="ImagenTemporal" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $Datos['Imagenes']['0']['nombre_img'] ;?>"> 
                </div>
            </div>
        </div>
    </section>
    
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_descr_Producto.js';?>"></script>

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

    function cerrarAgregar(){   
        // activarBotonAgregar()Se encuentra en vitrina_V.php debido a que los manejadores de envto de opciones_V.php dependen de vitrina_V.php por ser una ventna abierta con ajax
        window.opener.activarBotonAgregar('<?php echo $ID_LabelAgregar?>') 
        // window.opener.location.reload();        
        window.close()
    }

    function cerrarVentana(){     
        window.close()
    }
</script>