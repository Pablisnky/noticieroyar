<!-- Archivo llamado via AJAX por medio de la función -->
<?php
if($Datos['noticiasSeccion'] != Array ()){
    $Iterador = 1;
    foreach($Datos['noticiasSeccion'] as $Key_2) :  ?>
        <div class="cont_noticia--sencilla Default_pointer">
            
            <!-- IMAGEN -->
            <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key_2['ID_Noticia'];?>" rel="noopener noreferrer" target="_blank">
                <div style="display: flex;">
                    <div style="flex-grow: 1;flex-shrink: 1;">
                        <img class="cont_noticia-imagen" style="border-top-left-radius: 15px;" alt="Fotografia" src="<?php echo RUTA_URL?>/public/images/noticias/<?php echo $Key_2['nombre_imagenNoticia'];?>"/>
                    </div>
                    <?php
                    if($Key_2['municipio'] != ''){    ?>
                        <!-- TEXTO VERTICAL -->
                        <div class="cont_portada--municipio cont_noticia--verticlal">
                            <p class="cont_portada--municipio--p cont_noticia--verticlal--p"><?php echo $Key_2['municipio'];?> </p>
                            <p class="cont_portada--abreviatura cont_noticia--abreviatura--verticlal">Mcpio</p>
                        </div>
                        <?php
                    } ?>   
                </div>                  
            </a>                          

            <div class="cont_noticia--titular">
                <p class="cont_noticias--titulo"><?php echo $Key_2['titulo'];?></p>
                
                <!-- INFORMACION -->
                <?php
                // CANTIDAD DE IMAGENES
                foreach($Datos['imagenes'] as $Row_3)   :  
                    if($Key_2['ID_Noticia'] == $Row_3['ID_Noticia']){ 
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
                    if($Key_2['ID_Noticia'] == $Row_4['ID_Noticia']){ ?> 
                        <small class="cont_noticias_informacion--span">video</small> 
                        <?php
                    }
                endforeach;
                
                // COMENTARIOS
                foreach($Datos['cantidadCmentarios'] as $Row_10)   :  
                    if($Key_2['ID_Noticia'] == $Row_10['ID_Noticia']){ 
                        if($Row_10['cantidadComentario'] > 1 ){ ?>
                            <small class="cont_portada_informacion--span"><?php echo $Row_10['cantidadComentario']?> Comentarios</small>
                            <?php
                        }
                        else{   ?>
                            <small class="cont_portada_informacion--span"><?php echo $Row_10['cantidadComentario'];?> Comentario</small> 
                            <?php
                        }    
                    }
                endforeach; 
                //  SI EXISTE ANUNCIO PUBLICITARIO
                foreach($Datos['anuncios'] as $Row_2)   :  
                    if($Key_2['ID_Noticia'] == $Row_2['ID_Noticia']){ ?>
                        <small class="cont_noticias_informacion--span">+ Anuncio</small>
                        <?php
                    }
                endforeach; ?>

                <!-- FUENTE -->
                <br>
                <small class="cont_noticias_informacion--span"><?php echo $Key_2['fuente'];?></small>     

                <!-- FECHA -->
                <br>
                <small class="cont_noticias_informacion--span"><?php echo $Key_2['fechaPublicacion'];?></small style="font-size: 0.8em;">
                <br>                           
            </div>  
        </div>
            <?php   
    endforeach; ?>      

    <!-- CANTIDAD DE NOTICIAS POR SECCION -->
    <div class="cont_noticias--libreria">        
        <?php        
        foreach($Datos['cantidadSeccion'] as $Key) : 
            foreach($Key as $Key_2) :
                if($Row['ID_Seccion'] == $Key_2['ID_Seccion']){ ?>                    
                    <a style="display: block; text-align: center;" href="<?php echo RUTA_URL . '/Noticias_C/archivo/' . $Row['ID_Seccion'];?>" rel="noopener noreferrer" target="_blank"><img class="Default_pointer" style="width: 2.5em; margin-left:41%;" src="<?php echo RUTA_URL . '/public/iconos/library/outline_library_books_black_24dp.png'?>"/>+ <?php echo $Key_2['cantidad'] - 15?> Noticias</a>
                    <?php
                }
            endforeach;
        endforeach;
        ?>
    </div>   
    <?php
}
else{   ?>
    <div class="cont_noticia-sinRegistro borde_1">
        <div>
            <img style="width: 3em; display: block;margin: auto" src="<?php echo RUTA_URL . '/public/iconos/error/outline_error_outline_black_24dp.png'?>"/>
            <p>No se han encontrados noticias de <?php echo $Datos['seccion'];?> para el Mcpio. <?php echo $Datos['municipio'];?></p>
        </div>
    </div>
    <?php
}   ?>