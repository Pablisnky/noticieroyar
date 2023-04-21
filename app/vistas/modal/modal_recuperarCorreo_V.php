<!-- se muestra en login_V.php por medio de require en div id = "Contenedor_43" -->

<?php 
// Entra en el if por defecto
if($Datos == ''){ ?>
    <section class="sectionModal">        
        <a href="<?php echo RUTA_URL . '/Login_C';?>"><i class="fas fa-times spanCerrar"></i></a>
        <br>
         <div class="sectionModal__div">
            <p class="sectionModal__div__p">Indiquenos el correo afiliado, <br> enviaremos un código de recuperación</p>
            <br>
            <form action="<?php echo RUTA_URL . '/Login_C/RecuperarClave';?>" method="POST" autocomplete="off">
                <input class="login_cont--input borde--input" type="text" name="correo" id="Input_13_JS">
                <div class="contBoton">
                    <input class="boton" type="submit" value="Enviar">
                </div>
            </form>
        </div>   
    </section>      
    <?php
}
else if($Datos['bandera'] == 'aleatorioinsertado'){    ?> 
    <section class="sectionModal">        
        <a href="<?php echo RUTA_URL . '/Login_C';?>"><i class="fas fa-times spanCerrar"></i></a>
        <br> 
        <div class="sectionModal__div">
            <p class='sectionModal__div__p'>Se ha enviado un código al correo suministrado.</p> 
            <br>
            <form action="<?php echo RUTA_URL . '/Login_C/recibeCodigoRecuperacion';?>" method="POST">
                <input  class="login_cont--input borde--input" type= "text" readonly value="<?php echo $Datos['correo'];?>" name="correo">
                <br>
                <input  class="login_cont--input borde--input" type="text" name="ingresarCodigo" placeholder="Ingresar Código"> 
                <div class="contBoton">
                    <input class="boton" type="submit" value="enviar">
                </div>
            </form>  
        </div>         
    </section> 
     <?php
}
else if($Datos['bandera'] == 'nuevoIntento'){    ?> 
    <section class="sectionModal">        
        <a href="<?php echo RUTA_URL . '/Login_C';?>"><i class="fas fa-times spanCerrar"></i></a>
        <br> 
        <div class="sectionModal__div">
            <p class='sectionModal__div__p'>El código insertado es invalido.</p> 
            <br>
            <form action="<?php echo RUTA_URL . '/Login_C/recibeCodigoRecuperacion';?>" method="POST">
                <input  class="login_cont--input borde--input" type= "text" readonly value="<?php echo $Datos['correo'];?>" name="correo">
                <input  class="login_cont--input borde--input" type="text" name="ingresarCodigo" placeholder="Ingresar Código Nuevamente"> 
                <div class="contBoton">
                    <input class="boton" type="submit" value="enviar">
                </div>
            </form>  
        </div>         
    </section>  <?php
}
else if($Datos['bandera'] == 'verificado'){   ?>  
    <section class="sectionModal">         
        <a href="<?php echo RUTA_URL . '/Login_C';?>"><i class="fas fa-times spanCerrar"></i></a>
        <br> 
        <div class="sectionModal__div">
            <p class="sectionModal__div__p">Nueva clave de acceso</p>
            <!-- <P><small class="small_1 font--center">Debe contener seis digitos</small></p> -->
            <br>
            <form action="<?php echo RUTA_URL . '/Login_C/recibeCambioClave';?>" method="POST">
                <input  class="login_cont--input borde--input" type="password" name="clave" placeholder="Nuevo código" id="Clave">
                <br><br>
                <input  class="login_cont--input borde--input" type="password" name="repiteClave" placeholder="Repetir código">
                <input type="text" value="<?php echo $Datos['correo'];?>" name="correo"  style="display:none"> 
                <div class="contBoton">
                    <input class="boton"  type="submit" value="enviar" name="enviar_2">
                </div>
            </form>
        </div>         
    </section>  <?php
}  
else{   ?>
    <section class="sectionModal"> 
        <div class="sectionModal__div"">
            <p class='sectionModal__div__p'>Contraseña cambiada exitosamente</p>
            <br>
            <div class="contBoton">
                <a class='boton' href='<?php echo RUTA_URL . '/Login_C/index/NoAplica,SinBandera';?>'>Inicie sesión</a>
            </div>
        </div>         
    </section>  <?php    
} ?>