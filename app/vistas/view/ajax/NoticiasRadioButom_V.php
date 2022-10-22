<!-- Archivo cargado via AJAX en inicio_V.php -->
<div class="cont_portada" id="Cont_Portada">
    <?php
    foreach($Datos['noticia'] as $Key) :   ?>
        <div class="cont_portada--noticia" id="Cont_Portada">

            <!-- IMAGEN -->
            <div class="cont_portada--imagen">                                                     
                <a href="<?php echo RUTA_URL . '/Noticias_C/detalleNoticia/' . $Key['ID_Noticia'];?>" rel="noopener noreferrer" target="_blank"><img class="imagen--portada" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['noticia'][0]['nombre_imagenNoticia'];?>"/></a>
            </div>

            <!-- TITULAR -->
            <div class="cont_portada--titular">                   
                <h2 class="titular--texto"><?php echo $Datos['noticia'][0]['titulo'];?></h2>
            </div>
                        
            <!-- RESUMEN -->
            <div class="cont_portada--texto">                   
                <h2 class="cont_portada--resumen"><?php echo $Key['subtitulo'];?></h2>
            </div>

            <!-- INFORMACION -->
            <div class="cont_portada--informacion">
                <hr class="cont_noticia--hr_1 Default_quitarMovil">
                <small class="cont_portada_informacion--span"><?php echo $Key['fecha'];?></small >
                <?php
                // CANTIDAD DE IMAGENES
                foreach($Datos['cantidadImagenes'] as $Row)   :  
                    if($Key['ID_Noticia'] == $Row['ID_Noticia']){ ?> 
                        <small class="cont_portada_informacion--span"><?php echo $Row['cantidad'];?> imagenes</small> 
                        <?php
                    }
                endforeach;
                // VIDEO
                foreach($Datos['videos'] as $Row_4)  : 
                    if($Key['ID_Noticia'] == $Row_4['ID_Noticia']){ ?> 
                        <small class="cont_portada_informacion--span">video</small> 
                        <?php
                    }
                endforeach;
                foreach($Datos['anuncios'] as $Row_2)   :  
                    if($Key['ID_Noticia'] == $Row_2['ID_Noticia']){ ?>
                        <small class="cont_portada_informacion--span">+ Anuncio</small>
                        <?php
                    }
                endforeach;  ?>     
                <!-- FUENTE -->
                <br>
                <small class="cont_portada_informacion--span"><?php echo $Key['fuente'];?></small">
            </div> 
        </div>                
        
        <!-- BOTONES DEL PANEL FRONTAL -->
        <div class="cont_portada--botones">
            <div>
                <span class="material-icons-outlined Default_pointer Default--seleccion" onclick="Llamar_NoticiaAnterior('<?php echo $Key['ID_Noticia'];?>')">arrow_back_ios_new</span>
            </div>
            <div>
                <label class="boton boton--corto"><a class="Default_font--white" href="<?php echo RUTA_URL . '/Noticias_C/NoticiasGenerales';?>">Mas noticias</a></label> 
            </div>         
            <div>
                <span class="material-icons-outlined Default_pointer Default--seleccion" onclick="Llamar_NoticiaPosterior('<?php echo $Key['ID_Noticia'];?>')">arrow_forward_ios</span>
            </div>
        </div>    
        <?php
    endforeach; ?>
</div>  