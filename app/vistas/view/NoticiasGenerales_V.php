<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

    <!--PANEL NOTICIAS GENERALES -->       
        <div style="margin-left:20%;">
            <fieldset class="fieldset_1">
                <a id="Not_Generales" class="ancla_2"></a>
                <legend class="legend_1">Noticias generales</legend>
                <?php
                foreach($Datos['noticiasGenerales'] as $Not_Gen) : ?>
                    <div style="display: flex; margin-bottom: 30px;">
                        <!-- IMAGN NOTICIA -->
                        <div class="cont_panel__did-1">          
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
                            <!-- TITULO NOTICIA -->
                            <label class="cont_panel--titulo"><?php echo $Not_Gen['titulo'];?></label>
                            
                            <!-- SUBTITULO NOTICIA -->
                            <label class="cont_panel--label"><?php echo $Not_Gen['subtitulo'];?></label>
                            
                            <!-- SECCION NOTICIA -->
                            <label class="cont_panel--label"><?php echo $Not_Gen['seccion'];?></label>
                            
                            <!-- FECHA NOTICIA -->
                            <label class="cont_panel--label"><?php echo $Not_Gen['fecha'];?></label>

                            <!-- ACTUALIZAR -->
                            <a class="" href="<?php echo RUTA_URL?>/Panel_C/actualizar_noticia/<?php echo $Not_Gen['ID_Noticia'];?>" rel="noopener noreferrer">Actualizar</a>
                            
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
       
<!-- <script src="<?php echo RUTA_URL;?>/public/javascript/funcionesVarias.js?v=<?php echo rand();?>"></script> -->
<script src="<?php echo RUTA_URL;?>/public/javascript/E_SalomonPanel.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/A_SalomonPanel.js?v=<?php echo rand();?>"></script>