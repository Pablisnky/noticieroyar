<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%;">
    <fieldset class="fieldset_1" id="Rowcipales"> 
        <a href="<?php echo RUTA_URL?>/Panel_C/agregar_coleccion" rel="noopener noreferrer"><span class="material-icons-outlined cont_modal--agregar Default_pointer" id="Cerrar--modal">add_circle_outline</span></a>
        
        <legend class="legend_1">Coleccion Yaracuy 180°</legend>
        <?php
        foreach($Datos['colecciones'] as $Row) : ?>
            <div style="display: flex; margin-bottom: 5%;" id="<?php echo $Row['ID_Coleccion'];?>">                
                <!-- IMAGEN COLECCION -->
                <div class="cont_panel__agenda--imagen">       
                    <figure>
                        <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/colecciones/<?php echo $Row['nombre_imColeccion'];?>"/> 
                    </figure>
                </div>
                <div>                            
                    <!-- NOMBRE COLECCION -->
                    <label class="cont_panel--label">Colección:</label>
                    <label><?php echo $Row['nombreColeccion'];?></label>
                    <br>
                    
                    <!-- NOTICIA -->
                    <!-- <label class="cont_panel--label">Noticia:</label>
                    <label><?php echo $Row['fechaCulmina'];?></label> -->

                    <div style="width: 100%;">
                        <!-- ACTUALIZAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/actualizar_coleccion/<?php echo $Row['ID_Coleccion'];?>" rel="noopener noreferrer">Actualizar</a>
                        
                        <!-- ELIMINAR -->
                        <label class="Default_pointer" onclick="EliminarColeccion('<?php echo $Row['ID_Coleccion'];?>')">Eliminar</label>
                    </div>
                </div> 
            </div>
            <?php
        endforeach  ?>     
    </fieldset>
</div>
<!-- 
<script src="<?php echo RUTA_URL.'/public/javascript/E_Publicidad.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Publicidad.js?v=' . rand();?>"></script> -->