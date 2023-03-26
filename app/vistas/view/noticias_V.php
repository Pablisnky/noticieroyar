<!-- Muestra todas las noticias por cada sección, inicialmente solo muestra las 15 mas reciente, y permite ir al archivo de cada sección -->

<div class="cont_noticia" id="Cont_Noticia">
    <?php
    foreach($Datos['secciones'] as $Row) :?>
        <h1 class="cont_noticia--tituloSeccion"><?php echo $Row['seccion'];?></h1>  

        <section class="cont_noticia--seccion"> 
            <?php
            $Iterador = 1;
            foreach($Datos['noticiasSeccion'] as $Key) : 
                foreach($Key as $Key_2) :
                    if($Row['ID_Seccion'] == $Key_2['ID_Seccion']){ ?>
                        <div class="cont_portada--noticia contenedor_tarjeta">
                            <div class="tarjeta tarjeta--noticias_V" id="Tarjeta_<?php echo $Iterador?>">
                                <div class="cont_noticia--sencilla Default_pointer adelante   adelante_atras--noticias_V">
                                    <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key_2['ID_Noticia'] . ',ConAnuncio';?>" rel="noopener noreferrer" target="_blank"><img class="cont_noticia-imagen" alt="Fotografia" src="<?php echo RUTA_URL?>/public/images/noticias/<?php echo $Key_2['nombre_imagenNoticia'];?>"/></a>

                                    <div class="cont_noticia--titular">
                                        <p class="cont_noticias--titulo"><?php echo $Key_2['titulo'];?></p>
                                        <hr class="cont_noticia--hr_1">
                                        
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
                            </div>
                        </div>                        
                        <?php   
                    }      
                    $Iterador++;
                
                endforeach; 
            endforeach; ?>      
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
        </section>
                <?php
    endforeach; ?>
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Noticia.js?v=' . rand();?>"></script>