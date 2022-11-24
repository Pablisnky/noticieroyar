<div class="detalle_cont--main" id="cont_efemerides"> 
     
    <!-- MEMBRETE FIJO -->
    <div class="detalle_cont--divFijo">
        <a class="detalle_cont--membrete" href="<?php echo RUTA_URL . '/Inicio_C';?>">www.NoticieroYaracuy.com</a> 
        <label class="detalle_cont--fecha" id="Up">San Felipe, <?php echo $Datos['detalleNoticia'][0]['fechaPublicacion'];?> </label>
        <!-- ICONO CERRAR -->
        <span class="material-icons-outlined cont_modal--cerrar detalle_cont--cerrar Default_pointer" id="CerrarVentana">cancel</span>
    </div>

    <div class="detalle_cont">         
        <div class="detalle_cont--imagen">
            
            <!-- IMAGEN -->
            <figure id="Contenedor_Imagen">
                <img class="cont_detalle--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['imagenesNoticia'][0]['nombre_imagenNoticia'];?>"/>  
            </figure>
            
            <!-- IMAGENES SECUNDARIAS EN MINIATURAS-->
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
                <a href="whatsapp://send?text=<?php echo $Datos['detalleNoticia'][0]['titulo']?><?php echo RUTA_URL?>/Noticias_C/detalleNoticia/<?php echo $Datos['detalleNoticia'][0]['ID_Noticia'];?>" data-action="share/whatsapp/share"><img class="detalle_cont--redesSociales-Whatsapp" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/></a>
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
            <iframe style="width: 100%; height: 200px" src="https://www.youtube.com/embed/hfIhnjJSxro" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php
        }       ?>
    </div>

    <!-- CONTENIDO -->
    <div >
        <textarea class="textarea--contenido textarea--borde textarea--font" id="Contenido" readonly><?php echo $Datos['detalleNoticia'][0]['contenido']?></textarea>
    </div>

    <!-- COMENTARIO --> 
    <div id="ContedorComentario">
        <label class="marcador" id="Marcador">Comentarios</label>
        <br>

        <!-- Se escribe el nuevo comentario -->
        <textarea class="textarea--comentario" id="Comentario" nome="comentario" onfocus="Llamar_VerificarSuscripcion('<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>','comentar')"></textarea>
        <?php
        if(isset($_SESSION['ID_Suscriptor'])){   ?>
            <label class="boton boton--comentar" onclick="Llamar_InsertarComentario('<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>')">Comentar</label>
            <?php
        }   ?>
    
        <!-- div carga el nuevo comentario -->
        <div class="cont_comentario--BD" style="margin-top: 2%" id="ComentarioInsertado"></div>

        <!-- Se cargan los comentarios existentes en BD -->
        <?php
        foreach($Datos['comentarios'] as $Row)   :   ?>
            <div class="cont_comentario--BD" id="<?php echo $Row['ID_Comentario'];?>">
                <p class="detalle_cont--p--comentario"><?php echo $Row['comentario']?></p>
                <label class="comentario--fecha"><?php echo $Row['nombreSuscriptor']?></label>
                <label class="comentario--fecha"><?php echo $Row['apellidoSuscriptor']?></label>&nbsp&nbsp&nbsp
                <label class="comentario--fecha"><?php echo $Row['fechaComentario']?></label>&nbsp&nbsp&nbsp<label class="comentario--fecha"><?php echo $Row['horaComentario']?></label>
                <br>
                <?php
                if($Row['ID_Suscriptor'] == $Datos['id_suscriptor']){   ?>
                    <div> 
                        <label class="detalle_cont--edicion Default_pointer" onclick="EliminarComentario('<?php echo $Row['ID_Comentario'];?>')">ELiminar</label>
                        <!-- <label class="detalle_cont--edicion Default_pointer">Actualizar</label> -->
                    </div>
                    <?php
                }
                else{   ?>
                    <!-- <label class="detalle_cont--edicion Default_pointer" onclick="Llamar_VerificarSuscripcion('<?php echo $Datos['detalleNoticia'][0]['ID_Noticia']?>','responder')">Responder</label> -->
                    <?php
                }   ?>
            </div>
            <?php
        endforeach;
        ?>        
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
}   ?>

<script src="<?php echo RUTA_URL.'/public/javascript/scrollUp.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_DetalleNoticia.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_DetalleNoticia.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>

</body>
</html>