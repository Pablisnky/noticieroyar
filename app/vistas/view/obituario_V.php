
<div class="cont_galeria--maain">
	<div>
		<h1 class="cont_galeria_h1 Default--textoVertical Default_cont--black">Obituario</h1>
	</div>
    <div class="obituario_cont_main">
        <?php
        foreach($Datos['obituario'] as $Key) :  ?>
            <figure>
                <img class="obituario_cont--tamanioimg" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/obituario/<?php echo $Key['nombreImagObituario']?>" width="320" height="10"/> 
            </figure>
            <?php
        endforeach; ?>
    </div>  
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>

</body>
</html>