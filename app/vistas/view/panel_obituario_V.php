<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%;">
    <fieldset class="fieldset_1" id="Rowcipales"> 
        <!-- ICONO AGREGAR -->
        <a href="<?php echo RUTA_URL?>/Panel_C/agregar_obituario" rel="noopener noreferrer"><img class="cont_modal--agregar Default_pointer" src="<?php echo RUTA_URL . '/public/iconos/agregar/outline_add_circle_outline_black_24dp.png';?>"/></a> 

        <!-- <a href="<?php //echo RUTA_URL?>/Panel_C/agregar_obituario" rel="noopener noreferrer"><span class="material-icons-outlined cont_modal--agregar Default_pointer" id="Cerrar--modal">add_circle_outline</span></a>  -->
        <legend class="legend_1">Obituario</legend>
        <div class="contenedor--obituario">
        <?php
            foreach($Datos['obituario'] as $Row) : ?>
                <div style="margin-bottom: 30px; max-width: 30%">                
                    <!-- IMAGEN -->
                    <div stile="background-color:blue; max-width: 30%">       
                        <figure>
                            <img class="imagen--obituario" name="imagenObituario" alt="Fotografia Obituario" src="<?php echo RUTA_URL?>/public/images/obituario/<?php echo $Row['nombreImagObituario'];?>"/> 
                        </figure>
                    </div>
                    <div style="width: 100%">
                        <!-- NOMBRE DIFUNTO -->
                        <label class="cont_panel--label"><?php echo $Row['nombre_difunto'];?></label>
                        
                        <!-- ACTUALIZAR -->
                        <!-- <a class="" href="<?php echo RUTA_URL?>/Panel_C/actualizar_efemeride/<?php echo $Row['ID_imagObituario'];?>" rel="noopener noreferrer">Actualizar</a> -->
                        
                        <!-- ELIMINAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/eliminar_obituario/<?php echo $Row['ID_imagObituario'];?>" rel="noopener noreferrer">Eliminar</a>
                    </div>
                </div>
                <?php
            endforeach  ?>  
        </div>   
    </fieldset>
</div>

<!-- FOOTER -->
<?php require(RUTA_APP . '/vistas/footer/footer.php');?>