<section id="Section_5">
    <div syle="height: 100%;">
        <div style="min-height: 100%;" class="login_cont">
            <form action="../../Login_C/recibeRegistroPeriodista" method="POST" id="FormularioCom" name="formRegistroCom" autocomplete="off" onsubmit="return validarRegistro()">
                <fieldset class="fieldset_1">
                    <legend class="legend_1">Registro Periodista</legend> 
                    
                    <div class="login_cont--form">
                        <!-- NOMBRE AFILIADO -->                
                        <label class="login_cont--label">Nombre</label>
                        <input class="login_cont--input borde--input" type="text" name="nombre" id="Nombre"/> 

                        <!-- APELLIDO AFILIADO -->                
                        <label class="login_cont--label">Apellido</label>
                        <input class="login_cont--input borde--input" type="text" name="apellido" id="Apellido"/> 

                        <!-- CORREO AFILIADO -->
                        <label class="login_cont--label">Correo electronico</label>
                        <input class="login_cont--input borde--input" type="text" name="correo" id="Correo" onblur="llamar_verificaCorreo(id, 'AfiCom')" onfocus="removerContenidoDiv()"/>
                        <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                                                       
                        <label class="login_cont--label">Telefono</label>
                        <input class="login_cont--input borde--input" type="text" name="telefono" id="Telefono"/> 

                        <label class="login_cont--label">CNP</label>
                        <input class="login_cont--input borde--input" type="text" name="cnp" id="CNP"/> 
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
                
                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <div class="contBoton">  
                    <input class="boton" type="submit" value="Suscribirse"/>
                </div>  
            </form>
        </div>
    </div>
</section>
                    
<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_RegistroPeriodista.js?v=' . rand();?>"></script>