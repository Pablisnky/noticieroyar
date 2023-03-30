<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- MENU LATERAL -->
<?php require(RUTA_APP . '/vistas/view/PanelAdministrador_V.php');?>

<div style="margin-left: 20%; ">
    <fieldset class="fieldset_1" id="Portada"> 
        <legend class="legend_1">Agregar Agenda</legend>
            <form action="<?php echo RUTA_URL; ?>/Panel_C/recibeAgendaAgregada" method="POST" enctype="multipart/form-data" autocomplete="off">
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
                <div class=""> 
                    <input class="boton" type="submit" value="Agregar agenda"/>  
                </div>
            </form>
    </fieldset>
</div>


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

<!-- CALENDARIO -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!-- FOOTER -->
<?php //require(RUTA_APP . '/vistas/footer/footer.php');?>