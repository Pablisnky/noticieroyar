<!-- Archivo cargado via AJAX en inicio_V.php -->
<!-- <div class="cont_portada" id="Cont_Portada"> -->
    <?php
    $Iterador = 1;
    foreach($Datos['noticia'] as $Key) :   ?>
        <div class="cont_portada--noticia contenedor_tarjeta">
            <div class="tarjeta" id="Tarjeta_<?php echo $Iterador?>">
                <div class="adelante borde_1" id="adelante_<?php echo $Iterador?>">
                    <!-- IMAGEN -->
                    <div class="cont_portada--imagen">                                                     
                        <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'];?>" rel="noopener noreferrer" target="_blank"><img class="imagen--portada" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['noticia'][0]['nombre_imagenNoticia'];?>"/></a>
                    </div>

                    <!-- TITULAR -->
                    <div class="cont_portada--titular">                   
                        <h2 class="titular--texto"><?php echo $Datos['noticia'][0]['titulo'];?></h2>
                    </div>
                                
                    <!-- RESUMEN -->
                    <div class="cont_portada--texto">                   
                        <h2 class="cont_portada--resumen"><?php echo $Key['subtitulo'];?></h2>
                    </div>

                    <!-- INFORMACION -->
                    <div class="cont_portada--informacion">
                        <hr class="cont_noticia--hr_1 Default_quitarMovil">
                        <?php
                        // CANTIDAD DE IMAGENES
                        foreach($Datos['cantidadImagenes'] as $Row)   :  
                            if($Key['ID_Noticia'] == $Row['ID_Noticia']){ 
                                if($Row['cantidad'] > 1 ){ ?> 
                                    <small class="cont_portada_informacion--span"><?php echo $Row['cantidad'];?> imagenes</small> 
                                    <?php
                                }
                                else{   ?>
                                    <small class="cont_portada_informacion--span"><?php echo $Row['cantidad'];?> imagen</small> 
                                    <?php
                                }      
                            }
                        endforeach;
                        // VIDEO
                        foreach($Datos['videos'] as $Row_4)  : 
                            if($Key['ID_Noticia'] == $Row_4['ID_Noticia']){ ?> 
                                <small class="cont_portada_informacion--span">video</small> 
                                <?php
                            }
                        endforeach;
                        // COMENTARIOS
                        foreach($Datos['comentario'] as $Row_9)   :  
                            if($Key['ID_Noticia'] == $Row_9['ID_Noticia']){ 
                                if($Row_9['cantidadComentario'] > 1 ){ ?>
                                    <small class="cont_portada_informacion--span"><?php echo $Row_9['cantidadComentario']?> Comentarios</small>
                                    <?php
                                }
                                else{   ?>
                                    <small class="cont_portada_informacion--span"><?php echo $Row_9['cantidadComentario'];?> Comentario</small> 
                                    <?php
                                }    
                            }
                        endforeach; 
                        // SI EXISTE ANUNCIO PUBLICITARIO
                        foreach($Datos['anuncios'] as $Row_2)   :  
                            if($Key['ID_Noticia'] == $Row_2['ID_Noticia']){ ?>
                                <small class="cont_portada_informacion--span">+ Anuncio</small>
                                <?php
                            }
                        endforeach;  ?>     
                        <!-- FUENTE -->
                        <br>
                        <small class="cont_portada_informacion--span"><?php echo $Key['fuente'];?></small>
                           
                        <!-- FECHA -->
                        <br>
                        <small class="cont_portada_informacion--span"><?php echo $Key['fechaPublicacion'];?></small>
                    </div> 

                    <!-- COLECCION 180?? -->
                        <?php
                    foreach($Datos['colecciones'] as $Row_5)   :  
                        if($Key['ID_Noticia'] == $Row_5['ID_Noticia']){ ?>   
                            <span class="VerMas_JS Default_pointer cont_portada_giro material-icons-outlined ">switch_left</span>
                            <?php
                        }
                    endforeach;  ?>  
                </div>            
                <div class="atras borde_1" id="atras_<?php echo $Iterador?>">                         
                    <div class="">            
                        <!-- IMAGEN PRINCIPAL COLECCION-->
                            <?php
                        foreach($Datos['colecciones'] as $Row_6)   :  
                            if($Key['ID_Noticia'] == $Row_6['ID_Noticia'] AND $Row_6['ImagenPrincipalColec'] == 1){     ?> 
                            <figure id="Contenedor_Imagen">
                                <img class="imagen--portada--cole" alt="Fotografia Coleccion" src="<?php echo RUTA_URL?>/public/images/colecciones/<?php echo $Row_6['nombre_imColeccion'];?>" id="Imagen_<?php echo $Iterador?>"/>  
                            </figure> <?php
                            }
                        endforeach; ?>
                        
                        <!-- IMAGENES COLECCION EN MINIATURAS-->
                        <div style="display: flex; justify-content: center;">     
                            <?php              
                            foreach($Datos['colecciones'] as $Row_7) :   
                                if($Key['ID_Noticia'] == $Row_7['ID_Noticia']){  ?>
                                    <div style="margin-top: 1%">
                                        <figure>
                                            <img class="cont_detalle--imagenMiniatura borde_1" alt="Foto no disponible" src="<?php echo RUTA_URL?>/images/colecciones/<?php echo $Row_7['nombre_imColeccion'];?>" onclick="VerMiniatura(document.getElementById('Imagen_<?php echo $Iterador?>').src='<?php echo RUTA_URL;?>/public/images/colecciones/<?php echo $Row_7['nombre_imColeccion'];?>')"/>
                                        </figure>
                                    </div>
                                    <?php
                                }
                            endforeach; ?>
                        </div> 
                    </div>                  
                    <!-- DESCRIPCION DE LA COLECCION -->
                    <div>
                        <?PHP
                        foreach($Datos['colecciones'] as $Row_7) :   
                            if($Key['ID_Noticia'] == $Row_7['ID_Noticia']){ ?>
                                <!-- COLECCION -->
                                <p class="cont_portada_atras--titulo"><?php echo $Row_7['nombreColeccion']?></p>
                                <!-- DESCRIPCION -->
                                <p class="cont_portada_atras--descripcion Default_puntosSuspensivos"><?php echo $Row_7['descripcionColeccion']?></p>
                                <?php
                                break;
                            }
                        endforeach; ?>
                    </div>

                    <!-- BOTON DE GIRO 180! -->
                    <span class="Cerrar_JS Default_pointer cont_portada_giro cont_portada_giro--atras material-icons-outlined">switch_right</span>
                    
                    <!-- MEMBRETE COLECCION 180?? -->
                    <div class="cont_portada_atras--coleccion">
                        <p class="cont_portada_atras--membrete">COLECCI??N YARACUY EN 180??</p>
                        <p class="cont_portada_atras--serie">Serie: <?php echo $Row_7['serie']?></p> 
                    </div> 
                </div>
            </div>
        </div>         
        
        <!-- BOTONES DEL PANEL FRONTAL -->
        <div class="cont_portada--botones">
            <div>
                <span class="material-icons-outlined Default_pointer Default--seleccion" onclick="Llamar_NoticiaAnterior('<?php echo $Key['ID_Noticia'];?>')">arrow_back_ios_new</span>
            </div>
            <div>
                <label class="boton boton--corto"><a class="Default_font--white" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
            </div>         
            <div>
                <span class="material-icons-outlined Default_pointer Default--seleccion" onclick="Llamar_NoticiaPosterior('<?php echo $Key['ID_Noticia'];?>')">arrow_forward_ios</span>
            </div>
        </div>    
        <?php
        $Iterador++;
    endforeach; ?>
<!-- </div>   -->