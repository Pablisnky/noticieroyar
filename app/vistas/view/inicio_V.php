<!-- VENTANA MODAL INICIAL -->
<?php //require(RUTA_APP . '/vistas/modal/modal_anuncio.php');?>

<div class="cont_portada" id="Cont_Portada">
    <?php
    $Iterador = 1;
    foreach($Datos['datosNoticia'] as $Key) :  ?>
        <div class="cont_portada--noticia contenedor_tarjeta">
            <div class="tarjeta" id="Tarjeta_<?php echo $Iterador?>">
                <div class="borde_1 adelante" id="adelante_<?php echo $Iterador?>">
                    <!-- IMAGEN -->
                    <div class="cont_portada--imagen Default_pointer">                        
                        <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'] . ',ConAnuncio';?>" rel="noopener noreferrer" target="_blank"><img class="imagen--portada efectoBrillo" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenNoticia'];?>"/></a>
                    </div>
                    
                    <!-- TITULAR -->
                    <div class="cont_portada--titular">                   
                        <h2 class="titular--texto"><?php echo $Key['titulo'];?></h2>
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
                        foreach($Datos['imagenes'] as $Row_3)  : 
                            if($Key['ID_Noticia'] == $Row_3['ID_Noticia']){  
                                if($Row_3['cantidad'] > 1 ){ ?>
                                    <small class="cont_portada_informacion--span"><?php echo $Row_3['cantidad'];?> imagenes</small> 
                                    <?php
                                }
                                else{   ?>
                                    <small class="cont_portada_informacion--span"><?php echo $Row_3['cantidad'];?> imagen</small> 
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
                        foreach($Datos['cantidadComentario'] as $Row_6)   :  
                            if($Key['ID_Noticia'] == $Row_6['ID_Noticia']){ 
                                if($Row_6['cantidadComentario'] > 1 ){ ?>
                                    <small class="cont_portada_informacion--span"><?php echo $Row_6['cantidadComentario']?> Comentarios</small>
                                    <?php
                                }
                                else{   ?>
                                    <small class="cont_portada_informacion--span"><?php echo $Row_6['cantidadComentario'];?> Comentario</small> 
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
                    
                    <!-- COLECCION 180° -->
                        <?php
                    //Se evala si la noticia tiene una serie de la colecion 180°
                    // foreach($Datos['colecciones'] as $Row_5)   :  
                        // if($Key['ID_Noticia'] == $Row_5['ID_Noticia']){ ?>   
                            <!-- <span class="VerMas_JS Default_pointer cont_portada_giro material-icons-outlined ">switch_left</span> -->
                            <?php
                            // break;
                        // }
                    // endforeach;  ?>   
                </div>

                <!-- ********************************************************************** -->
                <!-- TARJETA COLECCION 180° -->
                <!-- ********************************************************************** -->

                <div class="atras borde_1" id="atras_<?php echo $Iterador?>">                         
                    <div class="">            
                        <!-- IMAGEN PRINCIPAL COLECCION-->
                        <div>
                                <?php
                            foreach($Datos['colecciones'] as $Row_6)   :  
                                if($Key['ID_Noticia'] == $Row_6['ID_Noticia'] AND $Row_6['ImagenPrincipalColec'] == 1){     ?> 
                                <figure>
                                    <img class="imagen--portada--cole" alt="Fotografia Coleccion" src="<?php echo RUTA_URL?>/public/images/colecciones/<?php echo $Row_6['nombre_imColeccion'];?>" id="Imagen_<?php echo $Iterador?>"/>  
                                </figure> <?php
                                }
                            endforeach; ?>
                        </div>

                        <!-- IMAGENES COLECCION EN MINIATURAS-->
                        <div style="display: flex; justify-content: center;"> 
                            <?php              
                            $Coleccion = [];
                            foreach($Datos['colecciones'] as $Row_7) :   
                                if($Key['ID_Noticia'] == $Row_7['ID_Noticia']){ ?>

                                    <div style="margin-top: 1%">    
                                        <figure>
                                            <img class="cont_detalle--imagenMiniatura borde_1" alt="Foto no disponible" src="<?php echo RUTA_URL?>/images/colecciones/<?php echo $Row_7['nombre_imColeccion'];?>" onclick="VerMiniatura(document.getElementById('Imagen_<?php echo $Iterador?>').src='<?php echo RUTA_URL;?>/public/images/colecciones/<?php echo $Row_7['nombre_imColeccion'];?>')"/>
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
                                    
                                    <!-- AUTOR -->
                                    <p class="cont_portada_atras--artista"><?php echo $Row_7['artistaColeccion']?></p>
                                    
                                    <!-- DESCRIPCION -->
                                    <p class="cont_portada_atras--descripcion Default_puntosSuspensivos"><?php echo $Row_7['descripcionColeccion']?></p>
                                    <?php
                                    break;
                                }
                            endforeach; ?>
                        </div>
                    </div>                  

                    <!-- BOTON DE GIRO 180 PARA VOLVER A LA PARTE FRONTAL -->
                    <span class="Cerrar_JS Default_pointer cont_portada_giro cont_portada_giro--atras material-icons-outlined">switch_right</span>

                    <!-- MEMBRETE COLECCION 180° -->
                    <div class="cont_portada_atras--coleccion">
                        <label  class="cont_portada_atras--serie"><?php echo $Row_7['artistaColeccion']?> </label> 
                        <label  class="cont_portada_atras--serie"> <?php echo $Row_7['contactoArtista']?></label>
                    </div> 
                </div>
            </div>
        </div>     

        <!-- BOTONES DEL PANEL FRONTAL -->	
        <div class="cont_portada--botones">
            <div>
                <a class="boton boton--altoDosLinneas" href="<?php echo RUTA_URL . '/Contraloria_C';?>">Contraloría social</a>
                <!-- <span class="material-icons-outlined Default_pointer" onclick="Llamar_NoticiaAnterior('<?php echo $Key['ID_Noticia'];?>')">arrow_back_ios_new</span> -->
            </div>
            <div>
                <label class="boton boton--altoDosLinneas"><a class="Default_font--white" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
            </div>         
            <div>
                <a class="boton boton--altoDosLinneas" href="<?php echo RUTA_URL . '/GaleriaArte_C';?>">Galeria de arte regional</a>
                <!-- <span class="material-icons-outlined Default_pointer" onclick="Llamar_NoticiaPosterior('<?php echo $Datos['datosNoticia'][0]['ID_Noticia'];?>')">arrow_forward_ios</span> -->
            </div>
        </div>         
        <?php
        $Iterador++;
    endforeach;     ?>
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Inicio.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Inicio.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/convoca_SW.js';?>"></script>