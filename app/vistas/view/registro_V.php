
<section id="Section_5">
    <div syle="height: 100%; background-color: yellow">
        <div style="min-height: 100%;" class="login_cont">
            <form action="../Login_C/recibeRegistroSuscriptor" method="POST" id="FormularioCom" name="formRegistroCom" autocomplete="off" onsubmit="return validarAfiliacionCom()">
                <fieldset class="fieldset_1">
                    <legend class="legend_1">Registro de suscripción</legend> 
                    
                    <div class="login_cont--form">
                        <!-- NOMBRE AFILIADO -->                
                        <label class="login_cont--label">Nombre</label>
                        <input class="login_cont--input borde--input" type="text" name="nombre" id="Nombre"/> 

                        <!-- APELLIDO AFILIADO -->                
                        <label class="login_cont--label">Apellido</label>
                        <input class="login_cont--input borde--input" type="text" name="apellido" id="Apellido"/> 

                        <!-- CORREO AFILIADO -->
                        <label class="login_cont--label">Correo electronico</label>
                        <input class="login_cont--input borde--input" type="text" name="correo" id="CorreoAfiCom" onblur="llamar_verificaCorreo(id, 'AfiCom')" onfocus="removerContenidoDiv()"/>
                        <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                        
                        <!-- MUNICIPIO AFILIADO -->                
                        <label class="login_cont--label">Municipio</label>
                        <input class="login_cont--input borde--input" type="text" name="municipio" id="Municipio"/> 
                        
                        <div class="contenedor_43" id="Mostrar_verificarNombreTienda"></div>
                    </div>
                </fieldset>      
                <fieldset class="fieldset_1 fieldset_2">
                    <legend class="legend_1">Datos de accceso</legend>  
                    <div class="login_cont--form">
                        <!-- CLAVE -->
                        <label class="login_cont--label">Contraseña</label>
                        <input class="login_cont--input borde--input" type="password" name="clave" id="Clave"  onblur="llamar_verificaClave(this.value, 'AfiCom')"/>
                        <!-- Se recibe respuesta de ajax llamar_verificaClave()-->
                        <div class="contenedor_3" id="Mostrar_verificaClave"></div>

                        <!-- CONFIRMAR CLAVE -->
                        <label class="login_cont--label">Confirmar contraseña</label>
                        <input class="login_cont--input borde--input" type="password" name="confirmarClave" id="ConfirmarClave"/>
                    </div>          
                </fieldset>        
                <div class="login_cont--botonSubmit">            
                    <input class="boton" type="submit" value="Suscribirse"/>
                </div>  
            </form>
        </div>
    </div>
</section>

<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js';?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_Registros.js';?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/A_Registros.js';?>"></script>