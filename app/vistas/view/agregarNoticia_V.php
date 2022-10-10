<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

    <div style="margin-left: 20%;">
        <fieldset class="fieldset_1" id="Portada"> 
            <legend class="legend_1">Agregar Noticia</legend>
                <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeNotiAgregada" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div style="display: flex; margin-bottom: 30px">
                        <div class="cont_panel__did-1">       
                            <!-- IMAGN NOTICIA -->
                            <figure>
                                <label for="imgInp"class="Default_pointer"><img class="cont_panel--imagen" name="imagenNoticia" alt="Fotografia Principal" id="blah" src="<?php echo RUTA_URL?>/public/images/imagen.png"/> </label>
                            </figure>
                            <!-- <span class="material-icons-outlined span_18">edit</span> -->
                            <input class="Default_ocultar" type="file" name="imagenPrincipal" id="imgInp"/>
                        </div>
                        <div style="width: 100%">
                            <!-- TITULO -->
                            <input class="cont_panel--titulo" type="text" name="titulo" placeholder="Titulo"/>

                            <!-- RESUMEN -->
                            <textarea class="cont_panel--titulo" name="subtitulo">Resumen</textarea> 

                            <!-- CONTENIDO -->
                            <textarea class="cont_panel--titulo" name="contenido">Contenido</textarea> 
                            
                            <!-- SECCION -->
                            <select name="ID_Seccion">
                                <?php
                                foreach($Datos['secciones'] as $row) :  ?>
                                    <option value="<?php echo $row['ID_Seccion'];?>"><?php echo $row['seccion'];?></option>
                                    <?php
                                endforeach; ?>
                            </select>
                            
                            <!-- FECHA -->
                            <input class="cont_panel--titulo" type="text" name="fecha" placeholder="Fecha"/>
                            
                            <!-- REDACCION -->
                            <input class="Default_ocultar" type="text" name="ID_Periodista" value="1"/>
                        </div>                     
                    </div>
                    <div class=""> 
                        <input class="boton" type="submit" value="Agregar noticia"/>  
                    </div>
                </form>
        </fieldset>
    </div>



<!-- <script src="<?php echo RUTA_URL;?>/public/javascript/funcionesVarias.js?v=<?php echo rand();?>"></script> -->
<script src="<?php echo RUTA_URL;?>/public/javascript/E_SalomonPanel.js?v=<?php echo rand();?>"></script> 

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

