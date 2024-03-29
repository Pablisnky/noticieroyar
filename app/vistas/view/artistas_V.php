<!-- CARGA SDK FONTAWESONE PARA ICONOS DE REDES SOCIALES se uso esta libreria porque los iconos no tienen fondo-->
<script src="https://kit.fontawesome.com/2d6db4c67d.js" crossorigin="anonymous"></script>

<div style="display: flex;" id="Obra">	
	<div class="cont_artista--vertical">
		<a class="cont_artista--icono" href="<?php echo RUTA_URL?>/GaleriaArte_C"><img src="<?php echo RUTA_URL?>/public/iconos/flecha/outline_arrow_back_white_24dp.png"/></a>
		<p class="cont_artista--textoVertical Default--textoVertical" id="DescripcionArtista"><?php echo $Datos['datosArtistas']['nombreSuscriptor'] . ' ' . $Datos['datosArtistas']['apellidoSuscriptor'];?></p>
		
		<!-- COMPARTIR REDES SOCIALES -->
		<div class="cont_artista--redesSociales cont_artista--margin">
			<!-- FACEBOOK -->
			<div class="cont_catalogos--iconos">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo RUTA_URL;?>/GaleriaArte_C/artistas/<?php echo $Datos['datosArtistas']['ID_Suscriptor']?>" target="_blank"><i class="fa-brands fa-facebook-f fa-sm catalogo-RS" style="color: rgba(255, 255, 255, 0.5)"></i></a>
			</div>        
			
			<!-- TWITTER -->
			<div class="cont_catalogos--iconos">
				<a href="https://twitter.com/intent/tweet?url=<?php echo RUTA_URL;?>/GaleriaArte_C/artistas/<?php echo $Datos['datosArtistas']['ID_Suscriptor']?>" target="_blank"><i class="fa-brands fa-twitter catalogo-RS" style="color: rgba(255, 255, 255, 0.5)"></i></a>
			</div>     
			
			<!-- E-MAIL -->
			<div class="cont_catalogos--iconos">
				<a href="#" target="_blank"><i class="fa-regular fa-envelope catalogo-RS" style="color: rgba(255, 255, 255, 0.5)"></i></a>
			</div>      
			
			<!-- WHATSAPP -->
			<div class="whatsapp cont_catalogos--iconos">
				<a href="whatsapp://send?text=Portafolio de obras <?php echo $Datos['datosArtistas']['nombreSuscriptor'] . ' ' . $Datos['datosArtistas']['apellidoSuscriptor']?>&nbsp;<?php echo RUTA_URL?>/GaleriaArte_C/artistas/<?php echo $Datos['datosArtistas']['ID_Suscriptor']?>" data-action="share/whatsapp/share"><i class="fa-brands fa-whatsapp catalogo-RS WHhatsApp-catalogo" style="color: rgba(255, 255, 255, 0.5)"></i></a>
			</div>    
			<div>
				<p style="text-align: center; font-size: 0.7em; color: rgba(255, 255, 255, 0.5)">Compartir</p>
			</div>
		</div> 
	</div>

	<!-- OBRAS CON LAZYLOAD -->
	<div class="cont_obras" id="ContObras">
		<div class="cont_galeria cont_galeria--obras" id="Cont_obras--mosaico">
			<?php 
			foreach($Datos['obraArtista'] as $Row) :
				if($Row['ID_Suscriptor'] == $Datos['datosArtistas']['ID_Suscriptor']){	?>
					<div class="cont_Galeria--item efectoZoom">
						<figure>
							<img class="cont_Galeria--img lazyload borde_1 imagen_2--JS efectoBrillo efectoZoom--imagen" name="imagenNoticia" alt="Fotografia Obra" data-src="<?php echo RUTA_URL?>/public/images/galeria/<?php echo $Row['ID_Suscriptor'];?>_<?php echo $Datos['datosArtistas']['nombreSuscriptor'];?>_<?php echo $Datos['datosArtistas']['apellidoSuscriptor'];?>/<?php echo $Row['imagenObra']?>" id="<?php echo $Row['ID_Obra']?>" loading="lazy" width="320" height="10"/>
						</figure>
					</div> 
					<?php 
				}
			endforeach; ?>
		</div>
	</div>
</div>

<!-- DESCRIPCION DEL ARTISTA -->
<div class="cont_descripcionArtista" id="VerArtista">
	<div class="cont_descripcionArtista--titulo">
		<img class="cont_artista--icono Default_pointer" id="Cerrar" src="<?php echo RUTA_URL . '/public/iconos/flecha/outline_arrow_back_white_24dp.png'?>"/>

		<p class="cont_artista--textoVertical Default--textoVertical"id="DescripcionArtista"><?php echo $Datos['datosArtistas']['nombreSuscriptor'] . ' ' . $Datos['datosArtistas']['apellidoSuscriptor'];?></p>
	</div>
	<div style="text-align: center">
		<figure>
			<img class="cont_descripcionArtista--img" alt="Fotografia Artista" src="<?php echo RUTA_URL?>/public/images/galeria/<?php echo $Row['ID_Suscriptor'];?>_<?php echo $Datos['datosArtistas']['nombreSuscriptor'];?>_<?php echo $Datos['datosArtistas']['apellidoSuscriptor'];?>/perfil/<?php echo $Datos['datosArtistas']['nombre_imagenPortafolio'];?>" />
		</figure>
	</div>
	<div class="cont_descripcionArtista--descripcion">
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