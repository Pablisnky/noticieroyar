    <section class="section_9" id="Section_3"> 
        
    <header>
        <div class="cont_clasificados">    
            <div class="cont_clasificados--item-1 Default_quitarMovil">
                <h1 class="h1_1">Clasificados</h1> 
            </div>

            <!-- BUSCADOR -->
            <div style="display:flex; justify-content: space-around; align-items: center; margin-top: 5px; width: 100%; ">
                <div>
                    <input style="width: 110%;" class="login_cont--input borde--input" type="text" name="buscador" id="Buscador" placeholder="Buscar producto"/>
                </div>
                <div>
                    <img class="Default_pointer" style="width: 100%;" src="<?php echo RUTA_URL . '/public/iconos/refrescar/outline_refresh_black_24dp.png'?>" id="Refrescar"/>
                </div>
            </div>
            <div class="cont_clasificados--item-2">
                <a class="boton boton--publicar" href="<?php echo RUTA_URL . '/Categoria_C/';?>" rel="noopener noreferrer">Categorias</a>
                <a class="boton boton--publicar" href="<?php echo RUTA_URL . '/Login_C/index/SinID_Noticia,SinBandera';?>" rel="noopener noreferrer">Publicar</a>
            </div>
        </div>
    </header>    
    <div class="contenedor_13 contenedor_13--marginTOp" id="Contenedor_13Js"> 
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
            // $Nuevo = $row['nuevo'] == 1 ? 'Nuevo' : 'Usado'; 

            //Se da formato al precio, sin decimales y con separación de miles
            settype($PrecioBolivar, "float");
            settype($PrecioDolar, "float");
            $PrecioBolivar = number_format($PrecioBolivar, 2, ",", "."); 
            $PrecioDolar = number_format($PrecioDolar, 2, ",", ".");   ?>  
            
            <div class="contenedor_95" id="<?php echo 'Cont_Producto_' . $ContadorLabel;?>"> 

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
                    <a href="<?php echo RUTA_URL . '/Clasificados_C/productoAmpliado/' . $ID_Producto?>" rel="noopener noreferrer" target="_blank"><img class="contOpciones__img" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $ImagenProducto;?>"/></a>
                </div>
                                                    
                <div class="cont_producto"> 
                    <div style="height: 75px;">
                        <!-- PRODUCTO -->
                        <label class="input_8 input_8D hyphen" id="<?php echo 'EtiquetaProducto_' . $ContadorLabel;?>"><?php echo $Producto;?></label>

                        <!-- OPCION -->
                        <label class="input_8 input_8C hyphen" id="<?php echo 'EtiquetaOpcion_' . $ContadorLabel;?>"><?php echo $Opcion;?></label>
                    </div>     
                        
                    <!-- PRECIO -->
                    <div class="cont_Precios">
                        <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >Bs. <?php echo $PrecioBolivar;?></label>

                        <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >$ <?php echo $PrecioDolar;?></label>
                    </div>

                    <!-- Este input es el que se envia al archivo JS por medio de la función agregarProducto(), en el valor se colocan el caracter _ para usarlo como separardor en JS-->
                    <input class="Default_ocultar" type="radio" name="opcion" id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" value="<?php echo $ID_Opcion . ',' . '_' . $Producto . ',' . '_' . $Opcion . ',' . '_' . $PrecioBolivar;?>" onclick="agregarProducto(this.form , '<?php echo 'Etiqueta_' . $ContadorLabel;?>','<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>','<?php echo 'Cantidad_' . $ContadorLabel;?>','<?php echo 'Producto_' . $ContadorLabel;?>','<?php echo 'Opcion_' . $ContadorLabel;?>','<?php echo 'Precio_' . $ContadorLabel;?>','<?php echo 'Total_' . $ContadorLabel;?>','<?php echo 'Leyenda_' . $ContadorLabel;?>','<?php echo 'Cont_Producto_' . $ContadorLabel;?>','<?php echo 'Item_'. $ContadorLabel;?>','<?php echo $Existencia;?>','<?php echo 'ID_BotonMas_'. $ContadorLabel;?>','<?php echo 'ID_BloquearMas_'. $ContadorLabel;?>')"/>
                </div> 
                
                <!-- VEDEDOR -->
                <div class="contOpciones--vendedor">   
                    <?php
                    foreach($Datos['Suscriptor'] as $Key)  :
                        if($ID_Suscriptor == $Key['ID_Suscriptor']){           ?>          
                            <div class="cont_vendedor--span">                        
                                <div class="cont_vendedor--span-2">              
                                    <span class="span--vendedor--ubicacion"></span>
                                    <img class="icono--ubicacion" src="<?php echo RUTA_URL . '/public/iconos/ubicacion/outline_place_black_24dp.png'?>"/><?php echo $Key['parroquiaSuscriptor']?> 
                                </div>
                                <span class="span--vendedor">Vendedor: <?php echo $Key['pseudonimoSuscripto'];?></span> 
                            </div> 
                            
                            <?php
                        }   
                    endforeach; ?>
                </div>
            </div>
            <?php   
            $ContadorLabel++;
        endforeach;   ?>                    
    </div>
    
    <!--Carga mediante Ajax las productos disponibles para la busqueda solicitada desde buscador_V.php -->
    <div class="contenedor_58" id="Buscar_Pedido">
    

    <!-- BOTONES DEL PANEL FRONTAL (solo en dispositivos moviles)-->	
    <div class="cont_portada--botones">                
        <div>
            <label class="boton boton--corto"><a class="Default_font--white boton_a" href="<?php echo RUTA_URL . '/Categoria_C/';?>" rel="noopener noreferrer">Categorias</a></label> 
        </div>        
        <div>
            <label class="boton boton--corto"><a class="Default_font--white boton_a" href="<?php echo RUTA_URL . '/Login_C/index/SinID_Noticia,SinBandera';?>" rel="noopener noreferrer">Publicar</a></label> 
        </div>        
    </div>

    <!-- CINTILLO  -->    
    <p class="contenedor_34--p" id="Contenedor_34--p">Cambio oficial BCV: 1 $ = <?php echo number_format($Datos['dolarHoy'], 2, ",", ".");?> Bs.</p>
    
</section>

</body>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_Clasificados.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/A_Clasificados.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL;?>/public/javascript/FullScreem.js?v=<?php echo rand();?>"></script> 

</html>