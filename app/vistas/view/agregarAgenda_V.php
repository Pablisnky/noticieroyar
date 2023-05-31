<!-- CALENDARIO -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div class="cont_panel--main">
    <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeAgendaAgregada" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarRegistroAgenda()">
        <fieldset class="fieldset_1" id="Portada"> 
            <legend class="legend_1">Agregar Agenda</legend>
                <div style="display: flex; margin-bottom: 30px">
                    <div class="cont_panel__did-1">       
                        <!-- IMAGN -->
                        <figure>
                            <label for="imgInp"class="Default_pointer"><img class="cont_panel--imagen"  alt="Fotografia Principal" id="blah" src="<?php echo RUTA_URL?>/public/images/imagen.png"/> </label>
                        </figure>
                        <!-- <span class="material-icons-outlined span_18">edit</span> -->
                        <input class="Default_ocultar" type="file" name="imagenAgenda" id="imgInp"/>
                    </div>        
                    <div>
                        <label>Fecha caducidad</label>
                        <input class="cont_panel--select" type="text" name="caducidad" id="datepicker">
                    </div>     
                </div>

                <!-- BOTON DE ENVIO Y DATOS OCULTOS -->
                <div> 
                    <input class="boton" type="submit" id="Boton_Agregar" value="Agregar agenda"/>  
                </div>
        </fieldset>
    </form>
</div>

<script src="<?php echo RUTA_URL;?>/public/javascript/E_AgregarAgenda.js?v=<?php echo rand();?>"></script>
<script src="<?php echo RUTA_URL;?>/public/javascript/funcion_Calendario.js?v=<?php echo rand();?>"></script>

<script>       
    //Da una vista previa de la foto del evento 
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
        // Código a ejecutar cuando se detecta un cambio de imagen
        var id_Label = $('#blah');
        readImage(this, id_Label);
    });
</script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>