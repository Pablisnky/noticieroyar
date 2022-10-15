
<div class="detalle_cont--main" id="cont_efemerides">
    
    <span class="material-icons-outlined cont_modal--cerrar Default_pointer" id="CerrarVentana">cancel</span>
    
    <!-- TITULO -->
    <h1 class="detalle_cont--titulo"><?php echo $Datos['detalleNoticia'][0]['titulo']?></h1> 

    <div class="detalle_cont"> 
        <!-- IMAGEN -->
        <div class="detalle_cont--imagen">
            <figure id="Contenedor_Imagen">
                <img class="cont_detalle--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['imagenesNoticia'][0]['nombre_imagenNoticia'];?>"/>  
            </figure>
        
            <!-- IMAGENES SECUNDARIAS EN MINIATURAS-->
            <div style="display: flex; justify-content: space-around;">     
                <?php              
                foreach($Datos['imagenesNoticia'] as $key) :   ?>
                    <div style="margin-top: 1%">
                        <figure>
                            <img class="cont_detalle--imagenMiniatura borde_1" alt="Foto no disponible" src="<?php echo RUTA_URL?>/images/<?php echo $key['nombre_imagenNoticia'] ;?>" onclick="Llamar_VerMiniatura('<?php echo $key['ID_Imagen']?>')"/>
                        </figure>
                    </div>
                        <?php
                endforeach; ?>
            </div> 
        </div>
            
        <!-- RESUMEN -->
        <div class="detalle_cont--resumen">
            <p style="font-size: 1.4em;"><?php echo $Datos['detalleNoticia'][0]['subtitulo']?></p>
            <hr class="detalle_cont--hr">
        </div>
    </div>

    <!-- CONTENIDO -->
    <div class="cont_portada--texto columnas">
        <p  style="font-size: 1.3em; line-height: 30px; "><?php echo $Datos['detalleNoticia'][0]['contenido']?></p>
    </div>
</div>
</body>
</html>

<script src="<?php echo RUTA_URL.'/public/javascript/E_DetalleNoticia.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_DetalleNoticia.js?v='. rand();?>"></script>