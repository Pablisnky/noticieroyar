
<div class="detalle_cont--main" id="cont_efemerides">
    
    <span class="material-icons-outlined cont_modal--cerrar Default_pointer" id="CerrarVentana">cancel</span>
    
    <!-- TITULO -->
    <h1 class="detalle_cont--titulo"><?php echo $Datos['detalleNoticia'][0]['titulo']?></h1> 

    <div class="detalle_cont"> 
        <!-- IMAGEN -->
        <div class="detalle_cont--imagen">
            <figure>
                <img class="cont_detalle--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['detalleNoticia'][0]['nombre_imagenNoticia'];?>"/> 
            </figure>
        </div>
            
        <!-- RESUMEN -->
        <div class="detalle_cont--resumen">
            <p style="font-size: 1.4em;"><?php echo $Datos['detalleNoticia'][0]['subtitulo']?></p>
        </div>
    </div>

    <!-- CONTENIDO -->
    <div class="cont_portada--texto columnas">
        <p  style="font-size: 1.2em; line-height: 30px;margin-top: 2%"><?php echo $Datos['detalleNoticia'][0]['contenido']?></p>
    </div>
</div>
</body>
</html>

<script src="<?php echo RUTA_URL.'/public/javascript/E_DetalleNoticia.js?v='. rand();?>"></script>