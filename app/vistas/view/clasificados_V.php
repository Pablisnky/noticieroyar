<!-- Archivo cargado en div id= "Mostrar_Opciones" en vitrina_V.php por petición Ajax desde por medio de llamar_Opciones()-->

<section  class="section_3 section_9" id="Section_3">  <!-- -->
    <div class="contenedor_90 p_9">       
        <h1 class="h1_1">Clasificados</h1> 
    </div>
    <!-- <div style="background-color: green; width: 100%"> -->
        <!-- <div class="contenedor_158"> -->
            <form id="Formulario"> 
                <div class="contenedor_13" style="margin-top:8%" id="Contenedor_13Js"> 
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

                        //Se da formato al precio, sin decimales y con separación de miles
                        settype($PrecioBolivar, "float");
                        settype($PrecioDolar, "float");
                        $PrecioBolivar = number_format($PrecioBolivar, 2, ",", "."); 
                        $PrecioDolar = number_format($PrecioDolar, 2, ",", ".");   ?>  
                        
                        <div class="contenedor_95" id="<?php echo 'Cont_Producto_' . $ContadorLabel;?>">
                            
                            <!-- IMAGEN -->
                            <div class="contOpciones">
                                <!-- se colocan el caracter | para usarlo como separardor en Opciones_C/productoAmpliado debido a que el usuario puede usar comas o punto y comas en el texto de opciones o del producto.  -->
                                <?php 
                                $Separador = '|';   ?> 
                                <div class="contenedor_97" onclick="mostrarDetalles('<?php echo $ContadorLabel.$Separador?>','<?php echo $Producto.$Separador?>','<?php echo $Opcion.$Separador?>','<?php echo $PrecioBolivar.$Separador?>','<?php echo $ImagenProducto.$Separador;?>','<?php echo $ID_Producto.$Separador?>','<?php echo $PrecioDolar.$Separador?>','<?php echo $Existencia.$Separador?>')">
                                    <?php
                                    if($ImagenProducto == 'imagen.png'){ ?>
                                        <figure>
                                            <img class="contOpciones__img" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/images/imagen.png"/> 
                                        </figure>
                                        <?php
                                    }
                                    else{   ?>
                                        <figure>
                                            <img class="contOpciones__img" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/images/clasificados/<?php echo $ID_Suscriptor;?>/productos/<?php echo $ImagenProducto;?>"/> 
                                        </figure>
                                        <?php 
                                    }
                                        ?>
                                </div>
                            </div>
                                        
                            <div> 
                                <div style="min-height:80px">
                                    <div style="height: 75px;">
                                        <!-- PRODUCTO -->
                                        <label class="input_8 input_8D hyphen" id="<?php echo 'EtiquetaProducto_' . $ContadorLabel;?>"><?php echo $Producto;?></label>
    
                                        <!-- OPCION -->
                                        <label class="input_8 input_8C hyphen" id="<?php echo 'EtiquetaOpcion_' . $ContadorLabel;?>"><?php echo $Opcion;?></label>
                                    </div>     
                                    
                                    <!-- PRECIO -->
                                    <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >Bs. <?php echo $PrecioBolivar;?></label>

                                    <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >$ <?php echo $PrecioDolar;?></label>

                                    <!-- CATALOGO -->
                                    <!-- <P class="input_8A">Ver catalogo de vendedor</P> -->
                            
                                    <!-- Este input es el que se envia al archivo JS por medio de la función agregarProducto(), en el valor se colocan el caracter _ para usarlo como separardor en JS-->
                                    <input class="Default_ocultar" type="radio" name="opcion" id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" value="<?php echo $ID_Opcion . ',' . '_' . $Producto . ',' . '_' . $Opcion . ',' . '_' . $PrecioBolivar;?>" onclick="agregarProducto(this.form , '<?php echo 'Etiqueta_' . $ContadorLabel;?>','<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>','<?php echo 'Cantidad_' . $ContadorLabel;?>','<?php echo 'Producto_' . $ContadorLabel;?>','<?php echo 'Opcion_' . $ContadorLabel;?>','<?php echo 'Precio_' . $ContadorLabel;?>','<?php echo 'Total_' . $ContadorLabel;?>','<?php echo 'Leyenda_' . $ContadorLabel;?>','<?php echo 'Cont_Producto_' . $ContadorLabel;?>','<?php echo 'Item_'. $ContadorLabel;?>','<?php echo $Existencia;?>','<?php echo 'ID_BotonMas_'. $ContadorLabel;?>','<?php echo 'ID_BloquearMas_'. $ContadorLabel;?>')"/>
                                </div>
                                                                
                                <!-- BOTON AGREGAR -->
                                <?php 
                                if($Existencia == 0){ ?><!--SINO HAY PRODUCTOS EN INVENTARIO SE DESABILITA-->
                                    <label class="label_4 label_4--innabilitado">Agregar</label> 
                                    <?php
                                }  
                                else{ ?><!--SI HAY PRODUCTOS EN INVENTARIO SE HABILITA-->
                                    <label for="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" class="label_4 borde_1 Label_3js" id="<?php echo 'Etiqueta_' . $ContadorLabel;?>">Agregar</label> 
                                    <?php
                                }   ?>
                            </div> 

                            <div class="contenedor_14" id="<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>">
                            
                                <!-- LEYENDA -->
                                <div class="contenedor_19">
                                    <!-- cantidad alimentado desde E_Vitrina.js agregarProducto()-->
                                    <input type="text" class="input_1e Default_ocultar" id="<?php echo 'Cantidad_' . $ContadorLabel;?>"/>
                                    <!-- producto - alimentado desde E_Vitrina.js agregarProducto() -->
                                    <input type="text" class="input_1a Default_ocultar" name="Desc_Producto" id="<?php echo 'Producto_' . $ContadorLabel;?>"/>
                                    <!-- opcion alimentado desde E_Vitrina.js agregarProducto()-->
                                    <input type="text" class="input_1c Default_ocultar" name="" id="<?php echo 'Opcion_' . $ContadorLabel;?>"/>
                                    <!-- Precio - alimentado desde E_Vitrina.js agregarProducto() -->
                                    <input type="text" class="input_1d Default_ocultar" id="<?php echo 'Precio_' . $ContadorLabel;?>"/>
                                    <!-- Total - alimentado desde E_Vitrina.js agregarProducto()-->
                                    <input type="text" class="input_1f Default_ocultar" id="<?php echo 'Total_' . $ContadorLabel;?>"/>

                                    <!-- LEYENDA - alimentado desde E_Vitrina.js agregarProducto() -->
                                    <input class="input_2a" type="text" name="leyenda" id="<?php echo 'Leyenda_'. $ContadorLabel;?>"/>
                                </div> 

                                <!-- BOTON MAS Y MENOS -->
                                <div class="contenedor_16">
                                    <label class="menos MenosJS" id="<?php echo 'ID_BotonMenos_'. $ContadorLabel;?>">-</label>
                                    <input class="input_2" type="text" id="<?php echo 'Item_'. $ContadorLabel;?>"  value="1"/>
                                    <label class="mas MasJS" id="<?php echo 'ID_BotonMas_'. $ContadorLabel;?>">+</label>

                                    <i class="fas fa-ban icono_7" id="<?php echo 'ID_BloquearMas_'. $ContadorLabel;?>" onclick="BotonBloqueado()"></i>
                                    <input class="Default_ocultar BloquearMasJS"  type="text" value="<?php echo $Existencia?>"/>
                                </div> 
                            </div>
                        </div>
                        <?php   
                        $ContadorLabel++;
                    endforeach;   ?>                    
                </div>
            </form>
        <!-- </div> -->
    <!-- </div> -->
</section>

<!-- Se muestra el boton de carrito de compras en el bottom del viewport, aparece por medio de agregarProducto() en E_Clasificados.js-->
<div class="contenedor_61" id="Contenedor_61">
    <div class="contenedor_21" id="Mostrar_Carrito" onclick="llamar_PedidoEnCarrito('<?php echo $ID_Suscriptor;?>','<?php echo $Datos['dolarHoy'];?>')">
        <div class="contenedor_31">
            <small class="small_1 small_4" id="Small_4--JS">Ver <br class="br_3"> carrito</small>
            <img class="Default_pointer" style="color:white; width: 2em; margin-top: 2%" src="<?php echo RUTA_URL . '/public/iconos/carritoCompras/outline_shopping_cart_white_24dp.png'?>"/>
            
            <!-- input que va cargando el monto total de la compra  -->
            <input type="text" class="input_5" id="Input_5" readonly/>
        </div>
    </div>
</div>

<!-- Trae por medio de Ajax todo el pedido del usuario "La Orden de compra", la información es suministrada por carrito_V.php invocada por la función llamar_PedidoEnCarrito() en este mismo archivo-->
<div id="Mostrar_Orden"></div>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_Clasificados.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/A_Clasificados.js?v='. rand();?>"></script>