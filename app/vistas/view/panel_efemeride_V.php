    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

    <div style="margin-left: 20%;">
        <fieldset class="fieldset_1" id="Rowcipales"> 
        <a href="<?php echo RUTA_URL?>/Panel_C/agregar_efemeride" rel="noopener noreferrer"><span class="material-icons-outlined cont_modal--agregar Default_pointer" id="Cerrar--modal">add_circle_outline</span></a> 
            <legend class="legend_1">Efemerides</legend>
            <?php
            foreach($Datos['efemerides'] as $Row) : ?>
                <div style="display: flex; margin-bottom: 30px">
                
                    <!-- IMAGEN EFEMERIDE -->
                    <div style=" width: 30%">       
                        <figure>
                            <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_ImagenEfemeride'];?>"/> 
                        </figure>
                    </div>
                    <div style="width: 100%; padding-left: 1%">
                        <!-- FECHA -->
                        <label class="cont_panel--label">Fecha</label>
                        <label class="cont_panel--fecha"><?php echo $Row['fechaPublicacion'];?></label>
                        
                        <!-- TITULO -->
                        <label class="cont_panel--label">Titulo</label>
                        <label class="cont_panel--titulo"><?php echo $Row['titulo'];?></label>
                        
                        <!-- CONTENIDO -->                        
                        <!-- <label class="cont_panel--label">Contenido</label>
                        <textarea class="cont_panel--textarea Default--textarea--scrol" name="contenido" id="Contenido" autosize="none"><?php echo $Row['contenido'];?></textarea>  -->
                        <br>
                        <!-- ACTUALIZAR -->
                        <a class="" href="<?php echo RUTA_URL?>/Panel_C/actualizar_efemeride/<?php echo $Row['ID_Efemeride'];?>" rel="noopener noreferrer">Actualizar</a>
                        
                        <!-- PUBLICIDAD -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/eliminar_noticia_principal/<?php echo $Not_Gen['ID_Efemeride'];?>" rel="noopener noreferrer">Publicidad</a>
                        
                        <!-- ELIMINAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/eliminar_efemeride/<?php echo $Row['ID_Efemeride'];?>" rel="noopener noreferrer">Eliminar</a>
                    </div>
                </div>
                <?php
            endforeach  ?>     
        </fieldset>
    </div>
    
<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>