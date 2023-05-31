<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div class="cont_panel--main">
    <fieldset class="fieldset_1" id="Rowcipales"> 
        <!-- ICONO AGREGAR -->
        <a href="<?php echo RUTA_URL?>/Panel_C/agregar_agenda" rel="noopener noreferrer"><img class="cont_modal--agregar Default_pointer" src="<?php echo RUTA_URL . '/public/iconos/agregar/outline_add_circle_outline_black_24dp.png';?>"/></a>       
        
        <legend class="legend_1">Agenda de eventos</legend>
        <?php
        foreach($Datos['agenda'] as $Row) : ?>
            <div style="display: flex; margin-bottom: 5%;">                
                <!-- IMAGN  -->
                <div class="cont_panel__agenda--imagen">       
                    <figure>
                        <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/agenda/<?php echo $Row['nombre_imagenAgenda'];?>"/> 
                    </figure>
                </div>
                <div>                            
                    <!-- FECHA -->
                    <label style="display: block; width: 150%">Fecha de caducidad</label>
                    <label><?php echo $Row['fechaPublicacion'];?></label>

                    <div style="width: 100%;">
                        <!-- COMPARTIR FACEBOOK-->             
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_imagenAgenda'];?>" target="_blank">Facebook</a>
                        
                        <!-- ACTUALIZAR -->
                        <a class="" href="<?php echo RUTA_URL?>/Panel_C/actualizar_agenda/<?php echo $Row['ID_Agenda'];?>" rel="noopener noreferrer">Actualizar</a>
                        
                        <!-- PUBLICIDAD -->
                        <!-- <a href="<?php //echo RUTA_URL?>/Panel_C/<?php //echo $Row['ID_Agenda'];?>" rel="noopener noreferrer">Publicidad</a> -->
                        
                        <!-- ELIMINAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/eliminar_agenda/<?php echo $Row['ID_Agenda'];?>,<?php echo $Row['nombre_imagenAgenda'];?>" rel="noopener noreferrer">Eliminar</a>
                    </div>
                </div> 
            </div>
            <?php
        endforeach  ?>     
    </fieldset>
</div>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>