<!-- CDN iconos de font-awesome-->
<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>

<div style="color: white; background-color: black">

	<!-- ICONO FULLSCREEM -->
	<img class="cont_ObraDetalle--label" style="text-align: center; display:inline; margin: auto; width: 1.8em;" id="Abrir" src="<?php echo RUTA_URL . '/public/iconos/fullScreem/outline_open_in_full_white_24dp.png'?>"/>

	<div style="background-color: black" id="Miimagen">

		<!-- ICONO CERRAR -->
		<a class="cont_ObraDetalle--cerrar" href="<?php echo RUTA_URL . '/GaleriaArte_C/artistas/' . $Datos['detalleObra']['ID_Artista'];?>"><i class="fas fa-times" style="font-size: 1em"></i></a>

		<div class="cont_ObraDetalle" id="Cont_PinturaDetalle">
			<?php
				if($Datos['detalleObra']['disponible']){	
					$imagenObra = $Datos['detalleObra']['imagenObra'];
					$nombreObra = $Datos['detalleObra']['nombreObra'];
					$TecnicaObra = $Datos['detalleObra']['tecnicaObra'];
					$MedidaObra = $Datos['detalleObra']['medidaObra'];	
					
					// echo $imagenObra . '<br>';
					// echo $nombreObra . '<br>';
					// echo $TecnicaObra . '<br>';
					// echo $MedidaObra . '<br>';
					// exit;
					?>

					<!-- BOTON DISPONIBLE - VENDIDO -->
					<label class="disponible disponible--true" onclick="Llamar_carrito('<?php echo $Datos['detalleObra']['ID_Artista']?>','<?php echo $Datos['detalleObra']['nombreArtista'];?>','<?php echo $Datos['detalleObra']['apellidoArtista'];?>','<?php echo $imagenObra?>','<?php echo $nombreObra?>','<?php echo $TecnicaObra?>','<?php echo $MedidaObra?>')">disponible</label>
					<?php
				}
				else{	?>
					<label class="disponible">vendido</label>
					<?php
				}	
			?>

			<!-- FLECHAS DE AVANCE Y RETROCESO -->
			<i class="fas fa-chevron-left cont_ObraDetalle--iconoLeft" onclick="Llamar_detalleObra('<?php echo $Datos['detalleObra']['ID_Obra'];?>','<?php echo $Datos['detalleObra']['ID_Artista'];?>','Retroceder')"></i>
			<i class="fas fa-chevron-right cont_ObraDetalle--iconoRight" onclick="Llamar_detalleObra(<?php echo $Datos['detalleObra']['ID_Obra'];?>,'<?php echo $Datos['detalleObra']['ID_Artista'];?>','Avanzar')"></i>

			<div class="cont_ObraDetalle--img">		

				<!-- IMAGENES OBRA -->
				<div  style="height: 98%;" id="Imagen_Detalle">
					<img class="imagen_3" src="<?php echo RUTA_URL . "/public/images/galeria/" . $Datos['detalleObra']['ID_Artista'];?>_<?php echo $Datos['detalleObra']['nombreArtista'];?>_<?php echo $Datos['detalleObra']['apellidoArtista'] . "/" . $Datos['detalleObra']['imagenObra'];?>"/>
				</div>
			</div>

			<!-- LEYENDA -->
			<div class="cont_ObraDetalle--leyenda">
				<h1 class="cont_ObraDetalle--h1"><?php echo $Datos['detalleObra']['nombreObra'];?></h1>
				<p class="cont_ObraDetalle--p1"><?php echo $Datos['detalleObra']['medidaObra'];?></p> 
				<p class="cont_ObraDetalle--p1"><?php echo $Datos['detalleObra']['tecnicaObra'];?></p> 
				<p class="cont_ObraDetalle--p1"><?php echo $Datos['detalleObra']['precioObra'];?></p> 
				<label class="Default_pointer" onclick="Llamar_carrito('<?php echo $Datos['detalleObra']['ID_Artista']?>','<?php echo $Datos['detalleObra']['nombreArtista'];?>','<?php echo $Datos['detalleObra']['apellidoArtista'];?>','<?php echo $imagenObra?>','<?php echo $nombreObra?>','<?php echo $TecnicaObra?>','<?php echo $MedidaObra?>')"><img style="background-color: black;" src="<?php echo RUTA_URL?>/public/iconos/carritoCompras/outline_shopping_cart_white_24dp.png"/></label>
				 
			</div>
		</div>		
	</div>
</div>

<!-- CARRITO DE COMPRA ALIMENTADO POR A_carrito_V.php-->
<div class="cont_carrito" id="Modal_carrito"></div>
	
<script src="<?php echo RUTA_URL;?>/public/javascript/A_DetallesObra.js?v=<?php echo rand();?>"></script> 
<!--<script src="<?php echo RUTA_URL;?>/public/javascript/E_Carrito.js?v=<?php echo rand();?>"></script> --> 
<script src="<?php echo RUTA_URL;?>/public/javascript/FullScreem.js?v=<?php echo rand();?>"></script> 

</body>
</html>