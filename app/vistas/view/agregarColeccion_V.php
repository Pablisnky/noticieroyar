<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%;">
    <fieldset class="fieldset_1" id="Portada"> 
        <legend class="legend_1">Agregar Colección Yaracuy 180°</legend>
            <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeColeccionAgregada" method="POST" enctype="multipart/form-data" autocomplete="off">
                <label class="cont_panel--label">Imagen principal</label>
                <div style="display: flex; margin-bottom: 30px">

                    <!-- IMAGEN PRINCIPAL COLECCION -->
                    <div style=" width: 30%">    
                        <label class="Default_pointer" for="imgCol">    
                            <figure>
                                <img class="cont_panel--imagen" name="imagenNoticia" alt="Fotografia Principal" id="ImgColeccion" src="<?php echo RUTA_URL?>/public/images/colecciones/imagen.png"/>
                            </figure>
                        </label>
                        <input class="Default_ocultar" type="file" name="imagenPrincipalColeccion" id="imgCol"/>
                    </div>

                    <div style="width: 100%; padding-left: 1%">
                        <!-- TITULO COLECCION -->
                        <label class="cont_panel--label">Titulo</label>
                        <input class="cont_panel--titulo" type="text" name="coleccion"/> 
                        
                        <!-- SERIE COLECCION -->
                        <label class="cont_panel--label">Serie</label>                        
                        <select class="cont_panel--titulo" name="serie" id="Serie" onchange="especificarSerie()">
                            <option></option>
                            <?php
                            foreach($Datos['series'] as $Key)   :   ?>
                                <option value="<?php echo $Key['nombreSerie']?>"><?php echo $Key['nombreSerie']?></option>
                                <?php
                            endforeach;     ?>
                        </select>
                        
                        <!-- DESCRIPCION COLECCION -->
                        <label class="cont_panel--label">Descripción</label>
                        <textarea class="textarea--panel" name="descripcion" id="Descripcion"></textarea>
                        <input class="cont_panel--contador" type="text" id="ContadorColeccion" value="150" readonly/>
                                                
                        <!-- IMAGENES SECUNDARIAS COLECCION-->     
                        <!-- <label class="cont_panel--label" style="display: block" for="imgCol_2">Imagenes secundarias</label>
                        <input class="" type="file" name="imagenesSecCol[]" multiple="multiple" id="imgCol_2" onchange="muestraImgCol()"/>  
                               
                        <!-- muestra las imagenes secundarias dela coleccion -->
                        <div class="cont_panel--imagenSec" id="muestrasImg_Coleccion"></div>  
                    </div>                
                    <div> 
                        <input class="boton" type="submit" id="Boton_Agregar" value="Agregar colección"/>  
                    </div>    
                </div>        
            </form>
    </fieldset>
</div>

<!--div alimentado desde modal_seccionesDisponibles_V.php que muestra las secciones -->    
<!-- <div id="Contenedor_80"></div> -->


<!-- <script src="<?php echo RUTA_URL;?>/public/javascript/funcionesVarias.js?v=<?php echo rand();?>"></script> -->
<script src="<?php echo RUTA_URL;?>/public/javascript/E_AgregarColeccion.js?v=<?php echo rand();?>"></script> 

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
    $("#imgCol").change(function(){
        // console.log("Desde cargar foto de perfil")
        // Código a ejecutar cuando se detecta un cambio de imagen de tienda
        var id_Label = $('#ImgColeccion');
        readColeccion(this, id_Label);
    });

// ************************************************************************************************    
    //Array contiene las imagenes insertadas, sus elementos sumados no pueden exceder de 10
    SeleccionImagenes = [];
    function muestraImgCol(){
            // Muestra grupo de imagenes
            // console.log("______Desde muestraImgCol()______")

            var contenedorPadre = document.getElementById("muestrasImg_Coleccion");
            var archivos = document.getElementById("imgCol_2").files;
            
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
<?php require(RUTA_APP . '/vistas/footer/footer.php');?>