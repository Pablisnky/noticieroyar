<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

    <!--PANEL NOTICIAS PRINCIPALES --> 
        <div style="margin-left: 20%;">
            <fieldset class="fieldset_1" id="Portada"> 
                <legend class="legend_1">Actualizar Noticia</legend>
                    <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeNotiActualizada" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <label>Imagen principal</label>
                        <div style="display: flex;">
                            <div style=" width: 30%">
                                <div class="cont_edit">
                                    <label class="Default_pointer" for="imgInp"><span class="material-icons-outlined cont_edit--label">edit</span></label>
                                </div> 
                                <!-- IMAGEN-->
                                <figure>
                                    <img class="cont_panel--imagen" alt="Fotografia Principal" id="blah" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['noticiaActualizar']['nombre_imagenNoticia'];?>"/> 
                                </figure>
                                
                                <input class="Default_ocultar" type="file" name="imagenPrincipal" id="imgInp"/>
                            </div>
                            <div style="width: 100%; padding-left: 1%">

                                <!-- TITULO  -->
                                <label>TItulo</label>
                                <input class="cont_panel--titulo" type="text" name="titulo" value="<?php echo $Datos['noticiaActualizar']['titulo'];?>"/>
                                
                                <!-- RESUMEN -->
                                <label>Resumen</label>
                                <textarea class="cont_panel--titulo" name="subtitulo"><?php echo $Datos['noticiaActualizar']['subtitulo'];?></textarea> 
                            
                                <!-- CONTENIDO -->
                                <label>Contenido</label>
                                <textarea class="cont_panel--titulo" name="contenido"><?php echo $Datos['noticiaActualizar']['contenido'];?></textarea> 

                                <!-- SECCION -->
                                <label>Sección</label>
                                <div id="Seccion">
                                    <select name="ID_Seccion" onclick="Llamar_Secciones()">
                                        <option value="<?php echo $Datos['noticiaActualizar']['ID_Seccion'];?>"><?php echo $Datos['noticiaActualizar']['seccion'];?></option>
                                    </select>
                                </div>
                                
                                <!-- FECHA -->
                                <label>Fecha</label>
                                <input class="cont_panel--titulo" type="text" name="fecha" value="<?php echo $Datos['noticiaActualizar']['fecha'];?>"/>
                            </div>                     
                        </div>

                        <!-- IMAGENES SECUNDARIAS -->
                        <fieldset class="fieldset_1" style="display: flex;">
                            <legend class="legend_1">Imagenes secundarias</legend>      
                            <?php
                            foreach($Datos['imagenesNoticiaActualizar'] as $Row)   :   ?>
                                <div style=" width: 30%; margin: auto 1%">                                   
                                    <div class="cont_edit">
                                        <label class="Default_pointer" for="imgInp"><span class="material-icons-outlined cont_edit--label">edit</span></label>
                                    </div>   
                                    <!-- IMAGEN-->
                                    <figure>
                                        <img class="cont_panel--imagen" alt="Fotografia Principal" id="" src="<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_imagenNoticia'];?>"/> 
                                    </figure>
                                    <label for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                                    <input class="Default_ocultar" type="file" name="imagenesSecundarias" id="imgInp"/>
                                </div>
                                <?php
                            endforeach;  ?>

                        </fieldset> 

                        <div class=""> 
                            <input class="Default_ocultar" type="text" name="ID_Noticia" value="<?php echo $Datos['noticiaActualizar']['ID_Noticia'];?>"/> 

                            <input class="boton" type="submit" value="Actualizar noticia"/>  
                        </div>
                    </form>
            </fieldset>
        </div>

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

