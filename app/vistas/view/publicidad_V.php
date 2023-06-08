
	<!-- ICONO FULLSCREEM -->
	<!-- <label class="cont_poncho--label" id="Abrir">FullScreem</label> -->

	<!-- ALFABETO -->
<div class="cont_directorioCom"class="ocultarAlfabeto">
	<ul style="background:; display: flex; list-style: none; justify-content: space-between; ">
		<li><span class="hint--top-right hint--info hint--rounded" data-hint="Alergólogo Anestesiólogo Angiólogo"><a href="#marcadorA">A</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorB">B</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Cardiólogo, Cirujano Plástico"><a href="#marcadorC">C</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Dermatólogo"><a href="#marcadorD">D</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorE">E</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Fisiátra"><a href="#marcadorF">F</a></span></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Gastroenterólogo, Geriatra, Ginecologo, Gineco-Obstetra"><a href="#marcadorG">G</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorH">H</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Imagenólogo Internista"><a href="#marcadorI">I</a></span></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorJ">J</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorK">K</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorL">L</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorM">M</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Neurocirujano Neurólogo"><a href="#marcadorN">N</a></span></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorÑ">Ñ</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Odontólogo Oftalmólogo Oncólogo Otorrino"><a href="#marcadorO">O</a></span></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Pediatra Psicologo Psquiatra Psicopedagogo"><a href="#marcadorP">P</a></span></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorQ">Q</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorR">R</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorS">S</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Traumatólogo"><a href="#marcadorT">T</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint="Urológo"><a href="#marcadorU">U</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorV">V</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorW">W</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorX">X</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorY">Y</a></span></li>
		<li><span class="hint--top hint--info hint--rounded" data-hint=""><a href="#marcadorZ">Z</a></span></li>
	</ul>
</div>
<div class="cont_direccionCom--maain"> 
	<div>
		<h1 class="cont_galeria_h1 Default--textoVertical">Directorio comercial</h1>
	</div>
	<div class="cont_galeria" id="Cont_galeria_agenda">
		<?php
		foreach($Datos['publicidad'] as $Key) :  ?>
			<div class="cont_directorioCom--item">
				<figure>
					<img class="cont_Galeria--img lazyload" alt="Fotografia Anuncio" data-src="<?php echo RUTA_URL?>/public/images/publicidad/<?php echo $Key['nombre_imagenPublicidad'];?>" id="<?php echo $Key['ID_Anuncio']?>" loading="lazy" width="320" height="10"/> 
				</figure>
			</div>
			<?php
		endforeach; ?>
	</div>
</div>  

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/E_Agenda.js?v='. rand();?>"></script>
<!-- <script src="<?php echo RUTA_URL.'/public/javascript/FullScreem.js?v='. rand();?>"></script> -->

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