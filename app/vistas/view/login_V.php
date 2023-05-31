<!-- invocado desde Contraloria_C/VerificaLogin y -->
<?php
    //Se añade la clase cuando se viene desde una noticia a la que se desea hacer un comentario
    if(($Datos['bandera'] == 'responder')){ ?>
        <style>
            .detalle_cont--comentario{
                background-color: var(--FondoDivModal); 
                position: fixed; 
                top: 0%;
                left: 0%;
                width: 100%;
                height: 100%;
            }
        </style>
        <?php
    }
    else{   ?>
        <style>
            .detalle_cont--comentario{
                background-color: white; 
                position: fixed; 
                top: 0%;
                left: 0%;
                width: 100%;
                height: 100%;
            }
        </style>
        <?php
    }
?>

<section class="detalle_cont--comentario">
    <div class="login_cont cont_login">
        <form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST" name="formLogin" onsubmit = "return validarLogin()">	
            <fieldset class="fieldset_1" >
                <legend class="legend_1">Acceso a suscriptores</legend>
                <div class="login_cont--form">
                    <label class="login_cont--label">e-mail</label>
                    <input class="login_cont--input borde--input" type="text" name="correo_Arr" id="Correo" autocomplete="off"/>  

                    <label class="login_cont--label">Contraseña</label>
                    <input class="login_cont--input borde--input" type="password" name="clave_Arr" id="Clave"  autocomplete="off"/>             

                    <div class="contenedor_45">
                        <input class="" type="checkbox" id="Recordar" name="recordar" value="1"/>
                        <label class="" class="label_20" for="Recordar">Recordar datos en este equipo.</label>
                    </div> 
                    
                    <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                    <div class="contBoton">
                            <?php
                        if($Datos){   ?>
                            <input class="Default_ocultar" type="text" name="bandera" value="<?php echo $Datos['bandera']?>"/>
                            <input class="Default_ocultar" type="text" name="id_noticia" value="<?php echo $Datos['id_noticia']?>"/>
                            <input class="Default_ocultar" type="text" name="id_comentario" value="<?php echo $Datos['id_comentario']?>"/>
                            <?php
                        }   ?>
                        <input class="boton" id="Boton_Login" type="submit" value="Entrar"/>
                    </div>
                </div>
            </fieldset>  
        </form>
        <div class="login_cont--recuperarClave">	
            <p>¿Olvidaste tu contraseña?</p>
            <label class="Default_link Default_pointer" id="Label_7">Recuperala</label>
            <hr class="hr_3">
            <p>¿Quieres suscribirte?</p>
            <a href="<?php echo RUTA_URL . '/Login_C/suscripcion/' . $Datos['id_noticia'];?>">Suscribete</a>
            <hr class="hr_3">            
            <p class="Inicio_8" style="line-height: 160%;">¿Eres periodista acreditado CNP en Venezuela?</p>
            <a href="<?php echo RUTA_URL . '/Login_C/suscripcion/SinID_Noticia';?>">Crea contenido</a>
        </div>
    </div>

    <!-- RECUPERAR CONTRASEÑA -->
    <div class="Default_ocultar" id="Contenedor_43"">
        <?php 
            $Datos = '';
            require(RUTA_APP . "/vistas/modal/modal_recuperarCorreo_V.php"); 
        ?>
    </div>
</section>
		
<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/E_Login.js?v='. rand();?>"></script>