<div class="cont_Artista--main">
    <div class="cont_Contraloria--texto">
        <p class="p_1">Artistas yaracuyanos.</p>
    </div>
    <!-- <div class="cont_Artista"> -->
        <div class="cont_Artista--botones">
            <?php
            foreach($Datos['datosArtistas'] as $Row)   :   ?>
                <a href="<?php echo RUTA_URL . '/GaleriaArte_C/artistas/' . $Row['ID_Artista'];?>">
                    <div>
                        <figure>
                            <img class="cont_Artista--img borde_1" name="imagenNoticia" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/galeria/<?php echo $Row['ID_Artista'];?>_<?php echo $Row['nombreArtista'];?>_<?php echo $Row['apellidoArtista'];?>/perfil/<?php echo $Row['imagenArtista']?>"/>
                        </figure>
                        <div>
                            <p class="cont_Artista--leyenda_1 Default_font--black"><?php echo $Row['nombreArtista'] . ' ' . $Row['apellidoArtista']?></p>
                            <p class="Default_font--black"><?php echo $Row['catgeoriaArtista']?></p>
                            <p class="Default_font--black"><?php echo $Row['municipioArtista']?></p>
                        </div>
                    </div>
                </a>
                <?php
            endforeach; ?>
        </div> 
    <!-- </div> -->
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL;?>/public/javascript/FullScreem.js?v=<?php echo rand();?>"></script> 