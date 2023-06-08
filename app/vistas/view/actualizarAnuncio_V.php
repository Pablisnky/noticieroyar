<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div class="cont_panel--anuncio---main">
    <fieldset class="fieldset_1" id="Portada"> 
        <legend class="legend_1">Actualizar anuncio</legend>
        <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeAnuncioActualizado" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="cont_panel--anuncio" >
                <div class="">      
                    <label class="Default_pointer" for="imgInp">
                        <!-- IMAGEN-->
                        <figure>
                            <img class="cont_panel--imagen" alt="Fotografia Principal" id="blah" src="<?php echo RUTA_URL?>/public/images/publicidad/<?php echo $Datos['anuncioctualizar']['nombre_imagenPublicidad'];?>"/> 
                        </figure>
                    </label>
                    <input class="Default_ocultar" type="file" name="imagenAnuncio" id="imgInp"/>
                </div>
                                        
                <!-- FECHA -->
                <div style="width: 100%">    
                    <label>Fecha de caducidad</label>
                    <input class="cont_panel--titulo" type="text" name="fecha" value="<?php echo $Datos['anuncioctualizar']['finfechaPublicacion'];?>"/>
                </div>                     
            </div>
            <div class=""> 
                <input class="Default_ocultar" type="text" name="ID_Anuncio" value="<?php echo $Datos['anuncioctualizar']['ID_Anuncio'];?>"/> 

                <input class="boton" type="submit" value="Actualizar agenda"/>  
            </div>
        </form>
    </fieldset>
</div>

<script src="<?php echo RUTA_URL;?>/public/javascript/funcionesVarias.js?v=<?php echo rand();?>"></script>

<script>       
    //Da una vista previa de la foto de la noticia
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