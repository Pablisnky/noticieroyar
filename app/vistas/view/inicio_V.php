<!-- VENTANA MODAL AUTOMATICA INICIAL -->
<?php //require(RUTA_APP . '/vistas/modal/modal_anuncio.php');?>

<div class="cont_portada" id="Cont_Portada">
    <?php
    $Iterador = 1;
    foreach($Datos['datosNoticia'] as $Key) :  ?>
        <div class="cont_portada--noticia">
            <div class="tarjeta" id="Tarjeta_<?php echo $Iterador?>">
                <div class="borde_1 borde_3" id="adelante_<?php echo $Iterador?>">

                    <!-- IMAGEN -->
                    <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'] . ',ConAnuncio';?>" rel="noopener noreferrer" target="_blank"><img class="imagen--portada efectoBrillo" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/noticias/<?php echo $Key['nombre_imagenNoticia'];?>"/></a>
                    
                    <div class="cont_portada--tituloResumen">
                        <!-- TITULAR -->
                        <div class="cont_portada--titular">                   
                            <h2 class="titular--texto"><?php echo $Key['titulo'];?></h2>
                        </div>
                        
                        <!-- RESUMEN -->
                        <div class="cont_portada--texto">                   
                            <h2 class="cont_portada--resumen Default_puntosSuspensivos"><?php echo $Key['subtitulo'];?></h2>
                        </div>
                    </div>

                    <!-- INFORMACION EN ICONOS -->
                    <div class="cont_portada--informacion">
                        <?php
                        // CANTIDAD DE IMAGENES
                        foreach($Datos['imagenes'] as $Row_3)  : 
                            if($Key['ID_Noticia'] == $Row_3['ID_Noticia']){    ?>
                                <div style="display: flex; align-items:center; ">
                                    <small style="margin-right: 5px"><?php echo $Row_3['cantidad'];?></small> 
                                    <img style="width: 1.4em" src="<?php echo RUTA_URL . '/public/iconos/imagenes/outline_photo_camera_black_24dp.png'?>"/>
                                </div>
                                    <?php                           
                            }
                        endforeach;

                        // CANTIDAD DE VIDEO
                        foreach($Datos['videos'] as $Row_4)  : 
                            if($Key['ID_Noticia'] == $Row_4['ID_Noticia']){ ?> 
                                <div style="display: flex; align-items:center; background-color: ">
                                    <small style="margin-right: 5px"><?php echo $Row_4['cantidadVideo'];?></small> 
                                    <img style="width: 1.8em" src="<?php echo RUTA_URL . '/public/iconos/video/outline_videocam_black_24dp.png'?>"/>                            
                                </div>
                                <?php
                            }
                        endforeach;
                        
                        // SIN VIDEO
                        foreach($Datos['noticiasSinVideo'] as $Row_9)   :  
                            if($Key['ID_Noticia'] == $Row_9['ID_Noticia']){     ?>
                                <div style="display: flex; align-items:center; background-color: ">
                                    <small style="margin-right: 5px">0</small>
                                    <img src="<?php echo RUTA_URL . '/public/iconos/video/outline_videocam_black_24dp.png'?>"/>                               
                                </div>
                                <?php
                            }
                        endforeach;

                        // COMENTARIOS
                        foreach($Datos['cantidadComentario'] as $Row_6)   :  
                            if($Key['ID_Noticia'] == $Row_6['ID_Noticia']){  ?>
                            <div style="display: flex; align-items:center; background-color: ">
                                <small style="margin-right: 5px"><?php echo $Row_6['cantidadComentario']?> </small>
                                <img style="width: 1.4em" src="<?php echo RUTA_URL . '/public/iconos/comentario/outline_speaker_notes_black_24dp.png'?>"/>                                
                            </div>
                                    <?php
                            }
                        endforeach;  
                        
                        // SIN COMENTARIOS
                        foreach($Datos['noticiasSinComentarios'] as $Row_8)   :  
                            if($Key['ID_Noticia'] == $Row_8['ID_Noticia']){     ?>
                                <div style="display: flex; align-items:center; background-color: ">
                                    <small style="margin-right: 5px">0</small>
                                    <img style="width: 1.4em" src="<?php echo RUTA_URL . '/public/iconos/comentario/outline_speaker_notes_black_24dp.png'?>"/>                               
                                </div>
                                <?php
                            }
                        endforeach;  

                        // SI EXISTE ANUNCIO PUBLICITARIO
                        foreach($Datos['anuncios'] as $Row_2)   :  
                            if($Key['ID_Noticia'] == $Row_2['ID_Noticia']){ ?>
                                <div style="display: flex; align-items:center; background-color: ">
                                    <small style="font-weight: bold;">+ Anuncio</small>
                                </div>
                                <?php
                            }
                        endforeach;  ?>   
                    </div>

                    <div>
                        <!-- FUENTE -->
                        <small class="cont_portada_informacion--span"><?php echo $Key['fuente'];?></small>
                        
                        <!-- FECHA -->
                        <br>
                        <small class="cont_portada_informacion--span"><?php echo $Key['fechaPublicacion'];?></small>
                    </div> 
                </div>
            </div>
        </div>     

        <!-- BOTONES DEL PANEL FRONTAL (solo en dispositivos moviles)-->	
        <div class="cont_portada--botones">
            <div>
                <img class="Default_pointer" style="text-align: center; display:block; margin: auto; font-size: 2em;" onclick="Llamar_NoticiaAnterior('<?php echo $Key['ID_Noticia'];?>')" src="<?php echo RUTA_URL . '/public/iconos/chevronIzquierdo/outline_arrow_back_ios_new_black_24dp.png'?>"/>
            </div>
            <div>
                <label class="boton"><a class="Default_font--white" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
            </div>         
            <div>
                <img class="Default_pointer" style="text-align: center; display:block; margin: auto; font-size: 2em;" onclick="Llamar_NoticiaPosterior('<?php echo $Datos['datosNoticia'][0]['ID_Noticia'];?>')"src="<?php echo RUTA_URL . '/public/iconos/chevronDerecha/outline_arrow_forward_ios_black_24dp.png'?>"/>
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