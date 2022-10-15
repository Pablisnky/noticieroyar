    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

    <div style="margin-left: 20%;">
        <fieldset class="fieldset_1" id="Not_Principales"> 
            <legend class="legend_1">Noticias en portada</legend>
            <?php
            foreach($Datos['noticiasPortadas'] as $Not_Prin) : ?>
                <div style="display: flex; margin-bottom: 30px">                
                    <!-- IMAGN NOTICIA -->
                    <div style="width: 30%; margin-right: 1.5%">       
                        <figure>
                            <?php
                            foreach($Datos['imagenesNoticiasPortadas'] as $Row)   : 
                                if($Not_Prin['ID_Noticia'] == $Row['ID_Noticia']){  ?>
                                    <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_imagenNoticia'];?>"/> 
                                    <?php
                                }
                            endforeach; ?>
                        </figure>
                    </div>
                    <div style="width: 100%">
                        <!-- TITULO NOTICIA -->
                        <label class="cont_panel--label">Titulo</label>
                        <label class="cont_panel--titulo"><?php echo $Not_Prin['titulo'];?></label>
                        
                        <!-- SUBTITULO NOTICIA -->
                        <label class="cont_panel--label">Resumen</label>
                        <label class="cont_panel--resumen"><?php echo $Not_Prin['subtitulo'];?></label>
                        
                        <!-- SECCION NOTICIA -->
                        <label class="cont_panel--label">Seccion</label>
                        <label class="cont_panel--titulo"><?php echo $Not_Prin['seccion'];?></label>
                        
                        <!-- FECHA NOTICIA -->
                        <label class="cont_panel--label">Fecha</label>
                        <label class="cont_panel--fecha"><?php echo $Not_Prin['fecha'];?></label>

                        <!-- ACTUALIZAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/actualizar_noticia/<?php echo $Not_Prin['ID_Noticia'];?>" rel="noopener noreferrer">Actualizar</a>
                        
                        <!-- PUBLICIDAD -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/eliminar_noticia_principal/<?php echo $Not_Gen['ID_Noticia'];?>" rel="noopener noreferrer">Publicidad</a>
                        
                        <!-- ELIMINAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/eliminar_noticia/<?php echo $Not_Prin['ID_Noticia'];?>" rel="noopener noreferrer">Eliminar</a>
                    </div>
                </div>
                <?php
            endforeach  ?>     
        </fieldset>
    </div>
</body>
</html>