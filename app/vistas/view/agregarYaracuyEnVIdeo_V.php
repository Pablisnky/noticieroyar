<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div class="cont_agregarYaracuyVideo--main">
    <fieldset class="fieldset_1" id="Portada"> 
        <legend class="legend_1">Agregar Video "YaracuyEnVideo"</legend>
            <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeYaracuyEnVideo" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="cont_panel--agregaYaracuyEnVideo">
                    <div class="cont_panel--imagen">  
                        <label class="cont_panel--label">Video</label>  
                        <label class="Default_pointer" for="imgVideo">
                            <figure id="FigureVideo">
                                <img class="img--video" alt="Icono video" id="ImagenCamara" src="<?php echo RUTA_URL?>/public/video/video.png"/>
                            </figure> 
                        </label>
                        <input class="Default_ocultar" type="file" accept="video/*" name="video" id="imgVideo"/>

                        <!-- IMAGEN PREVIA DE VIDEO -->
                        <video class="cont_panel--imagen cont_panel--viedo" id="video-tag">
                            <source id = "video-source"/>
                        </video>
                        <!-- BOTONES DE CONTROL VIDEO -->
                        <div style="display:flex; justify-content: space-around">
                            <button style="padding:0% 3%" class="Default_ocultar" id="Reproducir" onclick="reproducir()">Reproducir</button>
                            <button style="padding:0% 3%" class="Default_ocultar" id="Pausar" onclick="pausar()">Pausar</button>
                        </div>
                        
                        <br>
                        <label class="cont_panel--label">Descripcion</label> 
                        <input class="login_cont--input borde--input" type="text" name="descripcion"/>
                    </div> 
                </div>
                <div class="cont_panel--agregaYaracuyEnVideo--enviar"> 
                    <input class="boton" type="submit" value="Agregar video"/>  
                </div>
            </form>
    </fieldset>
</div>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>



<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>

                
<script>       
// ************************************************************************************************
    //Da una vista previa del video de la noticia
    const videoSrc = document.querySelector("#video-source");
    const videoTag = document.querySelector("#video-tag");
    const inputTag = document.querySelector("#imgVideo");

    
    inputTag.addEventListener('change',  readVideo)

    function readVideo(event) {

        if(document.getElementById("FigureVideo")){
            document.getElementById("FigureVideo").style.display = "none"
        } 
        document.getElementById("video-tag").style.display = "block"
        document.getElementById("Reproducir").style.display = "inline"
        document.getElementById("Pausar").style.display = "inline"
        

        console.log(event.target.files)
        if(event.target.files && event.target.files[0]) {
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

</script>