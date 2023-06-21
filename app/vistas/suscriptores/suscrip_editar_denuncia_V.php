<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/suscriptores/panel_suscrip_V.php');?>

<?php 
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Suscriptor"])){
    $ID_Suscriptor = $_SESSION["ID_Suscriptor"];

    foreach($Datos['informacionDenuncia'] as $arr) :
        $Descripcion_Den = $arr['descripcionDenuncia'];
        $Ubicacion_Den = $arr['ubicacionDenuncia'];
        $Municipio_Den = $arr['municipioDenuncia'];
        $Solucionado_Den  = $arr['solucionado'];
        $Fecha_Den  = $arr['fecha_denuncia'];
    endforeach;  

    foreach($Datos['imagenPrin'] as $Row) :
        $ID_ImagenPrincipal_Den = $Row['ID_imagDenuncia'];
        $ImagenPrincipal_Den = $Row['nombre_imgDenuncia'];
    endforeach;   
    ?>
    
    <!-- CDN libreria JQuery, necesario para la previsualización de la imagen   --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    <div class="cont_suscrip_publicar">    
        <form action="<?php echo RUTA_URL; ?>/Panel_Denuncias_C/recibeAtualizarDenuncia" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit = "return validarActualizacion()">

            <a id="Ancla_01" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3">
                <legend class="legend_1">Actualizar datos de denuncia</legend>
                
                <div class="contenedor_47" id="Contenedor_47">     

                    <!-- IMAGEN PRINCIPAL -->
                    <div class="contenedor_129">                   
                        <label class="Default_pointer" for="imgInp"> 
                            <figure>  
                                <img class="contenedor_119__img" id="blah_2" alt="Fotografia de producto" src="<?php echo RUTA_URL?>/public/images/denuncias/<?php echo $ID_ImagenPrincipal_Den;?>"/>
                            </figure>
                        </label>
                        <input class="Default_ocultar" type="file" accept="image/*" name="imagenPrinci_Denuncia" id="imgInp"/>
                    </div>               
                    <div class="cont_suscrip--editar">
                        
                        <!-- DESCRIPCION -->
                        <label class="default_bold">Descripcion</label>
                        <textarea class="textarea_1 borde_1 borde_2" name="descripcion" id="Descripcion"><?php echo $Descripcion_Den;?></textarea>
                        <input class="contador" type="text" id="ContadorPro" value="50"/>

                        <!-- UBICACION -->
                        <label class="default_bold">Ubicación</label>
                        <textarea class="textarea_1 borde_1 borde_2" name="uvicacion" id="Uvicacion"><?php echo $Ubicacion_Den;?></textarea>
                        <input class="contador" type="text" id="ContadorDes" value="100"/>

                        <!-- MUNICIPIO -->        
                        <label class="default_bold">Municipio</label>
                        <select class="login_cont--select borde--input" name="municipio" id="Municipio">
                            <option hidden><?php echo $Municipio_Den;?></option>
                            <option value="Nirgua">Nirgua</option>
                        </select>

                        <!-- SOLUCIONADO -->
                        <div>
                            <label class="default_bold">Estatus solucion</label>
                            <?php
                            if($Solucionado_Den == 0){   ?>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1 borde_2" type="text" name="solucionado" id="Solucionado" value="No resuelto"/>
                            <?php
                            }
                            else{   ?>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1 borde_2" type="text" name="solucionado" id="Solucionado" value="Resuelto"/>
                                <?php
                            }   ?>
                        </div>

                        <!-- FECHA -->
                        <div class="Default_ocultar" id="Contenedor_152">
                            <label class="default_bold">Fecha</label>                       
                                <input class="placeholder placeholder_2 placeholder_4 borde_1 borde_2" type="text" name="fecha" id="Fecha" value="<?php echo $Fecha_Den;?>">   
                        </div>  
                        
                        <!-- IMAGENES SECUNDARIAS -->
                        <div class="cont_suscrip_publicar--imgSec">
                            <label class="Default_pointer" style="display: block; color: blue; font-weight: lighter;" for="ImgInp_3">Añadir imagenes secundarias</label>
                            <small class="small_1">Añada hasta 5 fotografias no mayor a 4 Mb / CU</small>

                            <input class="Default_ocultar" type="file" name="imagenSecundariiaProdActualizar[]" multiple="multiple" id="ImgInp_3" onchange="VariasImg()"/>  
                        </div>  

                        <div class="cont_suscrip_ImgSec">
                            <?php
                            foreach($Datos['imagenSec'] as $Row_2) : ?>                   
                                <div style="margin: 1%;" id=PadreImagenes">

                                        <!-- ICONO ELIMINAR IMAGEN -->
                                        <input class="Default_ocultar" type="file" name="img_sSecundaria"  id="imgInp_3"/>

                                        <!-- IMAGEN -->
                                        <div class="cont_edit--dosBotones" id="Cont_Botones--<?php echo $Row_2['ID_imagDenuncia'];?>">
                                            <img class="Default_pointer" style="width: 2em" src="<?php echo RUTA_URL . '/public/iconos/cerrar/outline_cancel_black_24dp.png'?>" onclick="EliminarImagenSecundaria('<?php echo $Row_2['ID_imagDenuncia'];?>','Cont_Botones--<?php echo $Row_2['ID_imagDenuncia'];?>')"/>
                                        </div>

                                        <!-- IMAGEN SECUNDARIAS -->
                                        <figure id="<?php echo $Row_2['ID_imagDenuncia'];?>"> 
                                            <img class="actualizar_cont--imagen" alt="Fotografia Producto" id="ImagenSecundaria" src="<?php echo RUTA_URL?>/public/images/denuncias/<?php echo $Row_2['nombre_imgDenuncia'];?>"/> 
                                        </figure>
                                    </div>
                                <?php
                            endforeach;  ?>
                        </div>

                        <!-- Muestra imagenes secundrias añadidas -->
                        <div id="muestrasImg_3"></div>
                    </div>  
                </div>

                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <div class="contBoton contBoton--marginTop">
                    <input class="Default_ocultar" type="text" name="id_suscriptor" value="<?php echo $ID_Suscriptor;?>"/>
                    <input class="Default_ocultar" type="text" name="id_producto" value="<?php echo $ID_Producto;?>">
                    <input class="Default_ocultar" type="text" name="id_opcion" value="<?php echo $ID_Opcion;?>">
                    <!-- <input class="Default_ocultar" type="text" name="id_imagen" value="<?php //echo $ID_ImagenPrincipal;?>"/> -->

                    <input class="boton boton--largo" type="submit" value="Actualizar cambios"/>
                </div>  
            </fieldset> 
        </form>
    </div>
    
    <script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
    <script src="<?php echo RUTA_URL . '/public/javascript/E_Suscrip_editar_denuncia.js?v=' . rand();?>"></script> 
    <!-- <script src="<?php //echo RUTA_URL . '/public/javascript/A_Suscrip_editar_prod.js?v=' . rand();?>"></script>  -->

    <script> 
        //Da una vista previa de la imagen principal antes de guardarla en la BD
        function readImage(input){
            // console.log("______Desde readImage()______", input)
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#blah_2').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function(){
            //Código a ejecutar cuando se detecta un cambio de archivo en imagen principal
            readImage(this);
        });
        
        //Da una vista previa de las imagenes secundarias seleccionadas
        // function muestraImg(){
        //     var contenedor = document.getElementById("muestrasImg");
        //     var archivos = document.getElementById("ImgInp_2").files;
        //     for(i = 0; i < archivos.length; i++){
        //         imgTag = document.createElement("img");
        //         imgTag.height = 100;//ESTAS LINEAS NO SON "NECESARIAS"
        //         imgTag.width = 200; //ÚNICAMENTE HACEN QUE LAS IMÁGENES SE VEAN
        //         // imgTag.class = "imagen_6";
        //         imgTag.id = i;      // ORDENADAS CON UN TAMAÑO ESTÁNDAR
        //         imgTag.src = URL.createObjectURL(archivos[i]);
        //         contenedor.appendChild(imgTag);
        //     }
        // }

        //Array que contiene la cantidad de imagenes insertadas, sus elementos sumados no pueden exceder de 5
        SeleccionImagenes = [];
        function VariasImg(){
            // console.log("______Desde CantidadImg()______")

            var contenedorPadre = document.getElementById("muestrasImg_3");
            var archivos = document.getElementById("ImgInp_3").files;
            
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

                        imgTagCreada.height = 200;
                        imgTagCreada.width = 290;
                        ImagenD = imgTagCreada.id = "Imagen_" + i;
                        imgTagCreada.marginBottom = 250
                        imgTagCreada.src = URL.createObjectURL(archivos[i]);

                        spanTagCreada.innerHTML = "Eliminar"
                        spanTagCreada.id = "Etiqueta_" + i
                        spanTagCreada.style.color = "rgb(24, 24, 238)"
                        spanTagCreada.style.cursor = "pointer"
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
    header("location:" . RUTA_URL. "/Inicio_C");
}   ?>