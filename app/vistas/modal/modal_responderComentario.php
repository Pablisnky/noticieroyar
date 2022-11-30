<!-- Archivo cargado desde Ajax por medio de Llamar_seccionesDisponible() en A_Cuenta_publicar.js -->
<section class="sectionModal section_10" id="MostrarSeccion">
    <div class="contenedor_24"> 
      <div class="contenedor_102">
        <h1 class="h1--secciones"></h1>   
        <span class="material-icons-outlined cont_modal--cerrar Default_pointer" id="Cerrar--modal" onclick="CerrarModal()">cancel</span>
      </div>
            <div class="contenedor_89">
                <?php      
                //$Datos['comentario'] trae información desde Noticias_C/responderComentario
                foreach($Datos['datosComentario'] as $Row)  :
                        // $ID_Seccion = $Row['ID_Seccion']; ?>
                        <div class="">
                            <form>
                                <p><?php echo $Row['comentario'];?></p>
                                <textarea id="ComentarioRespuesta"></textarea>
                            </form> 
                        </div>
                        <?php
                endforeach;  
                ?>  
                <
            </div> 
      
        <label class="boton" onclick="transferirComentario('<?php echo $Row['ID_Comentario'];?>')">Enviar respuesta</label>
        <!-- <label  onclick="TrasferirRespuesta()">Responder</label>     -->
    </div>
</section>    