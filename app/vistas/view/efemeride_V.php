<div class="cont_efemeride" id="cont_efemerides">
    <h1 class="h1--principal">Efeméride</h1>
    <?php
    foreach($Datos['efemerideHoy'] as $Key) :  ?>

            <!-- TITULO -->
            <div class="">                   
                <h2 class="h2--efemerides"><?php echo $Key['titulo'];?></h2>
            </div>

            <!-- IMAGEN -->
            <div class="">                        
                <figure>
                    <img class="cont_efemerides--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/efemerides/<?php echo $Key['nombre_ImagenEfemeride'];?>"/> 
                </figure>
            </div>
            
            <!-- CONTENIDO -->
            <div >
                <textarea class="textarea--contenido textarea--borde textarea--font Efemeride--JS" id="Contenido" readonly><?php echo $Key['contenido']?></textarea>
            </div>

            <br class="cont_efemeride--br">
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