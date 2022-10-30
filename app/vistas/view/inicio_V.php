<!-- VENTANA MODAL INICIAL -->
<?php //require(RUTA_APP . '/vistas/modal/modal_anuncio.php');?>

<div class="cont_portada" id="Cont_Portada">
    <?php
    $Iterador = 1;
    foreach($Datos['datosNoticia'] as $Key) :  ?>
        <div class="cont_portada--noticia contenedor_tarjeta" id="Cont_Portada">
            <div class="tarjeta" id="Tarjeta_<?php echo $Iterador?>">
                <div class="adelante borde_1" id="adelante_<?php echo $Iterador?>">
                    <!-- IMAGEN -->
                    <div class="cont_portada--imagen Default_pointer">                        
                        <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'];?>" rel="noopener noreferrer" target="_blank"><img class="imagen--portada efectoBrillo" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenNoticia'];?>"/></a>
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
                        <!-- FECHA -->
                        <small class="cont_portada_informacion--span"><?php echo $Key['fecha'];?></small>
                        <?php
                        // CANTIDAD DE IMAGENES
                        foreach($Datos['imagenes'] as $Row_3)  : 
                            if($Key['ID_Noticia'] == $Row_3['ID_Noticia']){ ?> 
                                <small class="cont_portada_informacion--span"><?php echo $Row_3['cantidad'];?> imagenes</small> 
                                <?php
                            }
                        endforeach;
                        // VIDEO
                        foreach($Datos['videos'] as $Row_4)  : 
                            if($Key['ID_Noticia'] == $Row_4['ID_Noticia']){ ?> 
                                <small class="cont_portada_informacion--span">video</small> 
                                <?php
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
                    </div> 
                        <!-- ASIGNA COLECCION 180° -->
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
                        <!-- IMAGEN COLECCION-->
                                <?php
                            foreach($Datos['colecciones'] as $Row_6)   :  
                                if($Key['ID_Noticia'] == $Row_6['ID_Noticia'] AND $Row_6['ImagenPrincipalColec'] == 1){     ?> 
                        <figure id="Contenedor_Imagen">
                            <img class="imagen--portada" alt="Fotografia Coleccion" src="<?php echo RUTA_URL?>/public/images/colecciones/<?php echo $Row_6['nombre_imColeccion'];?>"/>  
                        </figure> <?php
                                }
                            endforeach; ?>
                        
                        <!-- IMAGENES COLECCION EN MINIATURAS-->
                        <div style="display: flex; justify-content: center;">     
                            <?php              
                            foreach($Datos['colecciones'] as $Row_7) :   ?>
                                <div style="margin-top: 1%">
                                    <figure>
                                        <img class="cont_detalle--imagenMiniatura borde_1" alt="Foto no disponible" src="<?php echo RUTA_URL?>/images/colecciones/<?php echo $Row_7['nombre_imColeccion'];?>" onclick="Llamar_VerMiniatura('<?php echo $Row_7['ID_ImagenColeccion']?>')"/>
                                    </figure>
                                </div>
                                    <?php
                            endforeach; ?>
                        </div> 
                    </div>                  
                    <p class="cont_portada_atras--titulo">Estatua del cacique Yaracuy</p>
                    <p class="cont_portada_atras--descripcion">Final Av. Yaracuy de San Felipe</p>
                    <p class="cont_portada_atras--descripcion">Alejandro Colina</p>
                    <span class="Cerrar_JS Default_pointer cont_portada_giro material-icons-outlined">switch_right</span>
                    <div class="cont_portada_atras--coleccion">
                        <p>COLECCIÓN YARACUY EN 180°</p>
                        <p class="cont_portada_atras--serie">Vienes de interes cultural</p> 
                    </div> 
                </div>
            </div>
        </div>     

        <!-- BOTONES DEL PANEL FRONTAL -->
        <div class="cont_portada--botones">
            <div>
                <span class="material-icons-outlined Default_pointer" onclick="Llamar_NoticiaAnterior('<?php echo $Key['ID_Noticia'];?>')">arrow_back_ios_new</span>
            </div>
            <div>
                <label class="boton boton--corto"><a class="Default_font--white" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
            </div>         
            <div>
                <span class="material-icons-outlined Default_pointer" onclick="Llamar_NoticiaPosterior('<?php echo $Datos['datosNoticia'][0]['ID_Noticia'];?>')">arrow_forward_ios</span>
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