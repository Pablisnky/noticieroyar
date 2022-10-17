<div class="cont_portada" id="Cont_Portada">
    <?php
    foreach($Datos['not_Princ_Seleccionada'] as $Key) :   ?>
        <div class="cont_portada--noticia" id="Cont_Portada">

            <!-- IMAGEN -->
            <div class="cont_portada--imagen">                                                     
                <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'];?>" rel="noopener noreferrer" target="_blank"><img class="imagen--portada" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['not_Princ_Seleccionada'][0]['nombre_imagenNoticia'];?>"/></a>
            </div>

            <!-- RADIO BOTOM -->
            <div class="cont_radio"> 
                <?php
                foreach($Datos['datosNoticia'] as $Row) :  ?>       
                    <input class="cont_radio--input Default_pointer" type="radio" name="noticias" onclick="Llamar_NoticiaPrincipal('<?php echo $Row['ID_Noticia'];?>')"
                        <?php if($Key['ID_Noticia'] == $Row['ID_Noticia']){?> checked <?php }?>/>
                        <i></i>
                    <?php
                endforeach; ?>
            </div>

            <!-- TITULAR -->
            <div class="cont_portada--titular">                   
                <h2 class="titular--texto"><?php echo $Datos['not_Princ_Seleccionada'][0]['titulo'];?></h2>
            </div>
            
            <hr class="cont_portada--hr">
            
            <!-- RESUMEN -->
            <div class="cont_portada--texto">                   
                <h2 class="cont_portada--resumen"><?php echo $Key['subtitulo'];?></h2>
            </div>
        </div>                
        <?php
    endforeach; ?>
</div>  