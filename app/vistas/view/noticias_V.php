<div class="cont_noticia" id="Cont_Noticia">
    <?php
    foreach($Datos['secciones'] as $Row) :?>
        <h1 class="cont_noticia--tituloSeccion"><?php echo $Row['seccion'];?></h1>  

        <section class="cont_noticia--seccion"> 
            <?php
            $Iterador = 1;
            foreach($Datos['noticiasGenerales'] as $Key) : 
                if($Row['seccion'] == $Key['seccion']){ ?>
                    <div class="cont_portada--noticia contenedor_tarjeta">
                        <div class="tarjeta tarjeta--noticias_V" id="Tarjeta_<?php echo $Iterador?>">
                            <div class="cont_noticia--sencilla Default_pointer adelante   adelante_atras--noticias_V">
                                <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'] . ',ConAnuncio';?>" rel="noopener noreferrer" target="_blank"><img class="cont_noticia-imagen" alt="Fotografia" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenNoticia'];?>"/></a>

                                <div class="cont_noticia--titular">
                                    <p class="cont_noticias--titulo"><?php echo $Key['titulo'];?></p>
                                    <hr class="cont_noticia--hr_1">
                                    
                                    <!-- INFORMACION -->
                                    <?php
                                    // CANTIDAD DE IMAGENES
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
                                    // COMENTARIOS
                                    foreach($Datos['cantidadCmentarios'] as $Row_10)   :  
                                        if($Key['ID_Noticia'] == $Row_10['ID_Noticia']){ 
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
                                        if($Key['ID_Noticia'] == $Row_2['ID_Noticia']){ ?>
                                            <small class="cont_noticias_informacion--span">+ Anuncio</small>
                                            <?php
                                        }
                                    endforeach; ?>

                                    <!-- FUENTE -->
                                    <br>
                                    <small class="cont_noticias_informacion--span"><?php echo $Key['fuente'];?></small>     

                                    <!-- FECHA -->
                                    <br>
                                    <small class="cont_noticias_informacion--span"><?php echo $Key['fechaPublicacion'];?></small style="font-size: 0.8em;">
                                    <br>                           
                                </div> 
                                <!-- COLECCION 180° -->
                                    <?php
                                //Se evala si la noticia tiene una serie de la colecion 180°
                                foreach($Datos['colecciones'] as $Row_5)   :  
                                    if($Key['ID_Noticia'] == $Row_5['ID_Noticia']){ ?>   
                                        <!-- <span class="VerMas_JS Default_pointer cont_noticias_giro material-icons-outlined">switch_left</span> -->
                                        <?php
                                        break;
                                    }
                                endforeach;  ?>  
                            </div>
                            
                            <!-- ********************************************************************** -->
                            <!-- TARJETA COLECCION 180° -->
                            <!-- ********************************************************************** -->

                            <div class="atras borde_1 adelante_atras--noticias_V" id="atras_<?php echo $Iterador?>">                         
                                <div class="">            
                                    <!-- IMAGEN PRINCIPAL COLECCION-->
                                    <div>
                                            <?php
                                        foreach($Datos['imagenesColeccion'] as $Row_6)   :  
                                            if($Key['ID_Noticia'] == $Row_6['ID_Noticia'] AND $Row_6['ImagenPrincipalColec'] == 1){     ?> 
                                            <figure>
                                                <img class="imagen--portada--cole noticiaImgColeccion--Atras" alt="Fotografia Coleccion" src="<?php echo RUTA_URL?>/public/images/colecciones/<?php echo $Row_6['nombre_imColeccion'];?>" id="Imagen_<?php echo $Iterador?>"/>  
                                            </figure> <?php
                                            }
                                        endforeach; ?>
                                    </div>

                                    <!-- IMAGENES COLECCION EN MINIATURAS-->
                                    <div style="display: flex; justify-content: center;"> 
                                        <?php              
                                        $Coleccion = [];
                                        foreach($Datos['imagenesColeccion'] as $Row_7) :   
                                            if($Key['ID_Noticia'] == $Row_7['ID_Noticia'] AND $Row_7['ImagenPrincipalColec'] != 1){ ?>

                                                <div style="margin-top: 1%">    
                                                    <figure>
                                                        <img class="cont_detalle--imagenMiniatura noticiaImgMiniatura--Atras borde_1" alt="Foto no disponible" src="<?php echo RUTA_URL?>/images/colecciones/<?php echo $Row_7['nombre_imColeccion'];?>" onclick="VerMiniatura(document.getElementById('Imagen_<?php echo $Iterador?>').src='<?php echo RUTA_URL;?>/public/images/colecciones/<?php echo $Row_7['nombre_imColeccion'];?>')"/>
                                                    </figure>
                                                </div> 
                                                <?php
                                            }
                                        endforeach; 
                                        ?>
                                    </div> 

                                    <!-- DESCRIPCION DE LA COLECCION -->
                                    <div class="cont_portada_atras--informacion">
                                        <?PHP
                                        foreach($Datos['colecciones'] as $Row_7) :   
                                            if($Key['ID_Noticia'] == $Row_7['ID_Noticia']){ ?>
                                                <!-- COLECCION -->
                                                <p class="cont_portada_atras--titulo"><?php echo $Row_7['nombreColeccion']?></p>
                                                <!-- SERIE -->
                                                <p class="cont_portada_atras--serie"><?php echo $Row_7['serie']?></p> 
                                                <hr class="cont_noticias_atras--hr_1">
                                                <!-- DESCRIPCION -->
                                                <p class="cont_portada_atras--descripcion Default_puntosSuspensivos"><?php echo $Row_7['descripcionColeccion']?></p>
                                                <?php
                                                break;
                                            }
                                        endforeach; ?>
                                    </div>
                                </div>                  

                                <!-- BOTON DE GIRO 180! -->
                                <span class="Cerrar_JS Default_pointer cont_noticias_giro--atras material-icons-outlined">switch_right</span>

                                <!-- MEMBRETE COLECCION 180° -->
                                <div class="cont_noticias_atras--coleccion">
                                    <p class="cont_noticias_atras--membrete">COLECCIÓN YARACUY EN 180°</p>
                                </div> 
                            </div>
                        </div>
                    </div>                        
                    <?php   
                }      
                $Iterador++;
            endforeach; ?>            
        </section>
                <?php
    endforeach; ?>
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Noticia.js?v=' . rand();?>"></script>