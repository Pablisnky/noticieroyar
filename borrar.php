<!-- MODAL -->
<div class="cont_modal" id="VentanaModal">				
    <span class="material-icons-outlined cont_modal--cerrar Default_pointer" id="Cerrar--modal">cancel</span>
    <p class="cont_modal--p">Duelo nacional por tragedia en Las Tejerías, estado Aragua.</p>
    <img class="cont_modal--logo" src="<?php echo RUTA_URL?>/public/images/duelo.jpg"/>
</div>

<div class="cont_portada" id="Cont_Portada">
    <?php
    foreach($Datos['datosNoticia'] as $Key) :  ?>
        <div class="cont_portada--noticia" id="cont_Portada_JS">

            <!-- IMAGEN -->
            <div class="cont_portada--imagen">                        
                <figure>
                    <img class="imagen--portada imagen_2--JS" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenNoticia'];?>" id="<?php echo $Key['ID_Noticia'];?>"/> 
                </figure>
            </div>

            <!-- RADIO BOTOM -->
            <div class="cont_radio Default_quitarEscritorio"> 
                <?php
                foreach($Datos['datosNoticia'] as $Row) :  ?>       
                        <input class="cont_radio--input Default_pointer" type="radio" name="noticias" onclick="Llamar_NoticiaPrincipal('<?php echo $Row['ID_Noticia'];?>')"
                    <?php if($Row['ID_Noticia'] == $Datos['ID_NoticiaInicial']){?> checked <?php } ?>/>
                    <i></i>
                    <?php
                endforeach; ?>
            </div>

            <!-- TITULAR -->
            <div class="cont_portada--titular">                   
                <h2 class="titular--texto"><?php echo $Key['titulo'];?></h2>
            </div>
            
            <!-- RESUMEN -->
            <div class="cont_portada--texto columnas">
                <p class="subtitulo"><?php echo $Key['subtitulo'];?></p>
            </div>
        </div>                
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
<script src="<?php echo RUTA_URL.'/public/javascript/E_Inicio.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Inicio.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/convoca_SW.js';?>"></script>