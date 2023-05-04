<!-- Cargada desde Panel_Artista_C/index -->

        
<!-- SDN libreria JQuery, necesaria para la previsualización de la imagen del producto--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<section class="sectionModal sectionModal--sinProducto">
    <div class="contenedor_24 contenedor_24--widt">
        <h1 class="h1_1 h1_1--fontZise bandaAlerta">Tu portafolio debe contar <br>con una fotogarfia de portada.</h1>
        <br>

        <div class="contBoton">
            <form action="<?php echo RUTA_URL . '/Panel_Artista_C/recibe_ImagenPortafolio'?>" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validar_imagenPortafolio()">
                
                <!-- IMAGEN PRINCIPAL -->
                <label class="Default_pointer" for="imgInp"> 
                    <figure>  
                        <img class="imagen--portafolio" id="blah" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                    </figure>
                </label>
                <input class="Default_ocultar" type="file" name="imagenPortafolio" id="imgInp"/>

                <!-- TELEFONO -->
                <label class="login_cont--label">Telefono</label>
                <input class="login_cont--input borde--input" type="text" name="telefono" id="Telefono" autocomplete="off"/>
               
                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <input class="Default_ocultar" type="text" name="id_suscriptor" value="<?php echo $Datos['ID_Suscriptor']?>"/>
                <input class="Default_ocultar" type="text" name="nombreArtista" value="<?php echo $Datos['datosArtista']['nombreSuscriptor']?>"/>
                <input class="Default_ocultar" type="text" name="apellidoArtista" value="<?php echo $Datos['datosArtista']['apellidoSuscriptor']?>"/>
                <input class="boton" type="submit" value="Añadir imagen"/>
            </form>
        </div>
    </div>
</section>

<script> 
    //Da una vista previa de la imagen principal antes de guardarla en la BD
    function readImage(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#blah').attr('src', e.target.result); // Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        // Código a ejecutar cuando se detecta un cambio de imagen individual
        readImage(this);
    });

// ******************************************************************************************
</script>