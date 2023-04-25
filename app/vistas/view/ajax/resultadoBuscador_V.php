<div class="contenedor_13 cont_buscador" id="Contenedor_13Js"> 
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
        // $Existencia = $row['cantidad']; 
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