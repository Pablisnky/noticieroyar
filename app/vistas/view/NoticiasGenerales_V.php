    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>
   
    <div style="margin-left:20%;">
        <fieldset class="fieldset_1">
            <legend class="legend_1">Noticias generales</legend>
            <?php
            foreach($Datos['noticiasGenerales'] as $Not_Gen) : ?>
                <div style="display: flex; margin-bottom: 30px;">
                    <!-- IMAGN NOTICIA -->
                    <div style="width: 30%; margin-right: 1.5%;">          
                        <figure>
                            <?php
                            foreach($Datos['imagenesNoticiasGenerales'] as $Row)   : 
                                if($Not_Gen['ID_Noticia'] == $Row['ID_Noticia']){  ?>
                                    <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_imagenNoticia'];?>"/> 
                                    <?php
                                }
                            endforeach; ?>
                        </figure>
                    </div>
                    <div style="width: 100%">
                        <!-- TITULO -->
                        <label class="cont_panel--label">Titulo</label>
                        <label class="cont_panel--titulo"><?php echo $Not_Gen['titulo'];?></label>
                        
                        <!-- SUBTITULO -->
                        <label class="cont_panel--label">Resumen</label>
                        <label class="cont_panel--resumen"><?php echo $Not_Gen['subtitulo'];?></label>
                        
                        <!-- SECCION -->
                        <label class="cont_panel--label">Seccion</label>
                        <ul class="cont_panel--seccion--ul">
                            <?php
                            foreach($Datos['seccionessNoticiasGenerales'] as $Key)   : 
                                if($Not_Gen['ID_Noticia'] == $Key['ID_Noticia']){  ?>
                                    <li class="cont_panel--seccion--li"><?php echo $Key['seccion'];?></li>
                                    <?php
                                }
                            endforeach; ?>
                        </ul>
                        
                        <!-- FECHA -->
                        <label class="cont_panel--label">Fecha</label>
                        <label class="cont_panel--fecha"><?php echo $Not_Gen['fecha'];?></label>

                        <!-- ACTUALIZAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/actualizar_noticia/<?php echo $Not_Gen['ID_Noticia'];?>" rel="noopener noreferrer">Actualizar</a>
                        
                        <!-- PUBLICIDAD -->
                        <a href="<?php echo RUTA_URL?>/Panel_C<?php echo $Not_Gen['ID_Noticia'];?>" rel="noopener noreferrer">Publicidad</a>
                        
                        <!-- ELIMINAR -->
                        <a href="<?php echo RUTA_URL?>/Panel_C/eliminar_noticia/<?php echo $Not_Gen['ID_Noticia'];?>" rel="noopener noreferrer">Eliminar</a>
                    </div>
                </div>
                <?php
            endforeach  ?>             
        </fieldset>
    </div>
</body>
</html>