<!-- CARGA SDK FONTAWESONE PARA ICONOS DE REDES SOCIALES se uso esta libreria porque los iconos no tienen fondo-->
<script src="https://kit.fontawesome.com/2d6db4c67d.js" crossorigin="anonymous"></script>

<body>		
    <section class="section_9" id="Section_3"> 
        
        <header>
            <div class="cont_catalogos">  

                <div class="cont_catalogos--membrete--1">     
                    <a class="header__titulo--catalogo" href="<?php echo RUTA_URL . '/Inicio_C';?>">www.NoticieroYaracuy.com</a> 
                    <br class="Default_quitarMovil">
                    <label class="header__subtitulo--catalogo">Clasificados</label>
                </div> 

                <!-- PSEUDONIMO -->
                <div class="cont_catalogos--membrete--2">
                    <h1 class="h1_1 h1_1--catalogo"><?php echo $Datos['pseudonimoSuscripto'];?></h1> 
                </div>
                    
                <!-- COMPARTIR REDES SOCIALES -->
                <div class="cont_catalogos--membrete--3">
                    <!-- FACEBOOK -->
                    <div class="cont_catalogos--iconos">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Catalogos_C/index/<?php echo $Datos['ID_Suscriptor'];?>" target="_blank"><i class="fa-brands fa-facebook-f fa-sm catalogo-RS"></i></a>
                    </div>        
                    
                    <!-- TWITTER -->
                    <div class="cont_catalogos--iconos">
                        <a href="https://twitter.com/intent/tweet?url=<?php echo RUTA_URL;?>/Catalogos_C/index/<?php echo $Datos['ID_Suscriptor'];?>" target="_blank"><i class="fa-brands fa-twitter catalogo-RS"></i></a>
                    </div>     
                    
                    <!-- E-MAIL -->
                    <div class="cont_catalogos--iconos">
                        <a href="#" target="_blank"><i class="fa-regular fa-envelope catalogo-RS"></i></a>
                    </div>      
                    
                    <!-- WHATSAPP -->
                    <div class="whatsapp cont_catalogos--iconos">
                        <a href="whatsapp://send?text=<?php echo 'Catalogo ' . $Datos['pseudonimoSuscripto']?>&nbsp;<?php echo RUTA_URL?>/Catalogos_C/index/<?php echo $Datos['ID_Suscriptor'];?>" data-action="share/whatsapp/share"><i class="fa-brands fa-whatsapp catalogo-RS WHhatsApp-catalogo"></i></a>
                    </div>    
                    <div>
                        <p style="text-align: center; font-size: 0.7em">Compartir</p>
                    </div>
                </div>
                    
                <!-- SECCIONES ICONO CERRAR-->
                <div class="cont_catalogos--membrete--4">
                    <div class=""> 
                        <img class="Default_pointer" style="width: 2em" id="Secciones" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_expand_more_black_24dp.png'?>"/>
                    </div>  

                    <div>
                        <img class="Default_pointer" style="width: 1.8em;" id="Cerrar" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>" onclick="cerrarVentana()"/>
                    </div> 
                </div>  
            </div>
        </header>

        <!-- MUESTRA MENU SECCIONES --> 
        <div class="cont_catalogos--secciones" id="Con_Secciones">
            <?php
            foreach($Datos['secciones'] as $Key) :    ?>
            <p class="cont_catalogos--p" onclick="Llamar_seccion('<?php echo $Datos['ID_Suscriptor']?>','<?php echo $Key['ID_Seccion']?>')"><?php echo $Key['seccion']?></p>
                <?php
            endforeach; ?>
            <?php $Pseudonimo = str_replace(" ", "_", $Datos['pseudonimoSuscripto']); ?>
            <p class="cont_catalogos--p" onclick="Llamar_Todasseccion('<?php echo $Datos['ID_Suscriptor']?>','<?php echo $Pseudonimo; ?>')">Todos</p>
            <hr class="hr_3 hr_3a">
            
            <!-- INFORMACION DE CONTACTO DEL VENDEDOR -->
            <div class="cont_detalle_Producto--informacion cont_detalle_Producto---catalogo">
                <div class="cont_detalle_Producto--suscriptor">
                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/tienda/outline_storefront_black_24dp.png'?>"/>
                    <label class="cont_detalle_Producto--p"><?php echo $Pseudonimo?></label>
                </div>
                <div class="cont_detalle_Producto--suscriptor">
                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/ubicacion/outline_place_black_24dp.png'?>"/>
                    <label class="cont_detalle_Producto--p"><?php echo $Datos['imgCatalogo']['municipioSuscriptor']?> - <?php echo  $Datos['imgCatalogo']['parroquiaSuscriptor']?></label>
                </div>
                <div class="cont_detalle_Producto--suscriptor">
                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_perm_identity_black_24dp.png'?>"/>
                    <label class="cont_detalle_Producto--p"><?php echo $Datos['imgCatalogo']['nombreSuscriptor']?> <?php echo $Datos['imgCatalogo']['apellidoSuscriptor']?></label>
                </div>
                <div class="cont_detalle_Producto--suscriptor">
                    <img class="" style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/telefono/outline_phone_iphone_black_24dp.png'?>"/>
                    <label class="cont_detalle_Producto--p"><?php echo $Datos['imgCatalogo']['telefonoSuscriptor']?></label>
                </div>
            </div>
        </div>
        <!-- <h3 class="contenedor_13--anuncio h3_1 bandaAlerta">Periodo de prueba (simulación)</h3> -->

        <!-- PRODUCTOS -->
        <div class="cont_catalogos--productos" id="Contenedor_13Js"> 
            <?php   
            $ContadorLabel = 1;
            foreach($Datos['productos'] as $row) :
                $ID_Producto = $row['ID_Producto'];
                $ID_Opcion =  $row['ID_Opcion'];
                $ID_Suscriptor = $row['ID_Suscriptor'];
                $Producto = $row['producto']; 
                $Opcion = $row['opcion'];                       
                $PrecioBolivar = $row['precioBolivar'];         
                $PrecioDolar = $row['precioDolar']; 
                $Existencia = $row['cantidad']; 
                $ImagenProducto = $row['nombre_img']; 
                $Nuevo = $row['nuevo'] == 1 ? 'Nuevo' : 'Usado';                 
                $Bandera = 'Desde_Catalogo';

                //Se da formato al precio, sin decimales y con separación de miles
                settype($PrecioBolivar, "float");
                settype($PrecioDolar, "float");
                $PrecioBolivar = number_format($PrecioBolivar, 2, ",", "."); 
                $PrecioDolar = number_format($PrecioDolar, 2, ",", ".");   ?>  
                
                <div class="contenedor_95 contenedor_95--margin" id="<?php echo 'Cont_Producto_' . $ContadorLabel;?>">
                
                    <!-- IMAGEN -->
                    <div class="contOpciones">
                        <?php
                        if($row['nuevo'] == 'Nuevo'){   ?>                        
                            <label class="contOpciones--textoVertical">Articulo <?php echo $row['nuevo']?></label>
                            <?php
                        }
                        else if($row['nuevo'] == 'Usado'){  ?>
                            <label class="contOpciones--textoVertical">Articulo <?php echo $row['nuevo']?></label>
                            <?php
                        }  ?>
                        <a href="<?php echo RUTA_URL . '/Catalogos_C/productoAmpliado/' . $ID_Producto;?>" rel="noopener noreferrer" target="_blank"><img class="contOpciones__img" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $ImagenProducto;?>"/></a> 
                    </div>
                                
                    <div> 
                        <div class="cont_catalogos--producto">
                            <!-- PRODUCTO -->
                            <label class="input_8 input_8D hyphen" id="<?php echo 'EtiquetaProducto_' . $ContadorLabel;?>"><?php echo $Producto;?></label>

                            <!-- OPCION -->
                            <label class="input_8 input_8C hyphen" id="<?php echo 'EtiquetaOpcion_' . $ContadorLabel;?>"><?php echo $Opcion;?></label>
                        </div>     
                        
                        <!-- PRECIO EN Bs-->
                        <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >Bs. <?php echo $PrecioBolivar;?></label>

                        <!-- PRECIO EN $-->
                        <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >$ <?php echo $PrecioDolar;?></label>
                    </div> 
                </div>
                <?php   
                $ContadorLabel++;
            endforeach;   ?>                    
        </div>
    </section>
    
    <!-- CINTILLO  -->
    <p class="contenedor_34--p" id="Contenedor_34--p">Cambio oficial BCV: 1 $ = <?php echo number_format($Datos['dolarHoy'], 2, ",", ".");?> Bs.</p>
</body>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_Catalogos.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/A_Catalogos.js?v='. rand();?>"></script>
    
</body>
</html>