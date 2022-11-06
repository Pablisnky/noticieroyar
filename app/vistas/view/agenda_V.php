<h1 class="h1--agenda">Agenda</h1>

	<!-- ICONO FULLSCREEM -->
	<!-- <label class="cont_poncho--label" id="Abrir">FullScreem</label> -->

<div class="cont_galeria" id="Cont_galeria_agenda">

	<!-- ICONO CERRAR -->
	<!-- <a class="a_1" href="">cerrar</a> -->

    <?php
    foreach($Datos['agenda'] as $Key) :  ?>
        <div class="cont_Galeria--item">
            <figure>
                <img class="cont_Galeria--img lazyload" alt="Fotografia Principal" data-src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenAgenda'];?>" id="<?php echo $Key['ID_Agenda']?>" loading="lazy" width="320" height="10"/> 
            </figure>
        </div>
        <?php
    endforeach; ?>
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Agenda.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/FullScreem.js?v='. rand();?>"></script>

<!-- Script para evaluar si el navegador soporta lazy-load -->
<script>
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
</script>