
    <!-- FUENTES DE REDACCION -->
    <select >
        <?php
        foreach($Datos['fuentes'] as $Row) : ?>
            <option value="<?php echo $Row['ID_Fuente'];?>"><?php echo $Row['fuente'];?></option>
            <?php
        endforeach; ?>
        <!-- <option>otra</option> -->
    </select>