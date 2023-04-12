<!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización del capture--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/suscriptores/panel_suscrip_V.php');?>

<div class="login_cont" id="Contenedor_42">  
    <form action="<?php echo RUTA_URL; ?>/Suscriptor_C/actualizaNombreComercial" method="POST" name="form_Configurar" enctype="multipart/form-data" autocomplete="off"> <!--  onsubmit="return validarPerfil()" -->
        <?php
        foreach($Datos as $Key) :   
            ?>
            <!-- SUSCRIPTOR -->
            <fieldset class="fieldset_1">
                <legend class="legend_1">Datos suscriptor</legend> 

                <label class="login_cont--label">Nombre</label>
                <input class="login_cont--input borde--input" type="text" name="nombreSuscriptor" id="" value="<?php echo $Key['nombreSuscriptor'];?>" autocomplete="off"/>
                
                <label class="login_cont--label">Apellido</label>
                <input class="login_cont--input borde--input" type="text" name="apellidoSuscriptor" id=""  value="<?php echo $Key['apellidoSuscriptor'];?>" autocomplete="off"/>
                                                            
                <label class="login_cont--label">Correo</label>
                <input class="login_cont--input borde--input" type="text" name="correoSuscriptor" id="" value="<?php echo $Key['correoSuscriptor'];?>" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()" autocomplete="off"/>
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>

                <label class="login_cont--label">Municipio</label>
                <select class="login_cont--select borde--input" name="municipio" id="Municipio_Com" onchange="SeleccionarParroquia(this.form)">
                    <?php
                    if(!empty($Key['municipioSuscriptor'])){ ?>
                        <option><?php echo $Key['municipioSuscriptor'];?></option>
                        <?php
                    } 
                    else{   ?>
                    <option>Seleccione municipio</option>
                        <?php
                    }  ?>
                </select>

                <label class="login_cont--label">Parroquia</label>
                <select class="login_cont--select borde--input" name="parroquia" id="Parroquia_Com">
                    <?php 
                    if(!empty($Key['parroquiaSuscriptor'])){ ?>
                        <option><?php echo $Key['parroquiaSuscriptor'];?></option>
                        <?php
                    } 
                    else{   ?>
                        <option>Seleccione parroquia</option>
                        <?php
                    }  ?>
                </select>                
            </fieldset>

            <br><br>
            <!-- DATOS COMERCIALES -->
            <small class="small_1">Usuarios con publicaciones en clasificados</small>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos comerciales</legend> 

                <!-- IMAGEN CATALOGO -->
                <div class="">
                    <label class="login_cont--label">Imagen catalogo</label>
                   
                    <?php
                        if($Key['nombreImgCatalogo'] == ''){   ?>
                            <label class="Default_pointer" for="imgCatalogo">    
                                <figure>
                                    <img class="cont_panel--imagen--catalogo" name="imagenNoticia" alt="Fotografia Principal" id="blah" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                                </figure>
                            </label>
                            <input class="Default_ocultar" type="file" name="imagenCatalogo" id="imgCatalogo"/>
                            <?php
                        }
                        else{   ?>
                            <label class="Default_pointer" for="imgCatalogo"> 
                                <figure>
                                    <img class="cont_panel--imagen--catalogo" name="imagenNoticia" alt="Fotografia del catalogo" id="blah" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $Key['ID_Suscriptor']?>/<?php echo $Key['nombreImgCatalogo']?>"/>
                                </figure>
                            </label>
                            <input class="Default_ocultar" type="file" name="imagenCatalogo" id="imgCatalogo"/>
                            <?php
                        }   ?>
                </div>               

                <label class="login_cont--label">Telefono</label>
                <input class="login_cont--input borde--input" type="text" name="telefono" id=""  value="<?php echo $Key['telefonoSuscriptor'];?>" autocomplete="off" placeholder="00000000000"/>

                <label class="login_cont--label">Pseudonimo</label>
                <input class="login_cont--input borde--input" type="text" name="pseudonimo" id="" value="<?php echo $Key['pseudonimoSuscripto'];?>" autocomplete="off"/>
            </fieldset>

            <!-- FORMAS DE PAGO-->
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Formas de pago aceptadas</legend>
                <div class="contenedor_166">   
                    <input type="checkbox" name="transferencia" id="Transferencia" <?php if($Key['transferencia'] == 1){echo 'checked';} ?>/>
                    <label class="contInputRadio__label" for="Transferencia">Transferencia</label>           
                </div>  
                <div class="contenedor_166">   
                    <input type="checkbox" name="pago_movil" id="Pago_movil" <?php if($Key['pago_movil'] == 1){echo 'checked';} ?>/>
                    <label class="contInputRadio__label" for="Pago_movil">Pago movil</label>           
                </div>  
                <div class="contenedor_166">   
                    <input type="checkbox" name="paypal" id="Paypal" <?php if($Key['paypal'] == 1){echo 'checked';} ?>/>
                    <label class="contInputRadio__label" for="Paypal">Paypal</label>           
                </div>  
                <div class="contenedor_166">   
                    <input type="checkbox" name="zelle" id="Zelle" <?php if($Key['zelle'] == 1){echo 'checked';} ?>/>
                    <label class="contInputRadio__label" for="Zelle">Zelle</label>           
                </div>  
                <div class="contenedor_166">   
                    <input type="checkbox" name="criptomoneda" id="Criptomoneda" <?php if($Key['criptomoneda'] == 1){echo 'checked';} ?>/>
                    <label class="contInputRadio__label" for="Criptomoneda">Criptomoneda</label>           
                </div>  
                <div class="contenedor_166">   
                    <input type="checkbox" name="bolivar" id="Bolivar" <?php if($Key['efectivo_Bs'] == 1){echo 'checked';} ?>/>
                    <label class="contInputRadio__label" for="Bolivar">Pago en destino con efectivo (Bs.)</label>           
                </div>  
                <div class="contenedor_166"> 
                    <input type="checkbox" name="dolar" id="Dolar" <?php if($Key['efectivo_Dol'] == 1){echo 'checked';} ?>/>
                    <label class="contInputRadio__label" for="Dolar">Pago en destino con efectivo ($)</label>      
                </div>  
                <div class="contenedor_166">   
                    <input type="checkbox" name="acordado" id="Acordado" <?php if($Key['acordado'] == 1){echo 'checked';} ?>/>
                    <label class="contInputRadio__label" for="Acordado">Pago acordados con el cliente</label>
                </div>
            </fieldset>   
            <?php
            break;
        endforeach; ?>

        <!-- <br style="margin-bottom: 15%"> -->
        <!-- BOTON DE ENVIO -->
        <div class="cont_panel--guardar--catalogo"> 
            <input class="boton" type="submit" value="Guardar"/>  
        </div> 
    </form>
    <br><br>
</div>

<!-- <script src="<?php //echo RUTA_URL . '/public/javascript/E_Cuenta_editar.js?v=' . rand();?>"></script>  -->
<!-- <script src="<?php //echo RUTA_URL . '/public/javascript/A_Cuenta_editar.js?v=' . rand();?>"></script>  -->
<!-- <script src="<?php //echo RUTA_URL . '/public/javascript/Municipios.js?v=' . rand();?>"></script>  -->
<script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/parroquias.js?v=' . rand();?>"></script> 

<script> 
    //Da una vista previa de la imagen del catalogo
    function readImage(input, id_Label){
        // console.log("______Desde readImage()______", input + ' | ' + id_Label)
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                id_Label.attr('src', e.target.result); //Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
    }        
    $("#imgCatalogo").change(function(){
        // Código a ejecutar cuando se detecta un cambio de imagen de tienda
        var id_Label = $('#blah');
        readImage(this, id_Label);
    });
</script>
        
<?php //include(RUTA_APP . '/vistas/footer/footer.php'); ?>