<div class="contenedor_8">
    <div class="contenedor_7">
        <div class="contenedor_7--p">
            <p class="p_1">La participación ciudadana en el control y evaluación sobre la gestión publica, es necesaria para prevenir la corrupcion, el fraude y la ineficiencia en el manejo del asunto público.</p>
        </div>
    </div>
    <div>
        <a class="a_3" href="<?php echo RUTA_URL . '/Contraloria_C/denuncias';?>">Denunciar</a>
    </div> 
    <div class="contenedor_26">
        <div>
            <iframe src="<?php echo RUTA_URL . '/public/grafico/Gra_MasComunes.php'?>" marginwidth="0" marginheight="0" name="ventana_iframe" frameborder="0" height=350 width=900>
            </iframe> 
        </div>
        <div class="contenedor_24">
            <div class="contenedor_27">
                <label class="label_6">Denuncias de hoy</label>
                <label class="label_5"><?php echo $Datos;?></label>
                <label class="label_3">Municipio San Felipe Yaracuy</label>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>