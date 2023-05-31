<!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización del capture--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div class="login_cont" id="Contenedor_42">  
    <form action="<?php echo RUTA_URL; ?>/Panel_C/recibePeriodistaActualizar" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarPerfil()"> 
        <?php
        foreach($Datos['periodista'] as $Key) :   
            ?>
            <!-- PERIODISTA -->
            <fieldset class="fieldset_1">
                <legend class="legend_1">Datos generales</legend> 

                <label class="login_cont--label">Nombre</label>
                <input class="login_cont--input borde--input" type="text" name="nombrePeriodista" id="NombrePeriodista" value="<?php echo $Key['nombrePeriodista'];?>" autocomplete="off"/>
                
                <label class="login_cont--label">Apellido</label>
                <input class="login_cont--input borde--input" type="text" name="apellidoPeriodista" id="ApellidoPeriodista"  value="<?php echo $Key['apellidoPeriodista'];?>" autocomplete="off"/>
                                                            
                <label class="login_cont--label">Correo</label>
                <input class="login_cont--input borde--input" type="text" name="correoPeriodista" id="CorreoPeriodista" value="<?php echo $Key['correoPeriodista'];?>"  autocomplete="off"/>
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                <!-- onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()" -->
                
                <label class="login_cont--label">Telefono</label>
                <input class="login_cont--input borde--input" type="text" name="telefonoPeriodista" id="TelefonoPeriodista"  value="<?php echo $Key['telefonoPeriodista'];?>" autocomplete="off"/>

                <label class="login_cont--label">CNP</label>
                <input class="login_cont--input borde--input" type="text" name="CNP" id="CNPPeriodista"  value="<?php echo $Key['CNP'];?>" autocomplete="off"/>
            </fieldset>
            
            <!-- CONFIGURACION -->
            <fieldset class="fieldset_1">
                <legend class="legend_1">Configuracion</legend> 

                <label class="login_cont--label">Fuente por defecto</label>
                <input class="login_cont--input borde--input" type="text" name="fuenteDefault" id="NombrePeriodista" value="<?php echo $Key['nombrePeriodista'] . ' ' . $Key['apellidoPeriodista'] . ' CNP ' . $Key['CNP'];?>" autocomplete="off"/>
            </fieldset>
            <?php
        endforeach; ?>

        <!-- BOTON DE ENVIO -->
        <div class="cont_panel--guardar--catalogo"> 
            <input class="Default_ocultar" type="text" name="id_periodista" value="<?php echo $Datos['periodista'][0]['ID_Periodista'];?>"/>  
            
            <input class="boton" type="submit" value="Actualizar"/> 
        </div> 
    </form>
    <br><br>
</div>

<script src="<?php echo RUTA_URL . '/public/javascript/E_Panel_Periodista.js?v=' . rand();?>"></script> 
<!-- <script src="<?php //echo RUTA_URL . '/public/javascript/A_suscrip_perfil.js?v=' . rand();?>"></script>  -->
<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>

<?php //include(RUTA_APP . '/vistas/footer/footer.php'); ?>