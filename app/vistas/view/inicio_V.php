    <!-- EXPLICACION PWA -->
    <!-- <div class="contenedor_98 contenedor_98--inicio" id="Aplicacion_PWA">
        <div>
            <h3 class="footer__h3 footer__h3--inicio">APLICACIÓN</h3>
            <h3 class="footer__h3 footer__h3--inicio">MULTIPLATAFORMA</h3>
        </div>
        <img class="imagen_5 imagen_5--inicio" alt="Logo PWA" src="<?php echo RUTA_URL;?>/public/images/PWA.png"/>
    </div> -->
    <div class="cont_modal" id="VentanaModal">				
		<span class="material-icons-outlined cont_modal--cerrar Default_pointer" id="Cerrar--modal">cancel</span>
		<p class="cont_modal--p">Duelo nacional por tragedia de Tejerías estado Aragua.</p>
		<img class="cont_modal--logo" src="<?php echo RUTA_URL?>/public/images/duelo.jpg"/>
	</div>
	<!-- PORTADA -->
	<div class="cont_portada" id="Cont_Portada">
        <?php
        foreach($Datos['datosNoticia'] as $Key) :  ?>
            <div class="cont_portada--noticia" id="cont_Portada_JS">
                <!-- IMAGEN NOTICIA  -->
                <div class="cont_portada--imagen">                        
                    <figure>
                        <img class="imagen--portada" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenNoticia'];?>"/> 
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