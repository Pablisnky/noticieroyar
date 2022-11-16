<!-- Archivo cargado desde Ajax por medio de Llamar_ -->
<section class="sectionModal section_10" id="MostrarVerificarLogin">
    <div class="contenedor_24"> 
        <h1 class="h1--secciones">No ha iniciado sesión</h1>   
        <span class="material-icons-outlined cont_modal--cerrar Default_pointer" id="Cerrar--modal" onclick = "CerrarModal("MostrarVerificarLogin')">cancel</span>
        
        <form action = "<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method = "POST" autocomplete="off">	
            <fieldset class="fieldset_1">
                <legend class="legend_1">Acceso suscriptores</legend>
                <div class="login_cont--form">
                    <label class="login_cont--label">e-mail</label>
                    <input class="login_cont--input borde--input" type="text" name="correo_Arr" id="Correo" autocomplete="off" onkeydown="blanquearInput('Correo')">  

                    <label class="login_cont--label">Contraseña</label>
                    <input class="login_cont--input borde--input" type="password" name="clave_Arr" id="Clave"  autocomplete="off">             

                    <div class="contenedor_45">
                        <input type="checkbox" id="Recordar" name="recordar" value="1">
                        <label class="label_20" for="Recordar">Recordar datos en este equipo.</label>
                    </div> 
                    <div class="login_cont--botonSubmit">
                        <input class="boton boton--largo" type="submit" value="Entrar"/>
                    </div>
                </div>
            </fieldset>  
        </form>
    </div>
</section>  