<div class="cont_galeria--maain">
	<div>
		<h1 class="cont_galeria_h1 Default--textoVertical Default_cont--black">Obituario</h1>
	</div>
    <div class="obituario_cont_main">
        <?php
        foreach($Datos['obituario'] as $Key) :  ?>
            <div class="obituario_cont--item">
                <div class="obituario_cont">
                    <div class="obituario_cont--imagen">
                        <figure>
                            <img class="obituario_cont--tamanioimg--NY" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/obituario/mama-Rosmary.png" width="320" height="10"/> 
                        </figure>
                    </div>
                    <!-- <div>
                        <figure>
                            <img class="obituario_cont--logo" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/obituario/obituario.png" width="320" height="10"/> 
                        </figure>
                    </div> -->
                </div>
                <div class="obituario_cont--informacion">
                    <p>NoticieroYaracuy.com se une al duelo que embarga a nuestra colega y amiga Rosmary Alvarez, por el sensible fallecimiento de su madre.</p>
                    
                    <h1 class="obituario_cont--titulo">Yolanda Mogollón</h1>
                    <br>
                    <P style="padding:0% 5%">Le enviamos un abrazo de consuelo por tan sensible perdida</P>
                    <hr class="obituario_cont--hr">
                    <small class="obituario_cont--small">San Felipe, 18-11-2022</small>
                </div>
            </div>
            <?php
            break;
        endforeach; 

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