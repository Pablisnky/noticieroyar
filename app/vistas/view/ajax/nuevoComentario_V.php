<div id="Contenedor_Padre">
    <p class="detalle_cont--p--comentario"><?php echo $Datos['comentario']?></p>
    <label class="comentario--fecha"><?php echo $Datos['datosComentario'][0]['nombreSuscriptor']?></label>
    <label class="comentario--fecha"><?php echo $Datos['datosComentario'][0]['apellidoSuscriptor']?></label>&nbsp&nbsp&nbsp
    <label class="comentario--fecha"><?php echo $Datos['datosComentario'][0]['fechaComentario']?></label>&nbsp&nbsp&nbsp<label class="comentario--fecha"><?php echo $Datos['datosComentario'][0]['horaComentario']?></label>


    <div> 
        <label class="detalle_cont--edicion Default_pointer" onclick="EliminarComentarioNuevo('<?php echo $Datos['datosComentario'][0]['ID_Comentario'];?>')">ELiminar</label>
    </div>
</div>