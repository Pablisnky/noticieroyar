<div class="cont_podcast_individual" >
    <div class="cont_podcast cont_podcast--2 borde_1">

        <!-- IMAGEN -->
        <div class="cont_portada--imagen Default_pointer">                        
            <img class="cont_podcast--imagen " alt="Fotografia PodCsst" src="<?php echo RUTA_URL?>/public/images/podcast/<?php echo $Datos['podCast']['imagen_redesSociales'];?>"/>
        </div>
        
        <div class="">
            <!-- PODCAST -->
            <audio class="cont_podcast--audio" src="<?php echo RUTA_URL . '/public/audio/' . $Datos['podCast']['nombre_audioPod'];?>" preload="none" controls></audio>
        </div>
        <div style="display: flex; justify-content: space-between; ">
            <div>
                <!-- FUENTE -->
                <small class="cont_portada_informacion--span">Lisbella Paez</small>
                
                <!-- FECHA -->
                <br>
                <small class="cont_portada_informacion--span">14-03-2023</small>
            </div> 
        </div>
    </div>         
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>