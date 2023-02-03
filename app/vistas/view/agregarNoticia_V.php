<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen y el calendario--> 
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<!-- CDN CALENDARIO -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%; margin-bottom: 50px">
    <fieldset class="fieldset_1" id="Portada"> 
        <legend class="legend_1">Agregar Noticia</legend>
        <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeNotiAgregada" method="POST" enctype="multipart/form-data" autocomplete="off" name="agregarNoticia" id="Agregar" onsubmit="return validarAgregarNoticia()">
            <div style="display: flex;">
                <div style=" width: 30%">    

                    <!-- IMAGEN PRINCIPAL imagenAnunio-->
                    <div>
                        <label class="cont_panel--label">Imagen principal</label>
                        <label class="Default_pointer" for="imgInp">    
                            <figure>
                                <img class="cont_panel--imagen" name="imagenNoticia" alt="Fotografia Principal" id="blah" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                            </figure>
                        </label>
                        <input class="Default_ocultar" type="file" name="imagenPrincipal" id="imgInp"/>
                    </div>

                    <!-- IMAGEN ANUNCIO PUBLICITARIO -->
                    <div style="margin-top: 30px">
                        <label class="cont_panel--label">Anuncio publicitario</label>
                        <label class="Default_pointer" id="Anuncio">
                            <figure> 
                                <img class="cont_panel--imagen" alt="Fotografia Principal" id="ImgAnuncio" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                            </figure>
                        </label>
                        <input class="Default_ocultar" type="text" id="ID_Anuncio" name="id_anuncio"/>
                    </div>

                    <!-- VIDEO -->
                    <div style="margin-top: 30px">  
                        <label class="cont_panel--label">Video</label>    
                        <label class="cont_panel--label Default_pointer" for="imgVideo">
                            <figure id="FigureVideo">
                                <img class="cont_panel--video" alt="Icono video" id="ImagenCamara" src="<?php echo RUTA_URL?>/public/video/video.png"/>
                            </figure> 
                        </label>

                        <video class="cont_panel--imagen"  id="video-tag" >
                            <source id = "video-source"/>
                        </video>
                        <div style="display:flex; justify-content: space-around">
                            <button style="padding:0% 3%" class="Default_ocultar" id="Reproducir" onclick="reproducir()">Reproducir</button>
                            <button style="padding:0% 3%" class="Default_ocultar" id="Pausar" onclick="pausar()">Pausar</button>
                        </div>
                        <input class="Default_ocultar" type="file" accept="video/*" name="video" id="imgVideo"/>
                    </div>
                </div>
                
                <div style="width: 100%; padding-left: 1%" id="AgregarNoticia">
                    <!-- TITULO -->
                    <label class="cont_panel--label">TItulo</label>
                    <textarea class="textarea--panel textarea--titulo" name="titulo" id="Titulo"></textarea> 
                    <input class="cont_panel--contador" type="text" id="ContadorTitulo" value="90" readonly/>

                    <!-- RESUMEN -->
                    <label class="cont_panel--label">Resumen</label>
                    <textarea class="textarea--panel" name="subtitulo" id="Resumen"></textarea> 
                    <input class="cont_panel--contador" type="text" id="ContadorResumen" value="120" readonly/>

                    <!-- CONTENIDO -->
                    <label class="cont_panel--label">Contenido</label>
                    <textarea class="cont_panel--textarea Default--textarea--scrol" name="contenido" id="Contenido" autosize="none"></textarea> 
                    <input class="cont_panel--contador" type="text" id="ContadorContenido" value="7000" readonly/>
                    
                    <!-- SECCION -->
                    <label class="cont_panel--label">Sección</label>
                    <input class="cont_panel--select" type="text" name="seccion" id="SeccionPublicar"/>
                    
                    <!-- FECHA -->
                    <label class="cont_panel--label">Fecha</label>
                    <input class="cont_panel--select" type="text" name="fecha" id="datepicker">
                    
                    <!-- FUENTE -->
                    <label class="cont_panel--label">Fuente</label>
                    <select class="cont_panel--select" name="fuente" id="Fuente" onchange="especificarFuente()">
                        <option>Lisbella Paez CNP 13.162</option>
                        <?php
                        foreach($Datos['fuentes'] as $Key)   :   ?>
                            <option value="<?php echo $Key['fuente']?>"><?php echo $Key['fuente']?></option>
                            <?php
                        endforeach;     ?>
                        <option value="Otra">Otra</option>
                    </select>
                    <div id="InsertarFuente"></div>
                    
                    <!-- IMAGENES SECUNDARIAS -->     
                    <label class="cont_panel--label" style="display: block" for="ImgInp_2">Imagenes secundarias</label>
                    <input class="" type="file" name="imagenesSec[]" multiple="multiple" id="ImgInp_2" onchange="muestraImg()"/>  
                            
                    <!-- muestra las imagenes secundarias -->
                    <div class="cont_panel--imagenSec" id="muestrasImg_2"></div>                    
                </div>                     
            </div>
                   
        </form>
    </fieldset>

    <!-- BOTON DE ENVIO -->
    <div class="cont_panel--guardar"> 
        <input class="boton" type="submit" form="Agregar" id="Boton_Agregar" value="Agregar noticia"/>  
    </div>     
</div>

<!--div alimentado desde modal_seccionesDisponibles_V.php que muestra las secciones -->    
<div id="Contenedor_80"></div>

<!--div alimentado desde modal_anunciosDisponibles_V.php que muestra las anuncios publicitarios -->    
<div id="Contenedor_91"></div>


<script src="<?php echo RUTA_URL;?>/public/javascript/funcionesVarias.js?v=<?php echo rand();?>"></script>
<script src="<?php echo RUTA_URL;?>/public/javascript/E_AgregarNoticia.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/A_AgregarNoticia.js?v=<?php echo rand();?>"></script> 
<script src="<?php echo RUTA_URL;?>/public/javascript/funcion_Calendario.js?v=<?php echo rand();?>"></script>

<script>       
    // calendario  
    $( function() {
        $( "#datepicker" ).datepicker();
    } );

// ************************************************************************************************ 

    //Da una vista previa de la foto principal de la noticia
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
    //Da una vista previa del video de la noticia
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
    //Array contiene las imagenes insertadas, sus elementos sumados no pueden exceder de 10
    SeleccionImagenes = [];
    function muestraImg(){
            // Muestra grupo de imagenes
            // console.log("______Desde muestraImg()______")

            var contenedorPadre = document.getElementById("muestrasImg_2");
            var archivos = document.getElementById("ImgInp_2").files;
            
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