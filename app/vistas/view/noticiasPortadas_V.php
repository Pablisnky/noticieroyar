    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

    <div class="cont_panel--main">
        <fieldset class="fieldset_1" id="Not_Principales"> 
            <legend class="legend_1">Noticias en portada</legend>
             
            <?php
            foreach($Datos['noticiasPortadas'] as $Not_Prin) : ?>
                <div class="cont_panel--flex" id="<?php echo $Not_Prin['ID_Noticia'];?>">                
                    <!-- IMAGEN NOTICIA -->
                    <div class="cont_panel--flex-left">      
                        <figure>
                            <?php
                            foreach($Datos['imagenesNoticias'] as $Row)   : 
                                if($Not_Prin['ID_Noticia'] == $Row['ID_Noticia']){  ?>
                                    <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/noticias/<?php echo $Row['nombre_imagenNoticia'];?>"/> 
                                    <?php
                                }
                            endforeach; ?>
                        </figure>
                    </div>
                    <div  class="cont_panel--flex-right">
                        <!-- TITULO -->
                        <label class="cont_panel--label">Titulo</label>
                        <label class="cont_panel--titulo"><?php echo $Not_Prin['titulo'];?></label>
                                                
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
                        
                        <!-- MUNICIPIO -->
                        <label class="cont_panel--label">Municipio</label>
                        <label class="cont_panel--titulo"><?php echo $Not_Prin['municipio'];?></label>
                                                
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
                        <!-- <label class="cont_panel--label">Visitas</label> -->
                            <?php
                            foreach($Datos['visitas'] as $Row_2)   : 
                                if($Not_Prin['ID_Noticia'] == $Row_2['ID_Noticia']){     ?>
                                    <!-- <label class="cont_panel--fecha"><?php echo $Row_2['visitas'];?></label> -->
                                        <?php
                                }
                            endforeach; ?>
                        
                        <!-- COMPARTIR -->
                        <div>
                            <label class="cont_panel--label">Compartir</label>
                            <div class="detalle_cont--redesSociales--Panel">
                                <!-- COMPARTIR FACEBOOK -->       
                                <div class="detalle_cont--red">      
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Noticias_C/detalleNoticia/<?php echo $Not_Prin['ID_Noticia'];?>" target="_blank" rel="noopener noreferrer"><img style="height: 1.8em;" alt="facebook" src="<?php echo RUTA_URL?>/public/images/facebook.png"/></a>
                                </div> 
                                
                                <!-- COMPARTIR TWITTER -->
                                <div class="detalle_cont--red">
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo RUTA_URL;?>/Noticias_C/detalleNoticia/<?php echo $Not_Prin['ID_Noticia'];?>&text=<?php echo $Not_Prin['titulo'];?>" target="_blank"><img style="height: 2em;" src="<?php echo RUTA_URL?>/public/images/twitter.png"/></a>
                                </div>  

                                <!-- WHATSAPP -->
                                <div class="whatsapp detalle_cont--red">
                                    <a href="whatsapp://send?text=<?php echo $Not_Prin['titulo']?>&nbsp;<?php echo RUTA_URL?>/Noticias_C/detalleNoticia/<?php echo $Not_Prin['ID_Noticia'];?>" data-action="share/whatsapp/share"><img class="detalle_cont--redesSociales-Whatsapp" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/></a>
                                </div>            
                            </div>

                            <!-- EDITAR -->
                            <a style="margin-left: ; color: blue;" href="<?php echo RUTA_URL?>/Panel_C/actualizar_noticia/<?php echo $Not_Prin['ID_Noticia'];?>" rel="noopener noreferrer">Editar</a>
                                                        
                            <!-- ELIMINAR -->
                            <label style="margin-left: 50px; color: blue;" class="Default_pointer" onclick="EliminarNoticia('<?php echo $Not_Prin['ID_Noticia'];?>','<?php echo $Datos['imagenesNoticias'][0]['nombre_imagenNoticia'];?>')">Eliminar</label>
                        </div>
                    </div>
                </div>
                <?php
            endforeach  ?>     
        </fieldset>
    </div>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_NoticiasPortadas.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_NoticiasPortadas.js?v=' . rand();?>"></script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>