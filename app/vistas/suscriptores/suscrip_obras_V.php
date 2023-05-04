<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/suscriptores/panel_suscrip_V.php');?>

<?php     
//se invoca sesion con el ID_Suscriptor creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Suscriptor"])){
    $ID_Suscriptor = $_SESSION["ID_Suscriptor"];  
    ?>
    
    <section class="cont_suscrip_productos">
        <div class="cont_suscrip_productos--membrete">
            <h2 class="h2_9">Portafolio de obras</h2>
            
            <!-- ICONO AGREGAR -->
            <a href="<?php echo RUTA_URL?>/Panel_Artista_C/CargarObras/<?php echo $ID_Suscriptor;?>" rel="noopener noreferrer"><img class="cont_suscrip_productos--membrete--icono  Default_pointer" src="<?php echo RUTA_URL . '/public/iconos/agregar/outline_add_circle_outline_black_24dp.png';?>"/></a> 
        </div>
        <div class="contenedor_13 cont_suscrip_productos-13"> 
            <?php 
            $Contador = 1; 
    
            //$Datos viene de Panel_Artista_C/index
            foreach($Datos['obras'] as $Arr) :

                ?>              
                <div class="contenedor_95 contenedor_95--producto borde_1" id="<?php echo 'Cont_Producto_' . $Contador;?>">
                 
                    <!-- IMAGEN OBRA -->
                    <div class="contenedor_9 contenedor_9--pointer">
                        <div class="contenedor_142" style="background-image: url('<?php echo RUTA_URL?>/public/images/galeria/<?php echo $_SESSION['ID_Suscriptor'];?>_<?php echo $Datos['datosArtista']['nombreSuscriptor'];?>_<?php echo $Datos['datosArtista']['apellidoSuscriptor'];?>/<?php echo $Arr['imagenObra'];?>')">
                        <input class="input_14 borde_1" type="text" value="<?php echo $Contador;?>"/>
                        </div>
                    </div>

                    <!-- NOMBRE OBRA -->
                    <div id="<?php echo 'ContenedorProducto_' . $Contador?>">
                        <label class="input_8 input_8D" id="<?php echo 'EtiquetaProducto_' . $Contador;?>"><?php echo $Arr['nombreObra'];?></label>

                        <!-- PRECIO EN DOLARES-->
                        <label class="input_8 " id="<?php echo 'EtiquetaPrecio_' . $Contador;?>">Bs.<?php echo $Arr['precioDolarObra'];?></label>

                        <!-- PRECIO EN BOLIVARES-->
                        <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" > $ <?php echo $Arr['precioBsObra'];?></label>

                        <!-- ACTUALIZAR - ELIMINAR -->
                        <div class="contenedor_96" id="<?php echo $Arr['ID_Obra']?>">                
                            <a class="a_9" href="<?php echo RUTA_URL?>/Panel_Artista_C/actualizarObra/<?php echo $Arr['ID_Obra'];?>">Actualizar</a>
                            
                            <label style="color: blue;" class="Default_pointer" onclick = "EliminarProducto('<?php echo $Arr['ID_Obra'];?>')">Eliminar</label>
                        </div>
                    </div>
                </div>
                <?php 
                $Contador ++;   
            endforeach;     ?>  
        </div>

        <!-- Muestra respuesta de servidor al eliminar un producto, (es solo para debuggear) -->
        <!-- <div id="Borrar"></div> -->
    </section>
       
    <script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
    <script src="<?php echo RUTA_URL . '/public/javascript/E_suscrip_obras.js?v=' . rand();?>"></script>
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Suscip_obras.js?v=' . rand();?>"></script>

    <?php
}
else{
    header("location:" . RUTA_URL. "/Inicio_C");
}   ?>