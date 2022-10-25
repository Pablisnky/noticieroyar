<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- MENU LATERAL -->
    <?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>
    
    <!--PANEL NOTICIAS PRINCIPALES --> 
        <div style="margin-left: 20%;">
            <fieldset class="fieldset_1" id="Portada"> 
                <legend class="legend_1">Actualizar Noticia</legend>
                    <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeNotiActualizada" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <label class="cont_panel--label">Imagen principal</label>
                        <div style="display: flex;">
                            <div style=" width: 30%">
                                <div class="cont_edit">
                                    <label class="Default_pointer" for="imgInp"><span class="material-icons-outlined cont_edit--label">edit</span></label>
                                </div> 
                                <!-- IMAGEN PRINCIPAL-->
                                <figure>
                                    <img class="cont_panel--imagen" alt="Fotografia Principal" id="ImagenPrincipal" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['noticiaActualizar']['nombre_imagenNoticia'];?>"/> 
                                </figure>                                
                                <input class="Default_ocultar" type="file" name="imagenPrincipal" id="imgInp" />
                            </div>
                            <div style="width: 100%; padding-left: 1%">

                                <!-- TITULO  -->
                                <label class="cont_panel--label">TItulo</label>
                                <textarea class="textarea--titulo" name="titulo"><?php echo $Datos['noticiaActualizar']['titulo'];?></textarea>
                                
                                <!-- RESUMEN -->
                                <label class="cont_panel--label">Resumen</label>
                                <textarea class="textarea--resumen" name="subtitulo"><?php echo $Datos['noticiaActualizar']['subtitulo'];?></textarea> 
                            
                                <!-- CONTENIDO -->
                                <label class="cont_panel--label">Contenido</label>
                                <textarea class="cont_panel--textarea Default--textarea--scrol" name="contenido" id="Contenido"><?php echo $Datos['noticiaActualizar']['contenido'];?></textarea> 

                                <!-- SECCION -->
                                <label class="cont_panel--label">Sección</label>
                                <input class="cont_panel--titulo" type="text" name="seccion" value="<?php echo $Datos['noticiaActualizar']['seccion'];?>" id="SeccionPublicar"/>
                                                                
                                <!-- FECHA -->
                                <label class="cont_panel--label">Fecha</label>
                                <input class="cont_panel--titulo" type="text" name="fecha" value="<?php echo $Datos['noticiaActualizar']['fecha'];?>"/>
                                
                                <!-- FUENTE -->
                                <label class="cont_panel--label">Fuente</label>
                                <select class="cont_panel--titulo" name="fuente" id="Fuente" onchange="especificarFuente()">
                                    <option><?php echo $Datos['noticiaActualizar']['fuente'];?></option>
                                    <?php
                                    foreach($Datos['fuentes'] as $Key)   :   ?>
                                        <option><?php echo $Key['fuente']?></option>
                                        <?php
                                    endforeach;     ?>
                                    <option value="Otra">Otra</option>
                                </select>
                                <div id="InsertarFuente"></div>
                            </div>                     
                        </div>

                         <!-- IMAGENES SECUNDARIAS -->
                        <fieldset class="fieldset_1">   
                            <!-- AGREGAR MAS IMAGENES SECUNDARIAS -->
                            <label class="actualizar_cont--label Default_pointer" for="imgInp_2"><span class="material-icons-outlined actualizar_cont--span">add_circle_outline</span></label>
                            <input class="Default_ocultar" type="file" name="imagenesSecundarias[]" multiple="multiple" id="imgInp_2" onchange="muestraImg()"/>

                            <br><br> 
                            <legend class="legend_1">Imagenes secundarias</legend> 
                            
                            <!-- EDITAR IMAGEN SECUNDARIA-->
                            <div class="cont_panel--imagenSec">
                                <?php
                                foreach($Datos['imagenesNoticiaActualizar'] as $Row) : ?>                   
                                    <div style="margin: 1%">
                                        <div class="cont_edit">
                                            <input class="Default_ocultar" type="file" name="img_sSecundaria"  id="imgInp_3"/>
                                            <label class="Default_pointer" for="imgInp_3"><span class="material-icons-outlined cont_edit--label">edit</span></label>
                                        </div> 
                                        <figure> 
                                            <img class="actualizar_cont--imagen" alt="Fotografia Principal" id="blah_2" src="<?php echo RUTA_URL?>/public/images/<?php echo $Row['nombre_imagenNoticia'];?>"/> 
                                        </figure>
                                    </div>
                                    <?php
                                endforeach;  ?>
                            </div>

                            <!-- muestra las imagenes secundarias -->
                            <div id="muestrasImgSec_2"></div> 

                        </fieldset> 
                        
                         <!-- ANUNCIOS PUBLICITARIOS -->
                         <fieldset class="fieldset_1">   
                            
                            <!-- AGREGAR ANUNCIO -->
                            <label class="actualizar_cont--label Default_pointer" for="imgInp_3"><span class="material-icons-outlined actualizar_cont--span">add_circle_outline</span></label>
                            <input class="Default_ocultar" type="file" name="anuncio" multiple="multiple" id="imgInp_3" onchange="readImage_anuncio()"/>
                            <!-- IMAGEN ANUNCIO PUBLITARIO-->
                            <?php
                            if(empty($Datos['anuncioPublicitario']['ID_Anuncio'])){   ?>
                                <div style=" width: 30%">
                                    <figure>
                                        <img class="cont_panel--imagen" alt="Fotografia Principal" id="ImagenAnuncioPublicitario" src="<?php echo RUTA_URL?>/public/images/imagen.png"/> 
                                    </figure>  
                                </div>
                                <?php
                            }
                            else{   ?>
                                <figure>
                                    <input class="Default_ocultar" type="file" name="img_sSecundaria"  id="imgInp_3"/>
                                    <label class="Default_pointer" for="imgInp_3"><span class="material-icons-outlined cont_edit--label">edit</span></label>
                                    <img class="cont_panel--imagen" alt="Fotografia Principal" id="ImagenAnuncioPublicitario" src="<?php echo RUTA_URL?>/public/images/<?php echo $Datos['anuncioPublicitario']['ID_Anuncio'];?>"/> 
                                </figure>     
                                <?php
                            }   ?>        

                            <br><br> 
                            <legend class="legend_1">Anuncio publicitario</legend> 
                            
                            <!-- EDITAR ANUNCIO PUBLICITARIO -->
                        </fieldset> 

                        <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                        <div> 
                            <input class="Default_ocultar" type="text" name="ID_Noticia" value="<?php echo $Datos['noticiaActualizar']['ID_Noticia'];?>"/> 
                            <input class="Default_ocultar" type="text" name="id_fotoPrincipal" value="<?php echo $Datos['noticiaActualizar']['ID_Imagen'];?>" />

                            <input class="boton" type="submit" value="Actualizar noticia"/>  
                        </div>
                    </form>
            </fieldset>
        </div>

