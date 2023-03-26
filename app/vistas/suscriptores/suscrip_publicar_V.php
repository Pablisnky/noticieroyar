<?php    
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["Publicar"])){
    
    $ID_Suscriptor = $_SESSION["ID_Suscriptor"];

    //Se da formato al precio, sin decimales y con separación de miles
    $PrecioDolar = number_format($Datos['dolarHoy'], 4, ",", "."); 
      ?>       
        
    <!-- SDN libreria JQuery, necesaria para la previsualización de la imagen del producto--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="cont_suscrip_publicar">  
        <form action="<?php echo RUTA_URL; ?>/CuentaComerciante_C/recibeProductoPublicar" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarPublicacion()">

            <a id="Ancla_01" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3"> 
                <legend class="legend_1">Cargar producto</legend>
                <div class="contenedor_47">    
                
                    <!-- IMAGEN PRINCIPAL -->
                    <div class="contenedor_129">
                        <label class="Default_pointer" for="imgInp"> 
                            <figure>  
                                <img class="contenedor_119__img" id="blah" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                            </figure>
                        </label>
                        <input class="Default_ocultar" type="file" name="imagenProducto" id="imgInp"/>
                    </div>        

                    <div>
                        <!-- PRODUCTO -->
                        <textarea class="textarea_1 borde_1 borde_2" name="producto" id="ContenidoPro" placeholder="Producto" tabindex="1" onkeydown="blanquearInput('ContenidoPro')"></textarea>
                        <input class="contador" type="text" id="ContadorPro" value="50" readonly/>

                        <!-- DESCRIPCION -->
                        <textarea class="textarea_1 textarea_4 borde_1 borde_2" name="descripcion" id="ContenidoDes"  placeholder="Descripción" tabindex="2" onkeydown="blanquearInput('ContenidoDes')"></textarea>
                        <input class="contador" type="text" id="ContadorDes" value="500" readonly/>

                        <!-- PRECIO -->                    
                        <div style="display: flex; justify-content: space-around;">
                            <div>
                                <label>Bs.</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1 borde_2" type="text"  name="precioBs" id="PrecioBs" placeholder="0.00" tabindex="3"/>
                            </div>
                            <div>
                                <label>$</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1 borde_2" type="text" name="precioDolar" id="PrecioDolar" placeholder="0.00" tabindex="3"/>
                            </div>
                        </div>
                        <small class="small_1">El sistema realiza automaticamente la conversión Bolivar / Dolar según BCV. <strong class="strong_1">( $ 1 = Bs. <?php echo $PrecioDolar;?>)</strong></small>
                        <input class="Default_ocultar" id="CambioOficial" type="text" value="<?php echo $Datos['dolarHoy'];?>"/> 
                        <br><br>
                        
                        <!-- CANTIDAD EN EXISTENCIA -->
                        <div id="Contenedor_152">
                            <input class="placeholder placeholder_2 placeholder_4 borde_1 borde_2" type="text" name="cantidad" id="Cantidad" placeholder="Unidades en existencia">
                        </div>  
                        <br>
                        
                        <!-- Recibe Ajax desde SeccionesDisponibles_Ajax.php -->
                        <div id="Contenedor_80"></div>
                    </div>         
                </div>       

                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <div class="contBoton contBoton--marginTop">
                    <input class="Default_ocultar" type="text" name="id_suscriptor" value="<?php echo $ID_Suscriptor;?>"/>
                    <input class="boton" type="submit" value="Agregar producto"/>
                </div>  
            </fieldset>          
        </form>
    </div>        

    <!--div alimentado desde Secciones_Ajax_V.php con las secciones que el usuario cargó previamente -->    
    <div id="Contenedor_80"></div>

    <script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
    <script src="<?php echo RUTA_URL . '/public/javascript/E_Suscrip_publicar.js?v=' . rand();?>"></script> 

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

        //Array contiene cantidad de imagenes insertadas, sus elementos sumados no pueden exceder de 5
        SeleccionImagenes = [];
        function muestraImg(){
            // Muestra grupo de imagenes
            console.log("______Desde muestraImg()______")

            var contenedorPadre = document.getElementById("muestrasImg_2");
            var archivos = document.getElementById("ImgInp_2").files;
            
            var CantidadImagenes = archivos.length
            console.log("Cantidad Imagenes recibidas= ", CantidadImagenes)
        
            if(CantidadImagenes < 6){
                SeleccionImagenes.push(CantidadImagenes) 
                console.log("Imagenes recibidas= ",SeleccionImagenes)
                // Suma la cantidad de imagenes que se han insertado  
                TotalSeleccionImagenes = SeleccionImagenes.reduce((a, b) => a + b)
                console.log("Suma de Imagenes = ",TotalSeleccionImagenes)
                
                if(TotalSeleccionImagenes < 6){
                    for(i = 0; i < CantidadImagenes; i++){
                        console.log(i)
                        var imgTagCreada = document.createElement("img");
                        var spanTagCreada = document.createElement("span")

                        imgTagCreada.width = 290;
                        imgTagCreada.height = 290;
                        ImagenD = imgTagCreada.id = "Imagen_" + i;
                        // imgTagCreada.marginBottom = 250
                        imgTagCreada.src = URL.createObjectURL(archivos[i]);

                        spanTagCreada.innerHTML = "Eliminar"
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

    <?php //include(RUTA_APP . "/vistas/footer/footer.php");
}
else{
    header("location:" . RUTA_URL. "/Login_C/index/SinID_Noticia,SinBandera");
}   ?>