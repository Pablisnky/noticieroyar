<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%;">
    <fieldset class="fieldset_1" id="Rowcipales"> 
        <a href="<?php echo RUTA_URL?>/Panel_C/agregar_agenda" rel="noopener noreferrer"><span class="material-icons-outlined cont_modal--agregar Default_pointer" id="Cerrar--modal">add_circle_outline</span></a>
        
        <legend class="legend_1">Agenda</legend>
        <?php
        foreach($Datos['agenda'] as $Row) : ?>
            <div style="display: flex; margin-bottom: 5%;">                
                <!-- IMAGN  -->
                <div class="cont_panel__agenda--imagen">       
                    <figure>
                        <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_imagenAgenda'];?>"/> 
                    </figure>
                </div>
                <div style="">                            
                    <!-- FECHA -->
                    <label style="display: block; width: 150%">Fecha de caducidad</label>
                    <label><?php echo $Row['fecha'];?></label>

                    <div style="width: 100%;">
                        <!-- ACTUALIZAR -->
                        <a class="" href="<?php echo RUTA_URL?>/Panel_C/actualizar_agenda/<?php echo $Row['ID_Agenda'];?>" rel="noopener noreferrer">Actualizar</a>
                        
                        <!-- PUBLICIDAD -->
                        <!-- <a href="<?php echo RUTA_URL?>/Panel_C/<?php echo $Row['ID_Agenda'];?>" rel="noopener noreferrer">Publicidad</a> -->
                        
                        <!-- ELIMINAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/eliminar_agenda/<?php echo $Row['ID_Agenda'];?>" rel="noopener noreferrer">Eliminar</a>
                    </div>
                </div> 
            </div>
            <?php
        endforeach  ?>     
    </fieldset>
</div>