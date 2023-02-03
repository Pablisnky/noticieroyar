<div class="cont_Contraloria">
    <div class="cont_Contraloria--texto">
        <!-- <div class="cont_Contraloria--p"> -->
            <p class="p_1">La participación ciudadana en el control y evaluación sobre la gestión publica, <br class="Default_quitarMovil"> es necesaria para prevenir la corrupcion, el fraude y la ineficiencia <br>tres fenomenos nocivos que destruyen sociedades.</p>
        <!-- </div> -->
    </div>
    <div class="cont_Contraloria--botones">
            <a class="a_3 a_3--small" href="<?php echo RUTA_URL . '/Contraloria_C/VerificaLogin';?>">Reportar</a>
            <a class="a_3 a_3--small" href="<?php echo RUTA_URL . '/Contraloria_C/verDenuncias';?>">Ver Reportes</a>
    </div> 
    <div class="cont_Contraloria--grafico">
        <!-- <div class="Default_quitarMovil">
            <iframe src="<?php echo RUTA_URL . '/public/grafico/Gra_MasComunes.php'?>" marginwidth="0" marginheight="0" name="ventana_iframe" frameborder="0" height=350 width=900>
            </iframe> 
        </div> -->
        <div class="cont_contraloriaDenuncias">
            <div class="contenedor_27">
                <label class="label_6">Reportes de hoy</label>
                <label class="label_5"><?php echo $Datos;?></label>
                <label class="label_3">Municipio San Felipe - Yaracuy</label>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>