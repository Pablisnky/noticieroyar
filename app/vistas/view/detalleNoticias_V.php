<!-- PUBLICIDAD -->   
<?php       
if(!empty($Datos['publicidad'][0]['ID_Noticia'])){
    if($Datos['detalleNoticia'][0]['ID_Noticia'] == $Datos['publicidad'][0]['ID_Noticia']){  ?>
        <div class="publicidad_cont--main" id="VentanaModal--Publicidad">			
            <span class="material-icons-outlined publicidad_cont--cerrar Default_pointer" id="Cerrar--modal">cancel</span>
            <div class="publicidad_cont--interno">
                <img class="publicidad_cont--imagen" src="<?php echo RUTA_URL?>/public/images/publicidad/<?php echo $Datos['publicidad'][0]['nombre_imagenPublicidad'] ;?>"/>
            </div>
        </div>
        <?php
    } 
}   ?>

<div class="detalle_cont--main" id="cont_efemerides">   
    <!-- MEMBRETE FIJO -->
    <div class="detalle_cont--divFijo">
        <a class="detalle_cont--membrete" href="<?php echo RUTA_URL . '/Inicio_C';?>">www.NoticieroYaracuy.com</a> 
        <label class="detalle_cont--fecha">San Felipe, <?php echo $Datos['detalleNoticia'][0]['fechaPublicacion'];?> </label>
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
                    <a href="whatsapp://send?text=<?php echo $Datos['detalleNoticia'][0]['titulo'];?>%20<?php echo RUTA_URL;?>/Noticias_C/detalleNoticia/<?php echo $Datos['detalleNoticia'][0]['ID_Noticia'];?>" data-action="share/whatsapp/share"><img class="detalle_cont--redesSociales-Whatsapp" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/></a>
                </div>            
            </div>        

            <a style=" width: 100%; display: block; text-align: center; margin-top: 2%" href="#marcador_01">10 comentarios a piede página</a>
        </div>
    </div>

    <!-- VIDEO -->
    <div class="detalle_cont--video"">

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
    <div>
        <textarea class="textarea--contenido textarea--borde textarea--font" id="Contenido" readonly><?php echo $Datos['detalleNoticia'][0]['contenido']?></textarea>
    </div>

    
    <a href="#up" class="simplescrollup__button simplescrollup__button--hide"><span class="material-icons-outlined detalle_cont--avion">airplanemode_active</span></a>
</div>
</body>
</html>

<script src="<?php echo RUTA_URL.'/public/javascript/scrollUp.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_DetalleNoticia.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_DetalleNoticia.js?v='. rand();?>"></script>
<!-- <script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script> -->