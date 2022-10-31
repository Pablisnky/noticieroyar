<!-- Archivo cargado desde Ajax por medio de Llamar_anunciossDisponible() en A_ActualizarNoticia.js -->
<section class="sectionModal section_10" id="MostrarAnuncios">
    <div class="contenedor_24"> 
      <div class="contenedor_102">
        <h1 class="h1--secciones">Seleccione un anuncio publicitario</h1>   
        <span class="material-icons-outlined cont_modal--cerrar Default_pointer" id="Cerrar--modal" onclick="CerrarModalAnuncios()">cancel</span>
      </div>
      <form>
        <div class="contenedor_89">
            <?php      
            $ContadorAnuncio = 1;
            foreach($Datos['anuncios'] as $Row)  :
                    ?>
                <div class="contInputRadio efectoZoom" id="Contenedor_Radio">
                    <input class="Default_ocultar" type="radio" name="anuncio" id="<?php echo 'ContadorAnuncio_' . $ContadorAnuncio;?>" value="<?php echo $Row['ID_Anuncio']?>"  
                              onclick="transferirAnuncio(this.form, document.getElementById('ImgAnuncio').src='<?php echo RUTA_URL;?>/public/images/publicidad/<?php echo $Row['nombre_imagenPublicidad'];?>')"/>
                    
                    <label class="Default_pointer" for="<?php echo 'ContadorAnuncio_'.$ContadorAnuncio;?>">
                        <figure> 
                            <img class="actualizar_cont--imagen efectoZoom--imagen" alt="Fotografia Anuncio" src="<?php echo RUTA_URL?>/public/images/publicidad/<?php echo $Row['nombre_imagenPublicidad'];?>"/> 
                        </figure>
                    </label> 
                </div>
                <?php
                $ContadorAnuncio++;
            endforeach;  
            ?>  
        </div> 
      </form> 
    </div>
</section>  