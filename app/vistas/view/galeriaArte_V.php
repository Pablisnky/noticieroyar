<style>    
    #ConoDesplegar:hover #MenuSecundario { margin-top: 25vh; opacity: 1;}
</style>
<div class="cont_Artista--main">
    <div class="cont_galeria--texto" id="ConoDesplegar">
        <div>
            <h1 class="h_1">Galeria de arte</h1>
            <small class="small_3">& marketplace</small>
        </div>
        <div class="cont_galeria--icono"> 
            <img class="Default_pointer" style="width: 2em; margin-left: 20%" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_expand_more_black_24dp.png'?>"/>
        </div>
   
        <!-- MUESTRA MENU SECUNDARIO --> 
        <div class="cont_galeria--menuSecundario borde_1" id="MenuSecundario">            
            <div class="cont_detalle_Producto--suscriptor">
                <img style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/pintor/outline_palette_black_24dp.png'?>"/>
                <a class="cont_detalle_Producto--p Default_font--black" href="<?php echo RUTA_URL . '/Login_C/index/SinID_Noticia,SinBandera';?>">Exponer obras</a>
            </div>
                     
            <div class="cont_detalle_Producto--suscriptor">
                <img style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/perfil/outline_perm_identity_black_24dp.png'?>"/>
                <a class="cont_detalle_Producto--p Default_font--black" href="<?php echo RUTA_URL . '/Login_C/suscripcion/SinID_Noticia'?>">Registrarse como artista</a>
            </div>

            <div class="cont_detalle_Producto--suscriptor">
                <img style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/listado/outline_fact_check_black_24dp.png'?>"/>
                <label class="cont_detalle_Producto--p">Terminos y condiciones</label>
            </div>              

            <div class="cont_detalle_Producto--suscriptor">
                <img style="width: 1.5em; margin-right: 5px" src="<?php echo RUTA_URL . '/public/iconos/telefono/outline_phone_iphone_black_24dp.png'?>"/>
                <label class="cont_detalle_Producto--p">Contactanos</label>
            </div>              
        </div>
    </div>
    <div class="cont_Artista--botones">
        <?php
        foreach($Datos['datosArtistas'] as $Row)   :   ?>
            <a href="<?php echo RUTA_URL . '/GaleriaArte_C/artistas/' . $Row['ID_SUscriptor'];?>">
                <div class="cont_artista--informacion">
                    <figure>
                        <img class="cont_Artista--img borde_1" name="imagenNoticia" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/galeria/<?php echo $Row['ID_SUscriptor'];?>_<?php echo $Row['nombreSuscriptor'];?>_<?php echo $Row['apellidoSuscriptor'];?>/perfil/<?php echo $Row['nombre_imagenPortafolio']?>"/>
                    </figure>
                    <div>
                        <p class="cont_Artista--leyenda_1 Default_font--black"><?php echo $Row['nombreSuscriptor'] . ' ' . $Row['apellidoSuscriptor']?></p>
                        <!-- <p class="Default_font--black"><?php //echo $Row['catgeoriaArtista']?></p> -->
                        <p class="Default_font--black"><?php echo $Row['municipioSuscriptor']?></p>
                        <!-- <p class="Default_font--black"><?php echo $Row['estadoSuscriptor']?></p> -->
                    </div>
                </div>
            </a>
            <?php
        endforeach; ?>
    </div> 
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_GaleriaArte.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL;?>/public/javascript/FullScreem.js?v=<?php echo rand();?>"></script> 