<!--div alimentado desde modal_seccionesDisponibles_V.php que muestra las secciones -->    
<div id="Contenedor_90"></div>

</body>
</html>

<script src="<?php echo RUTA_URL;?>/public/javascript/funcionesVarias.js?v=<?php echo rand();?>"></script>
<script src="<?php echo RUTA_URL;?>/public/javascript/A_ActualizarNoticia.js?v=<?php echo rand();?>"></script>
<script src="<?php echo RUTA_URL;?>/public/javascript/E_ActualizarNoticia.js?v=<?php echo rand();?>"></script> 

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
        var id_Label = $('#ImagenPrincipal');
        readImage(this, id_Label);
    });
    
// ************************************************************************************************  
    //Da una vista previa del anuncio publicitario
    function readImage_anuncio(input, id_Label){
        // console.log("______Desde readImage_anuncio()______", input + ' | ' + id_Label)
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                id_Label.attr('src', e.target.result); //Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
    }        
    $("#imgInp_3").change(function(){
        // console.log("Desde cargar foto de perfil")
        // Código a ejecutar cuando se detecta un cambio de imagen de tienda
        var id_Label = $('#ImagenAnuncioPublicitario');
        readImage(this, id_Label);
    });
    
// ************************************************************************************************
    //Array contiene las imagenes insertadas, sus elementos sumados no pueden exceder de 10
    SeleccionImagenes = [];
    function muestraImg(){
            // Muestra grupo de imagenes
            console.log("______Desde muestraImg()______")

            document.getElementById("blah_2").style.display = "none";
            var contenedorPadre = document.getElementById("muestrasImgSec_2");
            var archivos = document.getElementById("imgInp_2").files;
            
            var CantidadImagenes = archivos.length
            console.log("Cantidad Imagenes recibidas= ", CantidadImagenes)
        
            if(CantidadImagenes < 11){
                SeleccionImagenes.push(CantidadImagenes) 
                console.log("Imagenes recibidas= ",SeleccionImagenes)
                // Suma la cantidad de imagenes que se han insertado  
                TotalSeleccionImagenes = SeleccionImagenes.reduce((a, b) => a + b)
                console.log("Suma de Imagenes = ",TotalSeleccionImagenes)
                
                if(TotalSeleccionImagenes < 11){
                    for(i = 0; i < CantidadImagenes; i++){
                        console.log(i)
                        var imgTagCreada = document.createElement("img");
                        var spanTagCreada = document.createElement("span")

                        imgTagCreada.width = 150;
                        imgTagCreada.height = 150;
                        ImagenD = imgTagCreada.id = "Imagen_" + i;
                        // imgTagCreada.marginBottom = 250
                        imgTagCreada.src = URL.createObjectURL(archivos[i]);

                        // spanTagCreada.innerHTML = "Eliminar"
                        spanTagCreada.id = "Etiqueta_" + i
                        spanTagCreada.style.color = "rgb(24, 24, 238)"
                        spanTagCreada.style.cursor = "pointer"
                        spanTagCreada.style.marginBottom = 100

                        //Se detecta la etiqueta dondes se hizo click
                        spanTagCreada.addEventListener("click", function(e){   
                            var click = e.target
                            EliminarImagenSecundaria(click, SeleccionImagenes)
                        }, false)

                        contenedorPadre.appendChild(imgTagCreada); 
                        contenedorPadre.appendChild(spanTagCreada); 
                    }
                }
                else{
                    alert("Máximo imagenes alcanzado (5)")
                    //Se elimina la ultima cantidad de imagenes que se quiso insertar
                    SeleccionImagenes.pop() 
                    console.log("Array imagenes seleccionadas= ", SeleccionImagenes)
                }
            }
            else{
                alert("Máximo 5 imagenes permitidas")
            }
        }
</script>

