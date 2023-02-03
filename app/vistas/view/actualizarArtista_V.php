<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%;">
    <fieldset class="fieldset_1" id="Portada"> 
        <legend class="legend_1">Actualizar datos artista</legend>
            <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeArtistaActualizado" method="POST" enctype="multipart/form-data" autocomplete="off">
                <label class="cont_panel--label">Imagen perfil artista</label>
                <div style="display: flex; margin-bottom: 30px">

                    <!-- IMAGEN PERFIL DE ARTISTA -->
                    <div style=" width: 30%">    
                        <label class="Default_pointer" for="imgArt">    
                            <figure>
                                <img class="cont_panel--imagen" alt="Fotografia Principal" id="ImgArtista" src="<?php echo RUTA_URL . '/public/images/galeria/' . $Datos['artistaActualizar'][0]['ID_Artista'] . '_' . $Datos['artistaActualizar'][0]['nombreArtista'] . '_' . $Datos['artistaActualizar'][0]['apellidoArtista'] . '/perfil/'. $Datos['artistaActualizar'][0]['imagenArtista'];?>"/>
                            </figure>
                        </label>
                        <input class="Default_ocultar" type="file" name="imagenPerfil" id="imgArt"/>
                    </div>

                    <div style="width: 100%; padding-left: 1%">
                        <!-- NOMBRE ARTISTA-->
                        <label class="cont_panel--label">Nombre</label>
                        <input class="cont_panel--titulo" type="text" name="nombreArtista" value="<?php echo $Datos['artistaActualizar'][0]['nombreArtista'];?>"/> 
                        
                        <!-- APELLIDO ARTISTA-->
                        <label class="cont_panel--label">Apellido</label>
                        <input class="cont_panel--titulo" type="text" name="apellidoArtista" value="<?php echo $Datos['artistaActualizar'][0]['apellidoArtista'];?>"/> 

                        <!-- CATEGORIA ARTISTA  -->
                        <label class="cont_panel--label">Categoria</label>                        
                        <select class="cont_panel--titulo" name="categoriaArtista" id="Serie" onchange="especificarSerie()">
                            <option value="<?php echo $Datos['artistaActualizar'][0]['catgeoriaArtista']?>"><?php echo $Datos['artistaActualizar'][0]['catgeoriaArtista']?></option>
                            <?php
                            // foreach($Datos['series'] as $Key)   :   ?>
                                <!-- <option value="<?php echo $Key['nombreSerie']?>"><?php echo $Key['nombreSerie']?></option> -->
                                <?php
                            // endforeach;     ?>
                        </select>
                        
                        <!-- MUNICIPIO ARTISTA  -->
                        <label class="cont_panel--label">Municipio</label>
                        <input class="cont_panel--titulo" name="municipioArtista" value="<?php echo $Datos['artistaActualizar'][0]['municipioArtista'];?>" />
                                                                        
                        <!-- IMAGENES DE OBRAS -->     
                        <label class="cont_panel--label" style="display: block" for="imgArt_Sec">Obras</label>
                        <input class="" type="file" name="imagenesObras[]" multiple="multiple" id="imgArt_Sec" onchange="muestraImgArt_Secun()"/>  
                               
                        <!-- muestra las imagenes de las obras recien cargadas-->
                        <div class="cont_panel--imagenSec" id="muestrasImgSec_Coleccion"></div>  
                        
                        <!-- muestra las imagenes de las obras existentes en BD -->
                        <div class="cont_panel--imagenSec">
                            <?php
                            foreach($Datos['ObrasArtista'] as $Row) : ?>                   
                                <div style="margin: 1%">
                                    <div class="cont_edit">
                                        <input class="Default_ocultar" type="file" name="img_sSecundaria"  id="imgInp_3"/>
                                        <label class="Default_pointer" for="imgInp_3"><span class="material-icons-outlined cont_edit--label">edit</span></label>
                                    </div> 
                                    <figure> 
                                        <img class="actualizar_cont--imagen" alt="Fotografia Principal" id="ImagenSecundaria" src="<?php echo RUTA_URL?>/public/images/galeria/<?php echo $Datos['artistaActualizar'][0]['ID_Artista'];?>_<?php echo $Datos['artistaActualizar'][0]['nombreArtista'];?>_<?php echo $Datos['artistaActualizar'][0]['apellidoArtista'];?>/<?php echo $Row['imagenObra'];?>"/> 
                                    </figure>
                                </div>
                                <?php
                            endforeach;  ?>
                        </div>
                    <!-- </div> -->
                <div> 
                    <input class="Default_ocultar" type="text" name="id_artista" value="<?php echo $Datos['artistaActualizar'][0]['ID_Artista'];?>"/> 
                    <input class="boton" type="submit" id="Boton_Agregar" value="Actualizar artista"/>  
                </div>            
            </form>
    </fieldset>
</div>

<script src="<?php echo RUTA_URL;?>/public/javascript/funcionesVarias.js?v=<?php echo rand();?>"></script>
<script src="<?php echo RUTA_URL;?>/public/javascript/E_AgregarNoticia.js?v=<?php echo rand();?>"></script> 

<script>               
    //Da una vista previa a la imagen principal de la coleccion asociada a la noticia
    function readColeccion(input, id_Label){
        // console.log("______Desde readAnuncio()______", input + ' | ' + id_Label)
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                id_Label.attr('src', e.target.result); //Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
    }        
    $("#imgArt").change(function(){
        // console.log("Desde cargar foto de perfil")
        // Código a ejecutar cuando se detecta un cambio de imagen de tienda
        var id_Label = $('#ImgArtista');
        readColeccion(this, id_Label);
    });

// ************************************************************************************************    
    //Array contiene las imagenes secundarias insertadas, sus elementos sumados no pueden exceder de 10
    SeleccionImagenes = [];
    function muestraImgArt_Secun(){
            // Muestra grupo de imagenes
            // console.log("______Desde muestraImgArt_Secun()______")

            var contenedorPadre = document.getElementById("muestrasImgSec_Coleccion");
            var archivos = document.getElementById("imgArt_Sec").files;
            
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

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>