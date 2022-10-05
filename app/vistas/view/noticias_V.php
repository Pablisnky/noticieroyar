    <!-- EXPLICACION PWA -->
    <!-- <div class="contenedor_98 contenedor_98--inicio" id="Aplicacion_PWA">
        <div>
            <h3 class="footer__h3 footer__h3--inicio">APLICACIÓN</h3>
            <h3 class="footer__h3 footer__h3--inicio">MULTIPLATAFORMA</h3>
        </div>
        <img class="imagen_5 imagen_5--inicio" alt="Logo PWA" src="<?php echo RUTA_URL;?>/public/images/PWA.png"/>
    </div> -->

	<div class="cont_noticia" id="">
        <?php
        foreach($Datos['secciones'] as $Row) :?>
            <h1><?php echo $Row['seccion'];?></h1>  
            <section class="cont_noticia--seccion"><?php
                foreach($Datos['noticiasGenerales'] as $Key) : 
                    if($Row['seccion'] == $Key['seccion']){ ?>
                        <div class="cont_noticia--sencilla">
                            <figure>
                                <img class="cont_noticia-imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenNoticia'];?>"/> 
                            </figure>
                            <div class="cont_noticia-titular">
                                <?php echo $Key['titulo'];?></p>
                            </div>
                        </div> 
                        <?php
                    }      
                endforeach; ?>            
            </section>
                    <?php
        endforeach; ?>
	</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Inicio.js?v=' . rand();?>"></script>
<!-- <script src="<?php echo RUTA_URL.'/public/javascript/A_Inicio.js?v=' . rand();?>"></script> -->
<!-- <script src="<?php echo RUTA_URL.'/public/convoca_SW.js';?>"></script> -->