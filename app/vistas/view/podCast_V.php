<div class="cont_portada" >
	<div>
		<h1 class="cont_galeria_h1 Default--textoVertical">PodCast</h1>
	</div>
    <?php
    $Iterador = 1;
    foreach($Datos['podCast'] as $Key) :  ?>
        <div class="cont_podcast">
            <div class="borde_1">
                <!-- TITULO -->                
                <!-- <h1 class="cont_podcast--titulo"><?php echo $Key['titulo_podcast'];?></h1> -->

                <!-- IMAGEN -->
                <div class="cont_portada--imagen Default_pointer">                        
                    <img class="cont_podcast--imagen " alt="Fotografia PodCsst" src="<?php echo RUTA_URL?>/public/images/podcast/<?php echo $Key['imagen_redesSociales'];?>"/>
                </div>
                
                <div class="">
                    <!-- PODCAST -->
                    <audio class="cont_podcast--audio" src="<?php echo RUTA_URL . '/public/audio/' . $Key['nombre_audioPod'];?>" preload="none" controls></audio>
                </div>
                <div style="display: flex; justify-content: space-between; ">
                    <div>
                        <!-- FUENTE -->
                        <small class="cont_portada_informacion--span">Lisbella Paez</small>
                        
                        <!-- FECHA -->
                        <br>
                        <small class="cont_portada_informacion--span">14-03-2023</small>
                    </div> 
                    <div class="detalle_cont--redesSociales--Panel" style="width: 50%">
                        <!-- COMPARTIR FACEBOOK -->       
                        <div class="detalle_cont--red">      
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/PodCast_C/podCats_Facebook/<?php echo $Key['ID_Podcast'];?>" target="_blank" rel="noopener noreferrer"><img style="height: 1.8em;" alt="facebook" src="<?php echo RUTA_URL?>/public/images/facebook.png"/></a>
                        </div> 
                        
                        <!-- COMPARTIR TWITTER -->
                        <div class="detalle_cont--red">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo RUTA_URL;?>/PodCast_C/podCats_Facebook/<?php echo $Key['ID_Podcast'];?>&text=<?php echo $Key['titulo_podcast'];?>" target="_blank"><img style="height: 2em;" src="<?php echo RUTA_URL?>/public/images/twitter.png"/></a>
                        </div>  
                        
                        <!-- WHATSAPP -->
                        <div class="detalle_cont--red">
                            <a href="whatsapp://send?text=<?php echo $Key['titulo_podcast']?>...<?php echo RUTA_URL?>/PodCast_C/podCats_Facebook/<?php echo $Key['ID_Podcast'];?>" data-action="share/whatsapp/share"><img style="height: 2em;" alt="Whatsapp" src="<?php echo RUTA_URL?>/public/images/Whatsapp.png"/></a>
                        </div>  
                    </div>
                </div>
            </div>
        </div>         
        <?php
        $Iterador++;
    endforeach;     ?>
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>