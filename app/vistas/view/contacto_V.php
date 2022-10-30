    <div class="contenedor_11 anchor_2" id="Contacto">
        <p class="p_4">Contacto</p>
        <p class="p_9 p_9--centro">Sugerencias, dudas, preguntas y lo que desees decirnos.</p>
        <div class="Inicio_2">
            <form action="" method="post" autocomplete="off" name="Contacto" id="contacto">
                <fieldset class="fieldset_1"> 
                    <i class="far fa-envelope icono_1 icono_2"></i>
                    <input class="placeholder borde_1" type="text" name="nombre" id="Nombre" placeholder="Nombre"/>

                    <input class="placeholder borde_1" type="email" name="correo" id="Correo" placeholder="Correo electronico"/>

                    <label class="label_4" for="Contenido">Asunto</label>
                    <textarea class="contenido_2 borde_1" name="comentario" id="Contenido"></textarea>
                    <input class="contador" type="text" name="contador" id="Contador">

                    <div class="contenedor_26">
                        <input class="boton" type="submit" id="submitContacto" name="Enviar" value="enviar"/>
                    </div>
                </fieldset>        
            </form>
            <div class="contenedor_contacto">
                <div class="contenedor_contacto__div1">
                    <i class="fas fa-mobile-alt icono_2"></i>
                </div>
                <div>
                    <a class="a_5" href="">+58 424-537.40.44</a>
                </div>
            </div>
        </div>
    </div>     
    
<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>