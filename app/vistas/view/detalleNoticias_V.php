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
            <div class="detalle_cont--divFijo">
                <!-- MEMBRETE FIJO -->
                <a class="detalle_cont--membrete" href="<?php echo RUTA_URL . '/Inicio_C';?>">www.NoticieroYaracuy.com</a> 
			    <label class="detalle_cont--fecha">San Felipe, <?php echo $Datos['detalleNoticia'][0]['fecha'];?> </label>
                <!-- ICONO CERRAR -->
                <span class="material-icons-outlined cont_modal--cerrar detalle_cont--cerrar Default_pointer" id="CerrarVentana">cancel</span>
            </div>        

            <!-- TITULO -->
            <h1 class="detalle_cont--titulo"><?php echo $Datos['detalleNoticia'][0]['titulo']?></h1> 

            <!-- RESUMEN -->
            <div class="detalle_cont--resumen">
                <p style=""><?php echo $Datos['detalleNoticia'][0]['subtitulo']?></p>
                <hr class="detalle_cont--hr">

                <!-- FUENTE -->
                <span class="detalle_cont--fuente"><?php echo $Datos['detalleNoticia'][0]['fuente']?></span>
            </div>
        </div>
    </div>

    <!-- VIDEO -->
    <div class="detalle_cont--video"">
        <?php
        if(!empty($Datos['video'][0]['ID_Noticia'])){
            if($Datos['detalleNoticia'][0]['ID_Noticia'] == $Datos['video'][0]['ID_Noticia']){   ?>
                <video style="width: 100%;" src="<?php echo RUTA_URL?>/public/video/<?php echo $Datos['video'][0]['nombreVideo']?>" controls></video> 
                <?php
            }
        }       ?>
    </div>

    <!-- CONTENIDO -->
    <div style="" >
        <textarea class="textarea--contenido textarea--borde textarea--font" id="Contenido" readonly><?php echo $Datos['detalleNoticia'][0]['contenido']?></textarea>
    </div>
    
    <a href="#up" class="simplescrollup__button simplescrollup__button--hide"><span class="material-icons-outlined detalle_cont--avion">airplanemode_active</span></a>
</div>
</body>
</html>

<script src="<?php echo RUTA_URL.'/public/javascript/scrollUp.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_DetalleNoticia.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_DetalleNoticia.js?v='. rand();?>"></script>