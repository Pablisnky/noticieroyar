<!-- Archivo cargado via AJAX en inicio_V.php -->
<!-- <div class="cont_portada" id="Cont_Portada"> -->
    <?php
    $Iterador = 1;
    foreach($Datos['noticia'] as $Key) :   ?>
        <div class="cont_portada--noticia contenedor_tarjeta">
            <div class="tarjeta" id="Tarjeta_<?php echo $Iterador?>">
                <div class=" borde_1 borde_3" id="adelante_<?php echo $Iterador?>">
                    <!-- IMAGEN -->
                    <!-- <div class="cont_portada--imagen">                                                      -->
                        <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'];?>" rel="noopener noreferrer" target="_blank"><img class="imagen--portada" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/noticias/<?php echo $Datos['noticia'][0]['nombre_imagenNoticia'];?>"/></a>
                    <!-- </div> -->

                    <div class="cont_portada--tituloResumen">
                        <!-- TITULAR -->
                        <div class="cont_portada--titular">                   
                            <h2 class="titular--texto"><?php echo $Datos['noticia'][0]['titulo'];?></h2>
                        </div>
                                    
                        <!-- RESUMEN -->
                        <div class="cont_portada--texto Default_puntosSuspensivos">                   
                            <h2 class="cont_portada--resumen"><?php echo $Key['subtitulo'];?></h2>
                        </div>
                    </div>

                    <!-- INFORMACION EN ICONOS  -->
                    <div class="cont_portada--informacion">
                        <?php
                        // CANTIDAD DE IMAGENES
                        foreach($Datos['cantidadImagenes'] as $Row)   :  
                            if($Key['ID_Noticia'] == $Row['ID_Noticia']){ ?> 
                                <div style="display: flex; align-items:center;">
                                    <small style="margin-right: 5px"><?php echo $Row['cantidad'];?></small> 
                                    <img style="width: 1.4em" src="<?php echo RUTA_URL . '/public/iconos/imagenes/outline_photo_camera_black_24dp.png'?>"/>
                                </div>
                                    <?php  
                            }
                        endforeach;

                        // VIDEO
                        if($Datos['videos'] != Array ()){
                            foreach($Datos['videos'] as $Row_4)  : 
                                if($Key['ID_Noticia'] == $Row_4['ID_Noticia']){ ?> 
                                    <div style="display: flex; align-items:center;">
                                        <small style="margin-right: 5px">1</small> 
                                        <img style="width: 1.8em" src="<?php echo RUTA_URL . '/public/iconos/video/outline_videocam_black_24dp.png'?>"/>                            
                                    </div>
                                    <?php
                                }
                            endforeach;   
                        }                         
                        else{   ?>
                            <div style="display: flex; align-items:center;">
                                <small style="margin-right: 5px">0</small>
                                <img style="width: 1.8em" src="<?php echo RUTA_URL . '/public/iconos/video/outline_videocam_black_24dp.png'?>"/>                               
                            </div>
                            <?php
                        }

                        // COMENTARIOS 
                            if($Datos['comentario'] != 'NULL'){  ?>
                                <div style="display: flex; align-items:center; ">
                                    <small style="margin-right: 5px"><?php echo $Datos['comentario']['cantidadComentario']?></small>
                                    <img style="width: 1.4em" src="<?php echo RUTA_URL . '/public/iconos/comentario/outline_speaker_notes_black_24dp.png'?>"/>
                                </div>
                                    <?php
                            }
                            else{   ?>
                                <div style="display: flex; align-items:center;">
                                    <small style="margin-right: 5px">0</small>
                                    <img style="width: 1.4em" src="<?php echo RUTA_URL . '/public/iconos/comentario/outline_speaker_notes_black_24dp.png'?>"/>
                                </div>
                                <?php
                            }  

                        // SI EXISTE ANUNCIO PUBLICITARIO
                        foreach($Datos['anuncios'] as $Row_2)   :  
                            if($Key['ID_Noticia'] == $Row_2['ID_Noticia']){ ?>
                                <div style="display: flex; align-items:center;">
                                    <small style="font-weight: bold;">+ Anuncio</small>
                            </div>
                                <?php
                            }
                        endforeach;  ?>  
                    </div>

                    <div style="background-color: ">   
                        <!-- FUENTE -->
                        <small class="cont_portada_informacion--span"><?php echo $Key['fuente'];?></small>
                           
                        <!-- FECHA -->
                        <br>
                        <small class="cont_portada_informacion--span"><?php echo $Key['fechaPublicacion'];?></small>
                    </div> 

                    <!-- COLECCION 180° -->
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
                    
                    <!-- MEMBRETE COLECCION 180° -->
                    <div class="cont_portada_atras--coleccion">
                        <p class="cont_portada_atras--membrete">COLECCIÓN YARACUY EN 180°</p>
                        <p class="cont_portada_atras--serie">Serie: <?php echo $Row_7['serie']?></p> 
                    </div> 
                </div>
            </div>
        </div>         
        
        <!-- BOTONES DEL PANEL FRONTAL -->
        <div class="cont_portada--botones">
            <div>
                <img class="Default_pointer" style="text-align: center; display:block; margin: auto; font-size: 2em;" onclick="Llamar_NoticiaAnterior('<?php echo $Key['ID_Noticia'];?>')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_new_black_24dp.png'?>"/>
            </div>
            <div>
                <label class="boton boton--corto"><a class="Default_font--white" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
            </div>         
            <div>
                <img class="Default_pointer" style="text-align: center; display:block; margin: auto; font-size: 2em;" onclick="Llamar_NoticiaPosterior('<?php echo $Key['ID_Noticia'];?>')"src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_black_24dp.png'?>"/>
            </div>
        </div>    
        <?php
        $Iterador++;
    endforeach; ?>
<!-- </div>   -->