<div> 
<?php
foreach($Datos['ImagenSeleccionada'] as $Key) :   ?>
    <figure>
        <img class="cont_detalle--imagen" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/noticias/<?php echo $Key['nombre_imagenNoticia'];?>"/> 
    </figure>
    <?php
endforeach;
?>
</div>