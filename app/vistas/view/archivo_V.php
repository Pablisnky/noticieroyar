<!-- Muestra todas las noticias de una sección -->
<div class="cont_archivo--membrete">
    <!-- MEMBRETE FIJO -->
    <label class="header__titulo cont_archivo--header">Noticiero Yaracuy</label>
    
    <!-- SECCION -->
    <h1 class="cont_archivo--seccion">archivo <?php echo $Datos['todasNoticiasGenerales'][0]['seccion'];?></h1> 
   
    <!-- PAGINACION -->
    <ul class="cont_archivo--paginacion">
        <!-- BOTON RETROCEDER -->
        <!-- Si la página actual es mayor a uno, se muestra el botón para ir una página atrás -->
        <?php if ($Datos['pagina'] > 1) { ?>
            <li>
                <a href="<?php echo RUTA_URL . '/Noticias_C/archivo/' . $Datos['cantidadNoticiasSeccion'][0]['ID_Seccion'] . '/';?><?php echo $Datos['pagina']; - 1;?>"><img class="Default_pointer" style="margin-right:20px" src="<?php echo RUTA_URL . '/public/iconos/chevronIzquierdo/outline_arrow_back_ios_new_black_24dp.png'?>"/></a>
            </li>
        <?php } ?>

        <!-- Mostramos enlaces para ir a todas las páginas. -->
        <?php for ($i = 1; $i <= $Datos['paginas']; $i++) { ?>
            <li class="<?php if ($i == $Datos['pagina']) echo "active";?>, cont_archivo--paginacion-numeros">
                <a class="" href="<?php echo RUTA_URL . '/Noticias_C/archivo/' . $Datos['cantidadNoticiasSeccion'][0]['ID_Seccion'] . '/';?><?php echo $i;?>"><?php echo $i;?></a>
            </li>
        <?php } ?>

        <!-- BOTON AANZAR -->
        <!-- Si la página actual es menor al total de páginas, se muestra un botón para ir una página adelante -->
        <?php if ($Datos['pagina'] < $Datos['paginas']) { ?>
            <li>
                <a href="<?php echo RUTA_URL . '/Noticias_C/archivo/' . $Datos['cantidadNoticiasSeccion'][0]['ID_Seccion'] . '/';?><?php echo $Datos['pagina'] + 1 ?>"><img class="Default_pointer" style="margin-right:20px" src="<?php echo RUTA_URL . '/public/iconos/chevronDerecha/outline_arrow_forward_ios_black_24dp.png'?>"/></a>
            </li>
        <?php } ?>
    </ul> 

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

<script src="<?php echo RUTA_URL.'/public/javascript/E_Archivo.js?v=' . rand();?>"></script>