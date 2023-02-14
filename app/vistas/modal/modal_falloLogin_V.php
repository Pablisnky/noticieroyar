<!-- Llamado desde  Login_C/ValidarSesion-->
<section class="sectionModal" >
    <div class="modal_falloLogin">
        <fieldset class="fieldset_1 modal_falloLogin--fieldset">
            <h1 class="modal_falloLogin--h1">USUARIO y CONTRASEÑA</h1>
            <p class="bandaAlerta">no son correctos</p>
            <div class="contBoton">
                <a class="boton" href='<?php echo RUTA_URL . '/Login_C/index/' . $Datos['id_noticia']. ',' . $Datos['bandera']?>'>Regresar</a>
            </div>
        </fieldset>
    </div>
</section>