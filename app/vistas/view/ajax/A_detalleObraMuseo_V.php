<!-- Archivo llamado via AJAX por medio de la función Llamar_detalleObrSalaa() ubicada en detalleObraSala_V.php reemplaza el contenido del div id="Imagen_Detalle"-->
<?php
    $ID_MostrarObra = $Datos['diapositivaObra']['ID_ImagenSala'];
    $NombreImgObra= $Datos['diapositivaObra']['nombreImagenSala'];    
    // $Nombre_Obra = $Datos['diapositivaObra']['nombreObra'];
    // $Tecnica_Obra = $Datos['diapositivaObra']['tecnicaObra'];
    // $Medida_Obra = $Datos['diapositivaObra']['medidaObra'];	?>
    <!-- <label class="disponible disponible--true" onclick="Llamar_carrito('<?php echo $Datos['artista']['ID_Suscriptor'];?>','<?php echo $Datos['artista']['nombreSuscriptor'];?>','<?php echo $Datos['artista']['apellidoSuscriptor'];?>','<?php echo $NombreImgObra?>','<?php echo $Nombre_Obra?>','<?php echo $Tecnica_Obra?>','<?php echo $Medida_Obra?>')">disponible</label> -->
     
?>
<div class="carta-box"> 
	<div class="carta" id="Carta">
		<!-- LADO FRONTAL DE TARJETA -->
		<div class="cont_ObraDetalle cara" id="Cont_PinturaDetalle">

			<!-- IMAGEN OBRA -->
			<div class="cont_ObraDetalle--img" id="Imagen_Detalle">
            <img class="imagen_3" src="<?php echo RUTA_URL. '/public/images/museo/' . $Datos['diapositivaObra']['ID_Sala'] . '/' . $Datos['diapositivaObra']['nombreImagenSala'];?>"/>
			</div>
			<div class="cont_ObraDetalle--iconos">
			
				<!-- FLECHA DE RETROCESO -->
				<img class="Default_pointer cont_ObraDetalle--iconoLeft" onclick="Llamar_detalleObraSala('<?php echo $ID_MostrarObra;?>','<?php echo $Datos['diapositivaObra']['ID_Exposicion'];?>','Retroceder')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_back_ios_white_24dp.png'?>"/>

				<!-- BOTON DE GIRO-->
				<img class="cont_ObraDetalle--giro Default_pointer Default_quitarEscritorio" onclick="AtrasTarjeta('Cont_PinturaDetalle')" src="<?php echo RUTA_URL . '/public/iconos/giro/outline_switch_right_black_24dp.png'?>"/>

				<!-- FLECHA DE AVANCE -->
				<img class="Default_pointer cont_ObraDetalle--iconoRight" onclick="Llamar_detalleObraSala('<?php echo $ID_MostrarObra;?>','<?php echo $Datos['diapositivaObra']['ID_Exposicion'];?>','Avanzar')" src="<?php echo RUTA_URL . '/public/iconos/chevron/outline_arrow_forward_ios_white_24dp.png'?>"/>
			</div>
		</div>

		<!-- LADO POSTERIOR DE TARJETA -->
		<div class="cont_ObraDetalle--atras cara detras">
			<div class="cont_ObraDetalle--atras-1">		
				<h1 class="cont_ObraDetalle--h1"><?php echo $Datos['diapositivaObra']['nombreImagenSala'];?></h1>
				<p class="cont_ObraDetalle--p1"><b>Autor: &nbsp;</b> <?php //echo $Datos['diapositivaObra']['autorExposicion'];?></p>
				<!-- <p class="cont_ObraDetalle--p1"><b>Año: &nbsp;</b> <?php //echo $Datos['diapositivaObra']['anioObra'];?></p> -->
				<!-- <p class="cont_ObraDetalle--p1"><b>Dimensiones: &nbsp;</b> <?php //echo $Datos['diapositivaObra']['medidaObra'];?></p>  -->
				<!-- <p class="cont_ObraDetalle--p1"><b>Tecnica: &nbsp;</b> <?php //echo $Datos['diapositivaObra']['tecnicaObra'];?></p>  -->
				<!-- <p class="cont_ObraDetalle--p1"><b>Colección: &nbsp;</b> <?php //echo $Datos['diapositivaObra']['coleccionObra'];?></p>  -->
				<!-- <p class="cont_ObraDetalle--p1"><b>Descripción: &nbsp;</b> <?php //echo $Datos['diapositivaObra']['descripcionObra'];?></p>  -->
				<!-- <p class="cont_ObraDetalle--p1"><b>Precio: &nbsp;</b> <?php //echo $Datos['diapositivaObra']['precioDolarObra'];?></p>  -->
				<p class="cont_ObraDetalle--p1"><b>Factura: &nbsp;</b> Si</p> 
				<label class="boton boton--marg">Comprar</label> 
			</div>

			<!-- BOTON DE GIRO-->
			<div>		
				<img class="cont_ObraDetalle--giro Default_pointer Default_quitarEscritorio" onclick="FrenteTarjeta('Cont_PinturaDetalle')" src="<?php echo RUTA_URL . '/public/iconos/giro/outline_switch_right_black_24dp.png'?>"/>
			</div>
		</div>
	</div>
</div>