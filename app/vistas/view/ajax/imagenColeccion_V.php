
<?php
foreach($Datos['ImagenSeleccionada'] as $Key) :   ?>
    <img class="imagen--portada" alt="Fotografia Coleccion" src="<?php echo RUTA_URL?>/public/images/coleccion_180/<?php echo $Key['nombre_imColeccion'];?>"/>
    <?php
endforeach;
?>