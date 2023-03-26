

<div style="">
    <form action="<?php echo RUTA_URL . '/Borrar_C/llamar_comprimir';?>" method="POST" enctype="multipart/form-data">	
        <input class="" style="padding-left: 0px;" type="text" name="titulo"/>

        <label>Selecciona una imagen:</label>
        <input type="file" name="images">

        <input class="boton" type="submit" name="submit" value="Enviar"/>
    </form>
</div>