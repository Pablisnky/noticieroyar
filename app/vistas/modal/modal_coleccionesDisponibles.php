<!-- Archivo cargado desde Ajax por medio de Llamar_anunciossDisponible() en A_ActualizarNoticia.js -->
<section class="sectionModal section_10" id="MostrarAnuncios">
    <div class="contenedor_24"> 
      <div class="contenedor_102">
        <h1 class="h1--secciones">Seleccione una colección</h1>   
        <span class="material-icons-outlined cont_modal--cerrar Default_pointer" id="Cerrar--modal" onclick="CerrarModalAnuncios()">cancel</span>
      </div>
      <form>
        <div class="contenedor_89">
            <?php      
            $ContadorColeccion = 1;
            foreach($Datos['coleccionesModal'] as $Row)  :
                    ?>
                <div class="contInputRadio efectoZoom" id="Contenedor_Radio">
                    <input class="Default_ocultar" type="radio" name="coleccion" id="<?php echo 'ContadorColeccion_' . $ContadorColeccion;?>" value="<?php echo $Row['ID_Coleccion']?>"  
                              onclick="transferirColeccion(this.form, document.getElementById('ImgColeccion').src='<?php echo RUTA_URL;?>/public/images/colecciones/<?php echo $Row['nombre_imColeccion'];?>')"/>
                    
                    <label class="Default_pointer" for="<?php echo 'ContadorColeccion_'.$ContadorColeccion;?>">
                        <figure> 
                            <img class="actualizar_cont--imagen efectoZoom--imagen" alt="Fotografia coleccion" src="<?php echo RUTA_URL?>/public/images/colecciones/<?php echo $Row['nombre_imColeccion'];?>"/> 
                        </figure>
                    </label> 
                </div>
                <?php
                $ContadorColeccion++;
            endforeach;  
            ?>  
        </div> 
      </form> 
    </div>
</section>  