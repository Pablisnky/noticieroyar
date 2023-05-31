<section class="detalle_cont--comentario">
	<div class="login_cont cont_login">
        <form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST" onsubmit = "return validarLogin()">	
            <fieldset class="fieldset_1">
                <legend class="legend_1">Datos de acceso</legend>
                <div class="login_cont--form">
                    <input class="login_cont--input borde--input" type="text" name="correo_Arr" id="Correo_Usu" value="<?php echo $Datos['correoRecord']?>" autocomplete="off">   

                    <input class="login_cont--input borde--input" type="password" name="clave_Arr" id="Clave" value="<?php echo $Datos['claveRecord']?>" autocomplete="off"> 
                    
                    <!-- <div class="contenedor_45">
                        <input type="checkbox" id="Recordar" name="no_recordar" value="1">
                        <label class="label_20" for="Recordar">Dejar de recordar datos en este equipo.</label>
                    </div>   -->
                </div>
                
                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <div class="contBoton">            
                    <!-- este input es solo para que no entre en conclicto con el archivo E_Login.js, debido a que este ultimo tiene un addEventListener  -->
                    <input class="Default_ocultar" type="text" id="Label_7"> 

                    <input class="boton" id="Boton_Login" type="submit"  value="Entrar">
                </div>
            </fieldset>  
        </form>
    </div>   
</section>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Login.js';?>"></script>

</body>
</html>

<?php //include(RUTA_APP . "/vistas/footer/footer.php");?>