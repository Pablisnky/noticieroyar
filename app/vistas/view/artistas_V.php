<div style="display: flex;" id="Obra">	
	<div style="background-color: black; width: 3%; height: 100vh; position: fixed">
		<a style="" href="<?php echo RUTA_URL?>/GaleriaArte_C"><img style="background-color: black; display: block; margin-left: 25%; margin-top: 50%" src="<?php echo RUTA_URL?>/public/iconos/flecha/outline_arrow_back_white_24dp.png"/></a>
		<p class="Default--textoVertical" style="padding-bottom: 25px; text-align: left; font-family: 'Moon Dance', cursive; font-size: 2em; color: white;" id="DescripcionArtista"><?php echo $Datos['datosArtistas']['nombreArtista'] . ' ' . $Datos['datosArtistas']['apellidoArtista'];?></p>
	</div>
	<div class="cont_obras" id="ContObras">
		<div class="cont_galeria cont_galeria--obras" id="Cont_obras--mosaico">
			<?php 
			foreach($Datos['obraArtista'] as $Row) :
				// foreach($Datos['datosArtistas'] as $Key) : 
					// echo $Row['ID_Artista'];
					// echo '<br>';
					// echo $Datos['datosArtistas']['ID_Artista'];
					// exit;
					if($Row['ID_Artista'] == $Datos['datosArtistas']['ID_Artista']){	?>
						<div class="cont_Galeria--item efectoZoom">
							<figure>
								<img class="cont_Galeria--img lazyload borde_1 imagen_2--JS efectoBrillo efectoZoom--imagen" name="imagenNoticia" alt="Fotografia Obra" data-src="<?php echo RUTA_URL?>/public/images/galeria/<?php echo $Row['ID_Artista'];?>_<?php echo $Datos['datosArtistas']['nombreArtista'];?>_<?php echo $Datos['datosArtistas']['apellidoArtista'];?>/<?php echo $Row['imagenObra']?>" id="<?php echo $Row['ID_Obra']?>" loading="lazy" width="320" height="10"/>
							</figure>
						</div> 
						<?php 
					}
				// endforeach;
			endforeach; ?>
		</div>
	</div>
</div>

<!-- DESCRIPCION DEL ARTISTA -->
<div class="cont_descripcionArtista" id="VerArtista">
	<div style="background-color: black; width: 5%; height: 100vh; position: fixed">
		<img class="Default_pointer" style="color:white; font-size: 2em; margin-top: 2%" id="Cerrar" src="<?php echo RUTA_URL . '/public/iconos/flecha/outline_arrow_back_white_24dp.png'?>"/>

		<p class="Default--textoVertical" style="padding-bottom: 35px; text-align: left; font-family: 'Moon Dance', cursive; font-size: 2.2em; color: white;" id="DescripcionArtista"><?php echo $Datos['datosArtistas']['nombreArtista'] . ' ' . $Datos['datosArtistas']['apellidoArtista'];?></p>
	</div>
	<div>
		<figure>
			<img class="cont_descripcionArtista--img" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/galeria/<?php echo $Row['ID_Artista'];?>_<?php echo $Datos['datosArtistas']['nombreArtista'];?>_<?php echo $Datos['datosArtistas']['apellidoArtista'];?>/perfil/<?php echo $Datos['datosArtistas']['imagenArtista'];?>" />
		</figure>
	</div>
	<div style="width: 50%; padding:2% " >
		<p style="color:white">Why do we use it?</p>
		<p style="color:white">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
	</div>
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
<script src="<?php echo RUTA_URL;?>/public/javascript/E_Artista.js?v=<?php echo rand();?>"></script>  

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