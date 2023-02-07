<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<!-- CDN CALENDARIO -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

    <div style="margin-left: 20%;">
        <fieldset class="fieldset_1" id="Portada"> 
            <legend class="legend_1">Actualizar Efemeride</legend>
                <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeEfemerideActualizada" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div style="display: flex; margin-bottom: 30px">

                        <!-- IMAGEN-->
                        <div style=" width: 30%"> 
                            <figure>
                                <img class="cont_panel--imagen" alt="Fotografia Principal" id="blah" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['efemerideActualizar']['nombre_ImagenEfemeride'];?>"/> 
                            </figure>
                            <label for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                            <input class="ocultar" type="file" name="imagenPrincipal_Efemeride" id="imgInp"/>
                        </div>
                        <div style="width: 100%; padding-left: 1%">

                            <!-- TITULO  -->
                            <input class="cont_panel--titulo" type="text" name="titulo" value="<?php echo $Datos['efemerideActualizar']['titulo'];?>"/>
                                                    
                            <!-- CONTENIDO -->
                            <textarea class="cont_panel--textarea" name="contenido" id="Contenido"><?php echo $Datos['efemerideActualizar']['contenido'];?></textarea> 
                            
                            <!-- FECHA -->
                            <input class="cont_panel--titulo" type="text" name="fecha" id="datepicker" value="<?php echo $Datos['efemerideActualizar']['fechaPublicacion'];?>"/>
                        </div>                     
                    </div>

                    <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                    <div class=""> 
                        <input class="Default_ocultar" type="text" name="ID_Efemeride" value="<?php echo $Datos['efemerideActualizar']['ID_Efemeride'];?>"/> 
                        <input class="Default_ocultar" type="text" name="id_fotoEfemeride" value="<?php echo $Datos['efemerideActualizar']['ID_ImagenEfemeride'];?>" />

                        <input class="boton" type="submit" value="Actualizar efemeride"/>  
                    </div>
                </form>
        </fieldset>
    </div>

<script src="<?php echo RUTA_URL;?>/public/javascript/funcionesVarias.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/E_ActualizarEfemeride.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/funcion_Calendario.js?v=<?php echo rand();?>"></script>

<script>       
    //Da una vista previa de la foto de la efemeride
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
    $("#imgInp").change(function(){
        // console.log("Desde cargar foto de perfil")
        // Código a ejecutar cuando se detecta un cambio de imagen de tienda
        var id_Label = $('#blah');
        readImage(this, id_Label);
    });
</script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>