<div class="cont_noticia" id="Cont_Noticia">
    <?php
    foreach($Datos['secciones'] as $Row) :?>
        <h1 class="cont_noticia--tituloSeccion"><?php echo $Row['seccion'];?></h1>  
        <section class="cont_noticia--seccion">
            <?php
            foreach($Datos['noticiasGenerales'] as $Key) : 
                if($Row['seccion'] == $Key['seccion']){ ?>
                <div class="cont_noticia--sencilla Default_pointer">
                    <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'];?>" rel="noopener noreferrer" target="_blank"><img class="cont_noticia-imagen" alt="Fotografia" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenNoticia'];?>"/></a>

                    <div class="cont_noticia--titular">
                        <p class="cont_noticias--titulo"><?php echo $Key['titulo'];?></p>
                        <hr class="cont_noticia--hr_1">
                        <!-- FECHA -->
                        <small class="cont_noticias_informacion--span"><?php echo $Key['fecha'];?></small style="font-size: 0.8em;">
                        <?php
                        // IMAGENES
                        foreach($Datos['imagenes'] as $Row_3)   :  
                            if($Key['ID_Noticia'] == $Row_3['ID_Noticia']){ 
                                if($Row_3['cantidad'] == 1){ ?> 
                                    <small class="cont_noticias_informacion--span"><?php echo $Row_3['cantidad'];?> imagen</small>
                                    <?php
                                }
                                else{   ?>
                                    <small class="cont_noticias_informacion--span"><?php echo $Row_3['cantidad'];?> imagenes</small>   
                                    <?php
                                } 
                            }
                        endforeach; 
                        // VIDEO
                        foreach($Datos['videos'] as $Row_4)  : 
                            if($Key['ID_Noticia'] == $Row_4['ID_Noticia']){ ?> 
                                <small class="cont_noticias_informacion--span">video</small> 
                                <?php
                            }
                        endforeach;
                        // ANUNCIO PUBLICITARIO
                        foreach($Datos['anuncios'] as $Row_2)   :  
                            if($Key['ID_Noticia'] == $Row_2['ID_Noticia']){ ?>
                                <small class="cont_noticias_informacion--span">+ Anuncio</small>
                                <?php
                            }
                        endforeach; ?>
                        <!-- FUENTE -->
                        <br>
                        <small class="cont_noticias_informacion--span"><?php echo $Key['fuente'];?></small>
                        <!-- <small style="font-size: 0.8em; display:block">hace dos dias</small style="font-size: 0.8em;">
                        <small style="font-size: 0.8em; display:block">20 visualizaciones</small style="font-size: 0.8em;"> -->
                    </div> 
                </div>
                    <?php   
                }      
            endforeach; ?>            
        </section>
                <?php
    endforeach; ?>
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Noticia.js?v=' . rand();?>"></script>