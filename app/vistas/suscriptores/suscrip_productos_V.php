<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/suscriptores/panel_suscrip_V.php');?>

<?php     
//se invoca sesion con el ID_Suscriptor creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Suscriptor"])){
    $ID_Suscriptor = $_SESSION["ID_Suscriptor"];  
    ?>

    <section class="cont_suscrip_productos">
        <h2 class="h2_9">Anuncios clasificados</h2>

        <div class="contenedor_13 cont_suscrip_productos-13"> 
            <?php 
            $Contador = 1; 
    
            //$Datos viene de CuentaComerciante_C/Productos
            foreach($Datos['productos'] as $arr) :
                $Producto = $arr["producto"]; 
                $Opcion = $arr["opcion"];
                //Se cambia el formato del precio, viene sin separador de miles
                $PrecioBolivar = number_format($arr["precioBolivar"], "2", ",", ".");
                //Se cambia el formato del precio, viene sin separador de miles
                $PrecioDolar = number_format($arr["precioDolar"], "2", ",", ".");
                $Existencia = $arr["cantidad"];
                $ID_Producto = $arr["ID_Producto"];
                $ID_Opcion = $arr["ID_Opcion"];
                $FotoPrincipal = $arr['nombre_img'];

                ?>

                    <!-- ICONO AGREGAR -->
                    <a href="<?php echo RUTA_URL . '/CuentaComerciante_C/Publicar/';?>" rel="noopener noreferrer"><img class="cont_modal--agregar Default_pointer" src="<?php echo RUTA_URL . '/public/iconos/agregar/outline_add_circle_outline_black_24dp.png';?>"/></a>
                <div class="contenedor_95 borde_1" id="<?php echo 'Cont_Producto_' . $Contador;?>">
                 
                
                    <!-- IMAGEN PRINCIPAL -->
                    <div class="contenedor_9 contenedor_9--pointer">
                        <?php
                        if($FotoPrincipal == 'imagen.png'){ ?>
                            <div class="contenedor_142" style="background-image: url('<?php echo RUTA_URL?>/public/images/imagen.png')">
                                <input class="input_14 borde_1" type="text" value="<?php echo $Contador;?>"/>
                            </div> 
                            <?php
                        }
                        else{   ?>
                            <div class="contenedor_142" style="background-image: url('<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $_SESSION['ID_Suscriptor'];?>/productos/<?php echo $FotoPrincipal;?>')">
                                <input class="input_14 borde_1" type="text" value="<?php echo $Contador;?>"/>
                            </div>
                            <?php
                        } ?>
                    </div>

                    <!-- PRODUCTO -->
                    <div>
                        <label class="input_8 input_8D" id="<?php echo 'EtiquetaProducto_' . $Contador;?>"><?php echo $Producto;?></label>

                        <!-- OPCION -->                        
                        <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" ><?php echo $Opcion;?></label>

                        <!-- UNIDADES EN EXISTNCIA -->    
                        <?php
                        if($Existencia == 1){  ?>                   
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >Existencia: <?php echo $Existencia;?> Ud.</label> <?php
                        }
                        elseif($Existencia > 1){   ?>
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >Existencia: <?php echo $Existencia;?> Uds.</label> <?php
                        }
                        else{  ?>
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >Existencia: Agotado</label>
                            <?php
                        }  ?>

                        <!-- PRECIO -->
                        <label class="input_8 " id="<?php echo 'EtiquetaPrecio_' . $Contador;?>">Bs.<?php echo $PrecioBolivar;?></label>

                        <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" > $ <?php echo $PrecioDolar;?></label>

                        <!-- ACTUALIZAR - ELIMINAR -->
                        <div class="contenedor_96">                
                            <a class="a_9" href="<?php echo RUTA_URL?>/CuentaComerciante_C/actualizarProducto/<?php echo $ID_Producto;?>,<?php echo $Opcion;?>">Actualizar</a>
                            
                            <a class="a_9" href="<?php echo RUTA_URL . '/CuentaComerciante_C/eliminarProducto/' . $ID_Producto . ',' . $ID_Opcion?>">Eliminar</a>
                        </div>
                    </div>
                </div>
                <?php 
                $Contador ++;   
            endforeach;     ?>  
        </div>
    </section>
       
    <script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_Producto.js?v=' . rand();?>"></script>

    <?php
}
else{
    header("location:" . RUTA_URL. "/Inicio_C");
}   ?>