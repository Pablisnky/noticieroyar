<?php
foreach($Datos['noticiasTitular'] as $Not_Gen) : ?>
    <div style="display: flex; margin-bottom: 30px;" id="<?php echo $Not_Gen['ID_Noticia'];?>">
        <!-- IMAGN NOTICIA -->
        <div style="width: 30%; margin-right: 1.5%;">          
            <figure>
                <?php
                foreach($Datos['imagenesNoticia'] as $Row)   : 
                    if($Not_Gen['ID_Noticia'] == $Row['ID_Noticia']){  ?>
                        <img class="cont_panel--imagen" name="imagenPrincipal" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/noticias/<?php echo $Row['nombre_imagenNoticia'];?>"/> 
                        <?php
                    }
                endforeach; ?>
            </figure>
        </div>
        <div style="width: 100%">
            <!-- TITULO -->
            <label class="cont_panel--label">Titulo</label>
            <label class="cont_panel--titulo"><?php echo $Not_Gen['titulo'];?></label>
                                    
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
            
            <!-- MUNICIPIO -->
            <label class="cont_panel--label">Municipio</label>
            <label class="cont_panel--titulo"><?php echo $Not_Gen['municipio'];?></label>
                                    
            <!-- ANUNCIO -->
            <label class="cont_panel--label">Anuncio publicitario</label>
            <?php
                // foreach($Datos['publicidad'] as $Row_3)   : 
                    // if($Not_Gen['ID_Noticia'] == $Row_3['ID_Noticia']){  ?>
                        <!-- <label class="cont_panel--fecha"><?php echo $Row_3['razonSocial'];?></label> -->
                            <?php
                    // }
                // endforeach; ?>

            <!-- FECHA -->
            <label class="cont_panel--label">Fecha</label>
            <label class="cont_panel--fecha"><?php echo $Not_Gen['fechaPublicacion'];?></label>

            <!-- VISITAS -->
            <!-- <label class="cont_panel--label">Visitas</label> -->
                <?php
                // foreach($Datos['visitas'] as $Row_2)   : 
                    // if($Not_Gen['ID_Noticia'] == $Row_2['ID_Noticia']){     ?>
                        <!-- <label class="cont_panel--fecha"><?php echo $Row_2['visitas'];?></label> -->
                            <?php
                    // }
                // endforeach; ?>

            <div>
                <div class=" detalle_cont--redesSociales--Panel">
                    <!-- COMPARTIR FACEBOOK -->       
                    <div class="detalle_cont--red">      
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Noticias_C/detalleNoticia/<?php echo $Not_Gen['ID_Noticia'];?>" target="_blank" rel="noopener noreferrer"><img style="height: 1.8em;" alt="facebook" src="<?php echo RUTA_URL?>/public/images/facebook.png"/></a>
                    </div> 
                    
                    <!-- COMPARTIR TWITTER -->
                    <div class="detalle_cont--red">
                        <a href="https://twitter.com/intent/tweet?url=<?php echo RUTA_URL;?>/Noticias_C/detalleNoticia/<?php echo $Not_Gen['ID_Noticia'];?>&text=<?php echo $Not_Prin['titulo'];?>" target="_blank"><img style="height: 2em;" src="<?php echo RUTA_URL?>/public/images/twitter.png"/></a>
                    </div>  
                </div>
                                            
                <!-- EDITAR -->
                <a style="margin-left: 10%" href="<?php echo RUTA_URL?>/Panel_C/actualizar_noticia/<?php echo $Not_Gen['ID_Noticia'];?>" rel="noopener noreferrer">Editar</a>
                                        
                <!-- ELIMINAR -->
                <label style="margin-left: 50px; color: blue;" class="Default_pointer" onclick="EliminarNoticia('<?php echo $Not_Gen['ID_Noticia'];?>','<?php echo $Datos['imagenesNoticia'][0]['nombre_imagenNoticia'];?>')">Eliminar</label>
            </div>
        </div>
    </div>
    <?php
endforeach  ?>      
 