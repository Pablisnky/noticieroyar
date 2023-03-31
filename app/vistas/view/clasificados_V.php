<section class="section_9" id="Section_3"> 
    <div class="contenedor_90">       
        <h1 class="h1_1">Clasificados</h1> 
        <h3 class="h3_1 bandaAlerta">Periodo de prueba (simulación)</h3>
    </div>
    <form id="Formulario"> 
        <div class="contenedor_13" id="Contenedor_13Js"> 
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

                //Se da formato al precio, sin decimales y con separación de miles
                settype($PrecioBolivar, "float");
                settype($PrecioDolar, "float");
                $PrecioBolivar = number_format($PrecioBolivar, 2, ",", "."); 
                $PrecioDolar = number_format($PrecioDolar, 2, ",", ".");   ?>  
                
                <div class="contenedor_95" id="<?php echo 'Cont_Producto_' . $ContadorLabel;?>">
                    
                    <!-- IMAGEN -->
                    <!-- se colocan el caracter | para usarlo como separardor en Opciones_C/productoAmpliado debido a que el usuario puede usar comas o punto y comas en el texto de opciones o del producto.  -->
                    <?php 
                    $Separador = '|';   
                    $Bandera = 'Desde_Clasificados';
                    ?> 
                    <div class="contOpciones" onclick="mostrarDetalles('<?php echo $ContadorLabel.$Separador?>','<?php echo $Producto.$Separador?>','<?php echo $Opcion.$Separador?>','<?php echo $PrecioBolivar.$Separador?>','<?php echo $ImagenProducto.$Separador;?>','<?php echo $ID_Producto.$Separador?>','<?php echo $PrecioDolar.$Separador?>','<?php echo $Existencia.$Separador?>','<?php echo $ID_Suscriptor.$Separador?>','<?php echo $Nuevo.$Separador?>','<?php echo $Bandera?>')">
                        <figure>
                            <img class="contOpciones__img" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $ImagenProducto;?>"/> 
                        </figure>
                        <!-- <p class="contOpciones--nuevo"><?php //echo $Nuevo;?></p> -->
                    </div>
                                                        
                    <div class="cont_producto"> 
                        <div style="height: 75px;">
                            <!-- PRODUCTO -->
                            <label class="input_8 input_8D hyphen" id="<?php echo 'EtiquetaProducto_' . $ContadorLabel;?>"><?php echo $Producto;?></label>

                            <!-- OPCION -->
                            <label class="input_8 input_8C hyphen" id="<?php echo 'EtiquetaOpcion_' . $ContadorLabel;?>"><?php echo $Opcion;?></label>
                        </div>     
                            
                        <!-- PRECIO -->
                        <!-- <div style="display: flex"> -->
                            <div class="cont_Precios">
                                <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >Bs. <?php echo $PrecioBolivar;?></label>

                                <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >$ <?php echo $PrecioDolar;?></label>
                            </div>
                           <!--  <div> -->
                                <!-- ICONO GIRAR     cont_modal--cerrar-->                                    
                                <!-- <img class=" Default_pointer" style="width: 2em; margin-top: 25%" id="" src="<?php //echo RUTA_URL . '/public/iconos/giro/outline_switch_right_black_24dp.png'?>"/>
                            </div> -->
                        <!-- </div> -->

                        <!-- Este input es el que se envia al archivo JS por medio de la función agregarProducto(), en el valor se colocan el caracter _ para usarlo como separardor en JS-->
                        <input class="Default_ocultar" type="radio" name="opcion" id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" value="<?php echo $ID_Opcion . ',' . '_' . $Producto . ',' . '_' . $Opcion . ',' . '_' . $PrecioBolivar;?>" onclick="agregarProducto(this.form , '<?php echo 'Etiqueta_' . $ContadorLabel;?>','<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>','<?php echo 'Cantidad_' . $ContadorLabel;?>','<?php echo 'Producto_' . $ContadorLabel;?>','<?php echo 'Opcion_' . $ContadorLabel;?>','<?php echo 'Precio_' . $ContadorLabel;?>','<?php echo 'Total_' . $ContadorLabel;?>','<?php echo 'Leyenda_' . $ContadorLabel;?>','<?php echo 'Cont_Producto_' . $ContadorLabel;?>','<?php echo 'Item_'. $ContadorLabel;?>','<?php echo $Existencia;?>','<?php echo 'ID_BotonMas_'. $ContadorLabel;?>','<?php echo 'ID_BloquearMas_'. $ContadorLabel;?>')"/>
                    </div> 
                    
                    <!-- VEDEDOR -->
                    <div class="contOpciones--vendedor">   
                        <?php
                        foreach($Datos['Suscriptor'] as $Key)  :
                            if($ID_Suscriptor == $Key['ID_Suscriptor']){           ?>                  
                                <p class="contenedor--vendedor--p">Vendedor: <?php echo $Key['pseudonimoSuscripto'];?></p>
                                <?php
                            }   
                        endforeach; ?>
                    </div>
                </div>
                <?php   
                $ContadorLabel++;
            endforeach;   ?>                    
        </div>
    </form>
</section>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_Clasificados.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/A_Clasificados.js?v='. rand();?>"></script>