    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

    <div style="margin-left: 20%;">
        <fieldset class="fieldset_1" id="Not_Principales"> 
            <legend class="legend_1">Noticias en portada</legend>
            <?php
            foreach($Datos['noticiasPortadas'] as $Not_Prin) : ?>
                <div style=" display: flex; margin-bottom: 30px" id="<?php echo $Not_Prin['ID_Noticia'];?>">                
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
                        <!-- TITULO -->
                        <label class="cont_panel--label">Titulo</label>
                        <label class="cont_panel--titulo"><?php echo $Not_Prin['titulo'];?></label>
                        
                        <!-- SUBTITULO -->
                        <!-- <label class="cont_panel--label">Resumen</label>
                        <label class="cont_panel--resumen"><?php echo $Not_Prin['subtitulo'];?></label> -->
                        
                        <!-- SECCION -->
                        <label class="cont_panel--label">Seccion</label>                            
                        <ul class="cont_panel--seccion--ul">
                            <?php
                            foreach($Datos['seccionesNoticiasPortadas'] as $Key)   : 
                                if($Not_Prin['ID_Noticia'] == $Key['ID_Noticia']){  ?>
                                    <li class="cont_panel--seccion--li"><?php echo $Key['seccion'];?></li>
                                    <?php
                                }
                            endforeach; ?>
                        </ul>
                        
                        <!-- COLECCION -->
                        <label class="cont_panel--label">Coleccion 180°</label>
                        <?php
                            foreach($Datos['coleccion'] as $Row_3)   : 
                                if($Not_Prin['ID_Noticia'] == $Row_3['ID_Noticia']){  ?>
                                    <label class="cont_panel--fecha"><?php echo $Row_3['nombreColeccion'];?></label>
                                        <?php
                                }
                            endforeach; ?>
                        
                        <!-- ANUNCIO -->
                        <label class="cont_panel--label">Anuncio publicitario</label>
                        <?php
                            foreach($Datos['publicidad'] as $Row_3)   : 
                                if($Not_Prin['ID_Noticia'] == $Row_3['ID_Noticia']){  ?>
                                    <label class="cont_panel--fecha"><?php echo $Row_3['razonSocial'];?></label>
                                        <?php
                                }
                            endforeach; ?>

                        <!-- FECHA -->
                        <label class="cont_panel--label">Fecha</label>
                        <label class="cont_panel--fecha"><?php echo $Not_Prin['fechaPublicacion'];?></label>

                        <!-- VISITAS -->
                        <label class="cont_panel--label">Visitas</label>
                            <?php
                            foreach($Datos['visitas'] as $Row_2)   : 
                                if($Not_Prin['ID_Noticia'] == $Row_2['ID_Noticia']){     ?>
                                    <label class="cont_panel--fecha"><?php echo $Row_2['visitas'];?></label>
                                        <?php
                                }
                            endforeach; ?>
                        
                        <div id="PanelEdicion">
                            <!-- COMPARTIR -->             
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Noticias_C/detalleNoticia/<?php echo $Not_Prin['ID_Noticia'];?>" target="_blank">Compartir</a>

                            <!-- EDITAR -->
                            <a style="margin-left: 50px; color: blue;" href="<?php echo RUTA_URL?>/Panel_C/actualizar_noticia/<?php echo $Not_Prin['ID_Noticia'];?>" rel="noopener noreferrer">Editar</a>
                                                        
                            <!-- ELIMINAR -->
                            <label style="margin-left: 50px; color: blue;" class="Default_pointer" onclick="EliminarNoticia('<?php echo $Not_Prin['ID_Noticia'];?>')">Eliminar</label>
                        </div>
                    </div>
                </div>
                <?php
            endforeach  ?>     
        </fieldset>
    </div>

<script src="<?php echo RUTA_URL.'/public/javascript/E_NoticiasPortadas.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_NoticiasPortadas.js?v=' . rand();?>"></script>

<!-- FOOTER -->
<?php require(RUTA_APP . '/vistas/footer/footer.php');?>