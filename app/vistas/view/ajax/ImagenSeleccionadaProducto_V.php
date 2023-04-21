<div> 
<?php
foreach($Datos['ImagenSeleccionada'] as $Key) :   ?>
    <figure>
        <img class="imagen_9 imagen_10" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/clasificados/<?php echo $Key['ID_Suscriptor'];?>/productos/<?php echo $Key['nombre_img'];?>"/> 
    </figure>
    <?php 
endforeach;
?>
</div>