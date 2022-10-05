	<div class="cont_portada" id="Cont_Portada">
        <?php
        foreach($Datos['not_Princ_Seleccionada'] as $Key) : 
            // if($Key['ID_Noticia'] == $Datos['not_Princ_Seleccionada'][0]['ID_Noticia']){   ?>
                <div class="cont_portada--noticia" id="cont_Portada_JS">

                    <!-- IMAGEN NOTICIA  -->
                    <div>                        
                        <figure>
                            <img class="cont_portada--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['not_Princ_Seleccionada'][0]['nombre_imagenNoticia'];?>"/> 
                        </figure>

                        <!-- RADIO BOTOM -->
                        <div class="cont_radio"> 
                            <?php
                            foreach($Datos['datosNoticia'] as $Row) : 
                                // echo $Key['ID_Noticia'];
                                // echo $Row['ID_Noticia']; ?>       
                                <input class="cont_radio--input Default_pointer" type="radio" name="noticias" onclick="Llamar_NoticiaPrincipal('<?php echo $Row['ID_Noticia'];?>')"
        <?php if($Key['ID_Noticia'] == $Row['ID_Noticia']){?> checked <?php }?>/>
        <i></i>
                                <?php
                            endforeach; ?>
                        </div>
                    </div>

                    <!-- TITULAR -->
                    <div class="cont_portada--titular">                   
                        <h2 class="titular--texto"><?php echo $Datos['not_Princ_Seleccionada'][0]['titulo'];?></h2>
                    </div>
                    
                    <!-- RESUMEN -->
                    <div class="cont_portada--texto columnas">
                        <p class="subtitulo"><?php echo $Datos['not_Princ_Seleccionada'][0]['subtitulo'];?></p>
                    </div>
                </div>                
                <?php
            // }
        endforeach; ?>
	</div>  