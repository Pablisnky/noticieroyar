<div class="detalle_cont--main" id="cont_efemerides"> 
     
    <!-- MEMBRETE FIJO -->
    <div class="detalle_cont--divFijo">
        <a class="detalle_cont--membrete" href="<?php echo RUTA_URL . '/Inicio_C';?>">www.NoticieroYaracuy.com</a> 
        <label class="detalle_cont--fecha" id="Up">San Felipe, <?php echo $Datos['detalleNoticia'][0]['fechaPublicacion'];?> </label>

        <!-- ICONO CERRAR -->
        <img class="material-icons-outlined cont_modal--cerrar detalle_cont--cerrar Default_pointer" style="width: 1em;" id="CerrarVentana" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"/>
    </div>

    <div class="detalle_cont">         
        <div class="detalle_cont--imagen">
            
            <!-- IMAGEN -->
            <figure id="Contenedor_Imagen">
                <img class="cont_detalle--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['imagenesNoticia'][0]['nombre_imagenNoticia'];?>"/>  
            </figure>
            
            <!-- IMAGENES SECUNDARIAS EN MINIATURAS -->
            <div style="display: flex; justify-content: center;">     
                <?php              
                foreach($Datos['imagenesNoticia'] as $key) :   ?>
                    <div style="margin-top: 1%">
                        <figure>
                            <img class="cont_detalle--imagenMiniatura borde_1" alt="Foto no disponible" src="<?php echo RUTA_URL?>/images/<?php echo $key['nombre_imagenNoticia'];?>" onclick="Llamar_VerMiniatura('<?php echo $key['ID_Imagen']?>')"/>
                        </figure>
                    </div>
                        <?php
                endforeach; ?>
            </div> 
        </div>

        <div class="detalle_cont--informacion">        

            <!-- TITULO -->
            <h1 class="detalle_cont--titulo"><?php echo $Datos['detalleNoticia'][0]['titulo']?></h1> 

            <!-- RESUMEN -->
            <div class="detalle_cont--resumen">
                <p><?php echo $Datos['detalleNoticia'][0]['subtitulo']?></p>

                <!-- FUENTE -->
                <span class="detalle_cont--fuente"><?php echo $Datos['detalleNoticia'][0]['fuente']?></span>
                <hr class="detalle_cont--hr">
            </div>
        
            <!-- COMPARTIR REDES SOCIALES -->
            <div class="detalle_cont--redesSociales">
                <div class="detalle_cont--red">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/Noticias_C/detalleNoticia/<?php echo $Not_Prin['ID_Noticia'];?>&text=Compartir%20Facebook" target="_blank"><img class="detalle_cont--redesSociales-facebook" alt="facebook" src="<?php echo RUTA_URL?>/public/images/facebook.png"/></a>
                </div>
                <div class="detalle_cont--red">
                    <a href="https://twitter.com/intent/tweet?url=<?php echo RUTA_URL;?>/Noticias_C/detalleNoticia/<?php echo $Datos['detalleNoticia'][0]['ID_Noticia'];?>&text=COmpartir%20Twiter" target="_blank"><img class="detalle_cont--redesSociales-twitter" alt="twitter" src="<?php echo RUTA_URL?>/public/images/twitter.png"/></a>
                </div>          
                <div class="whatsapp detalle_cont--red">
                <a href="whatsapp://send?text=<?php echo $Datos['detalleNoticia'][0]['titulo']?>...<?php echo RUTA_URL?>/Noticias_C/detalleNoticia/<?php echo $Datos['detalleNoticia'][0]['ID_Noticia'];?>" data-action="share/whatsapp/share"><img class="detalle_cont--redesSociales-Whatsapp" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/></a>
                </div>            
            </div>        
            
            <a class="detalle_cont--marcador" href="#Marcador"><?php echo $Datos['cantidadComentario'][0]['cantidadComentario']?> comentarios a pie de página</a>
        </div>
    </div>

    <!-- VIDEO -->
    <div class="detalle_cont--video">
        <?php
        if(!empty($Datos['video'][0]['nombreVideo'])){
            if($Datos['detalleNoticia'][0]['ID_Noticia'] == $Datos['video'][0]['ID_Noticia']){   ?>
                <video style="width: 100%;" src="<?php echo RUTA_URL?>/public/video/<?php echo $Datos['video'][0]['nombreVideo']?>" controls></video> 
                <?php
            }
        }
        else if(!empty($Datos['video'][0]['youTube']) == 1){  ?>
            <iframe style="width: 100%; height: 200px" src="https://www.youtube.com/watch?v=HYqabbwx4_s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php
        }       ?>
    </div>

    <!-- CONTENIDO -->
    <div>
        <textarea class="textarea--contenido textarea--borde textarea--font" id="Contenido" readonly><?php echo $Datos['detalleNoticia'][0]['contenido']?></textarea>
    </div>

    <!-- COMENTARIO --> 
    <div id="ContedorComentario">
        <label class="marcador" id="Marcador">Comentarios</label>
        </br>

        <!-- Se escribe el nuevo comentario -->
        <textarea class="textarea--comentario" id="Comentario" nome="comentario" onfocus="Llamar_VerificarSuscripcion('<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>','comentar','NA')"></textarea>
        <?php
        if(isset($_SESSION['ID_Suscriptor'])){   ?>
            <label class="boton boton--comentar" onclick="Llamar_InsertarComentario('<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>')">Comentar</label>
            <?php
        }   ?>
    
        <!-- div carga el nuevo comentario -->
        <div class="cont_comentario--BD" style="margin-top: 2%" id="ComentarioInsertado"></div>

        <!-- Se cargan los comentarios existentes en BD -->
        <div class="">
            <?php
            foreach($Datos['comentarios'] as $Row)   :   ?>
                <div class="cont_comentario--BD" id="<?php echo $Row['ID_Comentario'];?>">
                    <p class="detalle_cont--p--comentario" readonly><?php echo $Row['comentario']?></p>
                    <div class="comentario--informacion">
                        <label class="comentario--fecha"><?php echo $Row['nombreSuscriptor']?></label>
                        <label class="comentario--fecha"><?php echo $Row['apellidoSuscriptor']?></label>&nbsp&nbsp&nbsp
                        <label class="comentario--fecha"><?php echo $Row['fechaComentario']?></label>&nbsp&nbsp&nbsp<label class="comentario--fecha"><?php echo $Row['horaComentario']?></label>
                    </div> 

                    <!-- Respuesta a comentario -->
                    <div class="cont_comentario--respuesta Default_ocultar" id="Respuesta_<?php echo $Row['ID_Comentario'];?>">
                        <!-- se escribe la respuesta -->
                        <textarea class="textarea--comentario" id="TextoRespuesta_<?php echo $Row['ID_Comentario'];?>" onfocus = "Llamar_VerificarSuscripcion('<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>','responder',',<?php echo $Row['ID_Comentario'];?>')"></textarea>

                        <!-- se muestra la respuesesta junto al usuario la fecha y la hora -->
                        <p id="insertaRespuesta_<?php echo $Row['ID_Comentario'];?>"></p>
                        
                        <!-- BOTON ENVIAR -->
                        <?php
                        if(isset($_SESSION['ID_Suscriptor'])){   ?>
                            <label class="detalle_cont--edicion detalle_cont--label Default_pointer" id="labelEnviar_<?php echo $Row['ID_Comentario'];?>" onclick="Llamar_InsertarRespuesta('<?php echo $Row['ID_Comentario']?>','TextoRespuesta_<?php echo $Row['ID_Comentario'];?>','labelEnviar_<?php echo $Row['ID_Comentario'];?>','insertaRespuesta_<?php echo $Row['ID_Comentario'];?>','<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>')">Enviar</label>

                            <div class="comentario--informacion">
                                <label class="comentario--fecha"><?php echo $Datos['nombre']?></label>
                                <label class="comentario--fecha"><?php echo $Datos['apellido']?></label>&nbsp&nbsp&nbsp
                                <!-- <label class="comentario--fecha"><?php echo $Datos['']?></label>&nbsp&nbsp&nbsp<label class="comentario--fecha"><?php echo $Datos['horaComentario']?></label> -->
                            </div> 
                            <?php
                        }   ?>
                    </div>                    

                    <!-- BOTONES DE ELIMINAR - RESPONDER -->
                    <?php
                    if($Row['ID_Suscriptor'] == $Datos['id_suscriptor']){   ?>
                        <div> 
                            <label class="detalle_cont--edicion Default_pointer" onclick="EliminarComentario('<?php echo $Row['ID_Comentario'];?>')">ELiminar</label>
                            <!-- <label class="detalle_cont--edicion Default_pointer">Actualizar</label> -->
                        </div>
                        <?php
                    }
                    else{   ?>
                        <label class="detalle_cont--edicion Default_pointer" id="botonRespuesta_<?php echo $Row['ID_Comentario'];?>" onclick="mostrar_DivRespuesta('Respuesta_<?php echo $Row['ID_Comentario'];?>','botonRespuesta_<?php echo $Row['ID_Comentario'];?>')">Responder</label>
                        <?php
                    }   ?>
                </div>
                
                <!-- Se cargan las respuestas a los comentarios existentes en BD -->
                <div class="">
                    <?php
                    foreach($Datos['respuestas'] as $Row_2)   : 
                        if($Row['ID_Comentario'] == $Row_2['ID_Comentario']){  ?>
                            <div class="cont_respuesta--BD" id="<?php echo $Row_2['ID_Comentario'];?>">
                                <p class="detalle_cont--p--comentario" readonly><?php echo $Row_2['respuesta']?></p>
                                <div class="comentario--informacion">
                                    <label class="comentario--fecha"><?php echo $Row_2['nombreSuscriptor']?></label>
                                    <label class="comentario--fecha"><?php echo $Row_2['apellidoSuscriptor']?></label>&nbsp&nbsp&nbsp
                                    <label class="comentario--fecha"><?php echo $Row_2['fecha_Respuesta']?></label>&nbsp&nbsp&nbsp<label class="comentario--fecha"><?php echo $Row_2['hora_Respuesta']?></label>
                                </div>               

                                <!-- BOTON DE ELIMINAR RESPUESTA -->
                                <?php
                                // if($Row_2['ID_Suscriptor'] == $Datos['id_suscriptor']){   ?>
                                    <!-- <div> 
                                        <label class="detalle_cont--edicion Default_pointer" onclick="EliminarRespuesta('<?php echo $Row_2['ID_Respuesta'];?>')">ELiminar</label>
                                    </div> -->
                                    <?php
                                // } ?>
                            </div>
                            <?php
                        }
                    endforeach;
                    ?>      
                </div> 
                <?php
            endforeach;
            ?>      
        </div>   
    </div>

    <!-- AVION -->    
    <!-- <a href="#Up" class="simplescrollup__button simplescrollup__button--hide">Avion<span class="material-icons-outlined detalle_cont--avion">airplanemode_active</span></a> -->
</div>

<!-- PUBLICIDAD -->   
<?php       
    if(!empty($Datos['publicidad'][0]['ID_Noticia']) AND ($Datos['bandera'] == 'ConAnuncio')){ //Bandera creada en 
        if($Datos['detalleNoticia'][0]['ID_Noticia'] == $Datos['publicidad'][0]['ID_Noticia']){  ?>
            <div class="publicidad_cont--main" id="VentanaModal--Publicidad">			
                <span class="material-icons-outlined publicidad_cont--cerrar Default_pointer" id="CerrarVentanaModal">cancel</span>
                <div class="publicidad_cont--interno">
                    <img class="publicidad_cont--imagen" src="<?php echo RUTA_URL?>/public/images/publicidad/<?php echo $Datos['publicidad'][0]['nombre_imagenPublicidad'] ;?>"/>
                </div>
            </div>
            <?php
        } 
    }   
?>

<script src="<?php echo RUTA_URL.'/public/javascript/E_DetalleNoticia.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_DetalleNoticia.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>

</body>
</html>