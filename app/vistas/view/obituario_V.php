<h1 class="h1--agenda">Obituario</h1>
<div class="cont_galeria" id="Cont_galeria_agenda">
    <?php
    // foreach($Datos['obituario'] as $Key) :  ?>
        <div class="cont_Galeria--item">
            <!-- <figure>
                <img class="cont_Galeria--img lazyload" alt="Fotografia Principal" data-src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenAgenda'];?>" id="<?php echo $Key['ID_Agenda']?>" loading="lazy" width="320" height="10"/> 
            </figure> -->
            <div class="obituario_cont">
                <div class="obituario_cont--imagen">
                    <!-- <figure>
                        <img class="obituario_cont--lazo" alt="Fotografia lazo" src="<?php echo RUTA_URL?>/public/images/obituario.png"/> 
                    </figure> -->
                    <figure>
                        <img class="obituario_cont--tamanioimg" alt="Fotografia Principal" src="<?php echo RUTA_URL?>/public/images/SeberinaInnamorato.jpeg" width="320" height="10"/> 
                    </figure>
                </div>
                <div>
                    <p>Ha fallecido cristianamente</p>
                    <h1 class="obituario_cont--titulo">Severina Falco</h1>
                    <p>Viuda de Feliciano Innamorato.</p>
                    <br>
                    <P>Sus restos estan siendo velados en Tellano, Italia</P>
                    <hr class="obituario_cont--hr">
                    <small class="obituario_cont--small">San Felipe, 13-10-2021</small>
                </div>
            </div>
        </div>
        <?php
    // endforeach; ?>
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<!-- <script src="<?php echo RUTA_URL.'/public/javascript/E_Agenda.js?v='. rand();?>"></script> -->

<!-- Script para evaluar si el navegador soporta lazy-load -->
<!-- <script>
	if ('loading' in HTMLImageElement.prototype){  
		// Si el navegador soporta lazy-load, tomamos todas las imágenes que tienen la clase
		// `lazyload`, obtenemos el valor de su atributo `data-data-src` y lo inyectamos en el `data-src`.
		const images = document.querySelectorAll("img.lazyload");
		images.forEach(img => {
			img.src = img.dataset.src;
		});
	} 
	else {     
		// Importamos dinámicamente la libreria `lazysizes`
		let script = document.createElement("script");
		script.async = true; 
		script.src="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js";
		// script.src = "https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js";
		document.body.appendChild(script);
	}
</script> -->

</body>
</html>