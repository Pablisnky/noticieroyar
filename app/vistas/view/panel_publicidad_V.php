<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%;">
    <fieldset class="fieldset_1" id="Rowcipales"> 
        <!-- ICONO AGREGAR -->
        <a href="<?php echo RUTA_URL?>/Panel_C/agregar_publicidad" rel="noopener noreferrer"><img class="cont_modal--agregar Default_pointer" src="<?php echo RUTA_URL . '/public/iconos/agregar/outline_add_circle_outline_black_24dp.png';?>"/></a> 

        <!-- <a href="<?php //echo RUTA_URL?>/Panel_C/agregar_publicidad" rel="noopener noreferrer"><span class="material-icons-outlined cont_modal--agregar Default_pointer" id="Cerrar--modal">add_circle_outline</span></a> -->
        
        <legend class="legend_1">Anuncios</legend>
        <?php
        foreach($Datos['anuncio'] as $Row) : ?>
            <div style="display: flex; margin-bottom: 5%;" id="<?php echo $Row['ID_Anuncio'];?>">                
                <!-- IMAGEN ANUNCIO PUBLICITARIO -->
                <div class="cont_panel__agenda--imagen">       
                    <figure>
                        <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/publicidad/<?php echo $Row['nombre_imagenPublicidad'];?>"/> 
                    </figure>
                </div>
                <div>                            
                    <!-- CLIENTE -->
                    <label class="cont_panel--label">Cliente:</label>
                    <label><?php echo $Row['razonSocial'];?></label>
                    <br>
                    
                    <!-- FECHA -->
                    <label class="cont_panel--label">Fecha de caducidad:</label>
                    <label><?php echo $Row['fechaCulminaPublicacion'];?></label>

                    <div style="width: 100%;">
                        <!-- ACTUALIZAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/actualizar_publicidad/<?php echo $Row['ID_Anuncio'];?>" rel="noopener noreferrer">Editar</a>
                        
                        <!-- ELIMINAR -->
                        <label class="Default_pointer" style="color: blue; margin-left: 50px" onclick="EliminarAnuncio('<?php echo $Row['ID_Anuncio'];?>','<?php echo $Row['nombre_imagenPublicidad'];?>')">Eliminar</label>
                    </div>
                </div> 
            </div>
            <?php
        endforeach  ?>     
    </fieldset>
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/E_Publicidad.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Publicidad.js?v=' . rand();?>"></script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>