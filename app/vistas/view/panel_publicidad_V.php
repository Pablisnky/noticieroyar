<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div class="cont_panel--main">
    <fieldset class="fieldset_1" id="Rowcipales"> 
        <!-- ICONO AGREGAR -->
        <a href="<?php echo RUTA_URL?>/Panel_C/agregar_publicidad" rel="noopener noreferrer"><img class="cont_modal--agregar Default_pointer" src="<?php echo RUTA_URL . '/public/iconos/agregar/outline_add_circle_outline_black_24dp.png';?>"/></a> 
        
        <legend class="legend_1">Publicidad</legend>
        <?php
        foreach($Datos['anuncio'] as $Row) : ?>
            <div class="cont_panel--publicidad" id="<?php echo $Row['ID_Anuncio'];?>">                
                <!-- IMAGEN ANUNCIO PUBLICITARIO -->
                <div class="cont_panel__agenda--imagen">       
                    <figure>
                        <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/publicidad/<?php echo $Row['nombre_imagenPublicidad'];?>"/> 
                    </figure>
                </div>
                <div class="cont_panel__agenda--contenido">                            
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

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Publicidad.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Publicidad.js?v=' . rand();?>"></script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>