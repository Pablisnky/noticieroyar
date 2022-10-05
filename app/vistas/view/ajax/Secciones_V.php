
    <!-- SECCION NOTICIA -->
    <select name="ID_Seccion" id="">
        <?php
        foreach($Datos['secciones'] as $Row) : ?>
            <option value="<?php echo $Row['ID_Seccion'];?>"><?php echo $Row['seccion'];?></option>
            <?php
        endforeach; ?>
    </select>