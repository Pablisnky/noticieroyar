<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen y el calendario--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="cont_denuncia">     
    <fieldset class="fieldset_1">
        <legend class="legend_1">Reporte ciudadano</legend>    
        <form action="<?php echo RUTA_URL; ?>/Contraloria_C/recibeDenunciaAgregada" method="POST" enctype="multipart/form-data" autocomplete="off" name="agregarNoticia" id="Agregar" onsubmit="return validarAgregarNoticia()">
            <div class="cont_denuncia--flex">
                <div style="width: 30%">
                    <!-- IMAGEN -->                
                    <div>
                        <label class="Default_pointer" for="imgInp">    
                            <figure>
                                <img class="cont_denuncia--imagen" name="imagenDenuncia" alt="Fotografia Principal" id="blah" src="<?php echo RUTA_URL?>/public/images/denuncias/imagen.png"/>
                            </figure>
                        </label>
                        <input class="Default_ocultar" type="file" name="imagenDenunciaPrincipal" id="imgInp"/>
                    </div>

                    <!-- VIDEO -->
                    <div style="margin-top: 30px">     
                        <!-- <label class="cont_panel--label Default_pointer" for="imgVideo">
                            <figure id="FigureVideo">
                                <img class="cont_denuncia--video" alt="Icono video" id="ImagenCamara" src="<?php echo RUTA_URL?>/public/video/denuncias/video.png"/>
                            </figure> 
                        </label> -->

                        <!-- <video class="cont_panel--imagen"  id="video-tag" >
                            <source id = "video-source"/>
                        </video> -->
                        <!-- <div style="display:flex; justify-content: space-around">
                            <button style="padding:0% 3%" class="Default_ocultar" id="Reproducir" onclick="reproducir()">Reproducir</button>
                            <button style="padding:0% 3%" class="Default_ocultar" id="Pausar" onclick="pausar()">Pausar</button>
                        </div> -->
                        <!-- <input class="Default_ocultar" type="file" accept="video/*" name="videoDenuncia" id="imgVideo"/> -->
                    </div>
                </div>   
                <div  style="width: 70%">
                    <!-- DENUNCIA -->                
                    <label class="login_cont--label">Descripción</label>
                    <textarea class="cont_denuncia--textarea borde--input" name="descripcion" id="Descripcion"></textarea>
                    
                    <label class="login_cont--label">Ubicación (escuela, centro de salud, calle, oficina publica, servicio publico, urb, etc)</label>
                    <textarea class="cont_denuncia--textarea borde--input" name="ubicacion" id="Ubicacion"></textarea> 
                    
                    <!-- MUNICIPIO AFILIADO -->                
                    <label class="login_cont--label">Municipio</label>
                    <select class="login_cont--select borde--input" name="municipio" id="Municipio">
                        <option></option>
                        <option value="San Felipe">Independencia</option>
                        <option value="San Felipe">San Felipe</option>
                    </select>   
                    
                    <!-- USUARIO DE SEGUIMIENTO -->
                    <p>¿Deseas ser usuario de seguimiento de esta denuncia?</p>                    
                    <input type="checkbox" name="usuarioSeguimineto" value="1"/><label>Si</label>
                    <br>
                    <small class="small_1">El usuario de seguimiento realiza una inspección visual del problema para verificar que haya sido resuelto.</small>
                    <br>
                    
                    <!-- IMAGENES SECUNDARIAS -->     
                    <label class="login_cont--label" for="Img_Denuncia">Imagenes secundarias</label>
                    <input class="" type="file" name="imagenesDenunciaSecundaria[]" multiple="multiple" id="Img_Denuncia" onchange="muestraImg()"/>  
                            
                    <!-- muestra las imagenes secundarias -->
                    <div class="cont_panel--imagenSec" id="muestrasImgDenuncia_2"></div>  
                </div>
            </div>     

            <!-- BOTON DE ENVIO -->
            <div class="cont_panel--guardar"> 
                <input class="boton" type="submit" form="Agregar" id="Boton_Agregar" value="Enviar"/>  
            </div>   
        </form>    
    </fieldset> 
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>

<script> 

    //Da una vista previa de la foto principal de la denuncia
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
    
// ************************************************************************************************ 
    //Da una vista previa del video de la denuncia
    const videoSrc = document.querySelector("#video-source");
    const videoTag = document.querySelector("#video-tag");
    const inputTag = document.querySelector("#imgVideo");

    
    inputTag.addEventListener('change',  readVideo)

    function readVideo(event) {

        document.getElementById("FigureVideo").style.display = "none"
        document.getElementById("Reproducir").style.display = "inline"
        document.getElementById("Pausar").style.display = "inline"
        

        console.log(event.target.files)
        if (event.target.files && event.target.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            console.log('loaded')
            videoSrc.src = e.target.result
            videoTag.load()
            }.bind(this)

            reader.readAsDataURL(event.target.files[0]);
        }
    }
    
    window.reproducir = function() {
                document.getElementById("video-tag").play();
    }

    window.pausar = function() {
        document.getElementById("video-tag").pause();
    };

// ************************************************************************************************  
    //Array contiene las imagenes secundarias insertadas, sus elementos sumados no pueden exceder de 10
    SeleccionImagenes = [];
    function muestraImg(){
            // Muestra grupo de imagenes
            // console.log("______Desde muestraImg()______")

            var contenedorPadre = document.getElementById("muestrasImgDenuncia_2");
            var archivos = document.getElementById("Img_Denuncia").files;
            
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