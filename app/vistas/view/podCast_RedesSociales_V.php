
<!-- ICONO CERRAR -->
<!-- <img class=" cont_modal--cerrar detalle_cont--cerrar Default_pointer" style="width: 1em; top: 3%;" id="CerrarVentana" src="<?php //echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>"/> -->
    
<div class="cont_podcast_individual" >
    <!-- MEMBRETE FIJO -->
    <div class="">
        <a class="detalle_cont--membrete" href="<?php echo RUTA_URL . '/Inicio_C';?>">www.NoticieroYaracuy.com</a>
    </div>
    
    <!-- TITULO -->                
    <h1 class="cont_podcast--titulo"><?php echo $Datos['podCast']['titulo_podcast'];?></h1>

    <!-- FUENTE -->
    <h1 class="cont_podcast--locutor"><?php echo $Datos['podCast']['locutor'];?></h1>

    <div class="cont_podcast cont_podcast--2 ">

        <!-- IMAGEN -->                        
        <img class="cont_podcast--imagen " alt="Fotografia PodCsst" src="<?php echo RUTA_URL?>/public/images/podcast/<?php echo $Datos['podCast']['imagen_redesSociales'];?>"/>
        
        <!-- PODCAST -->
        <audio class="cont_podcast--audio" src="<?php echo RUTA_URL . '/public/audio/' . $Datos['podCast']['nombre_audioPod'];?>" preload="none" controls></audio>
    </div>    
         
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_PodCast_RedesSociales.js?v='. rand();?>"></script>