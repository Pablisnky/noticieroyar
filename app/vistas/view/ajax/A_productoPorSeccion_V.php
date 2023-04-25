<!-- Alimenta div en catalogos_V.php mediante AJAX -->
    <div class="cont_respuestaAjax--catalogos" id="Contenedor_13Js"> 
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
                    
                    <!-- PRECIO -->
                    <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >Bs. <?php echo $PrecioBolivar;?></label>

                    <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >$ <?php echo $PrecioDolar;?></label>
                </div> 
            </div>
            <?php   
            $ContadorLabel++;
        endforeach;   ?>                    
    </div>