<!-- Archivo llamado via AJAX por medio de la función Llamar_YaracuyVideo() ubicada en detalleObra_V.php reemplaza el contenido del div id="Imagen_Detalle"-->

<div>
	<!-- TITULO	 -->
	<p class="cont_yaracuyVideo--titulo"><?php echo $Datos['yaracuyVideo']['decripcionVideo']?></p>

	<div class="cont_yaracuyVideo--video">
		
		<!-- FLECHAS DE RETROCESO -->
		<div>
			<img class="cont_yaracuyVideo--chevron chevronLeft Default_pointer" onclick="Llamar_YaracuyVideo('<?php echo $Datos['yaracuyVideo']['ID_YaracuyEnVideo']?>','Retroceder')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_white_24dp.png'?>"/>
		</div>

		<!-- VIDEO -->
		<div>
			<video class="con_portada--video" id="VideoPromocion" src="<?php echo RUTA_URL?>/public/video/YaracuyEnVideo/<?php echo $Datos['yaracuyVideo']['nombreVideo']?>"autoplay controls loop ></video> 
		</div>
		
		<!-- FLECHA DE AVANCE -->
		<div>
			<img class="cont_yaracuyVideo--chevron chevronRight Default_pointer" onclick="Llamar_YaracuyVideo('<?php echo $Datos['yaracuyVideo']['ID_YaracuyEnVideo']?>','Avanzar')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_white_24dp.png'?>"/>
		</div>
	</div>
</div>

<script src="<?php echo RUTA_URL;?>/public/javascript/A_YaracuyEnVideo.js?v=<?php echo rand();?>"></script> 