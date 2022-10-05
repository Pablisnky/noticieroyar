<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

    <!--PANEL NOTICIAS PRINCIPALES --> 
        <div style="margin-left: 20%;">
            <fieldset class="fieldset_1" id="Portada"> 
                <legend class="legend_1">Actualizar Noticia</legend>
                    <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeNotiActualizada" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div style="display: flex; margin-bottom: 30px">
                            <div class="cont_panel__did-1">      

                                <!-- IMAGN NOTICIA -->
                                <figure>
                                    <img class="cont_panel--imagen" alt="Fotografia Principal" id="blah" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['noticiaActualizar']['nombre_imagenNoticia'];?>"/> 
                                </figure>
                                <label for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                                <input class="ocultar" type="file" name="imagenPrincipal" id="imgInp"/>
                            </div>
                            <div style="width: 100%">

                                <!-- TITULO NOTICIA -->
                                <input class="cont_panel--titulo" type="text" name="titulo" value="<?php echo $Datos['noticiaActualizar']['titulo'];?>"/>
                                
                                <!-- SUBTITULO NOTICIA -->
                                <textarea class="cont_panel--titulo" name="subtitulo"><?php echo $Datos['noticiaActualizar']['subtitulo'];?></textarea> 
                            
                                <!-- SECCION NOTICIA -->
                                <div id="Seccion">
                                    <select name="ID_Seccion" onclick="Llamar_Secciones()">
                                        <option value="<?php echo $Datos['noticiaActualizar']['ID_Seccion'];?>"><?php echo $Datos['noticiaActualizar']['seccion'];?></option>
                                    </select>
                                </div>
                                
                                <!-- FECHA NOTICIA -->
                                <input class="cont_panel--titulo" type="text" name="fecha" value="<?php echo $Datos['noticiaActualizar']['fecha'];?>"/>
                            </div>                     
                        </div>
                        <div class=""> 
                            <input class="Default_ocultar" type="text" name="ID_Noticia" value="<?php echo $Datos['noticiaActualizar']['ID_Noticia'];?>"/> 

                            <input class="boton" type="submit" value="Actualizar noticia"/>  
                            <input class="boton" type="submit" value="Eliminar noticia"/> 
                        </div>
                    </form>
            </fieldset>
        </div>



<!-- <script src="<?php echo RUTA_URL;?>/public/javascript/funcionesVarias.js?v=<?php echo rand();?>"></script> -->
<!-- <script src="<?php echo RUTA_URL;?>/public/javascript/E_SalomonPanel.js?v=<?php echo rand();?>"></script>  -->
<script src="<?php echo RUTA_URL;?>/public/javascript/A_ActualizarNoticia.js?v=<?php echo rand();?>"></script> 

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

