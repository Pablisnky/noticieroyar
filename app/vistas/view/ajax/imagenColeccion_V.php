
<?php
foreach($Datos['ImagenSeleccionada'] as $Key) :   ?>
    <figure>
        <img class="imagen--portada" alt="Fotografia Coleccion" src="<?php echo RUTA_URL?>/public/images/colecciones/<?php echo $Key['nombre_imColeccion'];?>"/>
    </figure>
    <?php
endforeach;
?>