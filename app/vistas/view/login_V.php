<section>
    <div class="login_cont" style="min-height: 100%; background-color:white; margin-top: 5%; border-radius: 15px">
            <form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST" name="formLogin" onsubmit = "return validarLogin()">	
                <fieldset class="fieldset_1" >
                    <legend class="legend_1">Acceso a suscriptores</legend>
                    <div class="login_cont--form">
                        <label class="login_cont--label">e-mail</label>
                        <input class="login_cont--input borde--input" type="text" name="correo_Arr" id="Correo" autocomplete="off" onkeydown="blanquearInput('Correo')"/>  

                        <label class="login_cont--label">Contraseña</label>
                        <input class="login_cont--input borde--input" type="password" name="clave_Arr" id="Clave"  autocomplete="off"/>             

                        <div class="contenedor_45">
                            <input type="checkbox" id="Recordar" name="recordar" value="1"/>
                            <label class="label_20" for="Recordar">Recordar datos en este equipo.</label>
                        </div> 
                        <div class="login_cont--botonSubmit">
                            <input class="" type="text" name="bandera" value="<?php echo $Datos['bandera']?>"/>
                                <?php
                            if(!empty($Datos['ID_Noticia'])){   ?>
                                <input class="" type="text" name="id_noticia" value="<?php echo $Datos['ID_Noticia']?>"/>
                                <?php
                            }   ?>
                            <input class="boton boton--largo" type="submit" value="Entrar"/>
                        </div>
                    </div>
                </fieldset>  
            </form>
        <div class="login_cont--recuperarClave">	
            <p class="p_4">¿Olvidaste tu contraseña?</p>
            <label class="Default_link Default_pointer" id="Label_7">Recuperala</label>
            <hr class="hr_3">
            <p class="p_4">¿Quieres suscribirte?<p>
            <a class="" href="<?php echo RUTA_URL . '/Login_C/suscripcion';?>">Suscripción</a>
        </div>
    </div>

    <!-- RECUPERAR CONTRASEÑA -->
    <div class="Default_ocultar" id="Contenedor_43"">
        <?php 
            $Datos = '';
            require(RUTA_APP . "/vistas/modal/modal_recuperarCorreo.php"); 
        ?>
    </div>
</section>
		
<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js';?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_Login.js';?>"></script>