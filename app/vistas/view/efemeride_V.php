<div class="cont_detalle" id="cont_efemerides">
    <h1 class="h1--principal">Efemeride</h1>
    <?php
    foreach($Datos['efemerideHoy'] as $Key) :  ?>

            <!-- IMAGEN -->
            <div class="">                        
                <figure>
                    <img class="cont_efemerides--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_ImagenEfemeride'];?>"/> 
                </figure>
            </div>

            <!-- TITULO -->
            <div class="">                   
                <h2 class="h2--efemerides"><?php echo $Key['titulo'];?></h2>
            </div>
            
            <!-- CONTENIDO -->
            <div >
                <textarea class="textarea--contenido textarea--borde textarea--font" id="Contenido" readonly><?php echo $Key['contenido']?></textarea>
            </div>
        <?php
    endforeach; ?>
</div>  

<!-- BOTONES DEL PANEL FRONTAL -->
<div class="cont_portada--botones">
    <div>
        <label class="boton boton--corto"><a class="Default_font--white" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
    </div>         
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Efemeride.js?v='. rand();?>"></script>