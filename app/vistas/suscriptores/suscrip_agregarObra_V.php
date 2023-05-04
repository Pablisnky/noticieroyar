<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/suscriptores/panel_suscrip_V.php');?>

<?php    
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["CargarObras"])){
    
    $ID_Suscriptor = $_SESSION["ID_Suscriptor"];

    //Se da formato al precio, sin decimales y con separación de miles
    $PrecioDolar = number_format($Datos['dolarHoy'], 2, ",", "."); 
      ?>       
        
    <!-- SDN libreria JQuery, necesaria para la previsualización de la imagen del producto--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="cont_suscrip_publicar">  
        <form action="<?php echo RUTA_URL; ?>/Panel_Artista_C/recibeObraPublicar" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarObra()">

            <fieldset class="fieldset_1 fieldset_3"> 
                <legend class="legend_1">Cargar obra</legend>
                <div class="contenedor_47">    
                
                    <!-- IMAGEN OBRA -->
                    <div class="contenedor_129">
                        <label class="Default_pointer" for="imgInp"> 
                            <figure>  
                                <img class="contenedor_119__img" id="blah" alt="Fotografia de la obra" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                            </figure>
                        </label>
                        <input class="Default_ocultar" type="file" name="imagenObra" id="imgInp"/>
                    </div>        

                    <div>
                        <!-- NOMBRE OBRA -->
                        <label class="login_cont--label">Nombre obra</label>
                        <textarea class="textarea_1 borde_1 borde_2" name="nombreObra" id="NombreObra"  tabindex="1" ></textarea>
                        <!-- CONTADOR OBRA -->
                        <input class="contador" type="text" id="ContadorObra" value="100" readonly/>

                        <!-- DESCRIPCION OBRA-->
                        <label class="login_cont--label">Descripcion</label>
                        <textarea class="textarea_1 textarea_4 borde_1 borde_2" name="descripcionObra" id="ContenidoDes" tabindex="2"></textarea>
                        <!-- CONTADOR DESCRIPCION -->
                        <input class="contador" type="text" id="ContadorDes" value="100" readonly/>

                        <!-- PRECIO -->                    
                        <div style="display: flex; justify-content: space-around;">
                            <div>
                                <label>Bs.</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1 borde_2" type="text"  name="precioBs" id="PrecioBs" placeholder="0.00" tabindex="3"/>
                            </div>
                            <div>
                                <label>$</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1 borde_2" type="text" name="precioDolar" id="PrecioDolar" placeholder="0.00" tabindex="3"/>
                            </div>
                        </div>
                        <small class="small_1">El sistema realiza automaticamente la conversión Bolivar / Dolar según BCV. <strong class="strong_1">( $ 1 = Bs. <?php echo $PrecioDolar;?>)</strong></small>
                        <input class="Default_ocultar" id="CambioOficial" type="text" value="<?php echo $Datos['dolarHoy'];?>"/> 
                        
                        <!-- DIMENSIONES-->
                        <div class="">
                            <label class="login_cont--label">Dimesiones</label>
                            <input class="placeholder placeholder_2 placeholder_4 borde_1 borde_2" type="text" name="dimensiones" id="Dimensiones">
                        </div>  
                        
                        <!-- TECNICA-->
                        <div class="">
                            <label class="login_cont--label">Tecnica</label>
                            <input class="placeholder placeholder_2 placeholder_4 borde_1 borde_2" type="text" name="tecnica" id="Tecnica">
                        </div>  

                        <!-- COLECCION-->
                        <div class="">
                            <label class="login_cont--label">Colección</label>
                            <input class="placeholder placeholder_2 placeholder_4 borde_1 borde_2" type="text" name="coleccion" id="Coleccion">
                        </div>  

                        <!-- AÑO -->
                        <div class="">
                            <label class="login_cont--label">Año</label>
                            <input class="placeholder placeholder_2 placeholder_4 borde_1 borde_2" type="text" name="anio" id="Anio">  
                        </div>     
                    </div>         
                </div>       

                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <div class="contBoton contBoton--marginTop">
                    <input class="Default_ocultar" type="text" name="id_suscriptor" value="<?php echo $Datos['suscriptor']['ID_Suscriptor']?>"/>
                    <input class="Default_ocultar" type="text" name="nombreArtista" value="<?php echo $Datos['suscriptor']['nombreSuscriptor']?>"/>
                    <input class="Default_ocultar" type="text" name="apellidoArtista" value="<?php echo $Datos['suscriptor']['apellidoSuscriptor']?>"/>

                    <input class="boton boton--largo" type="submit" value="Agregar obra"/>
                </div>  
            </fieldset>          
        </form>
    </div>        

    <script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
    <script src="<?php echo RUTA_URL . '/public/javascript/E_Suscrip_agregarObra.js?v=' . rand();?>"></script> 

    <script> 
        //Da una vista previa de la imagen principal antes de guardarla en la BD
        function readImage(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#blah').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            // Código a ejecutar cuando se detecta un cambio de imagen individual
            readImage(this);
        });
    </script>

    <?php //include(RUTA_APP . "/vistas/footer/footer.php");
}
else{
    header('location:' . RUTA_URL . '/CerrarSesion');
}   ?>