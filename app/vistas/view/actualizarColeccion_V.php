<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%;">
    <fieldset class="fieldset_1" id="Portada"> 
        <legend class="legend_1">Actualizar Colección Yaracuy en 180°</legend>
            <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeColeccionActualizada" method="POST" enctype="multipart/form-data" autocomplete="off">
                <label class="cont_panel--label">Imagen principal</label>
                <div style="display: flex; margin-bottom: 30px">

                    <!-- IMAGEN PRINCIPAL COLECCION -->
                    <div style=" width: 30%">    
                        <label class="Default_pointer" for="imgCol">    
                            <figure>
                                <img class="cont_panel--imagen" name="imagenNoticia" alt="Fotografia Principal" id="ImgColeccion" src="<?php echo RUTA_URL?>/public/images/colecciones/<?php echo $Datos['coleccionActualizar']['nombre_imColeccion'];?>"/>
                            </figure>
                        </label>
                        <input class="Default_ocultar" type="file" name="imagenPrincipalColeccion" id="imgCol"/>
                    </div>

                    <div style="width: 100%; padding-left: 1%">
                        <!-- TITULO COLECCION -->
                        <label class="cont_panel--label">Titulo</label>
                        <input class="cont_panel--titulo" type="text" name="coleccion" value="<?php echo $Datos['coleccionActualizar']['nombreColeccion'];?>"/> 
                        
                        <!-- SERIE COLECCION -->
                        <label class="cont_panel--label">Serie</label>                        
                        <select class="cont_panel--titulo" name="serie" id="Serie" onchange="especificarSerie()">
                            <option value="<?php echo $Datos['coleccionActualizar']['serie']?>"><?php echo $Datos['coleccionActualizar']['serie']?></option>
                            <?php
                            foreach($Datos['series'] as $Key)   :   ?>
                                <option value="<?php echo $Key['nombreSerie']?>"><?php echo $Key['nombreSerie']?></option>
                                <?php
                            endforeach;     ?>
                        </select>
                        
                        <!-- DESCRIPCION COLECCION -->
                        <label class="cont_panel--label">Descripción</label>
                        <textarea class="textarea--panel" name="descripcion"><?php echo $Datos['coleccionActualizar']['descripcionColeccion'];?></textarea>
                                                
                        <!-- NOTICIA ASIGNADA -->
                        <label class="cont_panel--label">Noticia asignada</label>
                        <input class="cont_panel--titulo" type="text" name="id_noticia"/>
                        
                        <!-- IMAGENES SECUNDARIAS COLECCION-->     
                        <label class="cont_panel--label" style="display: block" for="imgCol_Sec">Imagenes secundarias</label>
                        <input class="" type="file" name="imagenesSecCol[]" multiple="multiple" id="imgCol_Sec" onchange="muestraImgCol_Secun()"/>  
                               
                        <!-- muestra las imagenes secundarias dela coleccion -->
                        <div class="cont_panel--imagenSec" id="muestrasImgSec_Coleccion"></div>  
                        
                        <div class="cont_panel--imagenSec">
                            <?php
                            foreach($Datos['imagenesSecun'] as $Row) : ?>                   
                                <div style="margin: 1%">
                                    <div class="cont_edit">
                                        <input class="Default_ocultar" type="file" name="img_sSecundaria"  id="imgInp_3"/>
                                        <label class="Default_pointer" for="imgInp_3"><span class="material-icons-outlined cont_edit--label">edit</span></label>
                                    </div> 
                                    <figure> 
                                        <img class="actualizar_cont--imagen" alt="Fotografia Principal" id="ImagenSecundaria" src="<?php echo RUTA_URL?>/public/images/colecciones/<?php echo $Row['nombre_imColeccion'];?>"/> 
                                    </figure>
                                </div>
                                <?php
                            endforeach;  ?>
                        </div>
                
                <div> 
                    <input class="Default_ocultar" type="text" name="id_coleccion" value="<?php echo $Datos['coleccionActualizar']['ID_Coleccion'];?>"/> 
                    <input class="boton" type="submit" id="Boton_Agregar" value="Actualizar colección"/>  
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
    $("#imgCol").change(function(){
        // console.log("Desde cargar foto de perfil")
        // Código a ejecutar cuando se detecta un cambio de imagen de tienda
        var id_Label = $('#ImgColeccion');
        readColeccion(this, id_Label);
    });

// ************************************************************************************************    
    //Array contiene las imagenes secundarias insertadas, sus elementos sumados no pueden exceder de 10
    SeleccionImagenes = [];
    function muestraImgCol_Secun(){
            // Muestra grupo de imagenes
            // console.log("______Desde muestraImgCol_Secun()______")

            var contenedorPadre = document.getElementById("muestrasImgSec_Coleccion");
            var archivos = document.getElementById("imgCol_Sec").files;
            
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