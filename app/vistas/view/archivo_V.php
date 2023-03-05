<!-- Muestra todas las noticias de una sección -->

<div class="cont_archivo--membrete">
    <!-- MEMBRETE FIJO -->
    <label class="header__titulo">Noticiero Yaracuy</label>
    <!-- SECCION -->
    <h1 class="cont_archivo--seccion">archivo <?php echo $Datos['todasNoticiasGenerales'][0]['seccion'];?></h1> 
    <!-- ICONO CERRAR -->
    <img class=" cont_modal--cerrar  Default_pointer" style="width: 1em;" id="CerrarVentana" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"/>
</div>
<div class="cont_archivo"> 
    <?php
    foreach($Datos['todasNoticiasGenerales'] as $Row) :?>
        <?php
        $Iterador = 1; ?>
        <div class="cont_archivo--noticia" id="<?php echo $Iterador?>">
            <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Row['ID_Noticia'] . ',ConAnuncio';?>" rel="noopener noreferrer" target="_blank"><img class="cont_noticia-imagen" alt="Fotografia" src="<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_imagenNoticia'];?>"/></a>

            <div class="cont_noticia--titular">
                <p class="cont_noticias--titulo"><?php echo $Row['titulo'];?></p>
                <hr class="cont_noticia--hr_1">
                
                <!-- FUENTE -->
                <br>
                <small class="cont_noticias_informacion--span"><?php echo $Row['fuente'];?></small>     

                <!-- FECHA -->
                <br>
                <small class="cont_noticias_informacion--span"><?php echo $Row['fechaPublicacion'];?></small style="font-size: 0.8em;">
                <br>                           
            </div>  
        </div>                        
            <?php  
        $Iterador++; ?>    
            <?php
    endforeach; ?>
</div>

<!-- <script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script> -->
<script src="<?php echo RUTA_URL.'/public/javascript/E_Archivo.js?v=' . rand();?>"></script>