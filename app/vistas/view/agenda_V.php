<div class="cont_galeria--maain">
	<div>
		<h1 class="cont_galeria_h1 Default--textoVertical">Agenda de eventos</h1>
	</div>
	<div class="cont_galeria" id="PantallaCompleta">
		<?php
		foreach($Datos['agenda'] as $Key) :  ?>
			<div class="cont_Galeria--item" >
				<figure id="">
					<img class="cont_Galeria--img lazyload" id="Imagen_<?php echo $Key['ID_Agenda']?>" data-src="<?php echo RUTA_URL?>/public/images/<?php echo $Key['nombre_imagenAgenda'];?>" loading="lazy" width="320" height="10" /> 
				</figure>
			</div>
			<?php
		endforeach; ?>
	</div>
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>

<!-- Script para evaluar si el navegador soporta lazy-load -->
<script>
	if ('loading' in HTMLImageElement.prototype){  
		// Si el navegador soporta lazy-load, toma todas las imágenes que tienen la clase
		// `lazyload`, obtenemos el valor de su atributo `data-data-src` y lo inyectamos en el `data-src`.
		const images = document.querySelectorAll("img.lazyload");
		images.forEach(img => {
			img.src = img.dataset.src;
		});
	} 
	else {     
		// Importa dinámicamente la libreria `lazysizes`
		let script = document.createElement("script");
		script.async = true; 
		script.src="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js";
		document.body.appendChild(script);
	}

// *******************************************************************************	
// script fullscreem
	function getFullscreen(element){
		if(element.requestFullscreen) {
			element.requestFullscreen();
		} 
		else if(element.mozRequestFullScreen) {
			element.mozRequestFullScreen();
		} 
		else if(element.webkitRequestFullscreen) {
			element.webkitRequestFullscreen();
		} 
		else if(element.msRequestFullscreen) {
			element.msRequestFullscreen();
		}
	}

	if(document.getElementById("PantallaCompleta")){
		document.getElementById("PantallaCompleta").addEventListener("click", function(e){
		// console.log("FullScreem a la imagen: ", e.target)
			getFullscreen(e.target);
		},false);
	}
</script>