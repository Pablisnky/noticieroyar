<div class="cont_noticia" id="Cont_Noticia">
    <?php
    foreach($Datos['secciones'] as $Row) :?>
        <h1 class="cont_noticia--tituloSeccion"><?php echo $Row['seccion'];?></h1>  
        <section class="cont_noticia--seccion">
            <?php
            foreach($Datos['noticiasGenerales'] as $Key) : 
                if($Row['seccion'] == $Key['seccion']){ ?>
                <div class="cont_noticia--sencilla Default_pointer">
                    <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'];?>" rel="noopener noreferrer" target="_blank"><img class="cont_noticia-imagen" alt="Fotografia" src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenNoticia'];?>"/></a>

                    <div class="cont_noticia--titular">
                        <p><?php echo $Key['titulo'];?></p>
                        <hr class="cont_noticia--hr_1">
                        <small style="font-size: 1em; display:block"><?php echo $Key['fecha'];?></small style="font-size: 0.8em;">
                        <!-- <small style="font-size: 0.8em;">CNP 12.234</small style="font-size: 0.8em;"> -->                                
                        <!-- <small style="font-size: 0.8em; display:block">hace dos dias</small style="font-size: 0.8em;">
                        <small style="font-size: 0.8em; display:block">20 visualizaciones</small style="font-size: 0.8em;"> -->
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
<script src="<?php echo RUTA_URL.'/public/javascript/E_Noticia.js?v=' . rand();?>"></script>