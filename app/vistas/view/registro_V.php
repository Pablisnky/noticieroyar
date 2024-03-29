<section id="Section_5">
    <div syle="height: 100%;">
        <div style="min-height: 100%;" class="login_cont">
            <form action="../../Login_C/recibeRegistroSuscriptor" method="POST" id="FormularioCom" name="formRegistroCom" autocomplete="off" onsubmit="return validarRegistro()">
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
                        <input class="login_cont--input borde--input" type="text" name="correo" id="Correo" onblur="llamar_verificaCorreo(id, 'AfiCom')" onfocus="removerContenidoDiv()"/>
                        <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                        
                        <!-- MUNICIPIO AFILIADO -->                
                        <label class="login_cont--label">Municipio</label>
                        <select class="login_cont--select borde--input" name="municipio" id="Municipio"  onchange="SeleccionarParroquia(this.form)">
                            <option></option>
                            <option vlaue="Aristides Bastidas">Aristides Bastidas</option>
                            <option vlaue="Bolivar">Bolivar</option>
                            <option vlaue="Bruzual">Bruzual</option>
                            <option vlaue="Cocorote">Cocorote</option>
                            <option vlaue="Independencia">Independencia</option>
                            <option vlaue="Jose Antonio Paez">Jose Antonio Paez</option>
                            <option vlaue="La Trinidad">La Trinidad</option>
                            <option vlaue="Manuel Monge">Manuel Monge</option>
                            <option vlaue="Nirgua">Nirgua</option>
                            <option vlaue="Peña">Peña</option>
                            <option vlaue="San Felipe">San Felipe</option>
                            <option vlaue="Sucre">Sucre</option>
                            <option vlaue="Urachiche">Urachiche</option>
                            <option vlaue="Veroes">Veroes</option>
                        </select>               
                        
                        <label class="login_cont--label">Parroquia</label>
                        <select class="login_cont--select borde--input" name="parroquia" id="Parroquia">
                                <option>Seleccione parroquia</option>
                        </select>   

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
                
                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <div class="contBoton">  
                    <input class="Default_ocultar" type="text" name="id_noticia" value="<?php echo $Datos['id_noticia']?>"/>  
                    <input class="boton" type="submit" value="Suscribirse"/>
                </div>  
            </form>
        </div>
    </div>
</section>
                    
<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js';?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_Registro.js';?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/parroquias.js?v=' . rand();?>"></script> 