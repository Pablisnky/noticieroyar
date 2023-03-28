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
    
?>
    <!-- SE CARGA EL PRELOADER -->
    <!-- <section class="preloder_tapa--total">
        <div class='preloder preloaderCentrar'></div>
    </section> -->
    
    <!-- ICONO REGRESAR -->
    <img class="cont_modal--cerrar detalle_cont--cerrar Default_pointer" style="width: 1em;" id="Cerrar" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>" onclick="cerrarRegresar()"/>
    
    <section>
        <div class="contenedor_122"> 
            <!-- <br class="mostrar-movil"><br class="mostrar-movil"> -->
            <div class="contGridUna">

                <!-- IMAGEN PRINCIPAL -->
                <div class="contenedor_124" id="Contenedor_124"> 
                    <img class="imagen_9 imagen_10" id="ImagenTemporal" alt="Imagen no disponible" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $Datos['Imagenes']['0']['nombre_img'];?>">           
                </div>
            </div>
            <!-- <br class="mostrar-movil"> -->

            <div class="contGridUna">
                <h1 class="h1_1 h1_1--margin font--bold"><?php echo $Producto?></h1>
                <h3 class="h1_11 font--center"><?php echo $Opcion?></h3>

                <div class="contGeneral">
                    <label class="label_22 borde_1 borde_2">Bs. <?php echo $PrecioBolivar?>
                        <br>
                        <small class="small_2">$ <?php echo $PrecioDolar?></small>
                    </label>
                </div>           
                <!-- COMPARTIR REDES SOCIALES -->
                <div class="detalle_cont--redesSociales">

                    <!-- FACEBOOK -->
                    <div class="detalle_cont--red">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Clasificados_C/productoAmpliado/<?php echo $Datos['ID_Producto'];?>&text=<?php echo $Producto;?>" target="_blank"><img class="detalle_cont--redesSociales-facebook" alt="facebook" src="<?php echo RUTA_URL?>/public/images/facebook.png"/></a>
                    </div>

                    <!-- TWITTER -->
                    <div class="detalle_cont--red">
                        <a href="https://twitter.com/intent/tweet?url=<?php echo RUTA_URL;?>/Clasificados_C/productoAmpliado/<?php echo $Datos['ID_Producto'];?>&text=<?php echo $Producto;?>" target="_blank"><img class="detalle_cont--redesSociales-twitter" alt="twitter" src="<?php echo RUTA_URL?>/public/images/twitter.png"/></a>
                    </div>          

                    <!-- WHATSAPP -->
                    <div class="whatsapp detalle_cont--red">
                    <?php 
                        $Titulo = $Producto;         
                    ?>
                    <a href="whatsapp://send?text=<?php echo $Titulo?>&nbsp;<?php echo RUTA_URL?>/Clasificados_C/productoAmpliado/<?php echo $Datos['ID_Producto'];?>" data-action="share/whatsapp/share"><img class="detalle_cont--redesSociales-Whatsapp" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/></a>
                    </div>            
                </div> 
                <p>San Felipe</p>
                <p>Ofertado por: Pa_Cabeza</p>
                <p>Ver catalogo de vendedor</p>
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

    function cerrarRegresar(){     
        window.close()
    }
</script>